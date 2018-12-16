<?php

/* Product grid view */
add_action("belli_woocommerce_product_top_start","belli_woocommerce_template_top_product_open",10);
add_action("belli_woocommerce_product_top_end","belli_woocommerce_template_top_product_close",10);
add_action("belli_woocommerce_product_top_start","belli_woocommerce_template_figure_open",20);
add_action("belli_woocommerce_product_top_end","belli_woocommerce_template_figure_close",10);

add_action("woocommerce_before_shop_loop_item","belli_woocommerce_template_product_wrapper_open",9);
add_action("woocommerce_after_shop_loop_item","belli_woocommerce_template_product_wrapper_close",10);
add_action("woocommerce_after_shop_loop_item_title","belli_woocommerce_template_container_price_open",9);
add_action("woocommerce_after_shop_loop_item_title","belli_woocommerce_template_container_price_close",11);

add_action('woocommerce_share', "belli_woocommerce_template_share",10);

add_action('belli_woocommerce_after_products_list','belli_woocommerce_template_newsletter',10);
add_action('belli_woocommerce_after_products_list','belli_woocommerce_popular_products',20);

remove_action("woocommerce_single_product_summary","woocommerce_template_single_meta", 40);
add_action('woocommerce_single_product_summary','woocommerce_template_single_meta',5);

remove_action("woocommerce_single_product_summary", "woocommerce_template_single_price", 10);
add_action("woocommerce_single_product_summary", "woocommerce_template_single_price", 5);

remove_action( 'woocommerce_widget_shoppiwng_cart_buttons', 'woocommerce_widget_shopping_cart_button_view_cart', 10 );

add_action('belli_index_after_loop', 'belli_get_all_products_button_template', 10);

/* Product list view */
add_action('belli_woocommerce_product_list_before_shop_loop_item','belli_woocommerce_template_product_list_wrapper_open', 9);
add_action('belli_woocommerce_product_list_before_shop_loop_item','belli_woocommerce_template_product_list_row_wrapper_open', 10);

add_action('belli_woocommerce_product_list_after_shop_loop_item','belli_woocommerce_template_product_wrapper_close', 9);
add_action('belli_woocommerce_product_list_after_shop_loop_item','belli_woocommerce_template_product_list_wrapper_end', 8);

add_action('belli_woocommerce_product_list_top','belli_woocommerce_template_product_list_top_wrapper_start', 5);
add_action('belli_woocommerce_product_list_top','belli_woocommerce_template_product_list_top_wrapper_inner_start', 6);
add_action('belli_woocommerce_product_list_top','woocommerce_show_product_loop_sale_flash', 7);
add_action('belli_woocommerce_product_list_top','woocommerce_template_loop_rating', 8);
add_action('belli_woocommerce_product_list_top','woocommerce_template_loop_product_link_open', 9);
add_action('belli_woocommerce_product_list_top','belli_woocommerce_template_figure_open', 9);
add_action('belli_woocommerce_product_list_top','woocommerce_template_loop_product_thumbnail', 9);
add_action('belli_woocommerce_product_list_top','belli_woocommerce_template_figure_close', 10);
add_action('belli_woocommerce_product_list_top','woocommerce_template_loop_product_link_close', 10);
add_action('belli_woocommerce_product_list_top','belli_woocommerce_template_product_list_top_wrapper_inner_end', 14);
add_action('belli_woocommerce_product_list_top','belli_woocommerce_template_product_list_top_wrapper_end', 15);

add_action('belli_woocommerce_product_list_before_content_item','belli_woocommerce_product_list_template_content_wrapper_start', 10);
add_action('belli_woocommerce_product_list_after_content_item','belli_woocommerce_product_list_template_content_wrapper_end', 10);

add_action('belli_woocommerce_product_list_content_item', 'woocommerce_template_loop_product_link_open', 10);
add_action('belli_woocommerce_product_list_content_item', 'woocommerce_template_loop_product_title', 10);
add_action('belli_woocommerce_product_list_content_item', 'woocommerce_template_loop_product_link_close', 10);
add_action('belli_woocommerce_product_list_content_item','belli_woocommerce_template_container_price_open',10);
add_action('belli_woocommerce_product_list_content_item','woocommerce_template_loop_price',10);
add_action('belli_woocommerce_product_list_content_item','belli_woocommerce_template_container_price_close',11);
add_action('belli_woocommerce_product_list_content_item','bellI_woocommerce_product_excerpt',11);
add_action('belli_woocommerce_product_list_content_item','woocommerce_template_loop_add_to_cart',11);

remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
