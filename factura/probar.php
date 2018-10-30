<?php
$Nit="1665979";
$NFactura="876814";
$NAutorizacion="7904006306693";
$FechaFactura="20080519";
$Monto=35958.6;
$Monto=round(str_replace(',', '.', $Monto), 0);
    //k##MCZE4P7M{2XSKpF\[*)B{et@6U{-62A8ATN2NHAQCTs{BJ6g@7p3KI+_Q=9S3
require_once("../class/config.php");
$config=new config;
$LlaveDosificacion=($config->mostrarConfig("LlaveDosificacion",1));
echo $LlaveDosificacion;
include_once("generar.php");
$d= generarCodigoControl($NAutorizacion,$NFactura,$Nit,$FechaFactura,$Monto,$LlaveDosificacion);
echo "<pre>";
print_r($d);
echo "</pre>";
?>