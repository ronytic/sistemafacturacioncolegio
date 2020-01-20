<?php
require_once("login/check.php");
require_once("class/alumno.php");
$alumno = new alumno;


$data = $alumno->exists('tmp_alumno');
if (!$data) {
    $alumno->duplicate("alumno", "tmp_alumno", false);
} else {
    require_once("class/tmp_alumno.php");
    $tmp_alumno = new tmp_alumno;
    $tmp_alumno->vaciar();
    $tmp_alumno->insertAllDataTable("alumno", "tmp_alumno");
}


require_once("class/documento.php");
$documento = new documento;
$data = $documento->exists('tmp_documento');
if (!$data) {
    $documento->duplicate("documento", "tmp_documento", false);
} else {
    require_once("class/tmp_documento.php");
    $tmp_documento = new tmp_documento;
    $tmp_documento->vaciar();
    $tmp_documento->insertAllDataTable("documento", "tmp_documento");
}


require_once("class/rude.php");
$rude = new rude;
$data = $rude->exists('tmp_rude');
if (!$data) {
    $rude->duplicate("rude", "tmp_rude", false);
} else {
    require_once("class/tmp_rude.php");
    $tmp_rude = new tmp_rude;
    $tmp_rude->vaciar();
    $tmp_rude->insertAllDataTable("rude", "tmp_rude");
}
