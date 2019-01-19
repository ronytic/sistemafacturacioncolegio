<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Espera de Rude";
include_once($folder."cabecerahtml.php");
?>
<script language="javascript" type="text/javascript" src="../../js/rude/espera.js"></script>
<?php include_once($folder."cabecera.php");?>
<div class="col-lg-12">
        	<form action="ver.php" method="post">
        	<table class="table table-bordered">
            	<tr>
                    <td>Fecha:
                    	<input type="date" name="Fecha" value="<?php echo fecha2Str("",0)?>" class="form-control">
                    </td>
                    <td>Estado:
                    	<select name="Estado" class="form-control">
                        	<option value="">Seleccionar</option>
                        	<option value="Espera">Espera</option>
                            <option value="Proceso">Proceso</option>
                        </select>
                    </td>
            		<td><br><input type="button" class="btn btn-success" value="Ver" id="ver"></td>
                </tr>
            </table>
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
