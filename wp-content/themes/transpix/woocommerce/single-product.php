<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     1.6.4
 */
 $transpixs_redux_demo = get_option('redux_demo');
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<main class="woocommerce">
<?php if(isset($transpix_redux_demo['shop_details_banner_image']['url']) && $transpix_redux_demo['shop_details_banner_image']['url'] != ''){?>
<div class="breadcrumb-area about-breadcrumb-bg" style="background-image: url(<?php echo esc_url($transpix_redux_demo['shop_details_banner_image']['url']); ?>);">
<?php }else{?>  
<div class="breadcrumb-area about-breadcrumb-bg">
<?php } ?> 
     <div class="container">
        <div class="row">
           <div class="col-lg-7">
              <div class="breadcrumb-txt">
                 <span><?php if(isset($transpix_redux_demo['shop_details_subtitle'])){?>
                                    <?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['shop_details_subtitle']));?>
                                    <?php }else{?>
                                    <?php echo esc_html__( 'Product Details', 'transpix' );
                                    }
                                    ?></span>
                 <h1><?php if(isset($transpix_redux_demo['shop_details_title'])){?>
                                    <?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['shop_details_title']));?>
                                    <?php }else{?>
                                    <?php echo esc_html__( 'View Details of The Product', 'transpix' );
                                    }
                                    ?></h1>
                 <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                       <li class="breadcrumb-item"><a href="<?php echo esc_url(home_url('/')); ?>"><?php if(isset($transpix_redux_demo['home_text'])){?>
                                    <?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['home_text']));?>
                                    <?php }else{?>
                                    <?php echo esc_html__( 'Home', 'transpix' );
                                    }
                                    ?></a></li>
                       <li class="breadcrumb-item active" aria-current="page"><?php if(isset($transpix_redux_demo['shop_details_subtitle'])){?>
                                    <?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['shop_details_subtitle']));?>
                                    <?php }else{?>
                                    <?php echo esc_html__( 'Product Details', 'transpix' );
                                    }
                                    ?></li>
                    </ol>
                 </nav>
              </div>
           </div>
        </div>
     </div>
     <div class="breadcrumb-overlay"></div>
</div>
<div class="product-details">
  <div class="container">
    <div class="row">
      <div class="col-lg-5">
        <?php
          /**
           * woocommerce_before_single_product_summary hook
           *
           * @hooked woocommerce_show_product_sale_flash - 10
           * @hooked woocommerce_show_product_images - 20
           */
          do_action( 'woocommerce_before_single_product_summary' );
        ?>
      </div>
      <div class="col-lg-7">
          <?php wc_get_template_part( 'content', 'single-product' ); ?>
      </div>
     </div>
    </div>
    <div class="container product-infos">
      <div class="row">
        <?php
            /**
             * woocommerce_after_single_product_summary hook.
             *
             * @hooked woocommerce_output_product_data_tabs - 10
             * @hooked woocommerce_upsell_display - 15
             * @hooked woocommerce_output_related_products - 20
             */
            do_action( 'woocommerce_after_single_product_summary' );
        ?>
      </div>
    </div>
 </div>
</main>
 <?php endwhile; // end of the loop. ?>
<?php get_footer( ); ?>