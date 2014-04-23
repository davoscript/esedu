<?php
class Esedu extends CI_Controller{

	function acercade(){
		$data['module'] = 'esedu';
		$data['sub'] = 'acercade';
		$this->load->view('router', $data);
	}

}