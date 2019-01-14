<?php
require_once("../../login/check.php");
if(isset($_POST)){
?>
<form class="" action="registrohermano.php" method="post">
  <input type="hidden" name="CodAlumno" value="<?php echo $_POST['CodAlumno']?>">
  <input type="submit" name="" value="Inscribir Hermano" class="btn btn-success">
</form>
<?php } ?>
