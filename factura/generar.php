<?php
function generarCodigoControl($NumeroAutorizacion,$NFactura,$Nit,$FechaCodigo,$TotalBsCodigo,$LlaveDosificacion){
    include_once("../../factura/facturacion1/codigocontrol.class.php");
    $CodigoControl=new CodigoControl($NumeroAutorizacion,$NFactura,$Nit,$FechaCodigo,$TotalBsCodigo,$LlaveDosificacion);
    $TxtCodigoDeControl=$CodigoControl->generar();

    require_once("../../factura/facturacion2/CodigoControlV7.php");

    $TxtCodigoDeControl2=CodigoControlV7::generar($NumeroAutorizacion, $NFactura, $Nit, $FechaCodigo, $TotalBsCodigo, $LlaveDosificacion);
    $datos=array("Codigo1"=>$TxtCodigoDeControl,"Codigo2"=>$TxtCodigoDeControl2);
    if($datos['Codigo1']==$datos['Codigo2']){
        return $datos;
    }else{
        generarCodigoControl($NumeroAutorizacion,$NFactura,$Nit,$FechaCodigo,$TotalBsCodigo,$LlaveDosificacion);
    }
}
?>