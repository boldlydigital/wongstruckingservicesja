<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$transpix_redux_demo = get_option('redux_demo');
get_header(); ?>

<main class = "woocommerce">
<?php if(isset($transpix_redux_demo['shop_banner_image']['url']) && $transpix_redux_demo['shop_banner_image']['url'] != ''){?>
<div class="breadcrumb-area about-breadcrumb-bg" style="background-image: url(<?php echo esc_url($transpix_redux_demo['shop_banner_image']['url']); ?>);">
<?php }else{?>  
<div class="breadcrumb-area about-breadcrumb-bg">
<?php } ?> 
     <div class="container">
        <div class="row">
           <div class="col-lg-7">
              <div class="breadcrumb-txt">
                 <span><?php if(isset($transpix_redux_demo['shop_subtitle'])){?>
                                    <?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['shop_subtitle']));?>
                                    <?php }else{?>
                                    <?php echo esc_html__( 'Product Page', 'transpix' );
                                    }
                                    ?></span>
                 <h1><?php if(isset($transpix_redux_demo['shop_title'])){?>
                                    <?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['shop_title']));?>
                                    <?php }else{?>
                                    <?php echo esc_html__( 'FILTER OUT YOUR DESIRED PRODUCTS', 'transpix' );
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
                       <li class="breadcrumb-item active" aria-current="page"><?php if(isset($transpix_redux_demo['shop_subtitle'])){?>
                                    <?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['shop_subtitle']));?>
                                    <?php }else{?>
                                    <?php echo esc_html__( 'Product Page', 'transpix' );
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
<div class="products-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                  <div class="filters">
                    <?php get_sidebar('shop');?>
                  </div>
            </div>
            <div class="col-lg-9">
                <div class="products">
                    <div class="row no-gutters">
                    <?php
                        /**
                         * woocommerce_before_shop_loop hook.
                         *
                         * @hooked woocommerce_result_count - 20
                         * @hooked woocommerce_catalog_ordering - 30
                         */
                        do_action( 'woocommerce_before_shop_loop' );
                    ?>
                        

                  		      <?php if ( have_posts() ) : ?>

                  			<?php woocommerce_product_loop_start(); ?>

                  				<?php woocommerce_product_subcategories(); ?>

                  				<?php  
                                  while ( have_posts() ) : the_post(); ?>

                  					<?php 
                                      wc_get_template_part( 'content', 'product' ); ?>

                  				<?php endwhile; // end of the loop. ?>

                  			<?php woocommerce_product_loop_end(); ?>

                  			<?php
                  				/**
                  				 * woocommerce_after_shop_loop hook.
                  				 *
                  				 * @hooked woocommerce_pagination - 10
                  				 */
                  				do_action( 'woocommerce_after_shop_loop' );
                  			?>


                  		      <?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

                  			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

                  		<?php endif; ?>
                
                    </div>
                </div>
            </div>
        </div>
    </div>   
  </div>
</main>
<?php get_footer(); ?>
