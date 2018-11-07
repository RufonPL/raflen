<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @author Rafał Puczel
 */

get_header(); ?>

<?php page_header_image_title(get_option('page_for_posts')); ?>

<?php show_breadcrumbs(); ?>

<div class="container page-container">
    <div class="row">
		<?php if(have_posts()) : ?>
        <?php $b=1; while(have_posts()) : the_post(); ?>
            <?php get_template_part('content', get_post_format()); ?>
        <?php if($b%3==0 && $b!=wp_count_posts()->publish) : ?>
        </div><!--end row-->
        <div class="row">
        <?php endif; ?>
        <?php $b++; endwhile; ?>
            <?php rfs_pagination(); ?>
        <?php endif; ?>
    </div><!--end row-->
</div><!--end container-->               

<?php get_footer(); ?>
