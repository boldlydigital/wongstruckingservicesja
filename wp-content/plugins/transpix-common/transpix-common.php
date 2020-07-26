<?php
/**
* Plugin Name: Transpix Common
* Plugin URI: shtheme.com
* Description: A plugin to create custom post type, metabox...
* Version:  1.0
* Author: shtheme
* Author URI: shtheme.com
* License:  GPL2
*/
include dirname( __FILE__ ) . '/Custom-Metaboxes/metabox-functions.php';
include dirname( __FILE__ ) . '/ReduxFramework/ReduxCore/framework.php';
include dirname( __FILE__ ) . '/ReduxFramework/sample/sample-config.php';
include dirname( __FILE__ ) . '/custom-post-type/post_type.php';
return true;