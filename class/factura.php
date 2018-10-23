<?php
include_once("bd.php");
class factura extends bd{
	var $tabla="factura";	
	function mostrarFacturas($Condicion){
		$this->campos=array('*');
		$Condicion=$Condicion!=""?"$Condicion and ":"";
		return $this->getRecords("$Condicion Activo=1","NFactura,FechaFactura,Nit,Factura");
	}
	function mostrarNumeroFactura($Condicion){
		$this->campos=array('max(NFactura) as NFactura');
		$Condicicion=$Condicicion!=""?"$Condicicion and ":"";
		return $this->getRecords("$Condicicion Activo=1");
	}
	function mostrarFactura($CodFactura){
		$this->campos=array('*');
		return $this->getRecords("CodFactura=$CodFactura and Activo=1");
	}
    function ObtenerNFactura($NumeroAutorizacion){
        $this->campos=array("MAX(NFactura) +1 AS NFacturaActual");        
        return $this->getRecords("NumeroAutorizacion =  '$NumeroAutorizacion' and Activo=1");
    }
    function ObtenerNReferencia(){
        $this->campos=array("MAX(NReferencia) +1 AS NReferencia");        
        return $this->getRecords(" Activo=1");
    }
}
?>