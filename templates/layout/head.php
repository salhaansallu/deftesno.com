<?php include dirname(__FILE__) . '/../../func_load.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>DEF TESNO (PVT) LTD: Shaping a Healthier Tomorrow with Software & Devices</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/animate.css">
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="/assets/css/flaticon.css">
    <link rel="stylesheet" href="/assets/css/style.css?ver=<?php echo rand(1111, 99999) ?>">
    <link rel="shortcut icon" href="/assets/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/node_modules/toastr/build/toastr.min.css">
    <script src="https://kit.fontawesome.com/7fb1c947c6.js" crossorigin="anonymous"></script>

    <?php

    if ($_SERVER['REQUEST_URI'] == '/contact' || $_SERVER['REQUEST_URI'] == '/') {
    ?>
        <script type="text/javascript">
            var onloadCallback = function() {
                grecaptcha.render('recaptcha', {
                    sitekey: '6LcHLqYpAAAAAPLpGqyhOY65EuuHn1vrxCHgWVdV',
                    callback: captchaSuccess
                });
            };
        </script>
        <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
    <?php
    }

    ?>
</head>

<body>
    <div class="wrap">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 col-md d-flex align-items-center">
                    <p class="mb-0 phone"><span class="mailus">Phone no:</span> <a href="tel:<?php echo Company::$phone ?>"><?php echo Company::$phone ?></a> or <span class="">email us:</span> <a href="mailto:<?php echo Company::$email ?>"><span><?php echo Company::$email ?></span></a>
                    </p>
                </div>
                <div class="col-12 col-md d-flex justify-content-md-end">
                    <div class="social-media">
                        <p class="mb-0 d-flex">
                            <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
                            <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
                            <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
                            <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="/assets/images/header_logo.png" width="60" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="/" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="/about" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="/contact" class="nav-link">Contact us</a></li>
                    <li class="nav-item cta"><a href="#" class="nav-link">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>