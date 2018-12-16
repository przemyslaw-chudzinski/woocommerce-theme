<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
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
 * @version 3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices();

do_action( 'woocommerce_before_cart' ); ?>

    <div class="row">
        <div class="col-md-12">
            <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
		        <?php do_action( 'woocommerce_before_cart_table' ); ?>

                <div class="table-responsive">
                    <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents table cart-table table-bordered" cellspacing="0">
                        <thead>
                        <tr>
                            <th class="product-name"><?php _e( 'Product', 'woocommerce' ); ?></th>
                            <th class="product-price"><?php _e( 'Price', 'woocommerce' ); ?></th>
                            <th class="product-quantity"><?php _e( 'Quantity', 'woocommerce' ); ?></th>
                            <th class="product-subtotal"><?php _e( 'Total', 'woocommerce' ); ?></th>
                            <th class="product-remove">&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
		                <?php do_action( 'woocommerce_before_cart_contents' ); ?>

		                <?php
		                foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			                $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			                $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

			                if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				                $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
				                ?>
                                <tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

                                    <td class="product-name" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
                                        <div class="product clearfix">
                                            <div class="product-top">
                                                <figure class="img-responsive-outer">
	                                                <?php
	                                                $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

	                                                if ( ! $product_permalink ) {
		                                                echo $thumbnail;
	                                                } else {
		                                                printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
	                                                }
	                                                ?>
                                                </figure>
                                            </div><!-- End .product-top -->
                                            <div class="product-meta">

                                                <h2 class="product-title">
	                                                <?php
	                                                if ( ! $product_permalink ) {
		                                                echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;';
	                                                } else {
		                                                echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key );
	                                                }

	                                                // Meta data
	                                                echo WC()->cart->get_item_data( $cart_item );

	                                                // Backorder notification
	                                                if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
		                                                echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>';
	                                                }
	                                                ?>
                                                </h2>
                                                <div class="ratings-container">
                                                    <a href="#" class="product-ratings add-tooltip" title="3.75 Average">
                                                                <span class="ratings" style="width:75%" >
                                                                    <span class="ratings-text sr-only">81 Rating</span>
                                                                </span><!-- End .ratings -->
                                                    </a><!-- End .product-ratings -->
                                                </div><!-- End .ratings-container -->
                                                <ul class="product-desc-list">
                                                    <li>Small / Dark Black Leather</li>
                                                    <li>Woman Jacket</li>
                                                </ul>
                                            </div><!-- End .product-meta -->
                                        </div><!-- End .product -->
                                    </td>

                                    <td class="price-col product-price" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>">
	                                    <?php
	                                     echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
	                                    ?>
                                    </td>

                                    <td class="quantity-col product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
                                        <div class="product-quantity">
	                                        <?php
	                                        if ( $_product->is_sold_individually() ) {
		                                        $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
	                                        } else {
		                                        $product_quantity = woocommerce_quantity_input( array(
			                                        'input_name'  => "cart[{$cart_item_key}][qty]",
			                                        'input_value' => $cart_item['quantity'],
			                                        'max_value'   => $_product->get_max_purchase_quantity(),
			                                        'min_value'   => '0',
		                                        ), $_product, false );
	                                        }

	                                        echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
	                                        ?>
                                        </div><!-- End .product-quantity -->
                                    </td>

                                    <td class="price-total-col product-subtotal" data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>">
	                                    <?php
	                                    echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
	                                    ?>
                                    </td>

                                    <td class="product-remove">
		                                <?php
		                                echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
			                                '<a href="%s" class="remove btn btn-dark btn-sm btn-delete" aria-label="%s" data-product_id="%s" data-product_sku="%s"><i class="fa fa-times"></i></a>',
			                                esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
			                                __( 'Remove this item', 'woocommerce' ),
			                                esc_attr( $product_id ),
			                                esc_attr( $_product->get_sku() )
		                                ), $cart_item_key );
		                                ?>
                                    </td>
                                </tr>
				                <?php
			                }
		                }
		                ?>

		                <?php do_action( 'woocommerce_cart_contents' ); ?>

		                <?php do_action( 'woocommerce_after_cart_contents' ); ?>
                        </tbody>
                    </table>
                </div>
                <div class="cart-action-container">
                    <a class="button wc-backward btn btn-custom" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
		                <?php _e( 'Return to shop', 'woocommerce' ) ?>
                    </a>
                    <input type="submit" class="button btn btn-dark" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>">
	                <?php do_action( 'woocommerce_cart_actions' ); ?>
	                <?php wp_nonce_field( 'woocommerce-cart' ); ?>
                </div><!-- End .cart-action-container -->
		        <?php do_action( 'woocommerce_after_cart_table' ); ?>
                <div class="cart-collaterals">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <h3 class="h4 title-border custom mb30">
                                    Get shipping Estimates
                                </h3>
                                <form action="#">
                                    <div class="form-group">
                                        <label class="input-desc">Country</label>
                                        <div class="clearfix">
                                            <select id="sss" name="sss" class="form-control">
                                                <option value="United States">United States</option>
                                                <option value="Brazil">Brazil</option>
                                                <option value="France">France</option>
                                                <option value="Italy">Italy</option>
                                                <option value="Spain">Spain</option>
                                            </select>
                                        </div><!-- End .medium-selectbox-->
                                    </div><!-- form-group -->
                                    <div class="form-group">
                                        <label class="input-desc">State</label>
                                        <div class="clearfix">
                                            <select id="state" name="state" class="form-control">
                                                <option  value="Alabama">Alabama</option>
                                                <option  value="Texas">Texas</option>
                                                <option  value="New York">New York</option>
                                            </select>
                                        </div><!-- End .medium-selectbox-->
                                    </div><!-- form-group -->
                                    <input type="submit" class="btn btn-dark" value="Calculate Shipping">
                                </form>
                            </div><!-- End .col-md-4 -->

                            <div class="mb50 clearfix visible-sm visible-xs"></div><!-- space -->

                            <div class="col-md-4">
                                <h3 class="h4 title-border custom mb30">
                                    Discount Coupon
                                </h3>
                                <p>If you have a discount coupon, please use the form below to get a discount.</p>
					            <?php if ( wc_coupons_enabled() ) { ?>
                                    <div class="coupon">
                                        <div class="form-group">
                                            <input type="text" name="coupon_code" class="input-text form-control" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" />
                                        </div>
                                        <input type="submit" class="button btn btn-dark" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>" />
							            <?php do_action( 'woocommerce_cart_coupon' ); ?>
                                    </div>
					            <?php } ?>
                            </div><!-- End .col-md-4 -->

                            <div class="mb50 clearfix visible-sm visible-xs"></div><!-- space -->

                            <div class="col-md-4">
					            <?php
					            /**
					             * woocommerce_cart_collaterals hook.
					             *
					             * @hooked woocommerce_cross_sell_display
					             * @hooked woocommerce_cart_totals - 10
					             */
					            do_action( 'woocommerce_cart_collaterals' );
					            ?>
                            </div><!-- End .row -->
                        </div><!-- End .row -->
                    </div><!-- End .container -->
                </div>
            </form>
        </div>
    </div>




<?php do_action( 'woocommerce_after_cart' ); ?>
