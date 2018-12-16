<?php get_header('page'); ?>
<!-- Sub header for other pages -->
<div class="page-header parallax dark larger2x larger-desc" data-bgattach="<?= ASSETS_PATH ?>/images/backgrounds/shop-header.jpg" data-0="background-position:50% 0px;" data-500="background-position:50% -100%">
	<div class="container" data-0="opacity:1;" data-top="opacity:0;">
		<div class="row">
			<div class="col-md-6">
				<h1>Wyniki wyszukiwania dla <small class="hidden-xs">
						<?php

							if(isset($_GET['s'])){
								echo $_GET['s'];
							}

						?>
					</small></h1>
				<p class="page-header-desc"></p>
			</div><!-- End .col-md-6 -->
			<div class="col-md-6">
<!--				--><?//= woocommerce_breadcrumb(); ?>
			</div><!-- End .col-md-6 -->
		</div><!-- End .row -->
	</div><!-- End .container -->
</div>

<div class="container">
	Strona wyników wyszukiwania w budowie
</div>

<?php get_footer(); ?>


