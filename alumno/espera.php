<?php
include_once("../login/check.php");
php_start();
$CodAlumno=$_GET['CodAlumno'];
$folder="../";
require_once("../class/alumno.php");
$alumno=new alumno;
$al=$alumno->mostrarTodoDatos($CodAlumno);
$al=array_shift($al);

require_once("../class/curso.php");
$curso=new curso;
$cur=$curso->mostrarCurso($al['CodCurso']);
$cur=array_shift($cur);

$titulo="Pantalla de Espera del Sistema";
$subtitulo="";
$titulo2=" ";
?>
<?php include_once($folder."cabecerahtml.php");?>
<?php include_once($folder."cabecera.php");?>

                <div class="col-lg-10 col-lg-offset-1">

                    <div class="col-lg-5">
                      <h4> Alumno: <?php echo capitalizar($al['Paterno'])?> <?php echo capitalizar($al['Materno'])?> <?php echo capitalizar($al['Nombres'])?> </h4>
                      <h4> Curso: <?php echo capitalizar($cur['Nombre'])?> </h4>
                    <br><br>
                    <a class="btn btn-info form-control" href="../alumno/registro/hermano.php?CodAlumno=<?php echo $CodAlumno;?>" target="_blank">Inscribir Hermano</a>
                    <br><br>
                    <a class="btn btn-primary form-control" href="../factura/registro/" target="_blank">Registrar Factura</a>
                    <br><br>

                    <br><br>
                    <a class="btn btn-danger form-control" href="../rude/registro/?CodAlumno=<?php echo $CodAlumno; ?>" target="_blank">Registrar Rude</a>

                    </div>
                </div>
<?php include_once($folder."pie.php");?>
