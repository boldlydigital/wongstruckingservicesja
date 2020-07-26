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
class BdevsFAQ extends \Elementor\Widget_Base {

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
		return 'bdevs-faq';
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
		return __( 'FAQ', 'bdevs-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Bdevs FAQ widget icon.
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
	 * Retrieve the list of categories the Bdevs FAQ widget belongs to.
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
		return [ 'faq' ];
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
				'label' => esc_html__( 'FAQ', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'chose_style',
			[
				'label'     => esc_html__( 'Chose Style', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'faq_style_1'  => esc_html__( 'FAQ Style 1', 'bdevs-elementor' ),
					'faq_style_2' => esc_html__( 'FAQ Style 2', 'bdevs-elementor' ),
				],
				'default'   => 'faq_style_1',
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

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_target',
			[
				'label' => esc_html__( 'Target', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'tabs',
			[
				'label' => esc_html__( 'Target Items', 'bdevs-elementor' ),
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
						'name'       => 'title',
						'label'      => esc_html__( 'Title', 'bdevs-elementor' ),
						'type'       => Controls_Manager::TEXT,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Title', 'bdevs-elementor' ),
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

		$this->start_controls_section(
			'section_content_faq',
			[
				'label' => esc_html__( 'FAQ', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'tabs2',
			[
				'label' => esc_html__( 'FAQ Items', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => [
					[
						'name'       => 'delay_2',
						'label'      => esc_html__( 'Time Delay', 'bdevs-elementor' ),
						'type'       => Controls_Manager::TEXT,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( '#s', 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'       => 'id_question',
						'label'      => esc_html__( 'ID Question', 'bdevs-elementor' ),
						'type'       => Controls_Manager::TEXT,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( '', 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'       => 'question',
						'label'      => esc_html__( 'Question', 'bdevs-elementor' ),
						'type'       => Controls_Manager::TEXT,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Question', 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'       => 'answer',
						'label'      => esc_html__( 'Answer', 'bdevs-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Answer', 'bdevs-elementor' ),
						'label_block' => true,
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
		extract($settings);	
		$chose_style = $settings['chose_style'];	
	   	?>
	   	<?php if( $chose_style == 'faq_style_1' ): ?>
	   	<div class="faq-section">
	         <div class="container">
	            <div class="row">
	               <div class="col-xl-6 col-lg-7">
	                  <div class="targets">
	                  	<?php 
	                        foreach ( $settings['tabs'] as $item ) : 
						?>
	                     <div class="box wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="<?php print wp_kses_post($item['delay']); ?>">
	                        <div class="icon-wrapper"><i class="<?php print wp_kses_post($item['icon']); ?>"></i></div>
	                        <div class="box-details">
	                        <?php if ( '' !== $item['title'] ) : ?>
	                           <h4><?php print wp_kses_post($item['title']); ?></h4>
	                        <?php endif; ?>
	                        <?php if ( '' !== $item['content'] ) : ?>
	                           <p><?php print wp_kses_post($item['content']); ?></p>
	                        <?php endif; ?>
	                        </div>
	                     </div>
	                 	<?php endforeach; ?>
	                  </div>
	               </div>
	               <div class="offset-xl-1 col-xl-5 col-lg-5 faqs">
	               	<?php if (( '' !== $settings['subheading'] ) && ( $settings['show_subheading'] )) : ?>
	                  <span class="title"><?php echo wp_kses_post($settings['subheading']); ?></span>
	                <?php endif; ?>
	                <?php if (( '' !== $settings['heading'] ) && ( $settings['show_heading'] )) : ?>
	                  <h2 class="subtitle"><?php echo wp_kses_post($settings['heading']); ?></h2>
	                <?php endif; ?>
	                  <div class="accordion" id="accordionExample">
	                  	<?php 
	                        foreach ( $settings['tabs2'] as $item ) : 
						?>
	                     <div class="card wow fadeInUp" data-wow-duration="1s" data-wow-delay="<?php print wp_kses_post($item['delay_2']); ?>">
	                        <div class="card-header" id="heading<?php print wp_kses_post($item['id_question']); ?>">
	                        <?php if ( '' !== $item['question'] ) : ?>
	                           <h2 class="mb-0">
	                              <button class="btn btn-link collapsed btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse<?php print wp_kses_post($item['id_question']); ?>" aria-expanded="false" aria-controls="collapse<?php print wp_kses_post($item['id_question']); ?>">
	                              <?php print wp_kses_post($item['question']); ?>
	                              </button>
	                           </h2>
	                        <?php endif; ?>
	                        </div>
	                        <div id="collapse<?php print wp_kses_post($item['id_question']); ?>" class="collapse" aria-labelledby="heading<?php print wp_kses_post($item['id_question']); ?>" data-parent="#accordionExample">
	                        <?php if ( '' !== $item['answer'] ) : ?>
	                           <div class="card-body">
	                              <?php print wp_kses_post($item['answer']); ?> 
	                           </div>
	                        <?php endif; ?>
	                        </div>
	                     </div>
	                 	<?php endforeach; ?>
	                  </div>
	               </div>
	            </div>
	         </div>
	      </div>
        <?php elseif( $chose_style == 'faq_style_2' ): ?>
        <section class="banner banner__bg pt-75 pb-75" data-background="<?php print esc_url( $bg_url ); ?>">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-6 col-md-9">
                        <div class="banner__content">
                        	<?php if (( '' !== $settings['heading'] ) && ( $settings['show_heading'] )) : ?>
                            <h2 class="f-700 white-color mb-15"><?php echo wp_kses_post($settings['heading']); ?></h2>
                            <?php endif; ?>
                            <?php if (( '' !== $settings['message'] ) && ( $settings['show_message'] )) : ?>
                            <h3 class="f-600 white-color mb-25"><?php echo wp_kses_post($settings['message']); ?></h3>
                            <?php endif; ?>
                            <?php if (( '' !== $settings['button'] ) && ( $settings['show_button'] )) : ?>
                        	<a href="<?php echo wp_kses_post($settings['link_button']); ?>" class="btn black-color grad-bg-white position-relative"><?php echo wp_kses_post($settings['button']); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>
	<?php
	}

}