<?php
$d=array();
foreach($_POST as $k=>$v){
    array_push($d,"$k=$v");
}
$url="../../impresion/reporte/deudores.php?".implode(",",$d);
?>
<a href="<?php echo $url;?>" class="btn btn-primary btn-xs" target="_blank">Abrir en Nueva Ventana</a>
<iframe src="<?php echo $url?>" width="100%" height="800" frameborder="0"></iframe>