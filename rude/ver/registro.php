<?php

if(!empty($_POST['CodAlumno'])){
	$CodAlumno=$_POST['CodAlumno'];
	?>
	<iframe src="../../impresion/rude/rude2019.php?CodAlumno=<?php echo $CodAlumno; ?>" width="100%" height="1000"></iframe>
	<?php
}
?>
