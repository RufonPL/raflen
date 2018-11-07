<?php  
/* Custom POST TYPES  - Menu */
add_action( 'init', 'create_restaurant_menu_post_type' );
function create_restaurant_menu_post_type() {
        $args = array('publicly_queryable' => true,
  					  'query_var' => true,
					  'rewrite' => array(
					  	'slug'	=> 'restaurant_menu',
						'with_front'=>false,
					  ));				 
	register_post_type('restaurant_menu', $args);
}
add_action( 'init', 'register_restaurant_menu_page_name' ); 
function register_restaurant_menu_page_name() {
    $labels = array( 
  		'name'               => __('Restauracja Menu', 'rfs_creations'),
		'singular_name'      => __('Restauracja Menu', 'rfs_creations'),
		'add_new'            => __('Dodaj nowe', 'rfs_creations'),
		'add_new_item'       => __('Dodaj nowe', 'rfs_creations'),
		'edit_item'          => __('Edytuj', 'rfs_creations'),
		'new_item'           => __('Nowy', 'rfs_creations'),
		'view_item'          => __('Zobacz', 'rfs_creations'),
		'search_items'       => __('Szukaj', 'rfs_creations'),
		'not_found'          => __('Nie znaleziono', 'rfs_creations'),
		'not_found_in_trash' => __('Brak w koszu', 'rfs_creations'),
		'parent_item_colon'  => __('Restauracja Menu:', 'rfs_creations'),
		'menu_name'          => __('Restauracja Menu', 'rfs_creations'),
    );
    $args = array( 
		'labels'              => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-format-aside',
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'capability_type'     => 'post', 
		'supports'            => array('title', 'editor', 'page-attributes', 'revisions'),
    );
    register_post_type('restaurant_menu', $args );
}
?>