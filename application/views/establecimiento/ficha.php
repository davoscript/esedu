<?php
	$est = $this->db->where('rdb', $rbd)->get('est_busqueda')->result();
	$est = $est[0];
	
	//print_r( $est );
	
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
	  <strong>Nombre</strong>: <?php echo $est->nombre_establecimiento; ?>
	</li>
	<li class="list-group-item">
	  <strong>Dependencia</strong>: <?php echo $est->dependencia; ?>
	</li>
	<li class="list-group-item">
	  <strong>Nivel</strong>: <?php echo $est->nivel_ensenanza; ?>
	</li>
	<li class="list-group-item">
	  <strong>Área geográfica</strong>: <?php echo $est->area_geografica; ?>
	</li>
	<li class="list-group-item">
	  <strong>Teléfono:</strong>: <?php echo $est->telefono; ?>
	</li>
	<!--
	<li class="list-group-item">
	  <strong>Región</strong>: <?php echo $est->DESC_COMUNA; ?>
	</li>
	-->
	<li class="list-group-item">
	  <strong>Comuna</strong>: <?php echo $est->nombre_comuna; ?>
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