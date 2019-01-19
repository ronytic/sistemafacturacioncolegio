<?php
include_once("../login/check.php");
include_once("../class/alumno.php");

include_once("../class/cuota.php");
include_once("../class/documento.php");

if(!empty($_POST)){
	$al=new alumno;
	$cuota=new cuota;
	$doc=new documento;





	if(!empty($_POST['CodAlumno'])){$CodAl=$_POST['CodAlumno'];}
	$CodCurso=$_POST['Curso'];
	$Paterno=$_POST['Paterno'];
	$Materno=$_POST['Materno'];
	$Nombres=$_POST['Nombres'];
	$Sexo=$_POST['Sexo'];
	$LugarNac=$_POST['LugarNac'];
	$FechaNac=date("Y-m-d",strtotime($_POST['FechaNac']));
	$Ci=$_POST['Ci'];
	$CiExt=$_POST['CiExt'];
	$Zona=$_POST['Zona'];
	$Calle=$_POST['Calle'];
	$Numero=$_POST['Numero'];
	$TelefonoCasa=$_POST['TelefonoCasa'];
	$Celular=$_POST['Celular'];
	//
	$Procedencia=$_POST['Procedencia'];
	$Repitente=$_POST['Repitente'];
	$Traspaso=$_POST['Traspaso'];
	$Becado=$_POST['Becado'];
	$MontoBeca=$_POST['MontoBeca'];
	$MontoPagar=$_POST['MontoPagar'];
	$Retirado=$_POST['Retirado'];
	$FechaRetiro=$_POST['FechaRetiro'];
	$Rude=$_POST['Rude'];
	$Observaciones=$_POST['Observaciones'];
	//=$_POST[''];
	$ApellidosPadre=$_POST['ApellidosPadre'];
	$NombrePadre=$_POST['NombrePadre'];
	$CiPadre=$_POST['CiPadre'];
	$CiExtP=$_POST['CiExtP'];
	$OcupPadre=$_POST['OcupPadre'];
	$CelularP=$_POST['CelularP'];
	$ApellidosMadre=$_POST['ApellidosMadre'];
	$NombreMadre=$_POST['NombreMadre'];
	$CiMadre=$_POST['CiMadre'];
	$CiExtM=$_POST['CiExtM'];
	$OcupMadre=$_POST['OcupMadre'];
	$CelularM=$_POST['CelularM'];
	$Email=$_POST['Email'];
	$PersonaACargo=$_POST['PersonaACargo'];
	//
	$Nit=$_POST['Nit'];
	$FacturaA=$_POST['FacturaA'];
	//
	$CertificadoNac=isset($_POST['CertificadoNac'])?$_POST['CertificadoNac']:'';if($CertificadoNac=="on")$CertificadoNac=1;else $CertificadoNac=0;
	$LibretaEsc=isset($_POST['LibretaEsc'])?$_POST['LibretaEsc']:'';if($LibretaEsc=="on")$LibretaEsc=1;else $LibretaEsc=0;
	$LibretaVac=isset($_POST['LibretaVac'])?$_POST['LibretaVac']:'';if($LibretaVac=="on")$LibretaVac=1;else $LibretaVac=0;
	$CedulaId=isset($_POST['CedulaId'])?$_POST['CedulaId']:'';if($CedulaId=="on")$CedulaId=1;else $CedulaId=0;
	$CedulaIdP=isset($_POST['CedulaIdP'])?$_POST['CedulaIdP']:'';if($CedulaIdP=="on")$CedulaIdP=1;else $CedulaIdP=0;
	$CedulaIdM=isset($_POST['CedulaIdM'])?$_POST['CedulaIdM']:'';if($CedulaIdM=="on")$CedulaIdM=1;else $CedulaIdM=0;
	$Croquis=isset($_POST['Croquis'])?$_POST['Croquis']:'';if($Croquis=="on")$Croquis=1;else $Croquis=0;
	$Fotografia=isset($_POST['Fotografia'])?$_POST['Fotografia']:'';if($Fotografia=="on")$Fotografia=1;else $Fotografia=0;

	$ObservacionesDoc=$_POST['ObservacionesDoc'];
	$autoIncrement=$al->estadoTabla();
	$CodAlumno=$autoIncrement['Auto_increment'];
	$FechaInsc=date("Y-m-d");
	$HoraIns=date(" H:i:s");
	//Obtenemos el Codigo de Barra

	$CodUsuarioAlumno=trim(mb_strtolower($Paterno,"UTF-8")).$CodAlumno;


	$Password=rand(1000,9999);
	$PasswordP=rand(1000,9999);


	$valuesDoc=array('CodDocumento'=>'Null',
					'CodAlumno'=>$CodAlumno,
					'CertificadoNac'=>$CertificadoNac,
					'LibretaEsc'=>$LibretaEsc,
					'LibretaVac'=>$LibretaVac,
					'CedulaId'=>$CedulaId,
					'CedulaIdP'=>$CedulaIdP,
					'CedulaIdM'=>$CedulaIdM,
					'Croquis'=>$Croquis,
					'Fotografia'=>$Fotografia,
					'Observaciones'=>"LOWER('$ObservacionesDoc')"
					);

	$valuesAl=array('CodAlumno'=>"$CodAlumno",
				'Paterno'=>"LOWER('$Paterno')",
				'Materno'=>"LOWER('$Materno')",
				'Nombres'=>"LOWER('$Nombres')",
				'Sexo'=>$Sexo,
				'LugarNac'=>"LOWER('$LugarNac')",
				'FechaNac'=>"'$FechaNac'",
				'Ci'=>"'$Ci'",
				'CiExt'=>"'$CiExt'",
				'Zona'=>"LOWER('$Zona')",
				'Calle'=>"LOWER('$Calle')",
				'Numero'=>"LOWER('$Numero')",
				'TelefonoCasa'=>"'$TelefonoCasa'",
				'Celular'=>"'$Celular'",
				'Procedencia'=>"LOWER('$Procedencia')",
				'Repitente'=>$Repitente,
				'Traspaso'=>$Traspaso,
				'Becado'=>$Becado,
				'MontoBeca'=>$MontoBeca,
				'Retirado'=>$Retirado,
				'FechaRetiro'=>"'$FechaRetiro'",
				'Rude'=>"'$Rude'",
				'Observaciones'=>"LOWER('$Observaciones')",
				'ApellidosPadre'=>"LOWER('$ApellidosPadre')",
				'NombrePadre'=>"LOWER('$NombrePadre')",
				'CiPadre'=>"'$CiPadre'",
				'CiExtP'=>"'$CiExtP'",
				'OcupPadre'=>"LOWER('$OcupPadre')",
				'CelularP'=>"'$CelularP'",
				'ApellidosMadre'=>"LOWER('$ApellidosMadre')",
				'NombreMadre'=>"LOWER('$NombreMadre')",
				'CiMadre'=>"'$CiMadre'",
				'CiExtM'=>"'$CiExtM'",
				'OcupMadre'=>"LOWER('$OcupMadre')",
				'CelularM'=>"'$CelularM'",
				'Email'=>"LOWER('$Email')",
				'PersonaACargo'=>"'$PersonaACargo'",
				'Nit'=>"'$Nit'",
				'FacturaA'=>"LOWER('$FacturaA')",
				'CodCurso'=>$CodCurso,
				'FechaIns'=>"'$FechaInsc'",
				'HoraIns'=>"'$HoraIns'",
				'UsuarioAlumno'=>"'$CodUsuarioAlumno'",
				'CodBarra'=>"''",
				'Password'=>"'$Password'",
				'PasswordP'=>"'$PasswordP'"
			);

	$fechaCuota=date("Y-m-d H:i:s");
	for($i=1;$i<=10;$i++){
		$valuesCuota=array('CodCuota'=>'NULL',
							'CodAlumno'=>$CodAlumno,
							'Numero'=>$i,
							'MontoPagar'=>$MontoPagar,
							'Factura'=>"''",
							'Cancelado'=>0,
							'Fecha'=>"'$fechaCuota'",
							'Observaciones'=>"''"
							);

	//echo "<br>";
		//print_r($valuesCuota);
		$cuota->guardar($valuesCuota);
	}
	$al->insertarAlumno($valuesAl);
	$doc->guardarDocumento($valuesDoc);

	//if(!empty($CodAl)){$tmpalumno->actualizarVisor($CodAl);}
	header("Location:espera.php?CodAlumno=".$CodAlumno);

	include_once("../class/tmpcola.php");
	$tmpcola=new tmpcola;
	$tmpcola->insertarRegistro(array("CodAlumno"=>$CodAlumno,"Estado"=>"'Espera'"));
}
?>
