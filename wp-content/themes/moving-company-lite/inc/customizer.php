<?php
/**
 * Moving Company Lite Theme Customizer
 *
 * @package Moving Company Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function moving_company_lite_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'moving_company_lite_custom_controls' );

function moving_company_lite_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . 'inc/customize-homepage/class-customize-homepage.php' );

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'moving_company_lite_customize_partial_blogname', 
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'moving_company_lite_customize_partial_blogdescription', 
	));

	//add home page setting pannel
	$MovingCompanyLiteParentPanel = new Moving_Company_Lite_WP_Customize_Panel( $wp_customize, 'moving_company_lite_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => 'VW Settings',
		'priority' => 10,
	));

	// Layout
	$wp_customize->add_section( 'moving_company_lite_left_right', array(
    	'title'      => __( 'General Settings', 'moving-company-lite' ),
		'panel' => 'moving_company_lite_panel_id'
	) );

	$wp_customize->add_setting('moving_company_lite_width_option',array(
        'default' => __('Full Width','moving-company-lite'),
        'sanitize_callback' => 'moving_company_lite_sanitize_choices'
	));
	$wp_customize->add_control(new Moving_Company_Lite_Image_Radio_Control($wp_customize, 'moving_company_lite_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','moving-company-lite'),
        'description' => __('Here you can change the width layout of Website.','moving-company-lite'),
        'section' => 'moving_company_lite_left_right',
        'choices' => array(
            'Full Width' => get_template_directory_uri().'/assets/images/full-width.png',
            'Wide Width' => get_template_directory_uri().'/assets/images/wide-width.png',
            'Boxed' => get_template_directory_uri().'/assets/images/boxed-width.png',
        ))));

	$wp_customize->add_setting('moving_company_lite_theme_options',array(
        'default' => __('Right Sidebar','moving-company-lite'),
        'sanitize_callback' => 'moving_company_lite_sanitize_choices'
	));
	$wp_customize->add_control('moving_company_lite_theme_options',array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','moving-company-lite'),
        'description' => __('Here you can change the sidebar layout for posts. ','moving-company-lite'),
        'section' => 'moving_company_lite_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','moving-company-lite'),
            'Right Sidebar' => __('Right Sidebar','moving-company-lite'),
            'One Column' => __('One Column','moving-company-lite'),
            'Three Columns' => __('Three Columns','moving-company-lite'),
            'Four Columns' => __('Four Columns','moving-company-lite'),
            'Grid Layout' => __('Grid Layout','moving-company-lite')
        ),
	) );

	$wp_customize->add_setting('moving_company_lite_page_layout',array(
        'default' => __('One Column','moving-company-lite'),
        'sanitize_callback' => 'moving_company_lite_sanitize_choices'
	));
	$wp_customize->add_control('moving_company_lite_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','moving-company-lite'),
        'description' => __('Here you can change the sidebar layout for pages. ','moving-company-lite'),
        'section' => 'moving_company_lite_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','moving-company-lite'),
            'Right Sidebar' => __('Right Sidebar','moving-company-lite'),
            'One Column' => __('One Column','moving-company-lite')
        ),
	) );

	//Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'moving_company_lite_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'moving_company_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Moving_Company_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'moving_company_lite_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','moving-company-lite' ),
		'section' => 'moving_company_lite_left_right'
    )));

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'moving_company_lite_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'moving_company_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Moving_Company_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'moving_company_lite_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','moving-company-lite' ),
		'section' => 'moving_company_lite_left_right'
    )));

	//Pre-Loader
	$wp_customize->add_setting( 'moving_company_lite_loader_enable',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'moving_company_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Moving_Company_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'moving_company_lite_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','moving-company-lite' ),
        'section' => 'moving_company_lite_left_right'
    )));

	$wp_customize->add_setting('moving_company_lite_loader_icon',array(
        'default' => __('Two Way','moving-company-lite'),
        'sanitize_callback' => 'moving_company_lite_sanitize_choices'
	));
	$wp_customize->add_control('moving_company_lite_loader_icon',array(
        'type' => 'select',
        'label' => __('Pre-Loader Type','moving-company-lite'),
        'section' => 'moving_company_lite_left_right',
        'choices' => array(
            'Two Way' => __('Two Way','moving-company-lite'),
            'Dots' => __('Dots','moving-company-lite'),
            'Rotate' => __('Rotate','moving-company-lite')
        ),
	) );

	//Top Bar
	$wp_customize->add_section( 'moving_company_lite_topbar', array(
    	'title'      => __( 'Top Bar Settings', 'moving-company-lite' ),
		'panel' => 'moving_company_lite_panel_id'
	) );

	//Sticky Header
	$wp_customize->add_setting( 'moving_company_lite_sticky_header',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'moving_company_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Moving_Company_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'moving_company_lite_sticky_header',array(
        'label' => esc_html__( 'Sticky Header','moving-company-lite' ),
        'section' => 'moving_company_lite_topbar'
    )));

	$wp_customize->add_setting( 'moving_company_lite_header_search',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'moving_company_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Moving_Company_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'moving_company_lite_header_search',array(
      	'label' => esc_html__( 'Show / Hide Search','moving-company-lite' ),
      	'section' => 'moving_company_lite_topbar'
    )));

    $wp_customize->add_setting('moving_company_lite_search_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('moving_company_lite_search_font_size',array(
		'label'	=> __('Search Font Size','moving-company-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','moving-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'moving-company-lite' ),
        ),
		'section'=> 'moving_company_lite_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('moving_company_lite_search_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('moving_company_lite_search_padding_top_bottom',array(
		'label'	=> __('Search Padding Top Bottom','moving-company-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','moving-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'moving-company-lite' ),
        ),
		'section'=> 'moving_company_lite_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('moving_company_lite_search_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('moving_company_lite_search_padding_left_right',array(
		'label'	=> __('Search Padding Left Right','moving-company-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','moving-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'moving-company-lite' ),
        ),
		'section'=> 'moving_company_lite_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'moving_company_lite_search_border_radius', array(
		'default'              => "",
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'moving_company_lite_search_border_radius', array(
		'label'       => esc_html__( 'Search Border Radius','moving-company-lite' ),
		'section'     => 'moving_company_lite_topbar',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    $wp_customize->add_setting( 'moving_company_lite_social_media',array(
    	'default' => 0,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'moving_company_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Moving_Company_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'moving_company_lite_social_media',array(
      	'label' => esc_html__( 'Show / Hide Social Media','moving-company-lite' ),
      	'section' => 'moving_company_lite_topbar'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('moving_company_lite_calling_text', array( 
		'selector' => '.call-info h6', 
		'render_callback' => 'moving_company_lite_customize_partial_moving_company_lite_calling_text', 
	));

    $wp_customize->add_setting('moving_company_lite_phone_icon',array(
		'default'	=> 'fas fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Moving_Company_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'moving_company_lite_phone_icon',array(
		'label'	=> __('Add Phone Icon','moving-company-lite'),
		'transport' => 'refresh',
		'section'	=> 'moving_company_lite_topbar',
		'setting'	=> 'moving_company_lite_phone_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('moving_company_lite_calling_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('moving_company_lite_calling_text',array(
		'label'	=> __('Add Phone Text','moving-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Call us Now', 'moving-company-lite' ),
        ),
		'section'=> 'moving_company_lite_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('moving_company_lite_phone_number',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('moving_company_lite_phone_number',array(
		'label'	=> __('Add Phone Number','moving-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( '+00 1234 567 890', 'moving-company-lite' ),
        ),
		'section'=> 'moving_company_lite_topbar',
		'type'=> 'text'
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('moving_company_lite_email_text', array( 
		'selector' => '.info-box h2', 
		'render_callback' => 'moving_company_lite_customize_partial_moving_company_lite_email_text', 
	));

	$wp_customize->add_setting('moving_company_lite_email_icon',array(
		'default'	=> 'fas fa-paper-plane',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Moving_Company_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'moving_company_lite_email_icon',array(
		'label'	=> __('Add Email Icon','moving-company-lite'),
		'transport' => 'refresh',
		'section'	=> 'moving_company_lite_topbar',
		'setting'	=> 'moving_company_lite_email_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('moving_company_lite_email_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('moving_company_lite_email_text',array(
		'label'	=> __('Add Email Text','moving-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Email us Now', 'moving-company-lite' ),
        ),
		'section'=> 'moving_company_lite_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('moving_company_lite_email_address',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('moving_company_lite_email_address',array(
		'label'	=> __('Add Email Address','moving-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'example@gmail.com', 'moving-company-lite' ),
        ),
		'section'=> 'moving_company_lite_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('moving_company_lite_timing_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Moving_Company_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'moving_company_lite_timing_icon',array(
		'label'	=> __('Add Timing Icon','moving-company-lite'),
		'transport' => 'refresh',
		'section'	=> 'moving_company_lite_topbar',
		'setting'	=> 'moving_company_lite_timing_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('moving_company_lite_opening_time_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('moving_company_lite_opening_time_text',array(
		'label'	=> __('Add Opening Time Text','moving-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Open Hours', 'moving-company-lite' ),
        ),
		'section'=> 'moving_company_lite_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('moving_company_lite_opening_time',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('moving_company_lite_opening_time',array(
		'label'	=> __('Add Opening Time','moving-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Mon - Fri 8:00am to 9:00am Sat - Closed', 'moving-company-lite' ),
        ),
		'section'=> 'moving_company_lite_topbar',
		'type'=> 'text'
	));
    
	//Slider
	$wp_customize->add_section( 'moving_company_lite_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'moving-company-lite' ),
		'panel' => 'moving_company_lite_panel_id'
	) );

	$wp_customize->add_setting( 'moving_company_lite_slider_arrows',array(
    	'default' => 0,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'moving_company_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Moving_Company_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'moving_company_lite_slider_arrows',array(
      	'label' => esc_html__( 'Show / Hide Slider','moving-company-lite' ),
      	'section' => 'moving_company_lite_slidersettings'
    )));

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('moving_company_lite_slider_arrows',array(
		'selector'        => '#slider .inner_carousel h1',
		'render_callback' => 'moving_company_lite_customize_partial_moving_company_lite_slider_arrows',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'moving_company_lite_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'moving_company_lite_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'moving_company_lite_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'moving-company-lite' ),
			'description' => __('Slider image size (1600 x 600)','moving-company-lite'),
			'section'  => 'moving_company_lite_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//content layout
	$wp_customize->add_setting('moving_company_lite_slider_content_option',array(
        'default' => __('Left','moving-company-lite'),
        'sanitize_callback' => 'moving_company_lite_sanitize_choices'
	));
	$wp_customize->add_control(new Moving_Company_Lite_Image_Radio_Control($wp_customize, 'moving_company_lite_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','moving-company-lite'),
        'section' => 'moving_company_lite_slidersettings',
        'choices' => array(
            'Left' => get_template_directory_uri().'/assets/images/slider-content1.png',
            'Center' => get_template_directory_uri().'/assets/images/slider-content2.png',
            'Right' => get_template_directory_uri().'/assets/images/slider-content3.png',
    ))));


	//Slider excerpt
	$wp_customize->add_setting( 'moving_company_lite_slider_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'moving_company_lite_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','moving-company-lite' ),
		'section'     => 'moving_company_lite_slidersettings',
		'type'        => 'range',
		'settings'    => 'moving_company_lite_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 15,
			'max'              => 50,
		),
	) );

	//Opacity
	$wp_customize->add_setting('moving_company_lite_slider_opacity_color',array(
      'default'              => 0.8,
      'sanitize_callback' => 'moving_company_lite_sanitize_choices'
	));

	$wp_customize->add_control( 'moving_company_lite_slider_opacity_color', array(
	'label'       => esc_html__( 'Slider Image Opacity','moving-company-lite' ),
	'section'     => 'moving_company_lite_slidersettings',
	'type'        => 'select',
	'settings'    => 'moving_company_lite_slider_opacity_color',
	'choices' => array(
      '0' =>  esc_attr('0','moving-company-lite'),
      '0.1' =>  esc_attr('0.1','moving-company-lite'),
      '0.2' =>  esc_attr('0.2','moving-company-lite'),
      '0.3' =>  esc_attr('0.3','moving-company-lite'),
      '0.4' =>  esc_attr('0.4','moving-company-lite'),
      '0.5' =>  esc_attr('0.5','moving-company-lite'),
      '0.6' =>  esc_attr('0.6','moving-company-lite'),
      '0.7' =>  esc_attr('0.7','moving-company-lite'),
      '0.8' =>  esc_attr('0.8','moving-company-lite'),
      '0.9' =>  esc_attr('0.9','moving-company-lite')
	),
	));
 
	//Our Services section
	$wp_customize->add_section( 'moving_company_lite_services_section' , array(
    	'title'      => __( 'Our Services', 'moving-company-lite' ),
		'priority'   => null,
		'panel' => 'moving_company_lite_panel_id'
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'moving_company_lite_section_title', array( 
		'selector' => '#serv-section h3', 
		'render_callback' => 'moving_company_lite_customize_partial_moving_company_lite_section_title',
	));

	$wp_customize->add_setting('moving_company_lite_section_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('moving_company_lite_section_title',array(
		'label'	=> __('Add Section Title','moving-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Packers & Movers Services', 'moving-company-lite' ),
        ),
		'section'=> 'moving_company_lite_services_section',
		'type'=> 'text'
	));

	$categories = get_categories();
	$cat_post = array();
	$cat_post[]= 'select';
	$i = 0;	
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('moving_company_lite_our_services',array(
		'default'	=> 'select',
		'sanitize_callback' => 'moving_company_lite_sanitize_choices',
	));
	$wp_customize->add_control('moving_company_lite_our_services',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display Services','moving-company-lite'),
		'description' => __('Image Size (280 x 180)','moving-company-lite'),
		'section' => 'moving_company_lite_services_section',
	));

	//Services excerpt
	$wp_customize->add_setting( 'moving_company_lite_services_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'moving_company_lite_services_excerpt_number', array(
		'label'       => esc_html__( 'Services Excerpt length','moving-company-lite' ),
		'section'     => 'moving_company_lite_services_section',
		'type'        => 'range',
		'settings'    => 'moving_company_lite_services_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 15,
			'max'              => 50,
		),
	) );

	//Blog Post
	$wp_customize->add_panel( $MovingCompanyLiteParentPanel );

	$BlogPostParentPanel = new Moving_Company_Lite_WP_Customize_Panel( $wp_customize, 'blog_post_parent_panel', array(
		'title' => __( 'Blog Post Settings', 'moving-company-lite' ),
		'panel' => 'moving_company_lite_panel_id',
	));

	$wp_customize->add_panel( $BlogPostParentPanel );

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'moving_company_lite_post_settings', array(
		'title' => __( 'Post Settings', 'moving-company-lite' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('moving_company_lite_toggle_postdate', array( 
		'selector' => '.post-main-box h2 a', 
		'render_callback' => 'moving_company_lite_customize_partial_moving_company_lite_toggle_postdate', 
	));

	$wp_customize->add_setting( 'moving_company_lite_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'moving_company_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Moving_Company_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'moving_company_lite_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','moving-company-lite' ),
        'section' => 'moving_company_lite_post_settings'
    )));

    $wp_customize->add_setting( 'moving_company_lite_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'moving_company_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Moving_Company_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'moving_company_lite_toggle_author',array(
		'label' => esc_html__( 'Author','moving-company-lite' ),
		'section' => 'moving_company_lite_post_settings'
    )));

    $wp_customize->add_setting( 'moving_company_lite_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'moving_company_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Moving_Company_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'moving_company_lite_toggle_comments',array(
		'label' => esc_html__( 'Comments','moving-company-lite' ),
		'section' => 'moving_company_lite_post_settings'
    )));

    $wp_customize->add_setting( 'moving_company_lite_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'moving_company_lite_switch_sanitization'
	));
    $wp_customize->add_control( new Moving_Company_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'moving_company_lite_toggle_tags', array(
		'label' => esc_html__( 'Tags','moving-company-lite' ),
		'section' => 'moving_company_lite_post_settings'
    )));

    $wp_customize->add_setting( 'moving_company_lite_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'moving_company_lite_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','moving-company-lite' ),
		'section'     => 'moving_company_lite_post_settings',
		'type'        => 'range',
		'settings'    => 'moving_company_lite_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Blog layout
    $wp_customize->add_setting('moving_company_lite_blog_layout_option',array(
        'default' => __('Default','moving-company-lite'),
        'sanitize_callback' => 'moving_company_lite_sanitize_choices'
    ));
    $wp_customize->add_control(new Moving_Company_Lite_Image_Radio_Control($wp_customize, 'moving_company_lite_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Layouts','moving-company-lite'),
        'section' => 'moving_company_lite_post_settings',
        'choices' => array(
            'Default' => get_template_directory_uri().'/assets/images/blog-layout1.png',
            'Center' => get_template_directory_uri().'/assets/images/blog-layout2.png',
            'Left' => get_template_directory_uri().'/assets/images/blog-layout3.png',
    ))));

    $wp_customize->add_setting('moving_company_lite_excerpt_settings',array(
        'default' => __('Excerpt','moving-company-lite'),
        'transport' => 'refresh',
        'sanitize_callback' => 'moving_company_lite_sanitize_choices'
	));
	$wp_customize->add_control('moving_company_lite_excerpt_settings',array(
        'type' => 'select',
        'label' => __('Post Content','moving-company-lite'),
        'section' => 'moving_company_lite_post_settings',
        'choices' => array(
        	'Content' => __('Content','moving-company-lite'),
            'Excerpt' => __('Excerpt','moving-company-lite'),
            'No Content' => __('No Content','moving-company-lite')
        ),
	) );

	$wp_customize->add_setting('moving_company_lite_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('moving_company_lite_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','moving-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'moving-company-lite' ),
        ),
		'section'=> 'moving_company_lite_post_settings',
		'type'=> 'text'
	));

    // Button Settings
	$wp_customize->add_section( 'moving_company_lite_button_settings', array(
		'title' => __( 'Button Settings', 'moving-company-lite' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('moving_company_lite_button_text', array( 
		'selector' => '.post-main-box .more-btn a', 
		'render_callback' => 'moving_company_lite_customize_partial_moving_company_lite_button_text', 
	));

    $wp_customize->add_setting('moving_company_lite_button_text',array(
		'default'=> 'READ MORE',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('moving_company_lite_button_text',array(
		'label'	=> __('Add Button Text','moving-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'moving-company-lite' ),
        ),
		'section'=> 'moving_company_lite_button_settings',
		'type'=> 'text'
	));

	// Related Post Settings
	$wp_customize->add_section( 'moving_company_lite_related_posts_settings', array(
		'title' => __( 'Related Posts Settings', 'moving-company-lite' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('moving_company_lite_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'moving_company_lite_customize_partial_moving_company_lite_related_post_title', 
	));

    $wp_customize->add_setting( 'moving_company_lite_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'moving_company_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Moving_Company_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'moving_company_lite_related_post',array(
		'label' => esc_html__( 'Related Post','moving-company-lite' ),
		'section' => 'moving_company_lite_related_posts_settings'
    )));

    $wp_customize->add_setting('moving_company_lite_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('moving_company_lite_related_post_title',array(
		'label'	=> __('Add Related Post Title','moving-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Related Post', 'moving-company-lite' ),
        ),
		'section'=> 'moving_company_lite_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('moving_company_lite_related_posts_count',array(
		'default'=> '3',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('moving_company_lite_related_posts_count',array(
		'label'	=> __('Add Related Post Count','moving-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( '3', 'moving-company-lite' ),
        ),
		'section'=> 'moving_company_lite_related_posts_settings',
		'type'=> 'number'
	));

    //404 Page Setting
	$wp_customize->add_section('moving_company_lite_404_page',array(
		'title'	=> __('404 Page Settings','moving-company-lite'),
		'panel' => 'moving_company_lite_panel_id',
	));	

	$wp_customize->add_setting('moving_company_lite_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('moving_company_lite_404_page_title',array(
		'label'	=> __('Add Title','moving-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'moving-company-lite' ),
        ),
		'section'=> 'moving_company_lite_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('moving_company_lite_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('moving_company_lite_404_page_content',array(
		'label'	=> __('Add Text','moving-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'moving-company-lite' ),
        ),
		'section'=> 'moving_company_lite_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('moving_company_lite_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('moving_company_lite_404_page_button_text',array(
		'label'	=> __('Add Button Text','moving-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'GO BACK', 'moving-company-lite' ),
        ),
		'section'=> 'moving_company_lite_404_page',
		'type'=> 'text'
	));

	//Responsive Media Settings
	$wp_customize->add_section('moving_company_lite_responsive_media',array(
		'title'	=> __('Responsive Media','moving-company-lite'),
		'panel' => 'moving_company_lite_panel_id',
	));

    $wp_customize->add_setting( 'moving_company_lite_stickyheader_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'moving_company_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Moving_Company_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'moving_company_lite_stickyheader_hide_show',array(
      'label' => esc_html__( 'Sticky Header','moving-company-lite' ),
      'section' => 'moving_company_lite_responsive_media'
    )));

    $wp_customize->add_setting( 'moving_company_lite_resp_slider_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'moving_company_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Moving_Company_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'moving_company_lite_resp_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','moving-company-lite' ),
      'section' => 'moving_company_lite_responsive_media'
    )));

	$wp_customize->add_setting( 'moving_company_lite_metabox_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'moving_company_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Moving_Company_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'moving_company_lite_metabox_hide_show',array(
      'label' => esc_html__( 'Show / Hide Metabox','moving-company-lite' ),
      'section' => 'moving_company_lite_responsive_media'
    )));

    $wp_customize->add_setting( 'moving_company_lite_sidebar_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'moving_company_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Moving_Company_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'moving_company_lite_sidebar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Sidebar','moving-company-lite' ),
      'section' => 'moving_company_lite_responsive_media'
    )));

    $wp_customize->add_setting('moving_company_lite_res_menu_open_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Moving_Company_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'moving_company_lite_res_menu_open_icon',array(
		'label'	=> __('Add Open Menu Icon','moving-company-lite'),
		'transport' => 'refresh',
		'section'	=> 'moving_company_lite_responsive_media',
		'setting'	=> 'moving_company_lite_res_menu_open_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('moving_company_lite_res_close_menus_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Moving_Company_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'moving_company_lite_res_close_menus_icon',array(
		'label'	=> __('Add Close Menu Icon','moving-company-lite'),
		'transport' => 'refresh',
		'section'	=> 'moving_company_lite_responsive_media',
		'setting'	=> 'moving_company_lite_res_close_menus_icon',
		'type'		=> 'icon'
	)));

	//Content Creation
	$wp_customize->add_section( 'moving_company_lite_content_section' , array(
    	'title' => __( 'Customize Home Page Settings', 'moving-company-lite' ),
		'priority' => null,
		'panel' => 'moving_company_lite_panel_id'
	) );

	$wp_customize->add_setting('moving_company_lite_content_creation_main_control', array(
		'sanitize_callback' => 'esc_html',
	) );

	$homepage= get_option( 'page_on_front' );

	$wp_customize->add_control(	new Moving_Company_Lite_Content_Creation( $wp_customize, 'moving_company_lite_content_creation_main_control', array(
		'options' => array(
			esc_html__( 'First select static page in homepage setting for front page.Below given edit button is to customize Home Page. Just click on the edit option, add whatever elements you want to include in the homepage, save the changes and you are good to go.','moving-company-lite' ),
		),
		'section' => 'moving_company_lite_content_section',
		'button_url'  => admin_url( 'post.php?post='.$homepage.'&action=edit'),
		'button_text' => esc_html__( 'Edit', 'moving-company-lite' ),
	) ) );

	//Footer Text
	$wp_customize->add_section('moving_company_lite_footer',array(
		'title'	=> __('Footer Settings','moving-company-lite'),
		'panel' => 'moving_company_lite_panel_id',
	));	

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('moving_company_lite_footer_text', array( 
		'selector' => '.copyright p', 
		'render_callback' => 'moving_company_lite_customize_partial_moving_company_lite_footer_text', 
	));
	
	$wp_customize->add_setting('moving_company_lite_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('moving_company_lite_footer_text',array(
		'label'	=> __('Copyright Text','moving-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Copyright 2019, .....', 'moving-company-lite' ),
        ),
		'section'=> 'moving_company_lite_footer',
		'type'=> 'text'
	));	

	$wp_customize->add_setting('moving_company_lite_copyright_alingment',array(
        'default' => __('center','moving-company-lite'),
        'sanitize_callback' => 'moving_company_lite_sanitize_choices'
	));
	$wp_customize->add_control(new Moving_Company_Lite_Image_Radio_Control($wp_customize, 'moving_company_lite_copyright_alingment', array(
        'type' => 'select',
        'label' => __('Copyright Alignment','moving-company-lite'),
        'section' => 'moving_company_lite_footer',
        'settings' => 'moving_company_lite_copyright_alingment',
        'choices' => array(
            'left' => get_template_directory_uri().'/assets/images/copyright1.png',
            'center' => get_template_directory_uri().'/assets/images/copyright2.png',
            'right' => get_template_directory_uri().'/assets/images/copyright3.png'
    ))));

    $wp_customize->add_setting('moving_company_lite_copyright_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('moving_company_lite_copyright_padding_top_bottom',array(
		'label'	=> __('Copyright Padding Top Bottom','moving-company-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','moving-company-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'moving-company-lite' ),
        ),
		'section'=> 'moving_company_lite_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'moving_company_lite_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'moving_company_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Moving_Company_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'moving_company_lite_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','moving-company-lite' ),
      	'section' => 'moving_company_lite_footer'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('moving_company_lite_scroll_top_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'moving_company_lite_customize_partial_moving_company_lite_scroll_top_icon', 
	));

    $wp_customize->add_setting('moving_company_lite_scroll_top_icon',array(
		'default'	=> 'fas fa-angle-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Moving_Company_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'moving_company_lite_scroll_top_icon',array(
		'label'	=> __('Add Scroll to Top Icon','moving-company-lite'),
		'transport' => 'refresh',
		'section'	=> 'moving_company_lite_footer',
		'setting'	=> 'moving_company_lite_scroll_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('moving_company_lite_scroll_top_alignment',array(
        'default' => __('Right','moving-company-lite'),
        'sanitize_callback' => 'moving_company_lite_sanitize_choices'
	));
	$wp_customize->add_control(new Moving_Company_Lite_Image_Radio_Control($wp_customize, 'moving_company_lite_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','moving-company-lite'),
        'section' => 'moving_company_lite_footer',
        'settings' => 'moving_company_lite_scroll_top_alignment',
        'choices' => array(
            'Left' => get_template_directory_uri().'/assets/images/layout1.png',
            'Center' => get_template_directory_uri().'/assets/images/layout2.png',
            'Right' => get_template_directory_uri().'/assets/images/layout3.png'
    ))));

    // Has to be at the top
	$wp_customize->register_panel_type( 'Moving_Company_Lite_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'Moving_Company_Lite_WP_Customize_Section' );
}

add_action( 'customize_register', 'moving_company_lite_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class Moving_Company_Lite_WP_Customize_Panel extends WP_Customize_Panel {
	    public $panel;
	    public $type = 'moving_company_lite_panel';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;
	      return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class Moving_Company_Lite_WP_Customize_Section extends WP_Customize_Section {
	    public $section;
	    public $type = 'moving_company_lite_section';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;

	      if ( $this->panel ) {
	        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
	      } else {
	        $array['customizeAction'] = 'Customizing';
	      }
	      return $array;
    	}
  	}
}

// Enqueue our scripts and styles
function moving_company_lite_customize_controls_scripts() {
  wp_enqueue_script( 'customizer-controls', get_theme_file_uri( '/assets/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'moving_company_lite_customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Moving_Company_Lite_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Moving_Company_Lite_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new Moving_Company_Lite_Customize_Section_Pro( $manager,'example_1', array(
			'priority'   => 1,
			'title'    => esc_html__( 'Moving Company Pro', 'moving-company-lite' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'moving-company-lite' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/moving-company-wordpress-theme/'),
		) )	);

		// Register sections.
		$manager->add_section(new Moving_Company_Lite_Customize_Section_Pro($manager,'example_2',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENATATION', 'moving-company-lite' ),
			'pro_text' => esc_html__( 'DOCS', 'moving-company-lite' ),
			'pro_url'  => admin_url('themes.php?page=moving_company_lite_guide'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'moving-company-lite-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'moving-company-lite-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Moving_Company_Lite_Customize::get_instance();