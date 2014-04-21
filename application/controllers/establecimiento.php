<?php
class Establecimiento extends CI_Controller{
  
  function perfil( $id ){

  	$this->load->helper('GraficoNivel');
  	$this->load->helper('GraficoNivelCurso');
  	$this->load->helper('GraficoSimce');

  	$data['module'] = 'establecimiento';
	$data['sub'] = 'main';
	$data['rbd'] = $id;
	
	// establecimiento
	$est = $this->db->where('rdb', $id)->get('est_busqueda')->result();
	$data['est'] = $est[0];

	$gn = new GraficoNivel($id);
	if($gn->isValid())
		$data['grafico_nivel'] = $gn->toArray();

	$gnc = new GraficoNivelCurso($id);
	if($gnc->isValid())
		$data['grafico_nivel_curso'] = $gnc->toArray();

	$data['graficos'] = array();

	// grafico simse 4to basico
	$gs = new GraficoSimce($id, 4);
	if($gs->isValid())
		$data['graficos'][] = $gs->toArray();

	// grafico simse 8vo basico
	$gs = new GraficoSimce($id, 8);
	if($gs->isValid())
		$data['graficos'][] = $gs->toArray();
	
	// grafico simse 2do medio
	$gs = new GraficoSimce($id, 10);
	if($gs->isValid())
		$data['graficos'][] = $gs->toArray();
	
	// grafico psu
	$psu = $this->db->where('rdb', $id)->order_by('agno', 'ASC')->limit(10)->get('psu')->result();
	if($psu){
		$datos = array();
		foreach ($psu as $key => $p) {
			$datos[] = "['$p->agno', $p->psu_lenguaje, $p->psu_matematica, $p->psu_nem, ".($p->alumnos_psu_lenguaje+$p->alumnos_psu_matematica)."]";
		}
		$datos = implode(',', $datos);
		$labels = "['Año', 'LEC', 'MAT', 'NEM', 'Alumnos']";

		$data['graficos'][] = array('name'=>'psu', 'text'=>'PSU'
								, 'datos'=>$datos, 'labels'=>$labels, 'ydos'=> 3 );
	}

    $this->load->view('router', $data);
  }
  
}
