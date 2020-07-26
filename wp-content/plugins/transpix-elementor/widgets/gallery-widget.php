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
class BdevsGallery extends \Elementor\Widget_Base {

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
		return 'bdevs-galerry';
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
		return __( 'Gallery', 'bdevs-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Bdevs Galerry widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Bdevs Galerry widget belongs to.
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
		return [ 'galerry' ];
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
				'label' => esc_html__( 'Gallery', 'bdevs-elementor' ),
			]	
		);

		$this->add_control(
			'chose_style',
			[
				'label'     => esc_html__( 'Chose Style', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'gallery_style_1'  => esc_html__( 'Gallery grid', 'bdevs-elementor' ),
					'gallery_style_2' => esc_html__( 'Gallery Masonry', 'bdevs-elementor' ),
				],
				'default'   => 'gallery_style_1',
			]
		);

		$this->add_control(
			'post_order',
			[
				'label'     => esc_html__( 'Post Order', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'asc'  => esc_html__( 'ASC', 'bdevs-elementor' ),
					'desc' => esc_html__( 'DESC', 'bdevs-elementor' ),
				],
				'default'   => 'desc',
			]
		);	

		$this->add_control(
			'post_number',
			[
				'label'     => esc_html__( 'Post Count', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your count', 'bdevs-elementor' ),
				'default'   => '9',
				'label_block' => true,
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
		$chose_style = $settings['chose_style'];
		$post_order = $settings['post_order'];
		$post_number = $settings['post_number'];

	    $wp_query = new \WP_Query(array('posts_per_page' => $post_number,'post_type' => 'gallery',  'orderby' => 'ID', 'order' => 'ASC'));
	    

	    //other style
	    $args = array('posts_per_page' => $post_number,'post_type' => 'gallery',  'orderby' => 'ID', 'order' => 'ASC');?>
	    <?php if( $chose_style == 'gallery_style_1' ): ?>
		
        <div class="gallery-section blog-grid">
         <div class="container">
            <div class="row">
            	<?php $i=0;
                    $args = new \WP_Query(array(   
                                'post_type' => 'gallery', 
                            ));  
                            while ($wp_query -> have_posts()) : $wp_query -> the_post();
                            $i++; 
                ?>
                <?php if($i % 3 == 1){ ?>
                <div class="col-lg-4 col-md-6">
                  <div class="single-pic wow fadeInRight" data-wow-duration="1.5s">
                     <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="">
                     <div class="single-pic-overlay"></div>
                     <div class="txt-icon">
                        <div class="outer">
                           <div class="inner">
                              <h4><?php the_title(); ?></h4>
                              <a class="icon-wrapper" href="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" data-lightbox="single-pic" data-title="<?php the_title(); ?>">
                              <i class="fas fa-search-plus"></i>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
           		<?php }elseif($i % 3 == 2){ ?>
           		<div class="col-lg-4 col-md-6">
                  <div class="single-pic wow fadeInRight" data-wow-duration="1.5s" data-wow-delay=".2s">
                     <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="">
                     <div class="single-pic-overlay"></div>
                     <div class="txt-icon">
                        <div class="outer">
                           <div class="inner">
                              <h4><?php the_title(); ?></h4>
                              <a class="icon-wrapper" href="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" data-lightbox="single-pic" data-title="<?php the_title(); ?>">
                              <i class="fas fa-search-plus"></i>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
           		<?php }else{ ?>
           		<div class="col-lg-4 col-md-6">
                  <div class="single-pic wow fadeInRight" data-wow-duration="1.5s" data-wow-delay=".4s">
                     <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="">
                     <div class="single-pic-overlay"></div>
                     <div class="txt-icon">
                        <div class="outer">
                           <div class="inner">
                              <h4><?php the_title(); ?></h4>
                              <a class="icon-wrapper" href="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" data-lightbox="single-pic" data-title="<?php the_title(); ?>">
                              <i class="fas fa-search-plus"></i>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
           		<?php } ?>
               <?php   
			        endwhile; 
			        wp_reset_postdata();
			    ?>
            </div>
         </div>
      </div>
      <?php elseif( $chose_style == 'gallery_style_2' ): ?>
      <div class="gallery-section masonry clearfix">
         <div class="container">
            <div class="grid">
               <div class="grid-sizer"></div>
               <?php
                    $args = new \WP_Query(array(   
                                'post_type' => 'gallery', 
                            ));  
                            while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
                ?>
                <?php $masonry_image = get_post_meta(get_the_ID(),'_cmb_masonry_image', true); ?>
               <div class="single-pic wow zoomIn" data-wow-duration="1s">
                  <img src="<?php echo esc_attr($masonry_image);?>" alt="">
                  <div class="single-pic-overlay"></div>
                  <div class="txt-icon">
                     <div class="outer">
                        <div class="inner">
                           <h4><?php the_title(); ?></h4>
                           <a class="icon-wrapper" href="<?php echo esc_attr($masonry_image);?>" data-lightbox="single-pic" data-title="<?php the_title(); ?>">
                           <i class="fas fa-search-plus"></i>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
               <?php   
			        endwhile; 
			        wp_reset_postdata();
			    ?>
            </div>
         </div>
      </div>
      <?php endif; ?>
	<?php
	}

}