<?php
include_once("../../login/check.php");


$NumeroAutorizacion=$_POST['NumeroAutorizacion'];
$Nit=$_POST['Nit'];
$NFactura=$_POST['NFactura'];
$FechaFactura=$_POST['FechaFactura'];
$TotalBs=$_POST['TotalBsCodigo'];
$FechaCodigo=date("Ymd",strtotime($FechaFactura));
$TotalBsCodigo=round(str_replace(',', '.', $TotalBs), 0);
$LlaveDosificacion=($_POST['LlaveDosificacion']);

require_once("../generar.php");

$datos=generarCodigoControl($NumeroAutorizacion,$NFactura,$Nit,$FechaCodigo,$TotalBsCodigo,$LlaveDosificacion);
$TxtCodigoDeControl=$datos['Codigo1'];
$TxtCodigoDeControl2=$datos['Codigo2'];



?>
<table class="table table-bordered table-striped table-hover">
    <tr>
        <td><strong>Número de Autorización</strong></td>
        <td><?php echo $NumeroAutorizacion?></td>
    </tr>
    <tr>
        <td><strong>Nº Factura</strong></td>
        <td><?php echo $NFactura?></td>
    </tr>
    <tr>
        <td><strong>Nit</strong></td>
        <td><?php echo $Nit?></td>
    </tr>
    <tr>
        <td><strong>Fecha de Factura</strong></td>
        <td><?php echo $FechaCodigo?></td>
    </tr>
    <tr>
        <td><strong>Total Bs</strong></td>
        <td><?php echo $TotalBsCodigo?></td>
    </tr>
    <tr>
        <td><strong>Llave de Dosificación</strong></td>
        <td><?php echo $LlaveDosificacion?></td>
    </tr>
    <tr>
        <td><strong>Código de Control</strong></td>
        <td><strong><span class="badge badge-info"><?php echo $TxtCodigoDeControl?></span></strong></td>
    </tr>
    <tr>
        <td><strong>Código de Control 2</strong></td>
        <td><strong><span class="badge badge-info"><?php echo $TxtCodigoDeControl2?></span></strong></td>
    </tr>

</table>