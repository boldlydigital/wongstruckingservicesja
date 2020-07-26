<?php
/*
 * Template Name: Blog List Sidebar
 * Description: A Page Template with a Page Builder design.
 */
     $transpix_redux_demo = get_option('redux_demo');
     get_header(); 
?>
<?php if(isset($transpix_redux_demo['blog_list_banner_image']['url']) && $transpix_redux_demo['blog_list_banner_image']['url'] != ''){?>
<div class="breadcrumb-area blog-breadcrumb-bg" style="background-image: url(<?php echo esc_url($transpix_redux_demo['blog_list_banner_image']['url']); ?>);
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
                 <h1><?php if(isset($transpix_redux_demo['blog_list_title'])){?>
                                    <?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['blog_list_title']));?>
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
    <!-- blog area -->
<div class="blog-lists">
     <div class="container">
        <div class="row">
           <div class="col-xl-7 col-lg-8">
              <div class="row">
                 <div class="col-lg-12">
                    <?php  $args = array(    
                                'paged' => $paged,
                                'post_type' => 'post',
                        );
                    $wp_query = new WP_Query($args);
                    while (have_posts()): the_post(); ?>
                    <div class="single-blog">
                       <div class="blog-img-wrapper">
                          <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="">
                       </div>
                       <div class="blog-txt">
                          <p class="date"><?php the_time(get_option( 'date_format' ));?>  -  <?php if(isset($transpix_redux_demo['blog_by'])){?>
                                          <?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['blog_by']));?>
                                          <?php }else{?>
                                          <?php echo esc_html__( 'BY ', 'transpix' );
                                          }
                                          ?> <?php the_author_posts_link(); ?></p>
                          <h3 class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
                          <p class="blog-summary"><?php if(isset($transpix_redux_demo['blog_excerpt'])){?>
                                <?php echo esc_attr(transpix_excerpt($transpix_redux_demo['blog_excerpt'])); ?>
                                <?php }else{?>
                                <?php echo esc_attr(transpix_excerpt(40)); 
                                }
                                ?></p>
                          <a href="<?php the_permalink(); ?>" class="readmore"><?php if(isset($transpix_redux_demo['read_more'])){?>
                                        <?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['read_more']));?>
                                        <?php }else{?>
                                        <?php echo esc_html__( 'Read More', 'transpix' );
                                        }
                                        ?></a>
                       </div>
                    </div>
                    <?php endwhile; ?>
                 </div>
              </div>
              <div class="row">
                 <div class="col-lg-12">
                    <nav class="pagination-nav">
                       <?php transpix_pagination();?>
                    </nav>
                 </div>
              </div>
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
    <!-- blog area end -->
    <!-- FOOTER -->
<?php
    get_footer();
?>