<?php

function DatosUsuario($CodUsuario){
    if(!defined("Usuario")){
	   include_once("../../class/usuario.php");
    }
    if(!isset($usu)){
	   $us100=new usuario;
    }
	
		$Usuario=$idioma["Administrador"];
					$ul=$us100->mostrarDatos($CodUsuario);
					$ul=array_shift($ul);
					$tipousuario=$idioma['Administrador'];
					$Foto=$folder."imagenes/usuario/".$ul['Foto'];
					$Paterno=$ul['Paterno'];
					$Materno=$ul['Materno'];
					$Nombres=$ul['Nombres'];
		
	$retorno=array("TipoUsuario"=>$tipousuario,
		"Foto"=>$Foto,
		"Paterno"=>$Paterno,
		"Materno"=>$Materno,
		"Nombres"=>$Nombres,
		
	);
	return $retorno;
}
?>