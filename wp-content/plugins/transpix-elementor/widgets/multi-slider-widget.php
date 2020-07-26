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
class BdevsMultiSlider extends \Elementor\Widget_Base {

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
		return 'bdevs-multi-slider';
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
		return __( 'Multi Slider', 'bdevs-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Bdevs MultiSlider widget icon.
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
	 * Retrieve the list of categories the Bdevs MultiSlider widget belongs to.
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
		return [ 'multi-slider', 'carousel' ];
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
			'section_content_heading',
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
				],
				'default'   => 'slider_style_1',
			]
		);

		$this->add_control(
			'tabs',
			[
				'label' => esc_html__( 'Slider Items', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => [
					[
						'name'    => 'tab_image',
						'label'   => esc_html__( 'Image Background', 'bdevs-elementor' ),
						'type'    => Controls_Manager::MEDIA,
						'dynamic' => [ 'active' => true ],
					],
					[
						'name'       => 'subheading',
						'label'      => esc_html__( 'Subheading', 'bdevs-elementor' ),
						'type'       => Controls_Manager::TEXT,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'It is subheading', 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'       => 'heading',
						'label'      => esc_html__( 'Heading', 'bdevs-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'It is heading', 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'       => 'button',
						'label'      => esc_html__( 'Button', 'bdevs-elementor' ),
						'type'       => Controls_Manager::TEXT,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'SEE SERVICES', 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'       => 'link_button',
						'label'      => esc_html__( 'Link Button', 'bdevs-elementor' ),
						'type'       => Controls_Manager::TEXT,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( '#', 'bdevs-elementor' ),
						'label_block' => true,
					],
				],
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
		?>
		<?php if( $chose_style == 'slider_style_1' ): ?>
		<!--  hero area start  -->
	     <div class="hero-area home-4">
	         <div class="hero-carousel owl-carousel owl-theme">
	         	<?php 
                    foreach ( $settings['tabs'] as $item ) : 
				?>
				<?php 
				   	if ( '' !== $item['tab_image'] )  : 
				   		$image_src = wp_get_attachment_image_src( $item['tab_image']['id'], 'full' );
						$image = $image_src ? $image_src[0] : ''; 
				   		?>
				<?php endif; ?>
	            <div class="single-hero-item hero-bg" style="background-image: url(<?php print esc_url($image); ?>);">
	               <div class="container">
	                  <div class="row">
	                     <div class="col-xl-6 col-lg-8">
	                        <div class="hero-txt">
		                        <?php if (( '' !== $item['subheading'] ) && ( $settings['show_subheading'] )) : ?>
		                           <span class="wow fadeInDown" data-wow-duration="1.5s"><?php print wp_kses_post($item['subheading']); ?></span>
		                        <?php endif; ?>
		                        <?php if (( '' !== $item['subheading'] ) && ( $settings['show_subheading'] )) : ?>
		                           <h1 class="wow fadeInUp" data-wow-duration="1.5s"><?php print wp_kses_post($item['subheading']); ?></h1>
		                        <?php endif; ?>
		                        <?php if (( '' !== $item['button'] ) && ( $settings['show_button'] )) : ?>
		                           <a class="wow fadeInUp boxed-btn" data-wow-duration="1.5s" href="<?php print wp_kses_post($item['link_button']); ?>"><span><?php print wp_kses_post($item['button']); ?></span></a>
		                        <?php endif; ?>
	                        </div>
	                     </div>
	                  </div>
	               </div>
	               <div class="hero-overlay"></div>
	            </div>
	        	<?php endforeach; ?>
	         </div>
	      </div>
	     <!--  hero area end  -->
	     <?php elseif( $chose_style == 'slider_style_2' ): ?>
	     <div class="hero-area home-2 home-5">
	         <div class="hero-carousel owl-carousel owl-theme">
	         	<?php 
                    foreach ( $settings['tabs'] as $item ) : 
				?>
				<?php 
				   	if ( '' !== $item['tab_image'] )  : 
				   		$image_src = wp_get_attachment_image_src( $item['tab_image']['id'], 'full' );
						$image = $image_src ? $image_src[0] : ''; 
				   		?>
				<?php endif; ?>
	            <div class="single-hero-item hero-bg-2" style="background-image: url(<?php print esc_url($image); ?>);">
	               <div class="container">
	                  <div class="row">
	                     <div class="col-xl-6 col-lg-8">
	                     	<div class="hero-txt">
		                        <?php if (( '' !== $item['subheading'] ) && ( $settings['show_subheading'] )) : ?>
		                           <span><?php print wp_kses_post($item['subheading']); ?></span>
		                        <?php endif; ?>
		                        <?php if (( '' !== $item['subheading'] ) && ( $settings['show_subheading'] )) : ?>
		                           <h1><?php print wp_kses_post($item['subheading']); ?></h1>
		                        <?php endif; ?>
		                        <?php if (( '' !== $item['button'] ) && ( $settings['show_button'] )) : ?>
		                           <a class="boxed-btn" href="<?php print wp_kses_post($item['link_button']); ?>"><span><?php print wp_kses_post($item['button']); ?></span></a>
		                        <?php endif; ?>
	                        </div>
	                     </div>
	                  </div>
	               </div>
	               <div class="hero-overlay"></div>
	            </div>
	            <?php endforeach; ?>
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
	      </div>
	      <?php elseif( $chose_style == 'slider_style_3' ): ?>
	      <div class="hero-area home-3 home-6">
	         <div class="hero-carousel owl-carousel owl-theme">
	         	<?php 
                    foreach ( $settings['tabs'] as $item ) : 
				?>
				<?php 
				   	if ( '' !== $item['tab_image'] )  : 
				   		$image_src = wp_get_attachment_image_src( $item['tab_image']['id'], 'full' );
						$image = $image_src ? $image_src[0] : ''; 
				   		?>
				<?php endif; ?>
	            <div class="single-hero-item hero-bg-3" style="background-image: url(<?php print esc_url($image); ?>);">
	               <div class="container">
	                  <div class="row">
	                     <div class="col-xl-6 col-lg-8">
	                     	<div class="hero-txt">
		                        <?php if (( '' !== $item['subheading'] ) && ( $settings['show_subheading'] )) : ?>
		                           <span><?php print wp_kses_post($item['subheading']); ?></span>
		                        <?php endif; ?>
		                        <?php if (( '' !== $item['subheading'] ) && ( $settings['show_subheading'] )) : ?>
		                           <h1><?php print wp_kses_post($item['subheading']); ?></h1>
		                        <?php endif; ?>
		                        <?php if (( '' !== $item['button'] ) && ( $settings['show_button'] )) : ?>
		                           <a class="boxed-btn" href="<?php print wp_kses_post($item['link_button']); ?>"><span><?php print wp_kses_post($item['button']); ?></span></a>
		                        <?php endif; ?>
	                        </div>
	                     </div>
	                  </div>
	               </div>
	               <div class="hero-overlay"></div>
	            </div>
	            <?php endforeach; ?>
	         </div>
	      </div>
	     <?php endif; ?>
	<?php
	}

}