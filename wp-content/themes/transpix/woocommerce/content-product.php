<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
  return;
}
$transpix_redux_demo = get_option('redux_demo');
?>

  <div class="col-xl-4 col-md-6">
    <div class="single-product">
      <div class="thumbnail">
        <?php
        /**
         * woocommerce_before_shop_loop_item hook.
         *
         * @hooked woocommerce_template_loop_product_link_open - 10
         */ 
        do_action( 'woocommerce_before_shop_loop_item' ); 

        /**
         * woocommerce_before_shop_loop_item_title hook.
         *
         * @hooked woocommerce_show_product_loop_sale_flash - 10
         * @hooked woocommerce_template_loop_product_thumbnail - 10
         */
        do_action( 'woocommerce_before_shop_loop_item_title' );?>

      </div>
      <div class="content">
        <h4 class="title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
       
        <div class="price">
          <?php 

          /**
           * woocommerce_after_shop_loop_item_title hook.
           *
           * @hooked woocommerce_template_loop_rating - 5
           * @hooked woocommerce_template_loop_price - 10
           */
          do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
        </div>
        <div class="shop-item-rate">
            <?php

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
                    <div class="woocommerce-product-rating" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
                    <div class="star-rating" title="<?php printf( __( 'Rated %s out of 5', 'woocommerce' ), $average ); ?>">
                      <span style="width:<?php echo ( ( $average / 5 ) * 100 ); ?>%">
                        <strong itemprop="ratingValue" class="rating"><?php echo esc_html( $average ); ?></strong> <?php printf( __( 'out of %s5%s', 'woocommerce' ), '<span itemprop="bestRating">', '</span>' ); ?>
                        <?php printf( _n( 'based on %s customer rating', 'based on %s customer ratings', $rating_count, 'woocommerce' ), '<span itemprop="ratingCount" class="rating">' . $rating_count . '</span>' ); ?>
                      </span>
                    </div>
                  </div>
            <?php endif; ?>
        </div>
        <?php 

        /**
         * woocommerce_after_shop_loop_item hook.
         *
         * @hooked woocommerce_template_loop_product_link_close - 5
         * @hooked woocommerce_template_loop_add_to_cart - 10
         */
        do_action( 'woocommerce_after_shop_loop_item' );
        ?>

    </div>
  </div>
</div>