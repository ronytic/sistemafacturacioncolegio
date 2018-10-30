<?php include_once($folder."login/check.php");?>
<?php
include_once(RAIZ."class/curso.php");
include_once(RAIZ."class/alumno.php");
if(isset($_GET['CodAlumno'])){
	$CodAlumno=$_GET['CodAlumno'];
	$alumno=new alumno;
	$al=array_shift($alumno->mostrarTodoDatos($CodAlumno));
}
if(isset($_GET['CodCurso'])){
	$CodCurso=$_GET['CodCurso'];
}
if(empty($CodCurso)){
	$CodCurso=$al['CodCurso'];
}
$curso=new curso;
?>
        <div class="box-header"><h5>Curso</h5></div>
        <div class="box-content">
            <select class="form-control" id="selectcurso" data-placeholder="Seleccione un Curso" >
                <option value="">Seleccionar</option>
            <?php
			$i=0;
            foreach($curso->mostrar() as $cu){$i++;
                ?><option value="<?php echo $cu['CodCurso'];?>" <?php //echo $i==1 || $CodCurso==$cu['CodCurso']?'selected="selected"':'';?> rel="<?php echo $cu['caArea']?>"><?php echo eliminarEspaciosDobles($cu['Nombre']);?></option><?php
            }
            ?>
            </select>
        </div>


        <div class="box-header"><h5><i class="icon-user"></i><span class="break"></span>Alumnos</h5></div>
        <div class="box-content">
            <select class="form-control listadoalumnos" id="selectalumno" data-placeholder="Seleccione un Alumno">

            </select>
        </div>

