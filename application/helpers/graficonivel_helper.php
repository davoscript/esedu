<?php

/**
* @author atorres
*/

require_once('grafico.php');

class GraficoNivel extends Grafico
{
	public $_name = "Alumnos_por_Nivel";
	public $_text = "Alumnos por Nivel";
	public $_labels = "['Nivel', 'Alumnos']";

	public function __construct($rbd = null, $agno = 2013)
	{
		$ci =& get_instance();
		$dbs = $ci->db->where('rbd', $rbd)->where('agno', $agno)->get('nivel_matricula')->result();
		if(!$dbs){
			$this->_valido = false;
			return false;	
		} 

		$this->_text .= " $agno";

		foreach ($dbs as $key => $db) {
			$this->_datos[] = "['$db->nivel_ensenanza_agregado', $db->numero_alumnos]";
		}
		$this->_datos = implode(',', $this->_datos);
	}
}