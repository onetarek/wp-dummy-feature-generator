<?php
/*
Plugin Name: WP Dummy Feature Generator
Description: Adds custom post types, taxonomies and other features to test.
Plugin URI: http://onetarek.com
Author: oneTarek
Author URI: http://onetarek.com
Version: 1.0.0
*/ 


//Don't allow direct access
if( ! defined( 'ABSPATH' ) ) exit;

define( 'WPDFG_VERSION', '1.0.0' ); // Plugin Directory with trailing slash
define( 'WPDFG_PLUGIN_DIR', plugin_dir_path( __FILE__ ) ); // Plugin Directory
define( 'WPDFG_PLUGIN_URL', plugin_dir_url( __FILE__ ) ); // with forward slash (/). Plugin URL (for http requests).


if( ! class_exists( 'WP_Dummy_Feature_Generator' ) ) :
/**
 * Main WP_Dummy_Feature_Generator Class.
 *
 * @since 2.0.0
 */
final class WP_Dummy_Feature_Generator {
	
    
	/**
	 * @var WP_Dummy_Feature_Generator The one true WP_Dummy_Feature_Generator
	 * @since 2.0.0
	 */
	private static $instance;
	
	public $post_type_taxonomy_manager;

	public static function instance() {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof WP_Dummy_Feature_Generator ) )
		{
			self::$instance = new self();
			
		}
		return self::$instance;
	}
	
	/**
     * Private constructor so nobody else can instance it
     *
     */
    private function __construct() {

    	require_once( WPDFG_PLUGIN_DIR . 'includes/class-wpdfg-post-type-taxonomy-manager.php');
    	
		$this->post_type_taxonomy_manager = WPDFG_Post_Type_Taxonomy_Manager::instance();
	}
		

}//end class

endif;

function wp_dummy_feature_generator() {
	return WP_Dummy_Feature_Generator::instance();
}

// Get WP_Dummy_Feature_Generator Running.
wp_dummy_feature_generator();
