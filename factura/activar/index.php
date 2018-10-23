<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Activación de Facturación con Servicio de Impuestos";

include_once("../../cabecerahtml.php");
?>
<script type="text/javascript">
$(document).on("ready",function(){
    $(document).on("change",".Estado",function(){
       var codfactura=$(this).attr("rel");
       var estado=$(this).val();
       $.post("actualizar.php",{"codfactura":codfactura,"estado":estado},function(){
            $(".formulariobusqueda")   .submit();
        });
    });
});
</script>
<?php include_once("../../cabecera.php");?>
<div class="col-lg-12">
    <form action="busqueda.php" method="post" class="formulariobusqueda" data-respuesta="respuestaformulario">
    <div class="table-responsive">
    <table class="table table-bordered table-hover">
        <tr>
            <td class="text-center text-bold" colspan="1" width="30%">Número de Autorización<br><input type="text" name="NumeroAutorizacion" class="form-control"  value="7904006306693"></td>
            <td class="text-center text-bold" width="200">Nº de Factura<br><input type="text" name="NFactura" class="form-control text-right"  value="876814"></td>
            <td class="text-center text-bold">Nit<br><input type="text" name="Nit" class="form-control"  value="1665979" size="8"></td>
        </tr>
        <tr>
            <td class="text-center text-bold">Fecha de Factura<br><input type="date" name="FechaFactura" class="form-control" autofocus value="2008-05-19" required></td>
            
            <td class="text-center text-bold">Total en Bs<br><input type="number" name="TotalBsCodigo" class="form-control text-right"  value="35958.6" step="0.01"></td>
            <td class="text-center text-bold"  colspan="2">Llave de Dosificación<br><input type="text" name="LlaveDosificacion" class="form-control"  value="zZ7Z]xssKqkEf_6K9uH(EcV+%x+u[Cca9T%+_$kiLjT8(zr3T9b5Fx2xG-D+_EBS"></td>
        </tr>
    </table>
        
        </div>
        <input type="submit" value="Generar" class="btn btn-info"> (Código de Control: <strong>7B-F3-48-A8</strong>)
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
<?php include_once("../../pie.php");?>