<?php  
$map_lat 		= get_field('_map_lat', 'option');
$map_lng 		= get_field('_map_lng', 'option'); 
$map_address 	= get_field('_map_address', 'option');  
?>
<?php if($map_lat && $map_lng) : ?>
<div class="container-fluid map-container">
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
</div><!--end map container-->
<?php endif; ?>