<div id="map"></div>

<script type="text/javascript">
var map; // Defined outsite so it's global 
var base_url = "<?php echo site_url(); ?>";

jQuery(document).ready(function(){
	console.log('domready');
	
	// create a map in the "map" div, set the view to a given place and zoom
	map = L.map('map').setView([<?php echo $est->latitud; ?>,<?php echo $est->longitud; ?>], 16);
	
	// add an OpenStreetMap tile layer
	L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
	}).addTo(map);

	var pin = L.icon({
	    iconUrl: ajax_base_url+'img/logo_mini.png',
	    iconSize: [45, 45],
	    iconAnchor: [21, 45]
	});

	var marker = L.marker([<?php echo $est->latitud; ?>,<?php echo $est->longitud; ?>])
					.setIcon( pin )
					.addTo(map)
	
});
</script>