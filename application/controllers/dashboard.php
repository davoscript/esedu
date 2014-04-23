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

	function clusters(){
		$data['module'] = 'dashboard';
		$data['sub'] = 'clusters';

		$query = $this->db;
		if(isset($_POST['nivel_ensenanza'])){
			$data['nivel_ensenanza'] = $_POST['nivel_ensenanza'];
			if($_POST['nivel_ensenanza'] != '*')
				$query->like('nivel_ensenanza', $_POST['nivel_ensenanza']);
		}
		else
			$data['nivel_ensenanza'] = '*';

		$ests = $query->get('est_busqueda')->result();

		$data['ests'] = array();

		foreach ($ests as $est) {
			if(!$est->latitud)
				continue;

			$data['ests'][] = $est;
			
		}

		$this->load->view('router', $data);
	}

	function heatmap(){
		$data['module'] = 'dashboard';
		$data['sub'] = 'heatmap';

		$query = $this->db;
		if(isset($_POST['nivel_ensenanza'])){
			$data['nivel_ensenanza'] = $_POST['nivel_ensenanza'];
			if($_POST['nivel_ensenanza'] != '*')
				$query->like('nivel_ensenanza', $_POST['nivel_ensenanza']);
		}
		else
			$data['nivel_ensenanza'] = '*';

		$ests = $query->get('est_busqueda')->result();

		$data['ests'] = array();

		foreach ($ests as $est) {
			if(!$est->latitud)
				continue;

			$data['ests'][] = $est;
			
		}

		$this->load->view('router', $data);
	}

}
?>