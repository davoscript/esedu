
  <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.1/leaflet.css" />
  <script src="http://cdn.leafletjs.com/leaflet-0.7.1/leaflet.js"></script>
  <!-- Wizard -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/css/wizard.css" />
  <script src="<?php echo base_url(); ?>/js/wizard.js"></script>

  <div class="containerlg fullh">
  	<div class="row fullh">
  		
  		<div class="col-lg-12 fullh"><!-- col content -->
			
			<div id="map"><?php //print_r( $establecimientos ); ?></div>
			
			
			<script type="text/javascript">
				var map; // Defined outsite so it's global 
				
				jQuery(document).ready(function(){
					console.log('domready');
					
		        	// create a map in the "map" div, set the view to a given place and zoom
					map = L.map('map').setView([-30, -70], 6);
					
					// add an OpenStreetMap tile layer
					L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
					    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
					}).addTo(map);
					
				});
			</script>
			
			
			<div id="wizard-container">
				<div class="inner-full">
					<div class="well well-lg">
						<h1>¿Donde buscar?</h1>
						<form id="wizard-form" method="POST">
							<div>
								<input id="address-search" class="form-control input-lg" type="text" placeholder="Calle 123, Comuna">
							</div>
							<em class="text-muted">Ingresa una dirección, calle o comuna.</em>
						</form>
					</div>
				</div>
			</div>
			
			
  		</div><!-- end col-9 -->
  		
  	</div><!-- end row -->
  </div><!-- end container -->