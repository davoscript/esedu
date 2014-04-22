<?php

/**
* @author atorres
*/

require_once('grafico.php');

class GraficoNivelCurso extends GraficoNivel
{
	public $_name = "alumnos_nivel_curso";
	public $_text = "Promedio alumnos por grado por nivel";

	private $curso_nivel = array('Educación Especial'=>1, 'Educación Parvularia'=>2, 'Enseñanza Básica'=>8, 'Enseñanza Media'=>4);

	public function __construct($rbd = null, $agno = 2013)
	{
		$ci =& get_instance();
		$dbs = $ci->db->where('rbd', $rbd)->where('agno', $agno)->get('nivel_matricula')->result();

		if(!$dbs){
			$this->_valido = false;
			return false;	
		} 

		foreach ($dbs as $key => $db) {
			$this->_datos[] = "['$db->nivel_ensenanza_agregado', ".($db->numero_alumnos/$this->curso_nivel[$db->nivel_ensenanza_agregado]?:'null')."]";
		}
		$this->_datos = implode(',', $this->_datos);
	}
}