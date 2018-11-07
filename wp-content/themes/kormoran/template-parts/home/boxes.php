<?php $boxes = get_field('_boxes'); ?>
<?php if($boxes) : ?>
<div class="container-fluid boxes-container">
	<div class="row boxes">
	<?php $b=1; foreach($boxes as $box) : ?>
    	<?php  
		$image 	= $box['_box_image'];
		$header = $box['_box_header'];
		$text 	= $box['_box_text'];
		$link 	= $box['_box_link'];
		?>
        <?php if($b%2==0) : ?>
        	<div class="col-md-6 col-sm-12 col-xs-12 box-text-col box-col">
            	<?php if($header) : ?>
                <div class="box-header">
                	<?php echo p2br($header); ?>
                    <span></span>
                </div><!--end box header-->
                <?php endif; ?>
                <?php if($text) : ?>
                <div class="box-text">
                	<p><?php echo $text; ?></p>
                </div><!--end box text-->
                <?php endif; ?>
                <?php if($link) : ?><a href="<?php echo esc_url(get_permalink($link)); ?>" class="btn btn-primary text-uppercase">Zobacz więcej</a><?php endif; ?>
            </div><!--end box text col-->
        	<div class="col-md-6 col-sm-12 col-xs-12 box-image-col box-col">
            	<?php if($image) : ?><img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"/><?php endif; ?>            	
            </div><!--end box image col-->
        <?php else : ?>
        	<div class="col-md-6 col-sm-12 col-xs-12 box-image-col box-col box-swap1">
            	<?php if($image) : ?><img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"/><?php endif; ?>  
            </div><!--end box image col-->
        	<div class="col-md-6 col-sm-12 col-xs-12 box-text-col box-col box-swap2">
            	<?php if($header) : ?>
                <div class="box-header">
                	<?php echo p2br($header); ?>
                    <span></span>
                </div><!--end box header-->
                <?php endif; ?>
                <?php if($text) : ?>
                <div class="box-text">
                	<p><?php echo $text; ?></p>
                </div><!--end box text-->
                <?php endif; ?>
                <?php if($link) : ?><a href="<?php echo esc_url(get_permalink($link)); ?>" class="btn btn-primary text-uppercase">Zobacz więcej</a><?php endif; ?>
            </div><!--end box text col-->
        <?php endif; ?>
        </div><!--end boxes-->
        <div class="row boxes">
    <?php $b++; endforeach; ?>	
    </div><!--end boxes-->
</div><!--end boxes container-->
<?php endif; ?>