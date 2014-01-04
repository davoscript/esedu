<?php
class Comparador extends CI_Controller{
  
  function index(){
  	$data['module'] = 'comparador';
	$data['sub'] = 'main';
    $this->load->view('router', $data);
  }
  
}
?>