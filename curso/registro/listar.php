<?php
include_once("../../login/check.php");
$folder = "../../";
$titulo = "Listado de Cursos";

include_once("../../cabecerahtml.php");
?>
<script type="text/javascript">
    $(document).on("ready", function() {
        $(document).on("change", ".Estado", function() {
            var codfactura = $(this).attr("rel");
            var estado = $(this).val();
            $.post("actualizar.php", {
                "codfactura": codfactura,
                "estado": estado
            }, function() {
                $(".formulariobusqueda").submit();
            });
        });
    });
</script>
<?php include_once("../../cabecera.php"); ?>
<div class="col-lg-12">
    <form action="busqueda.php" method="post" class="formulariobusqueda" data-respuesta="respuestaformulario">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <tr>
                    <td class="text-center text-bold">Nombre<br><input type="text" name="Nombre" class="form-control" autofocus value=""></td>
                </tr>
            </table>
        </div>
        <input type="submit" value="Buscar" class="btn btn-info">
    </form>
</div>
</div>
</div>
</div>
<div class="hpanel">
    <div class="panel-heading">
    </div>

    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12 table-responsive" id="respuestaformulario">

            </div>
            <?php include_once("../../pie.php"); ?>