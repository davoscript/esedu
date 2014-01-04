<?php
class Ajax extends CI_Controller{
  
  function get_establecimiento($rbd){
  	
	$establecimientos[8584] = array(
		'rbd' => 'rbd',
		'nombre' => 'INSTITUTO NACIONAL',
		'comuna' => 'Santiago',
		'región' => 'Metropolitana',
		'dependencia' => 'Municipal',
		'area_geo' => 'Urbano',
		'lat' => '-33,44468254',
		'lon' => '-70,65031555',
		'nivel' => 'Básica niños/Enseñanza Media HC Jóvenes'
	);
	
  	echo json_encode($establecimientos[$rbd]); 
  }
  
}
?>