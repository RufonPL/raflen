<?php
/**
 * @author Rafał Puczel
 */
?>

				 


<div id="post-<?php the_ID(); ?>" <?php post_class('col-dm-4 col-sm-4 col-xs-12 blog-item'); ?>>
	<div class="blog-item-inner text-center">
    	<?php if(has_post_thumbnail() && !post_password_required()) : ?>
        	<div class="blog-image overflow">
            <a href="<?php the_permalink(); ?>">
        		<?php the_post_thumbnail('blog-image'); ?>
            </a>
            </div><!--end blog image-->
        <?php endif; ?>
    	<h5 class="text-uppercase"><a class="color2 transition no-underline-hover" href="<?php the_permalink(); ?>"><strong><?php the_title(); ?></strong></a></h5>
        <div class="blog-excerpt">
			<?php echo excerpt(get_the_excerpt(),42); ?> 
        </div>
       
        <a class="btn btn-primary text-uppercase" href="<?php the_permalink(); ?>">Zobacz więcej</a>
    </div><!--end blog item inner-->
</div><!--end blog item-->
