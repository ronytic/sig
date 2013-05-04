<?php
include_once("../../login/check.php");
$titulo="Modificar datos del Paciente";
$folder="../../";
if(!empty($_GET)):
$id=$_GET['id'];
include_once '../../class/paciente.php';
$paciente=new paciente;
$pa=array_shift($paciente->mostrar($id));
include($folder."cabecerahtml.php");
?>

<?php include($folder."cabecera.php");?>
<?php include($folder."lateral.php");?>


    <div class="contenido">
        <form action="actualizar.php" method="post"><input type="hidden" name="id" value="<?php echo $id ?>">
        <fieldset>
        <legend>DATOS DEL PACIENTE</legend>
        <table class="tablareg">
			<tr>
            	<td class="der">Nombres</td>
                <td><input type="text" name="nombres" required title="Introdusca un nombre" autofocus="autofocus" value="<?php echo $pa['nombre'];?>"/></td>
                <td class="separador">Ap. Paterno</td>
                <td><input type="text" name="paterno" id="app" value="<?php echo $pa['apep'];?>"></td>
            </tr>
			<tr><td class="der">Ap.Materno</td><td><input type="text" name="materno" value="<?php echo $pa['apem'];?>" required></td><td class="separador">C.I.</td><td><input type="text" name="ci" size="10" value="<?php echo $pa['ci'];?>" required><span class="pequeno">Solo números Ej:4455336</span></td></tr>
			<tr><td class="der">Direccion</td><td><input type="text" name="direccion" value="<?php echo $pa['direccion'];?>" required></td><td class="separador">Telefono</td><td><input type="text" name="fono" value="<?php echo $pa['telefono'];?>" required></td></tr>
			<tr><td class="der">Sexo</td><td><select name="sexo"><option>Seleccione...</option><option value="F" <?php echo $pa['sexo']=="F"?'selected':'';?>>Femenino</option><option value="M" <?php echo $pa['sexo']=="M"?'selected':'';?>>Masculino</option></select></td><td class="separador">Estado Civil</td><td><select name="civil" id="civil"><option>Seleccione...</option><option <?php echo $pa['estcivil']=="Soltero"?'selected':'';?>>Soltero</option><option <?php echo $pa['estcivil']=="Concubinato"?'selected':'';?>>Concubinato</option><option <?php echo $pa['estcivil']=="Casado"?'selected':'';?>>Casado</option><option <?php echo $pa['Divorciado']=="Soltero"?'selected':'';?>>Divorciado</option><option <?php echo $pa['estcivil']=="Viudo"?'selected':'';?>>Viudo</option></select></td></tr>
			<tr><td class="der">Fecha Nacimiento</td><td><input type="text" name="fec" value="<?php echo $pa['fecnac'];?>" ></td><td class="separador">Lugar Origen</td><td><input type="text" name="origen" value="<?php echo $pa['lugorg'];?>"></td></tr>
			<tr><td class="der">Lugar Residencia</td><td><input type="text" name="res" value="<?php echo $pa['lugres'];?>"></td><td class="separador">Nacionalidad</td><td><select name="nac" id="nac"><option>Seleccione...</option><option value="Boliviana" <?php echo $pa['nac']=="Boliviana"?'selected':'';?>>Boliviana</option><option value="Peruana" <?php echo $pa['nac']=="Peruana"?'selected':'';?>>Peruana</option><option value="Chilena" <?php echo $pa['nac']=="Chilena"?'selected':'';?>>Chilena</option><option value="Argentina" <?php echo $pa['nac']=="Argentina"?'selected':'';?>>Argentina</option><option value="Otro" <?php echo $pa['nac']=="Otro"?'selected':'';?>>Otro</option></select></td></tr>
			<tr><td class="der">Ocupacion</td><td><input type="text" name="ocu" value="<?php echo $pa['ocup'];?>" required></td><td class="separador"></td><td></td></tr>
			<tr><td class="der">Persona Referencia</td><td><input type="text" name="ref" id="ref" value="<?php echo $pa['refper'];?>" required></td><td class="separador">Telefono Referencia</td><td><input type="text" name="reffono" value="<?php echo $pa['reffono'];?>"></td></tr>
			<tr><td class="der">Observaciones</td><td><textarea class="estilo" cols="20" rows="4" name="obs"><?php echo $pa['obs'];?></textarea></td><td class="separador"></td><td><input name="Guardar" type="submit" value="Guardar Paciente"></td></tr>
		</table>        
        </fieldset>
        </form>
    </div>
<?php include($folder."piepagina.php");?>
<?php endif; ?>