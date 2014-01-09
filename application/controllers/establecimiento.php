<?php
class Establecimiento extends CI_Controller{
  
  function perfil( $id ){
	
  	$data['module'] = 'establecimiento';
	$data['sub'] = 'main';
	$data['rbd'] = $id;
    $this->load->view('router', $data);
  }
  
}
?>