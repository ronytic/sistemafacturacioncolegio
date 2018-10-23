<?php
require_once("../../login/check.php");
$Cod=$_GET['Cod'];
$url="../../impresion/factura/facturasinqr.php?codfactura=$Cod";
$titulo="Ver Factura";
$subtitulo="";
$titulo2=" ";
$folder="../../";
include_once($folder."cabecerahtml.php");
?>
<?php include_once($folder."cabecera.php");?>
<div class="col-lg-12">
    <a href="<?=$url?>" target="_blank" class="btn btn-danger">Abrir en Pestaña Nueva</a>
    <iframe src="<?=$url?>" frameborder="0" width="100%" height="500"></iframe>
</div>
<?php include_once($folder."pie.php");?>