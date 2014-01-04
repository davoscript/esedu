
  <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.1/leaflet.css" />
  <script src="http://cdn.leafletjs.com/leaflet-0.7.1/leaflet.js"></script>

  <div class="containerlg fullh">
  	<div class="row fullh">
  		
  		<div class="col-lg-12 fullh"><!-- col content -->
			
			<div id="map"><?php //print_r( $establecimientos ); ?></div>
			
			
			<script type="text/javascript">
				jQuery(document).ready(function(){
					console.log('domready');
					
		        	// create a map in the "map" div, set the view to a given place and zoom
					var map = L.map('map').setView([51.505, -0.09], 14);
					
					// add an OpenStreetMap tile layer
					L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
					    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
					}).addTo(map);
					
					<?php
						$sw = new stdClass();
						$ne = new stdClass();
						 
						$sw->lat = 999999;
						$sw->lon = 999999;
						$ne->lat = -999999;
						$ne->lon = -999999; 
					?>
					<?php foreach ($establecimientos as $k => $est): 
							if( (floor($est->latitud) != 0) && (floor($est->longitud) != 0) ): ?>
						<?php 
							// Define bottom left limit (SW)
							$sw->lat = ($est->latitud < $sw->lat) ? $est->latitud : $sw->lat;
							$sw->lon = ($est->longitud < $sw->lon) ? $est->longitud : $sw->lon;
							// Define top right limit (NE)
							$ne->lat = ($est->latitud > $ne->lat) ? $est->latitud : $ne->lat;
							$ne->lon = ($est->longitud > $ne->lon) ? $est->longitud : $ne->lon; 
						?>
						
						// add a marker in the given location, attach some popup content to it and open the popup
						L.marker([<?php echo $est->latitud; ?>, <?php echo $est->longitud; ?>]).addTo(map)
						    .bindPopup('<?php echo addslashes($est->nombre_establecimiento); ?>');
						    //.openPopup();
					<?php
						endif;
						endforeach; 
					?>
					
					// Calculate bounds, with 5% padding
					var southWest = L.latLng(<?php echo $sw->lat; ?>, <?php echo $sw->lon; ?>),
				    northEast = L.latLng(<?php echo $ne->lat; ?>, <?php echo $ne->lon; ?>),
				    bounds = L.latLngBounds(southWest, northEast).pad(.05);

					// Fit bounds to SW and NE
					map.fitBounds(bounds);
        
				});
			</script>
			
			
  		</div><!-- end col-9 -->
  		
  	</div><!-- end row -->
  </div><!-- end container -->