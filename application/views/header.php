<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>eSEDU :: Davoscript Apps</title>
  <meta name="description" content="Davoscript Apps">
  <meta name="author" content="DAVOSCRIPT E.I.R.L.">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-theme-yeti.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/css/wizard.css" />
  
  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <script type="text/javascript">
  	var ajax_base_url = '<?php echo site_url(); ?>/';
  </script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>js/admin_scripts.js"></script>
  
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
</head>
<body>

	<nav id="topnav" class="navbar navbar-inverse navbar-static-top" role="navigation">
		
		<a href="<?php echo site_url("dashboard"); ?>">
		<img id="logo" src="<?php echo base_url(); ?>/img/logo_mini.png" alt="" />
		</a>
		
		<div class="navbar-header">
	      <a class="navbar-brand" href="<?php echo site_url("wizard/region/"); ?>">eSEDU</a>
	    </div>
	    <ul class="nav navbar-nav">
	    	<!--
			<li class="">
			    <a href="<?php echo site_url("dashboard"); ?>">Dashboard</a>
			</li>
			<li class="">
			    <a href="<?php echo site_url("establecimiento"); ?>">Establecimiento</a>
			</li>
			<li class="">
			    <a href="<?php echo site_url("comparador"); ?>">Comparador</a>
			</li>
			-->
			<li class="top-fields">
				<form id="form-address-research">
					<div class="input-group input-group-sm">
						<input type="text" id="address-research" class="form-control input-sm" placeholder="Calle 123, Comuna" />
						<span class="input-group-btn">
				          <button class="btn btn-info" type="button">
				        	<span class="glyphicon glyphicon-search"></span>
				          </button>
					    </span>
				    </div><!-- /input-group -->
			    </form>
			</li>
			<li class="top-fields">
				<div id="filters" class="btn-toolbar" role="toolbar">

					<form id="filter-form">
						
						<div class="btn-group btn-group-sm" data-toggle="buttons">
							<label class="btn btn-primary active">
								<input class="autosubmit" name="dependencia[]" value="Municipal" type="checkbox" checked="checked">
						        Municipal
							</label>
						  	<label class="btn btn-primary active">
						        <input class="autosubmit" name="dependencia[]" value="Particular Pagado" type="checkbox" checked="checked">
						        Particular
						  	</label>
						  	<label class="btn btn-primary active">
						        <input class="autosubmit" name="dependencia[]" value="Particular Subvencionado" type="checkbox" checked="checked">
						        &nbsp;Particular Sub.
						    </label>
						  	<label class="btn btn-primary active">
						        <input class="autosubmit" name="dependencia[]" value="Administracion Delegada" type="checkbox" checked="checked">
						        &nbsp;Adm. Delegada
						    </label>
					   	</div>
					   	
					   	<div class="btn-group btn-group-sm" data-toggle="buttons" style="margin-left:10px;">
	  						<label class="btn btn-primary active">
								<input class="autosubmit" name="nivel_ensenanza[]" value="Básica" type="checkbox" checked="checked">
						        Ed. Básica
							</label>
							<label class="btn btn-primary active">
								<input class="autosubmit" name="nivel_ensenanza[]" value="Media" type="checkbox" checked="checked">
						        Ed. Media
							</label>
					   	</div>
					   	
					   	<div class="btn-group btn-group-sm" data-toggle="buttons" style="margin-left:10px;">
	  						<label class="btn btn-primary radioch active">
								<input class="autosubmit_r" name="orden" value="psu" type="radio" checked="checked">
						        PSU
							</label>
							<label class="btn btn-primary radioch">
								<input class="autosubmit_r" name="orden" value="simce" type="radio">
						        SIMCE
							</label>
							<input id="orden" name="orden2" value="psu" type="hidden">
					   	</div>
						
					</form>
		       
		      </div>
			</li>
	    </ul>
	    
		<p class="navbar-text pull-right">Contacto</p>
	</nav>
