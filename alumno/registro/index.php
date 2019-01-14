<?php
include_once("../../login/check.php");

include_once("../../class/curso.php");

$titulo="Inscribir Nuevo Alumno";
$folder="../../";


$curso=new curso;





$columna1=12;
?>
<?php include_once($folder."cabecerahtml.php");?>
<script language="javascript" type="application/javascript" src="../../js/alumno/inscripcion.js"></script>

<?php include_once($folder."cabecera.php");?>
<form action="../guardaralumno.php" method="post" onSubmit="if(this.Curso.value==0){alert('Selecciona el Curso');return false;}">
<div class="col-lg-6">
	<div class="panel panel-default">
		<div class="panel-heading">Datos del Alumno</div>
        <div class="panel-body">
					<table>

                <tr><td class="der">Curso</td><td>::</td><td><select name="Curso" id="curso" autofocus class="form-control" required><option value="0">Selecciona el Curso</option><?php foreach($curso->listar() as $cur){
														?><option value="<?php echo $cur['CodCurso']?>" ><?php echo $cur['Nombre']?></option><?php
													}?></select></td></tr>
                <tr><td class="der">Apellido Paterno</td><td>::</td><td><input name="Paterno" type="text" size="30" required value="" class="form-control"/></td></tr>
                <tr><td class="der">Apellido Materno</td><td>::</td><td><input name="Materno" type="text" size="30" required value="" class="form-control"/></td></tr>
                <tr><td class="der">Nombres</td><td>::</td><td><input name="Nombres" type="text" size="30" required  value="" class="form-control"/></td></tr>
                <tr><td class="der">Sexo</td><td>::</td><td><input type="radio" name="Sexo" id="h" value="1" required /><label for="h">Hombre</label> <input type="radio" name="Sexo" id="m" value="0" required><label for="m">Mujer</label></td></tr>
                <tr><td class="der">Lugar de Nacimiento</td><td>::</td><td><input type="text" name="LugarNac" placeholder="La Paz" value="La Paz" class="form-control"/></td></tr>
                <tr><td class="der">Fecha de Nacimiento</td><td>::</td><td><input type="date" name="FechaNac" id="FechaNac" size="10"  value="" autocomplete="off" class="form-control"/></td></tr>
                <tr><td class="der">Cedula de Identidad</td><td>::</td><td>
										<?php carnet("Ci","CiExt","","");?>
									</td></tr>
                <tr><td class="der">Zona</td><td>::</td><td><input name="Zona" type="text"  id="Zona" size="30" value="" class="form-control"/></td></tr>
                <tr><td class="der">Calle</td><td>::</td><td><input name="Calle" type="text"  id="Zona" size="30" value="" class="form-control"/></td></tr>
                <tr><td class="der">Número</td><td>::</td><td><input name="Numero" type="text"  id="Zona" size="30" value="" class="form-control"/></td></tr>
                <tr><td class="der">Teléfono Casa</td><td>::</td><td><input name="TelefonoCasa" type="text" id="FechaNac" size="30" value="" class="form-control"/></td></tr>
                <tr><td class="der">Celular</td><td>::</td><td><input name="Celular" type="text" size="30" value="" class="form-control"/></td></tr>
            </table>
						<hr>

        	<table>
            	<tr><td class="der">Procedencia</td><td>::</td><td><input type="text" name="Procedencia" size="30" value="" class="form-control"/></td></tr>
                <tr><td class="der">Repitente</td><td>::</td><td><input type="radio" name="Repitente" value="0" id="rn" checked /><label for="rn">No</label><input type="radio" name="Repitente" value="1" id="rs" /><label for="rs">Si</label></td></tr>
                <tr><td class="der">Traspaso</td><td>::</td><td><input type="radio" name="Traspaso" value="0" id="tn" checked/><label for="tn">No</label><input type="radio" name="Traspaso" value="1" id="ts" /><label for="ts">Si</label></td></tr>
                <tr><td class="der">Becado</td><td>::</td><td><input type="radio" name="Becado" value="0" id="bn" checked/><label for="bn">No</label><input type="radio" name="Becado" value="1" id="bs"/><label for="bs">Si</label></td></tr>
                <tr><td class="der">Monto de Beca</td><td>::</td><td><div class="input-group"><input type="text" name="MontoBeca" id="MontoBeca" size="7" maxlength="7" class="form-control" value="0" /><span class="input-group-addon">Bs - </span><input type="text" name="PorcentajeBeca" id="PorcentajeBeca" class="form-control" value="0" size="6" maxlength="6" /><span class="input-group-addon">%</span></div></td></tr>
                <tr><td class="der">Monto a Pagar</td><td>::</td><td><div class="input-group">
                	<input name="MontoPagar" id="MontoPagar" readonly  class="form-control" type="text" value="<?php echo $c['MontoCuota']?>"/> <span class="input-group-addon">Bs</span></div></td></tr>
                <tr><td class="der">Retirado</td><td>::</td><td><input type="radio" name="Retirado" value="0" id="n" checked="checked"/><label for="n">No</label><input type="radio" name="Retirado" value="1" id="s"/><label for="s">Si</label></td></tr>
                 <tr><td class="der">Fecha de Retiro</td><td>::</td><td><input type="date" name="FechaRetiro" id="FechaRetiro" size="10" class="form-control" value=""/></td></tr>
                 <tr><td class="der">Rude</td><td>::</td><td><input type="text" name="Rude" value="" class="form-control"/></td></tr>
                 <!--<tr><td class="der">Foto</td><td>::</td><td><input type="file" name="Foto" disabled="disabled"/></td></tr>-->
                 <tr><td class="der">Observaciones</td><td>::</td><td><textarea name="Observaciones" cols="30" rows="5" class="form-control"></textarea></td></tr>
             </table>
        </div>
    </div>
</div>
<div class="col-lg-6">
    <div class="panel panel-default">
    	<div class="panel-heading">Datos del Padre / Madre o Tutor de Familia</div>
        <div class="panel-body">
        	<table>
            	<tr><td class="der">Apellidos del Padre</td><td>::</td><td><input type="text" name="ApellidosPadre" size="50" value="" class="form-control"/></td></tr>
            	<tr><td class="der">Nombre del Padre</td><td>::</td><td><input type="text" name="NombrePadre" size="50" value="" class="form-control"/></td></tr>
                <tr><td class="der">C.I. Padre</td><td>::</td><td><?php carnet("CiPadre","CiExtP","","");?></td></tr>
                <tr><td class="der">Ocupación del Padre</td><td>::</td><td><input type="text" name="OcupPadre" size="30"  value="" class="form-control"/></td></tr>
                <tr><td class="der">Celular Padre</td><td>::</td><td><input type="text" name="CelularP" size="30" value="" class="form-control"/></td></tr>

                <tr><td class="der">Apellidos de la Madre</td><td>::</td><td><input type="text" name="ApellidosMadre" size="50" value="" class="form-control"/></td></tr>
               	<tr><td class="der">Nombre de la Madre</td><td>::</td><td><input type="text" name="NombreMadre" size="50"  value="" class="form-control"/></td></tr>
                <tr><td class="der">C.I.Madre</td><td>::</td><td><?php carnet("CiMadre","CiExtM","","");?></td></tr>

                 <tr><td class="der">Ocupación de la Madre</td><td>::</td><td><input type="text" name="OcupMadre" size="30" value="" class="form-control"/></td></tr>
                 <tr><td class="der">Celular Madre</td><td>::</td><td><input name="CelularM" type="text" id="CelularM" size="30" value="" class="form-control"/></td></tr>
                 <tr><td class="der">Email</td><td>::</td><td><input type="text" name="Email" size="30" value="" class="form-control" /></td></tr>
                 <tr><td class="der">Persona Encargada para Recoger</td><td>::</td><td><input type="text" name="PersonaACargo" size="30" value="" class="form-control" //></td></tr>
            </table>
<hr>
        	<table>
            	<tr><td class="der">NIT</td><td>::</td><td><input name="Nit" type="text" id="Nit" size="30" required value="" class="form-control" /></td></tr>
                <tr><td class="der">Nombre a Facturar</td><td>::</td><td><input name="FacturaA" type="text" size="30" required value="" class="form-control" //></td></tr>

            </table>
            <hr />
            <table class="table table-hover table-bordered">
            	<tr><td class="der"><label for="cn" class="form-label">Certificado de Nacimiento</label></td><td>::</td><td><input type="checkbox" name="CertificadoNac" id="cn" /></td></tr>
                <tr><td class="der"><label for="le" class="form-label">Libreta Escolar</label></td><td>::</td><td><input type="checkbox" name="LibretaEsc" id="le" /></td></tr>
                 <tr><td class="der"><label for="lv">Libreta de Vacunas</label></td><td>::</td><td><input type="checkbox" name="LibretaVac" id="lv" /></td></tr>
                <tr><td class="der"><label for="CedulaId">C.I. del Alumno</label></td><td>::</td><td><input type="checkbox" name="CedulaId" id="CedulaId" /></td></tr>
                <tr><td class="der"><label for="CedulaIdP">C.I. del Padre</label></td><td>::</td><td><input type="checkbox" name="CedulaIdP" id="CedulaIdP" /></td></tr>
                <tr><td class="der"><label for="CedulaIdM">C.I. de la Madre</label></td><td>::</td><td><input type="checkbox" name="CedulaIdM" id="CedulaIdM" /></td></tr>
                <tr><td class="der"><label for="Croquis">Croquis de Domicilio</label></td><td>::</td><td><input type="checkbox" name="Croquis" id="Croquis" /></td></tr>
                  <tr><td class="der"><label for="Fotografia">Fotografías</label></td><td>::</td><td><input type="checkbox" name="Fotografia" id="Fotografia" /></td></tr>
                <tr><td class="der">Observaciones Documentos</td><td>::</td><td><textarea name="ObservacionesDoc" rows="5" cols="30" class="form-control"></textarea></td></tr>
                <tr><td></td><td></td><td><input type="submit" value="Registrar Alumno" class="btn btn-primary"/><input type="reset" class="btn btn-default" value="Vaciar"></td></tr>
            </table>

        </div>
    </div>
</div>
</form>


<?php include_once($folder."pie.php");?>
<?php

?>
