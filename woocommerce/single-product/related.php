<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

<!--	<section class="related products">-->
<!---->
<!--		<h3 class="title-underblock custom mb80 text-center">--><?php //esc_html_e( 'Related products', 'woocommerce' ); ?><!--</h3>-->
<!--        <div class="owl-carousel related-products-carousel center-top-nav gray-nav">-->
<!--            --><?php //woocommerce_product_loop_start(); ?>
<!---->
<!--                --><?php //foreach ( $related_products as $related_product ) : ?>
<!---->
<!--                    <div class="product text-center">-->
<!--	                    <div class="product-top">-->
<!--		                    --><?php
//		                    $post_object = get_post( $related_product->get_id() );
//
//		                    setup_postdata( $GLOBALS['post'] =& $post_object );
//
//		                    wc_get_template_part( 'content', 'product' ); ?>
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                --><?php //endforeach; ?>
<!---->
<!--            --><?php //woocommerce_product_loop_end(); ?>
<!--        </div>-->
<!--	</section>-->

    <h3 class="title-underblock custom mb80 text-center"><?php esc_html_e( 'Related products', 'woocommerce' ); ?></h3>
    <?php belli_woocommerce_related_product_loop_start(); ?>
        <?php foreach ($related_products as $related_product): ?>
        <?php
	        $post_object = get_post( $related_product->get_id() );
		    setup_postdata( $GLOBALS['post'] =& $post_object );
		    wc_get_template_part( 'content-related-product' );
        ?>
        <?php endforeach; ?>
    <?php belli_woocommerce_related_product_loop_end(); ?>

<?php endif;

wp_reset_postdata();
