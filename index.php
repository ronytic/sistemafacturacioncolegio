<?php
include_once("login/check.php");
php_start();
$folder="";
$titulo="";
$subtitulo="";
$titulo2=" ";
?>
<?php include_once("cabecerahtml.php");?>
<?php include_once("cabecera.php");?>
                <div class="col-lg-10 col-lg-offset-1">
                    <h3 class="text-center">Bienvenido al Sistema de Facturación</h3>
                    <hr>
                    <div class="col-lg-5">
                    <a class="btn btn-info form-control" href="alumno/registro/">Registro de Alumnos</a>
                    <br><br>
                    <a class="btn btn-info form-control" href="curso/registro/">Registro de Cursos</a>
                    <br><br>
                    <a class="btn btn-primary form-control" href="factura/registro/">Registro de Facturación</a>
                    <br><br>
                    <a class="btn btn-primary form-control" href="configuracion/general/">Configuración General del Sistema</a>
                    <br><br>
                    <a class="btn btn-danger form-control" href="factura/activar/">Verificación de Código de Control</a>
                    <br><br>
                    <a class="btn btn-danger form-control">Reporte de Libro de Ventas</a>
                    </div>
                </div>
<?php include_once("pie.php");?>