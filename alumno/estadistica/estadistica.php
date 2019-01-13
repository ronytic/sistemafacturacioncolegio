<?php
include_once("../../login/check.php");
include_once("../../class/alumno.php");
include_once("../../class/curso.php");
if(!empty($_POST)){
	$al=new alumno;
  $curso=new curso;

	$CodAlumno=$_POST['CodAlumno'];
	$CantidadTotal=$al->contarInscritosTotal();
	$CantidadTotal=$CantidadTotal[0];
	?>

<span class="badge">Cantidad Total de Inscritos: <?php echo $CantidadTotal['CantidadTotal'];?> Alumnos</span>
<br><br>

    <table class="table table-bordered table-striped table-hover">
      <thead>
          <tr><th>Fechas</th><th>Cantidad Total</th></tr>
      </thead>

        <?php foreach($al->contarInscritoFechas() as $CantidadFechas){?>
        <tr><td><?php echo utf8_encode(strftime("%A, %d de %B del %Y",strtotime($CantidadFechas['FechaIns'])));?></td><td><?php echo $CantidadFechas['CantidadFecha'];?> Alumnos</td></tr>
        <?php
        }
		?>
    </table>
    <table class="table table-bordered table-striped table-hover">
      <thead>
    	   <tr><th>Cursos</th><th>Cantidad Total</th><th>Varones</th><th>Mujeres</th></tr>
      </thead>
      <tbody>


        <?php
        $tt=0;
        $tv=0;
        $tm=0;
        foreach($curso->mostrar() as $cur){
  				$var=$al->cantidadAlumno("Sexo=1 and CodCurso={$cur['CodCurso']} and Retirado=0");
  				$varones=array_shift($var);
  				$muj=$al->cantidadAlumno("Sexo=0 and CodCurso={$cur['CodCurso']} and Retirado=0");
  				$mujeres=array_shift($muj);
          $totalcurso=(int)$varones['Cantidad']+(int)$mujeres['Cantidad'];


          $tt=$tt+$totalcurso;
          $tv=$tv+$varones['Cantidad'];
          $tm=$tm+$mujeres['Cantidad'];
				?>
        <tr>
        	<td><?php echo $cur['Nombre'];?></td>
          <td><?php echo $totalcurso;?> Alumnos</td>
			    <td><?php echo $varones['Cantidad'];?> Alumnos</td>
          <td><?php echo $mujeres['Cantidad'];?> Alumnas</td>
        </tr>
        <?php
        }
        ?>
    </tbody>
    <tfoot>
      <tr>
        <th>Totales</th>
        <th><?php echo $tt;?> Alumnos</th>
        <th><?php echo $tv;?> Alumnos</th>
        <th><?php echo $tm;?> Alumnas</th>
      </tr>
    </tfoot>
    </table>
    <div class="clear"></div>
    <?php

}

?>
