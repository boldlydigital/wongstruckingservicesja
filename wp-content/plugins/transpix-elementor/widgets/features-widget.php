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
class BdevsFeatures extends \Elementor\Widget_Base {

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
		return 'bdevs-features';
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
		return __( 'Features', 'bdevs-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Bdevs Features widget icon.
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
	 * Retrieve the list of categories the Bdevs Improve widget belongs to.
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
		return [ 'features' ];
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
				'label' => esc_html__( 'Features', 'bdevs-elementor' ),
			]	
		);

		$this->add_control(
			'chose_style',
			[
				'label'     => esc_html__( 'Chose Style', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'features_style_1'  => esc_html__( 'Features Style 1', 'bdevs-elementor' ),
					'features_style_2' => esc_html__( 'Features Style 2', 'bdevs-elementor' ),
				],
				'default'   => 'features_style_1',
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

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_features',
			[
				'label' => esc_html__( 'Features Items', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'tabs',
			[
				'label' => esc_html__( 'Features Items', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => [	
					[
						'name'        => 'delay',
						'label'       => esc_html__( 'Time Delay', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '#s' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'icon',
						'label'       => esc_html__( 'Icon', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'title',
						'label'       => esc_html__( 'Title', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'subtitle',
						'label'       => esc_html__( 'Subtitle', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
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
		extract($settings);
		$chose_style = $settings['chose_style'];
		$bg_src = wp_get_attachment_image_src( $settings['background_bg']['id'], 'full' );
		$bg_url = $bg_src ? $bg_src[0] : ''; ?>
		<?php if( $chose_style == 'features_style_1' ): ?>
		<!--  features section start  -->
	      <div class="features-section">
	         <div class="container">
	            <div class="row feature-bg feature-content" style="background-image: url(<?php print esc_url( $bg_url ); ?>);">
	               <div class="col-lg-7 offset-lg-5 pr-0">
	                  <div class="features">
                  		<?php if (( '' !== $settings['subheading'] ) && ( $settings['show_subheading'] )) : ?>
	                     <span class="title"><?php echo wp_kses_post($settings['subheading']); ?></span>
	                 	<?php endif; ?>
	                    <?php if (( '' !== $settings['heading'] ) && ( $settings['show_heading'] )) : ?>
	                     <h2 class="subtitle"><?php echo wp_kses_post($settings['heading']); ?></h2>
	                    <?php endif; ?>
	                     <div class="feature-lists">
	                     	<?php 
		                        foreach ( $settings['tabs'] as $item ) : 
							?>
	                        <div class="single-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="<?php print wp_kses_post($item['delay']); ?>">
	                           <div class="icon-wrapper">
	                           	<?php if ( '' !== $item['icon'] ) : ?>
	                           		<i class="<?php print wp_kses_post($item['icon']); ?>"></i>
	                           	<?php endif; ?>
	                           </div>
	                           <div class="feature-details">
	                           	<?php if ( '' !== $item['title'] ) : ?>
	                              <h4><?php print wp_kses_post($item['title']); ?></h4>
	                            <?php endif; ?>
	                            <?php if ( '' !== $item['subtitle'] ) : ?>
	                              <p><?php print wp_kses_post($item['subtitle']); ?> </p>
	                            <?php endif; ?>
	                           </div>
	                        </div>
	                        <?php endforeach; ?>
	                     </div>
	                  </div>
	               </div>
	            </div>
	         </div>
	      </div>
	      <!--  features section end  -->
	      <?php elseif( $chose_style == 'features_style_2' ): ?>
	      <div class="features-section home-2 border-bottom">
	         <div class="container">
	            <div class="row feature-content">
	               <div class="col-xl-5 offset-xl-7 col-lg-6 offset-lg-6 pr-0">
	                  <div class="features">
	                    <?php if (( '' !== $settings['subheading'] ) && ( $settings['show_subheading'] )) : ?>
	                    <span class="title"><?php echo wp_kses_post($settings['subheading']); ?></span>
	                 	<?php endif; ?>
	                    <?php if (( '' !== $settings['heading'] ) && ( $settings['show_heading'] )) : ?>
	                     <h2 class="subtitle"><?php echo wp_kses_post($settings['heading']); ?></h2>
	                    <?php endif; ?>
	                    <div class="feature-lists">
	                     	<?php 
		                        foreach ( $settings['tabs'] as $item ) : 
							?>
	                        <div class="single-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="<?php print wp_kses_post($item['delay']); ?>">
	                           <div class="icon-wrapper">
	                           	<?php if ( '' !== $item['icon'] ) : ?>
	                           		<i class="<?php print wp_kses_post($item['icon']); ?>"></i>
	                           	<?php endif; ?>
	                           </div>
	                           <div class="feature-details">
	                           	<?php if ( '' !== $item['title'] ) : ?>
	                              <h4><?php print wp_kses_post($item['title']); ?></h4>
	                            <?php endif; ?>
	                            <?php if ( '' !== $item['subtitle'] ) : ?>
	                              <p><?php print wp_kses_post($item['subtitle']); ?> </p>
	                            <?php endif; ?>
	                           </div>
	                        </div>
	                        <?php endforeach; ?>
	                    </div>
	                  </div>
	               </div>
	            </div>
	         </div>
	      </div>
	      <?php endif; ?>
	<?php
	}

}