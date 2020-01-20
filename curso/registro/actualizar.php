<?php
include_once("../../login/check.php");
extract($_POST);

include_once("../../class/curso.php");
$curso = new curso;
$valores = array(
    'Nombre' => "'$Nombre'",
    'Abreviado' => "'$Abreviado'",
    'Orden' => "'$Orden'",
    'MontoCuota' => "'$MontoCuota'",
);

$curso->actualizarRegistro($valores, "CodCurso=$CodCurso");
header("Location:listar.php");
