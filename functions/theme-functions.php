<?php

/* Disabled admin dashboard for non-admins */
if(!function_exists('belli_restrict_admin_dashboard')){
    function belli_restrict_admin_dashboard()
    {
        if(is_user_logged_in() && !is_admin()){
            wp_redirect(home_url());
        }
    }
}
add_action('admin_init','belli_restrict_admin_dashboard');


/* Register custom stylesheets */
if(!function_exists('belli_register_additional_styles')){
	function belli_register_additional_styles()
	{
        wp_register_style('belli-styles', get_template_directory_uri() .'/assets/css/vendor/bundle.min.css');
        wp_enqueue_style('belli-styles');

//        wp_register_script('belli-scripts', get_template_directory_uri(). '/assets/js/bundle.min.js', [], false, true);
//        wp_enqueue_script('belli-scripts');
	}
}
add_action('wp_enqueue_scripts','belli_register_additional_styles', 0);

/* Register menu */
function belli_register_nav_menus()
{
	register_nav_menus([
		"primary" => "Main menu on site",
		"footer"  => "Footer menu"
	]);
}
add_action("after_setup_theme","belli_register_nav_menus");

if(!function_exists('belli_get_footer_menu')){
	function belli_get_footer_menu()
	{
		return wp_nav_menu([
			"menu" => "footer",
			"menu_class" => "footer-menu"
		]);
	}
}


if(!function_exists('belli_get_primary_menu')){
	function belli_get_primary_menu()
	{
		return wp_nav_menu([
			"menu"       => "primary",
			"menu_class" => "nav navbar-nav"
		]);
	}
}


/* Get my account link */
if(!function_exists('belli_get_my_account_url')){
	function belli_get_my_account_url()
	{
		return get_permalink( get_option('woocommerce_myaccount_page_id'));
	}
}


/* Register shopping cart area at the top menu */
if(!function_exists('belli_register_shopping_cart_area')){
	function belli_register_shopping_cart_area()
	{
		register_sidebar([
			"id"            => "belli-shopping-cart-area",
			"description"   => "An area for shopping cart at the menu top",
			"before_widget" => "<div>",
			"after_widget"  => "</div>"
		]);
	}
}
add_action('widgets_init',"belli_register_shopping_cart_area");

/* Register sidebars */
if(!function_exists('belli_register_sidebar')){
    function belli_register_sidebar()
    {
        register_sidebar([
           'id'            => 'belli-sidebar-filters',
           'description'   => 'An area for sidebar widgets filters',
           'before_widget' => '<div id="%1$s" class="widget %2$s">',
           'after_widget'  => '</div>',
           'before_title'  => '<h4 class="panel-title">',
           'after_title'   => '</h4>'
        ]);

        register_sidebar([
            'id'            => 'belli-sidebar-categories',
            'description'   => 'An area for sidebar widgets categories',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3>',
            'after_title'   => '</h3>'
        ]);

        register_sidebar([
            'id'            => 'belli-sidebar-blog',
            'description'   => 'An area for sidebar widgets at blog page',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3>',
            'after_title'   => '</h3>'
        ]);
    }
}
add_action('widgets_init','belli_register_sidebar');

/* Get image from redux framework */
if (!function_exists('belli_get_image')) {
    function belli_get_image(array $field, $thumbnail = '', $responsive = true, $attrs = [])
    {
        if (isset($field['url'])) {
            $url = $field['url'];
            $alt = isset($field['alt']) ? $field['alt'] : '';
            $title = isset($field['title']) ? $field['title']: '';
            if ($thumbnail !== '' && isset($thumbnail)) {
                $url = $field[$thumbnail];
            }
            ?>
            <img
                src="<?= $url; ?>"
                alt="<?= $alt; ?>"
                title="<?= $title ?>"
                class="<?= $responsive ? 'img-responsive' : null ?>"
                <?php if(count($attrs) > 0): ?>
                    <?php foreach ($attrs as $attr => $value): ?>
                    <?= $attrs ?>="<?= $value ?>"
                    <?php endforeach; ?>
                <?php endif; ?>
            >
            <?php
        }
        return '';
    }
}

/* Belli blog pagination */
if(!function_exists('belli_blog_pagination')){
    function belli_blog_pagination()
    {
        $args = [
            'type'      => 'list',
            'prev_text' => __('<i class="fa fa-angle-left"></i>'),
            'next_text' => __('<i class="fa fa-angle-right"></i>'),
        ];
        return str_replace('page-numbers', 'page-numbers pagination', paginate_links($args));
    }
}

/* Belli blog post categories */
if(!function_exists('belli_post_categories')){
    function belli_post_categories($with_title = true)
    {
        global $post;
        $categories = get_the_category($post->ID);
        $categoriesNumber = count($categories);
        if($categoriesNumber > 0) {
            ?>
            <span class="entry-cats">
                <?php if($with_title): ?>
                    <span class="entry-label"><i class="fa fa-tag"></i>Kategorie:</span>
                <?php endif; ?>
                <?php foreach ($categories as $key => $category): ?>
                    <a href="<?= get_category_link($category->term_id); ?>"><?= $category->name; ?></a>
                    <?php if($categoriesNumber - 1 !== $key): ?>
                    ,
                    <?php endif; ?>
                <?php endforeach; ?>
            </span>
            <?php
        }
    }
}

/* Belli gallery slider */
if(!function_exists('belli_gallery_slider_thumbnail')) {
    function belli_gallery_slider_thumbnail()
    {
        global $post;
        var_dump($post->post_content);
    }
}

if(!function_exists('belli_comment_form')) {
    function belli_comment_form( $post_id )
    {
        $new_args = [
            'title_reply_before' => '<h3 id="reply-title" class="mb35 title-underblock custom">',
            'title_reply_after'  => '</h3>',
            'fields'             => [
                'author' =>
                    '<div class="comment-form-author"><label for="author">' . __( 'Name', 'domainreference' ) .
                    ( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
                    '<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
                    '" size="30"' . $aria_req . ' /></div>',

                'email' =>
                    '<div class="comment-form-email"><label for="email">' . __( 'Email', 'domainreference' ) .
                    ( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
                    '<input class="form-control" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                    '" size="30"' . $aria_req . ' /></div>',

                'url' =>
                    '<div class="comment-form-url"><label for="url">' . __( 'Website', 'domainreference' ) . '</label>' .
                    '<input class="form-control" id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
                    '" size="30" /></div>',
            ],
            'comment_field' =>  '<div class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) .
                '</label><textarea id="comment" class="form-control" name="comment" cols="45" rows="8" aria-required="true">' .
                '</textarea></div>',
            'must_log_in' => '<div class="must-log-in well">' .
                sprintf(
                    __( 'You must be <a href="%s">logged in</a> to post a comment.' ),
                    wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
                ) . '</div>',
            'logged_in_as' => '<div class="logged-in-as well">' .
                sprintf(
                    __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ),
                    admin_url( 'profile.php' ),
                    $user_identity,
                    wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
                ) . '</div>',
            'comment_notes_before' => '<div class="comment-notes well">' .
                __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) .
                '</div>',
            'comment_notes_after' => '<div class="form-allowed-tags well">' .
                sprintf(
                    __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s' ),
                    ' <code>' . allowed_tags() . '</code>'
                ) . '</div>',
        ];
        return comment_form($new_args, $post_id);
    }
}

if(!function_exists('belli_comments_list')) {
    function belli_comments_list()
    {
        $args = [
            'author_email' => '',
            'author__in' => '',
            'author__not_in' => '',
            'include_unapproved' => '',
            'fields' => '',
            'ID' => '',
            'comment__in' => '',
            'comment__not_in' => '',
            'karma' => '',
            'number' => '',
            'offset' => '',
            'orderby' => '',
            'order' => 'DESC',
            'parent' => '',
            'post_author__in' => '',
            'post_author__not_in' => '',
            'post_ID' => '',
            'post_id' => 0,
            'post__in' => '',
            'post__not_in' => '',
            'post_author' => '',
            'post_name' => '',
            'post_parent' => '',
            'post_status' => '',
            'post_type' => '',
            'status' => 'all',
            'type' => '',
            'type__in' => '',
            'type__not_in' => '',
            'user_id' => '',
            'search' => '',
            'count' => false,
            'meta_key' => '',
            'meta_value' => '',
            'meta_query' => '',
            'date_query' => null,
        ];

        $args2 = [
            'walker'            => new Belli_Comment_Walker(),
            'max_depth'         => '',
            'style'             => 'ul',
            'callback'          => null,
            'end-callback'      => null,
            'type'              => 'all',
            'reply_text'        => 'Odpowiedz',
            'page'              => '',
            'per_page'          => '',
            'avatar_size'       => 60,
            'reverse_top_level' => null,
            'reverse_children'  => '',
            'format'            => 'html5',
            'short_ping'        => false,
            'echo'              => true
        ];
        $comments = get_comments($args);
        ?>
        <ul class="comments-list media-list">
            <?= wp_list_comments($args2, $comments); ?>
        </ul>
        <?php
    }
}

/* belli get post category ids */
if(!function_exists('belli_get_post_category_ids')) {
    function belli_get_post_category_ids()
    {
        global $post;
        $categories = get_the_category($post->ID);
        $category_ids = [];
        if(count($categories) > 0) {
            foreach ($categories as $category) {
                $category_ids[] = $category->term_id;
            }
        }
        return $category_ids;
    }
}

/* belli the excerpt */
if(!function_exists('belli_the_excerpt')) {
    function belli_the_excerpt($length = 15, $end = '...')
    {
        $current_excerpt = get_the_excerpt();
        $current_excerpt_exploded = explode(" ", $current_excerpt);
        $count = count($current_excerpt_exploded);
        $output_arr = [];
        if ($count <= $length) {
            return $current_excerpt;
        } else {
            foreach ($current_excerpt_exploded as $key => $word) {
                if ($key <= $length - 1){
                    $output_arr[$key] = $word;
                }
            }
        }
        return implode(' ', $output_arr) . $end;
    }
}

/* belli_get_redux_text */
if (!function_exists('belli_get_redux_text_field_value')) {
    function belli_get_redux_text_field_value($opt_name, $default = false)
    {
        global $redux;
        return isset($redux[$opt_name]) && !empty($redux[$opt_name]) ? $redux[$opt_name] : false;
    }
}




