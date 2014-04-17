<h1><?php echo $est->nombre_establecimiento; ?></h1>

<ul class="list-group">
	<li class="list-group-item">
	  <strong>Dependencia</strong>: <?php echo $est->dependencia; ?>
	</li>
	<li class="list-group-item">
	  <strong>Direcci&oacute;</strong>: 
	  <?php echo $est->direccion; ?> <?php echo $est->direccion_n; ?>, 
	  <?php echo $est->nombre_comuna; ?> ( <?php echo $est->area_geografica; ?> )
	</li>
	<li class="list-group-item">
	  <strong>Nivel</strong>: <?php echo $est->nivel_ensenanza; ?>
	</li>
	<li class="list-group-item">
	  <strong>Teléfono:</strong>: <?php echo $est->telefono; ?>
	</li>
	<?php if ($est->twitter): ?>
	<li class="list-group-item">
	  <strong>Twitter:</strong>: <a href="https://twitter.com/<?php echo $est->twitter; ?>">@<?php echo $est->twitter; ?></a>
	</li>
	<?php endif ?>
</ul>