<?php $transpix_redux_demo = get_option('redux_demo');?> 
<footer>
     <div class="container">
        <div class="top-footer">
           <div class="row">
              <div class="col-xl-4 col-lg-4">
                 <div class="logo-wrapper">
                  <a href="<?php echo esc_url(home_url('/')); ?>">
                  <?php if(isset($transpix_redux_demo['footer_logo']['url']) && $transpix_redux_demo['footer_logo']['url'] != ''){ ?>
                  <img src="<?php echo esc_url($transpix_redux_demo['footer_logo']['url']); ?>" alt="">
                  <?php }else{ ?>
                    <img src="<?php echo get_template_directory_uri();?>/assets/img/footer_logo.png" alt="">
                  <?php } ?></a></div>
                 <p><?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['footer_description']));?> </p>
              </div>
              <div class="offset-xl-1 col-xl-2 col-lg-2">
                  <?php if ( is_active_sidebar( 'footer-area-1' ) ) : ?>
                  <?php dynamic_sidebar( 'footer-area-1' ); ?>
                  <?php endif; ?>
              </div>
              <div class="col-xl-2 col-lg-2">
                  <?php if ( is_active_sidebar( 'footer-area-2' ) ) : ?>
                  <?php dynamic_sidebar( 'footer-area-2' ); ?>
                  <?php endif; ?>
              </div>
              <div class="col-xl-3 col-lg-4">
                  <?php if ( is_active_sidebar( 'footer-area-3' ) ) : ?>
                  <?php dynamic_sidebar( 'footer-area-3' ); ?>
                  <?php endif; ?>
              </div>
           </div>
        </div>
        <div class="bottom-footer">
           <p class="text-center"><?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['footer_text']));?></p>
        </div>
     </div>
  </footer>
  <!--   footer section end    -->


  <!-- preloader section start -->
  <div class="loader-container">
     <span class="loader">
     <span class="loader-inner"></span>
     </span>
  </div>
  <!-- preloader section end -->


  <!-- back to top area start -->
  <div class="back-to-top">
     <i class="fas fa-chevron-up"></i>
  </div>
<?php wp_footer(); ?>
