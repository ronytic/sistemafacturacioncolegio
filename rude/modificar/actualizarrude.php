<?php
include_once("../../login/check.php");
if(!empty($_POST)){
	include_once("../../class/rude.php");
	include_once("../../class/alumno.php");
	$alumno=new alumno;
	$rude=new rude;
	$CodAlumno=$_POST['CodAlumno'];
	$fechaReg=date("Y-m-d H:i:s");
	$values=array(
		"CodAlumno"=>$_POST['CodAlumno'],
		"PaisN"=>"'".mb_strtolower($_POST['paisNacA'],"UTF-8")."'",
		"ProvinciaN"=>"'".mb_strtolower($_POST['provinciaNacA'],"UTF-8")."'",
		"LocalidadN"=>"'".mb_strtolower($_POST['localidadNacA'],"UTF-8")."'",
		"Documento"=>1,
		"CertOfi"=>"'{$_POST['oficialiaA']}'",
		"CertLibro"=>"'{$_POST['libroA']}'",
		"CertPartida"=>"'{$_POST['partidaA']}'",
		"CertFolio"=>"'{$_POST['folioA']}'",
		"Paralelo"=>"'A'",
		"Turno"=>"'M'",
		"CodigoSie"=>"'{$_POST['codigoSIEA']}'",
		"NombreUnidad"=>"'".mb_strtolower($_POST['unidadEducativaA'],"UTF-8")."'",
		"ProvinciaE"=>"'".mb_strtolower($_POST['provinciaA'],"UTF-8")."'",
		"MunicipioE"=>"'".mb_strtolower($_POST['seccionA'],"UTF-8")."'",
		"ComunidadE"=>"'".mb_strtolower($_POST['localidadA'],"UTF-8")."'",
		"LenguaMater"=>"'{$_POST['lenguaMaterna']}'",
		"CastellanoI"=>$_POST['lenguaCastellano'],
		"AymaraI"=>$_POST['lenguaAymara'],
		"InglesI"=>$_POST['lenguaIngles'],
		"PerteneceA"=>"'{$_POST['identificaA']}'",
		"CentroSalud"=>$_POST['centroSalud'],

		"CajaSeguro"=>"'{$_POST['CajaSeguro']}'",
		"EstaPublico"=>"'{$_POST['EstaPublico']}'",
		"EstaPrivado"=>"'{$_POST['EstaPrivado']}'",
		"EnVivienda"=>"'{$_POST['EnVivienda']}'",
		"MedicinaTradicional"=>"'{$_POST['MedicinaTradicional']}'",
		"Automedicacion"=>"'{$_POST['Automedicacion']}'",

		"VecesCentro"=>"'{$_POST['vecesSalud']}'",
		"Seguro"=>"'{$_POST['Seguro']}'",

		"ViviendaOcupa"=>"'{$_POST['ViviendaOcupa']}'",

		"AguaDomicilio"=>$_POST['aguaPotable'],
		"Electricidad"=>$_POST['electricidad'],
		"Alcantarillado"=>$_POST['alcantarillado'],
		"Trabaja"=>"'{$_POST['trabaja']}'",
		"InternetCasa"=>$_POST['internet'],
		"Transporte"=>"'{$_POST['traslado']}'",
		"TiempoLlegada"=>"'{$_POST['tiempo']}'",
		"ViveCon"=>"'{$_POST['ViveCon']}'",


		"InstruccionP"=>"'{$_POST['instruccionP']}'",
		"IdiomaP"=>"'{$_POST['idiomaP']}'",

		"InstruccionM"=>"'{$_POST['instruccionM']}'",
		"IdiomaM"=>"'{$_POST['idiomaM']}'",

		"FechaNacP"=>"'{$_POST['FechaNacP']}'",
		"FechaNacM"=>"'{$_POST['FechaNacM']}'",
		"CiTutor"=>"'{$_POST['CiTutor']}'",
		"CiExtT"=>"'{$_POST['CiExtT']}'",
		"ApellidoPT"=>"'{$_POST['ApellidoPT']}'",
		"ApellidoMT"=>"'{$_POST['ApellidoMT']}'",
		"NombresT"=>"'{$_POST['NombresT']}'",
		"OcupacionT"=>"'{$_POST['OcupacionT']}'",
		"InstruccionT"=>"'{$_POST['InstruccionT']}'",
		"FechaNacT"=>"'{$_POST['FechaNacT']}'",
		"IdiomaT"=>"'{$_POST['IdiomaT']}'",
		"CelularT"=>"'{$_POST['CelularT']}'",
		"ParentescoT"=>"'{$_POST['ParentescoT']}'",



		"Lugar"=>"'EL ALTO'"
	);
	//$usuarioPadre=usuarioPadre($_POST['CedulaPadre'],$_POST['CedulaMadre']);
	$valuesAlumno=array("Paterno"=>"'".mb_strtolower($_POST['paterno'],"UTF-8")."'",
						"Materno"=>"'".mb_strtolower($_POST['materno'],"UTF-8")."'",
						"Nombres"=>"'".mb_strtolower($_POST['nombres'],"UTF-8")."'",
						"LugarNac"=>"'".mb_strtolower($_POST['departamentoNacA'],"UTF-8")."'",
						"FechaNac"=>"'{$_POST['fechaNac']}'",
						"Ci"=>"'{$_POST['numeroDoc']}'",
						"Sexo"=>$_POST['sexo'],
						"Zona"=>"'".mb_strtolower($_POST['zonaA'],"UTF-8")."'",
						"Calle"=>"'".mb_strtolower($_POST['calleA'],"UTF-8")."'",
						"Numero"=>"'".mb_strtolower($_POST['numeroViviendaA'],"UTF-8")."'",
						"CodCurso"=>$_POST['curso'],
						"TelefonoCasa"=>"'{$_POST['telefonoA']}'",
						"Celular"=>"'{$_POST['celularA']}'",
						"Rude"=>"'{$_POST['rude']}'",

						"ApellidosPadre"=>"'".mb_strtolower($_POST['ApellidosP'],"UTF-8")."'",
						"NombrePadre"=>"'".mb_strtolower($_POST['nombresP'],"UTF-8")."'",
						"CiPadre"=>"'".mb_strtolower($_POST['CedulaPadre'],"UTF-8")."'",
						"OcupPadre"=>"'".mb_strtolower($_POST['ocupacionP'],"UTF-8")."'",
						"CelularP"=>"'".mb_strtolower($_POST['telefonoP'],"UTF-8")."'",

						"ApellidosMadre"=>"'".mb_strtolower($_POST['paternoM'],"UTF-8")."'",
						"NombreMadre"=>"'".mb_strtolower($_POST['nombresM'],"UTF-8")."'",
						"CiMadre"=>"'".mb_strtolower($_POST['CedulaMadre'],"UTF-8")."'",
						"OcupMadre"=>"'".mb_strtolower($_POST['ocupacionM'],"UTF-8")."'",
						"CelularM"=>"'".mb_strtolower($_POST['telefonoM'],"UTF-8")."'",
						//"UsuarioPadre"=>"'$usuarioPadre'"
						);
	$rude->actualizarDatosAlumno($values,$CodAlumno);
	$alumno->actualizarDatosAlumno($valuesAlumno,$CodAlumno);
	header("Location:../../impresion/rude/rude2019.php?CodAlumno={$_POST['CodAlumno']}");
}
?>
