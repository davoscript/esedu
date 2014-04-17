<div class="containerlg">
	<div class="row bg_grey">
		
		<div class="col-lg-6">
			<div class="innerbox">
				<?php $this->load->view("$module/ficha", array('est'=>$est)); ?>
			</div>
		</div>

		<div class="col-lg-6 bg_white" style="padding:0px;">
			<?php $this->load->view("$module/geo", array('est'=>$est)); ?>
		</div>

		<?php /*$cols_geo = $est->twitter ? 3 : 6 ?>
		<div class="col-lg-<?php echo $cols_geo ?> bg_white" style="padding:0px;">
			<?php $this->load->view("$module/geo", array( 'est'=>$est )); ?>
		</div>
		
		<?php if ($est->twitter): ?>
		<div class="col-lg-<?php echo 6-$cols_geo ?> bg_white" style="padding:0px;">
			<?php $this->load->view("$module/twitter", array( 'est'=>$est )); ?>	
		</div>
		<?php endif*/ ?>

	</div><!-- end row -->
</div><!-- end container -->

<div class="containerlg">
	<div class="row">
	<?php foreach ($graficos as $i => $grafico): ?>
		<?php if ($i>1 && $i%2): ?>
			</div><div class="row">
		<?php endif ?>

		<div class="col-lg-6 bg_white">
			<div class="innerbox">
				<?php $this->load->view("$module/grafico", $grafico); ?>
			</div>
		</div>
	<?php endforeach ?>

		

	</div><!-- end row -->
</div><!-- end container -->