<?php
class Dashboard extends CI_Controller{
  
  function index(){
  	$data['module'] = 'dashboard';
	$data['sub'] = 'main';
    $this->load->view('router', $data);
  }
  
}
?>