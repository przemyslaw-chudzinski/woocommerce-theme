<?php get_header('page'); ?>
<div class="page-header parallax dark larger2x larger-desc" data-bgattach="<?= ASSETS_PATH ?>/images/backgrounds/page-header.jpg" data-0="background-position:50% 0px;" data-500="background-position:50% -100%">
	<div class="container" data-0="opacity:1;" data-top="opacity:0;">
		<div class="row">
			<div class="col-md-6">
				<h1>404 Page</h1>
				<p class="page-header-desc">There is no page in here.. Go somewhere else..</p>
			</div><!-- End .col-md-6 -->
			<div class="col-md-6">
				<?= woocommerce_breadcrumb(); ?>
			</div><!-- End .col-md-6 -->
		</div><!-- End .row -->
	</div><!-- End .container -->
</div><!-- End .page-header -->

<div class="error-page text-center">
	<div class="container">
		<h2 class="error-title">404</h2>
		<h3 class="error-subtitle">Page Not Found</h3>

		<p class="error-text center-block">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos animi, enim ullam consequatur ad ipsa quaerat voluptatem. Nulla similique assumenda alias perferendis voluptatibus voluptates neque voluptatem nesciunt, atque suscipit unde.</p>

		<form action="#">
			<div class="form-group">
				<input class="form-control input-lg input-border-bottom text-center" type="text" placeholder="Search in here...">
			</div><!-- end .form-group -->
			<div class="form-group">
				<input type="submit" class="btn btn-dark no-radius min-width" value="Search Now">
			</div><!-- end .form-group -->
		</form>
	</div><!-- End .container -->
</div><!-- End .error-page -->
<?php get_footer(); ?>
