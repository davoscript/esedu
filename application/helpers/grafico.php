<?php 

/**
* @author atorres
*/
class Grafico
{
	public $_name = '';
	public $_text = '';
	public $_datos = array();
	public $_labels = array();
	public $_ydos = null;
	protected $_valido = true;

	public function toArray(){
		$r = array('name'=>$this->_name, 'text'=>$this->_text, 'datos'=>$this->_datos, 'labels'=>$this->_labels);
		if($this->_ydos != null) $r += array('ydos'=>$this->_ydos);
		return $r;
	}

	public function isValid(){
		return $this->_valido;
	}
}