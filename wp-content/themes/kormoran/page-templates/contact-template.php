<?php
/**
 * Template name: Kontakt
 * The template for displaying contact page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @author Rafał Puczel
 */

get_header(); ?>
	
<?php page_header_image_title($post->ID); ?>

<?php show_breadcrumbs(); ?>

<?php  
$address 		= get_field('_address', 'option');
$phone 			= get_field('_phone', 'option');
$email 			= get_field('_email', 'option');
$contact_form 	= get_field('_contact_form');
$map_lat 		= get_field('_map_lat', 'option');
$map_lng 		= get_field('_map_lng', 'option'); 
$map_address 	= get_field('_map_address', 'option');  
?>
<div class="container page-container">
    <div class="row">
        <?php if($map_lat && $map_lng) : ?>
        <div class="container c-map-container">
        	<div class="c-map-container-inner relative overflow">
				<?php if($address || $phone || $email || $contact_form) : ?>
                <div class="c-contact-container">
                    <h4 class="color4 text-uppercase"><strong>Kontakt</strong></h4>
                    <div class="c-contact-details">
                    	<?php if($address) : ?>
                            <div class="contact-item row">
                                <i class="fa fa-map-marker pull-left color3 fa-30"></i>
                                <div class="overflow">
                                    <h5 class="h5 no-margin color3">Adres</h5>
                                    <h5 class="h5 no-margin color4"><strong><?php echo esc_html($address); ?></strong></h5>
                                </div><!--end overflow-->
                            </div><!--end contact item-->
                        <?php endif; ?>
						<?php if($phone) : ?>
                        <div class="contact-item row">
                            <i class="fa fa-phone pull-left color3 fa-30"></i>
                            <div class="overflow">
                                <h5 class="h5 no-margin color3">Telefon</h5>
                                <h5 class="h5 no-margin color4"><strong><?php echo esc_html($phone); ?></strong></h5>
                            </div><!--end overflow-->
                        </div><!--end contact item-->
                        <?php endif; ?>
                        <?php if($email) : ?>
                        <div class="contact-item row">
                            <i class="fa fa-envelope pull-left color3 fa-30"></i>
                            <div class="overflow">
                                <h5 class="h5 no-margin color3">Adres e-mail</h5>
                                <h5 class="h5 no-margin color4"><strong><!--Pn-Nd, 07<sup>00</sup> - 21<sup>00</sup>--><?php echo antispambot($email); ?></strong></h5>
							</div><!--end overflow-->
                        </div><!--end contact item-->
                        <?php endif; ?>
                        <?php if($email) : ?>
                        <div class="contact-item row">
                            <i class="fa fa-clock-o pull-left color3 fa-30"></i>
                            <div class="overflow">
                                <h5 class="h5 no-margin color3">Godziny otwarcia</h5>
                                <h5 class="h5 no-margin color4"><strong>Pn-Nd, 07<sup>00</sup> - 21<sup>00</sup><?php /* ##Wykomentowane na potrzeby strony ## echo antispambot($email); */ ?></strong></h5>
							</div><!--end overflow-->
                        </div><!--end contact item-->
                        <?php endif; ?>						
                        <div class="contact-item row">
                            <i class="fa fa-pencil-square-o pull-left color3 fa-30"></i>
                            <div class="overflow">
                                <h5 class="h5 no-margin color3"></h5>
                                <h5 class="h5 no-margin color4">Wszystkie usługi wyceniamy indywidualnie - prosimy o kontakt<?php /* ##Wykomentowane na potrzeby strony ## echo antispambot($email); */ ?></strong></h5>
							</div><!--end overflow-->
                        </div><!--end contact item-->

                    </div><!--end c contact details-->
                    <?php if($contact_form) : ?>
                    <div class="c-contact-form">
                    	<?php echo do_shortcode($contact_form); ?>
                    </div><!--end c contact form-->
                    <?php endif; ?>
                </div><!--end c contact container-->
                <?php endif; ?>
                <div id="googleMap"></div>
                <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyB4XNTTMcp8RATV_NwU_UMaXVDEUXbyCd0"></script>
                <script src="<?php echo get_template_directory_uri(); ?>/js/markerwithlabel.min.js"></script>
                <script>
                var myLatLng = {lat: <?php echo $map_lat; ?>, lng: <?php echo $map_lng; ?>};
                var map = new google.maps.Map(document.getElementById('googleMap'), {
                    zoom:16,
                    disableDefaultUI:false,
                    scrollwheel: false,
                    center:myLatLng,
                });
                var marker = new google.maps.Marker({
                    map: map,
                    position:myLatLng,
                });
				if(window.innerWidth>541) {
					map.panBy(200,0);
				}else {
					map.panBy(0,250);	
				}
                
                <?php if($map_address) : ?>
                var marker_labeled = new MarkerWithLabel({
                    position:myLatLng,
                    draggable: true,
                    raiseOnDrag: true,
                    map: map,
                    labelContent: "<?php echo esc_html($map_address); ?>",
                    labelAnchor: new google.maps.Point(-10, 20),
                    labelClass: "markerLabel",
                    labelStyle: {opacity: 1}
                }); 
                <?php endif; ?>
                </script>
            </div><!--end c map container inner-->
        </div><!--end map container-->
        <?php endif; ?>
    </div><!--end row-->
</div><!--end container-->      

<?php get_footer(); ?>
