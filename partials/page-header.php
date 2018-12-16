<!-- Sub header for other pages -->
<div
    class="page-header parallax dark larger2x larger-desc"
    data-bgattach="<?php

        if(has_post_thumbnail()){
            the_post_thumbnail_url();
        }
        else {
            echo ASSETS_PATH . '/images/backgrounds/shop-header.jpg';
        }

    ?>"
    data-0="background-position:50% 0px;"
    data-500="background-position:50% -100%">
    <div class="container" data-0="opacity:1;" data-top="opacity:0;">
        <div class="row">
            <div class="col-md-6">
                <h1><?php the_title(); ?></h1>
                <p class="page-header-desc">Check out your shopping cart.</p>
            </div><!-- End .col-md-6 -->
            <div class="col-md-6">
                <?= woocommerce_breadcrumb(); ?>
            </div><!-- End .col-md-6 -->
        </div><!-- End .row -->
    </div><!-- End .container -->
</div>