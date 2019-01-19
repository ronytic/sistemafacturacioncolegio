<?php
include_once("../../login/check.php");
include_once("../fpdf/fpdf.php");
include_once("../../class/rude.php");
include_once("../../class/alumno.php");
include_once("../../class/curso.php");
include_once("../../class/config.php");
$rude=new rude;
$alumno=new alumno;
$config=new config;
$curso=new curso;

$al=$rude->mostrarTodoDatos($_GET['CodAlumno']);
$a=$alumno->mostrarTodoDatos($_GET['CodAlumno']);
$al=array_shift($al);

$a=array_shift($a);

$cur=$curso->mostrarCurso($a['CodCurso']);
$cur=array_shift($cur);

//print_r($cur);
$NombreLibreta=$config->mostrarConfig("NombreLibreta",1);

$Sie=$config->mostrarConfig("Sie",1);

function escribeS($x,$y,$t,$tam=11,$align="C",$an=5,$al=4){
	global $pdf;
	$pdf->SetFont('Arial','',$tam);
	$pdf->SetXY($x,$y);

	$pdf->Cell($an,$al,utf8_decode(mb_strtoupper($t,"utf8")),0,0,$align,0);
}
function escribe($x,$y,$t,$tam=10,$align="C",$an=5,$al=4){
	global $pdf;
	$pdf->SetFont('Arial','',$tam);
	$pdf->SetXY($x,$y);
	$pdf->SetFillColor(255,255,255);
	$pdf->Cell($an,$al,utf8_decode(mb_strtoupper($t,"utf8")),0,0,$align,0);
}

	$pdf=new FPDF("P","mm",array(216, 330));
	$pdf->SetTitle("Rude 2019");
	$pdf->SetMargins(0,0,0);
	$pdf->SetAutoPageBreak(true,0);

	$pdf->SetFont('Arial','B',12);
/*Primera Hoja*/
$pdf->AddPage();
$pdf->Image("../../imagenes/rude/rudep1.jpg",0,0,216, 330);
//Codigo Sie
$SieSeparado=($Sie);
$can=strlen($SieSeparado);

$l=$can-8;$t=isset($SieSeparado[$l])?$SieSeparado[$l]:'';
escribe(173,38,$t);
$l=$can-7;$t=isset($SieSeparado[$l])?$SieSeparado[$l]:'';
escribe(178,38,$t);
$l=$can-6;$t=isset($SieSeparado[$l])?$SieSeparado[$l]:'';
escribe(182,38,$t);
$l=$can-5;$t=isset($SieSeparado[$l])?$SieSeparado[$l]:'';
escribe(186.5,38,$t);
$l=$can-4;$t=isset($SieSeparado[$l])?$SieSeparado[$l]:'';
escribe(192,38,$t);
$l=$can-3;$t=isset($SieSeparado[$l])?$SieSeparado[$l]:'';
escribe(196,38,$t);
$l=$can-2;$t=isset($SieSeparado[$l])?$SieSeparado[$l]:'';
escribe(201,38,$t);
$l=$can-1;$t=isset($SieSeparado[$l])?$SieSeparado[$l]:'';
escribe(206,38,$t);

//escribe(75.2,38.1,"x",10);
//escribe(140,38,mb_strtoupper($NombreLibreta['Valor'],"utf8"));
//escribe(56,43.3,"2084");
//escribe(110,43.5,"EL ALTO 1");
escribe(31,53.9,mayuscula($a['Paterno']),10,"L",90,3.5);
escribe(31,59,mayuscula($a['Materno']),10,"L",90,3.5);
escribe(31,64.5,mayuscula($a['Nombres']),10,"L",90,3.5);

escribe(22,73.8,mayuscula($al['PaisN']),10,"L",50,3.5);;
escribe(82,73.8,mayuscula($a['LugarNac']),10,"L",50,3.5);
escribe(22,78.8,mayuscula($al['ProvinciaN']),10,"L",50,3.5);
escribe(82,78.8,mayuscula($al['LocalidadN']),10,"L",50,3.5);

escribeS(130,54.2,$a['Rude'],12,"L",90,3.5);

escribeS(203.4,64,"x",8);




escribe(83,88,date('d',strtotime($a['FechaNac'])));
escribe(94,88,date('m',strtotime($a['FechaNac'])));
escribe(112,88,date('Y',strtotime($a['FechaNac'])));

if($a['Sexo'])escribe(148,59.2,"x",8);
if(!$a['Sexo'])escribe(148,64,"x",8);



escribe(13,88,$al['CertOfi'],10);
escribe(30,88,$al['CertLibro'],10);
escribe(50,88,$al['CertPartida']);
escribe(65,88,$al['CertFolio']);


escribe(42,101,$a['Ci'],10,"L");
escribe(112,101,$a['CiExt'],10,"L");

escribe(36,110,mayuscula($a['LugarNac']),10,"L");
escribe(36,115,mayuscula($al['ProvinciaE']),10,"L");
escribe(36,120,mayuscula($al['MunicipioE']),10,"L");
escribe(36,125,mayuscula($al['ComunidadE']),10,"L");

escribe(36,130,mayuscula($a['Zona']),10,"L");
escribe(36,135,mayuscula($a['Calle']),10,"L");
escribe(36,140,mayuscula($a['Numero']),10,"L");
escribe(108,140,$a['TelefonoCasa'],10,"L");
escribe(173,140,$a['Celular'],10,"L");

escribe(7,168.5,$al['LenguaMater'],10,"L");

if($al['CastellanoI'])escribe(8,188,"CASTELLANO",10,"L");
if($al['InglesI'])escribe(8,192,"INGLES",10,"L");
if($al['AymaraI'])escribe(8,196.5,"AYMARA",10,"L");


switch($al['PerteneceA']){
	case "NINGUNO":{
		escribe(46,160,"x",7);
	}break;
	case "AYMARA":{
		escribe(46,172,"x",7);
	}break;
	case "QUECHUA":{
		escribe(99,188,"x",7);
	}break;
}

escribe(203,152,"x",8);//centro salud

if($al['VecesCentro']=="1a2")escribe(146,192,"x",8);
if($al['VecesCentro']=="3a5")escribe(164,192,"x",8);
if($al['VecesCentro']=="6a+")escribe(187,192,"x",8);
if($al['VecesCentro']=="ninguna")escribe(203,192,"x",8);

if($al['Seguro']==1){escribe(178,196,"x",8);}else{escribe(196,196,"x",8);}

if($al['CajaSeguro'])escribe(171,168,"x",8);
if($al['EstaPublico'])escribe(171,172,"x",8);
if($al['EstaPrivado'])escribe(171,176,"x",8);
if($al['EnVivienda'])escribe(203,168,"x",8);
if($al['MedicinaTradicional'])escribe(203,172,"x",8);
if($al['Automedicacion'])escribe(203,176,"x",8);

escribe(20,209,"x",8);//si
escribe(20,217,"x",8);//si
escribe(20,225,"x",8);//si

escribe(92,209,"x",8);//si
escribe(92,221,"x",8);//si


/*escribe(170,179.5,"x",8);//no
escribe(170,182.5,"x",8);//no
escribe(170,185,"x",8);//no
*/


/*escribe(42.5,200,"x",8);

escribe(35.5,224.5,"x",8);

escribe(34.5,233.5,"x",8);

escribe(112.5,227.5,"x",8);*/

//escribe(88,237.5,"NO TRABAJO",10);
escribe(13,254.5,"x",8);

if($al['ViviendaOcupa']==1)escribe(162,213,"x",8);
if($al['ViviendaOcupa']==2)escribe(162,217,"x",8);
if($al['ViviendaOcupa']==3)escribe(162,221,"x",8);
if($al['ViviendaOcupa']==4)escribe(205,213,"x",8);
if($al['ViviendaOcupa']==5)escribe(205,217,"x",8);
if($al['ViviendaOcupa']==6)escribe(205,221,"x",8);


if($al['InternetCasa']==1)escribe(30,237,"x",8);
if($al['InternetCasa']==2)escribe(30,241,"x",8);
if($al['InternetCasa']==3)escribe(60,237,"x",8);
if($al['InternetCasa']==4)escribe(60,241,"x",8);
if($al['InternetCasa']==5)escribe(95,237,"x",8);
//escribe(145,233.5,"x",8);

if($al['Transporte']=="APIE")escribe(39,293,"x",8);
if($al['Transporte']=="MINIBUS")escribe(39,298,"x",8);

escribe(83,302,"x",10);

escribe(185,285,"x",10);

/*Segunda Hoja*/
	$pdf->AddPage();
	$pdf->Image("../../imagenes/rude/rudep2.jpg",0,0,216, 330);

	if($al['ViveCon']==1)escribe(108,8,"x",10,"L");
	if($al['ViveCon']==2)escribe(131,8,"x",10,"L");
	if($al['ViveCon']==3)escribe(158,8,"x",10,"L");
	if($al['ViveCon']==4)escribe(182,8,"x",10,"L");
	if($al['ViveCon']==5)escribe(205,8,"x",10,"L");

	escribe(44,19,$a['CiPadre'],10,"L");
	escribe(104,19,$a['CiExtP'],10,"L");
	$d1=explode(" ",$a['ApellidosPadre']);

	@escribe(44,23,$d1[0],10,"L");
	@escribe(44,28,$d1[1],10,"L");
	escribe(44,33,$a['NombrePadre'],10,"L");
	escribe(44,38,$al['IdiomaP'],10,"L");
	escribe(44,42,$a['OcupPadre'],10,"L");
	escribe(44,47,$al['InstruccionP'],10,"L");
	if($al['FechaNacP']!="0000-00-00"){

	escribe(44,52,date("d",strtotime($al['FechaNacP'])),10,"L");
	escribe(56,52,date("m",strtotime($al['FechaNacP'])),10,"L");
	escribe(70,52,date("Y",strtotime($al['FechaNacP'])),10,"L");
	}


	escribe(150,19,$a['CiMadre'],10,"L");
	escribe(201,19,$a['CiExtM'],10,"L");
	$d1=explode(" ",$a['ApellidosMadre']);
	@escribe(150,23,$d1[0],10,"L");
	@escribe(150,28,$d1[1],10,"L");
	escribe(150,33,$a['NombreMadre'],10,"L");
	escribe(150,38,$al['IdiomaM'],10,"L");
	escribe(150,42,$a['OcupMadre'],10,"L");
	escribe(150,47,$al['InstruccionM'],10,"L");
	if($al['FechaNacM']!="0000-00-00"){
	escribe(150,52,date("d",strtotime($al['FechaNacM'])),10,"L");
	escribe(162,52,date("m",strtotime($al['FechaNacM'])),10,"L");
	escribe(174,52,date("Y",strtotime($al['FechaNacM'])),10,"L");
	}

	escribe(44,66,$al['CiTutor'],10,"L");
	escribe(104,66,$al['CiExtT'],10,"L");
	escribe(44,71,($al['ApellidoPT']),10,"L");
	escribe(44,76,($al['ApellidoMT']),10,"L");
	escribe(44,81,$al['NombresT'],10,"L");
	escribe(44,86,$al['IdiomaP'],10,"L");
	escribe(44,91,$al['OcupacionT'],10,"L");
	escribe(44,95,$al['InstruccionT'],10,"L");

	if($al['FechaNacT']!="0000-00-00"){
	escribe(44,109,date("d",strtotime($al['FechaNacT'])),10,"L");
	escribe(56,109,date("m",strtotime($al['FechaNacT'])),10,"L");
	escribe(70,109,date("Y",strtotime($al['FechaNacT'])),10,"L");
	}

	escribe(44,102,$al['ParentescoT'],10,"L");

	escribe(135,66,"E",10);//E
	escribe(139,66,"L",10);//E
	escribe(149,66,"A",10);//E
	escribe(153,66,"L",10);//E
	escribe(158,66,"T",10);//E
	escribe(162,66,"O",10);//E

	$dia=date("d",strtotime($a['FechaIns']));
	$mes=date("m",strtotime($a['FechaIns']));
	$anio=date("Y",strtotime($a['FechaIns']));
	escribe(135,76,$dia[0],10);//E
	escribe(140,76,$dia[1],10);//E

	escribe(154,76,$mes[0],10);//E
	escribe(158,76,$mes[1],10);//E

	escribe(170,76,$anio[0],10);//E
	escribe(175.5,76,$anio[1],10);//E
	escribe(180,76,$anio[2],10);//E
	escribe(184,76,$anio[3],10);//E
	$pdf->Output();

?>
