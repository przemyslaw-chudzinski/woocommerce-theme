<?php

/* Define theme path */
define("ASSETS_PATH",get_template_directory_uri()."/assets");

/* Define functions path */
define("FUNCTIONS_PATH",__DIR__.DIRECTORY_SEPARATOR.'functions'.DIRECTORY_SEPARATOR);

/* Define walkers class path */
define('WALKERS_PATH', __DIR__.DIRECTORY_SEPARATOR.'walkers'.DIRECTORY_SEPARATOR);

/* Support for woocommerce */
add_theme_support('woocommerce');
add_theme_support('custom-logo');
add_theme_support( 'post-formats', ['gallery', 'quote']);
add_theme_support( 'post-thumbnails' );

/* Define thumbnails */
add_image_size( 'blog_thumbnail', 300, 200 );
add_image_size( 'blog_thumbnail_banner', 470, 366 );

/* Remove all woocomerce styles */
add_filter("woocommerce_enqueue_styles","__return_false");

/* Require theme functions */
require FUNCTIONS_PATH.'theme-functions.php';

/* Require woocommerce functions */
require FUNCTIONS_PATH.'woocommerce-functions.php';

/* Require woocommerce template hooks */
require FUNCTIONS_PATH.'woocommerce-template-hooks.php';

/* Require theme filters */
require FUNCTIONS_PATH.'theme-filters.php';

/* Require theme widgets */
require FUNCTIONS_PATH.'theme-widgets.php';

/* Require redux */
require FUNCTIONS_PATH. 'redux.php';

/* Require belli walker class */
require WALKERS_PATH.'class-belli-comment-walker.php';

