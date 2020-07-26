<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<?php $transpix_redux_demo = get_option('redux_demo'); ?>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
    <?php if(isset($transpix_redux_demo['favicon']['url'])){?>
    <link rel="shortcut icon" href="<?php echo esc_url($transpix_redux_demo['favicon']['url']); ?>">
    <?php }?>
    <?php }?>
    <?php wp_head(); ?>
    </head>
    <body class="home2" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <!-- header start -->
    <!--   header area start   -->
      <div class="header-area home-2">
         <div class="info-bar">
            <div class="container">
               <div class="row">
                  <div class="col-lg-4 col-8">
                     <ul class="social-links">
                      <?php if(isset($transpix_redux_demo['link_facebook']) && $transpix_redux_demo['link_facebook'] != ''){?>
                        <li><a href="<?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['link_facebook']));?>"><i class="fab fa-facebook-f"></i></a></li>
                      <?php } ?>
                      <?php if(isset($transpix_redux_demo['link_twitter']) && $transpix_redux_demo['link_twitter'] != ''){?>
                        <li><a href="<?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['link_twitter']));?>"><i class="fab fa-twitter"></i></a></li>
                      <?php } ?>
                      <?php if(isset($transpix_redux_demo['link_linkedin']) && $transpix_redux_demo['link_linkedin'] != ''){?>
                        <li><a href="<?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['link_linkedin']));?>"><i class="fab fa-linkedin-in"></i></a></li>
                      <?php } ?>
                      <?php if(isset($transpix_redux_demo['link_google']) && $transpix_redux_demo['link_google'] != ''){?>
                        <li><a href="<?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['link_google']));?>"><i class="fab fa-google-plus-g"></i></a></li>
                      <?php } ?>
                     </ul>
                  </div>
                  <div class="col-lg-8 col-4">
                     <div class="right-content">
                        <span class="working-time"><?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['header_text']));?></span>
                        <div class="language">
                           <a href="#" class="dropdown-btn"><?php echo esc_html__( 'EN', 'transpix' );
                                    ?> <i class="flaticon-down-arrow"></i></a>
                           <ul class="language-dropdown">
                              <li>
                                 <a href="#"><?php echo esc_html__( 'English', 'transpix' );
                                    ?></a>
                              </li>
                              <li>
                                 <a href="#"><?php echo esc_html__( 'French', 'transpix' );
                                    ?></a>
                              </li>
                              <li>
                                 <a href="#"><?php echo esc_html__( 'Spanish', 'transpix' );
                                    ?></a>
                              </li>
                              <li>
                                 <a href="#"><?php echo esc_html__( 'Arabic', 'transpix' );
                                    ?></a>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="support-nav-area">
            <div class="container">
               <div class="support-nav-container">
                  <div class="row">
                     <div class="col-lg-3 col-6">
                        <div class="logo-wrapper">
                           <div class="logo-wrapper-inner">
                              <a href="<?php echo esc_url(home_url('/')); ?>">
                              <?php if(isset($transpix_redux_demo['logo']['url']) && $transpix_redux_demo['logo']['url'] != ''){ ?>
                              <img src="<?php echo esc_url($transpix_redux_demo['logo']['url']); ?>" alt="">
                              <?php }else{ ?>
                                <img src="<?php echo get_template_directory_uri();?>/assets/img/logo.png" alt="">
                              <?php } ?></a>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-9 col-6 position-static">
                        <div class="support-bar">
                           <div class="row">
                              <div class="offset-lg-2 col-lg-10 offset-xl-4 col-xl-8">
                                 <div class="row">
                                    <div class="col-lg-4">
                                       <div class="support-info">
                                          <div class="left-content"><i class="flaticon-call"></i></div>
                                          <div class="right-content">
                                             <div class="right-content-inner">
                                                <?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['header_phone']));?>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-lg-4">
                                       <div class="support-info">
                                          <div class="left-content"><i class="flaticon-email"></i></div>
                                          <div class="right-content">
                                             <?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['header_email']));?>
                                          </div>
                                       </div>
                                    </div>
                                    <?php if(isset($transpix_redux_demo['header_button']) && $transpix_redux_demo['header_button'] != ''){?>
                                    <div class="col-lg-4">
                                      <a href="<?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['header_link_button']));?>" class="boxed-btn"><span><?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['header_button']));?></span></a>
                                   </div>
                                  <?php } ?>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div id="mobileMenuHome2"></div>
                        <ul class="search-cart-area mobile">
                           <li class="search-icon"><a href="#"><i class="flaticon-search"></i></a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="navbar-area">
                     <div class="row">
                        <div class="col-md-9">
                           <nav class="main-menu" id="mainMenuHome2">
                              <?php 
                                  wp_nav_menu( 
                                  array( 
                                        'theme_location' => 'primary',
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
                                        'items_wrap'      => '<ul  class=" %2$s">%3$s</ul>',
                                        'depth'           => 0,        
                                    )
                                 ); ?>
                           </nav>
                        </div>
                        <div class="col-md-3">
                           <ul class="search-cart-area">
                              <li class="search-icon"><a href=""><i class="flaticon-search"></i></a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--   header area end   -->


      <!--   search bar popup start   -->
      <div class="search-popup">
         <form class="search-form">
            <div class="form-element"><input type="search" name="s" id="s" placeholder="Type your search keyword"></div>
         </form>
         <div class="search-popup-overlay" id="searchOverlay"></div>
         <button class="search-close-btn" id="searchCloseBtn"><i class="fas fa-times"></i></button>
      </div>
      <!--   search bar popup end   -->   