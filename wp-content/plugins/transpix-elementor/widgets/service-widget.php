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
class BdevsService extends \Elementor\Widget_Base {

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
		return 'bdevs-service';
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
		return __( 'Service', 'bdevs-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Bdevs Service widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-post-content';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Bdevs Service widget belongs to.
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
		return [ 'service' ];
	}

	public function get_script_depends() {
		return [ 'bdevs-elementor'];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_content_service',
			[
				'label' => esc_html__( 'Service', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'chose_style',
			[
				'label'     => esc_html__( 'Chose Style', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'service_style_1'  => esc_html__( 'Service With Image Carousel', 'bdevs-elementor' ),
					'service_style_2' => esc_html__( 'Service With Icon', 'bdevs-elementor' ),
					'service_style_3' => esc_html__( 'Service With Image', 'bdevs-elementor' ),
				],
				'default'   => 'service_style_1',
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
			'post_number',
			[
				'label'     => esc_html__( 'Service Count', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your count', 'bdevs-elementor' ),
				'default'   => '6',
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

		$this->end_controls_section();

	}

	public function render() {

		$settings  = $this->get_settings_for_display(); 
		$chose_style = $settings['chose_style'];
		$order = $settings['post_order'];
		$post_number = $settings['post_number'];

	    $wp_query = new \WP_Query(array('posts_per_page' => $post_number,'post_type' => 'service',  'orderby' => 'ID', 'order' => 'ASC'));
	    

	    //other style
	    $args = array('posts_per_page' => $post_number,'post_type' => 'service',  'orderby' => 'ID', 'order' => 'ASC');

		?>
		<?php if( $chose_style == 'service_style_1' ): ?>
		<div class="service-section">
	         <div class="container">
	         	<?php if (( '' !== $settings['subheading'] ) && ( $settings['show_subheading'] )) : ?>
	            <span class="title"><?php echo wp_kses_post($settings['subheading']); ?></span>
	            <?php endif; ?>
	            <?php if (( '' !== $settings['heading'] ) && ( $settings['show_heading'] )) : ?>
	            <h2 class="subtitle"><?php echo wp_kses_post($settings['heading']); ?></h2>
	            <?php endif; ?>
	            <div class="service-carousel owl-carousel owl-theme">
	            	<?php 
                        $args = new \WP_Query(array(   
                                    'post_type' => 'service', 
                                ));  
                                while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
                    ?>
                    <?php $service_image = get_post_meta(get_the_ID(),'_cmb_service_image', true); ?>
	               <div class="single-service">
	                  <div class="img-wrapper">
	                     <img src="<?php echo esc_attr($service_image);?>" alt="">
	                  </div>
	                  <div class="service-txt">
	                     <h4 class="service-title"><?php the_title(); ?></h4>
	                     <p class="service-para">
	                     	<?php if(isset($transpix_redux_demo['service_excerpt'])){?>
                            <?php echo esc_attr(transpix1_excerpt($transpix_redux_demo['service_excerpt'])); ?>
                            <?php }else{?>
                            <?php echo esc_attr(transpix1_excerpt(30)); ?>
                            <?php } ?>
                          </p>
	                     <a href="<?php the_permalink(); ?>" class="readmore">
	                     	<?php if(isset($transpix_redux_demo['read_more'])){?>
                            <?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['read_more']));?>
                            <?php }else{?>
                            <?php echo esc_html__( 'Read More', 'transpix' );?>
                            <?php } ?> 	
                          </a>
	                  </div>
	               </div>
	               <?php   
				        endwhile; 
				        wp_reset_postdata();
				    ?>
	            </div>
	         </div>
	      </div>
        <?php elseif( $chose_style == 'service_style_2' ): ?>
        <div class="service-section home-3">
	         <div class="container">
	            <?php if (( '' !== $settings['subheading'] ) && ( $settings['show_subheading'] )) : ?>
	            <span class="title"><?php echo wp_kses_post($settings['subheading']); ?></span>
	            <?php endif; ?>
	            <?php if (( '' !== $settings['heading'] ) && ( $settings['show_heading'] )) : ?>
	            <h2 class="subtitle"><?php echo wp_kses_post($settings['heading']); ?></h2>
	            <?php endif; ?>
	            <div class="services">
	               <div class="row">
	               	<?php $i=0;
                        $args = new \WP_Query(array(   
                                    'post_type' => 'service', 
                                ));  
                                while ($wp_query -> have_posts()) : $wp_query -> the_post();
                                $i++; 
                    ?>
                    <?php $icon_service = get_post_meta(get_the_ID(),'_cmb_icon_service', true); ?>
                    <?php if($i == 1){ ?>
	                  <div class="col-lg-4 col-md-6">
	                     <div class="single-service wow fadeInUp" data-wow-duration="1.5s">
	                        <div class="icon-wrapper"><i class="<?php echo esc_attr($icon_service);?>"></i></div>
	                        <div class="service-txt">
	                           <h4 class="service-title"><?php the_title(); ?></h4>
	                           <p class="service-para">
	                           	<?php if(isset($transpix_redux_demo['service_excerpt'])){?>
	                            <?php echo esc_attr(transpix1_excerpt($transpix_redux_demo['service_excerpt'])); ?>
	                            <?php }else{?>
	                            <?php echo esc_attr(transpix1_excerpt(30)); ?>
	                            <?php } ?></p>
	                        </div>
	                     </div>
	                  </div>
	              	<?php }elseif($i == 2){ ?>
	                  <div class="col-lg-4 col-md-6">
	                     <div class="single-service wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".2s">
	                        <div class="icon-wrapper"><i class="<?php echo esc_attr($icon_service);?>"></i></div>
	                        <div class="service-txt">
	                           <h4 class="service-title"><?php the_title(); ?></h4>
	                           <p class="service-para">
	                           	<?php if(isset($transpix_redux_demo['service_excerpt'])){?>
	                            <?php echo esc_attr(transpix1_excerpt($transpix_redux_demo['service_excerpt'])); ?>
	                            <?php }else{?>
	                            <?php echo esc_attr(transpix1_excerpt(30)); ?>
	                            <?php } ?></p>
	                        </div>
	                     </div>
	                  </div>
	                  <?php }elseif($i == 3){ ?>
	                  <div class="col-lg-4 col-md-6">
	                     <div class="single-service wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".4s">
	                        <div class="icon-wrapper"><i class="<?php echo esc_attr($icon_service);?>"></i></div>
	                        <div class="service-txt">
	                           <h4 class="service-title"><?php the_title(); ?></h4>
	                           <p class="service-para">
	                           	<?php if(isset($transpix_redux_demo['service_excerpt'])){?>
	                            <?php echo esc_attr(transpix1_excerpt($transpix_redux_demo['service_excerpt'])); ?>
	                            <?php }else{?>
	                            <?php echo esc_attr(transpix1_excerpt(30)); ?>
	                            <?php } ?></p>
	                        </div>
	                     </div>
	                  </div>
	                  <?php }elseif($i == 4){ ?>
	                  <div class="col-lg-4 col-md-6">
	                     <div class="single-service wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".6s">
	                        <div class="icon-wrapper"><i class="<?php echo esc_attr($icon_service);?>"></i></div>
	                        <div class="service-txt">
	                           <h4 class="service-title"><?php the_title(); ?></h4>
	                           <p class="service-para">
	                           	<?php if(isset($transpix_redux_demo['service_excerpt'])){?>
	                            <?php echo esc_attr(transpix1_excerpt($transpix_redux_demo['service_excerpt'])); ?>
	                            <?php }else{?>
	                            <?php echo esc_attr(transpix1_excerpt(30)); ?>
	                            <?php } ?></p>
	                        </div>
	                     </div>
	                  </div>
	                  <?php }elseif($i == 5){ ?>
	                  <div class="col-lg-4 col-md-6">
	                     <div class="single-service wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".8s">
	                        <div class="icon-wrapper"><i class="<?php echo esc_attr($icon_service);?>"></i></div>
	                        <div class="service-txt">
	                           <h4 class="service-title"><?php the_title(); ?></h4>
	                           <p class="service-para">
	                           	<?php if(isset($transpix_redux_demo['service_excerpt'])){?>
	                            <?php echo esc_attr(transpix1_excerpt($transpix_redux_demo['service_excerpt'])); ?>
	                            <?php }else{?>
	                            <?php echo esc_attr(transpix1_excerpt(30)); ?>
	                            <?php } ?></p>
	                        </div>
	                     </div>
	                  </div>
	              	  <?php }else{ ?>
	                  <div class="col-lg-4 col-md-6">
	                     <div class="single-service wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1s">
	                        <div class="icon-wrapper"><i class="<?php echo esc_attr($icon_service);?>"></i></div>
	                        <div class="service-txt">
	                           <h4 class="service-title"><?php the_title(); ?></h4>
	                           <p class="service-para">
	                           	<?php if(isset($transpix_redux_demo['service_excerpt'])){?>
	                            <?php echo esc_attr(transpix1_excerpt($transpix_redux_demo['service_excerpt'])); ?>
	                            <?php }else{?>
	                            <?php echo esc_attr(transpix1_excerpt(30)); ?>
	                            <?php } ?></p>
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
	      </div>
	      <?php elseif( $chose_style == 'service_style_3' ): ?>
	      <div class="service-section services">
	         <div class="container">
	            <span class="title">Our Services</span>
	            <h2 class="subtitle">WHAT WE PROVIDE</h2>
	            <div class="row">
	            	<?php $i=0;
                        $args = new \WP_Query(array(   
                                    'post_type' => 'service', 
                                ));  
                                while ($wp_query -> have_posts()) : $wp_query -> the_post();
                                $i++; 
                    ?>
                    <?php $service_image = get_post_meta(get_the_ID(),'_cmb_service_image', true); ?>
                    <?php if($i == 1){ ?>
	               <div class="col-lg-4 col-md-6">
	                  <div class="single-service wow fadeInRight" data-wow-duration="1s">
	                     <div class="img-wrapper">
	                        <img src="<?php echo esc_attr($service_image);?>" alt="">
	                     </div>
	                     <div class="service-txt">
	                        <h4 class="service-title"><?php the_title(); ?></h4>
	                        <p class="service-para">
	                           	<?php if(isset($transpix_redux_demo['service_excerpt'])){?>
	                            <?php echo esc_attr(transpix1_excerpt($transpix_redux_demo['service_excerpt'])); ?>
	                            <?php }else{?>
	                            <?php echo esc_attr(transpix1_excerpt(30)); ?>
	                            <?php } ?></p>
	                        <a href="<?php the_permalink(); ?>" class="readmore">
		                     	<?php if(isset($transpix_redux_demo['read_more'])){?>
	                            <?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['read_more']));?>
	                            <?php }else{?>
	                            <?php echo esc_html__( 'Read More', 'transpix' );?>
	                            <?php } ?> 	
	                        </a>
	                     </div>
	                  </div>
	               </div>
	               <?php }elseif($i == 2){ ?>
	               <div class="col-lg-4 col-md-6">
	                  <div class="single-service wow fadeInRight" data-wow-duration="1s" data-wow-delay=".2s">
	                     <div class="img-wrapper">
	                        <img src="<?php echo esc_attr($service_image);?>" alt="">
	                     </div>
	                     <div class="service-txt">
	                        <h4 class="service-title"><?php the_title(); ?></h4>
	                        <p class="service-para">
	                           	<?php if(isset($transpix_redux_demo['service_excerpt'])){?>
	                            <?php echo esc_attr(transpix1_excerpt($transpix_redux_demo['service_excerpt'])); ?>
	                            <?php }else{?>
	                            <?php echo esc_attr(transpix1_excerpt(30)); ?>
	                            <?php } ?></p>
	                        <a href="<?php the_permalink(); ?>" class="readmore">
		                     	<?php if(isset($transpix_redux_demo['read_more'])){?>
	                            <?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['read_more']));?>
	                            <?php }else{?>
	                            <?php echo esc_html__( 'Read More', 'transpix' );?>
	                            <?php } ?> 	
	                        </a>
	                     </div>
	                  </div>
	               </div>
	               <?php }elseif($i == 3){ ?>
	               <div class="col-lg-4 col-md-6">
	                  <div class="single-service wow fadeInRight" data-wow-duration="1s" data-wow-delay=".4s">
	                     <div class="img-wrapper">
	                        <img src="<?php echo esc_attr($service_image);?>" alt="">
	                     </div>
	                     <div class="service-txt">
	                        <h4 class="service-title"><?php the_title(); ?></h4>
	                        <p class="service-para">
	                           	<?php if(isset($transpix_redux_demo['service_excerpt'])){?>
	                            <?php echo esc_attr(transpix1_excerpt($transpix_redux_demo['service_excerpt'])); ?>
	                            <?php }else{?>
	                            <?php echo esc_attr(transpix1_excerpt(30)); ?>
	                            <?php } ?></p>
	                        <a href="<?php the_permalink(); ?>" class="readmore">
		                     	<?php if(isset($transpix_redux_demo['read_more'])){?>
	                            <?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['read_more']));?>
	                            <?php }else{?>
	                            <?php echo esc_html__( 'Read More', 'transpix' );?>
	                            <?php } ?> 	
	                        </a>
	                     </div>
	                  </div>
	               </div>
	               <?php }elseif($i == 4){ ?>
	               <div class="col-lg-4 col-md-6">
	                  <div class="single-service wow fadeInRight" data-wow-duration="1s">
	                     <div class="img-wrapper">
	                        <img src="<?php echo esc_attr($service_image);?>" alt="">
	                     </div>
	                     <div class="service-txt">
	                        <h4 class="service-title"><?php the_title(); ?></h4>
	                        <p class="service-para">
	                           	<?php if(isset($transpix_redux_demo['service_excerpt'])){?>
	                            <?php echo esc_attr(transpix1_excerpt($transpix_redux_demo['service_excerpt'])); ?>
	                            <?php }else{?>
	                            <?php echo esc_attr(transpix1_excerpt(30)); ?>
	                            <?php } ?></p>
	                        <a href="<?php the_permalink(); ?>" class="readmore">
		                     	<?php if(isset($transpix_redux_demo['read_more'])){?>
	                            <?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['read_more']));?>
	                            <?php }else{?>
	                            <?php echo esc_html__( 'Read More', 'transpix' );?>
	                            <?php } ?> 	
	                        </a>
	                     </div>
	                  </div>
	               </div>
	               <?php }elseif($i == 5){ ?>
	               <div class="col-lg-4 col-md-6">
	                  <div class="single-service wow fadeInRight" data-wow-duration="1s" data-wow-delay=".2s">
	                     <div class="img-wrapper">
	                        <img src="<?php echo esc_attr($service_image);?>" alt="">
	                     </div>
	                     <div class="service-txt">
	                        <h4 class="service-title"><?php the_title(); ?></h4>
	                        <p class="service-para">
	                           	<?php if(isset($transpix_redux_demo['service_excerpt'])){?>
	                            <?php echo esc_attr(transpix1_excerpt($transpix_redux_demo['service_excerpt'])); ?>
	                            <?php }else{?>
	                            <?php echo esc_attr(transpix1_excerpt(30)); ?>
	                            <?php } ?></p>
	                        <a href="<?php the_permalink(); ?>" class="readmore">
		                     	<?php if(isset($transpix_redux_demo['read_more'])){?>
	                            <?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['read_more']));?>
	                            <?php }else{?>
	                            <?php echo esc_html__( 'Read More', 'transpix' );?>
	                            <?php } ?> 	
	                        </a>
	                     </div>
	                  </div>
	               </div>
	               <?php }else{ ?>
	               <div class="col-lg-4 col-md-6">
	                  <div class="single-service wow fadeInRight" data-wow-duration="1s" data-wow-delay=".4s">
	                     <div class="img-wrapper">
	                        <img src="<?php echo esc_attr($service_image);?>" alt="">
	                     </div>
	                     <div class="service-txt">
	                        <h4 class="service-title"><?php the_title(); ?></h4>
	                        <p class="service-para">
	                           	<?php if(isset($transpix_redux_demo['service_excerpt'])){?>
	                            <?php echo esc_attr(transpix1_excerpt($transpix_redux_demo['service_excerpt'])); ?>
	                            <?php }else{?>
	                            <?php echo esc_attr(transpix1_excerpt(30)); ?>
	                            <?php } ?></p>
	                        <a href="<?php the_permalink(); ?>" class="readmore">
		                     	<?php if(isset($transpix_redux_demo['read_more'])){?>
	                            <?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['read_more']));?>
	                            <?php }else{?>
	                            <?php echo esc_html__( 'Read More', 'transpix' );?>
	                            <?php } ?> 	
	                        </a>
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
        <?php endif; ?>
	<?php
	}

}