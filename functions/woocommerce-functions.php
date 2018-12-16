<?php

if(!function_exists("belli_woocommerce_template_top_product_open")){
	function belli_woocommerce_template_top_product_open()
	{
		echo '<div class="product-top">';
	}
}


if(!function_exists("belli_woocommerce_template_top_product_close")){
	function belli_woocommerce_template_top_product_close()
	{
		echo '</div>';
	}
}


if(!function_exists('belli_woocommerce_template_figure_open')){
	function belli_woocommerce_template_figure_open()
	{
		echo "<figure class='img-responsive-outer'>";
	}
}


if(!function_exists('belli_woocommerce_template_figure_close')){
	function belli_woocommerce_template_figure_close()
	{
		echo "</figure>";
	}
}


if ( ! function_exists( 'woocommerce_template_loop_product_title' ) ) {

	/**
	 * Show the product title in the product loop. By default this is an H2.
	 */
	function woocommerce_template_loop_product_title() {
		echo '<h3 class="woocommerce-loop-product__title product-title">' . get_the_title() . '</h3>';
	}
}


if(!function_exists("belli_woocommerce_template_product_wrapper_open")){
	function belli_woocommerce_template_product_wrapper_open()
	{
		echo '<div class="product text-center">';
	}
}


if(!function_exists("belli_woocommerce_template_product_wrapper_close")){
	function belli_woocommerce_template_product_wrapper_close()
	{
		echo '</div>';
	}
}


if(!function_exists('belli_woocommerce_template_container_price_open')){
	function belli_woocommerce_template_container_price_open()
	{
		echo '<div class="product-price-container">';
	}
}


if(!function_exists('belli_woocommerce_template_container_price_close')){
	function belli_woocommerce_template_container_price_close()
	{
		echo '</div>';
	}
}

/* Custom price formatting */
if(!function_exists('belli_format_sale_price')){
	/**
	 * Format a sale price for display.
	 * @since  3.0.0
	 * @param  string $regular_price
	 * @param  string $sale_price
	 * @return string
	 */
	function belli_format_sale_price( $regular_price, $sale_price ) {
		$price = '<span class="product-old-price">' . ( is_numeric( $regular_price ) ? wc_price( $regular_price ) : $regular_price ) . '</span> <span class="product-price">' . ( is_numeric( $sale_price ) ? wc_price( $sale_price ) : $sale_price ) . '</span>';
		return apply_filters( 'woocommerce_format_sale_price', $price, $regular_price, $sale_price );
	}
}

/* Custom price getter */
if(!function_exists('belli_get_price_html')){
	function belli_get_price_html($product)
	{
		$price = '';
		if($price === $product->get_price()){
			$price = apply_filters( 'woocommerce_empty_price_html', '', $product );
		}
		else if($product->is_on_sale()) {
			$price = belli_format_sale_price(wc_get_price_to_display( $product, array( 'price' => $product->get_regular_price() ) ), wc_get_price_to_display( $product ) ). $product->get_price_suffix();
		}
		else {
			$price = wc_price( wc_get_price_to_display( $product ) ) . $product->get_price_suffix();
			$price = str_replace('woocommerce-Price-amount amount', 'woocommerce-Price-amount amount product-price belli-regular-price', $price);
		}
		return $price;
	}
}

if(!function_exists('belli_get_star_rating_html')){
	/**
	 * Get HTML for star rating.
	 *
	 * @since  3.1.0
	 * @param  float $rating Rating being shown.
	 * @param  int   $count  Total number of ratings.
	 * @return string
	 */
	function belli_get_star_rating_html( $rating, $count = 0 ) {
		$html = '<a href="#" class="product-ratings add-tooltip" title="'. ( $rating  ).' Average">';
		$html .='<span class="ratings" style="width:' . ( ( $rating / 5 ) * 100 ) . '%">';

		if ( 0 < $count ) {
			/* translators: 1: rating 2: rating count */
			$html .= sprintf( _n( 'Rated %1$s out of 5 based on %2$s customer rating', 'Rated %1$s out of 5 based on %2$s customer ratings', $count, 'woocommerce' ), '<strong class="rating">' . esc_html( $rating ) . '</strong>', '<span class="rating">' . esc_html( $count ) . '</span>' );
		} else {
			/* translators: %s: rating */
			$html .= sprintf( esc_html__( 'Rated %s out of 5', 'woocommerce' ), '<strong class="rating">' . esc_html( $rating ) . '</strong>' );
		}

		$html .= '</span>';
		$html .= '</a>';

		return apply_filters( 'woocommerce_get_star_rating_html', $html, $rating, $count  );
	}
}


if(!function_exists('belli_get_rating_html')){
	/**
	 * Get HTML for ratings.
	 *
	 * @since  3.0.0
	 * @param  float $rating Rating being shown.
	 * @param  int   $count  Total number of ratings.
	 * @return string
	 */
	function belli_get_rating_html( $rating, $count = 0 ) {
		if ( 0 < $rating ) {
			$html  = '<div class="star-rating ratings-container">';
			$html .= belli_get_star_rating_html( $rating, $count );
			$html .= '</div>';
		} else {
			$html  = '';
		}

		return apply_filters( 'woocommerce_product_get_rating_html', $html, $rating, $count );
	}
}


if(!function_exists('belli_woocommerce_template_share')){
	function belli_woocommerce_template_share()
	{
		wc_get_template("partials/single-product-share.php");
	}
}


if ( ! function_exists( 'belli_woocommerce_related_product_loop_start' ) ) {

	/**
	 * Output the start of a product loop. By default this is a UL.
	 *
	 * @param bool $echo
	 * @return string
	 */
	function belli_woocommerce_related_product_loop_start( $echo = true ) {
		ob_start();
		$GLOBALS['woocommerce_loop']['loop'] = 0;
		wc_get_template( 'partials/related-products/related-products-loop-start.php' );
		if ( $echo ) {
			echo ob_get_clean();
		} else {
			return ob_get_clean();
		}
	}
}

if ( ! function_exists( 'belli_woocommerce_related_product_loop_end' ) ) {

	/**
	 * Output the end of a product loop. By default this is a UL.
	 *
	 * @param bool $echo
	 * @return string
	 */
	function belli_woocommerce_related_product_loop_end( $echo = true ) {
		ob_start();

		wc_get_template( 'partials/related-products/related-products-loop-end.php' );

		if ( $echo ) {
			echo ob_get_clean();
		} else {
			return ob_get_clean();
		}
	}
}

if(!function_exists('belli_woocommerce_template_newsletter')){
	function belli_woocommerce_template_newsletter()
	{
		wc_get_template('partials/newsletter.php');
	}
}

if ( ! function_exists( 'belli_woocommerce_popular_product_loop_start' ) ) {

	/**
	 * Output the end of a product loop. By default this is a UL.
	 *
	 * @return string
	 */
	function belli_woocommerce_popular_product_loop_start() {
		wc_get_template( 'partials/popular-products/popular-product-loop-start.php' );
	}
}

if ( ! function_exists( 'belli_woocommerce_popular_product_loop_end' ) ) {

	/**
	 * Output the end of a product loop. By default this is a UL.
	 *
	 * @return string
	 */
	function belli_woocommerce_popular_product_loop_end() {
		wc_get_template_part( 'partials/popular-products/popular-product-loop-end.php' );
	}
}


if(!function_exists('belli_woocommerce_popular_products')){
	function belli_woocommerce_popular_products($args = [])
	{

		global $wpdb,$woocommerce_loop;

		$sql = 'select * from '.$wpdb->prefix.'posts where post_type="product" LIMIT 5'; // TODO: Wykonać poprawne zapytanie do bazy danych;

		$results = $wpdb->get_results($sql);


//		$defaults = array(
//			'posts_per_page' => 2,
//			'columns'        => 2,
//			'orderby'        => 'rand',
//			'order'          => 'desc',
//		);
//
//		$args = wp_parse_args( $args, $defaults );
//
//		// Get visble related products then sort them at random.
//		$args['related_products'] = array_filter( array_map( 'wc_get_product', wc_get_related_products( $product->get_id(), $args['posts_per_page'], $product->get_upsell_ids() ) ), 'wc_products_array_filter_visible' );
//
//		// Handle orderby.
//		$args['related_products'] = wc_products_array_orderby( $args['related_products'], $args['orderby'], $args['order'] );

		// Set global loop values.
//		$woocommerce_loop['name']    = 'related';
//		$woocommerce_loop['columns'] = apply_filters( 'woocommerce_related_products_columns', $args['columns'] );

		wc_get_template('partials/popular-products/popular.php', [ 'popular_products' => $results ]);
	}
}


if ( ! function_exists( 'woocommerce_widget_shopping_cart_proceed_to_checkout' ) ) {

	/**
	 * Output the proceed to checkout button.
	 *
	 * @subpackage	Cart
	 */
	function woocommerce_widget_shopping_cart_proceed_to_checkout() {
		//echo '<a href="' . esc_url( wc_get_checkout_url() ) . '" class="button checkout wc-forward btn btn-custom">' . esc_html__( 'Checkout', 'woocommerce' ) . '</a>';
	}
}

if ( ! function_exists( 'woocommerce_widget_shopping_cart_button_view_cart' ) ) {

    /**
     * Output the proceed to checkout button.
     *
     * @subpackage	Cart
     */
    function woocommerce_widget_shopping_cart_button_view_cart() {
        echo '<a href="' . esc_url( wc_get_cart_url() ) . '" class="button wc-forward btn btn-custom">' . esc_html__( 'View cart', 'woocommerce' ) . '</a>';
    }
}

if ( ! function_exists( 'woocommerce_content' ) ) {

    /**
     * Output WooCommerce content.
     *
     * This function is only used in the optional 'woocommerce.php' template.
     * which people can add to their themes to add basic woocommerce support.
     * without hooks or modifying core templates.
     *
     */
    function woocommerce_content() {

        if ( is_singular( 'product' ) ) {

            while ( have_posts() ) : the_post();

                wc_get_template_part( 'content', 'single-product' );

            endwhile;

        } else { ?>

            <?php do_action( 'woocommerce_archive_description' ); ?>

            <?php if ( have_posts() ) : ?>

                <?php do_action( 'woocommerce_before_shop_loop' ); ?>

                <?php

                    $view = '';

                    if(isset($_GET['view'])){
                       $view = $_GET['view'];
                    }

                ?>
                    <?php woocommerce_product_loop_start(); ?>

                    <?php woocommerce_product_subcategories(); ?>

                    <?php while ( have_posts() ) : the_post(); ?>

                    <?php if($view === '' || $view === 'grid' || $view === null || $view !== 'list'): ?>

                        <?php wc_get_template_part( 'content', 'product' ); ?>

                    <?php else: ?>

                        <?php wc_get_template_part( 'content', 'product-list' ); ?>

                    <?php endif; ?>

                    <?php endwhile; // end of the loop. ?>

                    <?php woocommerce_product_loop_end(); ?>

                <?php do_action( 'woocommerce_after_shop_loop' ); ?>

            <?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

                <?php do_action( 'woocommerce_no_products_found' ); ?>

            <?php endif;

        }
    }
}


if(! function_exists('belli_index_product_loop_start')){
	function belli_index_product_loop_start()
	{
		wc_get_template('partials/loop-index/loop-start.php');
	}
}

if(! function_exists('belli_index_product_loop_end')){
    function belli_index_product_loop_end()
    {
        wc_get_template('partials/loop-index/loop-end.php');
    }
}

if( ! function_exists('belli_index_content')){
	function belli_index_content()
	{

	    global $redux;

	    $perPage = 15;

	    if (isset($redux['home-products-number']) && !empty($redux['home-products-number'])) {
	        $value = (int) $redux['home-products-number'];
	        if ($value > 0) {
	            $perPage = $redux['home-products-number'];
            }
        }

		$query = new WP_Query([
			'posts_per_page' => $perPage,
			'orderby'        => 'post_date',
			'order'          => 'DESC',
			'post_type'      => 'product',
			'post_status'    => 'publish'
		]);

		?>
        <?php do_action('belli_index_before_loop'); ?>
        	<?php if ( $query->have_posts() ) : ?>


				<?php belli_index_product_loop_start(); ?>

				<?php while ( $query->have_posts() ) : $query->the_post(); ?>

            		<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; ?>

				<?php belli_index_product_loop_end(); ?>

			 <?php else: ?>
				Brak produktów do wyświetlenia
   			 <?php endif; ?>

        <?php do_action('belli_index_after_loop'); ?>

        <?php
	}
}

if(! function_exists('belli_get_all_products_button_template')){
    function belli_get_all_products_button_template()
    {
        echo '<div class="belli-get-all-products-button-container"><a href="'.esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ).'" class="btn btn-custom btn-lg">Więcej produktów</a></div>';
    }
}


if(! function_exists('belli_woocommerce_template_product_list_row_wrapper_open')){
    function belli_woocommerce_template_product_list_row_wrapper_open()
    {
        echo '<div class="row">';
    }
}

if(! function_exists('belli_woocommerce_template_product_list_row_wrapper_close')){
    function belli_woocommerce_template_product_list_row_wrapper_close()
    {
        echo '</div>';
    }
}


if(! function_exists('belli_woocommerce_template_product_list_top_wrapper_start')){
    function belli_woocommerce_template_product_list_top_wrapper_start()
    {
        echo '<div class="col-sm-4">';
    }
}

if(! function_exists('belli_woocommerce_template_product_list_top_wrapper_end')){
    function belli_woocommerce_template_product_list_top_wrapper_end()
    {
        echo '</div>';
    }
}


if(! function_exists('belli_woocommerce_template_product_list_top_wrapper_inner_start')){
    function belli_woocommerce_template_product_list_top_wrapper_inner_start()
    {
        echo '<div class="product-top">';
    }
}

if(! function_exists('belli_woocommerce_template_product_list_top_wrapper_inner_end')){
    function belli_woocommerce_template_product_list_top_wrapper_inner_end()
    {
        echo '</div><div class="mb20 visible-xs"></div>';
    }
}

if(!function_exists('belli_woocommerce_product_list_template_content_wrapper_start')){
    function belli_woocommerce_product_list_template_content_wrapper_start()
    {
        echo '<div class="col-sm-8">';
    }
}

if(!function_exists('belli_woocommerce_product_list_template_content_wrapper_end')){
    function belli_woocommerce_product_list_template_content_wrapper_end()
    {
        echo '</div>';
    }
}

if(!function_exists('belli_woocommerce_template_product_list_wrapper_open')){
    function belli_woocommerce_template_product_list_wrapper_open()
    {
        echo '<div class="product">';
    }
}

if(!function_exists('belli_woocommerce_template_product_list_wrapper_end')){
    function belli_woocommerce_template_product_list_wrapper_end()
    {
        echo '</div>';
    }
}

if(!function_exists('bellI_woocommerce_product_excerpt')){
    function bellI_woocommerce_product_excerpt()
    {
        the_excerpt();
    }
}

if ( ! function_exists( 'woocommerce_form_field' ) ) {

    /**
     * Outputs a checkout/address form field.
     *
     * @subpackage    Forms
     *
     * @param string $key
     * @param mixed  $args
     * @param string $value (default: null)
     *
     * @return string
     */
    function woocommerce_form_field( $key, $args, $value = null ) {
        $defaults = array(
            'type'              => 'text',
            'label'             => '',
            'description'       => '',
            'placeholder'       => '',
            'maxlength'         => false,
            'required'          => false,
            'autocomplete'      => false,
            'id'                => $key,
            'class'             => array(),
            'label_class'       => array(),
            'input_class'       => array(),
            'return'            => false,
            'options'           => array(),
            'custom_attributes' => array(),
            'validate'          => array(),
            'default'           => '',
            'autofocus'         => '',
            'priority'          => '',
        );

        $args = wp_parse_args( $args, $defaults );
        $args = apply_filters( 'woocommerce_form_field_args', $args, $key, $value );

        if ( $args['required'] ) {
            $args['class'][] = 'validate-required';
            $required = ' <abbr class="required" title="' . esc_attr__( 'required', 'woocommerce' ) . '">*</abbr>';
        } else {
            $required = '';
        }

        if ( is_string( $args['label_class'] ) ) {
            $args['label_class'] = array( $args['label_class'] );
        }

        if ( is_null( $value ) ) {
            $value = $args['default'];
        }

        // Custom attribute handling
        $custom_attributes         = array();
        $args['custom_attributes'] = array_filter( (array) $args['custom_attributes'] );

        if ( $args['maxlength'] ) {
            $args['custom_attributes']['maxlength'] = absint( $args['maxlength'] );
        }

        if ( ! empty( $args['autocomplete'] ) ) {
            $args['custom_attributes']['autocomplete'] = $args['autocomplete'];
        }

        if ( true === $args['autofocus'] ) {
            $args['custom_attributes']['autofocus'] = 'autofocus';
        }

        if ( ! empty( $args['custom_attributes'] ) && is_array( $args['custom_attributes'] ) ) {
            foreach ( $args['custom_attributes'] as $attribute => $attribute_value ) {
                $custom_attributes[] = esc_attr( $attribute ) . '="' . esc_attr( $attribute_value ) . '"';
            }
        }

        if ( ! empty( $args['validate'] ) ) {
            foreach ( $args['validate'] as $validate ) {
                $args['class'][] = 'validate-' . $validate;
            }
        }

        $field           = '';
        $label_id        = $args['id'];
        $sort            = $args['priority'] ? $args['priority'] : '';
        $field_container = '<p class="form-row %1$s" id="%2$s" data-priority="' . esc_attr( $sort ) . '">%3$s</p>';

        switch ( $args['type'] ) {
            case 'country' :

                $countries = 'shipping_country' === $key ? WC()->countries->get_shipping_countries() : WC()->countries->get_allowed_countries();

                if ( 1 === sizeof( $countries ) ) {

                    $field .= '<strong>' . current( array_values( $countries ) ) . '</strong>';

                    $field .= '<input type="hidden" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" value="' . current( array_keys( $countries ) ) . '" ' . implode( ' ', $custom_attributes ) . ' class="country_to_state" />';

                } else {

                    $field = '<select name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" class="form-control country_to_state country_select ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" ' . implode( ' ', $custom_attributes ) . '>' . '<option value="">' . esc_html__( 'Select a country&hellip;', 'woocommerce' ) . '</option>';

                    foreach ( $countries as $ckey => $cvalue ) {
                        $field .= '<option value="' . esc_attr( $ckey ) . '" ' . selected( $value, $ckey, false ) . '>' . $cvalue . '</option>';
                    }

                    $field .= '</select>';

                    $field .= '<noscript><input type="submit" name="woocommerce_checkout_update_totals" value="' . esc_attr__( 'Update country', 'woocommerce' ) . '" /></noscript>';

                }

                break;
            case 'state' :
                /* Get country this state field is representing */
                $for_country = isset( $args['country'] ) ? $args['country'] : WC()->checkout->get_value( 'billing_state' === $key ? 'billing_country' : 'shipping_country' );
                $states      = WC()->countries->get_states( $for_country );

                if ( is_array( $states ) && empty( $states ) ) {

                    $field_container = '<p class="form-row %1$s" id="%2$s" style="display: none">%3$s</p>';

                    $field .= '<input type="hidden" class="hidden" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" value="" ' . implode( ' ', $custom_attributes ) . ' placeholder="' . esc_attr( $args['placeholder'] ) . '" />';

                } elseif ( ! is_null( $for_country ) && is_array( $states ) ) {

                    $field .= '<select name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" class="form-control state_select ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" ' . implode( ' ', $custom_attributes ) . ' data-placeholder="' . esc_attr( $args['placeholder'] ) . '">
						<option value="">' . esc_html__( 'Select a state&hellip;', 'woocommerce' ) . '</option>';

                    foreach ( $states as $ckey => $cvalue ) {
                        $field .= '<option value="' . esc_attr( $ckey ) . '" ' . selected( $value, $ckey, false ) . '>' . $cvalue . '</option>';
                    }

                    $field .= '</select>';

                } else {

                    $field .= '<input type="text" class="input-text form-control' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" value="' . esc_attr( $value ) . '"  placeholder="' . esc_attr( $args['placeholder'] ) . '" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" ' . implode( ' ', $custom_attributes ) . ' />';

                }

                break;
            case 'textarea' :

                $field .= '<textarea name="' . esc_attr( $key ) . '" class="input-text ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" id="' . esc_attr( $args['id'] ) . '" placeholder="' . esc_attr( $args['placeholder'] ) . '" ' . ( empty( $args['custom_attributes']['rows'] ) ? ' rows="2"' : '' ) . ( empty( $args['custom_attributes']['cols'] ) ? ' cols="5"' : '' ) . implode( ' ', $custom_attributes ) . '>' . esc_textarea( $value ) . '</textarea>';

                break;
            case 'checkbox' :

                $field = '<label class="checkbox ' . implode( ' ', $args['label_class'] ) . '" ' . implode( ' ', $custom_attributes ) . '>
						<input type="' . esc_attr( $args['type'] ) . '" class="input-checkbox ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" value="1" ' . checked( $value, 1, false ) . ' /> '
                    . $args['label'] . $required . '</label>';

                break;
            case 'password' :
            case 'text' :
            case 'email' :
            case 'tel' :
            case 'number' :

                $field .= '<input type="' . esc_attr( $args['type'] ) . '" class="form-control input-text ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" placeholder="' . esc_attr( $args['placeholder'] ) . '"  value="' . esc_attr( $value ) . '" ' . implode( ' ', $custom_attributes ) . ' />';

                break;
            case 'select' :

                $options = $field = '';

                if ( ! empty( $args['options'] ) ) {
                    foreach ( $args['options'] as $option_key => $option_text ) {
                        if ( '' === $option_key ) {
                            // If we have a blank option, select2 needs a placeholder
                            if ( empty( $args['placeholder'] ) ) {
                                $args['placeholder'] = $option_text ? $option_text : __( 'Choose an option', 'woocommerce' );
                            }
                            $custom_attributes[] = 'data-allow_clear="true"';
                        }
                        $options .= '<option value="' . esc_attr( $option_key ) . '" ' . selected( $value, $option_key, false ) . '>' . esc_attr( $option_text ) . '</option>';
                    }

                    $field .= '<select name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '" class="select ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" ' . implode( ' ', $custom_attributes ) . ' data-placeholder="' . esc_attr( $args['placeholder'] ) . '">
							' . $options . '
						</select>';
                }

                break;
            case 'radio' :

                $label_id = current( array_keys( $args['options'] ) );

                if ( ! empty( $args['options'] ) ) {
                    foreach ( $args['options'] as $option_key => $option_text ) {
                        $field .= '<input type="radio" class="input-radio ' . esc_attr( implode( ' ', $args['input_class'] ) ) . '" value="' . esc_attr( $option_key ) . '" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '_' . esc_attr( $option_key ) . '"' . checked( $value, $option_key, false ) . ' />';
                        $field .= '<label for="' . esc_attr( $args['id'] ) . '_' . esc_attr( $option_key ) . '" class="radio ' . implode( ' ', $args['label_class'] ) . '">' . $option_text . '</label>';
                    }
                }

                break;
        }

        if ( ! empty( $field ) ) {
            $field_html = '';

            if ( $args['label'] && 'checkbox' != $args['type'] ) {
                $field_html .= '<label for="' . esc_attr( $label_id ) . '" class="' . esc_attr( implode( ' ', $args['label_class'] ) ) . '">' . $args['label'] . $required . '</label>';
            }

            $field_html .= $field;

            if ( $args['description'] ) {
                $field_html .= '<span class="description">' . esc_html( $args['description'] ) . '</span>';
            }

            $container_class = esc_attr( implode( ' ', $args['class'] ) );
            $container_id    = esc_attr( $args['id'] ) . '_field';
            $field           = sprintf( $field_container, $container_class, $container_id, $field_html );
        }

        $field = apply_filters( 'woocommerce_form_field_' . $args['type'], $field, $key, $args, $value );

        if ( $args['return'] ) {
            return $field;
        } else {
            echo $field;
        }
    }
}

if (!function_exists('belli_set_styles_for_list_view')) {
    function belli_set_styles_for_list_view()
    {
        if (isset($_GET['view'])) {
            if ($_GET['view'] === 'list') {
                return 'margin-bottom: -50px;';
            }
        }
    }
}

if ( ! function_exists( 'wc_dropdown_variation_attribute_options' ) ) {

    /**
     * Output a list of variation attributes for use in the cart forms.
     *
     * @param array $args Arguments.
     * @since 2.4.0
     */
    function wc_dropdown_variation_attribute_options( $args = array() ) {
        $args = wp_parse_args( apply_filters( 'woocommerce_dropdown_variation_attribute_options_args', $args ), array(
            'options'          => false,
            'attribute'        => false,
            'product'          => false,
            'selected'         => false,
            'name'             => '',
            'id'               => '',
            'class'            => 'form-control ',
            'show_option_none' => __( 'Choose an option', 'woocommerce' ),
        ) );

        $options               = $args['options'];
        $product               = $args['product'];
        $attribute             = $args['attribute'];
        $name                  = $args['name'] ? $args['name'] : 'attribute_' . sanitize_title( $attribute );
        $id                    = $args['id'] ? $args['id'] : sanitize_title( $attribute );
        $class                 = $args['class'];
        $show_option_none      = $args['show_option_none'] ? true : false;
        $show_option_none_text = $args['show_option_none'] ? $args['show_option_none'] : __( 'Choose an option', 'woocommerce' ); // We'll do our best to hide the placeholder, but we'll need to show something when resetting options.

        if ( empty( $options ) && ! empty( $product ) && ! empty( $attribute ) ) {
            $attributes = $product->get_variation_attributes();
            $options    = $attributes[ $attribute ];
        }

        $html  = '<select id="' . esc_attr( $id ) . '" class="' . esc_attr( $class ) . '" name="' . esc_attr( $name ) . '" data-attribute_name="attribute_' . esc_attr( sanitize_title( $attribute ) ) . '" data-show_option_none="' . ( $show_option_none ? 'yes' : 'no' ) . '">';
        $html .= '<option value="">' . esc_html( $show_option_none_text ) . '</option>';

        if ( ! empty( $options ) ) {
            if ( $product && taxonomy_exists( $attribute ) ) {
                // Get terms if this is a taxonomy - ordered. We need the names too.
                $terms = wc_get_product_terms( $product->get_id(), $attribute, array(
                    'fields' => 'all',
                ) );

                foreach ( $terms as $term ) {
                    if ( in_array( $term->slug, $options, true ) ) {
                        $html .= '<option value="' . esc_attr( $term->slug ) . '" ' . selected( sanitize_title( $args['selected'] ), $term->slug, false ) . '>' . esc_html( apply_filters( 'woocommerce_variation_option_name', $term->name ) ) . '</option>';
                    }
                }
            } else {
                foreach ( $options as $option ) {
                    // This handles < 2.4.0 bw compatibility where text attributes were not sanitized.
                    $selected = sanitize_title( $args['selected'] ) === $args['selected'] ? selected( $args['selected'], sanitize_title( $option ), false ) : selected( $args['selected'], $option, false );
                    $html    .= '<option value="' . esc_attr( $option ) . '" ' . $selected . '>' . esc_html( apply_filters( 'woocommerce_variation_option_name', $option ) ) . '</option>';
                }
            }
        }

        $html .= '</select>';

        echo apply_filters( 'woocommerce_dropdown_variation_attribute_options_html', $html, $args ); // WPCS: XSS ok.
    }
}

if ( ! function_exists( 'woocommerce_single_variation' ) ) {

    /**
     * Output placeholders for the single variation.
     */
    function woocommerce_single_variation() {
        echo '<div class="woocommerce-variation single_variation belli-regular-price"></div>';
    }
}
