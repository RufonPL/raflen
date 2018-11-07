<?php  
$partners_header = get_field('_partners_header', 'option');
$partners = get_field('_partners', 'option');
?>
<?php if($partners) : ?>
<div class="container partners-container">
	<?php if($partners_header) : ?>
	<div class="box-header text-center partners-header">
		<?php echo p2br($partners_header); ?>
        <span></span>
    </div><!--end box header-->
    <?php endif; ?>
    <div class="row" id="partners">
    	<?php foreach($partners as $partner) : ?>
        <?php  
		$logo = $partner['_partner_logo'];
		$link = $partner['_partner_link'];
		?>
        <?php if($logo) : ?>
        <div class="partner">
        	<div class="partner-inner relative">
        	<?php if($link) : ?><a href="<?php echo esc_url($link); ?>"><?php endif; ?>
            <img class="absolute-center-both" src="<?php echo esc_url($logo['sizes']['medium']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>"/>
            <?php if($link) : ?></a><?php endif; ?>
            </div><!--end partner inner-->
        </div><!--end partner-->
        <?php endif; ?>
        <?php endforeach; ?>	
    </div><!--edn partners-->
</div><!--end partners container-->
<?php endif; ?>