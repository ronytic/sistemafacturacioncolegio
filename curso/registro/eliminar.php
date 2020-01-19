<?php
include_once("../../login/check.php");
extract($_GET);
include_once("../../class/curso.php");
$curso = new curso;
$curso->actualizarRegistro(['activo' => 0], "CodCurso=$CodCurso");
