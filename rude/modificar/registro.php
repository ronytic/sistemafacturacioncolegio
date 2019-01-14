<?php
include_once("../../login/check.php");
include_once("../../class/rude.php");
include_once("../../class/alumno.php");
include_once("../../class/curso.php");
if(!empty($_POST['CodAlumno'])){
	$CodAlumno=$_POST['CodAlumno'];
	$rude=new rude;
	$alumno=new alumno;
	$cur=new curso;
	$alu=$rude->mostrarTodoDatos($CodAlumno);
	$al=$alumno->mostrarTodoDatos($CodAlumno);
	$alu=array_shift($alu);
	$al=array_shift($al);
if(count($alu)<=0){
		echo "Este Rude no esta Registrado, Registrelo antes de poder modificarlo";
		exit();
	}

	?>
  <form action="actualizarrude.php" method="post" onsubmit="javascript:return false;if(confirm('¿Esta seguro de Guardar los Datos?'))">
		<input type="hidden" name="CodAlumno" value="<?php echo $CodAlumno;?>" />
        Todos los datos en Mayusculas
			<div class="panel panel-default">
    	<div class="panel-heading"><h3 class="panel-title">Datos del Estudiante - MODIFICAR RUDE</h3></div>
        <div class="panel-body">
	    	<table class="table table-hover">
            	<tr><td>Apellido Paterno</td><td>::</td><td><input type="text" name="paterno" value="<?php echo mayuscula($al['Paterno']);?>" class="form-control"/></td></tr>
                <tr><td>Apellido Materno</td><td>::</td><td><input type="text" name="materno" value="<?php echo mayuscula($al['Materno']);?>" class="form-control" /></td></tr>
                <tr><td>Nombres</td><td>::</td><td><input type="text" name="nombres" value="<?php echo mayuscula($al['Nombres']);?>" class="form-control"/></td></tr>
                <tr><td>RUDE</td><td>::</td><td><input type="text" name="rude" value="<?php echo mayuscula($al['Rude']);?>" class="form-control"/></td></tr>
                <tr><td>Cedula de Identidad</td><td>::</td><td><?php carnet("numeroDoc","CiExt",$al['Ci'],$al['CiExt']);?></td></tr>
                <tr><td>Fecha de Nacimiento</td><td>::</td><td><input name="fechaNac" type="text" id="fechaNac" value="<?php echo mayuscula($al['FechaNac']);?>" class="form-control" /></td></tr>
                <tr><td>SEXO</td><td>::</td><td><select name="sexo" class="form-control"><option value="0" <?php echo !$al['Sexo']?'selected="selected"':'';?>>Femenino</option><option value="1"<?php echo $al['Sexo']?'selected="selected"':'';?>>Masculino</option></select></td></tr>
                <tr class="default"><td>Certificado de Nacimiento</td><td></td><td></td></tr>
    	    			<tr><td>Pais</td><td>::</td><td><input type="text" name="paisNacA" value="<?php echo mayuscula($alu['PaisN']);?>" class="form-control"/></td></tr>
                <tr><td>Departamento</td><td>::</td><td><input type="text" name="departamentoNacA" value="<?php echo mayuscula($al['LugarNac']);?>" class="form-control" /></td></tr>
                <tr><td>Provincia</td><td>::</td><td><input type="text" name="provinciaNacA" value="<?php echo mayuscula($alu['ProvinciaN']);?>" class="form-control"/></td></tr>
                <tr><td>Localidad</td><td>::</td><td><input type="text" name="localidadNacA" value="<?php echo mayuscula($alu['LocalidadN']);?>" class="form-control"/></td></tr>
                <tr><td>Oficialia Nº</td><td>::</td><td><input type="text" name="oficialiaA" value="<?php echo mayuscula($alu['CertOfi']);?>" class="form-control"/></td></tr>
                <tr><td>Libro Nº</td><td>::</td><td><input type="text" name="libroA" value="<?php echo mayuscula($alu['CertLibro']);?>" class="form-control"/></td></tr>
                <tr><td>Partida Nº</td><td>::</td><td><input type="text" name="partidaA" value="<?php echo mayuscula($alu['CertPartida']);?>" class="form-control"/></td></tr>
                <tr><td>Folio Nº</td><td>::</td><td><input type="text" name="folioA" value="<?php echo mayuscula($alu['CertFolio']);?>" class="form-control"/></td></tr>
        	</table>
        </div>
			</div>
			<div class="panel panel-default">
        <div class="panel-heading"><h3 class="panel-title">Datos Inscripción Actual </h3></div>
        <div class="panel-body">
	    		<table class="table table-hover">
            	<tr><td>Curso</td><td>::</td><td><select name="curso" class="form-control">
								<?php foreach($cur->listar() as $curso){?><option value="<?php echo $curso['CodCurso'];?>" <?php if($al['CodCurso']==$curso['CodCurso']){echo 'selected="selected"';}?></option><?php echo mb_strtoupper($curso['Nombre'],"utf8");?></option><?php }?></select></td></tr>
    	    	<tr><td>Codigo SIE, Colegio Anterior</td><td>::</td><td><input type="text" name="codigoSIEA" value="<?php echo mayuscula($alu['CodigoSie']);?>" class="form-control"/></td></tr>
                <tr><td>Nombre Colegio Anterior</td><td>::</td><td><input type="text" name="unidadEducativaA" value="<?php echo mayuscula($alu['NombreUnidad']);?>" class="form-control"/></td></tr>
        	</table>
        </div>
			</div>

			<div class="panel panel-default">
        <div class="panel-heading"><h3 class="panel-title">Dirección Actual del Estudiante</h3></div>
        <div class="panel-body">
	    	<table class="table table-hover">
    	    	<tr><td>Provincia</td><td>::</td><td><input type="text" name="provinciaA" value="<?php echo mayuscula($alu['ProvinciaE']);?>" class="form-control"/></td></tr>
            <tr><td>Sección</td><td>::</td><td><input type="text" name="seccionA" value="<?php echo mayuscula($alu['MunicipioE']);?>" class="form-control"/></td></tr>
            <tr><td>Localidad</td><td>::</td><td><input type="text" name="localidadA" value="<?php echo mayuscula($alu['ComunidadE']);?>" class="form-control"/></td></tr>
            <tr><td>Zona</td><td>::</td><td><input type="text" name="zonaA" value="<?php echo mayuscula($al['Zona']);?>" class="form-control"/></td></tr>
            <tr><td>Calle</td><td>::</td><td><input type="text" name="calleA" value="<?php echo mayuscula($al['Calle']);?>" class="form-control"/></td></tr>
            <tr><td>Numero</td><td>::</td><td><input type="text" name="numeroViviendaA" value="<?php echo mayuscula($al['Numero']);?>" class="form-control"/></td></tr>
            <tr><td>Teléfono</td><td>::</td><td><input type="text" name="telefonoA" value="<?php echo mayuscula($al['TelefonoCasa']);?>" class="form-control"/></td></tr>
            <tr><td>Celular</td><td>::</td><td><input type="text" name="celularA" value="<?php echo mayuscula($al['Celular']);?>" class="form-control"/></td></tr>
        	</table>
				</div>
			</div>
			<div class="panel panel-danger">
				<div class="panel-heading"><h3 class="panel-title">Aspectos Sociales</h3></div>
				<div class="panel-body">
	    	<table class="table table-hover">
    	    	<tr><td colspan="3">Idiomas</td></tr>
                <tr><td>Lengua Materna</td><td>::</td><td><input type="text" name="lenguaMaterna" value="<?php echo $alu['LenguaMater']?>" class="form-control"/></td></tr>
                <tr class="contenido"><td>Lenguas del Estudiantes</td><td>::</td><td>
                	Castellano<select name="lenguaCastellano"><option value="1" selected="selected">SI</option><option value="0">NO</option></select>
									<br>
                	Ingles<select name="lenguaIngles"><option value="1">SI</option><option value="0" selected="selected">NO</option></select><br />

                    Aymara<select name="lenguaAymara"><option value="1">SI</option><option value="0" selected="selected">NO</option></select>
                    </td></tr>
                <tr><td>Se Identifica</td><td>::</td><td><select name="identificaA" class="form-control"><option value="NINGUNO" selected="selected">NINGUNO</option><option value="AYMARA">AYMARA</option><option value="QUECHUA">QUECHUA</option></select></td></tr>
                <tr><td colspan="3">Salud</td></tr>
                <tr><td>¿Tiene un Centro de Salud a su Alrededor?</td><td>::</td><td><select name="centroSalud" class="form-control"><option value="1" selected="selected">SI</option><option value="0">NO</option></select></td></tr>
								<tr><td colspan="3">¿Donde Acudio por problemas de salud?</td></tr>
								<tr><td>Caja o Seguro</td><td>::</td><td><select name="CajaSeguro" class="form-control"><option value="1" selected="selected">SI</option><option value="0">NO</option></select></td></tr>
								<tr><td>Establecimiento Público</td><td>::</td><td><select name="EstaPublico" class="form-control"><option value="1" selected="selected">SI</option><option value="0">NO</option></select></td></tr>
								<tr><td>Establecimiento Privado</td><td>::</td><td><select name="EstaPrivado" class="form-control"><option value="1" selected="selected">SI</option><option value="0">NO</option></select></td></tr>
								<tr><td>En su vivienda</td><td>::</td><td><select name="EnVivienda" class="form-control"><option value="1" selected="selected">SI</option><option value="0">NO</option></select></td></tr>
								<tr><td>Medicina Tradicional</td><td>::</td><td><select name="MedicinaTradicional" class="form-control"><option value="1" selected="selected">SI</option><option value="0">NO</option></select></td></tr>
								<tr><td>Automedicación</td><td>::</td><td><select name="Automedicacion" class="form-control"><option value="1" selected="selected">SI</option><option value="0">NO</option></select></td></tr>

                <tr><td>¿Cuantas veces acudió el año pasado?</td><td>::</td><td><select name="vecesSalud" class="form-control"><option value="1a2">1 a 2 veces</option><option value="3a5">3 a 5 veces</option><option value="6a+">6 o más veces</option><option value="ninguna">Ninguna</option></select></td></tr>
                <tr><td>Seguro</td><td>::</td><td><select name="Seguro" class="form-control"><option value="1" <?php echo $alu['Seguro']?'selected="selected"':''?>>SI</option><option value="0"  <?php echo !$alu['Seguro']?'selected="selected"':''?>>NO</option></select></td></tr>

								<tr><td>¿La vivienda que ocupa es?</td><td>::</td><td><select name="ViviendaOcupa" class="form-control"><option value="1" <?php echo $alu['ViviendaOcupa']==1?'selected="selected"':''?>>Propia</option><option value="2"  <?php echo $alu['ViviendaOcupa']==2?'selected="selected"':''?>>Alquilada</option><option value="3"  <?php echo $alu['ViviendaOcupa']==3?'selected="selected"':''?>>Anticretico</option><option value="4"  <?php echo $alu['ViviendaOcupa']==4?'selected="selected"':''?>>Cedida por Servicios</option><option value="5"  <?php echo $alu['ViviendaOcupa']==5?'selected="selected"':''?>>Prestada por Parientes</option><option value="6"  <?php echo $alu['ViviendaOcupa']==6?'selected="selected"':''?>>Contrato Mixto Alguiler y Anticretico</option></select></td></tr>
                <tr><td colspan="3">Acceso de Servicios Basicos</td></tr>
                <tr><td>Agua Potable a Domicilio</td><td>::</td><td><select name="aguaPotable" class="form-control"><option value="1" selected="selected">SI</option><option value="0">NO</option></select></td></tr>
                <tr><td>Electricidad Red Publica</td><td>::</td><td><select name="electricidad" class="form-control"><option value="1" selected="selected">SI</option><option value="0">NO</option></select></td></tr>
                <tr><td>Alcantarillado</td><td>::</td><td><select name="alcantarillado" class="form-control"><option value="1" selected="selected">SI</option><option value="0">NO</option></select></td></tr>
                <tr><td>¿El estudiante trabaja?</td><td>::</td><td><select name="trabaja" class="form-control" readonly><option value="NOTRABAJA" selected="selected">NO TRABAJA</option><option value="EMPLEADO">EMPLEADO</option><option value="INDEPENDIENTE" >INDEPENDIENTE</option><option value="DOMESTICOCASA" >TRABAJO DOMESTICO EN CASA</option></select></td></tr>
                <tr><td>¿El estudiante tiene acceso a Internet?</td><td>::</td><td>
                    	<select name="internet" id="internet" class="form-control">
                    	<option value="5" <?php echo $alu['InternetCasa']=='5'?'selected="selected"':'';?>>No Accede a Internet</option>
                        <option value="1" <?php echo $alu['InternetCasa']=='1'?'selected="selected"':'';?>>Su Domicilio</option>
                        <option value="2" <?php echo $alu['InternetCasa']=='2'?'selected="selected"':'';?>>En la Unidad Educativa</option>
                        <option value="3" <?php echo $alu['InternetCasa']=='3'?'selected="selected"':'';?>>Lugares Públicos</option>
												<option value="4" <?php echo $alu['InternetCasa']=='4'?'selected="selected"':'';?>>Teléfono de Celular</option>
                        </select>
                    </td></tr>
                <tr><td>¿El estudiante se traslada en?</td><td>::</td><td><select name="traslado" class="form-control"><option value="APIE" <?php echo $alu['Transporte']=="APIE"?'selected="selected"':'';?>>A PIE</option><option value="MINIBUS" <?php echo $alu['Transporte']=="MINIBUS"?'selected="selected"':'';?>>MINIBUS</option></select></td></tr>
                <tr><td>Tiempo que tarda el Estudiante</td><td>::</td><td><input type="text" name="tiempo" value="Menos de media Hora" readonly="readonly" class="form-control"/></td></tr>
								<tr><td>¿El estudiante vive con?</td><td>::</td><td>
                    	<select name="ViveCon" id="ViveCon" class="form-control">

                        <option value="1" <?php echo $alu['ViveCon']=='1'?'selected="selected"':'';?>>Padre y Madre</option>
                        <option value="2" <?php echo $alu['ViveCon']=='2'?'selected="selected"':'';?>>Solo Padre</option>
                        <option value="3" <?php echo $alu['ViveCon']=='3'?'selected="selected"':'';?>>Solo Madre</option>
												<option value="4" <?php echo $alu['ViveCon']=='4'?'selected="selected"':'';?>>Tutor</option>
												<option value="5" <?php echo $alu['ViveCon']=='5'?'selected="selected"':'';?>>Solo</option>
                        </select>
                    </td></tr>
        	</table>
				</div>
			</div>


			<div class="panel panel-default">
				<div class="panel-heading"><h3 class="panel-title">Datos del Padre</div>
					<div class="panel-body">
		    	<table class="table table-hover">
           	 	<tr><td>Cedula de Identidad</td><td>::</td><td><?php carnet("CedulaPadre","CiExtP",$al['CiPadre'],$al['CiExtP'])?></td></tr>
            	<tr><td>Apellidos</td><td>::</td><td><input type="text" name="ApellidosP" value="<?php echo mayuscula($al['ApellidosPadre']);?>" class="form-control"/></td></tr>
                <tr><td>Nombres</td><td>::</td><td><input type="text" name="nombresP" value="<?php echo mayuscula($al['NombrePadre']);?>" class="form-control"/></td></tr>
                <tr><td>Ocupación Laboral</td><td>::</td><td><input type="text" name="ocupacionP" value="<?php echo mayuscula($al['OcupPadre']);?>" class="form-control"/></td></tr>
                <tr><td>Mayor Grado de Instrucción </td><td>::</td><td><select name="instruccionP" class="form-control">
                	<option value="NINGUNA" <?php echo $alu['InstruccionP']=="NINGUNA"?'selected="selected"':'';?>>NINGUNA</option>
                    <option value="PRIMARIA" <?php echo $alu['InstruccionP']=="PRIMARIA"?'selected="selected"':'';?>>PRIMARIA</option>
                    <option value="SECUNDARIA" <?php echo $alu['InstruccionP']=="SECUNDARIA"?'selected="selected"':'';?>>SECUNDARIA</option>
                    <option value="TECNICO MEDIO" <?php echo $alu['InstruccionP']=="TECNICO MEDIO"?'selected="selected"':'';?>>TECNICO MEDIO</option>
                    <option value="TECNICO SUPERIOR" <?php echo $alu['InstruccionP']=="TECNICO SUPERIOR"?'selected="selected"':'';?>>TECNICO SUPERIOR</option>
                    <option value="NORMALISTA" <?php echo $alu['InstruccionP']=="NORMALISTA"?'selected="selected"':'';?>>NORMALISTA</option>
                    <option value="LICENCIATURA" <?php echo $alu['InstruccionP']=="LICENCIATURA"?'selected="selected"':'';?>>LICENCIATURA</option>
                    <option value="CARRERA MILITAR" <?php echo $alu['InstruccionP']=="CARRERA MILITAR"?'selected="selected"':'';?>>CARRERA MILITAR</option>
                    <option value="POSTGRADO" <?php echo $alu['InstruccionP']=="POSTGRADO"?'selected="selected"':'';?>>POSTGRADO</option>
                    <option value="BACHILLER" <?php echo $alu['InstruccionP']=="BACHILLER"?'selected="selected"':'';?>>BACHILLER</option>
                    <option value="UNIVERSITARIO" <?php echo $alu['InstruccionP']=="UNIVERSITARIO"?'selected="selected"':'';?>>UNIVERSITARIO</option>
                    <option value="NO SABE/NO RESPONDE" <?php echo $alu['InstruccionP']=="NO SABE/NO RESPONDE"?'selected="selected"':'';?>>NO SABE/ NO RESPONDE</option>
                    </select></td></tr>
								<tr><td>Fecha de Nacimiento</td><td>::</td><td><input type="date" name="FechaNacP" value="<?php echo ($alu['FechaNacP']);?>" class="form-control"/></td></tr>
								<tr><td>Idioma que habla con frecuencia</td><td>::</td><td><input type="text" name="idiomaP" value="<?php echo mayuscula($alu['IdiomaP']);?>" class="form-control"/></td></tr>
                <tr><td>Telefono del Padre</td><td>::</td><td><input type="text" name="telefonoP" value="<?php echo mayuscula($al['CelularP']);?>" class="form-control"/></td></tr>

            </table>
					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading"><h3 class="panel-title">Datos del Madre</div>
						<div class="panel-body">
			    	<table class="table table-hover">
							<tr><td>Cedula de Identidad</td><td>::</td><td><?php carnet("CedulaMadre","CiExtM",$al['CiMadre'],$al['CiExtM'])?></td></tr>
            	<tr><td>Apellidos</td><td>::</td><td><input type="text" name="paternoM" value="<?php echo mayuscula($al['ApellidosMadre']);?>" class="form-control"/></td></tr>
                <tr><td>Nombres</td><td>::</td><td><input type="text" name="nombresM" value="<?php echo mayuscula($al['NombreMadre']);?>" class="form-control"/></td></tr>
                <tr><td>Ocupación Laboral</td><td>::</td><td><input type="text" name="ocupacionM" value="<?php echo mayuscula($al['OcupMadre']);?>" class="form-control"/></td></tr>
                <tr><td>Mayor Grado de Instrucción </td><td>::</td><td><select name="instruccionM" class="form-control">
                	<option value="NINGUNA" <?php echo $alu['InstruccionM']=="NINGUNA"?'selected="selected"':'';?>>NINGUNA</option>
                    <option value="PRIMARIA" <?php echo $alu['InstruccionM']=="PRIMARIA"?'selected="selected"':'';?>>PRIMARIA</option>
                    <option value="SECUNDARIA" <?php echo $alu['InstruccionM']=="SECUNDARIA"?'selected="selected"':'';?>>SECUNDARIA</option>
                    <option value="TECNICO MEDIO" <?php echo $alu['InstruccionM']=="TECNICO MEDIO"?'selected="selected"':'';?>>TECNICO MEDIO</option>
                    <option value="TECNICO SUPERIOR" <?php echo $alu['InstruccionM']=="TECNICO SUPERIOR"?'selected="selected"':'';?>>TECNICO SUPERIOR</option>
                    <option value="NORMALISTA" <?php echo $alu['InstruccionM']=="NORMALISTA"?'selected="selected"':'';?>>NORMALISTA</option>
                    <option value="LICENCIATURA" <?php echo $alu['InstruccionM']=="LICENCIATURA"?'selected="selected"':'';?>>LICENCIATURA</option>
                    <option value="CARRERA MILITAR" <?php echo $alu['InstruccionM']=="CARRERA MILITAR"?'selected="selected"':'';?>>CARRERA MILITAR</option>
                    <option value="POSTGRADO" <?php echo $alu['InstruccionM']=="POSTGRADO"?'selected="selected"':'';?>>POSTGRADO</option>
                    <option value="BACHILLER" <?php echo $alu['InstruccionM']=="BACHILLER"?'selected="selected"':'';?>>BACHILLER</option>
                    <option value="UNIVERSITARIO" <?php echo $alu['InstruccionM']=="UNIVERSITARIO"?'selected="selected"':'';?>>UNIVERSITARIO</option>
                    <option value="NO SABE/NO RESPONDE" <?php echo $alu['InstruccionM']=="NO SABE/NO RESPONDE"?'selected="selected"':'';?>>NO SABE/ NO RESPONDE</option>
                    </select></td></tr>
								<tr><td>Fecha de Nacimiento</td><td>::</td><td><input type="date" name="FechaNacM" value="<?php echo ($alu['FechaNacM']);?>" class="form-control"/></td></tr>
                <tr><td>Idioma que habla con frecuencia</td><td>::</td><td><input type="text" name="idiomaM" value="<?php echo mayuscula($alu['IdiomaM']);?>" class="form-control"/></td></tr>
                <tr><td>Telefono del Madre</td><td>::</td><td><input type="text" name="telefonoM" value="<?php echo mayuscula($al['CelularM']);?>" class="form-control"/></td></tr>

            </table>

					</div>
				</div>


				<div class="panel panel-default">
					<div class="panel-heading"><h3 class="panel-title">Datos del Tutor</div>
						<div class="panel-body">
			    	<table class="table table-hover">
	           	 	<tr><td>Cedula de Identidad</td><td>::</td><td><?php carnet("CiTutor","CiExtT",$alu['CiTutor'],$alu['CiExtT'])?></td></tr>
	            		<tr><td>Apellido Paterno</td><td>::</td><td><input type="text" name="ApellidoPT" value="<?php echo mayuscula($alu['ApellidoPT']);?>" class="form-control"/></td></tr>
									<tr><td>Apellido Materno</td><td>::</td><td><input type="text" name="ApellidoMT" value="<?php echo mayuscula($alu['ApellidoMT']);?>" class="form-control"/></td></tr>
	                <tr><td>Nombres</td><td>::</td><td><input type="text" name="NombresT" value="<?php echo mayuscula($alu['NombresT']);?>" class="form-control"/></td></tr>
	                <tr><td>Ocupación Laboral</td><td>::</td><td><input type="text" name="OcupacionT" value="<?php echo mayuscula($alu['OcupacionT']);?>" class="form-control"/></td></tr>
	                <tr><td>Mayor Grado de Instrucción </td><td>::</td><td><select name="InstruccionT" class="form-control">
	                	<option value="NINGUNA" <?php echo $alu['InstruccionT']=="NINGUNA"?'selected="selected"':'';?>>NINGUNA</option>
	                    <option value="PRIMARIA" <?php echo $alu['InstruccionT']=="PRIMARIA"?'selected="selected"':'';?>>PRIMARIA</option>
	                    <option value="SECUNDARIA" <?php echo $alu['InstruccionT']=="SECUNDARIA"?'selected="selected"':'';?>>SECUNDARIA</option>
	                    <option value="TECNICO MEDIO" <?php echo $alu['InstruccionT']=="TECNICO MEDIO"?'selected="selected"':'';?>>TECNICO MEDIO</option>
	                    <option value="TECNICO SUPERIOR" <?php echo $alu['InstruccionT']=="TECNICO SUPERIOR"?'selected="selected"':'';?>>TECNICO SUPERIOR</option>
	                    <option value="NORMALISTA" <?php echo $alu['InstruccionT']=="NORMALISTA"?'selected="selected"':'';?>>NORMALISTA</option>
	                    <option value="LICENCIATURA" <?php echo $alu['InstruccionT']=="LICENCIATURA"?'selected="selected"':'';?>>LICENCIATURA</option>
	                    <option value="CARRERA MILITAR" <?php echo $alu['InstruccionT']=="CARRERA MILITAR"?'selected="selected"':'';?>>CARRERA MILITAR</option>
	                    <option value="POSTGRADO" <?php echo $alu['InstruccionT']=="POSTGRADO"?'selected="selected"':'';?>>POSTGRADO</option>
	                    <option value="BACHILLER" <?php echo $alu['InstruccionT']=="BACHILLER"?'selected="selected"':'';?>>BACHILLER</option>
	                    <option value="UNIVERSITARIO" <?php echo $alu['InstruccionT']=="UNIVERSITARIO"?'selected="selected"':'';?>>UNIVERSITARIO</option>
	                    <option value="NO SABE/NO RESPONDE" <?php echo $alu['InstruccionT']=="NO SABE/NO RESPONDE"?'selected="selected"':'';?>>NO SABE/ NO RESPONDE</option>
	                    </select></td></tr>
									<tr><td>Fecha de Nacimiento</td><td>::</td><td><input type="date" name="FechaNacT" value="<?php echo ($alu['FechaNacT']);?>" class="form-control"/></td></tr>
									<tr><td>Idioma que habla con frecuencia</td><td>::</td><td><input type="text" name="IdiomaT" value="<?php echo mayuscula($alu['IdiomaT']);?>" class="form-control"/></td></tr>
	                <tr><td>Telefono del Tutor</td><td>::</td><td><input type="text" name="CelularT" value="<?php echo mayuscula($alu['CelularT']);?>" class="form-control"/></td></tr>

	                <tr><td>Grado de Parentesco </td><td>::</td><td><input type="text" name="ParentescoT" value="<?php echo $alu['ParentescoT']?>" class="form-control"></td>

	            </table>
						</div>
					</div>
					<input type="submit" value="Actualizar Datos Rude" class="btn btn-success"/>
    </form>
    <?php
}

?>
