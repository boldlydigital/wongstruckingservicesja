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
class BdevsBlogPost extends \Elementor\Widget_Base {

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
		return 'bdevs-blog-post';
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
		return __( 'Blog', 'bdevs-elementor' );
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
		return 'eicon-post-content';
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
		return [ 'blog-post' ];
	}

	public function get_script_depends() {
		return [ 'bdevs-elementor'];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section_content_heading',
			[
				'label' => esc_html__( 'Blog', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'subheading',
			[
				'label'       => __( 'Subheading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'It is subheading', 'bdevs-elementor' ),
				'placeholder' => __( 'Enter your subheading here...', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'heading',
			[
				'label'       => __( 'Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => __( 'It is heading', 'bdevs-elementor' ),
				'placeholder' => __( 'Enter your heading here...', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	

		$this->add_control(
			'post_number',
			[
				'label'     => esc_html__( 'Post Count', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your count', 'bdevs-elementor' ),
				'default'   => '3',
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
		extract($settings);
		$post_number = $settings['post_number'];

	    $wp_query = new \WP_Query(array('posts_per_page' => $post_number,'post_type' => 'post',  'orderby' => 'ID', 'order' => 'ASC'));
	   
	    //other style
	    $args = array('posts_per_page' => $post_number,'post_type' => 'post',  'orderby' => 'ID', 'order' => 'ASC'); ?>

	    <div class="news-section">
     	  <div class="container">
     	  	<?php if (( '' !== $settings['subheading'] ) && ( $settings['show_subheading'] )) : ?>
            <span class="title"><?php print wp_kses_post($settings['subheading']); ?></span>
        	<?php endif; ?>
            <?php if (( '' !== $settings['heading'] ) && ( $settings['show_heading'] )) : ?>
            <h2 class="subtitle"><?php print wp_kses_post($settings['heading']); ?></h2>
            <?php endif; ?>
            <div class="row">
            	<?php
	                $args = new \WP_Query(array(   
	                            'post_type' => 'post', 
	                        ));  
	                        while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
	            ?>
	            <?php $featured_image_3 = get_post_meta(get_the_ID(),'_cmb_featured_image_3', true); ?>
               	<div class="col-lg-4 col-md-6">
                  <div class="single-news wow fadeInRight" data-wow-duration="1.5s" data-wow-delay=".2s">
                     <img src="<?php echo esc_attr($featured_image_3);?>">
                     <div class="news-txt">
                        <span class="date"><?php the_time(get_option( 'date_format' ));?>  -  
	                	  <?php if(isset($transpix_redux_demo['blog_by'])){?>
	                      <?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['blog_by']));?>
	                      <?php }else{?>
	                      <?php echo esc_html__( 'BY ', 'transpix' );?>
	                      <?php } ?> <?php the_author_posts_link(); ?></span>
                        <a href="<?php the_permalink(); ?>" class="title">
                           <h3><?php the_title();?></h3>
                        </a>
                        <a class="readmore" href="<?php the_permalink(); ?>">
                        	<?php if(isset($transpix_redux_demo['read_more'])){?>
                            <?php echo wp_specialchars_decode(esc_attr($transpix_redux_demo['read_more']));?>
                            <?php }else{?>
                            <?php echo esc_html__( 'Read More', 'transpix' );?>
                            <?php } ?>
                        </a>
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
	<?php
	}
}