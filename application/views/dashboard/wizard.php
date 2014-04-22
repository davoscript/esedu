
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
					<div id="wstep-1" class="well well-lg">
						<h1>¿Donde buscar?</h1>
						<form id="wizard-form" method="POST">
							<div>
								<input id="address-search" class="form-control input-lg" type="text" placeholder="Calle 123, Comuna">
							</div>
							<em class="text-muted">Ingresa una dirección, calle o comuna.</em>
							<div id="alert" class="alert alert-danger" style="display:none;"></div>
						</form>
					</div>
					<div id="wstep-2" class="well well-lg">
						<h1>Parámetros</h1>
						
						<span style="font-size: 14px; margin-bottom: 20px; display: block;">
							Ordene sus intereses según sus prioridades, 
							luego seleccione los filtros de Dependencia y Nivel educacional.
						</span>
						
						<!--
						<form id="wizard-form-2" method="POST">
							<div>
								<ul id="sortable">
								  <li class="ui-state-default" data-param="psu">Rendimiento PSU</li>
								  <li class="ui-state-default" data-param="simce">Rendimiento SIMCE</li>
								  <li class="ui-state-default" data-param="hh">Horas Docentes</li>
								</ul>
							</div>
							<div id="alert-2" class="alert alert-danger" style="display:none;"></div>
						</form>
						-->
						
						<div id="filters" class="btn-toolbar" role="toolbar">
							<form id="filter-form">
								
								<div class="" style="float:left; width:40%;">
									<h4>Intereses</h4>
			  						<ul id="orden_sort">
			  							<li>
											<input class="autosubmit_r" name="orden[]" value="psu" type="hidden">
											<span class="num">1.</span>
									        PSU
										</li>
										<li>
											<input class="autosubmit_r" name="orden[]" value="simce" type="hidden">
											<span class="num">2.</span>
									        SIMCE
										</li>
										<li>
											<input class="autosubmit_r" name="orden[]" value="docentehh_alumno" type="hidden">
											<span class="num">3.</span>
									        HH x Alumno
										</li>
									</ul>
							   	</div>
								
								<div class="" style="float:left; width:27%; margin-left:3%;">
									<h4>Dependencia</h4>
									<div class="btn-group btn-group-sm" data-toggle="buttons">
										<label class="btn btn-success active">
											<input class="autosubmit" name="dependencia[]" value="Municipal" type="checkbox" checked="checked">
											<span class="glyphicon glyphicon-ok"></span>
											<span class="glyphicon glyphicon-remove"></span> 
									        &nbsp;Municipal
										</label>
									  	<label class="btn btn-success active">
									        <input class="autosubmit" name="dependencia[]" value="Particular Pagado" type="checkbox" checked="checked">
									        <span class="glyphicon glyphicon-ok"></span> 
									        <span class="glyphicon glyphicon-remove"></span> 
									        &nbsp;Particular
									  	</label>
									  	<label class="btn btn-success active">
									        <input class="autosubmit" name="dependencia[]" value="Particular Subvencionado" type="checkbox" checked="checked">
									        <span class="glyphicon glyphicon-ok"></span> 
									        <span class="glyphicon glyphicon-remove"></span> 
									        &nbsp;Particular Sub.
									    </label>
									  	<label class="btn btn-success active">
									        <input class="autosubmit" name="dependencia[]" value="Administracion Delegada" type="checkbox" checked="checked">
									        <span class="glyphicon glyphicon-ok"></span> 
									        <span class="glyphicon glyphicon-remove"></span> 
									        &nbsp;Adm. Delegada
									    </label>
								   	</div>
								</div>
								
								<div class="" style="float:left; width:27%; margin-left:3%;">
									<h4>Nivel</h4>
									<div class="btn-group btn-group-sm" data-toggle="buttons">
				  						<label class="btn btn-success active">
											<input class="autosubmit" name="nivel_ensenanza[]" value="Especial" type="checkbox" checked="checked">
											<span class="glyphicon glyphicon-ok"></span> 
									        <span class="glyphicon glyphicon-remove"></span>
									        &nbsp;Ed. Especial
										</label>
				  						<label class="btn btn-success active">
											<input class="autosubmit" name="nivel_ensenanza[]" value="Parvularia" type="checkbox" checked="checked">
											<span class="glyphicon glyphicon-ok"></span> 
									        <span class="glyphicon glyphicon-remove"></span>
									        &nbsp;Ed. Parvularia
										</label>
				  						<label class="btn btn-success active">
											<input class="autosubmit" name="nivel_ensenanza[]" value="Básica" type="checkbox" checked="checked">
											<span class="glyphicon glyphicon-ok"></span> 
									        <span class="glyphicon glyphicon-remove"></span>
									        &nbsp;Ed. Básica
										</label>
										<label class="btn btn-success active">
											<input class="autosubmit" name="nivel_ensenanza[]" value="Media" type="checkbox" checked="checked">
											<span class="glyphicon glyphicon-ok"></span> 
									        <span class="glyphicon glyphicon-remove"></span>
									        &nbsp;Ed. Media
										</label>
								   	</div>
								</div>
							   	
							   	<div class="clearfix"></div>
							   	
							   	<hr/>
							   	
							   	<a href="#" id="filter-go" class="pull-right btn btn-warning">
							   		<span class="glyphicon glyphicon-search"></span>
							   		Buscar
							   	</a>
							   	
							</form>
				       
				      </div>
						
						
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
					
				</form>
				-->
			</div>
			
			
  		</div><!-- end col-9 -->
  		
  	</div><!-- end row -->
  </div><!-- end container -->