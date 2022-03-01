<?php
include_once("../../login/check.php");
include_once("../fpdf/fpdf.php");
include_once("../../class/rude.php");
include_once("../../class/alumno.php");
include_once("../../class/curso.php");
include_once("../../class/config.php");
$rude = new rude;
$alumno = new alumno;
$config = new config;
$curso = new curso;

$al = $rude->mostrarTodoDatos($_GET['CodAlumno']);
$a = $alumno->mostrarTodoDatos($_GET['CodAlumno']);
$al = array_shift($al);

$a = array_shift($a);

$cur = $curso->mostrarCurso($a['CodCurso']);
$cur = array_shift($cur);

// print_r($cur);
$NombreLibreta = $config->mostrarConfig("NombreLibreta", 1);

$Sie = $config->mostrarConfig("Sie", 1);

function escribeS($x, $y, $t, $tam = 11, $align = "C", $an = 5, $al = 4)
{
	global $pdf;
	$pdf->SetFont('Arial', '', $tam);
	$pdf->SetXY($x, $y);

	$pdf->Cell($an, $al, utf8_decode(mb_strtoupper($t, "utf8")), 0, 0, $align, 0);
}
function escribe($x, $y, $t, $tam = 10, $align = "C", $an = 5, $al = 4)
{
	global $pdf;
	$pdf->SetFont('Arial', '', $tam);
	$pdf->SetXY($x, $y);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell($an, $al, utf8_decode(mb_strtoupper($t, "utf8")), 0, 0, $align, 0);
}

$pdf = new FPDF("P", "mm", array(216, 279));
$pdf->SetTitle("Rude 2019");
$pdf->SetMargins(0, 0, 0);
$pdf->SetAutoPageBreak(true, 0);

$pdf->SetFont('Arial', 'B', 12);
/*Primera Hoja*/
$pdf->AddPage();
$pdf->Image("../../imagenes/alumno/FormularioInscripcion2022.jpg", 0, 0, 216, 279);
//Codigo Sie

imprimir();
imprimir(138.5);



$pdf->Output();


function imprimir($y = 0)
{
	global $pdf, $Sie, $a, $al, $cur;
	$SieSeparado = ($Sie);
	$can = strlen($SieSeparado);

	$l = $can - 8;
	$t = isset($SieSeparado[$l]) ? $SieSeparado[$l] : '';
	escribe(171, $y + 22, $t);
	$l = $can - 7;
	$t = isset($SieSeparado[$l]) ? $SieSeparado[$l] : '';
	escribe(176, $y + 22, $t);
	$l = $can - 6;
	$t = isset($SieSeparado[$l]) ? $SieSeparado[$l] : '';
	escribe(180, $y + 22, $t);
	$l = $can - 5;
	$t = isset($SieSeparado[$l]) ? $SieSeparado[$l] : '';
	escribe(184.5, $y + 22, $t);
	$l = $can - 4;
	$t = isset($SieSeparado[$l]) ? $SieSeparado[$l] : '';
	escribe(189.5, $y + 22, $t);
	$l = $can - 3;
	$t = isset($SieSeparado[$l]) ? $SieSeparado[$l] : '';
	escribe(194, $y + 22, $t);
	$l = $can - 2;
	$t = isset($SieSeparado[$l]) ? $SieSeparado[$l] : '';
	escribe(198, $y + 22, $t);
	$l = $can - 1;
	$t = isset($SieSeparado[$l]) ? $SieSeparado[$l] : '';
	escribe(203, $y + 22, $t);

	escribe(33, $y + 34, mayuscula($a['Paterno']), 10, "L", 90, 3.5);
	escribe(33, $y + 39, mayuscula($a['Materno']), 10, "L", 90, 3.5);
	escribe(33, $y + 43, mayuscula($a['Nombres']), 10, "L", 90, 3.5);

	escribe(22, $y + 52, mayuscula($al['PaisN']), 10, "L", 50, 3.5);;
	escribe(78, $y + 52, mayuscula($a['LugarNac']), 10, "L", 50, 3.5);
	escribe(22, $y + 56, mayuscula($al['ProvinciaN']), 10, "L", 50, 3.5);
	escribe(78, $y + 56, mayuscula($al['LocalidadN']), 8, "L", 50, 3.5);

	escribeS(130, $y + 34, $a['Rude'], 12, "L", 90, 3.5);

	// escribeS(203.4, 64, "x", 8);
	if ($a['Sexo']) escribe(147, $y + 38, "x", 8);
	if (!$a['Sexo']) escribe(147, $y + 43, "x", 8);


	escribe(160, $y + 42, date('d', strtotime($a['FechaNac'])));
	escribe(173, $y + 42, date('m', strtotime($a['FechaNac'])));
	escribe(188, $y + 42, date('Y', strtotime($a['FechaNac'])));


	escribe(42, $y + 64, $a['Ci'], 10, "L");
	escribe(100, $y + 64, $a['CiExt'], 10, "L");

	escribe(38, $y + 72.5, mayuscula($a['Zona']), 10, "L");
	escribe(38, $y + 77, mayuscula($a['Calle']), 10, "L");
	escribe(38, $y + 81, mayuscula($a['Numero']), 10, "L");
	escribe(108, $y + 81, $a['TelefonoCasa'], 10, "L");
	escribe(175, $y + 81, $a['Celular'], 10, "L");

	if ($al['ViveCon'] == 1) escribe(108, $y + 90, "x", 10, "L");
	if ($al['ViveCon'] == 2) escribe(130, $y + 90, "x", 10, "L");
	if ($al['ViveCon'] == 3) escribe(156, $y + 90, "x", 10, "L");
	if ($al['ViveCon'] == 4) escribe(179, $y + 90, "x", 10, "L");
	if ($al['ViveCon'] == 5) escribe(200, $y + 90, "x", 10, "L");

	$prekinder = false;
	$kinder = false;
	$paralelo_a = false;
	$paralelo_b = false;
	$paralelo_c = false;
	switch ($cur['CodCurso']) {
		case 1: {
				$prekinder = true;
				$paralelo_a = true;
			}
			break;
		case 2: {
				$prekinder = true;
				$paralelo_b = true;
			}
			break;
		case 4: {
				$prekinder = true;
				$paralelo_c = true;
			}
			break;

		case 3: {
				$kinder = true;
				$paralelo_a = true;
			}
			break;
	}


	// escribe(10,$y+ 320, "INICIAL:", 10); //E
	// escribe(20,$y+ 320, "1º", 10); //E
	$pdf->setXY(131, $y + 63.5);
	$pdf->cell(3,  3, $prekinder ? 'X' : '', 0, 0, 'C');


	// escribe(35,$y+ 320, "2º", 10); //E
	$pdf->setXY(135, $y + 63.5);
	$pdf->cell(3, 3, $kinder ? 'X' : '', 0, 0, 'C');


	// escribe(70,$y+ 320, "PARALELO:", 10); //E

	// escribe(85,$y+ 320, "A", 10); //E
	// $pdf->setXY(90, 320);
	// $pdf->cell(4, 4, $paralelo_a ? 'X' : '', 1);

	// escribe(98,$y+ 320, "B", 10); //E
	// $pdf->setXY(103, 320);
	// $pdf->cell(4, 4, $paralelo_b ? 'X' : '', 1);

	// escribe(112,$y+ 320, "C", 10); //E
	// $pdf->setXY(117, 320);
	// $pdf->cell(4, 4, $paralelo_c ? 'X' : '', 1);


	if ($al['ViveCon'] == 1 || $al['ViveCon'] == 2) {
		escribe(44, $y + 99, $a['CiPadre'], 10, "L");
		escribe(103, $y + 99, $a['CiExtP'], 10, "L");
		$d1 = explode(" ", $a['ApellidosPadre']);

		@escribe(44, $y + 103, $d1[0], 10, "L");
		@escribe(44, $y + 107, $d1[1], 10, "L");
		escribe(44, $y + 112, $a['NombrePadre'], 10, "L");
	} elseif ($al['ViveCon'] == 3) {
		escribe(44, $y + 99, $a['CiMadre'], 10, "L");
		escribe(103, $y + 99, $a['CiExtM'], 10, "L");
		$d1 = explode(" ", $a['ApellidosMadre']);
		@escribe(44, $y + 103, $d1[0], 10, "L");
		@escribe(44, $y + 107, $d1[1], 10, "L");
		escribe(44, $y + 112, $a['NombreMadre'], 10, "L");
	} elseif ($al['ViveCon'] == 4) {
		escribe(44, $y + 99, $al['CiTutor'], 10, "L");
		escribe(103, $y + 99, $al['CiExtT'], 10, "L");
		escribe(44, $y + 103, ($al['ApellidoPT']), 10, "L");
		escribe(44, $y + 107, ($al['ApellidoMT']), 10, "L");
		escribe(44, $y + 112, $al['NombresT'], 10, "L");
	}
	// escribe(44,$y+ 102, $al['ParentescoT'], 10, "L");

	escribe(150, $y + 99, "LA PAZ", 10); //E


	$dia = date("d", strtotime($a['FechaIns']));
	$mes = date("m", strtotime($a['FechaIns']));
	$anio = date("Y", strtotime($a['FechaIns']));
	escribe(142, $y + 109, $dia[0], 10); //E
	escribe(146, $y + 109, $dia[1], 10); //E

	escribe(162, $y + 109, $mes[0], 10); //E
	escribe(166, $y + 109, $mes[1], 10); //E

	escribe(180, $y + 109, $anio[0], 10); //E
	escribe(184.5, $y + 109, $anio[1], 10); //E
	escribe(189, $y + 109, $anio[2], 10); //E
	escribe(194, $y + 109, $anio[3], 10); //E
}
