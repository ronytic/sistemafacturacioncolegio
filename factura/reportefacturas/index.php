<?php
require_once("../../login/check.php");
$titulo="Reporte de Facturas";
$folder="../../";
include_once($folder."cabecerahtml.php");
?>
<?php include_once($folder."cabecera.php");?>
<div class="col-lg-12">
    <form action="busqueda.php" method="post" class="formulariobusqueda" data-respuesta="respuestaformulario">
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
        <tr>
            <td class="text-center text-bold">Fecha Desde<br><input type="date" name="FechaDesde" class="form-control" autofocus value="<?php echo date("Y-m-d")?>" required></td>
            <td class="text-center">Fecha Hasta<input type="date" name="FechaHasta" class="form-control" value="<?php echo date("Y-m-d")?>"></td>
            
            
        </tr>
        </table>
    </div>
    <input type="submit" value="Generar" class="btn btn-info">
    </form>
</div>

</div>
</div>
</div>

<div class="hpanel">
    <div class="panel-heading"></div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12 table-responsive" id="respuestaformulario">

            </div>
<?php include_once($folder."pie.php");?>