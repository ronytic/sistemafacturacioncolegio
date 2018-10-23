<?php
require_once("../../login/check.php");

/*echo "<pre>";
print_r($_POST);
echo "</pre>";*/

$FechaFactura=$_POST['FechaFactura'];
$NFactura=$_POST['NFactura'];
$NReferencia=$_POST['NReferencia'];
$CodAlumno=$_POST['CodAlumno'];
$FacturaAlumno=$_POST['FacturaAlumno'];
$Nit=$_POST['Nit'];
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
$ImagenFondo=$config->mostrarConfig("ImagenFondo",1);

$FechaCodigo=date("Ymd",strtotime($FechaFactura));
$TotalBsCodigo=round(str_replace(',', '.', $TotalBs), 0);
require_once("../generar.php");


$datos=generarCodigoControl($NumeroAutorizacion,$NFactura,$Nit,$FechaCodigo,$TotalBsCodigo,$LlaveDosificacion);
$TxtCodigoDeControl=$datos['Codigo1'];
$TxtCodigoDeControl2=$datos['Codigo2'];

$valores=array(
"FechaFactura"=>"'$FechaFactura'",
"NFactura"=>"'$NFactura'",
"NReferencia"=>"'$NReferencia'",
"FacturaAlumno"=>"'$FacturaAlumno'",
"CodAlumno"=>"'$CodAlumno'",
"Nit"=>"'$Nit'",
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
"ImagenFondo"=>"'$ImagenFondo'",
    
);

    
include_once("../../class/factura.php");
$factura=new factura();
$factura->insertarRegistro($valores);
    
$CodFactura=$factura->ultimo();
//echo $CodFactura;
    

include_once("../../class/facturadetalle.php");
$facturadetalle=new facturadetalle();

foreach($a as $f){
    $CodAlumno=$f['CodAlumno'];
    $Nombre=$f['Nombre'];
    $Cuota=$f['Cuota'];
    $CodCuotas=array();
    foreach($Cuota as $ck=>$cv){
        array_push($CodCuotas,$ck);
    }
    $MontoCuota=$f['MontoCuota'];
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
$url="";
$titulo="Mensaje de Confirmación";
$subtitulo="";
$titulo2=" ";
$folder="../../";
include_once($folder."cabecerahtml.php");
?>
<?php include_once($folder."cabecera.php");?>
<div class="col-lg-12">
    <iframe src="<?=$url?>" frameborder="0" width="100%" height="500"></iframe>
</div>
<?php include_once($folder."pie.php");?>