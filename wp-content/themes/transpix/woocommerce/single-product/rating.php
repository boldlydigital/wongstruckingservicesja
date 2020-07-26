<?php
/**
 * Single Product Rating
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/rating.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.3.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if ( get_option( 'woocommerce_enable_review_rating' ) === 'no' ) {
	return;
}

$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();

if ( $rating_count > 0 ) : ?>
	<div id="graphic-design-1" class="tab-pane">
        <table class="table table-bordered" >
            <tr>
                <td>Pricing</td>
                <td><?php echo get_woocommerce_currency_symbol( $currency ); ?><?php echo esc_attr( $product->get_display_price() ); ?> </td>
            </tr>
            <tr>
                <td>Stock Availability</td>
                <td><?php echo $product->is_in_stock() ? 'AVAILABLE' : 'UNAVAILABLE'; ?></td>
            </tr>
            <tr>
                <td>Rating</td>
                <td><div class="woocommerce-product-rating" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
            <div class="star-rating" title="<?php printf( __( 'Rated %s out of 5', 'woocommerce' ), $average ); ?>">
                <span style="width:<?php echo ( esc_attr( $rating_count ) / ($review_count) ) * 100; ?>%">
                <strong itemprop="ratingValue" class="rating"><?php echo esc_html( $average ); ?></strong> <?php printf( __( 'out of %s5%s', 'woocommerce' ), '<span itemprop="bestRating">', '</span>' ); ?>
                <?php printf( _n( 'based on %s customer rating', 'based on %s customer ratings', $rating_count, 'woocommerce' ), '<span itemprop="ratingCount" class="rating">' . $rating_count . '</span>' ); ?>
                </span>
            </div>
        </div> </td>
            </tr>
        </table>
    </div>

<?php endif; ?>