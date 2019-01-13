<?php
include_once("../login/check.php");
if($_POST['CodCurso']=="0"){
	echo "0";	
}
if(!empty($_POST)){
	extract($_POST);
	include_once("../class/curso.php");
	$curso=new curso;
	$c=$curso->mostrarCurso($CodCurso);
	$c=array_shift($c);
	echo $c['MontoCuota'];
}
?>