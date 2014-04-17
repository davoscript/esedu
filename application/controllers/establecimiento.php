<?php
class Establecimiento extends CI_Controller{
  
  function perfil( $id ){
	
  	$data['module'] = 'establecimiento';
	$data['sub'] = 'main';
	$data['rbd'] = $id;
	
	// establecimiento
	$est = $this->db->where('rdb', $id)->get('est_busqueda')->result();
	$data['est'] = $est[0];

	$data['graficos'] = array();

	// grafico simse 4to basico
	$simce_4to = $this->db->where('rdb', $id)->where('nivel', 4)->order_by('agno', 'ASC')->limit(10)->get('simce')->result();
	if($simce_4to){
		$datos = array();
		foreach ($simce_4to as $key => $s) {
			$datos[] = "['$s->agno', $s->simce_leng, $s->simce_mate]";
		}
		$datos = implode(',', $datos);
		$labels = "['Año', 'LEC', 'MAT']";

		$data['graficos'][] = array('name'=>'simce_4to', 'text'=>'SIMCE 4to Basico'
								, 'datos'=>$datos, 'labels'=>$labels );
	}

	// grafico simse 8vo basico
	$simce_8vo = $this->db->where('rdb', $id)->where('nivel', 8)->order_by('agno', 'ASC')->limit(10)->get('simce')->result();
	if($simce_8vo){
		$datos = array();
		foreach ($simce_8vo as $key => $s) {
			$datos[] = "['$s->agno', $s->simce_leng, $s->simce_mate]";
		}
		$datos = implode(',', $datos);
		$labels = "['Año', 'LEC', 'MAT']";

		$data['graficos'][] = array('name'=>'simce_8vo', 'text'=>'SIMCE 8vo Basico'
								, 'datos'=>$datos, 'labels'=>$labels );
	}

	// grafico simse 2do medio
	$simce_2do = $this->db->where('rdb', $id)->where('nivel', 10)->order_by('agno', 'ASC')->limit(10)->get('simce')->result();
	if($simce_2do){
		$datos = array();
		foreach ($simce_2do as $key => $s) {
			$datos[] = "['$s->agno', $s->simce_leng, $s->simce_mate]";
		}
		$datos = implode(',', $datos);
		$labels = "['Año', 'LEC', 'MAT']";

		$data['graficos'][] = array('name'=>'simce_2do', 'text'=>'SIMCE 2do Medio'
								, 'datos'=>$datos, 'labels'=>$labels );
		
	}

	// grafico psu
	$psu = $this->db->where('rdb', $id)->order_by('agno', 'ASC')->limit(10)->get('psu')->result();
	if($psu){
		$datos = array();
		foreach ($psu as $key => $p) {
			$datos[] = "['$p->agno', $p->psu_lenguaje, $p->psu_matematica, $p->psu_nem]";
		}
		$datos = implode(',', $datos);
		$labels = "['Año', 'LEC', 'MAT', 'NEM']";

		$data['graficos'][] = array('name'=>'psu', 'text'=>'PSU'
								, 'datos'=>$datos, 'labels'=>$labels );
	}

    $this->load->view('router', $data);
  }
  
}
