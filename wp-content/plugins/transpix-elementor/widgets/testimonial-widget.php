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
class BdevsTestimonial extends \Elementor\Widget_Base {

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
		return 'bdevs-testimonial';
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
		return __( 'Testimonial', 'bdevs-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Bdevs Testimonial widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-testimonial';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Bdevs Testimonial widget belongs to.
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
		return [ 'testimonial', 'carousel' ];
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
				'label' => esc_html__( 'Testimonial', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'chose_style',
			[
				'label'     => esc_html__( 'Chose Style', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'testimonial_style_1'  => esc_html__( 'Testimonial Style 1', 'bdevs-elementor' ),
					'testimonial_style_2' => esc_html__( 'Testimonial Style 2', 'bdevs-elementor' ),
					'testimonial_style_3' => esc_html__( 'Testimonial Style 3', 'bdevs-elementor' ),
				],
				'default'   => 'testimonial_style_1',
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
			'section_content_testimonial',
			[
				'label' => esc_html__( 'Testimonial Items', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'tabs',
			[
				'label' => esc_html__( 'Testimonial Items', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => [
					[
						'name'       => 'quote',
						'label'      => esc_html__( 'Quote', 'bdevs-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Quote', 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'       => 'name',
						'label'      => esc_html__( 'Name', 'bdevs-elementor' ),
						'type'       => Controls_Manager::TEXT,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Name', 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'       => 'info',
						'label'      => esc_html__( 'Information', 'bdevs-elementor' ),
						'type'       => Controls_Manager::TEXT,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Information', 'bdevs-elementor' ),
						'label_block' => true,
					],
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
		$bg_src = wp_get_attachment_image_src( $settings['background_bg']['id'], 'full' );
		$bg_url = $bg_src ? $bg_src[0] : '';
		$chose_style = $settings['chose_style'];
		?>
		<?php if( $chose_style == 'testimonial_style_1' ): ?>
		<div class="testimonial-section">
	         <div class="container">
	            <div class="testimonial-container">
	               <div class="row">
	                  <div class="col-lg-5">
	                     <div class="testimonial">
	                     	<?php if (( '' !== $settings['subheading'] ) && ( $settings['show_subheading'] )) : ?>
	                        <span class="title"><?php echo wp_kses_post($settings['subheading']); ?></span>
	                        <?php endif; ?>
	                        <?php if (( '' !== $settings['heading'] ) && ( $settings['show_heading'] )) : ?>
	                        <h2 class="subtitle"><?php echo wp_kses_post($settings['heading']); ?></h2>
	                        <?php endif; ?>
	                        <div class="testimonial-carousel owl-carousel owl-theme">
	                        	<?php 
			                        foreach ( $settings['tabs'] as $item ) : 
								?>
	                           	<div class="single-testimonial">
		                           	<?php if ( '' !== $item['quote'] ) : ?>
		                              <p><?php print wp_kses_post($item['quote']); ?>
		                              </p>
		                          	<?php endif; ?>
		                            <?php if ( '' !== $item['name'] ) : ?>
		                              <h5><?php print wp_kses_post($item['name']); ?></h5>
		                            <?php endif; ?>
		                            <?php if ( '' !== $item['info'] ) : ?>
		                              <span><?php print wp_kses_post($item['info']); ?></span>
		                            <?php endif; ?>
	                           	</div>
	                           	<?php endforeach; ?>
	                        </div>
	                     </div>
	                  </div>
	                  <div class="col-lg-7">
	                     <div class="free-space"></div>
	                  </div>
	               </div>
	               <div class="quote-icon">
	                  <i class="flaticon-quote-left"></i>
	               </div>
	            </div>
	         </div>
	     </div>
	     <style type="text/css">
	     	.testimonial-container::after{
	     		background-image: url(<?php print esc_url( $bg_url ); ?>);
	     	}
	     </style>
    <?php elseif( $chose_style == 'testimonial_style_2' ): ?>
    <div class="testimonial-section home-2 testimonial-bg-2" style="background-image: url(<?php print esc_url( $bg_url ); ?>);">
         <div class="container">
            <div class="row">
               <div class="col-lg-6">
                  <div class="testimonial-box">
                  	<?php if (( '' !== $settings['subheading'] ) && ( $settings['show_subheading'] )) : ?>
                    <span class="title"><?php echo wp_kses_post($settings['subheading']); ?></span>
                    <?php endif; ?>
                    <?php if (( '' !== $settings['heading'] ) && ( $settings['show_heading'] )) : ?>
                    <h2 class="subtitle"><?php echo wp_kses_post($settings['heading']); ?></h2>
                    <?php endif; ?>
                    <div class="testimonial-carousel owl-carousel owl-theme">
                     	<?php 
	                        foreach ( $settings['tabs'] as $item ) : 
						?>
                        <div class="single-testimonial">
                           	<?php if ( '' !== $item['quote'] ) : ?>
	                          <p><?php print wp_kses_post($item['quote']); ?></p>
	                      	<?php endif; ?>
	                        <?php if ( '' !== $item['name'] ) : ?>
	                          <h5><?php print wp_kses_post($item['name']); ?></h5>
	                        <?php endif; ?>
	                        <?php if ( '' !== $item['info'] ) : ?>
	                          <span><?php print wp_kses_post($item['info']); ?></span>
	                        <?php endif; ?>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <img src="<?php echo get_template_directory_uri();?>/assets/img/home_2/double-quote.png" alt="">
                  </div>
               </div>
               <div class="testimonial-overlay"></div>
            </div>
         </div>
     </div>
     <?php elseif( $chose_style == 'testimonial_style_3' ): ?>
     <div class="testimonial-section home-3">
         <div class="container">
            <div class="row">
               <div class="col-lg-6">
                  	<?php if (( '' !== $settings['subheading'] ) && ( $settings['show_subheading'] )) : ?>
	                <span class="title"><?php echo wp_kses_post($settings['subheading']); ?></span>
	                <?php endif; ?>
	                <?php if (( '' !== $settings['heading'] ) && ( $settings['show_heading'] )) : ?>
	                <h2 class="subtitle"><?php echo wp_kses_post($settings['heading']); ?></h2>
	                <?php endif; ?>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="testimonial-carousel-3 owl-carousel owl-theme">
                  	<?php 
                        foreach ( $settings['tabs'] as $item ) : 
					?>
					<?php 
					   	if ( '' !== $item['tab_image'] )  : 
					   		$image_src = wp_get_attachment_image_src( $item['tab_image']['id'], 'full' );
							$image = $image_src ? $image_src[0] : ''; 
					   		?>
					<?php endif; ?>
                     <div class="single-testimonial">
                        <div class="img-wrapper"><img src="<?php print esc_url($image); ?>"></div>
                        <div class="client-desc">
                           <p class="icon-wrapper"><i class="flaticon-quote-left"></i></p>
                           <?php if ( '' !== $item['quote'] ) : ?>
                           <p class="comment"><?php print wp_kses_post($item['quote']); ?></p>
                           <?php endif; ?>
                           <?php if ( '' !== $item['name'] ) : ?>
                           <h5 class="name"><?php print wp_kses_post($item['name']); ?></h5>
                           <?php endif; ?>
                           <?php if ( '' !== $item['info'] ) : ?>
                           <p class="rank"><?php print wp_kses_post($item['info']); ?></p>
                           <?php endif; ?>
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