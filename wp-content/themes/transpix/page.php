<?php
/**
 * The Template for displaying all single posts
 */
 $transpix_redux_demo = get_option('redux_demo');
get_header(); ?>
<?php 
    while (have_posts()): the_post();
?>
<?php if(isset($transpix_redux_demo['shop_details_banner_image']['url']) && $transpix_redux_demo['shop_details_banner_image']['url'] != ''){?>
<div class="breadcrumb-area about-breadcrumb-bg" style="background-image: url(<?php echo esc_url($transpix_redux_demo['shop_details_banner_image']['url']); ?>);">
<?php }else{?>  
<div class="breadcrumb-area about-breadcrumb-bg">
<?php } ?> 
     <div class="container">
        <div class="row">
           <div class="col-lg-7">
              <div class="breadcrumb-txt">
                 <h1><?php the_title(); ?></h1>
                 <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                       <li class="breadcrumb-item"><a href="<?php echo esc_url(home_url('/')); ?>"><?php if(isset($transpix_redux_demo['home_text'])){?>
                                    <?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['home_text']));?>
                                    <?php }else{?>
                                    <?php echo esc_html__( 'Home', 'transpix' );
                                    }
                                    ?></a></li>
                       <li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
                    </ol>
                 </nav>
              </div>
           </div>
        </div>
     </div>
     <div class="breadcrumb-overlay"></div>
</div>
<div class="blog-area pt-120 cart-table">
    <div class="container">
        <div class="row">
          <div class="col-lg-12" id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
            <div class="blog-wrapper blog-details">
              <div class="blog-thumb">
                <a href="<?php the_permalink();?>">
                  <?php if ( has_post_thumbnail() ) { ?>
                  <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>"  />
                  <?php } ?>
                </a>
              </div>
              <div class="blog-content">
                  <?php the_content(); ?>
                  <?php wp_link_pages( array(
                  'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'transpix' ),
                  'after'       => '</div>',
                  'link_before' => '<span class="page-number">',
                  'link_after'  => '</span>',
                  ) ); ?>
              </div>
              <div class="next-prev-post clearfix">
                <?php previous_post_link('%link',wp_specialchars_decode(esc_html__( '<i class="ion-arrow-left-c"></i> Previous Post','transpix'),ENT_QUOTES), true); ?>
                <div class='right'><?php next_post_link('%link',wp_specialchars_decode(esc_html__('Next Post <i class="ion-arrow-right-c"></i>','transpix'),ENT_QUOTES), true); ?></div>
              </div>
             <?php           
                if ( comments_open() || get_comments_number() ) {
                  comments_template();
                }
                ?>
            </div>        
          </div>
    </div>
  </div>
</div>
  <?php endwhile; ?>

  <!-- blog-area end -->
 <?php get_footer();?>