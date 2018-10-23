<?php
function generarCodigoControl($NumeroAutorizacion,$NFactura,$Nit,$FechaCodigo,$TotalBsCodigo,$LlaveDosificacion){
    /*echo "1:$NumeroAutorizacion<br>";
    echo "2:$NFactura<br>";
    echo "3:$Nit<br>";
    echo "4:$FechaCodigo<br>";
    echo "5:$TotalBsCodigo<br>";
    echo "6:$LlaveDosificacion<br>";*/
    include_once("../../factura/facturacion1/codigocontrol.class.php");
    $CodigoControl=new CodigoControl($NumeroAutorizacion,$NFactura,$Nit,$FechaCodigo,$TotalBsCodigo,$LlaveDosificacion);
    $TxtCodigoDeControl=$CodigoControl->generar();

    require_once("../../factura/facturacion2/CodigoControlV7.php");

    $TxtCodigoDeControl2=CodigoControlV7::generar($NumeroAutorizacion, $NFactura, $Nit, $FechaCodigo, $TotalBsCodigo, $LlaveDosificacion);
    $datos=array("Codigo1"=>$TxtCodigoDeControl,"Codigo2"=>$TxtCodigoDeControl2);
    //echo "7:$TxtCodigoDeControl2<br>";
    if($datos['Codigo1']==$datos['Codigo2']){
        return $datos;
    }else{
        generarCodigoControl($NumeroAutorizacion,$NFactura,$Nit,$FechaCodigo,$TotalBsCodigo,$LlaveDosificacion);
    }
}
?>