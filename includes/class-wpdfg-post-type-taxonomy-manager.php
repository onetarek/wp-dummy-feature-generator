<?php 
//Don't allow direct access
if( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists( 'WPDFG_Post_Type_Taxonomy_Manager' ) ) :

final class WPDFG_Post_Type_Taxonomy_Manager {
	
	private static $instance;
	
	public $rendered = false;
	
	public static function instance() {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof WPDFG_Post_Type_Taxonomy_Manager ) )
		{
			self::$instance = new self();
			
		}
		return self::$instance;
	}
	
    private function __construct() {
    	
    	add_action( 'init', array( $this, 'add_post_types' ), 0 );
    	add_action( 'init', array( $this, 'add_taxonomies' ), 0 );

    }

    // Register Custom Post Types
	public function add_post_types() {

		$labels = array(
			'name'                  => _x( 'DFG Books', 'Post Type General Name', 'wp-dummy-feature-generator' ),
			'singular_name'         => _x( 'DFG Book', 'Post Type Singular Name', 'wp-dummy-feature-generator' ),
			'menu_name'             => __( 'DFG Books', 'wp-dummy-feature-generator' ),
			'name_admin_bar'        => __( 'DFG Book', 'wp-dummy-feature-generator' ),
			'archives'              => __( 'DFG Book Archives', 'wp-dummy-feature-generator' ),
			'attributes'            => __( 'DFG Book Attributes', 'wp-dummy-feature-generator' ),
			'parent_item_colon'     => __( 'Parent DFG Book:', 'wp-dummy-feature-generator' ),
			'all_items'             => __( 'All DFG Books', 'wp-dummy-feature-generator' ),
			'add_new_item'          => __( 'Add New DFG Book', 'wp-dummy-feature-generator' ),
			'add_new'               => __( 'Add New DFG Book', 'wp-dummy-feature-generator' ),
			'new_item'              => __( 'New DFG Book', 'wp-dummy-feature-generator' ),
			'edit_item'             => __( 'Edit DFG Book', 'wp-dummy-feature-generator' ),
			'update_item'           => __( 'Update DFG Book', 'wp-dummy-feature-generator' ),
			'view_item'             => __( 'View DFG Book', 'wp-dummy-feature-generator' ),
			'view_items'            => __( 'View DFG Books', 'wp-dummy-feature-generator' ),
			'search_items'          => __( 'Search DFG Book', 'wp-dummy-feature-generator' ),
			'not_found'             => __( 'Not found', 'wp-dummy-feature-generator' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'wp-dummy-feature-generator' ),
			'featured_image'        => __( 'Featured Image', 'wp-dummy-feature-generator' ),
			'set_featured_image'    => __( 'Set featured image', 'wp-dummy-feature-generator' ),
			'remove_featured_image' => __( 'Remove featured image', 'wp-dummy-feature-generator' ),
			'use_featured_image'    => __( 'Use as featured image', 'wp-dummy-feature-generator' ),
			'insert_into_item'      => __( 'Insert into item', 'wp-dummy-feature-generator' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'wp-dummy-feature-generator' ),
			'items_list'            => __( 'DFG Books list', 'wp-dummy-feature-generator' ),
			'items_list_navigation' => __( 'DFG Books list navigation', 'wp-dummy-feature-generator' ),
			'filter_items_list'     => __( 'Filter DFG books list', 'wp-dummy-feature-generator' ),
		);
		$args = array(
			'label'                 => __( 'DFG Book', 'wp-dummy-feature-generator' ),
			'description'           => __( 'Information of DFG Book', 'wp-dummy-feature-generator' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail' ),
			'taxonomies'            => array( 'wpdfg_book_category' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		
		register_post_type( 'wpdfg_book', $args );


		$labels = array(
			'name'                  => _x( 'DFG Portfolios', 'Post Type General Name', 'wp-dummy-feature-generator' ),
			'singular_name'         => _x( 'DFG Portfolio', 'Post Type Singular Name', 'wp-dummy-feature-generator' ),
			'menu_name'             => __( 'DFG Portfolios', 'wp-dummy-feature-generator' ),
			'name_admin_bar'        => __( 'DFG Portfolio', 'wp-dummy-feature-generator' ),
			'archives'              => __( 'DFG Portfolio Archives', 'wp-dummy-feature-generator' ),
			'attributes'            => __( 'DFG Portfolio Attributes', 'wp-dummy-feature-generator' ),
			'parent_item_colon'     => __( 'Parent DFG Portfolio:', 'wp-dummy-feature-generator' ),
			'all_items'             => __( 'All DFG Portfolios', 'wp-dummy-feature-generator' ),
			'add_new_item'          => __( 'Add New DFG Portfolio', 'wp-dummy-feature-generator' ),
			'add_new'               => __( 'Add New DFG Portfolio', 'wp-dummy-feature-generator' ),
			'new_item'              => __( 'New DFG Portfolio', 'wp-dummy-feature-generator' ),
			'edit_item'             => __( 'Edit DFG Portfolio', 'wp-dummy-feature-generator' ),
			'update_item'           => __( 'Update DFG Portfolio', 'wp-dummy-feature-generator' ),
			'view_item'             => __( 'View DFG Portfolio', 'wp-dummy-feature-generator' ),
			'view_items'            => __( 'View DFG Portfolios', 'wp-dummy-feature-generator' ),
			'search_items'          => __( 'Search DFG Portfolio', 'wp-dummy-feature-generator' ),
			'not_found'             => __( 'Not found', 'wp-dummy-feature-generator' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'wp-dummy-feature-generator' ),
			'featured_image'        => __( 'Featured Image', 'wp-dummy-feature-generator' ),
			'set_featured_image'    => __( 'Set featured image', 'wp-dummy-feature-generator' ),
			'remove_featured_image' => __( 'Remove featured image', 'wp-dummy-feature-generator' ),
			'use_featured_image'    => __( 'Use as featured image', 'wp-dummy-feature-generator' ),
			'insert_into_item'      => __( 'Insert into item', 'wp-dummy-feature-generator' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'wp-dummy-feature-generator' ),
			'items_list'            => __( 'DFG Portfolios list', 'wp-dummy-feature-generator' ),
			'items_list_navigation' => __( 'DFG Portfolios list navigation', 'wp-dummy-feature-generator' ),
			'filter_items_list'     => __( 'Filter DFG portfolios list', 'wp-dummy-feature-generator' ),
		);
		$args = array(
			'label'                 => __( 'DFG Portfolio', 'wp-dummy-feature-generator' ),
			'description'           => __( 'Information of DFG Portfolio', 'wp-dummy-feature-generator' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail' ),
			'taxonomies'            => array( 'wpdfg_portfolio_category' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'wpdfg_portfolio', $args );

	}

	
	// Register Custom Taxonomies
	public function add_taxonomies() {

		$labels = array(
			'name'                       => _x( 'DFG Book Categories', 'Taxonomy General Name', 'wp-dummy-feature-generator' ),
			'singular_name'              => _x( 'DFG Book Category', 'Taxonomy Singular Name', 'wp-dummy-feature-generator' ),
			'menu_name'                  => __( 'DFG Book Category', 'wp-dummy-feature-generator' ),
			'all_items'                  => __( 'All DFG Book Categories', 'wp-dummy-feature-generator' ),
			'parent_item'                => __( 'Parent Category', 'wp-dummy-feature-generator' ),
			'parent_item_colon'          => __( 'Parent Category:', 'wp-dummy-feature-generator' ),
			'new_item_name'              => __( 'New Category Name', 'wp-dummy-feature-generator' ),
			'add_new_item'               => __( 'Add New Category', 'wp-dummy-feature-generator' ),
			'edit_item'                  => __( 'Edit Category', 'wp-dummy-feature-generator' ),
			'update_item'                => __( 'Update Category', 'wp-dummy-feature-generator' ),
			'view_item'                  => __( 'View Category', 'wp-dummy-feature-generator' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'wp-dummy-feature-generator' ),
			'add_or_remove_items'        => __( 'Add or remove categories', 'wp-dummy-feature-generator' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'wp-dummy-feature-generator' ),
			'popular_items'              => __( 'Popular Categories', 'wp-dummy-feature-generator' ),
			'search_items'               => __( 'Search Items', 'wp-dummy-feature-generator' ),
			'not_found'                  => __( 'Not Found', 'wp-dummy-feature-generator' ),
			'no_terms'                   => __( 'No items', 'wp-dummy-feature-generator' ),
			'items_list'                 => __( 'Items list', 'wp-dummy-feature-generator' ),
			'items_list_navigation'      => __( 'Items list navigation', 'wp-dummy-feature-generator' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true
		);
		
		register_taxonomy( 'wpdfg_book_category', array( 'wpdfg_book' ), $args );


		$labels = array(
			'name'                       => _x( 'DFG Portfolio Categories', 'Taxonomy General Name', 'wp-dummy-feature-generator' ),
			'singular_name'              => _x( 'DFG Portfolio Category', 'Taxonomy Singular Name', 'wp-dummy-feature-generator' ),
			'menu_name'                  => __( 'DFG Portfolio Category', 'wp-dummy-feature-generator' ),
			'all_items'                  => __( 'All DFG Portfolio Categories', 'wp-dummy-feature-generator' ),
			'parent_item'                => __( 'Parent Category', 'wp-dummy-feature-generator' ),
			'parent_item_colon'          => __( 'Parent Category:', 'wp-dummy-feature-generator' ),
			'new_item_name'              => __( 'New Category Name', 'wp-dummy-feature-generator' ),
			'add_new_item'               => __( 'Add New Category', 'wp-dummy-feature-generator' ),
			'edit_item'                  => __( 'Edit Category', 'wp-dummy-feature-generator' ),
			'update_item'                => __( 'Update Category', 'wp-dummy-feature-generator' ),
			'view_item'                  => __( 'View Category', 'wp-dummy-feature-generator' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'wp-dummy-feature-generator' ),
			'add_or_remove_items'        => __( 'Add or remove categories', 'wp-dummy-feature-generator' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'wp-dummy-feature-generator' ),
			'popular_items'              => __( 'Popular Categories', 'wp-dummy-feature-generator' ),
			'search_items'               => __( 'Search Items', 'wp-dummy-feature-generator' ),
			'not_found'                  => __( 'Not Found', 'wp-dummy-feature-generator' ),
			'no_terms'                   => __( 'No items', 'wp-dummy-feature-generator' ),
			'items_list'                 => __( 'Items list', 'wp-dummy-feature-generator' ),
			'items_list_navigation'      => __( 'Items list navigation', 'wp-dummy-feature-generator' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true
		);
		register_taxonomy( 'wpdfg_portfolio_category', array( 'wpdfg_portfolio' ), $args );

	}

}//end class

endif;
