<?php
include_once("bd.php");
class curso extends bd{
	var $tabla="curso";	
	function listar($ini=1,$fin=26){
		$this->campos=array('CodCurso','Nombre','MontoCuota');
		return $this->getRecords("CodCurso BETWEEN $ini and $fin");
	}
	function mostrar(){
		$this->tabla="curso c";
		$this->campos=array('c.*');
		return $this->getRecords("c.Activo=1","c.Orden");	
	}
	function mostrarCurso($CodCurso){
		$this->campos=array('*');
		return $this->getRecords("CodCurso=$CodCurso");
	}
}
?>