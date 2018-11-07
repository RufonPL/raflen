<?php
/**
 * @author Rafał Puczel
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
    <h1 class="h1 entry-title"><strong><?php the_title(); ?></strong><span></span></h1>
    <div class="clearfix"></div>
    <?php if(has_post_thumbnail() && !post_password_required()) : ?>
        <div class="entry-thumbnail pull-left">
        <?php the_post_thumbnail('large'); ?>
        </div>
    <?php endif; ?>
	
	<div class="entry-content">
        <?php the_content(); ?>
    </div><!--end entry-content-->
</div><!--end post-->
