<?php
class Establecimiento extends CI_Controller{
  
  function perfil( $id ){
	
  	$data['module'] = 'establecimiento';
	$data['sub'] = 'main';
	$data['rbd'] = $id;
	
	$est = $this->db->where('rdb', $id)->get('est_busqueda')->result();
	$data['est'] = $est[0];

	$data['simce'] = $this->db->where('rdb', $id)->order_by('agno', 'ASC')->limit(10)->get('simce')->result();
	$data['psu'] = $this->db->where('rdb', $id)->order_by('agno', 'ASC')->limit(10)->get('psu')->result();

    $this->load->view('router', $data);
  }
  
}
?>