<?php
class Leaflet extends CI_Controller{
  
  function region($rid = false){
  	$data['module'] = 'dashboard';
	$data['sub'] = 'leaflet';
	
	if( $rid )
		$data['establecimientos'] = $this->db->where('numero_region', $rid)->get('est_matri_2013')->result();
	else
		$data['establecimientos'] = $this->db->where('numero_region', 13)->get('est_matri_2013')->result();
	
    $this->load->view('router', $data);
  }
  
}
?>