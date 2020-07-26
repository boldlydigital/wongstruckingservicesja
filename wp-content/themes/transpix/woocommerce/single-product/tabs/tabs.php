<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
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
 * @version 2.4.0
 */

$product_spe = get_post_meta(get_the_ID(),'_cmb_product_spe', true);
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) : ?>

<div class="col-lg-12">
	<div class="product-review">
		<ul class="nav nav-tabs justify-content-center review-tab">
			<?php $i = 1; foreach ( $tabs as $key => $tab ) : ?>
				<li class="nav-item  <?php echo esc_attr( $key ); ?>_tab">
					<a class="nav-link <?php if ($i == 1){echo 'active show'; } ?>" href="#tab-<?php echo esc_attr( $key ); ?>" data-toggle="tab"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); ?></a>
				</li>
			<?php $i++; endforeach; ?>
			<?php if($product_spe){ ?>
			<li class="nav-item"><a class="nav-link" href="#tab2default" data-toggle="tab"><?php echo esc_html__( 'Specification', 'transpixs' );?></a></li>
			<?php } ?>
		</ul>
		<div class="tab-content">
			<?php $i = 1; foreach ( $tabs as $key => $tab ) : ?>
				<div class="tab-pane fade <?php if ($i == 1){echo 'in active show'; } ?>" id="tab-<?php echo esc_attr( $key ); ?>">
					<div class="review-text">
						<?php call_user_func( $tab['callback'], $key, $tab ); ?>
					</div>
				</div>
			<?php $i++; endforeach; ?>
			<div id="tab2default" class="tab-pane fade">
	          <p><?php echo esc_attr($product_spe); ?></p>
	        </div>
		</div>
	</div>
</div>

<?php endif; ?>
