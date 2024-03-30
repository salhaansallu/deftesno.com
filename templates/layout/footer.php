<footer class="ftco-footer ftco-footer-2 ftco-section">
		<div class="container">
			<div class="row mb-5">
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<img src="/assets/images/header_logo.png" width="100" alt="">
						<p class="mt-3">We are committed to providing our customers with the best possible products and services. </p>
						<ul class="ftco-footer-social list-unstyled mt-2">
							<li class="ftco-animate"><a href="#"><span class="fa fa-twitter"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="fa fa-facebook"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="fa fa-instagram"></span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4 ml-md-5">
						<h2 class="ftco-heading-2">Explore</h2>
						<ul class="list-unstyled">
							<li><a href="/about" class="py-2 d-block">About</a></li>
							<li><a href="/contact" class="py-2 d-block">Contact</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Products</h2>
						<ul class="list-unstyled">
							<li><a href="https://store.ayuniya.com/" class="py-2 d-block">Ayuniya Store</a></li>
							<li><a href="https://store.ayuniya.com/services" class="py-2 d-block">Hospital Booking</a></li>
							<li><a href="https://lms.ayuniya.com/" class="py-2 d-block">LMS</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Have a Questions?</h2>
						<div class="block-23 mb-3">
							<ul>
								<li><span class="icon fa fa-map marker"></span><span class="text"><?php echo Company::$address ?></span></li>
								<li><a href="tel:<?php echo Company::$phone ?>"><span class="icon fa fa-phone"></span><span class="text"><?php echo Company::$phone ?></span></a></li>
								<li><a href="mailto:<?php echo Company::$email ?>"><span class="icon fa fa-paper-plane pr-4"></span><span class="text"><span><?php echo Company::$email ?></span></span></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<p>
						Copyright &copy;
						<script>document.write(new Date().getFullYear());</script>
						<?php echo Company::$name ?>. All Rights Reserved
					</p>
				</div>
			</div>
		</div>
	</footer>

	<div id="ftco-loader" class="show fullscreen">
		<svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
				stroke="#F96D00" />
		</svg>
	</div>
	<script src="/assets/js/jquery.min.js"></script>
	<script src="/assets/js/jquery-migrate-3.0.1.min.js"></script>
	<script src="/assets/js/popper.min.js"></script>
	<script src="/assets/js/bootstrap.min.js"></script>
	<script src="/assets/js/jquery.easing.1.3.js"></script>
	<script src="/assets/js/jquery.waypoints.min.js"></script>
	<script src="/assets/js/jquery.stellar.min.js"></script>
	<script src="/assets/js/owl.carousel.min.js"></script>
	<script src="/assets/js/jquery.magnific-popup.min.js"></script>
	<script src="/assets/js/jquery.animateNumber.min.js"></script>
	<script src="/assets/js/scrollax.min.js"></script>
	<!-- <script src="/assets/js/google-map.js"></script> -->
	<script src="/assets/js/main.js?ver=<?php echo rand(111,9999) ?>"></script>
	<script src="/node_modules/toastr/build/toastr.min.js"></script>
</body>

</html>