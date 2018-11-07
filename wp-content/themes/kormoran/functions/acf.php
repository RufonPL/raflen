<?php  
add_filter('acf/settings/show_admin', '__return_false');

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Opcje Szablonu',
		'menu_title'	=> 'Opcje Szablonu',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> true,
		'icon_url'		=> 'dashicons-screenoptions',
		'position'		=> 22
	));
	
	$acf_subpages = array(
		'Nagłówek',
		'Dane Kontaktowe',
		'Social Icons',
		'Mapa Google',
		'Partnerzy'
	);
	
	foreach($acf_subpages as $subpage) {
		acf_add_options_sub_page(array(
			'page_title' 	=> $subpage,
			'menu_title'	=> $subpage,
			'parent_slug'	=> 'theme-general-settings',
		));
	}
	
}

function my_toolbars($toolbars) {
	/* echo '< pre >';
		print_r($toolbars);
	echo '< /pre >';
	die;  */
	$toolbars['Section_header'] = array();
	$toolbars['Section_header'][1] = array('bold');
	
	$toolbars['Featured_header'] = array();
	$toolbars['Featured_header'][1] = array('formatselect');
	
	if(($key = array_search('code', $toolbars['Full' ][2])) !== false) {
	    unset($toolbars['Full'][2][$key]);
	}
	return $toolbars;
}
add_filter('acf/fields/wysiwyg/toolbars', 'my_toolbars');

function admin_styles() {
   echo '<style type="text/css">
			[data-toolbar="section_header"] iframe,
			[data-toolbar="featured_header"] iframe  {
				height:100px !important;
				min-height:100px !important;
			}
			.wyswig-header {
				height:240px;
			}
         </style>';
}

add_action('admin_head', 'admin_styles');
?>