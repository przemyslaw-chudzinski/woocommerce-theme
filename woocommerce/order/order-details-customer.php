<?php
/**
 * Order Customer Details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details-customer.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$show_shipping = ! wc_ship_to_billing_address_only() && $order->needs_shipping_address();
?>

<section class="woocommerce-customer-details">

    <?php if ( $show_shipping ) : ?>

    <section class="woocommerce-columns woocommerce-columns--2 woocommerce-columns--addresses col2-set addresses">

        <div class="row">
            <div class="woocommerce-column woocommerce-column--1 woocommerce-column--billing-address col-xs-12 col-md-4">
                <?php else: ?>
                    <div class="row">
                    <div class="col-xs-12 col-md-4">
                <?php endif; ?>

                <div class="form-wrapper">
                    <h2 class="woocommerce-column__title title-underblock custom mb40"><?php _e( 'Billing address', 'woocommerce' ); ?></h2>

                    <address>
                        <?php echo wp_kses_post( $order->get_formatted_billing_address( __( 'N/A', 'woocommerce' ) ) ); ?>

                        <?php if ( $order->get_billing_phone() ) : ?>
                            <p class="woocommerce-customer-details--phone"><?php echo esc_html( $order->get_billing_phone() ); ?></p>
                        <?php endif; ?>

                        <?php if ( $order->get_billing_email() ) : ?>
                            <p class="woocommerce-customer-details--email"><?php echo esc_html( $order->get_billing_email() ); ?></p>
                        <?php endif; ?>
                    </address>
                </div>

                 <?php if ( !$show_shipping ) : ?>
                    </div>
                    </div>
                 <?php endif; ?>

                <?php if ( $show_shipping ) : ?>

            </div><!-- /.col-1 -->

            <div class="woocommerce-column woocommerce-column--2 woocommerce-column--shipping-address col-xs-12 col-md-4">
                <div class="form-wrapper">
                    <h2 class="woocommerce-column__title title-underblock custom mb40"><?php _e( 'Shipping address', 'woocommerce' ); ?></h2>
                    <address>
                        <?php echo wp_kses_post( $order->get_formatted_shipping_address( __( 'N/A', 'woocommerce' ) ) ); ?>
                    </address>
                </div>
            </div><!-- /.col-2 -->
        </div>

    </section><!-- /.col2-set -->

<?php endif; ?>

</section>
