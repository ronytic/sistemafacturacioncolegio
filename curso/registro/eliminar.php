<?php
include_once("../../login/check.php");
extract($_GET);
include_once("../../class/curso.php");
$curso = new curso;
$curso->actualizarRegistro(array('activo' => 0), "CodCurso=$CodCurso");
