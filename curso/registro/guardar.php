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

$curso->insertarRegistro($valores, 1);
header("Location:listar.php");
