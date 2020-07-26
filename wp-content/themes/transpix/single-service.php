<?php
   $transpix_redux_demo = get_option('redux_demo');
   get_header(); 
?>
<?php 
    while (have_posts()): the_post();
?>
<?php $single_facebook = get_post_meta(get_the_ID(),'_cmb_single_facebook', true); ?>
<?php $single_twitter = get_post_meta(get_the_ID(),'_cmb_single_twitter', true); ?>
<?php $single_pinterest = get_post_meta(get_the_ID(),'_cmb_single_pinterest', true); ?>
<!-- page title start -->
<?php if(isset($transpix_redux_demo['service_details_banner_image']['url']) && $transpix_redux_demo['service_details_banner_image']['url'] != ''){?>
<div class="breadcrumb-area service-details-breadcrumb-bg" style="background-image: url(<?php echo esc_url($transpix_redux_demo['service_details_banner_image']['url']); ?>);
    background-size: cover;">
<?php }else{?>  
<div class="breadcrumb-area service-details-breadcrumb-bg">
<?php } ?> 
     <div class="container">
        <div class="row">
           <div class="col-lg-8">
              <div class="breadcrumb-txt">
                 <span><?php if(isset($transpix_redux_demo['service_subtitle'])){?>
                                    <?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['service_subtitle']));?>
                                    <?php }else{?>
                                    <?php echo esc_html__( 'Services', 'transpix' );
                                    }
                                    ?></span>
                 <h1><?php if(isset($transpix_redux_demo['service_details_title'])){?>
                                    <?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['service_details_title']));?>
                                    <?php }else{?>
                                    <?php echo esc_html__( 'we provide best services', 'transpix' );
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
                       <li class="breadcrumb-item active" aria-current="page"><?php if(isset($transpix_redux_demo['service_item_active'])){?>
                                    <?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['service_item_active']));?>
                                    <?php }else{?>
                                    <?php echo esc_html__( 'Services', 'transpix' );
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
<!--  service details section start  -->
<div class="service-details-section">
     <div class="container">
        <div class="row">
           <div class="col-xl-7 col-lg-8">
              <div class="service-details-content">
                 <div class="img-wrapper"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>"></div>
                 <div class="service-details-desc">
                    <?php the_content(); ?>
                    <?php wp_link_pages(); ?>
                 </div>
              </div>
           </div>
           <!--  sidebar section start  -->
           <div class="col-xl-4 offset-xl-1 col-lg-4">
              <div class="sidebar">
                 <div class="category-sidebar">
                    <?php 
                      wp_nav_menu( 
                      array( 
                            'theme_location' => 'service',
                            'container' => '',
                            'menu_class' => '', 
                            'menu_id' => '',
                            'menu'            => '',
                            'container_class' => '',
                            'container_id'    => '',
                            'echo'            => true,
                             'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                             'walker'            => new transpix_wp_bootstrap_navwalker(),
                            'before'          => '',
                            'after'           => '',
                            'link_before'     => '',
                            'link_after'      => '',
                            'items_wrap'      => '<ul  class="service_sidebar  %2$s">%3$s</ul>',
                            'depth'           => 0,        
                        )

                     ); ?>
                    </div>
                    <?php get_sidebar('service');?>
              </div>
           </div>
           <!--  sidebar section end  -->
        </div>
     </div>
</div>
<!--  service details section end  -->
<?php endwhile; ?>
    <!-- FOOTER -->
<?php
    get_footer();
?>