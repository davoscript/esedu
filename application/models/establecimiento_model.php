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

	public function getByBounds($longMin = 0.0, $longMax = 0.0, $latMin = 0.0, $latMax = 0.0, $ratio_sidebar = null, $filtros = null, $order = null, $page = 0, $per_page = 10){
		//$longDiff = ($longMax - $longMin) / 20.0;
		//$longMin += $longDiff;
		//$longMax -= $longDiff;

		if($ratio_sidebar){
			$longDiff = ($longMax - $longMin) * $ratio_sidebar;
			$longMin += $longDiff;
			//$longMax -= $longDiff;			
		}

		$latDiff = ($latMax - $latMin) * 0.05;
		$latMin += $latDiff;
		$latMax -= $latDiff;

		$poligono = "GeomFromText('Polygon(($longMin $latMin,$longMin $latMax,$longMax $latMax,$longMax $latMin,$longMin $latMin))', 4326)";
		$query = "SELECT rdb, nombre_establecimiento as nombre, dependencia, X(geopunto) as longitud, Y(geopunto) as latitud, direccion, direccion_n, nombre_comuna, psu, simce, docentehh_alumno, ";
		
		if($order){
			$query .= ' ( ';

			foreach ($order as $i=>$o) {
				$order[$i] = $o.'_norm * '.(1.0-$i*0.2);
			}

			$query .= implode(' + ', $order);
			$query .= ' ) as prioriza ';
		}
		else
			$query .= ' psu as prioriza ';

		$query .= " FROM est_busqueda WHERE MBRContains($poligono, geopunto) ";

		foreach ($filtros as $filtro => $opciones) {
			
			if( $filtro == 'nivel_ensenanza' ){
				$query .= ' AND (';
				
				$opcs = array();
				foreach ($opciones as $key => $op) {
					$opcs[] = "$filtro LIKE '%$op%'";
				}
				
				$query .= implode(' OR ',$opcs).')';
			}else{
				$query .= " AND $filtro IN ('".implode("','", $opciones)."')";
			}
		}

		$query .= " ORDER BY prioriza DESC ";
		
		//echo $query;
		$query .= " LIMIT $per_page OFFSET ".($per_page*$page);

		$result = $this->db->query($query)->result();
		
		//$result = $_POST;
		
		return $result;
	}
	
}