<?php
require_once("../../login/check.php");
if (isset($_POST)) {
  require_once("../../class/tmp_alumno.php");
  $tmp_alumno = new tmp_alumno;

  require_once("../../class/curso.php");
  $curso = new curso;
  $a = $tmp_alumno->mostrarTodoDatos($_POST['CodAlumno']);
  $a = array_shift($a);

  $c = $curso->mostrarCurso($a['CodCurso']);
  $c = array_shift($c);

  ?>
  <h3>Datos del Alumno</h3>
  Alumno: <b><?= capitalizar($a['Paterno']); ?> <?= capitalizar($a['Materno']); ?> <?= capitalizar($a['Nombres']); ?></b>
  <br>
  Curso: <b><?= capitalizar($c['Nombre']); ?></b>
  <form class="" action="../registro/index.php" method="post">
    <input type="hidden" name="CodAlumnoReinscripcion" value="<?php echo $_POST['CodAlumno'] ?>">
    <input type="submit" name="" value="Reinscribir Alumno" class="btn btn-success">
  </form>
<?php } ?>