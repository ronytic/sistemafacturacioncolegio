<?php
include_once("../login/check.php");
if(!empty($_POST) && isset($_POST)){
	$CodCurso=$_POST['CodCurso'];
	if(isset($_POST['CodAlumno'])){
		$CodAlumno=$_POST['CodAlumno'];
	}
	include_once("../class/alumno.php");
	$alumno=new alumno;
    ?>
<option value="">Seleccionar</option>
<?php
	foreach($alumno->mostrarDatosAlumnos($CodCurso,0) as $al){
		?><option value="<?php echo $al['CodAlumno']?>" <?php echo $al['CodAlumno']==$CodAlumno?'selected="selected"':'';?> ><?php echo ucwords(eliminarEspaciosDobles($al['Paterno']));?> <?php echo ucwords(eliminarEspaciosDobles($al['Materno']));?> <?php echo ucwords(eliminarEspaciosDobles($al['Nombres']));?></option> <?php
	}
}
?>
