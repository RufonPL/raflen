<?php
/**
 * Template name: Restauracja - Menu
 * The template for displaying restaurant page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @author Rafał Puczel
 */

get_header(); ?>
	
<?php page_header_image_title($post->ID); ?>

<?php show_breadcrumbs(); ?>

<?php  
$menu_tabs = new WP_Query(array(
	'post_type'		=> 'restaurant_menu',
	'posts_per_page'=> 999,
	'orderby'		=> 'menu_order'
));
$menu_page_bg_image = get_field('_menu_page_bg_image');
$menu_page_bg_color = get_field('_menu_page_bg_color');
$bg_image = $menu_page_bg_image ? 'background-image:url('.$menu_page_bg_image['sizes']['max-image'].');' : '';
$bg_color = $menu_page_bg_color ? 'background-color:'.$menu_page_bg_color.';' : '';
?>
<div class="container-fluid restaurant-page" style="<?php echo $bg_image.$bg_color ?>">
    <div class="container page-container">
        <div class="row">
            <?php if($menu_tabs->have_posts()) : ?>
            <?php 
			$all_tabs = $menu_tabs->post_count; 
			$tab_width = $all_tabs < 9 ? 100/$all_tabs : 100/8;
			?>
            <div class="menu-tabs">
            	<ul class="nav nav-pills<?php if($all_tabs>6) : ?> plenty<?php endif; ?>" role="tablist">
            	<?php $m=1; while($menu_tabs->have_posts()) : $menu_tabs->the_post(); ?>
					<li<?php if($m==1) : ?> class="active"<?php endif; ?> style="width:<?php echo $tab_width; ?>%"><a href="#<?php echo sanitize_title(get_the_title()); ?>" role="tab" data-toggle="tab" class="color4 text-uppercase transition"><strong><?php the_title(); ?></strong></a></li>
  				<?php $m++; endwhile; ?>
                </ul>
            </div><!--end menu tabs-->
            <div class="menu-sheet">
            	<div class="menu-sheet-inner">
                	<div class="menu-sheet-signs">
                        <div class="tab-content">
                        <?php $m=1; while($menu_tabs->have_posts()) : $menu_tabs->the_post(); ?>
                        <?php $menu_elements = get_field('_menu_elements'); ?>
                            <div class="tab-pane<?php if($m==1) : ?> active<?php endif; ?>" id="<?php echo sanitize_title(get_the_title()); ?>">
                                <h2 class="h1 color5 text-center text-uppercase"><strong>Menu</strong></h2>
                                <?php if($menu_elements) : ?>
                                <div class="menu-title text-center">
                                	<h4 class="color2 text-uppercase relative no-margin"><span class="stars-left stars"></span><strong><?php the_title(); ?></strong><span class="stars-right stars"></span></h4>
                                </div><!--end menu title-->
                                <div class="menu-elements">
                                <?php foreach($menu_elements as $element) : ?>
                                	<?php  
									$name = $element['_menu_element_name'];
									$text = $element['_menu_element_text'];
									$price = $element['_menu_element_price'];
									?>
                                    <div class="menu-element">
                                    	<?php if($price) : ?>
                                    	<div class="me-price pull-right text-right">
                                        	<h4 class="color5"><strong><?php echo esc_html($price); ?></strong> zł</h4>
                                        </div><!--end me price-->
                                        <?php endif; ?>
                                        <div class="overflow">
                                        	<?php if($name) : ?><h5 class="color2"><strong><?php echo $name; ?></strong></h5><?php endif; ?>
                                            <?php if($text) : ?><p><?php echo $text; ?></p><?php endif; ?>
                                        </div>
                                    </div><!--end menu element-->
                                <?php endforeach; ?>
                                </div><!--end menu elements-->
                                <?php endif; ?>
                            </div><!--end tab pane-->
                        <?php $m++; endwhile; ?>
                        </div><!--end tab content-->
                    </div><!--end menu sheet signs-->
                </div><!--end menu sheet inner-->
            </div><!--end menu sheet-->
            <?php endif; wp_reset_postdata(); ?>
        </div><!--end row-->
    </div><!--end container-->      
</div><!--end restaurant page-->

<?php get_footer(); ?>
