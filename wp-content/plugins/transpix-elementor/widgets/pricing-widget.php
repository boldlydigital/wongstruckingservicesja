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
class BdevsPricing extends \Elementor\Widget_Base {

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
		return 'bdevs-pricing';
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
		return __( 'Pricing', 'bdevs-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Bdevs Pricing widget icon.
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
	 * Retrieve the list of categories the Bdevs Pricing widget belongs to.
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
		return [ 'pricing' ];
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
				'label' => esc_html__( 'Pricing', 'bdevs-elementor' ),
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

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_pricing',
			[
				'label' => esc_html__( 'Pricing', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'tabs',
			[
				'label' => esc_html__( 'Pricing Items', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => [	
					[
						'name'        => 'title',
						'label'       => esc_html__( 'Title', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Title' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'price',
						'label'       => esc_html__( 'Price', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Price' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'period',
						'label'       => esc_html__( 'Period', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Period' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'content',
						'label'       => esc_html__( 'Content', 'bdevs-elementor' ),
						'type'        => Controls_Manager::WYSIWYG,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Content' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'button',
						'label'       => esc_html__( 'Text Button', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Select Plan' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'link_button',
						'label'       => esc_html__( 'Link Button', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '#' , 'bdevs-elementor' ),
						'label_block' => true,
					],

				],
			]
		);

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
		extract($settings); ?>
		<div class="pricing-section">
         <div class="container">
         	<?php if (( '' !== $settings['subheading'] ) && ( $settings['show_subheading'] )) : ?>
             <span class="title"><?php echo wp_kses_post($settings['subheading']); ?></span>
            <?php endif; ?>
            <?php if (( '' !== $settings['heading'] ) && ( $settings['show_heading'] )) : ?>
             <h2 class="subtitle"><?php echo wp_kses_post($settings['heading']); ?></h2>
            <?php endif; ?>
            <div class="row">
               <div class="col-lg-12">
                  <div class="pricing-tables">
                     <div class="row">
                     	<?php 
	                        foreach ( $settings['tabs'] as $item ) : 
						?>
                        <div class="col-lg-4 col-md-6">
                           <div class="plan">
                              <header>
                                 <h4 class="plan-title">
                                    <?php print wp_kses_post($item['title']); ?>
                                 </h4>
                                 <div class="plan-cost"><span class="plan-price"><?php print wp_kses_post($item['price']); ?></span><span class="plan-type"><?php print wp_kses_post($item['period']); ?></span></div>
                              </header>
                              <ul class="plan-features">
                                 <?php print wp_kses_post($item['content']); ?>
                              </ul>
                              <div class="plan-select"><a href="<?php print wp_kses_post($item['link_button']); ?>"><?php print wp_kses_post($item['button']); ?></a></div>
                           </div>
                        </div>
                        <?php endforeach; ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
	<?php
	}

}