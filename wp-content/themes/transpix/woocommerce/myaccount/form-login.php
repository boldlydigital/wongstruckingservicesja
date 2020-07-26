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
 $transpix_redux_demo = get_option('redux_demo');
?>

<?php wc_print_notices(); ?>

<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

<div class="u-columns col2-set" id="customer_login">

	<div class="u-column1 col-1">

<?php endif; ?>
<div class="section-full content-inner-1">
				<!-- Product details -->
	<div class="container">
		<div class="login-form ">
			<div class="tab-content bg-gray">
				<div id="login" class="tab-pane active text-center">

		<form method="post" class="login p-a30 dlab-form">
			<h3 class="form-title m-t0"><?php _e( 'Sign In', 'woocommerce' ); ?></h3>
			<div class="dlab-separator-outer m-b5">
				<div class="dlab-separator bg-primary style-liner"></div>
			</div>

			<?php do_action( 'woocommerce_login_form_start' ); ?>

			<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
				<label for="username"><?php _e( 'Enter your e-mail address and your password.', 'woocommerce' ); ?></label>
				<div class="form-group">
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="username" id="username" placeholder="User Name" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
				</div>
			</p>
			<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
				<div class="form-group">
				<input class="woocommerce-Input woocommerce-Input--text input-text form-control" type="password" name="password"  id="password" />
				</div>
			</p>

			<?php do_action( 'woocommerce_login_form' ); ?>
			<div class="form-group text-left">
			<p class="form-row">
				<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
				<button type="submit" class="woocommerce-Button site-button m-r5 inline-block" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>"><?php esc_attr_e( 'Login', 'woocommerce' ); ?></button>
				
			</p>
			<p class="woocommerce-LostPassword lost_password">
				<a class="m-l5 inline-block" href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><i class="fa fa-unlock-alt"></i><?php _e( ' Forgot Password', 'woocommerce' ); ?></a>
			</p>
			</div>
			<?php do_action( 'woocommerce_login_form_end' ); ?>
		
		</form>
		<div class="bg-primary p-a15 bottom"> <a data-toggle="tab" href="<?php echo htmlspecialchars_decode(esc_attr($transpix_redux_demo['register_link']));?>" class="text-white">Create an account</a> </div>
		</div>
	</div>
</div>
</div>


</div>

<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

	</div>

	<div class="u-column2 col-2">

		<h2><?php _e( 'Register', 'woocommerce' ); ?></h2>

		<form method="post" class="register">

			<?php do_action( 'woocommerce_register_form_start' ); ?>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

				<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
					<label for="reg_username"><?php _e( 'Username', 'woocommerce' ); ?> <span class="required">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
				</p>

			<?php endif; ?>

			<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
				<label for="reg_email"><?php _e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
				<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" value="<?php if ( ! empty( $_POST['email'] ) ) echo esc_attr( $_POST['email'] ); ?>" />
			</p>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

				<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
					<label for="reg_password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
					<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" />
				</p>

			<?php endif; ?>

			<!-- Spam Trap -->
			<div style="<?php echo ( ( is_rtl() ) ? 'right' : 'left' ); ?>: -999em; position: absolute;"><label for="trap"><?php _e( 'Anti-spam', 'woocommerce' ); ?></label><input type="text" name="email_2" id="trap" tabindex="-1" autocomplete="off" /></div>

			<?php do_action( 'woocommerce_register_form' ); ?>
			<?php do_action( 'register_form' ); ?>

			<p class="woocomerce-FormRow form-row">
				<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
				<input type="submit" class="woocommerce-Button button" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>" />
			</p>

			<?php do_action( 'woocommerce_register_form_end' ); ?>

		</form>

	</div>

</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
