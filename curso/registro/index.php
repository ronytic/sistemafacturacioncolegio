<?php
include_once("../../login/check.php");
$folder = "../../";
$titulo = "Registrar Nuevo Curso";
extract($_GET);


include_once("../../cabecerahtml.php");
?>
<script type="text/javascript">

</script>
<?php include_once("../../cabecera.php"); ?>
<div class="col-lg-12">
    <form action="guardar.php" method="post">

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <tr>
                    <td class="text-right text-bold" width="50%">Nombre</td>
                    <td><input type="text" name="Nombre" class="form-control" autofocus value=""></td>
                </tr>
                <tr>
                    <td class="text-right text-bold" width="50%">Abreviado</td>
                    <td><input type="text" name="Abreviado" class="form-control" autofocus value="" maxlength="10"></td>
                </tr>
                <tr>
                    <td class="text-right text-bold" width="50%">Orden</td>
                    <td><input type="text" name="Orden" class="form-control" autofocus value=""></td>
                </tr>
                <tr>
                    <td class="text-right text-bold" width="50%">Monto Cuota</td>
                    <td><input type="number" name="MontoCuota" class="form-control" autofocus value="" min="0" step="0.01"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Guardar" class="btn btn-info"></td>
                </tr>
            </table>
        </div>

    </form>
</div>
<?php include_once("../../pie.php"); ?>