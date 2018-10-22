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
                    <div class="badge badge-info">Registro de Alumnos</div>
                    <div class="badge badge-info">Registro de Cursos</div>
                    <div class="badge badge-primary">Configuración</div>
                    <div class="badge badge-danger">Verificación de Código de Control</div>
                    <div class="badge badge-danger">Reporte de Libro de Ventas</div>
                </div>
<?php include_once("pie.php");?>