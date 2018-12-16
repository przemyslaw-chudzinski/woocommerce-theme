<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<?php if($popular_products): ?>
    <div class="container">
        <header class="title-block">
            <h2 class="h1 title-border custom mb10"><span>Popular Porducts</span></h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </header>

    <?php belli_woocommerce_popular_product_loop_start(); ?>
    <?php foreach ($popular_products as $popular_product): ?>
        <?php
            $post_object = get_post( $popular_product->ID );
            setup_postdata( $GLOBALS['post'] =& $post_object );
            wc_get_template_part( 'content-popular-product');
        ?>
        <?php endforeach; ?>

    <?php belli_woocommerce_popular_product_loop_end(); ?>
    </div>
<?php endif; ?>



<?php
wp_reset_postdata();