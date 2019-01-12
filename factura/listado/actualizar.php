<?php
include_once("../../login/check.php");
extract($_POST);
include_once("../../class/factura.php");
$factura=new factura;
$valores=array("Estado"=>"'$estado'");
$factura->actualizarRegistro($valores,"codfactura=".$codfactura);

include_once("../../class/facturadetalle.php");
$facturadetalle=new facturadetalle;

include_once("../../class/cuota.php");
$cuota=new cuota;

if($estado=="Anulado"){
	$facturad=$facturadetalle->mostrarFacturaDetalleCod($codfactura);
	foreach($facturad as $fd){
		$CodigosCuota=$fd['CodCuota'];
		$cuota->actualizarCuota(array("Cancelado"=>0,"Observaciones"=>"'Anulado'"),"CodCuota IN($CodigosCuota)");		
	}
}else{
	$facturad=$facturadetalle->mostrarFacturaDetalleCod($codfactura);
	foreach($facturad as $fd){
		$CodigosCuota=$fd['CodCuota'];
		$cuota->actualizarCuota(array("Cancelado"=>1,"Observaciones"=>"'Facturado-Rehabilitado'"),"CodCuota IN($CodigosCuota)");		
	}
}



?>