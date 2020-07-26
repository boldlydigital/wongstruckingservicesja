<?php
/*
 * Template Name: Home 3
 * Description: A Page Template with a Page Builder design.
 */
$transpix_redux_demo = get_option('redux_demo');
   get_header('3'); ?>
<?php if (have_posts()){ ?>
   <?php while (have_posts()) : the_post()?>
      <?php the_content(); ?>
   <?php endwhile; ?>
<?php }else {
   echo esc_html__( 'Page Canvas For Page Builder', 'transpix' );
}?>
<?php
   get_footer();
?>