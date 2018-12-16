<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
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
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $redux;
?>

<?php wc_print_notices(); ?>

<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

<div class="row">
    <div class="col-md-6">
	    <?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

        <div class="u-columns col2-set" id="customer_login">

            <div class="u-column1 col-1">

			    <?php endif; ?>

                <div class="form-wrapper">
                    <h2 class="title-underblock custom mb30"><?php _e( 'Login', 'woocommerce' ); ?></h2>

                    <form class="woocomerce-form woocommerce-form-login login" method="post">

		                <?php do_action( 'woocommerce_login_form_start' ); ?>

                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <label for="username" class="input-desc"><?php _e( 'Username or email address', 'woocommerce' ); ?> <span class="required">*</span></label>
                            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="username" id="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( $_POST['username'] ) : ''; ?>" />
                        </p>
                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <label for="password" class="input-desc"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
                            <input class="woocommerce-Input woocommerce-Input--text input-text form-control" type="password" name="password" id="password" />
                        </p>

		                <?php do_action( 'woocommerce_login_form' ); ?>

                        <p class="woocommerce-LostPassword lost_password">
                            <div class="form-group text-right clear-margin helper-group">
                                <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php _e( 'Lost your password?', 'woocommerce' ); ?></a>
                            </div>
                        </p>

                        <p>
                        <div class="checkbox">
                            <label class="custom-checkbox-wrapper">
                                        <span class="woocommerce-form__label woocommerce-form__label-for-checkbox inline custom-checkbox-container">
                                            <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" />
                                        </span>
                                <span>Remember Me!</span>
                            </label>
                        </div><!-- End .checkbox -->
                        </p>

                        <p class="form-row">
			                <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
                            <input type="submit" class="woocommerce-Button button btn btn-custom" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>" />

                        </p>

		                <?php do_action( 'woocommerce_login_form_end' ); ?>

                    </form>
                </div>

			    <?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

            </div>

        </div>
    <?php endif; ?>
    </div>
    <div class="mb40 visible-xs"></div><!-- space -->

    <div class="col-sm-6">
        <?php if(isset($redux['login-site-create-account-header']) && !empty($redux['login-site-create-account-header'])): ?>
            <h2 class="title-underblock custom mb40"><?= $redux['login-site-create-account-header'] ?></h2>
        <?php endif; ?>

        <?php if(isset($redux['login-site-create-account-desc']) && !empty($redux['login-site-create-account-desc'])): ?>
            <?= $redux['login-site-create-account-desc']; ?>
        <?php endif; ?>

        <div class="mb10"></div><!-- space -->

        <button
                class="btn btn-custom"
                role="button"
                data-toggle="modal"
                data-target="#belliRegisterForm"
                aria-expanded="false"><?= $redux['login-site-create-account-button'] ?></button>

    </div><!-- End .col-sm-6 -->
</div>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>

<!-- Register form -->
<div class="modal fade" tabindex="-1" role="dialog" id="belliRegisterForm" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <h2 class="title-underblock custom mb30"><?php _e( 'Register', 'woocommerce' ); ?></h2>

                <form method="post" class="register">

                    <?php do_action( 'woocommerce_register_form_start' ); ?>

                    <?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

                        <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide form-group">
                            <label for="reg_username"><?php _e( 'Username', 'woocommerce' ); ?> <span class="required">*</span></label>
                            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="username" id="reg_username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( $_POST['username'] ) : ''; ?>" />
                        </div>

                    <?php endif; ?>

                    <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide form-group">
                        <label for="reg_email"><?php _e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
                        <input type="email" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="email" id="reg_email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( $_POST['email'] ) : ''; ?>" />
                    </div>

                    <?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

                        <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide form-group">
                            <label for="reg_password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
                            <input type="password" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="password" id="reg_password" />
                        </div>

                    <?php endif; ?>

                    <!-- Spam Trap -->
                    <div style="<?php echo ( ( is_rtl() ) ? 'right' : 'left' ); ?>: -999em; position: absolute;"><label for="trap"><?php _e( 'Anti-spam', 'woocommerce' ); ?></label><input type="text" name="email_2" id="trap" tabindex="-1" autocomplete="off" /></div>

                    <?php do_action( 'woocommerce_register_form' ); ?>

                    <div class="woocomerce-FormRow form-row">
                        <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
                        <input type="submit" class="woocommerce-Button button btn btn-custom" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>" />
                    </div>

                    <?php do_action( 'woocommerce_register_form_end' ); ?>

                </form>
            </div>
<!--            <div class="modal-footer">-->
<!--                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
<!--                <button type="button" class="btn btn-primary">Save changes</button>-->
<!--            </div>-->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
