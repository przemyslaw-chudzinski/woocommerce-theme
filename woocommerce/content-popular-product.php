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
        <?php

        /**
         * woocommerce_before_shop_loop_item hook.
         *
         * @hooked belli_woocommerce_template_product_wrapper_open - 9
         * @hooked woocommerce_template_loop_product_link_open - 10
         */
        do_action( 'woocommerce_before_shop_loop_item' );


        /**
         * belli_woocommerce_product_top_start hook.
         *
         * @hooked belli_woocommerce_template_top_product_open - 10
         * @hooked belli_woocommerce_template_figure_open - 10
         */
        do_action( 'belli_woocommerce_product_top_start' );

        /**
         * woocommerce_before_shop_loop_item_title hook.
         *
         * @hooked woocommerce_show_product_loop_sale_flash - 10
         * @hooked woocommerce_template_loop_product_thumbnail - 10
         */
        do_action( 'woocommerce_before_shop_loop_item_title' );



        /**
         * belli_woocommerce_product_top_end hook.
         *
         * @hooked belli_woocommerce_template_top_product_close - 10
         * @hooked belli_woocommerce_template_figure_close - 10
         */
        do_action( 'belli_woocommerce_product_top_end' );

        /**
         * woocommerce_shop_loop_item_title hook.
         *
         * @hooked woocommerce_template_loop_product_title - 10
         */
        do_action( 'woocommerce_shop_loop_item_title' );


        /**
         * woocommerce_after_shop_loop_item_title hook.
         *
         * @hooked woocommerce_template_loop_rating - 5
         * @hooked belli_woocommerce_template_container_price_open - 10
         * @hooked woocommerce_template_loop_price - 10
         * @hooked belli_woocommerce_template_container_price_close - 11
         */
        do_action( 'woocommerce_after_shop_loop_item_title' );



        /**
         * woocommerce_after_shop_loop_item hook.
         *
         * @hooked woocommerce_template_loop_product_link_close - 5
         * @hooked belli_woocommerce_template_product_wrapper_close - 9
         * @hooked woocommerce_template_loop_add_to_cart - 10
         */
        do_action( 'woocommerce_after_shop_loop_item' );

        ?>
