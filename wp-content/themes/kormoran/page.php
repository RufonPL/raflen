<?php
/**
 * The template for displaying all pages.
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

<div class="container page-container">
    <div class="row">
       <?php while(have_posts()) : the_post(); ?>
       	<?php get_template_part('content', 'page'); ?>
       <?php endwhile; ?> 
    </div><!--end row-->
</div><!--end container-->                   

<?php get_footer(); ?>
