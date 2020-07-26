<?php
$transpix_redux_demo = get_option('redux_demo');

//Custom fields:
require_once get_template_directory() . '/framework/wp_bootstrap_navwalker.php';
require_once get_template_directory() . '/framework/widget/recent-post.php';
//Theme Set up:
function transpix_theme_setup() {
    /*
     * This theme uses a custom image size for featured images, displayed on
     * "standard" posts and pages.
     */
	add_theme_support( 'custom-header' ); 
  remove_filter ('the_content', 'wpautop');
	add_theme_support( 'custom-background' );
	$lang = get_template_directory_uri() . '/languages';
  load_theme_textdomain('transpix', $lang);
  add_theme_support( 'post-thumbnails' );
  // Adds RSS feed links to <head> for posts and comments.
  add_theme_support( 'automatic-feed-links' );
  // Switches default core markup for search form, comment form, and comments
  // to output valid HTML5.
  add_theme_support( "title-tag" );
  add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );
  // This theme uses wp_nav_menu() in one location.
  register_nav_menus( array(
  'primary' =>  esc_html__( 'Primary Navigation Menu.', 'transpix' ),
  'service' =>  esc_html__( 'Service Menu.', 'transpix' ),
	) );
    // This theme uses its own gallery styles.
}
add_action( 'after_setup_theme', 'transpix_theme_setup' );
if ( ! isset( $content_width ) ) $content_width = 900;

function transpix_fonts_url() {
    $font_url = '';

    if ( 'off' !== _x( 'on', 'Google font: on or off', 'transpix' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Nunito:300,400,700&subset=latin,latin-ext' ), "//fonts.googleapis.com/css" );
    }
    return $font_url;
}

function transpix_theme_scripts_styles() {
	$transpix_redux_demo = get_option('redux_demo');
	$protocol = is_ssl() ? 'https' : 'http';
    wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css');
    wp_enqueue_style( 'flaticon', get_template_directory_uri().'/assets/css/flaticon.css');
    wp_enqueue_style( 'fontawesome', get_template_directory_uri().'/assets/css/fontawesome.min.css');
    wp_enqueue_style( 'owl-carousel', get_template_directory_uri().'/assets/css/owl.carousel.min.css');
    wp_enqueue_style( 'owl-theme-default', get_template_directory_uri().'/assets/css/owl.theme.default.min.css');
    wp_enqueue_style( 'lightbox', get_template_directory_uri().'/assets/css/lightbox.min.css');
    wp_enqueue_style( 'slicknav', get_template_directory_uri().'/assets/css/slicknav.css');
    wp_enqueue_style( 'animate', get_template_directory_uri().'/assets/css/animate.min.css');
    wp_enqueue_style( 'transpix-style', get_template_directory_uri().'/assets/css/style.css');
    wp_enqueue_style( 'responsive', get_template_directory_uri().'/assets/css/responsive.css');
    
    wp_enqueue_style( 'transpix-css', get_stylesheet_uri(), array(), '2019-11-11' );

if(isset($transpix_redux_demo['chosen-color']) && $transpix_redux_demo['chosen-color']==1){
    wp_enqueue_style( 'color', get_template_directory_uri().'/framework/color.php');
    }    
if(isset($transpix_redux_demo['support-rtl']) && $transpix_redux_demo['support-rtl']==1){
    wp_enqueue_style( 'support-rtl', get_template_directory_uri().'/rtl.css');
    }
    
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
    wp_enqueue_script( 'comment-reply' );
  //Javascript
    wp_enqueue_script("transpix-jquery", get_template_directory_uri()."assets/js/jquery-3.3.1.min.js",array(),false,true);
    wp_enqueue_script("popper", get_template_directory_uri()."/assets/js/popper.min.js",array(),false,true);
    wp_enqueue_script("bootstrap", get_template_directory_uri()."/assets/js/bootstrap.min.js",array(),false,true);
    wp_enqueue_script("owl-carousel", get_template_directory_uri()."/assets/js/owl.carousel.min.js",array(),false,true);
    wp_enqueue_script("lightbox", get_template_directory_uri()."/assets/js/lightbox.min.js",array(),false,true);  
    wp_enqueue_script("isotope-pkgd", get_template_directory_uri()."/assets/js/isotope.pkgd.min.js",array(),false,true);
    wp_enqueue_script("slicknav", get_template_directory_uri()."/assets/js/jquery.slicknav.min.js",array(),false,true);
    wp_enqueue_script("wow", get_template_directory_uri()."/assets/js/wow.min.js",array(),false,true);
    wp_enqueue_script("parallax", get_template_directory_uri()."/assets/js/parallax.min.js",array(),false,true);
    wp_enqueue_script("YTPlayer", get_template_directory_uri()."/assets/js/YTPlayer.min.js",array(),false,true);
    wp_enqueue_script("ripples", get_template_directory_uri()."/assets/js/jquery.ripples-min.js",array(),false,true);
    wp_enqueue_script("transpix-main", get_template_directory_uri()."/assets/js/main.js",array(),false,true);
    wp_enqueue_script("transpix-map", $protocol ."://maps.googleapis.com/maps/api/js?key=AIzaSyBqFuLx8S7A8eianoUhkYMeXpGPvsXp1NM&callback=initMap");

}
    
add_action( 'wp_enqueue_scripts', 'transpix_theme_scripts_styles' );
//Custom Excerpt Function
function transpix_do_shortcode($content) {
    global $shortcode_tags;
    if (empty($shortcode_tags) || !is_array($shortcode_tags))
        return $content;
    $pattern = get_shortcode_regex();
    return preg_replace_callback( "/$pattern/s", 'do_shortcode_tag', $content );
}  

// Widget Sidebar
function transpix_widgets_init() {
	 register_sidebar( array(
    'name'          => esc_html__( 'Primary Sidebar', 'transpix' ),
    'id'            => 'sidebar-1',        
        'description'   => esc_html__( 'Appears in the sidebar section of the site.', 'transpix' ),        
        'before_widget' => '<aside id="%1$s" class="blog-sidebar-widgets popular-categories %2$s" >',        
        'after_widget'  => '</aside>',        
        'before_title'  => '<div class="blog_sidebar-title">
                                   <h4 class="primary-color">',        
        'after_title'   => '</h4>
                              </div>'
    ) );
    register_sidebar( array(
    'name'          => esc_html__( 'Service Sidebar', 'transpix' ),
    'id'            => 'sidebar-service',        
        'description'   => esc_html__( 'Appears in the sidebar section of the site.', 'transpix' ),        
        'before_widget' => '<aside id="%1$s" class="service-sidebar %2$s" >',        
        'after_widget'  => '</aside>',        
        'before_title'  => '<div class="blog_sidebar-title">
                                   <h4 class="primary-color">',        
        'after_title'   => '</h4>
                              </div>'
    ) );

    register_sidebar( array(
    'name'          => esc_html__( 'Product Sidebar', 'transpix' ),
    'id'            => 'sidebar-shop',        
        'description'   => esc_html__( 'Appears in the sidebar section of the site.', 'transpix' ),        
        'before_widget' => '<aside id="%1$s" class="filter %2$s" >',        
        'after_widget'  => '</aside>',        
        'before_title'  => '<div class="filter-header">
                                   <h5 class="primary-color">',        
        'after_title'   => '</h5>
                              </div>'
    ) );

    register_sidebar( array(
    'name'          => esc_html__( 'Footer One Widget', 'transpix' ),
    'id'            => 'footer-area-1',
    'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'transpix' ),
    'before_widget' => ' ',
    'after_widget'  => ' ',
    'before_title'  => ' ',
    'after_title'   => ' ',
  ) );
    register_sidebar( array(
    'name'          => esc_html__( 'Footer Two Widget', 'transpix' ),
    'id'            => 'footer-area-2',
    'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'transpix' ),
    'before_widget' => ' ',
    'after_widget'  => ' ',
    'before_title'  => ' ',
    'after_title'   => ' ',
  ) );
    register_sidebar( array(
    'name'          => esc_html__( 'Footer Three Widget', 'transpix' ),
    'id'            => 'footer-area-3',
    'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'transpix' ),
    'before_widget' => ' ',
    'after_widget'  => ' ',
    'before_title'  => ' ',
    'after_title'   => ' ',
  ) );
}
add_action( 'widgets_init', 'transpix_widgets_init' );

//function tag widgets
function transpix_tag_cloud_widget($args) {
	$args['number'] = 0; //adding a 0 will display all tags
	$args['largest'] = 18; //largest tag
	$args['smallest'] = 11; //smallest tag
	$args['unit'] = 'px'; //tag font unit
	$args['format'] = 'list'; //ul with a class of wp-tag-cloud
	$args['exclude'] = array(20, 80, 92); //exclude tags by ID
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'transpix_tag_cloud_widget' );
function transpix_excerpt() {
  $transpix_redux_demo = get_option('redux_demo');
  if(isset($transpix_redux_demo['blog_excerpt'])){
    $limit = $transpix_redux_demo['blog_excerpt'];
  }else{
    $limit = 30;
  }
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

function transpix1_excerpt() {
  $industrio_redux_demo = get_option('redux_demo');
  if(isset($industrio_redux_demo['service_excerpt'])){
    $limit = $industrio_redux_demo['service_excerpt'];
  }else{
    $limit = 30;
  }
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

//pagination
if (!function_exists( 'next_pagination' )){
 
    function next_pagination(){
 
        if ( $GLOBALS['wp_query']->max_num_pages <2 ){ return ''; }?>
 
            <?php if ( function_exists('wp_pagenavi') ): ?>
 
            <?php wp_pagenavi(); ?> 
 
            <?php else: ?>
                <nav class="pagination" role="navigation">
 
                    <?php if ( get_next_posts_link() ) : ?>
 
                        <button><?php next_posts_link( __('Previous', 'transpix') ); ?></button>
 
                    <?php endif; ?>
 
                    <?php if ( get_previous_posts_link() ) :?>
 
                        <button><?php previous_posts_link(__('Next', 'transpix') ); ?></button>
 
                    <?php endif; ?>
 
                </nav>
 
             <?php endif; ?>
 
       <?php }
}
function transpix_pagination($pages='') {
    global $wp_query, $wp_rewrite;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    if($pages==''){
        global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
    }
    $pagination = array(
    'base'      => str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
    'format'    => '',
    'current'     => max( 1, get_query_var('paged') ),
    'total'     => $pages,
    'prev_text' => wp_specialchars_decode(esc_html__( '<i class = "fas fa-chevron-left"></i>', 'transpix' ),ENT_QUOTES),
    'next_text' => wp_specialchars_decode(esc_html__( '<i class = "fas fa-chevron-right"></i>', 'transpix' ),ENT_QUOTES),
    'type'      => 'list',
    'end_size'    => 3,
    'mid_size'    => 3
);
    $return =  paginate_links( $pagination );
  echo str_replace( "<ul class='page-numbers'>", '<ul class="pagination">', $return );
}

function transpix_search_form( $form ) {
    $form = '
  <form  method="get" action="' . esc_url(home_url('/')) . '"> 
            <input type="text"  placeholder="'.esc_attr__('Search', 'transpix').'" value="' . get_search_query() . '" name="s" > 
  </form>
	';
    return $form;
}
add_filter( 'get_search_form', 'transpix_search_form' );
//Custom comment List:

 
// Comment Form
function transpix_theme_comment($comment, $args, $depth) {
    //echo 's';
   $GLOBALS['comment'] = $comment; ?>
    <?php if(get_avatar($comment,$size='60' )!=''){?>
    <div class="single-comment">
      <div class="single-comment-wrapper">
         <?php echo get_avatar($comment,$size='60' ); ?>
      </div>
      <div class="person-info">
         <div class="person-name">
            <h5><?php printf( get_comment_author_link()) ?></h5>
         </div>
         <div class="date">
            <small><?php the_time('F j , Y'); ?></small>
            <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
         </div>
         <div class="comment">
            <p><?php comment_text() ?> 
            </p>
         </div>
      </div>
   </div>
    <?php }else{?>
    <div class="single-comment">
      <div class="person-info">
         <div class="person-name">
            <h5><?php printf( get_comment_author_link()) ?></h5>
         </div>
         <div class="date">
            <small><?php the_time('F j , Y'); ?></small>
            <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
         </div>
         <div class="comment">
            <p><?php comment_text() ?> 
            </p>
         </div>
      </div>
   </div>
<?php }?>

<?php
}

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1
 * @author     Thomas Griffin <thomasgriffinmedia.com>
 * @author     Gary Jones <gamajo.com>
 * @copyright  Copyright (c) 2014, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */
/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/framework/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'transpix_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
 
 
function transpix_theme_register_required_plugins() {
    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        // This is an example of how to include a plugin from the WordPress Plugin Repository.
      array(
            'name'      => esc_html__( 'Contact Form 7', 'transpix' ),
            'slug'      => 'contact-form-7',
            'required'  => true,
        ),
      array(
            'name'      => esc_html__( 'One Click Demo Import', 'transpix' ),
            'slug'      => 'one-click-demo-import',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'Classic Editor', 'transpix' ),
            'slug'      => 'classic-editor',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'Widget Importer & Exporter', 'transpix' ),
            'slug'      => 'widget-importer-&-exporter',
            'required'  => true,
        ), 
      array(
            'name'                     => esc_html__( 'Transpix Common', 'transpix' ),
            'slug'                     => 'transpix-common',
            'required'                 => true,
            'source'                   => get_template_directory() . '/framework/plugins/transpix-common.zip',
        ),
      array(
            'name'                     => esc_html__( 'Elementor', 'transpix' ),
            'slug'                     => 'elementor',
            'required'                 => true,
            'source'                   => get_template_directory() . '/framework/plugins/elementor.zip',
        ),
      array(
            'name'                     => esc_html__( 'Transpix Elementor', 'transpix' ),
            'slug'                     => 'transpix-elementor',
            'required'                 => true,
            'source'                   => get_template_directory() . '/framework/plugins/transpix-elementor.zip',
        ),
      array(
            'name'                     => esc_html__( 'Woocommerce', 'transpix' ),
            'slug'                     => 'wp-custom-register-login',
            'required'                 => true,
            'source'                   => get_template_directory() . '/framework/plugins/woocommerce.zip',
        ),
    );
    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => esc_html__( 'Install Required Plugins', 'transpix' ),
            'menu_title'                      => esc_html__( 'Install Plugins', 'transpix' ),
            'installing'                      => esc_html__( 'Installing Plugin: %s', 'transpix' ), // %s = plugin name.
            'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'transpix' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'transpix' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'transpix' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'transpix' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'transpix' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'transpix' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'transpix' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'transpix' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'transpix' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'transpix' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'transpix' ),
            'return'                          => esc_html__( 'Return to Required Plugins Installer', 'transpix' ),
            'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'transpix' ),
            'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'transpix' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );
    tgmpa( $plugins, $config );
}


function transpix_import_files() {
    return array(
        array(
            'import_file_name'           => 'Demo Import Transpix',
            'import_file_url'            => 'http://shtheme.com/import/transpix/content.xml',
            'import_notice'              => esc_html__( 'Import data example transpix', 'transpix' ),
        ),
    );
}
add_filter( 'pt-ocdi/import_files', 'transpix_import_files' );




function transpix_after_import_setup() {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Primary Menu', 'primary' );
    

    set_theme_mod( 'nav_menu_locations', array(
            'primary' => $main_menu->term_id,
            
        )
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'HOME 1' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'transpix_after_import_setup' );


?>