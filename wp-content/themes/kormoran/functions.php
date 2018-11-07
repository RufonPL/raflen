<?php
/**
 *
 * @author Rafał Puczel
 */

if (!isset($content_width)) $content_width = 770;


/**
 * Adds support for a custom header image.
 */
//require get_template_directory() . '/inc/custom-header.php';
/**
 * rsfwp_setup function.
 * 
 * @access public
 * @return void
 */
function rfswp_setup() {

	require 'inc/general/class-Rfswp_Walker_Nav_Menu.php';

	load_theme_textdomain('rfswp', get_template_directory().'/languages');

	remove_action('wp_head', 'rsd_link'); //removes EditURI/RSD (Really Simple Discovery) link.
	remove_action('wp_head', 'wlwmanifest_link'); //removes wlwmanifest (Windows Live Writer) link.
	remove_action('wp_head', 'wp_generator'); //removes meta name generator.
	remove_action('wp_head', 'wp_shortlink_wp_head'); //removes shortlink.
	remove_action( 'wp_head', 'feed_links', 2 ); //removes feed links.
	remove_action('wp_head', 'feed_links_extra', 3 );  //removes comments feed. 

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'Bootstrap WP Primary' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	
}

add_action( 'after_setup_theme', 'rfswp_setup' );


// Hide WP version
function remove_version() {
  return '';
}
add_filter('the_generator', 'remove_version');

//Hide Login Error messages:
function wrong_login() {
  return 'Wrong username or password.';
}
add_filter('login_errors', 'wrong_login');



function load_jquery() {
	if (!is_admin()) {
		wp_deregister_script('jquery');
		wp_register_script( 'jquery', includes_url('/js/jquery/jquery.js'), false, NULL, true);
		wp_enqueue_script('jquery');
		wp_enqueue_script( 'migrate', includes_url('/js/jquery/jquery-migrate.min.js'), false, NULL, true);
	}
}
add_action('template_redirect', 'load_jquery'); 

function rfswp_scripts() {
	wp_enqueue_style( 'rfswp-css', get_template_directory_uri().'/css/bootstrap.min.css', array(), '1.1');
	wp_enqueue_style( 'rfswp-custom', get_template_directory_uri().'/css/custom.css', array(), '1.0');
	wp_enqueue_style( 'flexslider-css', get_template_directory_uri().'/css/flexslider.css', array(), '2.5.0');
	wp_enqueue_style( 'hover', get_template_directory_uri().'/css/hover.css', array(), '2.0.2');
	wp_enqueue_style( 'owl-css', get_template_directory_uri().'/css/owl.carousel.css', array(), '2.0');
	wp_enqueue_style( 'lightbox-css', get_template_directory_uri().'/css/lightbox.css', array(), '1.0');
	wp_enqueue_style( 'rfswp-rwd', get_template_directory_uri().'/css/rwd.css', array(), '1.0');
	
	wp_enqueue_script( 'rfswp-basefile', get_template_directory_uri().'/js/bootstrap.min.js',array(),'1.1', true);
	wp_enqueue_script( 'no-conflict', get_template_directory_uri().'/js/no-conflict.js',array(),'1.0', true);
	wp_enqueue_script( 'scripts', get_template_directory_uri().'/js/scripts.js',array(),'1.0', true);
	wp_enqueue_script( 'flexslider-js', get_template_directory_uri().'/js/jquery.flexslider-min.js',array(),'2.5.0', true);
	wp_enqueue_script( 'owl-js', get_template_directory_uri().'/js/owl.carousel.js',array(),'2.0', true);
	wp_enqueue_script( 'lightbox-js', get_template_directory_uri().'/js/lightbox.js',array(),'1.0', true);
	
}
add_action( 'wp_enqueue_scripts', 'rfswp_scripts' );

function enqueue_footer_css() {
	$css = '<link property="stylesheet" href="'.get_template_directory_uri().'/font-awesome/css/font-awesome.min.css" rel="stylesheet">';
	//$css .= '<link property="stylesheet" href="https://fonts.googleapis.com/css?family=Racing+Sans+One%7CMarcellus%7CSonsie+One%7CKanit:400,300,200,500,600,700,800%7CJosefin+Sans:400,300,600,700&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">';	
	/* $css .= '<script src="https://cdn.jsdelivr.net/ga-lite/latest/ga-lite.min.js" async></script> <script> var galite = galite || {}; galite.UA = "UA-52143241-1";</script>'; */
	echo $css;
}


function rfs_remove_script_version($src){
    return remove_query_arg('ver', $src);
}
add_filter( 'script_loader_src', 'rfs_remove_script_version' );
add_filter( 'style_loader_src', 'rfs_remove_script_version' );


// REMOVE WP EMOJI
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );	
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}



/**
 * Custom template tags for this theme.
 */
require get_template_directory().'/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory().'/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory().'/inc/jetpack.php';


// hide admin bar links
function mytheme_admin_bar_render() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('comments');
	$wp_admin_bar->remove_menu('customize');
	$wp_admin_bar->remove_menu('new-content');
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );

// hide admin menus
function sb_remove_admin_menus(){
	global $menu;
	global $submenu;
	//remove_menu_page('edit.php?post_type=page'); 
	remove_menu_page('edit-comments.php');
	unset($submenu['themes.php'][6]);
}
add_action('admin_menu', 'sb_remove_admin_menus');

function rfs_unregister_taxonomy(){
    register_taxonomy('post_tag', array());
	register_taxonomy('category', array());
}
add_action('init', 'rfs_unregister_taxonomy');

// Replace Posts label as Articles in Admin Panel 
function change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Aktualności';
    $submenu['edit.php'][5][0] = 'Aktualności';
    echo '';
}
add_action( 'admin_menu', 'change_post_menu_label' );

add_action( 'init', 'my_remove_post_type_support', 10 );
function my_remove_post_type_support() {
    remove_post_type_support('post', 'post-formats');
	remove_post_type_support('post', 'comments');
	remove_post_type_support('post', 'trackbacks');
	remove_post_type_support('post', 'author');
	remove_post_type_support('post', 'custom-fields');
}



add_image_size('slide-image', 1920, 600, true);
add_image_size('blog-image', 350, 140, true);
add_image_size('gallery-image', 300, 200, true);
add_image_size('header-image', 1920, 110, true);
add_image_size('sep-image', 1920, 600, true);
add_image_size('max-image', 1920, 3000);

add_filter('image_size_names_choose', 'my_image_sizes');
function my_image_sizes($sizes) {
	$addsizes = array(
		'gallery-image' => 'Zdjęcie galerii'
	);
	$newsizes = array_merge($sizes, $addsizes);
	return $newsizes;
}

require get_template_directory().'/functions/custom-post-types.php';
require get_template_directory().'/functions/acf.php';
require get_template_directory().'/functions/custom.php';

//require get_template_directory().'/functions/ajax.php';


?>
