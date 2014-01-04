<?php
	$establecimiento = array(
		'rbd' => 'rbd',
		'nombre' => 'INSTITUTO NACIONAL',
		'comuna' => 'Santiago',
		'region' => 'Metropolitana',
		'dependencia' => 'Municipal',
		'area_geo' => 'Urbano',
		'lat' => '-33,44468254',
		'lon' => '-70,65031555',
		'nivel' => 'Básica niños/Enseñanza Media HC Jóvenes'
	);
?>

<ul class="list-group">
	<li class="list-group-item">
	  <strong>Nombre</strong>: <?php echo $establecimiento['nombre']; ?>
	</li>
	<li class="list-group-item">
	  <strong>Dependencia</strong>: <?php echo $establecimiento['dependencia']; ?>
	</li>
	<li class="list-group-item">
	  <strong>Nivel</strong>:  <?php echo $establecimiento['nivel']; ?>
	</li>
	<li class="list-group-item">
	  <strong>Área geográfica</strong>:  <?php echo $establecimiento['area_geo']; ?>
	</li>
	<li class="list-group-item">
	  <strong>Región</strong>:  <?php echo $establecimiento['region']; ?>
	</li>
	<li class="list-group-item">
	  <strong>Comuna</strong>:  <?php echo $establecimiento['comuna']; ?>
	</li>
</ul>

<!--
<dl class="dl-horizontal">
  <dt>Nombre:</dt>
  <dd>Instituto Nacional</dd>
  <dt>Tipo:</dt>
  <dd>Científico Humanista</dd>
  <dt>Modalidad:</dt>
  <dd>Municipal</dd>
</dl>
-->