<?php
class Dashboard extends CI_Controller{
  
  function index(){
  	$data['module'] = 'dashboard';
	$data['sub'] = 'main';
    $this->load->view('router', $data);
  }

  function test(){
  	$data['module'] = 'dashboard';
	$data['sub'] = 'test';
    $this->load->view('router', $data);
  }
  
}
?>