<?php 
include_once("../../login/check.php"); 
$titulo="Solicita Nuevo Analisis de Laboratorio";
$folder="../../"; 
include("../../cabecerahtml.php"); 
?>
<script language="javascript" type="text/javascript" src="../../js/busquedas/busquedas.js"></script>
<?php include("../../cabecera.php");?>
<?php include("../../lateral.php");?>
<div class="contenido">
<!--<form action="guardasolicita.php" method="get">-->
<form action="busqueda.php" method="post" id="busqueda">
<fieldset>
	<legend>Busqueda de Paciente para Analisis</legend>
	<table class="tabla">
	<tr>
		<td>Nombre<input type="text" name="nombre" autofocus></td><td>Paterno<input type="text" name="paterno"></td><td>Materno: <input type="text" name="materno"></td><td >C.I.<input type="text" name="ci" size="10"></td>
	</tr>
	<tr>
		<td><input type="submit" value="Buscar"></td>
	</tr>
	</table>
  <div id="respuesta"></div>
</fieldset>
</form>
<!--MUESTRA LOS DATOS DE LA BUSQUEDA-->
</div>
<?php include("../../piepagina.php");?>