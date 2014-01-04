<?php
class Establecimiento extends CI_Controller{
  
  function index(){
  	$data['module'] = 'establecimiento';
	$data['sub'] = 'main';
    $this->load->view('router', $data);
  }
  
}
?>