<?php  
function template_id($template) {
	global $post;
	$template_page = get_posts(array(
		'post_type'=>'page',
		'meta_key' => '_wp_page_template',
		'meta_value' => 'page-templates/'.$template.'-template.php'
	));
	
	$ids = array();
	foreach($template_page as $t_page) {
		$ids[] = $t_page->ID; 
	}
	if(count($ids)>1) {
		return $ids;
	}else {
		return $ids[0];
	}
}
function require_template_part($template_part_name, $subfolder=false) {
	$sub = $subfolder ? $subfolder.'/' : '';
	$file = get_template_directory().'/template-parts/'.$sub.$template_part_name.'.php';
	if(file_exists($file)) {
		require $file;
	}
	return;
}
function p2br($content) {
	$newcontent = preg_replace("/<p[^>]*?>/", "", $content);
	$newcontent = str_replace("</p>", "<br />", $newcontent);
	return preg_replace('#(( ){0,}<br( {0,})(/{0,1})>){1,}$#i', '', $newcontent);
}
if(function_exists('yoast_breadcrumb')) {
	function show_breadcrumbs() {
		$bread_bg = is_page(template_id('restaurant')) ? 'restaurant-bread' : '';
		echo yoast_breadcrumb('<div id="breadcrumbs" class="container-fluid '.$bread_bg.'"><div class="container">','</div></div>', false);
	}
}
function excerpt($string, $limit=16, $more=NULL) {
	$words = explode(' ',$string);
	$excerpt = implode(' ',array_splice($words,0,$limit)).$more; 	
	return trim($excerpt,',;');
}

function rfs_pagination($pages = '', $range = 2) {  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '') {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages) {
             $pages = 1;
         }
     }   
	 echo '<div class="clearfix"></div>';
	 if(1 != $pages) {
		echo '<div class="pagination">'; 
		if($paged==1) {
			echo '<span class="prev-page text-uppercase"><i class="fa fa-angle-left"></i></span>';	
		}else {
			echo '<a class="prev-page text-uppercase" href="'.get_pagenum_link($paged - 1).'"><i class="fa fa-angle-left"></i></a>';
		}
		echo '<div class="pagination-pages">';
		for ($i=1; $i <= $pages; $i++) {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."'>".$i."</a>";
             }
        }
		echo '</div><!--end pagination pages-->';
		if($paged==$pages) {
			echo '<span class="next-page text-uppercase"><i class="fa fa-angle-right"></i> </span>';	
		}else {
			echo '<a class="next-page text-uppercase" href="'.get_pagenum_link($paged + 1).'"><i class="fa fa-angle-right"></i></a>';
		}
		echo '</div><!--end pagination-->';
	 }
}

function page_header_image_title($page_id) {
	$header_type  = get_field('_header_image_type', $page_id);
	$header_image = get_field('_header_image', $page_id);
	
	$title = '
		<div class="container page-title absolute-center-vertical">
			<h3 class="color4"><strong>'.get_the_title($page_id).'</strong></h3>
		</div><!--end page title-->
	';
	$html = '';
	if($header_image) {
		$width = $header_image['width'];
		$height = $header_image['height'];
		if($header_type == 'parallax') {
			$html = '
				<div class="page-header-image ph-parallax container-fluid relative" style="background-image:url('.$header_image['sizes']['max-image'].');">
					'.$title.'
				</div>
			';
		}else {
			$html = '
				<div class="page-header-image container-fluid relative">
					<img src="'.esc_url($header_image['sizes']['header-image']).'" alt=""/>
					'.$title.'
				</div>
			';	
		}
	}else {
		echo '<div class="container"><h3 class="color3 page-title-no-image"><strong>'.get_the_title($page_id).'</strong></h3></div>';
	}
	echo $html;
}

add_filter('wpcf7_ajax_loader', 'my_wpcf7_ajax_loader');
function my_wpcf7_ajax_loader () {
	return  get_bloginfo('stylesheet_directory') . '/images/ajax-loader.gif';
}

?>