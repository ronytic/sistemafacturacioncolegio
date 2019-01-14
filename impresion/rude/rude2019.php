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

function escribeS($x,$y,$t,$tam=12,$align="C",$an=5,$al=4){
	global $pdf;
	$pdf->SetFont('Arial','',$tam);
	$pdf->SetXY($x,$y);

	$pdf->Cell($an,$al,utf8_decode(mb_strtoupper($t,"utf8")),0,0,$align,0);
}
function escribe($x,$y,$t,$tam=12,$align="C",$an=5,$al=4){
	global $pdf;
	$pdf->SetFont('Arial','',$tam);
	$pdf->SetXY($x,$y);
	$pdf->SetFillColor(255,255,255);
	$pdf->Cell($an,$al,utf8_decode(mb_strtoupper($t,"utf8")),0,0,$align,1);
}

	$pdf=new FPDF("P","mm",array(216, 330));
	$pdf->SetMargins(0,0,0);
	$pdf->SetAutoPageBreak(true,0);

	$pdf->SetFont('Arial','B',12);
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
	escribe(31,53.9,mayuscula($a['Paterno']),11,"L",90,3.5);
	escribe(31,59,mayuscula($a['Materno']),11,"L",90,3.5);
	escribe(31,64.1,mayuscula($a['Nombres']),11,"L",90,3.5);

	escribe(22,73.8,mayuscula($al['PaisN']),12,"L",50,3.5);;
	escribe(82,73.8,mayuscula($a['LugarNac']),12,"L",50,3.5);
	escribe(22,78.8,mayuscula($al['ProvinciaN']),12,"L",50,3.5);
	escribe(82,78.8,mayuscula($al['LocalidadN']),12,"L",50,3.5);

	escribeS(130,54,$a['Rude'],12,"L",90,3.5);

	escribeS(203.4,64,"x",8);


	escribe(42,101,$a['Ci'],12,"L",40,3);

	escribe(130,78,date('d',strtotime($a['FechaNac'])));
	escribe(142,78,date('m',strtotime($a['FechaNac'])));
	escribe(158,78,date('Y',strtotime($a['FechaNac'])));

	if(!$a['Sexo'])escribe(197.5,77.2,"x",8);
	if($a['Sexo'])escribe(197.5,81.5,"x",8);

	escribe(131,95.5,$al['CertOfi'],10);
	escribe(155,95.5,$al['CertLibro'],10);
	escribe(179.5,95.5,$al['CertPartida']);
	escribe(196,95.5,$al['CertFolio']);

	/*escribe(50,104,$al['CodigoSie']);//SIE
	escribe(155,104.5,$al['NombreUnidad'],10);*/
	if($a['CodCurso']==2 || $a['CodCurso']==1|| $a['CodCurso']==4)escribe(8.3,119.5,"x",7);//pre kinder
	if($a['CodCurso']==3)escribe(14,119.5,"x",7);//kinder
	//if($a['CodCurso']==3)escribe(23.5,119.5,"x",7);//1
	//if($a['CodCurso']==3)escribe(28.5,119.5,"x",7);//2
	/*if($a['CodCurso']==4)escribe(33,119.5,"x",7);//3
	if($a['CodCurso']==5)escribe(38,119.5,"x",7);//4
	if($a['CodCurso']==6)escribe(43,119.5,"x",7);//5
	if($a['CodCurso']==7)escribe(47.8,119.5,"x",7);//6
	if($a['CodCurso']==8)escribe(56.3,119.5,"x",7);//1
	if($a['CodCurso']==9)escribe(61,119.5,"x",7);//2
	if($a['CodCurso']==10)escribe(66,119.5,"x",7);//3
	if($a['CodCurso']==11)escribe(70.6,119.5,"x",7);//4
	if($a['CodCurso']==12)escribe(75.5,119.5,"x",7);//5
	if($a['CodCurso']==13)escribe(80.5,119.5,"x",7);//6*/

	if($a['CodCurso']==1 || $a['CodCurso']==3)
	{
		escribe(123.8,121.5,"x",8);//paralelo A
	}else{
		if($a['CodCurso']==4){
			escribe(133.5,121.7,"x",8);//paralelo B
		}else{
			escribe(128.8,121.7,"x",8);//paralelo B
		}

	}
	if($a['CodCurso']!=4){
		escribe(186.2,120,"x",10);//turno
	}else{

		escribe(193.2,120,"x",10);//turno
	}
	escribe(60,134,$al['ProvinciaE']);
	escribe(60,140,$al['MunicipioE']);
	escribe(60,145.5,$al['ComunidadE']);

	escribe(160,134.5,$a['Zona']);
	escribe(160,140.5,$a['Calle']);
	escribe(195,146,$a['Numero']);
	escribe(132,146,$a['TelefonoCasa']);


	escribe(23,169,$al['LenguaMater'],10);

	if($al['CastellanoI'])escribe(23,180,"CASTELLANO",10);
	if($al['InglesI'])escribe(23,184,"INGLES",10);
	if($al['AymaraI'])escribe(23,188.5,"AYMARA",10);
	switch($al['PerteneceA']){
		case "MESTIZO":{
			escribe(61,166,"x",7);
			//escribe(61,170,"x",10);
			escribe(120,189.3,$al['PerteneceA'],8);
		}break;
		case "AYMARA":{
			escribe(61,174,"x",7);
		}break;
		case "QUECHUA":{
			escribe(108,184.5,"x",7);
		}break;
	}

	escribe(191,163.5,"x",8);//centro salud

	if($al['VecesCentro']=="1a2")escribe(147.3,170,"x",8);
	if($al['VecesCentro']=="3a5")escribe(164.5,170,"x",8);
	if($al['VecesCentro']=="6a+")escribe(185,170,"x",8);
	if($al['VecesCentro']=="niguna")escribe(198,170,"x",8);

	escribe(170,179.5,"x",8);//no
	escribe(170,182.5,"x",8);//no
	escribe(170,185,"x",8);//no

	escribe(42.5,200,"x",8);

	escribe(35.5,224.5,"x",8);

	escribe(34.5,233.5,"x",8);

	escribe(112.5,227.5,"x",8);

	escribe(88,237.5,"NO TRABAJO",10);
	escribe(89.5,245.5,"x",8);

	if($al['InternetCasa']==1)escribe(149,204,"x",8);
	if($al['InternetCasa']==2)escribe(149,207,"x",8);
	if($al['InternetCasa']==3)escribe(149,210,"x",8);
	if($al['InternetCasa']==4)escribe(149,214,"x",8);

	//escribe(145,233.5,"x",8);

	if($al['Transporte']=="APIE")escribe(196.5,204,"x",8);
	if($al['Transporte']=="MINIBUS")escribe(196.5,207,"x",8);

	escribe(192.5,234,"x",10);


	$pdf->AddPage();
	$pdf->Image("../../imagenes/rude/rudep2.jpg",0,0,216, 330);

	escribe(54,29.8,$a['CiPadre'],10);
	escribe(72,31,$a['ApellidosPadre'],10);
	escribe(72,33.3,$a['NombrePadre'],10);
	escribe(72,35.5,$al['IdiomaP'],10);
	escribe(72,37,$a['OcupPadre'],10);
	escribe(72,41,$al['InstruccionP'],10);
	escribe(72,45,$al['ParentescoT'],10);

	escribe(161,29.5,$a['CiMadre'],10);
	escribe(175,31,$a['ApellidosMadre'],10);
	escribe(175,33.7,$a['NombreMadre'],10);
	escribe(175,35.2,$al['IdiomaM'],10);
	escribe(175,37,$a['OcupMadre'],10);
	escribe(175,41,$al['InstruccionM'],10);

	escribe(54-28,290.5,"E",10);//E
	escribe(58-28,290.5,"L",10);//E
	escribe(67.5-28,290.5,"A",10);//E
	escribe(72-28,290.5,"L",10);//E
	escribe(76.5-28,290.5,"T",10);//E
	escribe(81-28,290.5,"O",10);//E

	$dia=date("d",strtotime($a['FechaIns']));
	$mes=date("m",strtotime($a['FechaIns']));
	$anio=date("Y",strtotime($a['FechaIns']));
	escribe(81+38.5,290.5,$dia[0],10);//E
	escribe(81+43,290.5,$dia[1],10);//E

	escribe(81+60,290.5,$mes[0],10);//E
	escribe(81+64,290.5,$mes[1],10);//E

	escribe(81+80,290.5,$anio[0],10);//E
	escribe(81+84.5,290.5,$anio[1],10);//E
	escribe(81+89.5,290.5,$anio[2],10);//E
	escribe(81+94,290.5,$anio[3],10);//E
	$pdf->Output();

?>
