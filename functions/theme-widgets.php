<?php

if (!class_exists('WC_Widget')) {
    die('Woocommerce is required at this theme');
}

/* Require widget classes */
require_once __DIR__ . DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'widgets'.DIRECTORY_SEPARATOR.'class-belli-widget-price-filter.php';
require_once __DIR__ . DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'widgets'.DIRECTORY_SEPARATOR.'class-belli-widget-product-categories.php';
require_once __DIR__ . DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'widgets'.DIRECTORY_SEPARATOR.'class-belli-widget-blog-categories.php';
require_once __DIR__ . DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'widgets'.DIRECTORY_SEPARATOR.'class-belli-widget-tag-cloud.php';
require_once __DIR__ . DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'widgets'.DIRECTORY_SEPARATOR.'class-belli-widget-about-author.php';


function belli_register_widgets() {
    register_widget('WC_Belli_Widget_Price_Filter');
    register_widget('WC_Belli_Widget_Product_Categories');
    register_widget('Belli_Widget_Blog_Categories');
    register_widget('Belli_Widget_Tag_Cloud');
    register_widget('Belli_Widget_About_Author');
}
add_action('widgets_init', 'belli_register_widgets');
