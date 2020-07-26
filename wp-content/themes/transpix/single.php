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
<?php if(isset($transpix_redux_demo['blog_details_banner_image']['url']) && $transpix_redux_demo['blog_details_banner_image']['url'] != ''){?>
<div class="breadcrumb-area blog-breadcrumb-bg" style="background-image: url(<?php echo esc_url($transpix_redux_demo['blog_details_banner_image']['url']); ?>);
    background-size: cover;">
<?php }else{?>  
<div class="breadcrumb-area blog-breadcrumb-bg">
<?php } ?> 
     <div class="container">
        <div class="row">
           <div class="col-lg-8">
              <div class="breadcrumb-txt">
                 <span><?php if(isset($transpix_redux_demo['blog_subtitle'])){?>
                                    <?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['blog_subtitle']));?>
                                    <?php }else{?>
                                    <?php echo esc_html__( 'Latest Blog', 'transpix' );
                                    }
                                    ?></span>
                 <h1><?php if(isset($transpix_redux_demo['blog_details_title'])){?>
                                    <?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['blog_details_title']));?>
                                    <?php }else{?>
                                    <?php echo esc_html__( 'FROM THE LATEST NEWS AND BLOG', 'transpix' );
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
                       <li class="breadcrumb-item active" aria-current="page"><?php if(isset($transpix_redux_demo['blog_item_active'])){?>
                                    <?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['blog_item_active']));?>
                                    <?php }else{?>
                                    <?php echo esc_html__( 'Blog', 'transpix' );
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

<div class="blog-details-section section-padding">
     <div class="container">
        <div class="row">
           <div class="col-xl-7 col-lg-8">
              <div class="blog-details">
                 <img class="blog-details-img-1" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="">
                 <small class="date"><?php the_time(get_option( 'date_format' ));?>  -  <?php if(isset($transpix_redux_demo['blog_by'])){?>
                                          <?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['blog_by']));?>
                                          <?php }else{?>
                                          <?php echo esc_html__( 'BY ', 'transpix' );
                                          }
                                          ?> <?php the_author_posts_link(); ?></small>
                 <h2 class="blog-details-title"><?php the_title();?></h2>
                 <div class="blog-details-body">
                    <?php the_content(); ?>
                    <?php wp_link_pages(); ?>
                 </div>
              </div>
              <div class="blog-share">
                 <ul>
                    <?php if($single_facebook !='') { ?>
                    <li><a href="<?php echo esc_url($single_facebook); ?>" class="facebook-share"><i class="fab fa-facebook-f"></i> <?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['text_facebook']));?></a></li>
                    <?php } ?>
                    <?php if($single_twitter !='') { ?>
                    <li><a href="<?php echo esc_url($single_twitter); ?>" class="twitter-share"><i class="fab fa-twitter"></i> <?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['text_twitter']));?></a></li>
                    <?php } ?>
                    <?php if($single_pinterest !='') { ?>
                    <li><a href="<?php echo esc_url($single_pinterest); ?>" class="pinterest-share"><i class="fab fa-pinterest-p"></i> <?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['text_pinterest']));?></a></li>
                    <?php } ?>
                 </ul>
              </div>
              <div class="author-info">
                 <div class="author-img-wrapper">
                    <?php echo get_avatar(get_the_author_meta('user_email'),$size='100',
                  $default='http://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=100' );?>
                 </div>
                 <div class="author-details">
                    <h4 class="name"><?php the_author_posts_link(); ?></h4>
                    <p class="desc"><?php echo get_the_author_meta('description');?>
                    </p>
                 </div>
              </div>
              <?php comments_template();?>
           </div>
           <!--    blog sidebar section start   -->
           <div class="col-xl-4 offset-xl-1 col-lg-4">
              <div class="sidebar">
                 <?php get_sidebar();?>
              </div>
           </div>
           <!--    blog sidebar section end   -->
        </div>
     </div>
    </div>
    <!-- blog-area-end -->

<?php endwhile; ?>
    <!-- FOOTER -->
<?php
    get_footer();
?>