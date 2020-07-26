<?php
namespace BdevsElementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

/**
 * Bdevs Elementor Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class BdevsSlider extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Bdevs Elementor widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'bdevs-slider';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Bdevs Elementor widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Single Slider', 'bdevs-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Bdevs Slider widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-slideshow';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Bdevs Slider widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'bdevs-elementor' ];
	}

	public function get_keywords() {
		return [ 'slider', 'carousel' ];
	}

	public function get_script_depends() {
		return [ 'bdevs-elementor'];
	}

	// BDT Position
	protected function element_pack_position() {
	    $position_options = [
	        ''              => esc_html__('Default', 'bdevs-elementor'),
	        'top-left'      => esc_html__('Top Left', 'bdevs-elementor') ,
	        'top-center'    => esc_html__('Top Center', 'bdevs-elementor') ,
	        'top-right'     => esc_html__('Top Right', 'bdevs-elementor') ,
	        'center'        => esc_html__('Center', 'bdevs-elementor') ,
	        'center-left'   => esc_html__('Center Left', 'bdevs-elementor') ,
	        'center-right'  => esc_html__('Center Right', 'bdevs-elementor') ,
	        'bottom-left'   => esc_html__('Bottom Left', 'bdevs-elementor') ,
	        'bottom-center' => esc_html__('Bottom Center', 'bdevs-elementor') ,
	        'bottom-right'  => esc_html__('Bottom Right', 'bdevs-elementor') ,
	    ];

	    return $position_options;
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_content_sliders',
			[
				'label' => esc_html__( 'Slider', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'chose_style',
			[
				'label'     => esc_html__( 'Chose Style', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'slider_style_1'  => esc_html__( 'Slider Normal', 'bdevs-elementor' ),
					'slider_style_2' => esc_html__( 'Slider With Form', 'bdevs-elementor' ),
					'slider_style_3' => esc_html__( 'Slider Transparent', 'bdevs-elementor' ),
					'slider_style_4' => esc_html__( 'Slider Normal With Video', 'bdevs-elementor' ),
					'slider_style_5' => esc_html__( 'Slider Form With Video', 'bdevs-elementor' ),
					'slider_style_6' => esc_html__( 'Slider Transparent With Video', 'bdevs-elementor' ),
					'slider_style_7'  => esc_html__( 'Slider Normal Parallax', 'bdevs-elementor' ),
					'slider_style_8'  => esc_html__( 'Slider Form Parallax', 'bdevs-elementor' ),
					'slider_style_9'  => esc_html__( 'Slider Transparent Parallax', 'bdevs-elementor' ),
					'slider_style_10'  => esc_html__( 'Slider Normal Water ', 'bdevs-elementor' ),
				],
				'default'   => 'slider_style_1',
			]
		);

		$this->add_control(
			'background_bg',
			[
				'label'   => esc_html__( 'Background Image', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add background image from here', 'bdevs-elementor' ),
			]
		);
		
		$this->add_control(
			'subheading',
			[
				'label'       => __( 'Subheading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your subheading', 'bdevs-elementor' ),
				'default'     => __( 'It is subheading', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'heading',
			[
				'label'       => __( 'Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your heading', 'bdevs-elementor' ),
				'default'     => __( 'It is heading', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'button',
			[
				'label'       => __( 'Button', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your text button', 'bdevs-elementor' ),
				'default'     => __( 'SEE SERVICES', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'link_button',
			[
				'label'       => __( 'Link Button', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your link button', 'bdevs-elementor' ),
				'default'     => __( '#', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_heading_2',
			[
				'label' => esc_html__( 'Slider With Form', 'bdevs-elementor' ),
				'condition' => [
					'chose_style' => ['slider_style_2']
				],
			]
		);

		$this->add_control(
			'subtitle',
			[
				'label'       => __( 'Subtitle', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your subtitle', 'bdevs-elementor' ),
				'default'     => __( 'It is subtitle', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your title', 'bdevs-elementor' ),
				'default'     => __( 'It is title', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'content',
			[
				'label'       => __( 'Content', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter content here...', 'bdevs-elementor' ),
				'default'     => __( 'It is content', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'shortcode',
			[
				'label'   => esc_html__( 'Shortcode', 'bdevs-elementor' ),
				'type'    => Controls_Manager::TEXTAREA,
				'dynamic' => [ 'active' => true ],
				'default'		=> __('Contact Shortcode here', 'bdevs-elementor'),
				'description' => esc_html__( 'Add Your shortcode here', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_heading_4',
			[
				'label' => esc_html__( 'Slider With Video', 'bdevs-elementor' ),
				'condition' => [
					'chose_style' => ['slider_style_4']
				],
			]
		);

		$this->add_control(
			'video',
			[
				'label'       => __( 'Link Video', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your link video', 'bdevs-elementor' ),
				'default'     => __( '#', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_heading_5',
			[
				'label' => esc_html__( 'Slider Form With Video', 'bdevs-elementor' ),
				'condition' => [
					'chose_style' => ['slider_style_5']
				],
			]
		);

		$this->add_control(
			'video_5',
			[
				'label'       => __( 'Link Video', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your link video', 'bdevs-elementor' ),
				'default'     => __( '#', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'subtitle_5',
			[
				'label'       => __( 'Subtitle', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your subtitle', 'bdevs-elementor' ),
				'default'     => __( 'It is subtitle', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'title_5',
			[
				'label'       => __( 'Title', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your title', 'bdevs-elementor' ),
				'default'     => __( 'It is title', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'content_5',
			[
				'label'       => __( 'Content', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter content here...', 'bdevs-elementor' ),
				'default'     => __( 'It is content', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'shortcode_5',
			[
				'label'   => esc_html__( 'Shortcode', 'bdevs-elementor' ),
				'type'    => Controls_Manager::TEXTAREA,
				'dynamic' => [ 'active' => true ],
				'default'		=> __('Contact Shortcode here', 'bdevs-elementor'),
				'description' => esc_html__( 'Add Your shortcode here', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_heading_6',
			[
				'label' => esc_html__( 'Slider Transparent With Video', 'bdevs-elementor' ),
				'condition' => [
					'chose_style' => ['slider_style_6']
				],
			]
		);

		$this->add_control(
			'video_6',
			[
				'label'       => __( 'Link Video', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your link video', 'bdevs-elementor' ),
				'default'     => __( '#', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_heading_8',
			[
				'label' => esc_html__( 'Slider Form Parallax', 'bdevs-elementor' ),
				'condition' => [
					'chose_style' => ['slider_style_8']
				],
			]
		);

		$this->add_control(
			'subtitle_8',
			[
				'label'       => __( 'Subtitle', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your subtitle', 'bdevs-elementor' ),
				'default'     => __( 'It is subtitle', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'title_8',
			[
				'label'       => __( 'Title', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your title', 'bdevs-elementor' ),
				'default'     => __( 'It is title', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'content_8',
			[
				'label'       => __( 'Content', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter content here...', 'bdevs-elementor' ),
				'default'     => __( 'It is content', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'shortcode_8',
			[
				'label'   => esc_html__( 'Shortcode', 'bdevs-elementor' ),
				'type'    => Controls_Manager::TEXTAREA,
				'dynamic' => [ 'active' => true ],
				'default'		=> __('Contact Shortcode here', 'bdevs-elementor'),
				'description' => esc_html__( 'Add Your shortcode here', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_layout',
			[
				'label' => esc_html__( 'Layout', 'bdevs-elementor' ),
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label'   => esc_html__( 'Alignment', 'bdevs-elementor' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'bdevs-elementor' ),
						'icon'  => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'bdevs-elementor' ),
						'icon'  => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'bdevs-elementor' ),
						'icon'  => 'fa fa-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justified', 'bdevs-elementor' ),
						'icon'  => 'fa fa-align-justify',
					],
				],
				'prefix_class' => 'elementor%s-align-',
				'description'  => 'Use align to match position',
				'default'      => 'left',
			]
		);

		$this->add_control(
			'show_heading',
			[
				'label'   => esc_html__( 'Show Heading', 'bdevs-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);		

		$this->add_control(
			'show_subheading',
			[
				'label'   => esc_html__( 'Show Sub Heading', 'bdevs-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_button',
			[
				'label'   => esc_html__( 'Show Button', 'bdevs-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->end_controls_section();


	}

	public function render() {

		$settings  = $this->get_settings_for_display();
		extract($settings);
		$chose_style = $settings['chose_style'];
		$bg_src = wp_get_attachment_image_src( $settings['background_bg']['id'], 'full' );
		$bg_url = $bg_src ? $bg_src[0] : '';
		?>
		<?php if( $chose_style == 'slider_style_1' ): ?>
		<!--  hero area start  -->
	     <div class="hero-area hero-bg" style="background-image: url(<?php print esc_url( $bg_url ); ?>);">
	        <div class="container">
	            <div class="row">
	               <div class="col-xl-6 col-lg-8">
	                  <div class="hero-txt">
	                  	<?php if (( '' !== $settings['subheading'] ) && ( $settings['show_subheading'] )) : ?>
	                    	<span class="wow fadeInDown" data-wow-duration="1.5s"><?php print wp_kses_post($settings['subheading']); ?></span>
	                    <?php endif; ?>
	                    <?php if (( '' !== $settings['heading'] ) && ( $settings['show_heading'] )) : ?>
	                    	<h1 class="wow fadeInUp" data-wow-duration="1.5s"><?php print wp_kses_post($settings['heading']); ?></h1>
	                    <?php endif; ?>
	                    <?php if (( '' !== $settings['button'] ) && ( '' !== $settings['link_button'] ) && ( $settings['show_button'] )) : ?>
	                    	<a class="wow fadeInUp boxed-btn" data-wow-duration="1.5s" href="<?php print wp_kses_post($settings['link_button']); ?>"><span><?php print wp_kses_post($settings['button']); ?></span></a>
	                    <?php endif; ?>
	                  </div>
	               </div>
	            </div>
	        </div>
	        <div class="hero-overlay"></div>
	     </div>
	     <!--  hero area end  -->
	     <?php elseif( $chose_style == 'slider_style_2' ): ?>
	     <div class="hero-area hero-bg-2 home-2" style="background-image: url(<?php print esc_url( $bg_url ); ?>);">
	         <div class="container">
	            <div class="row">
	               <div class="col-xl-6 col-lg-8">
	               	  <div class="hero-txt">
	                  	<?php if (( '' !== $settings['subheading'] ) && ( $settings['show_subheading'] )) : ?>
	                    	<span class="wow fadeInDown" data-wow-duration="1.5s"><?php print wp_kses_post($settings['subheading']); ?></span>
	                    <?php endif; ?>
	                    <?php if (( '' !== $settings['heading'] ) && ( $settings['show_heading'] )) : ?>
	                    	<h1 class="wow fadeInUp" data-wow-duration="1.5s"><?php print wp_kses_post($settings['heading']); ?></h1>
	                    <?php endif; ?>
	                    <?php if (( '' !== $settings['button'] ) && ( '' !== $settings['link_button'] ) && ( $settings['show_button'] )) : ?>
	                    	<a class="wow fadeInUp boxed-btn" data-wow-duration="1.5s" href="<?php print wp_kses_post($settings['link_button']); ?>"><span><?php print wp_kses_post($settings['button']); ?></span></a>
	                    <?php endif; ?>
	                  </div>
	               </div>
	            </div>
	         </div>
	         <div class="request-section">
	            <div class="container">
	               <div class="request-section-container">
	                  <div class="row">
	                     <div class="col-xl-5 col-lg-6">
	                     	<?php if ( '' !== $settings['subtitle'] ): ?>
	                        <span class="title"><?php print wp_kses_post($settings['subtitle']); ?></span>
	                        <?php endif; ?>
	                        <?php if ( '' !== $settings['title'] ) : ?>
	                        <h2 class="subtitle"><?php print wp_kses_post($settings['title']); ?></h2>
	                        <?php endif; ?>
	                        <?php if ( '' !== $settings['content'] ): ?>
	                        <p><?php print wp_kses_post($settings['content']); ?></p>
	                        <?php endif; ?>
	                     </div>
	                     <div class="offset-xl-1 col-xl-6 col-lg-6">
	                        <div class="request-form">
	                           <?php print do_shortcode(html_entity_decode( $settings['shortcode'] )); ?>
	                        </div>
	                     </div>
	                  </div>
	               </div>
	            </div>
	            <div class="request-section-overlay"></div>
	         </div>
	         <div class="hero-overlay"></div>
	      </div>
	      <?php elseif( $chose_style == 'slider_style_3' ): ?>
	      <div class="hero-area hero-bg-3 home-3" style="background-image: url(<?php print esc_url( $bg_url ); ?>);">
	         <div class="container">
	            <div class="row">
	               <div class="col-xl-6 col-lg-8">
	               	  <div class="hero-txt">
	                  	<?php if (( '' !== $settings['subheading'] ) && ( $settings['show_subheading'] )) : ?>
	                    	<span class="wow fadeInDown" data-wow-duration="1.5s"><?php print wp_kses_post($settings['subheading']); ?></span>
	                    <?php endif; ?>
	                    <?php if (( '' !== $settings['heading'] ) && ( $settings['show_heading'] )) : ?>
	                    	<h1 class="wow fadeInUp" data-wow-duration="1.5s"><?php print wp_kses_post($settings['heading']); ?></h1>
	                    <?php endif; ?>
	                    <?php if (( '' !== $settings['button'] ) && ( '' !== $settings['link_button'] ) && ( $settings['show_button'] )) : ?>
	                    	<a class="wow fadeInUp boxed-btn" data-wow-duration="1.5s" href="<?php print wp_kses_post($settings['link_button']); ?>"><span><?php print wp_kses_post($settings['button']); ?></span></a>
	                    <?php endif; ?>
	                  </div>
	               </div>
	            </div>
	         </div>
	         <div class="hero-overlay"></div>
	      </div>
	      <?php elseif( $chose_style == 'slider_style_4' ): ?>
	      <div class="hero-area hero-bg" id="hero-home-7" style="background-image: url(<?php print esc_url( $bg_url ); ?>);">
	         <div id="bgndVideo7" data-property="{videoURL:'<?php print wp_kses_post($settings['video']); ?>',containment:'#hero-home-7', quality:'large', autoPlay:true, loop:true, mute:true, opacity:1}"></div>
	         <div class="container">
	            <div class="row">
	               <div class="col-xl-6 col-lg-8">
	                  <div class="hero-txt">
	                  	<?php if (( '' !== $settings['subheading'] ) && ( $settings['show_subheading'] )) : ?>
	                    	<span class="wow fadeInDown" data-wow-duration="1.5s"><?php print wp_kses_post($settings['subheading']); ?></span>
	                    <?php endif; ?>
	                    <?php if (( '' !== $settings['heading'] ) && ( $settings['show_heading'] )) : ?>
	                    	<h1 class="wow fadeInUp" data-wow-duration="1.5s"><?php print wp_kses_post($settings['heading']); ?></h1>
	                    <?php endif; ?>
	                    <?php if (( '' !== $settings['button'] ) && ( '' !== $settings['link_button'] ) && ( $settings['show_button'] )) : ?>
	                    	<a class="wow fadeInUp boxed-btn" data-wow-duration="1.5s" href="<?php print wp_kses_post($settings['link_button']); ?>"><span><?php print wp_kses_post($settings['button']); ?></span></a>
	                    <?php endif; ?>
	                  </div>
	               </div>
	            </div>
	         </div>
	         <div class="hero-overlay"></div>
	      </div>
	      <?php elseif( $chose_style == 'slider_style_5' ): ?>
	      <div class="hero-area hero-bg-2 home-2" id="hero-home-8" style="background-image: url(<?php print esc_url( $bg_url ); ?>);">
	         <div id="bgndVideo8" data-property="{videoURL:'<?php print wp_kses_post($settings['video_5']); ?>',containment:'#hero-home-8', quality:'large', autoPlay:true, loop:true, mute:true, opacity:1}"></div>
	         <div class="container">
	            <div class="row">
	               <div class="col-xl-6 col-lg-8">
	               	  <div class="hero-txt">
	                  	<?php if (( '' !== $settings['subheading'] ) && ( $settings['show_subheading'] )) : ?>
	                    	<span class="wow fadeInDown" data-wow-duration="1.5s"><?php print wp_kses_post($settings['subheading']); ?></span>
	                    <?php endif; ?>
	                    <?php if (( '' !== $settings['heading'] ) && ( $settings['show_heading'] )) : ?>
	                    	<h1 class="wow fadeInUp" data-wow-duration="1.5s"><?php print wp_kses_post($settings['heading']); ?></h1>
	                    <?php endif; ?>
	                    <?php if (( '' !== $settings['button'] ) && ( '' !== $settings['link_button'] ) && ( $settings['show_button'] )) : ?>
	                    	<a class="wow fadeInUp boxed-btn" data-wow-duration="1.5s" href="<?php print wp_kses_post($settings['link_button']); ?>"><span><?php print wp_kses_post($settings['button']); ?></span></a>
	                    <?php endif; ?>
	                  </div>
	               </div>
	            </div>
	         </div>
	         <div class="request-section">
	            <div class="container">
	               <div class="request-section-container">
	                  <div class="row">
	                  	 <div class="col-xl-5 col-lg-6">
	                     	<?php if ( '' !== $settings['subtitle_5'] ): ?>
	                        <span class="title"><?php print wp_kses_post($settings['subtitle_5']); ?></span>
	                        <?php endif; ?>
	                        <?php if ( '' !== $settings['title_5'] ) : ?>
	                        <h2 class="subtitle"><?php print wp_kses_post($settings['title_5']); ?></h2>
	                        <?php endif; ?>
	                        <?php if ( '' !== $settings['content_5'] ): ?>
	                        <p><?php print wp_kses_post($settings['content_5']); ?></p>
	                        <?php endif; ?>
	                     </div>
	                     <div class="offset-xl-1 col-xl-6 col-lg-6">
	                        <div class="request-form">
	                           <?php print do_shortcode(html_entity_decode( $settings['shortcode_5'] )); ?>
	                        </div>
	                     </div>
	                  </div>
	               </div>
	            </div>
	            <div class="request-section-overlay"></div>
	         </div>
	         <div class="hero-overlay"></div>
	      </div>
	      <?php elseif( $chose_style == 'slider_style_6' ): ?>
	      <div class="hero-area hero-bg-3 home-3" id="hero-home-9" style="background-image: url(<?php print esc_url( $bg_url ); ?>);">
	         <div id="bgndVideo9" data-property="{videoURL:'<?php print wp_kses_post($settings['video_6']); ?>',containment:'#hero-home-9', quality:'large', autoPlay:true, loop:true, mute:true, opacity:1}"></div>
	         <div class="container">
	            <div class="row">
	               <div class="col-xl-6 col-lg-8">
	               	  <div class="hero-txt">
	                  	<?php if (( '' !== $settings['subheading'] ) && ( $settings['show_subheading'] )) : ?>
	                    	<span class="wow fadeInDown" data-wow-duration="1.5s"><?php print wp_kses_post($settings['subheading']); ?></span>
	                    <?php endif; ?>
	                    <?php if (( '' !== $settings['heading'] ) && ( $settings['show_heading'] )) : ?>
	                    	<h1 class="wow fadeInUp" data-wow-duration="1.5s"><?php print wp_kses_post($settings['heading']); ?></h1>
	                    <?php endif; ?>
	                    <?php if (( '' !== $settings['button'] ) && ( '' !== $settings['link_button'] ) && ( $settings['show_button'] )) : ?>
	                    	<a class="wow fadeInUp boxed-btn" data-wow-duration="1.5s" href="<?php print wp_kses_post($settings['link_button']); ?>"><span><?php print wp_kses_post($settings['button']); ?></span></a>
	                    <?php endif; ?>
	                  </div>
	               </div>
	            </div>
	         </div>
	         <div class="hero-overlay"></div>
	      </div>
	      <?php elseif( $chose_style == 'slider_style_7' ): ?>
	      <div class="hero-area hero-bg parallax" style="background-image: url(<?php print esc_url( $bg_url ); ?>);">
	         <div class="container">
	            <div class="row">
	               <div class="col-xl-6 col-lg-8">
	               	  <div class="hero-txt">
	                  	<?php if (( '' !== $settings['subheading'] ) && ( $settings['show_subheading'] )) : ?>
	                    	<span class="wow fadeInDown" data-wow-duration="1.5s"><?php print wp_kses_post($settings['subheading']); ?></span>
	                    <?php endif; ?>
	                    <?php if (( '' !== $settings['heading'] ) && ( $settings['show_heading'] )) : ?>
	                    	<h1 class="wow fadeInUp" data-wow-duration="1.5s"><?php print wp_kses_post($settings['heading']); ?></h1>
	                    <?php endif; ?>
	                    <?php if (( '' !== $settings['button'] ) && ( '' !== $settings['link_button'] ) && ( $settings['show_button'] )) : ?>
	                    	<a class="wow fadeInUp boxed-btn" data-wow-duration="1.5s" href="<?php print wp_kses_post($settings['link_button']); ?>"><span><?php print wp_kses_post($settings['button']); ?></span></a>
	                    <?php endif; ?>
	                  </div>
	               </div>
	            </div>
	         </div>
	         <div class="hero-overlay"></div>
	      </div>
	      <?php elseif( $chose_style == 'slider_style_8' ): ?>
	      <div class="hero-area hero-bg-2 home-2 parallax" style="background-image: url(<?php print esc_url( $bg_url ); ?>);">
	         <div class="container">
	            <div class="row">
	               <div class="col-xl-6 col-lg-8">
	                  <div class="hero-txt">
	                  	<?php if (( '' !== $settings['subheading'] ) && ( $settings['show_subheading'] )) : ?>
	                    	<span class="wow fadeInDown" data-wow-duration="1.5s"><?php print wp_kses_post($settings['subheading']); ?></span>
	                    <?php endif; ?>
	                    <?php if (( '' !== $settings['heading'] ) && ( $settings['show_heading'] )) : ?>
	                    	<h1 class="wow fadeInUp" data-wow-duration="1.5s"><?php print wp_kses_post($settings['heading']); ?></h1>
	                    <?php endif; ?>
	                    <?php if (( '' !== $settings['button'] ) && ( '' !== $settings['link_button'] ) && ( $settings['show_button'] )) : ?>
	                    	<a class="wow fadeInUp boxed-btn" data-wow-duration="1.5s" href="<?php print wp_kses_post($settings['link_button']); ?>"><span><?php print wp_kses_post($settings['button']); ?></span></a>
	                    <?php endif; ?>
	                  </div>
	               </div>
	            </div>
	         </div>
	         <div class="request-section">
	            <div class="container">
	               <div class="request-section-container">
	                  <div class="row">
	                     <div class="col-xl-5 col-lg-6">
	                     	<?php if ( '' !== $settings['subtitle_8'] ): ?>
	                        <span class="title"><?php print wp_kses_post($settings['subtitle_8']); ?></span>
	                        <?php endif; ?>
	                        <?php if ( '' !== $settings['title_8'] ) : ?>
	                        <h2 class="subtitle"><?php print wp_kses_post($settings['title_8']); ?></h2>
	                        <?php endif; ?>
	                        <?php if ( '' !== $settings['content_8'] ): ?>
	                        <p><?php print wp_kses_post($settings['content_8']); ?></p>
	                        <?php endif; ?>
	                     </div>
	                     <div class="offset-xl-1 col-xl-6 col-lg-6">
	                        <div class="request-form">
	                           <?php print do_shortcode(html_entity_decode( $settings['shortcode_8'] )); ?>
	                        </div>
	                     </div>
	                  </div>
	               </div>
	            </div>
	            <div class="request-section-overlay"></div>
	         </div>
	         <div class="hero-overlay"></div>
	      </div>
	      <?php elseif( $chose_style == 'slider_style_9' ): ?>
	      <div class="hero-area home-3" data-parallax="scroll" data-speed="0.2" data-image-src="<?php print esc_url( $bg_url ); ?>">
	         <div class="container">
	            <div class="row">
	               <div class="col-xl-6 col-lg-8">
	                  <div class="hero-txt">
	                  	<?php if (( '' !== $settings['subheading'] ) && ( $settings['show_subheading'] )) : ?>
	                    	<span class="wow fadeInDown" data-wow-duration="1.5s"><?php print wp_kses_post($settings['subheading']); ?></span>
	                    <?php endif; ?>
	                    <?php if (( '' !== $settings['heading'] ) && ( $settings['show_heading'] )) : ?>
	                    	<h1 class="wow fadeInUp" data-wow-duration="1.5s"><?php print wp_kses_post($settings['heading']); ?></h1>
	                    <?php endif; ?>
	                    <?php if (( '' !== $settings['button'] ) && ( '' !== $settings['link_button'] ) && ( $settings['show_button'] )) : ?>
	                    	<a class="wow fadeInUp boxed-btn" data-wow-duration="1.5s" href="<?php print wp_kses_post($settings['link_button']); ?>"><span><?php print wp_kses_post($settings['button']); ?></span></a>
	                    <?php endif; ?>
	                  </div>
	               </div>
	            </div>
	         </div>
	         <div class="hero-overlay"></div>
	      </div>
	      <?php elseif( $chose_style == 'slider_style_10' ): ?>
	      <div class="hero-area hero-bg" id="heroHome13" style="background-image: url(<?php print esc_url( $bg_url ); ?>);">
	         <div class="container">
	            <div class="row">
	               <div class="col-xl-6 col-lg-8">
	                  <div class="hero-txt">
	                  	<?php if (( '' !== $settings['subheading'] ) && ( $settings['show_subheading'] )) : ?>
	                    	<span class="wow fadeInDown" data-wow-duration="1.5s"><?php print wp_kses_post($settings['subheading']); ?></span>
	                    <?php endif; ?>
	                    <?php if (( '' !== $settings['heading'] ) && ( $settings['show_heading'] )) : ?>
	                    	<h1 class="wow fadeInUp" data-wow-duration="1.5s"><?php print wp_kses_post($settings['heading']); ?></h1>
	                    <?php endif; ?>
	                    <?php if (( '' !== $settings['button'] ) && ( '' !== $settings['link_button'] ) && ( $settings['show_button'] )) : ?>
	                    	<a class="wow fadeInUp boxed-btn" data-wow-duration="1.5s" href="<?php print wp_kses_post($settings['link_button']); ?>"><span><?php print wp_kses_post($settings['button']); ?></span></a>
	                    <?php endif; ?>
	                  </div>
	               </div>
	            </div>
	         </div>
	         <div class="hero-overlay"></div>
	      </div>
	      <?php endif; ?>
	<?php
	}

}