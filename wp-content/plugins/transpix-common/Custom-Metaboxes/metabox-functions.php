<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
$textdomain = "transpix";
function cmb_sample_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_cmb_';
	
  
   
    // Add other metaboxes as needed
    
    $meta_boxes[] = array(
        'id'         => 'post_setting',
        'title'      => 'Post Setting',
        'pages'      => array('post'), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        //'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox
        'fields' => array(
            array(
                'name' => 'Featured Image 2',
                'desc' => 'Show in sidebar',
                'id'   => $prefix . 'featured_image_2',
                'type'    => 'file',
            ),
            array(
                'name' => 'Featured Image 3',
                'desc' => 'Show in blog grid',
                'id'   => $prefix . 'featured_image_3',
                'type'    => 'file',
            ),
            array(
                'name' => 'Link facebook',
                'desc' => 'Input Link facebook',
                'id'   => $prefix . 'single_facebook',
                'type'    => 'text',
            ),
            array(
                'name' => 'Link twitter',
                'desc' => 'Input Link twitter',
                'id'   => $prefix . 'single_twitter',
                'type'    => 'text',
            ),
            array(
                'name' => 'Link pinterest',
                'desc' => 'Input Link pinterest',
                'id'   => $prefix . 'single_pinterest',
                'type'    => 'text',
            ),
        )
    );

    $meta_boxes[] = array(
        'id'         => 'service_setting',
        'title'      => 'Service Setting',
        'pages'      => array('service'), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        //'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox
        'fields' => array(
            array(
                'name' => 'Featured Image',
                'desc' => 'Show in service page and home page.',
                'id'   => $prefix . 'service_image',
                'type'    => 'file',
            ),
            array(
                'name' => 'Icon',
                'desc' => 'show in home page',
                'id'   => $prefix . 'icon_service',
                'type'    => 'text',
            ),
        )
    );

    $meta_boxes[] = array(
        'id'         => 'gallery_setting',
        'title'      => 'Gallery Setting',
        'pages'      => array('gallery'), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        //'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox
        'fields' => array(
            array(
                'name' => 'Masonry Image',
                'desc' => 'Show in masonry page and.',
                'id'   => $prefix . 'masonry_image',
                'type'    => 'file',
            ),
        )
    );

	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'init.php';

} 