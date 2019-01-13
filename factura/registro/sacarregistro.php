<?php
include_once("../../login/check.php");
if(!empty($_POST['CodAlumno'])){
	include_once("../../class/alumno.php");
	include_once("../../class/curso.php");
	include_once("../../class/cuota.php");
	$alumno=new alumno;
	$curso=new curso;
	$cuota=new cuota;
	$CodAlumno=$_POST['CodAlumno'];
	$Registro=$_POST['Registro'];

	$al=$alumno->mostrarTodoDatos($CodAlumno);
	$al=array_shift($al);

	$cuo=$cuota->mostrarCuotasNoCanceladas($CodAlumno);
	//$cuo=array_shift($cuo);

    $cur=$curso->mostrarCurso($al['CodCurso']);
	$cur=array_shift($cur);

	if(!count($cuo)){
		$cuo['Numero']="SinDeuda";
	}
    $datos="";
    $ij=0;
    foreach($cuo as $c){
        //$datos.='<input value="'.$c['CodCuota']."\">C".$c['Numero'].'</option>';
        $datos.='<label class="opcion" rel="'.$Registro.'"><input type="checkbox" name="a['.$Registro.'][Cuota]['.$c['CodCuota'].']" value="'.$c['Numero'].'" class="opcionCuota" rel="'.$Registro.'"><div>'.$c['Numero'].'</div></label>';
        if($ij==1){
            $datos.="<br>";
            $ij=0;
        }else{
            $ij++;
        }
    }

	$nombres=capitalizar($al['Paterno'])." ".capitalizar($al['Materno'])." ".capitalizar($al['Nombres'])." ";
	$valores=array("Alumno"=>$nombres,
					"Cuota"=>$datos,
					"MontoCuota"=>number_format($cur['MontoCuota'],2),
					"Registro"=>$Registro,
					"CodAlumno"=>$CodAlumno
					);

	echo json_encode($valores);
}
?>
