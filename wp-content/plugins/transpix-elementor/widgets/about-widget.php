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
class BdevsAbout extends \Elementor\Widget_Base {

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
		return 'bdevs-about';
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
		return __( 'About', 'bdevs-elementor' );
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
		return [ 'about' ];
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
			'section_content_about',
			[
				'label' => esc_html__( 'About', 'bdevs-elementor' ),
			]	
		);

		$this->add_control(
			'chose_style',
			[
				'label'     => esc_html__( 'Chose Style', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'about_style_1'  => esc_html__( 'About Background', 'bdevs-elementor' ),
					'about_style_2' => esc_html__( 'About No Image Background', 'bdevs-elementor' ),
					'about_style_3' => esc_html__( 'About With List Style 1', 'bdevs-elementor' ),
					'about_style_4' => esc_html__( 'About With List Style 2', 'bdevs-elementor' ),
				],
				'default'   => 'about_style_1',
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
			'background_bg1',
			[
				'label'   => esc_html__( 'Custom Image', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add custom image from here', 'bdevs-elementor' ),
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
			'content',
			[
				'label'       => __( 'Content', 'bdevs-elementor' ),
				'type'        => Controls_Manager::WYSIWYG,
				'placeholder' => __( 'Enter your content', 'bdevs-elementor' ),
				'default'     => __( 'It is content', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_ceo',
			[
				'label' => esc_html__( 'CEO Details', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'background_bg2',
			[
				'label'   => esc_html__( 'Signature Image', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add image from here', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'name',
			[
				'label'       => __( 'Name', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter name', 'bdevs-elementor' ),
				'default'     => __( 'DAVID ANDERSON', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'info',
			[
				'label'       => __( 'Information', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter information', 'bdevs-elementor' ),
				'default'     => __( 'Founder & CEO', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_heading_3',
			[
				'label' => esc_html__( 'About With List Style 1', 'bdevs-elementor' ),
				'condition' => [
					'chose_style' => ['about_style_3']
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
						'name'       => 'title',
						'label'      => esc_html__( 'Title', 'bdevs-elementor' ),
						'type'       => Controls_Manager::TEXT,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Title', 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'       => 'content_2',
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
			'section_content_heading_4',
			[
				'label' => esc_html__( 'About With List Style 2', 'bdevs-elementor' ),
				'condition' => [
					'chose_style' => ['about_style_4']
				],
			]
		);

		$this->add_control(
			'tabs2',
			[
				'label' => esc_html__( 'List Items', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => [
					[
						'name'       => 'icon_4',
						'label'      => esc_html__( 'Icon', 'bdevs-elementor' ),
						'type'       => Controls_Manager::TEXT,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Icon', 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'       => 'title_4',
						'label'      => esc_html__( 'Title', 'bdevs-elementor' ),
						'type'       => Controls_Manager::TEXT,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Title', 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'       => 'content_4',
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
			'show_subheading',
			[
				'label'   => esc_html__( 'Show Subheading', 'bdevs-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
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
			'show_content',
			[
				'label'   => esc_html__( 'Show Content', 'bdevs-elementor' ),
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
		$bg_src1 = wp_get_attachment_image_src( $settings['background_bg1']['id'], 'full' );
		$bg_url1 = $bg_src1 ? $bg_src1[0] : ''; 
		$bg_src2 = wp_get_attachment_image_src( $settings['background_bg2']['id'], 'full' );
		$bg_url2 = $bg_src2 ? $bg_src2[0] : '';?>
		<?php if( $chose_style == 'about_style_1' ): ?>
        <div class="about-section about-bg" style="background-image: url(<?php print esc_url( $bg_url ); ?>);">
	         <div class="container">
	            <div class="row">
	               <div class="col-lg-5">
	                  <img class="ceo-pic" src="<?php print esc_url( $bg_url1 ); ?>" alt="">
	               </div>
	               <div class="col-lg-6 offset-lg-1">
	                  <div class="comment-content">
	                  	<?php if (( '' !== $settings['subheading'] ) && ( $settings['show_subheading'] )) : ?>
	                     <span class="title"><?php echo wp_kses_post($settings['subheading']); ?></span>
	                    <?php endif; ?>
	                    <?php if (( '' !== $settings['heading'] ) && ( $settings['show_heading'] )) : ?>
	                     <h2 class="subtitle"><?php echo wp_kses_post($settings['heading']); ?></h2>
	                    <?php endif; ?>
	                    <?php if (( '' !== $settings['content'] ) && ( $settings['show_content'] )) : ?>
	                     <p class="comment"><?php echo wp_kses_post($settings['content']); ?> </p>
	                    <?php endif; ?>
	                     <div class="ceo-details">
	                        <img src="<?php print esc_url( $bg_url2 ); ?>" alt="">
	                        <?php if ( '' !== $settings['name'] ) : ?>
	                        <h5><?php echo wp_kses_post($settings['name']); ?></h5>
	                        <?php endif; ?>
	                        <?php if ( '' !== $settings['info'] ) : ?>
	                        <span><?php echo wp_kses_post($settings['info']); ?></span>
	                        <?php endif; ?>
	                     </div>
	                  </div>
	               </div>
	            </div>
	         </div>
	         <div class="about-overlay"></div>
	     </div>
    	<?php elseif( $chose_style == 'about_style_2' ): ?>
        <div class="about-section home-2">
	         <div class="container">
	            <div class="row">
	               <div class="col-lg-5">
	                  <img class="ceo-pic" src="<?php print esc_url( $bg_url1 ); ?>">
	               </div>
	               <div class="col-lg-6 offset-lg-1">
	                  <div class="comment-content">
	                  	<?php if (( '' !== $settings['subheading'] ) && ( $settings['show_subheading'] )) : ?>
	                     <span class="title"><?php echo wp_kses_post($settings['subheading']); ?></span>
	                    <?php endif; ?>
	                    <?php if (( '' !== $settings['heading'] ) && ( $settings['show_heading'] )) : ?>
	                     <h2 class="subtitle"><?php echo wp_kses_post($settings['heading']); ?></h2>
	                    <?php endif; ?>
	                    <?php if (( '' !== $settings['content'] ) && ( $settings['show_content'] )) : ?>
	                    <?php echo wp_kses_post($settings['content']); ?>
	                    <?php endif; ?>
	                     <div class="ceo-details">
	                        <img src="<?php print esc_url( $bg_url2 ); ?>">
	                        <?php if ( '' !== $settings['name'] ) : ?>
	                        <h5><?php echo wp_kses_post($settings['name']); ?></h5>
	                        <?php endif; ?>
	                        <?php if ( '' !== $settings['info'] ) : ?>
	                        <span><?php echo wp_kses_post($settings['info']); ?></span>
	                        <?php endif; ?>
	                     </div>
	                  </div>
	               </div>
	            </div>
	         </div>
	     </div>
	     <?php elseif( $chose_style == 'about_style_3' ): ?>
	     <div class="about-section home-3">
	         <div class="container">
	            <div class="row">
	               <div class="col-lg-5">
	                  <div class="outer">
	                     <div class="inner">
	                        <div class="about-txt about-bg-3">
	                           <?php if (( '' !== $settings['subheading'] ) && ( $settings['show_subheading'] )) : ?>
			                     <span class="title"><?php echo wp_kses_post($settings['subheading']); ?></span>
			                   <?php endif; ?>
			                   <?php if (( '' !== $settings['heading'] ) && ( $settings['show_heading'] )) : ?>
			                     <h2 class="subtitle"><?php echo wp_kses_post($settings['heading']); ?></h2>
			                   <?php endif; ?>
	                           <?php if (( '' !== $settings['content'] ) && ( $settings['show_content'] )) : ?>
			                     <p><?php echo wp_kses_post($settings['content']); ?> </p>
			                   <?php endif; ?>
	                           <img src="<?php print esc_url( $bg_url2 ); ?>" alt="">
	                           <?php if ( '' !== $settings['name'] ) : ?>
		                       	<h5><?php echo wp_kses_post($settings['name']); ?></h5>
		                       <?php endif; ?>
		                       <?php if ( '' !== $settings['info'] ) : ?>
		                        <span><?php echo wp_kses_post($settings['info']); ?></span>
		                       <?php endif; ?>
	                        </div>
	                     </div>
	                  </div>
	               </div>
	               <div class="col-xl-5 offset-lg-1 col-lg-6">
	                  <div class="about-points">
	                  	<?php 
	                        foreach ( $settings['tabs'] as $item ) : 
						?>
	                     <div class="single-point">
	                        <div class="icon-wrapper"><i class="<?php print wp_kses_post($item['icon']); ?>"></i></div>
	                        <div class="point-txt">
	                           <h4><?php print wp_kses_post($item['title']); ?></h4>
	                           <p><?php print wp_kses_post($item['content_2']); ?></p>
	                        </div>
	                     </div>
	                 	<?php endforeach; ?>
	                  </div>
	               </div>
	            </div>
	         </div>
	      </div>
	      <style type="text/css">
	      	.about-bg-3::before{
	      		background-image: url(<?php print esc_url( $bg_url ); ?>);
	      	}
	      </style>
	      <?php elseif( $chose_style == 'about_style_4' ): ?>
	      <div class="about-section about">
	         <div class="container">
	            <div class="row">
	               <div class="col-xl-5 col-lg-6">
	                  <div class="outer">
	                     <div class="inner">
	                        <div class="about-txt">
	                        	<?php if (( '' !== $settings['subheading'] ) && ( $settings['show_subheading'] )) : ?>
			                     <span class="title"><?php echo wp_kses_post($settings['subheading']); ?></span>
			                    <?php endif; ?>
			                    <?php if (( '' !== $settings['heading'] ) && ( $settings['show_heading'] )) : ?>
			                     <h2 class="subtitle"><?php echo wp_kses_post($settings['heading']); ?></h2>
			                    <?php endif; ?>
			                    <?php if (( '' !== $settings['content'] ) && ( $settings['show_content'] )) : ?>
			                    <?php echo wp_kses_post($settings['content']); ?>
			                    <?php endif; ?>
	                           	<img src="<?php print esc_url( $bg_url2 ); ?>" alt="">
	                           	<?php if ( '' !== $settings['name'] ) : ?>
		                       	<h5><?php echo wp_kses_post($settings['name']); ?></h5>
		                       	<?php endif; ?>
		                       	<?php if ( '' !== $settings['info'] ) : ?>
		                        <span><?php echo wp_kses_post($settings['info']); ?></span>
		                       	<?php endif; ?>
	                        </div>
	                     </div>
	                  </div>
	               </div>
	               <div class="col-xl-6 offset-xl-1 col-lg-6">
	                  <div class="about-right-bg" style="background-image: url(<?php print esc_url( $bg_url ); ?>);">
	                  </div>
	               </div>
	            </div>
	            <div class="targets">
	               <div class="row">
               		<?php 
                        foreach ( $settings['tabs2'] as $item ) : 
					?>
	                  <div class="col-lg-6">
	                     <div class="box wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
	                        <div class="icon-wrapper"><i class="<?php print wp_kses_post($item['icon_4']); ?>"></i></div>
	                        <div class="box-details">
	                           <h4><?php print wp_kses_post($item['title_4']); ?></h4>
	                           <p><?php print wp_kses_post($item['content_4']); ?></p>
	                        </div>
	                     </div>
	                  </div>
	                <?php endforeach; ?>
	               </div>
	            </div>
	         </div>
	      </div>
    	  <?php endif; ?>
	<?php
	}

}