<?php
require_once("../../login/check.php");
$titulo="Reporte de Deudores";
$folder="../../";
include_once($folder."cabecerahtml.php");
?>
<?php include_once($folder."cabecera.php");?>
<div class="col-lg-12">
    <form action="busqueda.php" method="post" class="formulariobusqueda" data-respuesta="respuestaformulario">
    <div class="table-responsive">
       <div class="col-lg-4">

        Curso<?php include_once("../../listar/listadosolocurso.php")?>
        <input type="submit" value="Revisar" class="btn btn-info">
        </div>



    </div>

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
