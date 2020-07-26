<?php
/*
 * Template Name: Blogs Grid
 * Description: A Page Template with a Page Builder design.
 */
     $transpix_redux_demo = get_option('redux_demo');
     get_header(); 
?>
<?php if(isset($transpix_redux_demo['blog_grid_banner_image']['url']) && $transpix_redux_demo['blog_grid_banner_image']['url'] != ''){?>
<div class="breadcrumb-area blog-breadcrumb-bg" style="background-image: url(<?php echo esc_url($transpix_redux_demo['blog_grid_banner_image']['url']); ?>);
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
                 <h1><?php if(isset($transpix_redux_demo['blog_grid_title'])){?>
                                    <?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['blog_grid_title']));?>
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
<div class="news-section blog-grid">
 <div class="container">
    <div class="row">
        <?php  $args = array(    
                            'paged' => $paged,
                            'post_type' => 'post',
                            'posts_per_page' => $transpix_redux_demo['grid_number'],
                    );
                $wp_query = new WP_Query($args);
                while (have_posts()): the_post(); ?>
        <?php $featured_image_3 = get_post_meta(get_the_ID(),'_cmb_featured_image_3', true); ?>
       <div class="col-lg-4 col-md-6">
          <div class="single-news">
             <img src="<?php echo esc_attr($featured_image_3);?>" alt="">
             <div class="news-txt">
                <span class="date"><?php the_time(get_option( 'date_format' ));?>  -  <?php if(isset($transpix_redux_demo['blog_by'])){?>
                                          <?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['blog_by']));?>
                                          <?php }else{?>
                                          <?php echo esc_html__( 'BY ', 'transpix' );
                                          }
                                          ?> <?php the_author_posts_link(); ?></span>
                <a href="<?php the_permalink(); ?>" class="title">
                   <h3><?php the_title();?></h3>
                </a>
                <a class="readmore" href="<?php the_permalink(); ?>"><?php if(isset($transpix_redux_demo['read_more'])){?>
                                        <?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['read_more']));?>
                                        <?php }else{?>
                                        <?php echo esc_html__( 'Read More', 'transpix' );
                                        }
                                        ?></a>
             </div>
          </div>
       </div>
       <?php endwhile; ?>
    </div>
    <div class="row">
       <div class="col-lg-12">
          <nav class="pagination-nav">
             <?php transpix_pagination();?>
          </nav>
       </div>
    </div>
 </div>
</div>
    <!-- FOOTER -->
<?php
    get_footer();
?>