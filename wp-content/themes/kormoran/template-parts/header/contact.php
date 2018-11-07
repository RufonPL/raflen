<?php $phone = get_field('_phone', 'option'); ?>
<?php if($phone) : ?>
<div class="header-contact row">
	<i class="fa fa-phone fa-30 color3 pull-left"></i>
    <div class="overflow">
    	<h6 class="h6 text-uppercase color1 no-margin line-height1"><strong>Zadzwoń</strong></h6>
        <h5 class="color3 no-margin line-height1"><strong><?php echo esc_html($phone); ?></strong></h5>
    </div><!--end overflow-->
</div><!--end header phone-->
<?php endif; ?>