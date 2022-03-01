<?php

if (!empty($_POST['CodAlumno'])) {
	$CodAlumno = $_POST['CodAlumno'];
?>
	<iframe src="../../impresion/alumno/boletainscripcion.php?CodAlumno=<?php echo $CodAlumno; ?>" width="100%" height="1000"></iframe>
<?php
}
?>