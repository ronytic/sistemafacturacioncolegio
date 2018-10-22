<?php
include_once("../../login/check.php");
//extract($_POST);
//print_r($_POST);
$NumeroAutorizacion=$_POST['NumeroAutorizacion'];
$Nit=$_POST['Nit'];
$NFactura=$_POST['NFactura'];
$FechaFactura=$_POST['FechaFactura'];
$TotalBs=$_POST['TotalBsCodigo'];
$FechaCodigo=date("Ymd",strtotime($FechaFactura));
$TotalBsCodigo=round(str_replace(',', '.', $TotalBs), 0);
$LlaveDosificacion=stripslashes($_POST['LlaveDosificacion']);
//echo $LlaveDosificacion;

include_once("../../factura/codigocontrol.class.php");
$CodigoControl=new CodigoControl($NumeroAutorizacion,$NFactura,$Nit,$FechaCodigo,$TotalBsCodigo,$LlaveDosificacion);
$TxtCodigoDeControl=$CodigoControl->generar();

//$CodigoControl2=new CodigoControl($NumeroAutorizacion,$NFactura,$Nit,$FechaCodigo,$TotalBsCodigo,$LlaveDosificacion);
//$TxtCodigoDeControl2=$CodigoControl2->generar();
require_once("../../factura/facturacion2/CodigoControlV7.php");

$TxtCodigoDeControl2=CodigoControlV7::generar($NumeroAutorizacion, $NFactura, $Nit, $FechaCodigo, $TotalBsCodigo, $LlaveDosificacion);



?>
<table class="table table-bordered table-striped table-hover">
<thead>
    <tr>
        <th>Número de Autorización</th>
        <th>Nº Factura</th>
        <th>Nit</th>
        <th>Fecha Factura</th>
        <th>Total Bs</th>
        <th width="400">Llave de Dosificación</th>
        <th width="600">Código de Control</th>
        <th width="600">Código de Control 2</th>
    </tr>
</thead>
<tr>
    <td><small><?php echo $NumeroAutorizacion?></small></td>
    <td><small><?php echo $NFactura?></small></td>
    <td><small><?php echo $Nit?></small></td>
    <td><small><?php echo $FechaCodigo?></small></td>
    <td><small><?php echo $TotalBsCodigo?></small></td>
    <td><small><?php echo $LlaveDosificacion?></small></td>
    <td><strong><span class="badge badge-info"><?php echo $TxtCodigoDeControl?></span></strong></td>
    <td><strong><span class="badge badge-info"><?php echo $TxtCodigoDeControl2?></span></strong></td>
</tr>
<?php

    

//listadotabla(array("nombre"=>"Factura A","nit"=>"Nit","fechaventa"=>"Fecha de Factura","NFactura"=>"Nº Factura","total"=>"Total","pagado"=>""),$datos,1,"","","",array("../../impresion/factura/facturaticket.php"=>"Ver Factura"),"","_blank");
?>

</table>