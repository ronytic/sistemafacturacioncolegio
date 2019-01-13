<?php include_once($folder."login/check.php");?>
<?php
include_once(RAIZ."class/curso.php");
include_once(RAIZ."class/alumno.php");
if(isset($_GET['CodAlumno'])){
	$CodAlumno=$_GET['CodAlumno'];
	$alumno=new alumno;
	$al=array_shift($alumno->mostrarTodoDatos($CodAlumno));
}
if(isset($_GET['CodCurso'])){
	$CodCurso=$_GET['CodCurso'];
}
if(empty($CodCurso)){
	if(isset($al))
	$CodCurso=$al['CodCurso'];
}
$curso=new curso;
if(!isset($listacurso)){
?>
  <select class="form-control" id="selectcurso" name="CodCurso" data-placeholder="Seleccione un Curso" >
      <option value="">Seleccionar</option>
  <?php
$i=0;
  foreach($curso->mostrar() as $cu){$i++;
      ?><option value="<?php echo $cu['CodCurso'];?>" <?php //echo $i==1 || $CodCurso==$cu['CodCurso']?'selected="selected"':'';?> rel=""><?php echo eliminarEspaciosDobles($cu['Nombre']);?></option>
			<?php
  }
  ?>
  </select>
<?php
}else{
	$i=0;
	foreach($curso->mostrar() as $cu){$i++;
	?>

	<input type="radio" name="cur" value="<?php echo $cu['CodCurso']?>" id="c<?php echo $cu['CodCurso']?>" class="radiolistadocurso"><label for="c<?php echo $cu['CodCurso']?>"><?php echo $cu['Nombre']?></label>
	<?php
	}
}
 ?>
