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
    if($j%2==0){
        $pintar=3;
    }else{
        $pintar=0;
    }
    $pdf->CuadroCuerpo(10,$j,$pintar,"R");
    $pdf->CuadroCuerpo(25,capitalizar($a['Paterno']),$pintar);
    $pdf->CuadroCuerpo(25,capitalizar($a['Materno']),$pintar);
    $pdf->CuadroCuerpo(30,capitalizar($a['Nombres']),$pintar);
    $cant=0;
    for($i=1;$i<=10;$i++){
        
        $cu1=$cuota->mostrarCuota($a['CodAlumno'],$i);
        //print_r($cu1);
        $cu1=array_shift($cu1);
        
        if($cu1['Cancelado']){
            $cant++;
            $r=1;
            $fe=date("d/m",strtotime($cu1['Fecha']));
        }else{
            $r=0;
            $fe="";
        }
        if($fe!=""){
            $pdf->CuadroCuerpo(7,$fe,$r,"C",1,6);
        }else{
            if($a['Observaciones']!=""){
                $re=3;
                $pdf->CuadroCuerpo(7*(10-$i+1),mayuscula($a['Observaciones']),$re,"C",1,6);
            
                $i=10;
            }else{
                $re=$r;
                $pdf->CuadroCuerpo(7,$fe,$re,"C",1,6);
            }
            
        }
    }
    $pdf->CuadroCuerpo(7,$cant,0,"R",1);
    $pdf->ln();
            
}
$pdf->Output();
?>