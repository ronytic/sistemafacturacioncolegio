<?php
include_once("../../login/check.php");
php_start();

include_once("../../class/factura.php");
$factura=new factura;





$folder="../../";
$titulo="Registro de Factura";
$subtitulo="";
$titulo2=" ";
?>
<?php include_once($folder."cabecerahtml.php");

$NumeroAutorizacion=$config->mostrarConfig("NumeroAutorizacion",1);
$FechaLimiteEmision=$config->mostrarConfig("FechaLimiteEmision",1);



$f=$factura->ObtenerNFactura($NumeroAutorizacion);
$f=array_shift($f);
$NFactura=$f['NFacturaActual'];
if($NFactura==""){$NFactura=1;}


$f=$factura->ObtenerNReferencia();
$f=array_shift($f);
$NReferencia=$f['NReferencia'];
if($NReferencia==""){$NReferencia=1;}

$lectura=1;
?>
<link href="<?=$folder;?>css/estilo.css?1" rel="stylesheet" type="text/css">
<link href="../../js/core/select2-3.5.2/select2.css" rel="stylesheet" type="text/css">
<link href="../../js/core/select2-3.5.2/select2-bootstrap.css" rel="stylesheet" type="text/css">

<script src="../../js/core/select2-3.5.2/select2.min.js"></script>
<script src="https://terrylinooo.github.io/jquery.disableAutoFill/assets/js/jquery.disableAutoFill.min.js"></script>
<script src="../../js/factura/registro.js"></script>

<style type="text/css">

</style>
<?php include_once($folder."cabecera.php");?>
<div class="col-lg-12">

<form action="guardar.php" method="post" id="formulario" autocomplete="false">
    <div class="table-responsive">
        <span class="badge badge-<?=$FechaLimiteEmision<=date("Y-m-d")?'danger':'success'?>">Fecha Límite de Emisión: <strong><?php echo fecha2Str($FechaLimiteEmision)?></strong></span>
    <span class="badge badge-primary">Número de Autorización: <strong><?php echo ($NumeroAutorizacion)?></strong></span>

    <table class="table table-bordered inicio">
        <thead>
            <tr>
                <th>Fecha<br><input type="date" class="fecha form-control" name="FechaFactura" value="<?php echo fecha2Str("",0)?>" required <?=$lectura?'readonly':''?>></th>

                <th>Nº Factura<br><input type="number" class="derecha NFactura form-control" name="NFactura" value="<?php echo isset($_GET['f'])?$_GET['NFactura']:$NFactura?>" required <?=$lectura?'readonly':''?>></th>

                <th>Nº Referencia<br><input type="text" class="derecha span12 form-control" name="NReferencia" readonly value="<?php echo $NReferencia?>" required ></th>
            </tr>
            <tr>
                <th>Alumno<br>
                    <input type="hidden" id="" readonly name="CodAlumno">

                    <div class="input-group">
                      <input type="text" id=""  name="FacturaAlumno" class="form-control " readonly>
                        <span class="input-group-btn">
                           <a class="btn btn-info buscar " rel="BusquedaNit" href="#"><i class="glyphicon glyphicon-search"></i></a>
                        </span>
                    </div>

                </th>

                <th>CI/Nit<br><input type="number" class="span12 form-control" name="Nit" required></th>

                <th>Señores<br><input type="text" class="span12 form-control" name="NombreFactura" required value=""></th>

            </tr>
        </thead>

    </table>
    </div>
    <div class="table-responsive">
    <table class="table table-bordered table-hover table-condensed inicio">
        <thead>
            <tr>
                <th>N</th>
                <th>Alumno</th>
                <th width="70" style="width: 70px !important;">Cuota</th>
                <th width="150">Monto Cuota</th>
                <th width="150">Total</th>
                <!--<th width="50"></th>-->
            </tr>
        </thead>
        <tr id="senal">
            <td colspan="3" rowspan="4"><a class="btn btn-success btn-xs add-on aumentar pull-left" title="Aumentar"><i class="glyphicon glyphicon-plus"></i></a>
                <br>
                <textarea name="Observacion" class="form-control pull-right" rows="2" placeholder="Observacion"></textarea><br>


            <br>



            </td>
        </tr>
        <tr class="success">
            <td class="resaltar der" colspan="1">Total Bs</td><td><input type="number" name="TotalBs" class="form-control text-right TotalBs" value="0.00" step="0.01" <?=$lectura?'readonly':''?>></td>
        </tr>
        <tr class="info">
            <td class="resaltar der" colspan="1">Cancelado</td><td><input type="number" name="Cancelado"  class="form-control text-right Cancelado" value="0.00" min="0" step="0.01"></td>
        </tr>
        <tr class="warning">
            <td class="resaltar der" colspan="1">Cambio</td><td><input type="number" name="MontoDevuelto" <?=$lectura?'readonly':''?> class="form-control text-right MontoDevuelto" value="0.00" step="0.01"></td>
        </tr>
        <tr><td class="centrar" colspan="8"> <a href="./" class="btn btn-info">Cancelar</a>  <input type="submit" class="btn btn-<?=$FechaLimiteEmision<=date("Y-m-d")?'danger':'success'?>" id="guardar" value="Guardar" <?=$FechaLimiteEmision<=date("Y-m-d")?'disabled':''?>></td></tr>
    </table>
    </div>
</form>

</div>


<div class="modal bs-example-modal-"><!-- modal hide fade-->
    <div class="modal-dialog modal-" role="document">
 <div class="modal-content">
        <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Seleccionar Alumno
        </div>
        <div class="modal-body">
        <?php include_once("../../listar/listadodecurso.php");?>

        </div>
        <div class="modal-footer">
        <a href="#" class="btn btn-default" id="cerrar" data-dismiss="modal">Cerrar</a>
        <a href="#" class="btn btn-primary" id="seleccionar">Seleccionar Alumno</a>
        </div>
</div>
</div>
</div>
<?php include_once($folder."pie.php");?>
