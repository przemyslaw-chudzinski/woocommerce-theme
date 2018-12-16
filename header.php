<!DOCTYPE html>
<!--[if IE 9]> <html class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title><?php bloginfo('title'); ?></title>
	<meta name="description" content="<?php bloginfo('description'); ?>">

	<!--[if IE]> <meta http-equiv="X-UA-Compatible" content="IE=edge"> <![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php if(is_search()): ?>
        <meta name="robots" content="noindex, nofollow">
    <?php endif; ?>

	<!-- Google Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Lato:400,300,700,900,300italic,400italic,700italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,400italic,600italic,700italic,600,800,300,700,800italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light' rel='stylesheet' type='text/css'>
	<!-- Google Fonts -->

<!--    <link rel="stylesheet" href="--><?//= ASSETS_PATH ?><!--/css/bundle.min.css">-->

	<!-- Favicon and Apple Icons -->
	<link rel="icon" type="image/png" href="<?= ASSETS_PATH ?>/images/icons/favicon.png">
	<link rel="apple-touch-icon" sizes="57x57" href="<?= ASSETS_PATH ?>/images/icons/faviconx57.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?= ASSETS_PATH ?>/images/icons/faviconx72.png">

	<!-- Modernizr -->
	<script src="<?= ASSETS_PATH ?>/js/vendor/modernizr.js"></script>

    <?php wp_head(); ?>

</head>
<body>
<div id="wrapper">
	<header id="header" role="banner">
		<div class="collapse navbar-white special-for-mobile" id="header-search-form">
			<div class="container">
				<form action="<?php bloginfo('url') ?>" class="navbar-form animated fadeInDown" >
					<input type="search" id="s" name="s" class="form-control" placeholder="Search in here...">
                    <input type="hidden" name="post_type" value="product">
					<button type="submit" class="btn-circle" title="Search"><i class="fa fa-search"></i></button>
				</form>
			</div><!-- End .container -->
		</div><!-- End #header-search-form -->
		<nav class="navbar navbar-white navbar-transparent animated-dropdown ttb-dropdown" role="navigation">

			<div class="navbar-top clearfix">
				<div class="container">
					<div class="pull-left">
                        <ul class="navbar-top-nav clearfix hidden-sm hidden-xs">
							<?php if(is_user_logged_in()): ?>
                                <li><a href="<?= belli_get_my_account_url(); ?>"><i class="fa fa-user"></i>My Account</a></li>
							<?php else: ?>
                                <li><a href="<?= belli_get_my_account_url(); ?>"><i class="fa fa-external-link"></i>Login</a></li>
                                <li><a href="#"><i class="fa fa-terminal"></i>Register</a></li>
							<?php endif; ?>
                            <!--							<li><a href="#"><i class="fa fa-gift"></i>My Wishlist</a></li>-->
                        </ul>
						<div class="dropdown account-dropdown visible-sm visible-xs">
							<a class="dropdown-toggle" href="#" id="account-dropdown" data-toggle="dropdown" aria-expanded="true">
								<i class="fa fa-user"></i>My Account
								<span class="angle"></span>
							</a>
							<ul class="dropdown-menu" role="menu" aria-labelledby="account-dropdown">
								<li role="presentation"><a role="menuitem" tabindex="-1" href="shop-dashboard.html"><i class="fa fa-user"></i>My Account</a></li>
								<li role="presentation"><a role="menuitem" tabindex="-1" href="login.html"><i class="fa fa-external-link"></i>Login</a></li>
								<li role="presentation"><a role="menuitem" tabindex="-1" href="register.html"><i class="fa fa-terminal"></i>Register</a></li>
								<li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="fa fa-gift"></i>My Wishlist</a></li>
							</ul>
						</div><!-- End .account-dropdown -->
					</div><!-- End .pull-left -->

					<div class="pull-right">
						<div class="social-icons pull-right hidden-xs">
                            <?php get_template_part('partials/social-media-icons'); ?>
						</div><!-- End .social-icons -->


					</div><!-- End .pull-right -->
				</div><!-- End .container -->
			</div><!-- End .navbar-top -->

			<div class="navbar-inner sticky-menu">
				<div class="container">
					<div class="navbar-header">

						<button type="button" class="navbar-toggle btn-circle pull-right collapsed" data-toggle="collapse" data-target="#main-navbar-container">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
						</button>

						<a class="navbar-brand text-uppercase" href="<?= home_url(); ?>" title="Boss - Multipurpose Premium Html5 Template">Boss</a>

						<button type="button" class="navbar-btn btn-icon btn-circle pull-right last visible-sm visible-xs" data-toggle="collapse" data-target="#header-search-form"><i class="fa fa-search"></i></button>

						<div class="dropdown cart-dropdown visible-sm visible-xs pull-right">
							<button type="button" class="navbar-btn btn-icon btn-circle dropdown-toggle" data-toggle="dropdown"><i class="fa fa-shopping-cart"></i><span class="badge">2</span></button>
							<div class="dropdown-menu cart-dropdown-menu" role="menu">
								<p class="cart-dropdown-desc"><i class="fa fa-cart-plus"></i>You have 2 product(s) in your cart:</p>
								<hr>
								<div class="product clearfix">
									<a href="#" class="remove-btn" title="Remove"><i class="fa fa-close"></i></a>
									<figure>
										<a href="product.html" title="Product Name"><img class="img-responsive" src="<?= ASSETS_PATH ?>/images/products/thumbs/product1.jpg" alt="Product image"></a>
									</figure>
									<div class="product-meta">
										<h4 class="product-name"><a href="product.html">Seamsun 3d Smart Tv</a></h4>
										<div class="product-quantity">x 2 piece(s)</div><!-- End .product-quantity -->
										<div class="product-price-container">
											<span class="product-price">$80.50</span>
											<span class="product-old-price">$120.50</span>
										</div><!-- End .product-price-container -->
									</div><!-- End .product-meta -->
								</div><!-- End .product -->
								<div class="product clearfix">
									<a href="#" class="remove-btn" title="Remove"><i class="fa fa-close"></i></a>
									<figure>
										<a href="product.html" title="Product Name"><img class="img-responsive" src="images/products/thumbs/product1.jpg" alt="Product image"></a>
									</figure>
									<div class="product-meta">
										<h4 class="product-name"><a href="product.html">Banana Smart Watch</a></h4>
										<div class="product-quantity">x 1 piece(s)</div><!-- End .product-quantity -->
										<div class="product-price-container">
											<span class="product-price">$120.99</span>
										</div><!-- End .product-price-container -->
									</div><!-- End .product-meta -->
								</div><!-- End .product -->
								<hr>
								<div class="cart-action">
									<div class="pull-left cart-action-total">
										<span>Total:</span> $281.99
									</div><!-- End .pull-left -->
									<div class="pull-right">
										<a href="#" class="btn btn-custom ">Go to Cart</a>
									</div>
								</div><!-- End .cart-action -->
							</div><!-- End .dropdown-menu -->
						</div><!-- End .cart-dropdown -->


					</div><!-- End .navbar-header -->

					<div class="collapse navbar-collapse" id="main-navbar-container">
                        <?= belli_get_primary_menu() ?>

						<button type="button" class="navbar-btn btn-icon btn-circle navbar-right last  hidden-sm hidden-xs" data-toggle="collapse" data-target="#header-search-form"><i class="fa fa-search"></i></button>

                        <?php dynamic_sidebar('belli-shopping-cart-area'); ?>

					</div><!-- /.navbar-collapse -->
				</div><!-- /.container -->
			</div><!-- End .navbar-inner -->
		</nav>
	</header><!-- End #header -->
    <div id="content" role="main">