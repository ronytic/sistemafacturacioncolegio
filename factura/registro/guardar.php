<?php
require_once("../../login/check.php");
if(!isset($_POST)){
  exit();
}
/*echo "<pre>";
print_r($_POST);
echo "</pre>";*/

$FechaFactura=$_POST['FechaFactura'];
$NFactura=$_POST['NFactura'];
$NReferencia=$_POST['NReferencia'];
$CodAlumno=$_POST['CodAlumno'];
$FacturaAlumno=$_POST['FacturaAlumno'];
$Nit=$_POST['Nit'];
$Complemento=$_POST['Complemento'];
$NombreFactura=$_POST['NombreFactura'];
$a=$_POST['a'];
$Observacion=$_POST['Observacion'];
$TotalBs=$_POST['TotalBs'];
$Cancelado=$_POST['Cancelado'];
$MontoDevuelto=$_POST['MontoDevuelto'];


include_once("../../class/config.php");
$config=new config();
$NumeroAutorizacion=$config->mostrarConfig("NumeroAutorizacion",1);
$FechaLimiteEmision=$config->mostrarConfig("FechaLimiteEmision",1);
$LlaveDosificacion=($config->mostrarConfig("LlaveDosificacion",1));
$NitEmisor=$config->mostrarConfig("NitEmisor",1);
$ActividadEconomica=$config->mostrarConfig("ActividadEconomica",1);
$RazonSocialEmisor=$config->mostrarConfig("NombreEmpresa",1);
$LeyendaPiePagina=$config->mostrarConfig("LeyendaPiePagina",1);
$LeyendaPiePagina2=$config->mostrarConfig("LeyendaPiePagina2",1);
$ImagenFondo=$config->mostrarConfig("ImagenFondo",1);


include_once("../../class/factura.php");
$factura=new factura();

/*Obtenemos Nuevo Numero de Factura para Verificar*/
$f=$factura->ObtenerNFactura($NumeroAutorizacion);
$f=array_shift($f);
$NFactura=$f['NFacturaActual'];
if($NFactura==""){$NFactura=1;}


$f=$factura->ObtenerNReferencia();
$f=array_shift($f);
$NReferencia=$f['NReferencia'];
if($NReferencia==""){$NReferencia=1;}

//echo $NFactura;

/*Finalizamos la Obtención del Numero de Factura*/


$FechaCodigo=date("Ymd",strtotime($FechaFactura));
$TotalBsCodigo=round(str_replace(',', '.', $TotalBs), 0);
//echo $LlaveDosificacion;
//exit();
require_once("../generar.php");


$datos=generarCodigoControl($NumeroAutorizacion,$NFactura,$Nit,$FechaCodigo,$TotalBsCodigo,$LlaveDosificacion);
$TxtCodigoDeControl=$datos['Codigo1'];
$TxtCodigoDeControl2=$datos['Codigo2'];



$LlaveDosificacion=$factura->escapar($LlaveDosificacion);
$valores=array(
"FechaFactura"=>"'$FechaFactura'",
"NFactura"=>"'$NFactura'",
"NReferencia"=>"'$NReferencia'",
"FacturaAlumno"=>"'$FacturaAlumno'",
"CodAlumno"=>"'$CodAlumno'",
"Nit"=>"'$Nit'",
"Complemento"=>"'$Complemento'",
"Factura"=>"'$NombreFactura'",
"TotalBs"=>"'$TotalBs'",
"Cancelado"=>"'$Cancelado'",
"MontoDevuelto"=>"'$MontoDevuelto'",
"Observacion"=>"'$Observacion'",
"Estado"=>"'Valido'",
"Tipo"=>"'General'",
"MontoCodigo"=>"'$TotalBsCodigo'",
"NumeroAutorizacion"=>"'$NumeroAutorizacion'",
"LlaveDosificacion"=>"'$LlaveDosificacion'",
"CodigoControl"=>"'$TxtCodigoDeControl'",
"FechaLimiteEmision"=>"'$FechaLimiteEmision'",
"NitEmisor"=>"'$NitEmisor'",
"RazonSocialEmisor"=>"'$RazonSocialEmisor'",
"ActividadEconomica"=>"'$ActividadEconomica'",
"LeyendaPiePagina"=>"'$LeyendaPiePagina'",
"LeyendaPiePagina2"=>"'$LeyendaPiePagina2'",
"ImagenFondo"=>"'$ImagenFondo'",

);

/*echo "<pre>";
print_r($valores);
echo "</pre>";*/

/*exit();*/


$factura->insertarRegistro($valores);

$CodFactura=$factura->ultimo();
//echo $CodFactura;


include_once("../../class/facturadetalle.php");
$facturadetalle=new facturadetalle();
include_once("../../class/cuota.php");
$cuota=new cuota();
foreach($a as $f){
    $CodAlumno=$f['CodAlumno'];
    $Nombre=$f['Nombre'];
    $Cuota=$f['Cuota'];
    $MontoCuota=$f['MontoCuota'];
    $CodCuotas=array();
    if(count($Cuota)>0){
    foreach($Cuota as $ck=>$cv){
        array_push($CodCuotas,$ck);
        $cuota->actualizarCuota(array("MontoPagar"=>"'$MontoCuota'","Factura"=>"'$NFactura'","Cancelado"=>"1","Fecha"=>"'".date("Y-m-d H:i:s")."'","Observaciones"=>"'Facturado'"),"CodCuota=$ck");
    }
    }
    $Total=$f['Total'];
    $valordet=array(
        "CodFactura"=>"'$CodFactura'",
        "CodAlumno"=>"'$CodAlumno'",
        "Nombre"=>"'$Nombre'",
        "CodCuota"=>"'".implode(",",$CodCuotas)."'",
        "MontoCuota"=>"'$MontoCuota'",
        "Total"=>"'$Total'",
        "Tipo"=>"'General'",
    );

    /*echo "<pre>";
    print_r($valordet);
    echo "</pre>";*/
    $facturadetalle->insertarRegistro($valordet);
}

/*echo "<pre>";
print_r($valores);
echo "</pre>";
*/
header("Location:../ver/ver.php?Cod=".$CodFactura);
?>
