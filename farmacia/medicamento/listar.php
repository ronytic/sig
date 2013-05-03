<?php
include_once("../../login/check.php");
$titulo="Listado de Medicamentos";
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
					</tr>
					<tr>
						<td><input type="submit" value="Buscar"></td>
                         <td><a href="todomedicamento.php" class="botonerror">Reporte Todos los Medicamentos</a></td>
					</tr>
				</table>
			</form>
	</fieldset>
	<fieldset>
		<legend><?php echo $titulo?></legend>
		<div id="respuesta"></div>
	</fieldset>
</div>
<?php include_once("../../piepagina.php") ?>