<?php
include_once("../../login/check.php");
$titulo="Listado de Pacientes";
$folder="../../";
include_once("../../class/paciente.php");
include_once($folder."cabecerahtml.php");
$lateral=0;
$menulateral=array("Listado"=>"listado.php","Nuevo"=>"nuevo.php");

?>
<script type="text/javascript" src="../../js/busquedas/busquedas.js"></script>
<?php include_once("../../cabecera.php"); ?>
<?php include_once("../../lateral.php"); ?>
<div class="contenido">
	<fieldset>
		<legend>Criterio Busqueda</legend>
			<form action="busqueda.php" method="post" id="busqueda">
				<table class="tablabusqueda">
					<tr>
						<td>Nombre: <input type="text" name="nombre" id="nombre" autofocus/></td>
						<td>Apellido Paterno: <input type="text" name="apep" id="apep"/></td>
						<td>Apellido Materno: <input type="text" name="apem" id="apem"/></td>
						<td>C.I.: <input type="text" name="ci" id="ci" size="10"/></td>
					</tr>
					<tr>
						<td><input type="submit" value="Buscar"></td>
					</tr>
				</table>
			</form>
	</fieldset>
	<fieldset>
		<legend>Listado de Pacientes</legend>
		<div id="respuesta"></div>
	</fieldset>
</div>
<?php include_once("../../piepagina.php") ?>