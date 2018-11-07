<?php $social_icons = get_field('_social_icons', 'option'); ?>
<?php if($social_icons) : ?>
<div class="social-icons text-right">
	<?php foreach($social_icons as $icons) : ?>
    <?php  
	$icon = $icons['_social_icon'];
	$link = $icons['_social_icon_link'];
	
	switch($icon) {
		case 'envelope':
			$link = 'mailto:'.antispambot($link);
			break;
		case 'phone':	
			$link = 'tel:'.str_replace(' ','',$link);
			break;
		default:
			$link = esc_url($link);
	}
	?>
    <a href="<?php echo $link; ?>" class="social-icon social-<?php echo esc_html($icon); ?> text-center relative transition"><i class="fa fa-<?php echo esc_html($icon); ?> fa-14 color4 absolute-center-both"></i></a>
    <?php endforeach; ?>
</div><!--end social icons-->
<?php endif; ?>