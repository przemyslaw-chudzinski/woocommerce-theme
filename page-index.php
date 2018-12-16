<?php
/**
 * Template Name: Main site of the shop
 *
 */

global $redux;
?>

<?php get_header(); ?>
<?php wc_get_template_part('partials/banner'); ?>


<div class="container" id="content-products">
    <div class="row">
        <div class="col-md-12">
            <header class="title-block">
                <?php if(isset($redux['home-products-header']) && !empty($redux['home-products-header'])): ?>
                    <h2 class="h1 title-border custom mb10"><span><?= $redux['home-products-header'] ?></span></h2>
                <?php endif; ?>
                <?php if(isset($redux['home-products-desc']) && !empty($redux['home-products-desc'])): ?>
                    <p><?= $redux['home-products-desc'] ?></p>
                <?php endif; ?>
            </header>
            <?php belli_index_content(); ?>
        </div>
    </div>
</div>

<div class="mb25"></div><!-- space -->

<?php

/**
 * belli_woocommerce_after_products_list hook.
 *
 * @hooked belli_woocommerce_template_newsletter - 10
 * @hooked belli_woocommerce_popular_products - 20
 */
do_action( 'belli_woocommerce_after_products_list' );

?>
<?php get_footer(); ?>
