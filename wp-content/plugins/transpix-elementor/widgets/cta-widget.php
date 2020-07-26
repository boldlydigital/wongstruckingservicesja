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
class BdevsCTA extends \Elementor\Widget_Base {

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
		return 'bdevs-cta';
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
		return __( 'CTA', 'bdevs-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Bdevs CTA widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-call-to-action';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Bdevs CTA widget belongs to.
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
		return [ 'cta' ];
	}

	public function get_script_depends() {
		return [ 'bdevs-elementor'];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_content_heading',
			[
				'label' => esc_html__( 'CTA', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'chose_style',
			[
				'label'     => esc_html__( 'Chose Style', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'cta_style_1'  => esc_html__( 'CTA Background Image', 'bdevs-elementor' ),
					'cta_style_2' => esc_html__( 'CTA No Background Image', 'bdevs-elementor' ),
				],
				'default'   => 'cta_style_1',
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
				'default'     => __( 'Contact Us', 'bdevs-elementor' ),
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
		$chose_style = $settings['chose_style'];
		$bg_src = wp_get_attachment_image_src( $settings['background_bg']['id'], 'full' );
		$bg_url = $bg_src ? $bg_src[0] : '';
		?>
		<?php if( $chose_style == 'cta_style_1' ): ?>
		<div class="cta-section cta-bg" style="background-image: url(<?php print esc_url( $bg_url ); ?>);">
	        <div class="container">
	            <div class="cta-container">
	               <div class="row align-items-center">
	                  <div class="col-lg-9">
	                  	<?php if (( '' !== $settings['heading'] ) && ( $settings['show_heading'] )) : ?>
	                     <h2 class="mb-lg-0 text-center text-lg-left"><?php print wp_kses_post($settings['heading']); ?></h2>
	                    <?php endif; ?>
	                  </div>
	                  <div class="col-lg-3 text-center text-lg-right">
	                  	<?php if (( '' !== $settings['button'] ) && ( '' !== $settings['link_button'] ) && ( $settings['show_button'] )) : ?>
	                     <a href="<?php print wp_kses_post($settings['link_button']); ?>" class="boxed-btn"><span><?php print wp_kses_post($settings['button']); ?></span></a>
	                    <?php endif; ?>
	                  </div>
	               </div>
	            </div>
	        </div>
	        <div class="cta-overlay"></div>
	    </div>
	    <?php elseif( $chose_style == 'cta_style_2' ): ?>
	    <div class="cta-section home-2">
	         <div class="container">
	            <div class="cta-container">
	               <div class="row align-items-center">
	                  <div class="col-lg-9">
	                  	<?php if (( '' !== $settings['heading'] ) && ( $settings['show_heading'] )) : ?>
	                     <h2 class="mb-lg-0 text-center text-lg-left"><?php print wp_kses_post($settings['heading']); ?></h2>
	                    <?php endif; ?>
	                  </div>
	                  <div class="col-lg-3 text-center text-lg-right">
	                  	<?php if (( '' !== $settings['button'] ) && ( '' !== $settings['link_button'] ) && ( $settings['show_button'] )) : ?>
	                     <a href="<?php print wp_kses_post($settings['link_button']); ?>" class="boxed-btn"><span><?php print wp_kses_post($settings['button']); ?></span></a>
	                    <?php endif; ?>
	                  </div>
	               </div>
	            </div>
	         </div>
	         <div class="cta-overlay"></div>
	    </div>
	    <?php endif; ?>
	<?php
	}

}