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
class BdevsContact extends \Elementor\Widget_Base {

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
		return 'bdevs-contact';
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
		return __( 'Contact', 'bdevs-elementor' );
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
		return 'eicon-favorite';
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
		return [ 'contact' ];
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
				'label' => esc_html__( 'Contact', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'subheading',
			[
				'label'       => __( 'Subheading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter subheading here...', 'bdevs-elementor' ),
				'default'		=> __('Its subheading', 'bdevs-elementor'),
				'label_block' => true,
			]
		);

		$this->add_control(
			'heading',
			[
				'label'       => __( 'Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter heading here...', 'bdevs-elementor' ),
				'default'		=> __('Its heading', 'bdevs-elementor'),
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
			'section_content_list',
			[
				'label' => esc_html__( 'List Items', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'tabs',
			[
				'label' => esc_html__( 'List Items', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => [
					[
						'name'       => 'delay',
						'label'      => esc_html__( 'Time Delay', 'bdevs-elementor' ),
						'type'       => Controls_Manager::TEXT,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( '#s', 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'       => 'icon',
						'label'      => esc_html__( 'Icon', 'bdevs-elementor' ),
						'type'       => Controls_Manager::TEXT,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Icon', 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'       => 'content',
						'label'      => esc_html__( 'Content', 'bdevs-elementor' ),
						'type'       => Controls_Manager::WYSIWYG,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Content', 'bdevs-elementor' ),
						'label_block' => true,
					],
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_map',
			[
				'label' => esc_html__( 'Map', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'iframe1',
			[
				'label'       => __( 'IFrame Source', 'bdevs-elementor' ),
				'description'       => __( 'Access map.google.com, choose your place, click "Share", then click "Embed Map" and copy iframe source in "".', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter iframe source', 'bdevs-elementor' ),
				'default'		=> __('', 'bdevs-elementor'),
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
				'label'   => esc_html__( 'Show Subheading', 'bdevs-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);				

		$this->end_controls_section();

	}

	public function render() {
		$settings  = $this->get_settings_for_display(); 
		extract($settings);		
	   	?>
	   	<div class="contact-section">
	         <div class="container">
	            <!--  contact infos start  -->
	            <div class="contact-infos">
	               <div class="row no-gutters">
	               	<?php 
                        foreach ( $settings['tabs'] as $item ) : 
					?>
	                  <div class="col-lg-4 single-info-col">
	                     <div class="single-info wow fadeInRight" data-wow-duration="1s" data-wow-delay="<?php print wp_kses_post($item['delay']); ?>">
	                        <div class="icon-wrapper"><i class="<?php print wp_kses_post($item['icon']); ?>"></i></div>
	                        <div class="info-txt">
	                           <?php print wp_kses_post($item['content']); ?>
	                        </div>
	                     </div>
	                  </div>
	                <?php endforeach; ?>
	               </div>
	            </div>
	            <!--  contact infos end  -->
	            <!--  contact form and map start  -->
	            <div class="contact-form-section">
	               <div class="row">
	                  <div class="col-lg-6">
	                  	<?php if (( '' !== $settings['subheading'] ) && ( $settings['show_subheading'] )) : ?>
	                     <span class="title"><?php echo wp_kses_post($settings['subheading']); ?></span>
	                    <?php endif; ?>
	                     <?php if (( '' !== $settings['heading'] ) && ( $settings['show_heading'] )) : ?>
	                     <h2 class="subtitle"><?php echo wp_kses_post($settings['heading']); ?></h2>
	                    <?php endif; ?>
	                     <?php print do_shortcode(html_entity_decode( $settings['shortcode'] )); ?>
	                  </div>
	                  <div class="col-lg-6">
	                     <div class="map-wrapper">
	                     		<iframe src="<?php echo wp_kses_post($settings['iframe1']); ?>" width="540" height="524" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
	                     </div>
	                  </div>
	               </div>
	            </div>
	            <!--  contact form and map end  -->
	         </div>
	      </div>
	<?php
	}

}