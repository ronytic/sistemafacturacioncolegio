<?php
include_once("../../login/check.php");
if(isset($_POST)){
	$l=$_POST['l'];
	?>
    <tr>
    	<td class="der"><?php echo $l?></td>
        <td>
        	<div class="input-group">
            	<input type="hidden"  name="a[<?php echo $l?>][CodAlumno]" rel="<?php echo $l?>" class="CodigoAlumno">
            	<input type="text"	class="form-control" readonly name="a[<?php echo $l?>][Nombre]" rel="<?php echo $l?>">
                <span class="input-group-btn">
                <a class="btn btn-primary buscar" rel="Registro" rel-id="<?php echo $l?>"><i class="glyphicon glyphicon-search"></i></a>
                </span>
            </div>
         </td>
        <td>
        
            <!--<input type="hidden"  name="a[<?php echo $l?>][CodCuota]" rel="<?php echo $l?>" class="CodCuota">
        <select class="form-control MostrarCuota" name="a[<?php echo $l?>][Cuota][]" rel="<?php echo $l?>" multiple size="2" autocomplete="off">
        </select>-->
        <div class="cuotas" rel="<?php echo $l?>">
            
        </div>
        </td>
        <td>
        	<input type="text" readonly class="form-control text-right MontoCuota" value="0.00" name="a[<?php echo $l?>][MontoCuota]" rel="<?php echo $l?>">
        </td>

        <td class="contenedoreliminar">
        	<input type="number" readonly class="form-control text-right Total" value="0.00" name="a[<?php echo $l?>][Total]" rel="<?php echo $l?>">
            <a class="btn btn-danger btn-xs eliminar" ><i class="glyphicon glyphicon-remove"></i></a>
        </td>

    </tr>
    <?php	
}
?>