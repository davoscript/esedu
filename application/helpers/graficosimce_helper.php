<?php 

/**
* @author
*/

require_once('grafico.php');

class GraficoSimce extends Grafico
{
	public $_name = 'simce_';
	public $_text = 'SIMCE ';
	public $_labels = "['Año', 'LEC', 'MAT', 'Alumnos']";
	public $_ydos = 2;

	private $_niveles = array(4=>'4to Básico', 8=>'8vo Básico', 10=>'2do Medio');
	
	function __construct($rbd = null, $nivel = 4)
	{
		$this->_name .= "$nivel";
		$this->_text .= $this->_niveles[$nivel];

		$ci =& get_instance();
		$simce = $ci->db->where('rdb', $rbd)->where('nivel', $nivel)->order_by('agno', 'ASC')->limit(10)->get('simce')->result();

		if(!$simce){
			$this->_valido = false;
			return;
		} 
		
		foreach ($simce as $key => $s) {
			$this->_datos[] = "['$s->agno', $s->simce_leng, $s->simce_mate, ".($s->alumnos_leng+$s->alumnos_mate)."]";
		}
		$this->_datos = implode(',', $this->_datos);
	}
}