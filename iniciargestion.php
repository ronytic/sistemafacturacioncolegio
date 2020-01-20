<?php
require_once("login/check.php");
require_once("class/alumno.php");
$alumno = new alumno;

require_once("class/documento.php");
$documento = new documento;

require_once("class/rude.php");
$rude = new rude;

require_once("class/cuota.php");
$cuota = new cuota;

require_once("class/lograstreo.php");
$lograstreo = new lograstreo;

require_once("class/logusuario.php");
$logusuario = new logusuario;

require_once("class/tmpcola.php");
$tmpcola = new tmpcola;



$alumno->vaciar();
$documento->vaciar();
$rude->vaciar();
$cuota->vaciar();
$lograstreo->vaciar();
$logusuario->vaciar();
$tmpcola->vaciar();
