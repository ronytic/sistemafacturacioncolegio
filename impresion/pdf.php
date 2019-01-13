<?php
include_once("fpdf/fpdf.php");
$logo="logo.jpg";

if(!defined("Config")){
	include_once("../../class/config.php");
}

if(!isset($config)){
		$config=new config;
	}
$title=$config->mostrarConfig("Titulo",1);
$gestion=date("Y");
$lema=$config->mostrarConfig("Lema",1);
$logo=$config->mostrarConfig("Logo",1);


include_once("../../funciones/usuarios.php");
$Nivel=$_SESSION['Nivel'];

$CodigoUsuario=$_SESSION['CodUsuarioLog'];


include_once("../../class/usuario.php");
$us100=new usuario;
$ul=$us100->mostrarDatos($CodigoUsuario);
$ul=array_shift($ul);
switch($ul['Nivel']){
	case 1:{$TipoUsuario="Administrador";}break;
}

$DatosGenerador=array("TipoUsuario"=>$TipoUsuario,
											"Paterno"=>$ul['Paterno'],
											"Materno"=>$ul['Materno'],
											"Nombres"=>$ul['Nombres']
										);

	class PPDF extends FPDF{
		var $ancho=176;
        var $altocelda=5;
		function Header(){
			global $idioma,$FechaReporte;
			$this->SetTitle(("Sistema de Administración de Facturación de Colegios"),true);
			$this->SetAuthor(utf8_decode("SSistema de Administración de Facturación de Colegios Desarrollado por Ronald Nina Layme. Cel: 73230568 - www.facebook.com/ronaldnina"),true);
			$this->SetSubject(utf8_decode("Sistema de Administración de Facturación de Colegios Desarrollado por Ronald Nina Layme. Cel: 73230568 - www.facebook.com/ronaldnina"),true);
			$this->SetCreator(utf8_decode("Sistema de Administración de Facturación de Colegios Desarrollado por Ronald Nina Layme. Cel: 73230568 - www.facebook.com/ronaldnina"),true);
			//$this->SetProtection(array('print'));
			if($this->CurOrientation=="P"){$this->ancho=$this->w-40;}else{$this->ancho=$this->w-33.4;}
			$this->SetLeftMargin(18);
			$this->SetAutoPageBreak(true,15);
			global $title,$gestion,$titulo,$logo,$idioma;
			$fecha=capitalizar(strftime("%A, %d "))." de ".capitalizar(strftime(" %B "))." de ".strftime(" %Y");

			$this->Image("../../imagenes/logo/".$logo,10,10,20,20);
			$this->Fuente("B",10);
			$this->SetXY(34,12);
			$this->Cell(70,4,utf8_decode($title),0,0,"L");
			$this->Fuente("B",8);
			$this->SetXY(34,16);
			$this->Cell(70,4,utf8_decode($gestion),0,0,"L");
			$this->ln(10);
			$this->Fuente("B",14);
			$this->Cell($this->ancho,4,utf8_decode($titulo),0,5,"C");
			$this->ln(5);
            /*if(!isset($FechaReporte)){
			    $this->CuadroCabecera(32,"Fecha del Reporte: ",50,utf8_encode($fecha));
                $this->ln(5);
            }*/

			if(in_array("Cabecera",get_class_methods($this))){
				$this->Cabecera();
			}
			$this->ln();

			$this->Cell($this->ancho,0,"",1,1);
			$this->Ln(0.1);
		}
		function Pagina(){
			global $idioma;
			$this->AliasNbPages();
			$this->CuadroCabecera(15,"Página:",20,$this->PageNo()." de {nb}");
		}
        function AltoCelda($a){
            $this->altocelda=$a;
        }
		function Fuente($tipo="B",$tam=10,$TipoRelleno=2){
            if($TipoRelleno==3){
                $this->SetFillColor(211,226,255);
            }
            if($TipoRelleno==2){
                $this->SetFillColor(184,184,184);
            }
			$this->SetFont("Arial",$tipo,$tam);
		}
		function CuadroCabecera($txt1Ancho,$txt1,$txt2Ancho,$txt2){
			$this->Fuente("B");
			$this->Cell($txt1Ancho,4,utf8_decode($txt1),0,0,"L");
			$this->Fuente("");
			$this->Cell($txt2Ancho,4,utf8_decode($txt2),0,0,"L");
		}
		function TituloCabecera($txtAncho,$txt,$tam=10,$borde=1,$align="C"){
			$this->Fuente("B",$tam);
			$this->Cell($txtAncho,4,utf8_decode($txt),$borde,0,$align);
		}
		function CuadroCuerpo($txtAncho,$txt,$relleno=0,$align="L",$borde=0,$tam=9,$tipo=""){
			if($relleno>=2){
				$this->Fuente($tipo,$tam,$relleno);
				$rell=1;
			}else{
				$this->Fuente($tipo,$tam);
				$rell=$relleno;
			}
    		$this->Cell($txtAncho,$this->altocelda,utf8_decode($txt),$borde,0,$align,$rell);
		}
		function CuadroCuerpoMulti($txtAncho,$txt,$relleno=0,$align="L",$borde=0,$tam=9,$tipo=""){
			$this->Fuente($tipo,$tam);
			$this->MultiCell($txtAncho,5,utf8_decode($txt),$borde,$align,$relleno);
		}
		function CuadroCuerpoPersonalizado($txtAncho,$txt,$relleno=0,$align="L",$borde=0,$tipo="",$tam=10){
			$this->Fuente($tipo,$tam);
			$this->Cell($txtAncho,5,utf8_decode($txt),$borde,0,$align,$relleno);
		}
		function CuadroCuerpoResaltar($txtAncho,$txt,$relleno=0,$align="L",$borde=0,$resaltar=2){
			$this->Fuente("");
			switch($resaltar){
				//case 1:{$this->SetFillColor(179,179,179);}break;
				//case 2:{$this->SetFillColor(135,135,135);}break;
				case 2:{$this->SetFillColor(190,190,190);}break;
				case 1:{$this->SetFillColor(210,210,210);}break;
			}
			$this->Cell($txtAncho,5,utf8_decode($txt),$borde,0,$align,$relleno);
		}
		function CuadroNombre($txtAncho,$Paterno,$Materno,$Nombres,$Full=0,$relleno){
			if($Full){
				$this->CuadroCuerpo($txtAncho,ucwords($Paterno." ".$Materno." ".$Nombres),$relleno);
			}else{
				$Nombre=array_shift(explode(" ",$Nombres));
				$this->CuadroCuerpo($txtAncho,ucwords($Paterno." ".$Materno." ".$Nombre),$relleno);
			}
		}
		function CuadroNombreSeparado($txtAnchoP,$Paterno,$txtAnchoM,$Materno,$txtAnchoN,$Nombres,$Full,$relleno){
			if($Full){
				$this->CuadroCuerpo($txtAnchoP,ucwords($Paterno),$relleno);
				$this->CuadroCuerpo($txtAnchoM,ucwords($Materno),$relleno);
				$this->CuadroCuerpo($txtAnchoN,ucwords($Nombres),$relleno);
			}else{
				$Nombre=array_shift(explode(" ",$Nombres));
				$this->CuadroCuerpo($txtAnchoP,ucwords($Paterno),$relleno);
				$this->CuadroCuerpo($txtAnchoM,ucwords($Materno),$relleno);
				$this->CuadroCuerpo($txtAnchoN,ucwords($Nombre),$relleno);
			}
		}
		function Linea(){
			$this->Cell($this->ancho,0,"",1,1);
			$this->Ln();
		}
		function Footer()
		{	global $lema,$idioma,$DatosGenerador;



			$DatosUsuario=capitalizar($DatosGenerador['TipoUsuario'].", ".$DatosGenerador['Paterno']." ".$DatosGenerador['Materno']." ".$DatosGenerador['Nombres']);

			// Posición: a 1,5 cm del final
			$this->SetY(-15);
			// Arial italic 8

			$BordePie=0;
			$this->Fuente("I",7.5);
			$this->Cell($this->ancho,0,"",1,1);
			if($this->CurOrientation=="P"||$this->OrientacionObligada=="L"){
				$Resto=0;
				$DatosReporteGenerado=utf8_decode('Reporte Generado').": ".date('d-m-Y H:i:s')." ";
				$this->Cell(50,3,$DatosReporteGenerado,$BordePie,0,"L");
			}else{
				$Resto=35;
				$DatosReporteGenerado=utf8_decode('Reporte Generado').": ".date('d-m-Y H:i:s')." ".$DatosUsuario;
				$this->Cell(90,3,$DatosReporteGenerado,$BordePie,0,"L");
			}

			$this->Fuente("I",8);
			$this->Cell((round(($this->ancho-50)/2)-$Resto),3,utf8_decode($lema),$BordePie,0,"C");
			$this->Fuente("I",7);


			if($this->CurOrientation=="P" ||$this->OrientacionObligada=="L"){
				$this->Cell((round(($this->ancho-50)/2)+0),3,utf8_decode("Sistema de Administración de Facturación de Colegios"),$BordePie,0,"R");
				$this->ln();
				$this->Cell((round(($this->ancho-50)/2)+50),3,"Usuario: ".$DatosUsuario,$BordePie,0,"L");
				$this->Cell((round(($this->ancho-50)/2)+00),3,"Desarrollado por Ronald Nina",$BordePie,0,"R");
			}else{
				$this->Cell((round(($this->ancho-50)/2)-5),3,utf8_decode("Sistema de Administración de Facturación de Colegios - Desarrollado por Ronald Nina"),$BordePie,0,"R");
			}

			//$this->Cell(60,4,utf8_decode($idioma['ReporteGenerado']).": ".date('d-m-Y H:i:s'),0,0,"R");

			if(in_array("Pie",get_class_methods($this))){
				$this->Pie();
			}
		}
	}
?>
