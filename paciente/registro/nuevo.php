<?php
include_once("../../login/check.php");
$titulo="Registro de Paciente";
$folder="../../";

include($folder."cabecerahtml.php");
?>

<?php include($folder."cabecera.php");?>
<?php include($folder."lateral.php");?>


    <div class="contenido">
        <form action="guardar.php" method="post">
        <fieldset>
        <legend>REGISTRO DE PACIENTE</legend>
        <table class="tablareg">
			<tr><td class="der">Nombres</td><td><input type="text" name="nombres" required title="Introdusca un nombre" autofocus="autofocus"/></td><td class="separador">Ap. Paterno</td><td><input type="text" name="app" id="app"></td></tr>
			<tr><td class="der">Ap.Materno</td><td><input type="text" name="apm"></td><td class="separador">C.I.</td><td><input type="text" name="ci" size="10"><span class="pequeno">Solo números Ej:4455336</span></td></tr>
			<tr><td class="der">Direccion</td><td><input type="text" name="dir"></td><td class="separador">Telefono</td><td><input type="text" name="fono"></td></tr>
			<tr><td class="der">Sexo</td><td><select name="sexo"><option selected>Seleccione...</option><option value="F">Femenino</option><option value="M">Masculino</option></select></td><td class="separador">Estado Civil</td><td><select name="civil" id="civil"><option selected="selected">Seleccione...</option><option>Soltero</option><option>Concubinato</option><option>Casado</option><option>Divorciado</option><option>Viudo</option></select></td></tr>
			<tr><td class="der">Fecha Nacimiento</td><td><input type="date" name="fec"></td><td class="separador">Lugar Origen</td><td><input type="text" name="origen"></td></tr>
			<tr><td class="der">Lugar Residencia</td><td><input type="text" name="res"></td><td class="separador">Nacionalidad</td><td><select name="nac" id="nac"><option selected>Seleccione...</option><option value="Boliviana">Boliviana</option><option value="Peruana">Peruana</option><option value="Chilena">Chilena</option><option value="Argentina">Argentina</option><option value="Otro">Otro</option></select></td></tr>
			<tr><td class="der">Ocupacion</td><td><input type="text" name="ocu"></td><td class="separador"></td><td></td></tr>
			<tr><td class="der">Persona Referencia</td><td><input type="text" name="ref" id="ref"></td><td class="separador">Telefono Referencia</td><td><input type="text" name="reffono"></td></tr>
			<tr><td class="der">Observaciones</td><td><textarea class="estilo" cols="20" rows="4" name="observaciones"></textarea></td><td class="separador"></td><td><input name="Guardar" type="submit" value="Guardar Paciente"></td></tr>
		</table>        
        </fieldset>
        </form>
    </div>
<?php include($folder."piepagina.php");?>