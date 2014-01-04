<?php $this->load->view('header'); ?>
  
  <div id="main">
	<?php
		if( !empty($module) ):
			$this->load->view("$module/$sub");
		endif;
	?>
  </div>
  
<?php $this->load->view('footer'); ?>