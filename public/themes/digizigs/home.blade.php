<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Utouch - HomePage</title>

    <link rel="stylesheet" type="text/css" href="{{asset('public/themes/digizigs/css/theme-styles.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/themes/digizigs/css/blocks.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/themes/digizigs/css/widgets.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/themes/digizigs/css/ion.rangeSlider.css')}}">


	<!--External fonts-->

	<link href="https://fonts.googleapis.com/css?family=Nunito:300,400,700,900" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Baloo+Paaji" rel="stylesheet">

	<!-- Styles for Plugins -->
	<link rel="stylesheet" type="text/css" href="{{asset('public/themes/digizigs/css/swiper.min.css')}}">

	<!--Styles for RTL-->

	<!--<link rel="stylesheet" type="text/css" href="css/rtl.css">-->
</head>


<body class="crumina-grid">

<!-- Preloader -->

{{-- <div id="hellopreloader" style="display: block; position: fixed;z-index: 99999;top: 0;left: 0;width: 100%;height: 100%;min-width: 100%;background: #66b5ff url(svg/preload.svg) center center no-repeat;background-size: 41px;opacity: 1;"></div> --}}

<!-- ... end Preloader -->


<!-- Header -->

<header class="header header--menu-rounded header--blue-lighteen" id="site-header">


	<div class="container">

		<a href="#" id="top-bar-js" class="top-bar-link">
			<svg class="utouch-icon utouch-icon-arrow-top">
				<use xlink:href="#utouch-icon-arrow-top"></use>
			</svg>
		</a>
		<div class="header-content-wrapper">

			<div class="site-logo" >
				<a href="index.html" class="full-block"></a>
                <img src="{{setting('app.logo')}}" alt="Digizigs" style="height:40px;">
			</div>

			<nav id="primary-menu" class="primary-menu">

				<!-- menu-icon-wrapper -->

				<a href='javascript:void(0)' id="menu-icon-trigger" class="menu-icon-trigger showhide">
					<span class="mob-menu--title">Menu</span>
					<span id="menu-icon-wrapper" class="menu-icon-wrapper">
						<svg width="1000px" height="1000px">
							<path id="pathD" d="M 300 400 L 700 400 C 900 400 900 750 600 850 A 400 400 0 0 1 200 200 L 800 800"></path>
							<path id="pathE" d="M 300 500 L 700 500"></path>
							<path id="pathF" d="M 700 600 L 300 600 C 100 600 100 200 400 150 A 400 380 0 1 1 200 800 L 800 200"></path>
						</svg>
					</span>
				</a>

				<ul class="primary-menu-menu">
					<li class="menu-item-has-children">
						<a href="index.html">Home</a>
					</li>

                    <li class="menu-item-has-children">
						<a href="index.html">Blog</a>
					</li>

				</ul>
				<ul class="nav-add">
					<li class="search search_main">
						<a href="#" class="js-open-search-popup">
							<svg class="utouch-icon utouch-icon-search cd-nav-trigger">
								<use xlink:href="#utouch-icon-search"></use>
							</svg>
						</a>
					</li>
				</ul>
				<div class="search-standard">
					<form id="search-header" name="form-search-header" method="post">
						<div class="typeahead__container">
							<div class="typeahead__field">

							<span class="typeahead__query">
								<input class="js-typeahead" name="utouch_posts[query]" placeholder="What are you looking for?" autocomplete="off" type="search" autofocus>
							</span>
								<button type="submit" class="form-icon">
									<svg class="utouch-icon utouch-icon-search">
										<use xlink:href="#utouch-icon-search"></use>
									</svg>
								</button>
								<span class="close js-popup-clear-input form-icon">
								<svg class="utouch-icon utouch-icon-cancel-1"><use xlink:href="#utouch-icon-cancel-1"></use></svg>
							</span>

							</div>
						</div>
					</form>
				</div>
			</nav>

		</div>

	</div>

</header>

<div class="header-spacer"></div>

<!-- ... End Header -->

<div class="content-wrapper">

	<!-- Main Slider -->

	<div class="crumina-module crumina-module-slider container-full-width">
		<div class="swiper-container main-slider navigation-center-both-sides" data-effect="fade">

			<!-- Additional required wrapper -->
			<div class="swiper-wrapper">
				<!-- Slides -->
				<div class="swiper-slide bg-1 main-slider-bg-light">

					<div class="container">
						<div class="row table-cell">

							<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-12">

								<div class="slider-content align-center">

									<h1 class="slider-content-title with-decoration" data-swiper-parallax="-100">
										The power of Technology

										<svg class="first-decoration utouch-icon utouch-icon-arrow-left">
											<use xlink:href="#utouch-icon-arrow-left"></use>
										</svg>

										<svg class="second-decoration utouch-icon utouch-icon-arrow-left">
											<use xlink:href="#utouch-icon-arrow-left"></use>
										</svg>

									</h1>
									<h6 class="slider-content-text" data-swiper-parallax="-200">Lorem ipsum dolor sit
										amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut
										laoreet dolore magna aliquam erat volutpat.
									</h6>

									<div class="main-slider-btn-wrap" data-swiper-parallax="-300">

										<a href="03_products.html" class="btn btn--yellow btn--with-shadow">
											Learn More
										</a>

										<a href="02_company.html" class="btn btn-border btn--with-shadow c-primary">
											Get Started Now
										</a>
									</div>
								</div>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="slider-thumb" data-swiper-parallax="-400" data-swiper-parallax-duration="600">
									<img src="img/slides1.png" alt="slider">
								</div>
							</div>

						</div>
					</div>
				</div>

				<div class="swiper-slide bg-2 main-slider-bg-light">

					<div class="container table">
						<div class="row table-cell">

							<div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
								<div class="slider-content align-both">
									<h2 class="slider-content-title" data-swiper-parallax="-100">
										<span class="c-primary">Utouch</span>
										is quality product that will make your life better
									</h2>
									<h6 class="slider-content-text" data-swiper-parallax="-200">Lorem ipsum dolor sit amet,
										consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore
										magna aliquam erat volutpat.
									</h6>

									<div class="main-slider-btn-wrap" data-swiper-parallax="-300">

										<a href="#" class="btn btn-market btn--with-shadow">
											<svg class="utouch-icon utouch-icon-apple-logotype-1">
												<use xlink:href="#utouch-icon-apple-logotype-1"></use>
											</svg>
											<div class="text">
												<span class="sup-title">Download on the</span>
												<span class="title">App Store</span>
											</div>
										</a>

										<a href="#" class="btn btn-market btn--with-shadow">
											<img class="utouch-icon" src="svg-icons/google-play.svg" alt="google">
											<div class="text">
												<span class="sup-title">Download on the</span>
												<span class="title">Google Play</span>
											</div>
										</a>

									</div>

								</div>
							</div>

						</div>
					</div>
				</div>
				<div class="swiper-slide thumb-left bg-3 main-slider-bg-light">

					<div class="container table full-height">
						<div class="row table-cell">
							<div class="col-lg-6 col-sm-12 table-cell">

								<div class="slider-content align-both">

									<h2 class="slider-content-title" data-swiper-parallax="-100">Rise Up With the Most Interesting App</h2>

									<h6 class="slider-content-text" data-swiper-parallax="-200">Lorem ipsum dolor sit amet,
										consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet
										dolore magna aliquam erat volutpat.
									</h6>

									<div class="main-slider-btn-wrap" data-swiper-parallax="-300">

										<a href="02_company.html" class="btn btn--lime btn--with-shadow">
											Get Started Now
										</a>

									</div>

								</div>

							</div>

							<div class="col-lg-6 col-sm-12 table-cell">
								<div class="slider-thumb" data-swiper-parallax="-300" data-swiper-parallax-duration="500">
									<img src="img/slides2.png" alt="slider">
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>

			<!--Prev next buttons-->

			<div class="btn-prev with-bg">
				<svg class="utouch-icon icon-hover utouch-icon-arrow-left-1">
					<use xlink:href="#utouch-icon-arrow-left-1"></use>
				</svg>
				<svg class="utouch-icon utouch-icon-arrow-left1">
					<use xlink:href="#utouch-icon-arrow-left1"></use>
				</svg>
			</div>

			<div class="btn-next with-bg">
				<svg class="utouch-icon icon-hover utouch-icon-arrow-right-1">
					<use xlink:href="#utouch-icon-arrow-right-1"></use>
				</svg>
				<svg class="utouch-icon utouch-icon-arrow-right1">
					<use xlink:href="#utouch-icon-arrow-right1"></use>
				</svg>
			</div>

		</div>
	</div>

	<!-- ... end Main Slider -->

	<!-- Info Boxes -->

	<section class="medium-padding100">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<div class="crumina-module crumina-info-box info-box--standard-hover">

						<div class="info-box-image">
							<img class="utouch-icon" src="svg-icons/smartphone.svg" alt="smartphone">
							<img class="cloud" src="img/clouds8.png" alt="cloud">
						</div>

						<div class="info-box-content">
							<a href="#" class="h5 info-box-title">Online Shopping</a>
							<p class="info-box-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
								nibh euismod tincidunt ut laoreet dolore magna aliquam.
							</p>
						</div>

						<a href="#" class="btn-next">
							<svg class="utouch-icon icon-hover utouch-icon-arrow-right-1">
								<use xlink:href="#utouch-icon-arrow-right-1"></use>
							</svg>
							<svg class="utouch-icon utouch-icon-arrow-right1">
								<use xlink:href="#utouch-icon-arrow-right1"></use>
							</svg>
						</a>

					</div>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<div class="crumina-module crumina-info-box info-box--standard-hover">

						<div class="info-box-image">
							<img class="utouch-icon" src="svg-icons/music%20(1).svg" alt="smartphone">
							<img class="cloud" src="img/clouds9.png" alt="cloud">
						</div>

						<div class="info-box-content">
							<a href="#" class="h5 info-box-title">Multimedia Archives</a>
							<p class="info-box-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
								nibh euismod tincidunt ut laoreet dolore magna aliquam.
							</p>
						</div>

						<a href="#" class="btn-next">
							<svg class="utouch-icon icon-hover utouch-icon-arrow-right-1">
								<use xlink:href="#utouch-icon-arrow-right-1"></use>
							</svg>
							<svg class="utouch-icon utouch-icon-arrow-right1">
								<use xlink:href="#utouch-icon-arrow-right1"></use>
							</svg>
						</a>

					</div>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<div class="crumina-module crumina-info-box info-box--standard-hover">

						<div class="info-box-image">
							<img class="utouch-icon" src="svg-icons/settings%20(4).svg" alt="smartphone">
							<img class="cloud" src="img/clouds10.png" alt="cloud">
						</div>

						<div class="info-box-content">
							<a href="#" class="h5 info-box-title">Quick Settings</a>
							<p class="info-box-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
								nibh euismod tincidunt ut laoreet dolore magna aliquam.
							</p>
						</div>

						<a href="#" class="btn-next">
							<svg class="utouch-icon icon-hover utouch-icon-arrow-right-1">
								<use xlink:href="#utouch-icon-arrow-right-1"></use>
							</svg>
							<svg class="utouch-icon utouch-icon-arrow-right1">
								<use xlink:href="#utouch-icon-arrow-right1"></use>
							</svg>
						</a>

					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- ... end Info Boxes -->


	<!-- Slider with vertical tabs -->

	<section class="crumina-module crumina-module-slider slider-tabs-vertical-line">

		<div class="swiper-container" data-show-items="1">
			<div class="swiper-wrapper">
				<div class="swiper-slide bg-primary-color bg-5" data-mh="slide">
					<div class="container">
						<div class="row">
							<div class="col-lg-4 col-lg-offset-1 col-md-5 col-md-offset-0 col-sm-12 col-xs-12">
								<div class="slider-tabs-vertical-thumb">
									<img src="img/iphone.png" alt="iphone">
								</div>
							</div>
							<div class="col-lg-6 col-lg-offset-1 col-md-7 col-md-offset-0 col-sm-12 col-xs-12">
								<div class="crumina-module crumina-heading custom-color c-white">
									<h6 class="heading-sup-title">User Interface</h6>
									<h2 class="heading-title">Discover new horisons</h2>
									<div class="heading-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed
										diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
										Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.
										Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit
										litterarum formas humanitatis per.
									</div>
								</div>

								<a href="#" class="btn btn-market btn--with-shadow">
									<svg class="utouch-icon utouch-icon-apple-logotype-1">
										<use xlink:href="#utouch-icon-apple-logotype-1"></use>
									</svg>
									<div class="text">
										<span class="sup-title">Download on the</span>
										<span class="title">App Store</span>
									</div>
								</a>

								<a href="#" class="btn btn-market btn--with-shadow">
									<img class="utouch-icon" src="svg-icons/google-play.svg" alt="google">
									<div class="text">
										<span class="sup-title">Download on the</span>
										<span class="title">Google Play</span>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="swiper-slide bg-orange-light bg-6" data-mh="slide">
					<div class="container">
						<div class="row">
							<div class="col-lg-4 col-lg-offset-1 col-md-5 col-md-offset-0 col-sm-12 col-xs-12">
								<div class="slider-tabs-vertical-thumb">
									<img src="img/iphone2.png" alt="iphone">
								</div>
							</div>
							<div class="col-lg-6 col-lg-offset-1 col-md-7 col-md-offset-0 col-sm-12 col-xs-12">
								<div class="crumina-module crumina-heading custom-color c-white">
									<h6 class="heading-sup-title">User Interface</h6>
									<h2 class="heading-title">Discover new horisons</h2>
									<div class="heading-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed
										diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
										Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.
										Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit
										litterarum formas humanitatis per.
									</div>
								</div>

								<a href="#" class="btn btn-market btn--with-shadow">
									<svg class="utouch-icon utouch-icon-apple-logotype-1">
										<use xlink:href="#utouch-icon-apple-logotype-1"></use>
									</svg>
									<div class="text">
										<span class="sup-title">Download on the</span>
										<span class="title">App Store</span>
									</div>
								</a>

								<a href="#" class="btn btn-market btn--with-shadow">
									<img class="utouch-icon" src="svg-icons/google-play.svg" alt="google">
									<div class="text">
										<span class="sup-title">Download on the</span>
										<span class="title">Google Play</span>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="swiper-slide bg-red bg-7" data-mh="slide">
					<div class="container">
						<div class="row">
							<div class="col-lg-4 col-lg-offset-1 col-md-5 col-md-offset-0 col-sm-12 col-xs-12">
								<div class="slider-tabs-vertical-thumb">
									<img src="img/iphone3.png" alt="iphone">
								</div>
							</div>
							<div class="col-lg-6 col-lg-offset-1 col-md-7 col-md-offset-0 col-sm-12 col-xs-12">
								<div class="crumina-module crumina-heading custom-color c-white">
									<h6 class="heading-sup-title">User Interface</h6>
									<h2 class="heading-title">Discover new horisons</h2>
									<div class="heading-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed
										diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
										Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.
										Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit
										litterarum formas humanitatis per.
									</div>
								</div>

								<a href="#" class="btn btn-market btn--with-shadow">
									<svg class="utouch-icon utouch-icon-apple-logotype-1">
										<use xlink:href="#utouch-icon-apple-logotype-1"></use>
									</svg>
									<div class="text">
										<span class="sup-title">Download on the</span>
										<span class="title">App Store</span>
									</div>
								</a>

								<a href="#" class="btn btn-market btn--with-shadow">
									<img class="utouch-icon" src="svg-icons/google-play.svg" alt="google">
									<div class="text">
										<span class="sup-title">Download on the</span>
										<span class="title">Google Play</span>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="slider-slides slider-slides--vertical-line">
				<a href="#" class="slides-item">
					<span class="round primary"></span>01.
				</a>

				<a href="#" class="slides-item">
					<span class="round orange"></span>02.
				</a>

				<a href="#" class="slides-item">
					<span class="round red"></span>03.
				</a>

			</div>

		</div>

	</section>

	<!-- ... Slider with vertical tabs -->


	<!-- Video -->

	<section class="bg-8 background-contain pt100">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="crumina-module crumina-heading">
						<h6 class="heading-sup-title">Watch the video</h6>
						<h2 class="heading-title">How the <span class="c-primary">Utouch</span> works</h2>
						<p class="heading-text">Claritas est etiam processus dynamicus, qui sequitur mutationem
							consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram,
							anteposuerit litterarum formas humanitatis per.
						</p>
					</div>
					<a href="02_company.html" class="btn btn-small btn--icon-right btn-border btn--with-shadow c-primary">
						<svg class="utouch-icon utouch-icon-arrow-right1">
							<use xlink:href="#utouch-icon-arrow-right1"></use>
						</svg>
						<div class="text">
							<span class="title">Get Started Now</span>
						</div>
					</a>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="crumina-module crumina-our-video">
						<div class="video-thumb">
							<img src="img/video-thumb.png" alt="video">
							<a href="https://www.youtube.com/watch?v=wnJ6LuUFpMo" class="video-control js-popup-iframe">
								<img src="img/play.png" alt="play">
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- ... end Video -->


	<!-- Clients Block -->

	<section class="crumina-module crumina-clients background-contain bg-yellow">
		<div class="container">
			<div class="row">
				<div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
					<a class="clients-item" href="#">
							<span class="clients-images">
								<img src="img/client1.png" class="" alt="logo">
								<img src="img/client1-1.png" class="hover" alt="logo">
							</span>
					</a>
				</div>
				<div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
					<a class="clients-item" href="#">
							<span class="clients-images">
								<img src="img/client2.png" class="" alt="logo">
								<img src="img/client2-1.png" class="hover" alt="logo">
							</span>
					</a>
				</div>
				<div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
					<a class="clients-item" href="#">
							<span class="clients-images">
								<img src="img/client3.png" class="" alt="logo">
								<img src="img/client3-1.png" class="hover" alt="logo">
							</span>
					</a>
				</div>
				<div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
					<a class="clients-item" href="#">
							<span class="clients-images">
								<img src="img/client4.png" class="" alt="logo">
								<img src="img/client4-1.png" class="hover" alt="logo">
							</span>
					</a>
				</div>
				<div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
					<a class="clients-item" href="#">
							<span class="clients-images">
								<img src="img/client5.png" class="" alt="logo">
								<img src="img/client5-1.png" class="hover" alt="logo">
							</span>
					</a>
				</div>
				<div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
					<a class="clients-item" href="#">
							<span class="clients-images">
								<img src="img/client6.png" class="" alt="logo">
								<img src="img/client6-1.png" class="hover" alt="logo">
							</span>
					</a>
				</div>
			</div>
		</div>
	</section>

	<!-- ... end Clients Block -->


	<!-- Info Boxes -->

	<section class="bg-9 background-contain medium-padding120">
		<div class="container">
			<div class="row">
				<div class="display-flex info-boxes">
					<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
						<div class="crumina-module crumina-info-box info-box--standard-round icon-right negative-margin-right150">
							<div class="info-box-image">
								<img src="svg-icons/chat.svg" alt="chat" class="utouch-icon">
							</div>
							<div class="info-box-content">
								<h5 class="info-box-title">Private Chat Integration</h5>
								<p class="info-box-text">Sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
									tincidunt.
								</p>
							</div>
						</div>

						<div class="crumina-module crumina-info-box info-box--standard-round icon-right negative-margin-right150">
							<div class="info-box-image">
								<img src="svg-icons/pictures.svg" alt="chat" class="utouch-icon">
							</div>
							<div class="info-box-content">
								<h5 class="info-box-title">Perfect Grafic View</h5>
								<p class="info-box-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
									nonummy nibh euismod.
								</p>
							</div>
						</div>
					</div>

					<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 align-center">
						<img class="particular-image" src="img/image.png" alt="image">
						<a href="03_products.html" class="btn btn--red btn--with-shadow">
							Learn More
						</a>
					</div>

					<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
						<div class="crumina-module crumina-info-box info-box--standard-round negative-margin-left150">
							<div class="info-box-image">
								<img src="svg-icons/clock.svg" alt="chat" class="utouch-icon">
							</div>
							<div class="info-box-content">
								<h5 class="info-box-title">Lifetime Updates</h5>
								<p class="info-box-text">Sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
									tincidunt.
								</p>
							</div>
						</div>

						<div class="crumina-module crumina-info-box info-box--standard-round negative-margin-left150">
							<div class="info-box-image">
								<img src="svg-icons/calendar.svg" alt="chat" class="utouch-icon">
							</div>
							<div class="info-box-content">
								<h5 class="info-box-title">Calendar Sinhronize</h5>
								<p class="info-box-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
									nonummy euismod.
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- ... Info Boxes -->


	<!-- Counters -->

	<section class="bg-secondary-color background-contain bg-10">

		<div class="container">
			<div class="row">
				<div class="counters">
					<div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
						<div class="crumina-module crumina-counter-item">
							<div class="counter-numbers counter c-yellow">
								<span data-speed="2000" data-refresh-interval="3" data-to="6237" data-from="2">6237</span>
							</div>
							<h5 class="counter-title">Line of codes</h5>
						</div>
					</div>
					<div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
						<div class="crumina-module crumina-counter-item">
							<div class="counter-numbers counter c-yellow">
								<span data-speed="2000" data-refresh-interval="3" data-to="4000" data-from="2">4000</span>
							</div>
							<h5 class="counter-title">Solutions</h5>
						</div>
					</div>
					<div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
						<div class="crumina-module crumina-counter-item">
							<div class="counter-numbers counter c-yellow">
								<span data-speed="2000" data-refresh-interval="3" data-to="3" data-from="2">3</span>
								<div class="units">M+</div>
							</div>
							<h5 class="counter-title">Active users</h5>
						</div>
					</div>
					<div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
						<div class="crumina-module crumina-counter-item">
							<div class="counter-numbers counter c-yellow">
								<span data-speed="2000" data-refresh-interval="3" data-to="8" data-from="2">8</span>
								<div class="units">M+</div>
							</div>
							<h5 class="counter-title">Download</h5>
						</div>
					</div>

					<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
						<h5 class="c-white">Utouch is an awesome app</h5>
						<p class="c-semitransparent-white">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy euismod.</p>
					</div>

				</div>
			</div>
		</div>

	</section>

	<!-- ... end  Counters -->


	<!-- FAQS Slider -->

	<section class="crumina-module crumina-module-slider pt100">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12 mb30">
					<div class="crumina-module crumina-heading">
						<h6 class="heading-sup-title">FAQ</h6>
						<h2 class="heading-title">Six important questions on application</h2>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="swiper-container navigation-bottom" data-effect="fade">
						<div class="slider-slides">
							<a href="#" class="slides-item">
								1
							</a>

							<a href="#" class="slides-item">
								2
							</a>

							<a href="#" class="slides-item">
								3
							</a>

							<a href="#" class="slides-item">
								4
							</a>

							<a href="#" class="slides-item">
								5
							</a>

							<a href="#" class="slides-item">
								6
							</a>
						</div>
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								<div class="col-lg-4 col-md-12 col-sm-12" data-swiper-parallax="-100">
									<div class="slider-faqs-thumb">
										<img class="utouch-icon" src="svg-icons/dial.svg" alt="image">
									</div>
								</div>

								<div class="col-lg-8 col-md-12 col-sm-12" data-swiper-parallax="-300">
									<h5 class="slider-faqs-title">soluta eleifend congue?</h5>

									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-12">
											<p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est
												notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas
												humanitatis.
											</p>
											<p>Gest etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.</p>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<p>Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius.</p>
											<ul class="list list--standard">
												<li>
													<svg class="utouch-icon utouch-icon-correct-symbol-1">
														<use xlink:href="#utouch-icon-correct-symbol-1"></use>
													</svg>
													<a href="#">Gectores legere me lius quod</a>
												</li>
												<li>
													<svg class="utouch-icon utouch-icon-correct-symbol-1">
														<use xlink:href="#utouch-icon-correct-symbol-1"></use>
													</svg>
													<a href="#">Mirum est notare quam</a>
												</li>
												<li>
													<svg class="utouch-icon utouch-icon-correct-symbol-1">
														<use xlink:href="#utouch-icon-correct-symbol-1"></use>
													</svg>
													<a href="#">Zril delenit augue duis</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="col-lg-4 col-md-12 col-sm-12" data-swiper-parallax="-100">
									<div class="slider-faqs-thumb">
										<img class="utouch-icon" src="svg-icons/fingerprint.svg" alt="image">
									</div>
								</div>

								<div class="col-lg-8 col-md-12 col-sm-12" data-swiper-parallax="-300">
									<h5 class="slider-faqs-title">Mirum quam gothica?</h5>
									<p>Ilaritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum
										est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum
										formas humanitatis. Gest etiam processus dynamicus, qui sequitur mutationem consuetudium
										lectorum.
									</p>

									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-12">
											<ul class="list list--standard">
												<li>
													<svg class="utouch-icon utouch-icon-correct-symbol-1">
														<use xlink:href="#utouch-icon-correct-symbol-1"></use>
													</svg>
													<a href="#">Gectores legere me lius quod</a>
												</li>
												<li>
													<svg class="utouch-icon utouch-icon-correct-symbol-1">
														<use xlink:href="#utouch-icon-correct-symbol-1"></use>
													</svg>
													<a href="#">Mirum est notare quam</a>
												</li>
												<li>
													<svg class="utouch-icon utouch-icon-correct-symbol-1">
														<use xlink:href="#utouch-icon-correct-symbol-1"></use>
													</svg>
													<a href="#">Zril delenit augue duis</a>
												</li>
											</ul>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<ul class="list list--standard">
												<li>
													<svg class="utouch-icon utouch-icon-correct-symbol-1">
														<use xlink:href="#utouch-icon-correct-symbol-1"></use>
													</svg>
													<a href="#">Mirum est notare quam</a>
												</li>
												<li>
													<svg class="utouch-icon utouch-icon-correct-symbol-1">
														<use xlink:href="#utouch-icon-correct-symbol-1"></use>
													</svg>
													<a href="#">Zril delenit augue duis</a>
												</li>
												<li>
													<svg class="utouch-icon utouch-icon-correct-symbol-1">
														<use xlink:href="#utouch-icon-correct-symbol-1"></use>
													</svg>
													<a href="#">Gectores legere me lius quod</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="col-lg-4 col-md-12 col-sm-12" data-swiper-parallax="-100">
									<div class="slider-faqs-thumb">
										<img class="utouch-icon" src="svg-icons/devices.svg" alt="image">
									</div>
								</div>

								<div class="col-lg-8 col-md-8 col-sm-12" data-swiper-parallax="-100">
									<h5 class="slider-faqs-title">Investigationes quod lectores?</h5>
									<p>Gest etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Claritas est
										etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare
										quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas
										humanitatis.
									</p>

									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="crumina-module crumina-info-box info-box--standard">
												<div class="info-box-image display-flex">
													<svg class="utouch-icon utouch-icon-checked">
														<use xlink:href="#utouch-icon-checked"></use>
													</svg>
													<h6 class="info-box-title">Quick Settings</h6>
												</div>
												<p class="info-box-text">Wisi enim ad minim veniam, quis nostrud exerci tation qui
													nunc nobis videntur parum clari.
												</p>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="crumina-module crumina-info-box info-box--standard">
												<div class="info-box-image display-flex">
													<svg class="utouch-icon utouch-icon-checked">
														<use xlink:href="#utouch-icon-checked"></use>
													</svg>
													<h6 class="info-box-title">Looks Perfect</h6>
												</div>
												<p class="info-box-text">Sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.</p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="col-lg-4 col-md-12 col-sm-12" data-swiper-parallax="-100">
									<div class="slider-faqs-thumb">
										<img class="utouch-icon" src="svg-icons/payment-method.svg" alt="image">
									</div>
								</div>

								<div class="col-lg-8 col-md-12 col-sm-12" data-swiper-parallax="-300">
									<h5 class="slider-faqs-title">Duis autem vel eum iriure?</h5>
									<p class="weight-bold">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum
										formas humanitatis. Gest etiam processus dynamicus, qui sequitur.
									</p>
									<p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum
										est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum
										formas humanitatis. Gest etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.
									</p>
									<a href="03_products.html" class="btn btn-border btn--with-shadow c-secondary">
										Learn More
									</a>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="col-lg-4 col-md-12 col-sm-12" data-swiper-parallax="-100">
									<div class="slider-faqs-thumb">
										<img class="utouch-icon" src="svg-icons/chat1.svg" alt="image">
									</div>
								</div>

								<div class="col-lg-8 col-md-12 col-sm-12" data-swiper-parallax="-300">
									<h5 class="slider-faqs-title">wisi minim veniam, quis nostrud?</h5>

									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-12">
											<p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium
												lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram,
												anteposuerit litterarum formas humanitatis.
											</p>
											<p>Gest etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.</p>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<p>Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius.</p>
											<div class="play-with-title">
												<a href="https://www.youtube.com/watch?v=wnJ6LuUFpMo" class="video-control js-popup-iframe">
													<img src="img/play.png" alt="play">
												</a>
												<h6 class="play-title">Watch the video of instruction</h6>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="col-lg-4 col-md-12 col-sm-12" data-swiper-parallax="-100">
									<div class="slider-faqs-thumb">
										<img class="utouch-icon" src="svg-icons/tap.svg" alt="image">
									</div>
								</div>

								<div class="col-lg-8 col-md-12 col-sm-12" data-swiper-parallax="-300">
									<h5 class="slider-faqs-title">Eodem typi nunc videntur?</h5>

									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-12">
											<p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium
												lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram,
												anteposuerit litterarum formas humanitatis.
											</p>
											<p>Gest etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.</p>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<p>Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius.</p>
											<ul class="list list--standard">
												<li>
													<svg class="utouch-icon utouch-icon-correct-symbol-1">
														<use xlink:href="#utouch-icon-correct-symbol-1"></use>
													</svg>
													<a href="#">Mirum est notare quam</a>
												</li>
												<li>
													<svg class="utouch-icon utouch-icon-correct-symbol-1">
														<use xlink:href="#utouch-icon-correct-symbol-1"></use>
													</svg>
													<a href="#">Zril delenit augue duis</a>
												</li>
												<li>
													<svg class="utouch-icon utouch-icon-correct-symbol-1">
														<use xlink:href="#utouch-icon-correct-symbol-1"></use>
													</svg>
													<a href="#">Gectores legere me lius quod</a>
												</li>
											</ul>
										</div>
									</div>
								</div>

							</div>

						</div>

						<!--Prev next buttons-->

						<div class="btn-slider-wrap navigation-left-bottom">

							<div class="btn-prev">
								<svg class="utouch-icon icon-hover utouch-icon-arrow-left-1">
									<use xlink:href="#utouch-icon-arrow-left-1"></use>
								</svg>
								<svg class="utouch-icon utouch-icon-arrow-left1">
									<use xlink:href="#utouch-icon-arrow-left1"></use>
								</svg>
							</div>

							<div class="btn-next">
								<svg class="utouch-icon icon-hover utouch-icon-arrow-right-1">
									<use xlink:href="#utouch-icon-arrow-right-1"></use>
								</svg>
								<svg class="utouch-icon utouch-icon-arrow-right1">
									<use xlink:href="#utouch-icon-arrow-right1"></use>
								</svg>
							</div>

						</div>

					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- ... end FAQS Slider -->


	<!-- Info Boxes -->

	<section class="crumina-module crumina-module-slider bg-blue-lighteen background-contain bg-11 medium-padding100">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
					<div class="crumina-module crumina-heading">
						<h6 class="heading-sup-title">Screenshots</h6>
						<h2 class="heading-title">Beautiful interface</h2>
						<p class="heading-text">Claritas est etiam processus dynamicus, qui sequitur mutationem
							consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram,
							anteposuerit litterarum formas humanitatis per est usus legentis in iis qui facit eorum
							claritatem.
						</p>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="crumina-module crumina-info-box info-box--standard">
								<div class="info-box-image display-flex">
									<svg class="utouch-icon utouch-icon-checked">
										<use xlink:href="#utouch-icon-checked"></use>
									</svg>
									<h6 class="info-box-title">Quick Settings</h6>
								</div>
								<p class="info-box-text">Wisi enim ad minim veniam, quis nostrud exerci tation qui
									nunc nobis videntur parum clari.
								</p>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="crumina-module crumina-info-box info-box--standard">
								<div class="info-box-image display-flex">
									<svg class="utouch-icon utouch-icon-checked">
										<use xlink:href="#utouch-icon-checked"></use>
									</svg>
									<h6 class="info-box-title">Looks Perfect</h6>
								</div>
								<p class="info-box-text">Sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.</p>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-5 col-lg-offset-1 col-md-12 col-md-offset-0 col-sm-12 col-xs-12">
					<div class="swiper-container pagination-bottom slider-tripple-right-image" data-show-items="1" data-effect="coverflow" data-centered-slider="false" data-stretch="170" data-depth="195">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								<img src="img/img-slide1.png" alt="slide">
							</div>
							<div class="swiper-slide">
								<img src="img/img-slide1.png" alt="slide">
							</div>
							<div class="swiper-slide">
								<img src="img/img-slide1.png" alt="slide">
							</div>
						</div>
						<!-- If we need pagination -->
						<div class="swiper-pagination"></div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- ... end Info Boxes -->


	<!-- Pricing Tables -->

	<section class="background-contain bg-13 medium-padding100">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-sm-offset-0 col-xs-12 mb60">
					<div class="crumina-module crumina-heading align-center">
						<h6 class="heading-sup-title">Our Pricing Plans</h6>
						<h2 class="heading-title">Choose the product that you really need!</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="pricing-wrap">
					<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
						<div class="crumina-module crumina-pricing-tables-item pricing-tables-item-standard">
							<div class="main-pricing-content">
								<h2 class="h1 rate">$<span class="price">0</span></h2>
								<h5 class="pricing-title">Freebie Plan</h5>

								<div class="pricing-line bg-green"></div>

								<p class="pricing-description">Mirum est notare quam littera gothica, quam nunc putamus parum.</p>

								<p class="sub-description">Ut wisi enim ad minim veniam, nostrud ullamcorper.</p>

							</div>

							<div class="bg-pricing-content bg-green">
								<a href="15_pricing_tables.html" class="h6 title">Get trial version</a>
							</div>

						</div>
					</div>
					<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
						<div class="crumina-module crumina-pricing-tables-item pricing-tables-item-standard main-plan">
							<div class="main-pricing-content">
								<h2 class="h1 rate">$<span class="price">49</span></h2>
								<h5 class="pricing-title">Premium Plan</h5>

								<div class="pricing-line bg-pamaranch"></div>

								<p class="pricing-description">Claritas est etiam processus dynamicus, qui sequitur legere me lius quod.</p>

								<ul class="pricing-tables-position">
									<li class="position-item">
										Unlimited Free Update
									</li>
									<li class="position-item">
										Unlimited Disk Dreator
									</li>
									<li class="position-item">
										Unlimited User Support
									</li>
									<li class="position-item">
										Money Transfer System
									</li>
									<li class="position-item">
										Unlimited Support
									</li>
								</ul>

								<p class="sub-description">Ut wisi enim ad minim veniam, nostrud ullamcorper.</p>
							</div>

							<div class="bg-pricing-content bg-pamaranch">
								<a href="#" class="h6 title">Become a member</a>
							</div>

						</div>
					</div>
					<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
						<div class="crumina-module crumina-pricing-tables-item pricing-tables-item-standard">
							<div class="main-pricing-content">
								<h2 class="h1 rate">$<span class="price">29</span></h2>
								<h5 class="pricing-title">Business Plan</h5>

								<div class="pricing-line bg-red"></div>

								<p class="pricing-description">Investigationes demonstraverunt lectores legere.</p>

								<ul class="pricing-tables-position">
									<li class="position-item del">
										Unlimited Free Update
									</li>
									<li class="position-item">
										Unlimited Disk Dreator
									</li>
									<li class="position-item">
										Unlimited User Support
									</li>
									<li class="position-item del">
										Money Transfer System
									</li>
									<li class="position-item">
										Unlimited Support
									</li>
								</ul>

							</div>

							<div class="bg-pricing-content bg-red">
								<a href="#" class="h6 title">Buy It Now!</a>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- ... end Pricing Tables -->


	<!-- Testimonials -->

	<section class="crumina-module crumina-module-slider bg-4 cloud-center navigation-center-both-sides medium-padding100">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-sm-offset-0">
					<div class="swiper-container" data-effect="fade">
						<div class="swiper-wrapper">
							<div class="crumina-module crumina-testimonial-item testimonial-item-author-top swiper-slide">

								<div class="testimonial-img-author" data-swiper-parallax="-100">
									<img src="img/author2.png" alt="avatar">
								</div>

								<h6 class="testimonial-text" data-swiper-parallax="-300">
									Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est
									etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum parum claram.
								</h6>

								<div class="author-info-wrap" data-swiper-parallax="-100">

									<div class="author-info">
										<a href="#" class="h6 author-name">Doe Simpson</a>
										<div class="author-company">Student, 23 years old</div>
									</div>

								</div>
							</div>

							<div class="crumina-module crumina-testimonial-item testimonial-item-author-top swiper-slide">

								<div class="testimonial-img-author" data-swiper-parallax="-100">
									<img src="img/author2.png" alt="avatar">
								</div>

								<h6 class="testimonial-text" data-swiper-parallax="-300">
									Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est
									etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum parum claram.
								</h6>

								<div class="author-info-wrap" data-swiper-parallax="-100">

									<div class="author-info">
										<a href="#" class="h6 author-name">Doe Simpson</a>
										<div class="author-company">Student, 23 years old</div>
									</div>

								</div>
							</div>

							<div class="crumina-module crumina-testimonial-item testimonial-item-author-top swiper-slide">

								<div class="testimonial-img-author" data-swiper-parallax="-100">
									<img src="img/author2.png" alt="avatar">
								</div>

								<h6 class="testimonial-text" data-swiper-parallax="-300">
									Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est
									etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum parum claram.
								</h6>

								<div class="author-info-wrap" data-swiper-parallax="-100">

									<div class="author-info">
										<a href="#" class="h6 author-name">Doe Simpson</a>
										<div class="author-company">Student, 23 years old</div>
									</div>

								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

		<!--Prev next buttons-->

		<div class="btn-prev">
			<svg class="utouch-icon icon-hover utouch-icon-arrow-left-1">
				<use xlink:href="#utouch-icon-arrow-left-1"></use>
			</svg>
			<svg class="utouch-icon utouch-icon-arrow-left1">
				<use xlink:href="#utouch-icon-arrow-left1"></use>
			</svg>
		</div>

		<div class="btn-next">
			<svg class="utouch-icon icon-hover utouch-icon-arrow-right-1">
				<use xlink:href="#utouch-icon-arrow-right-1"></use>
			</svg>
			<svg class="utouch-icon utouch-icon-arrow-right1">
				<use xlink:href="#utouch-icon-arrow-right1"></use>
			</svg>
		</div>
	</section>

	<!-- ... end Testimonials -->


	<!-- Subscribe Form -->

	<section class="bg-primary-color background-contain bg-14 crumina-module crumina-module-subscribe-form">
		<div class="container">
			<div class="row">
				<div class="subscribe-form">
					<div class="subscribe-main-content">
						<img class="subscribe-img" src="img/subscribe-img.png" alt="image">

						<div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
							<div class="crumina-module crumina-heading">
								<h2 class="heading-title">Love offers and discounts? Subscribe and save.</h2>
								<p class="heading-text">Claritas est etiam processus dynamicus, qui sequitur mutationem
									consuetudium lectorum putamus claram.
								</p>
							</div>

							<form class="form-validate form-inline subscribe-form-js" method="post" action="import.php">
								<input name="email" placeholder="Enter your email address" type="email">
								<button class="btn btn--green-light">
									Subscribe
								</button>
							</form>
						</div>

					</div>
					<div class="subscribe-layer"></div>
				</div>
			</div>
		</div>
	</section>

	<!-- End Subscribe Form -->


	<!-- Promo Block -->

	<section class="background-cover bg-blue-lighteen bg-12 align-center medium-padding120">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-12">
					<div class="crumina-module crumina-heading">
						<h2 class="heading-title">Download the <span class="c-primary">Utouch</span> Now!</h2>
						<p class="heading-text">Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium
							lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum.
						</p>
					</div>

					<a href="#" class="btn btn-market btn--with-shadow">
						<svg class="utouch-icon utouch-icon-apple-logotype-1">
							<use xlink:href="#utouch-icon-apple-logotype-1"></use>
						</svg>
						<div class="text">
							<span class="sup-title">Download on the</span>
							<span class="title">App Store</span>
						</div>
					</a>

					<a href="#" class="btn btn-market btn--with-shadow">
						<img class="utouch-icon" src="svg-icons/google-play.svg" alt="google">
						<div class="text">
							<span class="sup-title">Download on the</span>
							<span class="title">Google Play</span>
						</div>
					</a>
				</div>
			</div>
		</div>
	</section>

	<!-- ... end Promo Block -->

</div>


<!-- Footer -->

<footer class="footer" id="site-footer">
	<div class="header-lines-decoration">
		<span class="bg-secondary-color"></span>
		<span class="bg-blue"></span>
		<span class="bg-blue-light"></span>
		<span class="bg-orange-light"></span>
		<span class="bg-red"></span>
		<span class="bg-green"></span>
		<span class="bg-secondary-color"></span>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
				<div class="widget w-info">
					<div class="site-logo">
						<a href="index.html" class="full-block"></a>
						<div class="logo-text">
							<div class="logo-title">Digizigs</div>
							<div class="logo-sub-title">Webtech</div>
						</div>
					</div>

					<p>Claritas est etiam processus dynamicus, qui sequitur mutationem
						consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram,
						anteposuerit litterarum formas humanitatis per. Investigationes demonstraverunt lectores
						legere me lius quod ii legunt saepius.
					</p>

					<a href="02_company.html" class="learn-more">Learn more about Digizigs</a>
				</div>

			</div>

			<div class="col-lg-2 col-lg-offset-1 col-md-3 col-sm-12 col-sm-offset-0 col-xs-12">
				<div class="widget w-list">

					<h5 class="widget-title">Userful Links</h5>
					<ul class="list list--primary">
						<li>
							<a href="index.html">Home</a>
							<svg class="utouch-icon utouch-icon-arrow-right">
								<use xlink:href="#utouch-icon-arrow-right"></use>
							</svg>
						</li>
						<li>
							<a href="02_company.html">Company</a>
							<svg class="utouch-icon utouch-icon-arrow-right">
								<use xlink:href="#utouch-icon-arrow-right"></use>
							</svg>
						</li>
						<li>
							<a href="03_products.html">Products</a>
							<svg class="utouch-icon utouch-icon-arrow-right">
								<use xlink:href="#utouch-icon-arrow-right"></use>
							</svg>
						</li>
						<li>
							<a href="08_events.html">Events</a>
							<svg class="utouch-icon utouch-icon-arrow-right">
								<use xlink:href="#utouch-icon-arrow-right"></use>
							</svg>
						</li>
						<li>
							<a href="15_pricing_tables.html">Pricing</a>
							<svg class="utouch-icon utouch-icon-arrow-right">
								<use xlink:href="#utouch-icon-arrow-right"></use>
							</svg>
						</li>
						<li>
							<a href="16_news.html">News</a>
							<svg class="utouch-icon utouch-icon-arrow-right">
								<use xlink:href="#utouch-icon-arrow-right"></use>
							</svg>
						</li>
						<li>
							<a href="18_contacts.html">Contacts</a>
							<svg class="utouch-icon utouch-icon-arrow-right">
								<use xlink:href="#utouch-icon-arrow-right"></use>
							</svg>
						</li>
					</ul>
				</div>
			</div>

			<div class="col-lg-3 col-lg-offset-1 col-md-4 col-sm-12 col-sm-offset-0 col-xs-12">
				<div class="widget w-contacts">

					<h5 class="widget-title">Contact with us</h5>
					<div class="contact-item display-flex">
						<svg class="utouch-icon utouch-icon-telephone-keypad-with-ten-keys">
							<use xlink:href="#utouch-icon-telephone-keypad-with-ten-keys"></use>
						</svg>
						<span class="info">8 800 567.890.11</span>
					</div>
					<div class="contact-item display-flex">
						<svg class="utouch-icon utouch-icon-message-closed-envelope-1">
							<use xlink:href="#utouch-icon-message-closed-envelope-1"></use>
						</svg>
						<span class="info">support@utouch.com</span>
					</div>

					<a href="#" class="btn btn--green full-width btn--with-shadow js-message-popup cd-nav-trigger">
						Send a Message
					</a>
				</div>

				<div class="widget w-follow">
					<ul>
						<li>Follow Us:</li>
						<li>
							<a href="#">
								<svg class="utouch-icon" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.414">
									<path d="M15.117 0H.883C.395 0 0 .395 0 .883v14.234c0 .488.395.883.883.883h7.663V9.804H6.46V7.39h2.086V5.607c0-2.066 1.262-3.19 3.106-3.19.883 0 1.642.064 1.863.094v2.16h-1.28c-1 0-1.195.48-1.195 1.18v1.54h2.39l-.31 2.42h-2.08V16h4.077c.488 0 .883-.395.883-.883V.883C16 .395 15.605 0 15.117 0" fill-rule="nonzero"></path>
								</svg>
							</a>
						</li>
						<li>
							<a href="#">
								<svg class="utouch-icon" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.414">
									<path d="M16 3.038c-.59.26-1.22.437-1.885.517.677-.407 1.198-1.05 1.443-1.816-.634.37-1.337.64-2.085.79-.598-.64-1.45-1.04-2.396-1.04-1.812 0-3.282 1.47-3.282 3.28 0 .26.03.51.085.75-2.728-.13-5.147-1.44-6.766-3.42C.83 2.58.67 3.14.67 3.75c0 1.14.58 2.143 1.46 2.732-.538-.017-1.045-.165-1.487-.41v.04c0 1.59 1.13 2.918 2.633 3.22-.276.074-.566.114-.865.114-.21 0-.41-.02-.61-.058.42 1.304 1.63 2.253 3.07 2.28-1.12.88-2.54 1.404-4.07 1.404-.26 0-.52-.015-.78-.045 1.46.93 3.18 1.474 5.04 1.474 6.04 0 9.34-5 9.34-9.33 0-.14 0-.28-.01-.42.64-.46 1.2-1.04 1.64-1.7z" fill-rule="nonzero"></path>
								</svg>
							</a>
						</li>
						<li>
							<a href="#">
								<svg class="utouch-icon" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.414">
									<path d="M8.16 6.857V9.6h4.537c-.183 1.177-1.37 3.45-4.537 3.45-2.73 0-4.96-2.26-4.96-5.05s2.23-5.05 4.96-5.05c1.554 0 2.594.66 3.19 1.233l2.17-2.092C12.126.79 10.32 0 8.16 0c-4.423 0-8 3.577-8 8s3.577 8 8 8c4.617 0 7.68-3.246 7.68-7.817 0-.526-.057-.926-.126-1.326H8.16z"></path>
								</svg>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>

	</div>

	<div class="sub-footer">
		<a class="back-to-top" href="#">
			<svg class="utouch-icon utouch-icon-arrow-top">
				<use xlink:href="#utouch-icon-arrow-top"></use>
			</svg>
		</a>
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <span>
                    Copyright © 2017 <a href="index.html" class="sub-footer__link">DigiZigs</a>
                </span>
				</div>
			</div>
		</div>
	</div>

</footer>

<!-- End Footer -->


<!-- Send Message Popup -->

<div class="window-popup message-popup">
	<a href="#" class="popup-close js-popup-close cd-nav-trigger">
		<svg class="utouch-icon utouch-icon-cancel-1">
			<use xlink:href="#utouch-icon-cancel-1"></use>
		</svg>
	</a>

	<div class="send-message-popup">
		<h5>Send a Message</h5>
		<p>Sed diam nonummy nibh euismod tincidunt ut laoreet dolore magnais.</p>
		<form class="form-validate contact-form" method="post" action="send_mail.php">
			<div class="with-icon">
				<input name="name" placeholder="Your Name" type="text" required="required">
				<svg class="utouch-icon utouch-icon-user">
					<use xlink:href="#utouch-icon-user"></use>
				</svg>
			</div>

			<div class="with-icon">
				<input name="email" placeholder="Email Adress" type="text" required="required">
				<svg class="utouch-icon utouch-icon-message-closed-envelope-1">
					<use xlink:href="#utouch-icon-message-closed-envelope-1"></use>
				</svg>
			</div>

			<div class="with-icon">
				<input class="with-icon" name="phone" placeholder="Phone Number" type="tel" required="required">
				<svg class="utouch-icon utouch-icon-telephone-keypad-with-ten-keys">
					<use xlink:href="#utouch-icon-telephone-keypad-with-ten-keys"></use>
				</svg>
			</div>

			<div class="with-icon">
				<input class="with-icon" name="subject" placeholder="Subject" type="text" required="required">
				<svg class="utouch-icon utouch-icon-icon-1">
					<use xlink:href="#utouch-icon-icon-1"></use>
				</svg>
			</div>

			<div class="with-icon">
				<textarea name="message" required="" placeholder="Your Message" style="height: 180px;"></textarea>
				<svg class="utouch-icon utouch-icon-edit">
					<use xlink:href="#utouch-icon-edit"></use>
				</svg>
			</div>

			<button class="btn btn--green btn--with-shadow full-width">
				Send a Message
			</button>

		</form>
	</div>
</div>

<!-- Send Message Popup -->


<!-- Search Popup -->

<div class="search-popup search--dark">
	<a href="#" class="popup-close js-popup-close cd-nav-trigger">
		<svg class="utouch-icon utouch-icon-cancel-1">
			<use xlink:href="#utouch-icon-cancel-1"></use>
		</svg>
	</a>

	<div class="search-full-screen">

		<div class="search-standard">

			<form id="search-header-1" name="form-search-header" method="post">
				<div class="typeahead__container">
					<div class="typeahead__field">

						<span class="typeahead__query">
							<input class="js-typeahead" name="utouch_posts[query]" placeholder="What are you looking for?" autocomplete="off" type="search" autofocus>
						</span>
						<button type="submit" class="form-icon">
							<svg class="utouch-icon utouch-icon-search">
								<use xlink:href="#utouch-icon-search"></use>
							</svg>
						</button>
						<span class="close js-popup-clear-input form-icon">
							<svg class="utouch-icon utouch-icon-cancel-1"><use xlink:href="#utouch-icon-cancel-1"></use></svg>
						</span>

					</div>
				</div>
			</form>
		</div>

	</div>

</div>


<!-- ... end Search Popup -->




<!-- ... end Used SVG-icons -->


<!-- jQuery first, then Other JS. -->

<script src="{{asset('public/themes/digizigs/js/jquery-3.3.1.js')}}"></script>

<!-- jQuery-scripts for Template -->

<script src="{{asset('public/themes/digizigs/js/js-plugins/ajax-pagination.js')}}"></script>
<script src="{{asset('public/themes/digizigs/js/js-plugins/jquery.countdown.min.js')}}"></script>
<script src="{{asset('public/themes/digizigs/js/js-plugins/timer.js')}}"></script>
<script src="{{asset('public/themes/digizigs/js/js-plugins/crum-mega-menu.js')}}"></script>
<script src="{{asset('public/themes/digizigs/js/js-plugins/swiper.jquery.min.js')}}"></script>
<script src="{{asset('public/themes/digizigs/js/js-plugins/jquery.typeahead.js')}}"></script>
<script src="{{asset('public/themes/digizigs/js/js-plugins/velocity.min.js')}}"></script>
<script src="{{asset('public/themes/digizigs/js/js-plugins/form-actions.js')}}"></script>
<script src="{{asset('public/themes/digizigs/js/js-plugins/waypoints.js')}}"></script>
<script src="{{asset('public/themes/digizigs/js/js-plugins/jquery-countTo.js')}}"></script>
<script src="{{asset('public/themes/digizigs/js/js-plugins/jquery.nice-select.js')}}"></script>
<script src="{{asset('public/themes/digizigs/js/js-plugins/imagesLoaded.js')}}"></script>
<script src="{{asset('public/themes/digizigs/js/js-plugins/jquery.magnific-popup.js')}}"></script>
<script src="{{asset('public/themes/digizigs/js/js-plugins/jquery.matchHeight.js')}}"></script>
<script src="{{asset('public/themes/digizigs/js/js-plugins/Headroom.js')}}"></script>
<script src="{{asset('public/themes/digizigs/js/js-plugins/smooth-scroll.js')}}"></script>
<script src="{{asset('public/themes/digizigs/js/js-plugins/segment.js')}}"></script>
<script src="{{asset('public/themes/digizigs/js/js-plugins/bootstrap.js')}}"></script>
<script src="{{asset('public/themes/digizigs/js/js-plugins/moment.js')}}"></script>
<script src="{{asset('public/themes/digizigs/js/js-plugins/moment-timezone.js')}}"></script>
<script src="{{asset('public/themes/digizigs/js/js-plugins/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('public/themes/digizigs/js/js-plugins/ion.rangeSlider.js')}}"></script>
<script src="{{asset('public/themes/digizigs/js/js-plugins/parsley.min.js')}}"></script>



<script src="{{asset('public/themes/digizigs/js/main.js')}}"></script>


</body>
</html>

