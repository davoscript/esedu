<?php
class Wizard extends CI_Controller{
  
  function region($rid = false){
  	$data['module'] = 'dashboard';
	$data['sub'] = 'wizard';
	
	if( $rid )
		$data['establecimientos'] = $this->db->where('numero_region', $rid)->get('est_matri_2013')->result();
	else
		$data['establecimientos'] = $this->db->where('numero_region', 13)->get('est_matri_2013')->result();
	
    $this->load->view('router', $data);
  }

  function establecimientosByBounds($longMin, $longMax, $latMin, $latMax){
  	$this->load->model('Establecimiento_model');
  	$est = $this->Establecimiento_model;

  	echo json_encode( $est->getByBounds($longMin, $longMax, $latMin, $latMax) );
  }
  
}
?>