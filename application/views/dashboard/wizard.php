
  <script type="text/javascript">
	var map; // Defined outsite so it's global 
	var base_url = "<?php echo site_url(); ?>";
	
	jQuery(document).ready(function(){
		console.log('domready');
		
    	// create a map in the "map" div, set the view to a given place and zoom
		map = L.map('map').setView([-30, -70], 8);
		
		// add an OpenStreetMap tile layer
		L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
		    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
		}).addTo(map);
		
	});
  </script>
  
  
  <!-- Wizard -->
  <script src="<?php echo base_url(); ?>/js/wizard.js"></script>

  <div class="containerlg fullh">
  	<div class="row fullh">
  		
  		<div class="col-lg-12 fullh"><!-- col content -->
			
			<div id="map"><?php //print_r( $establecimientos ); ?></div>
			
			<div id="wizard-container">
				<div class="inner-full">
					<div class="well well-lg">
						<h1>¿Donde buscar?</h1>
						<form id="wizard-form" method="POST">
							<div>
								<input id="address-search" class="form-control input-lg" type="text" placeholder="Calle 123, Comuna">
							</div>
							<em class="text-muted">Ingresa una dirección, calle o comuna.</em>
							<div id="alert" class="alert alert-danger" style="display:none;"></div>
						</form>
					</div>
				</div>
			</div>
			
			
			<div id="sidebar">
				<ul id="sidebar-list">
					
				</ul>
				<!--
				<form id="filter-form">
					
						<div class="btn-group btn-group-sm" data-toggle="buttons">
							<label class="btn btn-success">
								<input class="autosubmit" name="dependencia[]" value="Municipal" type="checkbox" checked="checked">
						        Municipal
							</label>
						  	<label class="btn btn-primary">
						        <input class="autosubmit" name="dependencia[]" value="Particular Pagado" type="checkbox" checked="checked">
						        Particular
						  	</label>
						  	<label class="btn btn-primary">
						        <input class="autosubmit" name="dependencia[]" value="Particular Subvencionado" type="checkbox" checked="checked">
						        &nbsp;Particular Subvencionado
						    </label>
						  	<label class="btn btn-primary">
						        <input class="autosubmit" name="dependencia[]" value="Administracion Delegada" type="checkbox" checked="checked">
						        &nbsp;Administracion Delegada
						    </label>
					   	</div>
					   	
					   	<h2>Nivel</h2>
					   	<div class="btn-group btn-group-sm">
				          <div class="input-group">
						      <span class="input-group-addon">
						        <input class="autosubmit" name="nivel[]" value="Media" type="checkbox" checked="checked">
						        &nbsp;Ed. Básica
						      </span>
						  </div>
						  <div class="input-group">
						      <span class="input-group-addon">
						        <input class="autosubmit" name="nivel[]" value="Básica" type="checkbox" checked="checked">
						        &nbsp;Ed. Media
						      </span>
						  </div>
					   	</div>
					-->
				</form>
			</div>
			
			
  		</div><!-- end col-9 -->
  		
  	</div><!-- end row -->
  </div><!-- end container -->