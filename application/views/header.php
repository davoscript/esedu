<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>eSEDU :: Escenario Educacional</title>
  <meta name="description" content="El escenario de la educacion chilena entrega informacion sobre los establecimientos educacionales">
  <meta name="author" content="DAVOSCRIPT E.I.R.L.">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-theme-yeti.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/wizard.css" />
  
  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <script type="text/javascript">
  	var ajax_base_url = '<?php echo base_url(); ?>';
  </script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
  <script src="<?php echo base_url(); ?>js/jquery-ui.min.js"></script>
  <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>js/admin_scripts.js"></script>
  
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
</head>
<body>

	<nav id="topnav" class="navbar navbar-inverse navbar-static-top" role="navigation">
		
		<a href="<?php echo site_url(); ?>">
			<img id="logo" src="<?php echo base_url(); ?>/img/logo_mini.png" alt="eSEDU" title="Escenario Educacional" />
		</a>
		
		<div class="navbar-header">
	      <a class="navbar-brand" href="<?php echo site_url(); ?>" title="Escenario Educacional">eSEDU</a>
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

			<?php if ($module == 'dashboard' && $sub == 'wizard'): ?>

			<li class="top-fields">
				<form id="form-address-research">
					<div class="input-group input-group-sm">
						<input type="text" id="address-research" class="form-control input-sm" placeholder="Calle 123, Comuna" />
						<span class="input-group-btn">
				          <button class="btn btn-info" type="submit">
				        	<span class="glyphicon glyphicon-search"></span>
				          </button>
					    </span>
				    </div><!-- /input-group -->
			    </form>
			</li>
			<li class="top-fields">
				<a href="#" id="settings" class="">
					<span class="glyphicon glyphicon-cog"></span> 
					<span class="text">Ajusta tu búsqueda</span>
				</a>
			</li>
			<?php endif ?>
	    </ul>

		<p class="navbar-text pull-right">Contacto</p>
	</nav>
