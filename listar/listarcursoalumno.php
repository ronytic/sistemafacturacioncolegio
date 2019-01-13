<?php
$titulo2="Curso";
include_once($folder."cabecerahtml.php");
?>
<link href="<?=$folder;?>css/estilo.css?1" rel="stylesheet" type="text/css">
<script type="text/javascript">
  var archivodestinoalumno="<?php echo "$archivodestinoalumno"; ?>";
</script>
<script src="<?=$folder;?>js/listar.js"></script>
<?php include_once($folder."cabecera.php");?>
<div class="col-lg-12">
  <?php
  $listacurso=1;
  require_once("../../listar/listadosolocurso.php")
  ?>
</div>

</div>
</div>
</div>

<div class="hpanel">
    <div class="panel-heading">Alumnos</div>
    <div class="panel-body">
        <div class="row">

            <div class="col-lg-12 table-responsive" id="respuestacurso">

            </div>
        </div>
    </div>
</div>
</div>
<div class="col-lg-<?php echo 12-$columna1?>">
<div class="hpanel">
    <div class="panel-heading"><?php echo isset($subtitulo3)?$subtitulo3:'';?></div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12 table-responsive" id="respuestaalumno">

<?php include_once($folder."pie.php");?>
