<?php  
$address 	= get_field('_address', 'option');
$phone 		= get_field('_phone', 'option');
$email 		= get_field('_email', 'option');
?>
<?php if($address || $phone || $email) : ?>
<div class="container-fluid contact-details">
	<div class="container">
    	<div class="row">
        	<div class="col-md-3 col-sm-6 col-xs-12">
				<h4 class="no-margin color4 text-uppercase"><strong>Kontakt</strong></h4>
            </div><!--end col-->
        	<div class="col-md-3 col-sm-6 col-xs-12">
				<?php if($address) : ?>
                <div class="contact-item row">
                	<i class="fa fa-map-marker pull-left color3 fa-30"></i>
                    <div class="overflow">
                    	<h5 class="h5 no-margin color3">Adres</h5>
                        <h5 class="h5 no-margin color4"><strong><?php echo esc_html($address); ?></strong></h5>
                    </div><!--end overflow-->
                </div><!--end contact item-->
                <?php endif; ?>
            </div><!--end col-->
        	<div class="col-md-3 col-sm-6 col-xs-12">
				<?php if($phone) : ?>
                <div class="contact-item row">
                	<i class="fa fa-phone pull-left color3 fa-30"></i>
                    <div class="overflow">
                    	<h5 class="h5 no-margin color3">Telefon</h5>
                        <h5 class="h5 no-margin color4"><strong><?php echo esc_html($phone); ?></strong></h5>
                    </div><!--end overflow-->
                </div><!--end contact item-->
                <?php endif; ?>
            </div><!--end col-->
        	<div class="col-md-3 col-sm-6 col-xs-12">
				<?php if($email) : ?>
                <div class="contact-item row">
                	<i class="fa fa-envelope pull-left color3 fa-30"></i>
                    <div class="overflow">
                    	<h5 class="h5 no-margin color3">Firma</h5>
                        <h5 class="h5 no-margin color4"><strong><?php echo antispambot($email); ?></strong></h5>
                    </div><!--end overflow-->
                </div><!--end contact item-->
                <?php endif; ?>
            </div><!--end col-->
    	</div><!--end row-->
    </div><!--end container-->
</div><!--end contact details-->
<?php endif; ?>