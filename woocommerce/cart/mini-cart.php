<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
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

?>

<?php do_action( 'woocommerce_before_mini_cart' ); ?>

<?php if ( ! WC()->cart->is_empty() ) : ?>

<div class="dropdown cart-dropdown navbar-right hidden-sm hidden-xs woocommerce-mini-cart cart_list product_list_widget <?php echo esc_attr( $args['list_class'] ); ?>">
    <button type="button" class="navbar-btn btn-icon btn-circle dropdown-toggle" data-toggle="dropdown"><i class="fa fa-shopping-cart"></i><span class="badge belli-cart-count"><?=
count(WC()->cart->get_cart()); ?></span></button>
    <div class="dropdown-menu cart-dropdown-menu" role="menu">
        <p class="cart-dropdown-desc"><i class="fa fa-cart-plus"></i>You have <?= count(WC()->cart->get_cart()) ?> product(s) in your cart:</p>
        <hr>
    <?php do_action("woocommerce_before_mini_cart_contents"); ?>

    <?php foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item): ?>
        <?php
	    $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
        $product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
        ?>
        <?php if($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key)): ?>
            <?php
		    $product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
            $thumbnail         = apply_filters('belli_shopping_cart_thumbnail_filter',apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key ));
            $product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
            $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
            ?>
        <div class="product clearfix woocommerce-mini-cart-item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
	        <?php
                echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
                '<a href="%s" class="remove remove-btn" aria-label="%s" data-product_id="%s" data-product_sku="%s"><i class="fa fa-close"></i></a>',
                esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
                __( 'Remove this item', 'woocommerce' ),
                esc_attr( $product_id ),
                esc_attr( $_product->get_sku() )
                ), $cart_item_key );
            ?>
            <?php if(!$_product->is_visible()): ?>
	            <?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ) /*. $product_name . '&nbsp;'*/; ?>
            <?php else: ?>
                <figure class="img-responsive-outer">
                    <a href="<?php echo esc_url( $product_permalink ); ?>">
                        <?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ) /*. $product_name . '&nbsp;'*/; ?>
                    </a>
                </figure>
            <?php endif; ?>
            <div class="product-meta">
                <h4 class="product-name"><a href="<?= esc_url($product_permalink) ?>"><?= esc_html($product_name); ?></a></h4>
                <div class="product-quantity quantity">x <?= esc_html($cart_item['quantity']); ?> piece(s)</div><!-- End .product-quantity -->
                <?= belli_get_price_html($_product); ?>


            </div><!-- End .product-meta -->
        </div><!-- End .product -->
        <?php endif; ?>
    <?php endforeach; ?>

    <?php do_action("woocommerce_mini_cart_contents"); ?>

        <?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>
        <hr>
        <div class="cart-action">
            <div class="pull-left cart-action-total woocommerce-mini-cart__total total">
                <span><?php _e( 'Subtotal', 'woocommerce' ); ?></span><?php echo WC()->cart->get_cart_subtotal(); ?>
            </div><!-- End .pull-left -->
            <div class="pull-right woocommerce-mini-cart__buttons buttons">
<!--                <a href="#" class="btn btn-custom ">Go to Cart</a>-->
	            <?php do_action( 'woocommerce_widget_shopping_cart_buttons' ); ?>
            </div>
        </div><!-- End .cart-action -->
    </div>
</div>


<?php else: ?>

<?php endif; ?>

<?php do_action("woocommerce_after_mini_cart"); ?>

