<?php
/**
 * The Template for displaying all single posts.
 *
 * @author Rafał Puczel
 */
get_header(); ?>


<?php page_header_image_title(get_option('page_for_posts')); ?>

<?php show_breadcrumbs(); ?>

<div class="container page-container">
    <div class="row">
        <?php while(have_posts()) : the_post(); ?>
            <?php get_template_part('content', 'single'); ?>
        <?php endwhile; ?>
    </div><!--end row-->
</div><!--end container-->

<?php require_template_part('latest-posts', 'posts'); ?> 

<?php get_footer(); ?>
