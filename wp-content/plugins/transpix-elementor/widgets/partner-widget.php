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
class BdevsPartner extends \Elementor\Widget_Base {

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
		return 'bdevs-partner';
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
		return __( 'Partner', 'bdevs-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Bdevs Partner widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-person';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Bdevs Partner widget belongs to.
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
		return [ 'partner' ];
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
				'label' => esc_html__( 'Partner', 'bdevs-elementor' ),
			]	
		);

		$this->add_control(
			'chose_style',
			[
				'label'     => esc_html__( 'Chose Style', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'partner_style_1'  => esc_html__( 'Partner No Border', 'bdevs-elementor' ),
					'partner_style_2' => esc_html__( 'Partner Border', 'bdevs-elementor' ),
				],
				'default'   => 'partner_style_1',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_partner',
			[
				'label' => esc_html__( 'Partner Items', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'tabs',
			[
				'label' => esc_html__( 'Partner Items', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => [	
					[
						'name'    => 'tab_image',
						'label'   => esc_html__( 'Image', 'bdevs-elementor' ),
						'type'    => Controls_Manager::MEDIA,
						'dynamic' => [ 'active' => true ],
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

		$this->end_controls_section();

	}

	public function render() {
		$settings  = $this->get_settings_for_display();
		extract($settings);
		$chose_style = $settings['chose_style']; ?>
		<?php if( $chose_style == 'partner_style_1' ): ?>
		<div class="partner-section">
	         <div class="container">
	            <div class="row">
	               <div class="col-md-12">
	                  <div class="partner-carousel owl-carousel owl-theme">
	                  	<?php 
	                        foreach ( $settings['tabs'] as $item ) : 
						?>
						<?php 
						   	if ( '' !== $item['tab_image'] )  : 
						   		$image_src = wp_get_attachment_image_src( $item['tab_image']['id'], 'full' );
								$image = $image_src ? $image_src[0] : ''; 
						   		?>
						<?php 
						endif; ?>
	                     <div class="single-partner-item">
	                        <div class="outer">
	                           <div class="inner">
	                              <img src="<?php print esc_url($image); ?>">
	                           </div>
	                        </div>
	                     </div>
	                 	<?php endforeach; ?>
	                  </div>
	               </div>
	            </div>
	         </div>
	    </div>
	    <?php elseif( $chose_style == 'partner_style_2' ): ?>
	    <div class="partner-section">
	         <div class="container">
	            <div class="row">
	               <div class="col-md-12">
	                  <div class="partner-carousel owl-carousel owl-theme border-bottom border-top-lg-0 border-top">
	                  	<?php 
	                        foreach ( $settings['tabs'] as $item ) : 
						?>
						<?php 
						   	if ( '' !== $item['tab_image'] )  : 
						   		$image_src = wp_get_attachment_image_src( $item['tab_image']['id'], 'full' );
								$image = $image_src ? $image_src[0] : ''; 
						   		?>
						<?php 
						endif; ?>
	                     <div class="single-partner-item">
	                        <div class="outer">
	                           <div class="inner">
	                              <img src="<?php print esc_url($image); ?>">
	                           </div>
	                        </div>
	                     </div>
	                 	<?php endforeach; ?>
	                  </div>
	               </div>
	            </div>
	         </div>
	    </div>
	   	<?php endif; ?>
	<?php
	}

}