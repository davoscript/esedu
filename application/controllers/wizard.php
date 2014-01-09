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

    //var_dump($_POST['dependencia']); return;

    $filtros = array();
    $filtros['dependencia'] = array_values($_POST['dependencia']);
	//$filtros['nivel_ensenanza'] = array_values($_POST['dependencia']);

    

    //  if($opciones = $this->input->post('rama_educativa'))
    //    $filtros['rama_educativa'] = explode(',', $opciones);

  	echo json_encode( $est->getByBounds($longMin, $longMax, $latMin, $latMax, $filtros) );
  }
  
}
?>