<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Price Filter Widget and related functions.
 *
 */
if (class_exists('WC_Widget')) {
    class WC_Belli_Widget_Price_Filter extends WC_Widget {

        /**
         * Constructor.
         */
        public function __construct() {
            $this->widget_cssclass    = 'woocommerce widget_price_filter';
            $this->widget_description = __( 'Display a slider to filter products in your store by price.', 'woocommerce' );
            $this->widget_id          = 'woocommerce_price_filter';
            $this->widget_name        = __( 'BELLI Filter Products by Price', 'woocommerce' );
            $this->settings           = array(
                'title'  => array(
                    'type'  => 'text',
                    'std'   => __( 'Filter by price', 'woocommerce' ),
                    'label' => __( 'Title', 'woocommerce' ),
                ),
            );
            $suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
            wp_register_script( 'accounting', WC()->plugin_url() . '/assets/js/accounting/accounting' . $suffix . '.js', array( 'jquery' ), '0.4.2' );
            wp_register_script( 'wc-jquery-ui-touchpunch', WC()->plugin_url() . '/assets/js/jquery-ui-touch-punch/jquery-ui-touch-punch' . $suffix . '.js', array( 'jquery-ui-slider' ), WC_VERSION, true );
            wp_register_script( 'wc-price-slider', WC()->plugin_url() . '/assets/js/frontend/price-slider' . $suffix . '.js', array( 'jquery-ui-slider', 'wc-jquery-ui-touchpunch', 'accounting' ), WC_VERSION, true );
            wp_localize_script( 'wc-price-slider', 'woocommerce_price_slider_params', array(
                'currency_format_num_decimals' => 0,
                'currency_format_symbol'       => get_woocommerce_currency_symbol(),
                'currency_format_decimal_sep'  => esc_attr( wc_get_price_decimal_separator() ),
                'currency_format_thousand_sep' => esc_attr( wc_get_price_thousand_separator() ),
                'currency_format'              => esc_attr( str_replace( array( '%1$s', '%2$s' ), array( '%s', '%v' ), get_woocommerce_price_format() ) ),
            ) );

            if ( is_customize_preview() ) {
                wp_enqueue_script( 'wc-price-slider' );
            }

            parent::__construct();
        }

        /**
         * Output widget.
         *
         * @see WP_Widget
         *
         * @param array $args
         * @param array $instance
         */
        public function widget( $args, $instance ) {
            global $wp;

            if ( ! is_shop() && ! is_product_taxonomy() ) {
                return;
            }

            if ( ! wc()->query->get_main_query()->post_count ) {
                return;
            }

            wp_enqueue_script( 'wc-price-slider' );

            // Find min and max price in current result set.
            $prices = $this->get_filtered_price();
            $min    = floor( $prices->min_price );
            $max    = ceil( $prices->max_price );

            if ( $min === $max ) {
                return;
            }

            $this->widget_start( $args, $instance );

            if ( '' === get_option( 'permalink_structure' ) ) {
                $form_action = remove_query_arg( array( 'page', 'paged', 'product-page' ), add_query_arg( $wp->query_string, '', home_url( $wp->request ) ) );
            } else {
                $form_action = preg_replace( '%\/page/[0-9]+%', '', home_url( trailingslashit( $wp->request ) ) );
            }

            $min_price = isset( $_GET['min_price'] ) ? esc_attr( $_GET['min_price'] ) : apply_filters( 'woocommerce_price_filter_widget_min_amount', $min );
            $max_price = isset( $_GET['max_price'] ) ? esc_attr( $_GET['max_price'] ) : apply_filters( 'woocommerce_price_filter_widget_max_amount', $max );

            ?>
            <form method="get" action="<?= esc_url( $form_action ) ?>">
                <div class="panel panel-border-tb filter-group-widget">
                    <div class="panel-heading" role="tab" id="priceFilter-header">
                        <?= $args['before_title']; ?>
                        <a data-toggle="collapse" href="#priceFilter" aria-expanded="true" aria-controls="priceFilter">
                            <?= isset($instance['title']) && !empty($instance['title']) ? $instance['title'] : ''; ?>
                            <span class="panel-icon"></span>
                        </a>
                        <?= $args['after_title']; ?>
                    </div><!-- End .panel-heading -->
                    <div id="priceFilter" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="priceFilter-header">
                        <div class="panel-body">
                            <div class="filter-price">
                                <div
                                        id="price-range"
                                        class="price_slider"
                                        data-min-price="<?= $min; ?>"
                                        data-max-price="<?= $max; ?>"
                                        data-current-min-price="<?= $min_price; ?>"
                                        data-current-max-price="<?= $max_price; ?>"
                                ></div><!-- End #price-range -->
                                <div id="filter-range-details" class="row">
                                    <div class="col-xs-6">
                                        <div class="filter-price-label">from - <?= get_woocommerce_currency_symbol(); ?></div>
                                        <input type="text" name="min_price" id="price-range-low" class="form-control" value="<?= esc_attr( $min_price ); ?>" data-min="<?= esc_attr( apply_filters( 'woocommerce_price_filter_widget_min_amount', $min ) ); ?>">
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="filter-price-label">to - <?= get_woocommerce_currency_symbol(); ?></div>
                                        <input type="text" name="max_price" id="price-range-high" class="form-control" value="<?= esc_attr( $max_price ) ?>" data-max="<?= esc_attr( apply_filters( 'woocommerce_price_filter_widget_max_amount', $max ) ); ?>">
                                    </div>
                                </div><!-- End #filter-range-details -->
                                <div class="filter-price-action">
                                    <button type="submit" class="btn btn-custom btn-sm"><?= esc_html__( 'Filter', 'woocommerce' ); ?></button>
                                    <a href="#" class="btn btn-custom3 btn-sm">Reset</a>
                                </div><!-- End #filter-price-action -->
                            </div><!-- End .filter-price -->
                        </div><!-- End .panel-body -->
                    </div><!-- End .panel-collapse -->
                </div>
            </form>
            <?php

            $this->widget_end( $args );
        }

        /**
         * Output the html at the start of a widget.
         *
         * @param array $args
         * @param array $instance
         */
        public function widget_start( $args, $instance ) {
            echo $args['before_widget'];
        }

        /**
         * Get filtered min price for current products.
         * @return int
         */
        protected function get_filtered_price() {
            global $wpdb;

            $args       = wc()->query->get_main_query()->query_vars;
            $tax_query  = isset( $args['tax_query'] ) ? $args['tax_query'] : array();
            $meta_query = isset( $args['meta_query'] ) ? $args['meta_query'] : array();

            if ( ! is_post_type_archive( 'product' ) && ! empty( $args['taxonomy'] ) && ! empty( $args['term'] ) ) {
                $tax_query[] = array(
                    'taxonomy' => $args['taxonomy'],
                    'terms'    => array( $args['term'] ),
                    'field'    => 'slug',
                );
            }

            foreach ( $meta_query + $tax_query as $key => $query ) {
                if ( ! empty( $query['price_filter'] ) || ! empty( $query['rating_filter'] ) ) {
                    unset( $meta_query[ $key ] );
                }
            }

            $meta_query = new WP_Meta_Query( $meta_query );
            $tax_query  = new WP_Tax_Query( $tax_query );

            $meta_query_sql = $meta_query->get_sql( 'post', $wpdb->posts, 'ID' );
            $tax_query_sql  = $tax_query->get_sql( $wpdb->posts, 'ID' );

            $sql  = "SELECT min( FLOOR( price_meta.meta_value ) ) as min_price, max( CEILING( price_meta.meta_value ) ) as max_price FROM {$wpdb->posts} ";
            $sql .= " LEFT JOIN {$wpdb->postmeta} as price_meta ON {$wpdb->posts}.ID = price_meta.post_id " . $tax_query_sql['join'] . $meta_query_sql['join'];
            $sql .= " 	WHERE {$wpdb->posts}.post_type IN ('" . implode( "','", array_map( 'esc_sql', apply_filters( 'woocommerce_price_filter_post_type', array( 'product' ) ) ) ) . "')
					AND {$wpdb->posts}.post_status = 'publish'
					AND price_meta.meta_key IN ('" . implode( "','", array_map( 'esc_sql', apply_filters( 'woocommerce_price_filter_meta_keys', array( '_price' ) ) ) ) . "')
					AND price_meta.meta_value > '' ";
            $sql .= $tax_query_sql['where'] . $meta_query_sql['where'];

            if ( $search = WC_Query::get_main_search_query_sql() ) {
                $sql .= ' AND ' . $search;
            }

            return $wpdb->get_row( $sql );
        }
    }
}
