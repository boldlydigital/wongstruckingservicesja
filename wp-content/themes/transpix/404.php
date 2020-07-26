<?php
/**
 * The template for displaying 404 pages (Not Found)
 */
    $transpix_redux_demo = get_option('redux_demo');
    get_header(); 
?> 

<div class="breadcrumb-area services-breadcrumb-bg">
     <div class="container">
        <div class="row">
           <div class="col-lg-8">
              <div class="breadcrumb-txt">
                 <span>404 Page</span>
                 <h1>Oops! The Page not found</h1>
                 <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                       <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                       <li class="breadcrumb-item active" aria-current="page">404</li>
                    </ol>
                 </nav>
              </div>
           </div>
        </div>
     </div>
     <div class="breadcrumb-overlay"></div>
  </div>
  <!--  breadcrumb end  -->
  
  
  <!--    Error section start   -->
  <div class="error-section">
     <div class="container">
        <div class="row">
           <div class="col-lg-6">
              <div class="not-found">
                 <img src="<?php echo get_template_directory_uri();?>/assets/img/404/404.png" alt="">
              </div>
           </div>
           <div class="col-lg-6">
              <div class="error-txt">
                 <div class="oops">
                    <img src="<?php echo get_template_directory_uri();?>/assets/img/404/oops.png" alt="">
                 </div>
                 <h2><?php if(isset($transpix_redux_demo['404_title'])){?>
                                    <?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['404_title']));?>
                                    <?php }else{?>
                                    <?php echo esc_html__( 'You are lost...', 'transpix' );
                                    }
                                    ?></h2>
                 <p><?php if(isset($transpix_redux_demo['404_subtitle'])){?>
                                    <?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['404_subtitle']));?>
                                    <?php }else{?>
                                    <?php echo esc_html__( 'The page you are looking for might have been moved, renamed, or might never existed.', 'transpix' );
                                    }
                                    ?></p>
                 <a href="<?php echo esc_url(home_url('/')); ?>" class="go-home-btn"><?php if(isset($transpix_redux_demo['404_button'])){?>
                                    <?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['404_button']));?>
                                    <?php }else{?>
                                    <?php echo esc_html__( 'Back Home', 'transpix' );
                                    }
                                    ?></a>
              </div>
           </div>
        </div>
     </div>
  </div>
<?php
get_footer(); ?> 
