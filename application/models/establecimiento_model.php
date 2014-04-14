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

	public function getByBounds($longMin = 0, $longMax = 0, $latMin = 0, $latMax = 0, $filtros = null, $order = null){
		$poligono = "GeomFromText('Polygon(($longMin $latMin,$longMin $latMax,$longMax $latMax,$longMax $latMin,$longMin $latMin))', 4326)";
		$query = "SELECT rdb, nombre_establecimiento as nombre, dependencia, X(geopunto) as longitud, Y(geopunto) as latitud, direccion, direccion_n, psu, simce, nombre_comuna";
		$query .= " FROM est_busqueda WHERE MBRContains($poligono, geopunto)";

		foreach ($filtros as $filtro => $opciones) {
			
			//$query .= " AND $filtro IN ('".implode("','", $opciones)."')";
			/*$query .= " AND ";
			foreach ($opciones as $key => $op) {
				$query .= " $filtro LIKE  ";
			}*/
			
			
			if( $filtro == 'nivel_ensenanza' ){
				$query .= " AND (";
				foreach ($opciones as $key => $op) {
					if( $key == 1 ){
						$query .= " OR $filtro LIKE '%$op%'";
					}else{
						$query .= " $filtro LIKE '%$op%'";
					}
				}
				$query .= ")";
			}else{
				$query .= " AND $filtro IN ('".implode("','", $opciones)."')";
			}
		}
		
		$query .= " ORDER BY $order DESC";
		
		//echo $query;

		$result = $this->db->query($query)->result();
		
		//$result = $_POST;
		
		return $result;
	}
	
}