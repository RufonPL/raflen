<?php $slider = get_field('_slider'); ?>
<?php if($slider) : ?>
<div class="slider container-fluid" id="flexslider">
    <div class="flexslider">
        <ul class="slides">
        <?php foreach($slider as $slides) : ?>
			<?php  
			$image = $slides['_slide_image'];
			$text1 = $slides['_slide_text'];
			$text2 = $slides['_slide_header'];
            ?>
            <li>
                <img src="<?php echo esc_url($image['sizes']['slide-image']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"/>
                <div class="flex-caption container text-center">
                	<?php if($text1) : ?><h2 class="color4 light no-margin"><?php echo $text1; ?></h2><?php endif; ?>
                    <?php if($text2) : ?><h2 class="h1 color4 no-margin"><strong><?php echo $text2; ?></strong></h2><?php endif; ?>
                </div>
            </li>
        <?php endforeach; ?>
        </ul><!--end slides-->
    </div><!--end flexslider-->
    <div class="custom-navigation">
        <a href="#" class="flex-arr flex-prev transition"><i class="fa fa-angle-double-left fa-18 color4 absolute-center-both"></i></a>
        <div class="custom-controls-container"></div>
        <a href="#" class="flex-arr flex-next transition"><i class="fa fa-angle-double-right fa-18 color4 absolute-center-both"></i></a>
    </div>
    <a href="#" id="slide-down" class="transition relative"><i class="fa fa-angle-double-down fa-18 color4 absolute-center-both"></i></a>
</div><!--end slider-->
<?php endif; ?>