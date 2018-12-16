<?php

/* Custom forms fields filter */
function belli_field_filter($field){
    $field["input_class"][] = "form-control";
    return $field;
}
add_filter('belli_field_filter', "belli_field_filter");


/* Filter pagination links */
if(!function_exists('belli_pagination_filter')){
    function belli_pagination_filter($links = "")
    {
        if("" !== $links){
            return str_replace('page-numbers','page-numbers pagination',$links);
        }
    }
}
add_filter('belli_pagination_filter','belli_pagination_filter');


/* Shopping cart thumbnail filter */
if(!function_exists('belli_shopping_cart_thumbnail_filter')){
    function belli_shopping_cart_thumbnail_filter($thumbnail)
    {
        return str_replace("wp-post-image","wp-post-image img-responsive",$thumbnail);
    }
}
add_filter('belli_shopping_cart_thumbnail_filter','belli_shopping_cart_thumbnail_filter');
