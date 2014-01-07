<?php
Class Establecimiento_model extends CI_Model{
	
	// function validate(){
		
	//   $this->db->where('username', $this->input->post('username'));
	//   $this->db->where('password', md5($this->input->post('password')));
	//   $q = $this->db->get('users');
		
	//   if( $q->num_rows == 1 ){
	//     return true;
	//   }
	// }

	public function getByBounds($longMin = 0, $longMax = 0, $latMin = 0, $latMax = 0, $filtros = null){
		$poligono = "GeomFromText('Polygon(($longMin $latMin,$longMin $latMax,$longMax $latMax,$longMax $latMin,$longMin $latMin))', 4326)";
		$query = "SELECT rdb, nombre_establecimiento as nombre, X(geopunto) as longitud, Y(geopunto) as latitud";
		$query .= " FROM est_matri_2013 WHERE MBRContains($poligono, geopunto)";

		foreach ($filtros as $filtro => $opciones) {
			$query .= " AND $filtro IN ('".implode("'", $opciones)."')";
		}

		$result = $this->db->query($query)->result();
		
		//$result = $_POST;
		
		return $result;
	}
	
}