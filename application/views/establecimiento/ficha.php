<h1><?php echo $est->nombre_establecimiento; ?></h1>

<?php /*if ($est->facebook): ?>
	<a href="https://www.facebook.com/<?php echo $est->facebook; ?>" class="pull-right">
		<img src="<?php echo base_url(); ?>img/facebook_24.png" target="_blank" alt="Facebook" title="Facebook">
	</a>
<?php endif*/ ?>
<?php if ($est->twitter): ?>
	<a href="https://twitter.com/<?php echo $est->twitter; ?>" class="pull-right">
		<img src="<?php echo base_url(); ?>img/twitter_24.png" target="_blank" alt="Twitter" title="Twitter">
	</a>
<?php endif ?>

<p class="h4">
	<span class="glyphicon glyphicon-map-marker"></span> 
	<?php echo $est->direccion; ?> <?php echo $est->direccion_n; ?>, 
	<?php echo $est->nombre_comuna; ?> <small>( zona <?php echo $est->area_geografica; ?> )</small>
</p>

<p class="h5">
	<span class="glyphicon glyphicon-user"></span> 
	<?php echo $est->dependencia; ?>
</p>

<p class="h5">
	<span class="glyphicon glyphicon-phone-alt"></span> <?php echo $est->telefono; ?>
</p>

<p class="h5">
	<span class="glyphicon glyphicon-book"></span> <?php echo $est->nivel_ensenanza; ?>
</p>
