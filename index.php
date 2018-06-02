<?php
	session_start();
	include_once("header.php");
	require_once("inciarsesion.php");
	require_once("registro.php");
    ?>

	<!-- ========================= SECTION INTRO ========================= -->
	<section id="intro">
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner" role="listbox">
				<!-- Slide One - Set the background image for this slide in the line below -->
				<div class="carousel-item active" style="background-image: url('images/beza/DSC_1060.jpg')">
					<div class="carousel-caption d-none d-md-block">
					</div>
				</div>
				<!-- Slide Two - Set the background image for this slide in the line below -->
				<div class="carousel-item" style="background-image: url('images/beza/DSC_1028.jpg')">
					<div class="carousel-caption d-none d-md-block">
					</div>
				</div>
				<!-- Slide Three - Set the background image for this slide in the line below -->
				<div class="carousel-item" style="background-image: url('images/beza/DSC_1040.jpg')">
					<div class="carousel-caption d-none d-md-block">
					</div>
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</section>
	<!-- ========================= SECTION INTRO END// ========================= -->


	<!-- ========================= SECTION FEATURES ========================= -->
	<section id="features" class="section-features bg2 padding-y-lg">
		<div class="container">

			<header class="section-heading text-center">
				<h2 class="title-section">How it works </h2>
				<p class="lead"> Let's explain how we do things around here </p>
			</header>
			<!-- sect-heading -->

			<div class="row">
				<aside class="col-sm-4">
					<figure class="itembox text-center">
						<span class="icon-wrap icon-lg bg-secondary white">
							<i class="fa fa-envelope-open"></i>
						</span>
						<figcaption class="text-wrap">
							<h4 class="title">Free Shipping</h4>
							<p>If you’re shipping within the USA, we’ll deliver your gear absolutely free.</p>
						</figcaption>
					</figure>
					<!-- iconbox // -->
				</aside>
				<!-- col.// -->
				<aside class="col-sm-4">
					<figure class="itembox text-center">
						<span class="icon-wrap icon-lg bg-secondary  white">
							<i class="fa fa-heart"></i>
						</span>
						<figcaption class="text-wrap">
							<h4 class="title">Handmade</h4>
							<p>All our products are handmade. Made with love just for you</p>
						</figcaption>
					</figure>
					<!-- iconbox // -->
				</aside>
				<!-- col.// -->
				<aside class="col-sm-4">
					<figure class="itembox text-center">
						<span class="icon-wrap icon-lg bg-secondary  white">
							<i class="fa fa-users"></i>
						</span>
						<figcaption class="text-wrap">
							<h4 class="title">Community</h4>
							<p>Help us to create a community by sending us a foto with your new tie. (:</p>
						</figcaption>
					</figure>
					<!-- iconbox // -->
				</aside>
				<!-- col.// -->
			</div>
			<!-- row.// -->
		</div>
		<!-- container // -->
	</section>
	<!-- ========================= SECTION FEATURES END// ========================= -->

	<!-- ========================= SECTION CONTENT  ========================= -->
	


	<!-- ========================= SECTION CONTENT ASIDE ========================= -->
	<section id="more" class="bg section-content padding-y-lg">
		<div class="container">

			<header class="section-heading text-center">
				<h2 class="title-section"> Another Section</h2>
				<p class="lead"> Good sub heading this sounded nonsense to Alice </p>
			</header>
			<!-- sect-heading -->

			<div class="row justify-content-center">
				<article class="col-md-6 text-center">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
						aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
						Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
						occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
						irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
						cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</article>
				<!-- col.// -->
			</div>
			<!-- row.// -->

		</div>
		<!-- container .//  -->
	</section>
	<!-- ========================= SECTION CONTENT ASIDE END// ========================= -->


	<!-- ========================= FOOTER ========================= -->
	<?php
    include_once("footer.html");
    ?>