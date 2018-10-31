<?php
require_once("../../login/check.php");
$CodCurso=$_GET['CodCurso']!=""?$_GET['CodCurso']:"%";

include_once("../../class/curso.php");
$curso=new curso;
if($CodCurso!="%"){
    $c=$curso->mostrarCurso($CodCurso);
    $c=array_shift($c);
    $NombreCurso=$c['Nombre'];
}else{
    $NombreCurso="Todos";
}

include_once("../../class/alumno.php");
$alumno=new alumno;
include_once("../../class/cuota.php");
$cuota=new cuota;

$al=$alumno->mostrarDatosAlumnosWhere("CodCurso LIKE '$CodCurso'");
include_once("../../impresion/pdf.php");
$titulo="Reporte de Deudores";
class PDF extends PPDF{
    function Cabecera(){
        global $NombreCurso;
        $this->CuadroCabecera(20,"Curso:",40,$NombreCurso);
        $this->Pagina();
        $this->ln();
        $this->TituloCabecera(10,"N",8);
        $this->TituloCabecera(25,"Ap. Paterno",8);
        $this->TituloCabecera(25,"Ap. Materno",8);
        $this->TituloCabecera(30,"Nombres",8);
        for($i=1;$i<=10;$i++){
            $this->TituloCabecera(7,"C".$i,8);
        }
        
        $this->TituloCabecera(7,"T",8);
    }
}
$pdf=new PDF("P","mm","letter");
$pdf->AddPage();
$j=0;
foreach($al as $a){
    $j++;
    $pdf->CuadroCuerpo(10,$j,0,"R");
    $pdf->CuadroCuerpo(25,capitalizar($a['Paterno']));
    $pdf->CuadroCuerpo(25,capitalizar($a['Materno']));
    $pdf->CuadroCuerpo(30,capitalizar($a['Nombres']));
    $cant=0;
    for($i=1;$i<=10;$i++){
        
        $cu1=$cuota->mostrarCuota($a['CodAlumno'],$i);
        //print_r($cu1);
        $cu1=array_shift($cu1);
        
        if($cu1['Cancelado']){
            $cant++;
            $r=1;
        }else{
            $r=0;
        }
        $pdf->CuadroCuerpo(7,"",$r,"",1);
    }
    $pdf->CuadroCuerpo(7,$cant,0,"R",1);
    $pdf->ln();
            
}
$pdf->Output();
?>