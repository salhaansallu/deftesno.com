<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '../../../vendor/autoload.php';

class Crypt
{
    private $encrypt_method = "AES-256-CBC";
    // Update your secret key before use
    private $secret_key = '$LKDIsdf76euuydmOMNs$4srTUDS478/';
    // Update your secret iv before use
    private $secret_iv = '$PIGHQFK$SD475HIO5HE8KS54Q8QWE4SXDCD/';
    // hash
    private $key;

    private function __construct()
    {
        $this->key = hash('sha256', $this->secret_key);
    }

    static function encrypt($string)
    {
        $crypt = new Crypt();
        $output = false;
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $crypt->secret_iv), 0, 16);
        $output = openssl_encrypt($string, $crypt->encrypt_method, $crypt->key, 0, $iv);
        return base64_encode($output);
    }

    static function decrypt($string)
    {
        $crypt = new Crypt();
        $output = false;
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $crypt->secret_iv), 0, 16);
        $output = openssl_decrypt(base64_decode($string), $crypt->encrypt_method, $crypt->key, 0, $iv);
        return $output;
    }
}

class DB
{
    public $host = 'localhost';
    public $username = 'root';
    public $password = '';
    public $db = 'hostwarelk';

    function connect()
    {
        $conn = new mysqli($this->host, $this->username, $this->password, $this->db);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }

    function query($query)
    {
        $con = $this->connect();
        $result = $con->query($query);
        $con->close();
        $results = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $results[] = $row;
            }
        }

        return $results;
    }

    function update($query)
    {
        $con = $this->connect();
        if ($con->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
        $con->close();
    }

    function insert($query)
    {
        $con = $this->connect();
        if ($con->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
        $con->close();
    }
}

class Company
{
    public static $name = 'DEF TESNO (PVT) LTD';
    public static $email = 'admin@ayuniya.com';
    public static $phone = '+94 76 429 2602';
    public static $address = 'H3 Building, IDB Pallekale, Sri Lanka';
    public static $domain = 'deftesno.com';
    public static $url = 'https://deftesno.com';
}

// class Contact {
//     public $name;
//     public $email;
//     public $subject;
//     public $message;

//     function save() {
//         $db = new DB();
//         $insert = $db->insert("INSERT INTO contact (name, email, subject, message) VALUES ('".$this->name."', '".$this->email."', '".$this->subject."', '".$this->message."')");
//         if ($insert) {
//             return array(
//                 "error" => 0,
//                 "message" => "message sent successfully"
//             );
//         }

//         return array(
//             "error" => 1,
//             "message" => "Sorry, Something went wrong"
//         );
//     }
// }

class Mail
{

    public $toemail;
    public $toname;
    public $data;
    public $subject;

    function send()
    {

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer();

        try {
            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = '';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = '';                     //SMTP username
            $mail->Password   = '';                                 //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('info@deftesno.com', Company::$name);
            $mail->addAddress($this->toemail, $this->toname);     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $this->subject;
            $mail->Body    = $this->data;
            $mail->AltBody = strip_tags($this->data);

            if ($mail->send()) {
                return (object)array(
                    "error" => '0',
                    "message" => "Message sent successfully",
                );
            }
            else {
                return (object)array(
                    "error" => '1',
                    "message" => "Error while sending message"
                );
            }
            
        } catch (Exception $e) {
            return (object)array(
                "error" => '1',
                "message" => "Error while sending message",
                "error_code" => $mail->ErrorInfo
            );
        }
    }
}

function verifyCaptcha($token)
{

    $secret = '6LcHLqYpAAAAALO0-ZkifdMPr80G0yfIdQVIqOYx';

    $postdata = http_build_query(["secret"=>$secret,"response"=>$token]);
    $opts = ['http' =>
        [
            'method'  => 'POST',
            'header'  => 'Content-type: application/x-www-form-urlencoded',
            'content' => $postdata
        ]
    ];
    $context  = stream_context_create($opts);
    $result = file_get_contents('https://www.google.com/recaptcha/api/siteverify', false, $context);
    $check = json_decode($result);

    if ($check->success && $check->hostname == $_SERVER['SERVER_NAME']) {
        captchaCheck('set');
        return array(
            "error" => 0,
            "message" => "reCatpcha verified."
        );
    }

    return array(
        "error" => 1,
        "message" => "reCatpcha error."
    );
}

function captchaCheck($action = 'get') {
    if ($action == 'set') {
        setcookie('ctnt_', Crypt::encrypt('verified'), time() + (60 * 5));
        return true;
    }

    if ($action == 'destroy') {
        setcookie('ctnt_', Crypt::encrypt('removed'), time() - (60 * 50));
        return true;
    }

    return isset($_COOKIE['ctnt_']) ? (Crypt::decrypt($_COOKIE['ctnt_']) == "verified"? true : false) : false;
}

function valueExists($arr)
{
    if (is_array($arr) && count($arr) > 0) {
        return (object)$arr[0];
    } else {
        return false;
    }
}

function getVal($arr, $val)
{

    if (is_array($arr) && array_key_exists($val, $arr)) {
        return $arr[$val];
    } elseif (is_object($arr) && property_exists($arr, $val)) {
        return $arr->$val;
    } else {
        return "";
    }
}

function currency(float $price, $code = 'LKR ')
{
    $c = new Company();

    if (strpos($price, '.')) {
        return $code . ' ' . round((float)$price, 2);
    } elseif (empty($price) || $price == "0") {
        return $code . "0.00";
    } else {
        return $code . ' ' . $price . '.00';
    }
}

function sanitize($string)
{
    $db = new DB();
    $conn = $db->connect();
    return $conn->escape_string(strip_tags(str_replace(["'", '"'], ['&#39;', '&#34;'], preg_replace('/\x00|<[^>]*>?/', '', $string))));
}

function request($param, $required = true)
{
    if ($required == true) {
        if (isset($_POST[$param]) && !empty(sanitize($_POST[$param]))) {
            return true;
        }
        return false;
    }

    if (isset($param)) {
        return true;
    }

    return false;
}
