<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
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
	exit;
}

wc_print_notices(); ?>
<div class="section-full content-inner-1">
	<!-- Product details -->
	<div class="container">
		<div class="login-form ">
			<div class="tab-content bg-gray">
				<form method="post" class="woocommerce-ResetPassword lost_reset_password p-a30 text-center">
					<h3 class="form-title m-t0">Lost Password</h3>
					<div class="dlab-separator-outer m-b5">
						<div class="dlab-separator bg-primary style-liner"></div>
					</div>

					<p class="woocommerce-FormRow woocommerce-FormRow--first form-row form-row-first">
						<label for="user_login"><?php _e( 'Username or email', 'woocommerce' ); ?></label>
						<input class="woocommerce-Input woocommerce-Input--text input-text" type="text" name="user_login" id="user_login" />
					</p>

					<div class="clear"></div>

					<?php do_action( 'woocommerce_lostpassword_form' ); ?>

					<p class="woocommerce-FormRow form-row">
						<input type="hidden" name="wc_reset_password" value="true" />
						<input type="submit" class="woocommerce-Button site-button" value="<?php esc_attr_e( 'Reset Password', 'woocommerce' ); ?>" />
					</p>

					<p><?php echo apply_filters( 'woocommerce_lost_password_message', __( 'Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.', 'woocommerce' ) ); ?></p>

					

					<?php wp_nonce_field( 'lost_password' ); ?>

				</form>
			</div>
		</div>
	</div>
</div>