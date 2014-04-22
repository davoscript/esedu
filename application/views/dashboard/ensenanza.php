<link rel="stylesheet" href="/css/MarkerCluster.css" />
<link rel="stylesheet" href="/css/MarkerCluster.Default.css" />
<script src="/js/leaflet.markercluster-src.js"></script>

<div >
	<form method="post">
		<label for="niveles">Nivel Enseñanza</label> 
		<select id="niveles" name="nivel_ensenanza" onchange="this.form.submit()">
			<option value="*" <?php if($nivel_ensenanza == '*') echo 'selected="selected"' ?>>Todos</option>
			<option value="especial" <?php if($nivel_ensenanza == 'especial') echo 'selected="selected"' ?>>Ed. Especial</option>
			<option value="parvularia" <?php if($nivel_ensenanza == 'parvularia') echo 'selected="selected"' ?>>Ed. Parvularia</option>
			<option value="basica" <?php if($nivel_ensenanza == 'basica') echo 'selected="selected"' ?>>Ed. Básica</option>
			<option value="media" <?php if($nivel_ensenanza == 'media') echo 'selected="selected"' ?>>Ed. Media</option>
		</select>
	</form>
</div>

<div id="map"></div>

<script type="text/javascript">
var map; // Defined outsite so it's global 

jQuery(document).ready(function(){
	// create a map in the "map" div, set the view to a given place and zoom
	map = L.map('map').setView([-39.66620386,-72.95356631], 4);
	
	// add an OpenStreetMap tile layer
	L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
	}).addTo(map);

	var markers = new L.MarkerClusterGroup();

	<?php foreach($ests as $est): ?>
		markers
			.addLayer( 
				L.marker([<?php echo $est->latitud; ?>,<?php echo $est->longitud; ?>])
					.bindPopup('<a href="/establecimiento/perfil/<?php echo $est->rdb ?>" target="_blank"><?php echo str_replace("'", '', $est->nombre_establecimiento) ?></a>')
			);
	<?php endforeach; ?>

	map.addLayer(markers);
	
});
</script>