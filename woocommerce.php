<?php get_header('page'); ?>

<?php get_template_part('partials/shop-header'); ?>

<div class="container">
    <div class="row">
        <div
                class="
                <?php if(!is_shop() && !is_archive()): ?>
                    col-xs-12 col-md-12
                <?php else: ?>
                    col-md-9 col-md-push-3
                <?php endif ?>
                "
        >
            <?php if(is_shop() || is_archive()): ?>
                <?php get_template_part('partials/product-sort'); ?>
            <?php endif; ?>

            <div class="row">
                <?php woocommerce_content(); ?>
            </div><!-- End .row -->

            <div class="mb30"></div><!-- space -->

        </div><!-- End .col-md-9 -->

        <div class="mb30 visible-sm visible-xs"></div><!-- space -->

        <?php if(is_shop() || is_archive()): ?>
            <?php get_sidebar(); ?>
        <?php endif; ?>
    </div><!-- End .row -->

</div><!-- End .container -->

<div class="mb40 hidden-xs hidden-sm"></div><!-- space -->


<?php get_footer(); ?>
