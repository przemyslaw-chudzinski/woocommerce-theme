<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div class="product" style="<?= belli_set_styles_for_list_view(); ?>">
    <div <?php post_class(); ?>>


        <?php


        /**
         * belli_woocommerce_product_list_before_shop_loop_item hook.
         *
         * @hooked belli_woocommerce_template_product_list_wrapper_open - 9
         * @hooked belli_woocommerce_template_product_list_row_wrapper_open - 10
         */
        do_action( 'belli_woocommerce_product_list_before_shop_loop_item' );


        /**
         * belli_woocommerce_product_list_top hook.
         *
         * @hooked belli_woocommerce_template_product_list_top_wrapper_start - 5
         * @hooked belli_woocommerce_template_product_list_top_wrapper_inner_start - 6
         * @hooked woocommerce_show_product_loop_sale_flash - 7
         * @hooked woocommerce_template_loop_rating - 8
         * @hooked woocommerce_template_loop_product_link_open - 9
         * @hooked belli_woocommerce_template_figure_open - 9
         * @hooked woocommerce_template_loop_product_thumbnail - 9
         * @hooked belli_woocommerce_template_figure_close - 10
         * @hooked woocommerce_template_loop_product_link_close - 10
         * @hooked belli_woocommerce_template_product_list_top_wrapper_inner_end - 14
         * @hooked belli_woocommerce_template_product_list_top_wrapper_end - 15
         */
        do_action( 'belli_woocommerce_product_list_top' );


        /**
         * bellI_woocommerce_product_list_before_content_item hook.
         *
         * @hooked belli_woocommerce_product_list_template_content_wrapper_start - 10
         */
        do_action( 'belli_woocommerce_product_list_before_content_item' );


        /**
         * bellI_woocommerce_product_list_content_item hook.
         *
         * @hooked woocommerce_template_loop_product_link_open - 10
         * @hooked woocommerce_template_loop_product_title - 10
         * @hooked woocommerce_template_loop_product_link_close - 10
         * @hooked belli_woocommerce_template_container_price_open - 10
         * @hooked woocommerce_template_loop_price - 10
         * @hooked belli_woocommerce_template_container_price_close - 11
         * @hooked bellI_woocommerce_product_excerpt - 11
         * @hooked woocommerce_template_loop_add_to_cart - 11
         */
        do_action( 'belli_woocommerce_product_list_content_item' );


        /**
         * bellI_woocommerce_product_list_after_content_item hook.
         *
         * @hooked belli_woocommerce_product_list_template_content_wrapper_end - 10
         */
        do_action( 'belli_woocommerce_product_list_after_content_item' );


        /**
         * bellI_woocommerce_product_list_after_shop_loop_item hook.
         *
         * @hooked belli_woocommerce_template_product_list_wrapper_end - 8
         * @hooked belli_woocommerce_template_product_wrapper_close - 9
         */
        do_action( 'belli_woocommerce_product_list_after_shop_loop_item' );

        ?>

    </div>
</div>

