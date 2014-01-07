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
	      <a class="navbar-brand" href="#">eSEDU</a>
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
						<input type="text" id="address-research" class="form-control input-sm" />
						<span class="input-group-btn">
				          <button class="btn btn-warning" type="button">
				        	<span class="glyphicon glyphicon-search"></span>
				          </button>
					    </span>
				    </div><!-- /input-group -->
			    </form>
			</li>
			<li class="top-fields">
				<!--
				<div class="btn-group">
				  <button type="button" class="btn btn-default btn-sm">Action</button>
				  <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
				    <span class="caret"></span>
				    <span class="sr-only">Toggle Dropdown</span>
				  </button>
				  <ul class="dropdown-menu" role="menu">
				    <li><a href="#">Action</a></li>
				    <li><a href="#">Another action</a></li>
				    <li><a href="#">Something else here</a></li>
				    <li class="divider"></li>
				    <li><a href="#">Separated link</a></li>
				  </ul>
				</div>
				-->
				<div id="filters" class="btn-toolbar" role="toolbar">
					
					<!--
					<div class="input-group col-sm-1 pull-left">
				      <span class="input-group-addon">
				        <input type="radio">
				        <span>&nbsp;Municipal</span>
				      </span>
				      <span class="input-group-addon">
				        <input type="radio">
				        <span>&nbsp;Particular</span>
				      </span>
				    </div>
				    
				    
				    <div class="input-group col-sm-1 pull-left">
				      <span class="input-group-addon">
				        <input type="radio">
				        <span>&nbsp;Científico-Humanista</span>
				      </span>
				      <span class="input-group-addon">
				        <input type="radio">
				        <span>&nbsp;Técnico</span>
				      </span>
				    </div>
				   	-->
				
				<!--<form id="filter-form">
					<div class="pull-left">
						<div class="btn-group btn-group-sm">
				          <div class="input-group">
						      <span class="input-group-addon">
						        <input class="autosubmit" name="dependencia[]" value="Municipal" type="checkbox" checked="checked">
						        &nbsp;Municipal
						      </span>
						      <span class="input-group-addon">
						        <input class="autosubmit" name="dependencia[]" value="Particular Pagado" type="checkbox" checked="checked">
						        &nbsp;Particular
						      </span>
						      <span class="input-group-addon">
						        <input class="autosubmit" name="dependencia[]" value="Particular Subvencionado" type="checkbox" checked="checked">
						        &nbsp;Particular Subvencionado
						      </span>
						      <span class="input-group-addon">
						        <input class="autosubmit" name="dependencia[]" value="Administracion Delegada" type="checkbox" checked="checked">
						        &nbsp;Administracion Delegada
						      </span>
					      </div>
					   	</div>
					</div>
				</form>-->
		       
		      </div>
			</li>
	    </ul>
	    
		<p class="navbar-text pull-right">Contacto</p>
	</nav>
