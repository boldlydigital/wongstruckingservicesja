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
class BdevsShortcodeForm extends \Elementor\Widget_Base {

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
		return 'bdevs-shortcode';
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
		return __( 'Shortcode Form', 'bdevs-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Bdevs Shortcode widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-shortcode';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Bdevs Shortcode widget belongs to.
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
		return [ 'shortcode' ];
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
				'label' => esc_html__( 'Shortcode Form', 'bdevs-elementor' ),
			]	
		);

		$this->add_control(
			'chose_style',
			[
				'label'     => esc_html__( 'Chose Style', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'quote_style_1'  => esc_html__( 'With Background Image', 'bdevs-elementor' ),
					'quote_style_2' => esc_html__( 'With List', 'bdevs-elementor' ),
				],
				'default'   => 'quote_style_1',
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
			'section_content_heading_2',
			[
				'label' => esc_html__( 'With List', 'bdevs-elementor' ),
				'condition' => [
					'chose_style' => ['quote_style_2']
				],
			]
		);

		$this->add_control(
			'tabs',
			[
				'label' => esc_html__( 'List Items', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => [
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
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Content', 'bdevs-elementor' ),
						'label_block' => true,
					],
				],
			]
		);

		$this->end_controls_section();

		$this->end_controls_section();

		/** 
		*	Layout section 
		**/
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
		$chose_style = $settings['chose_style'];
		$bg_src = wp_get_attachment_image_src( $settings['background_bg']['id'], 'full' );
		$bg_url = $bg_src ? $bg_src[0] : ''; ?>
		<?php if( $chose_style == 'quote_style_1' ): ?>
		<div class="quote-section quote-bg" style="background-image: url(<?php print esc_url( $bg_url ); ?>);">
	         <div class="container">
	            <div class="row">
	               <div class="offset-lg-5 col-lg-7">
	                  <div class="quote-form-section">
	                  	<?php if (( '' !== $settings['subheading'] ) && ( $settings['show_subheading'] )) : ?>
	                     <span class="title"><?php print wp_kses_post($settings['subheading']); ?></span>
	                    <?php endif; ?>
	                    <?php if (( '' !== $settings['heading'] ) && ( $settings['show_heading'] )) : ?>
	                     <h2 class="subtitle"><?php print wp_kses_post($settings['heading']); ?></h2>
	                    <?php endif; ?>
	                     <?php print do_shortcode(html_entity_decode( $settings['shortcode'] )); ?>
	                  </div>
	               </div>
	            </div>
	         </div>
	    </div>
	    <?php elseif( $chose_style == 'quote_style_2' ): ?>
	    <div class="quote-section quote-page">
         <div class="container">
            <div class="row">
               <div class="col-xl-6 col-lg-6">
                  <div class="row">
                     <div class="col-lg-9">
                        <?php if (( '' !== $settings['subheading'] ) && ( $settings['show_subheading'] )) : ?>
	                     <span class="title"><?php print wp_kses_post($settings['subheading']); ?></span>
	                    <?php endif; ?>
	                    <?php if (( '' !== $settings['heading'] ) && ( $settings['show_heading'] )) : ?>
	                     <h2 class="subtitle"><?php print wp_kses_post($settings['heading']); ?></h2>
	                    <?php endif; ?>
                     </div>
                  </div>
                  <?php print do_shortcode(html_entity_decode( $settings['shortcode'] )); ?>
               </div>
               <!--  contact infos start  -->
               <div class="col-xl-5 offset-xl-1 col-lg-6">
                  <div class="contact-infos">
                  	<?php 
                        foreach ( $settings['tabs'] as $item ) : 
					?>
                     <div class="single-info">
                        <div class="icon-wrapper"><i class="<?php print wp_kses_post($item['icon']); ?>"></i></div>
                        <div class="info-txt">
                           <?php print wp_kses_post($item['content']); ?>
                        </div>
                     </div>
                 	<?php endforeach; ?>
                  </div>
               </div>
               <!--  contact infos end  -->
            </div>
         </div>
      </div>
	   	<?php endif; ?>
	<?php
	}

}