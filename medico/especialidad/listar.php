<?php
include_once("../../login/check.php");
include_once("../../funciones/funciones.php");
$titulo="Listado de Especialidades";
$folder="../../";

include_once($folder."cabecerahtml.php");
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
						<td><?php echo campos("Nombre","nombre","text","",1);?></td>
					</tr>
					<tr>
						<td><input type="submit" value="Buscar"></td>
                        <td colspan="2"><a href="todoespecialidad.php" class="botonerror">Reporte de Toda las Especialidades
                        </a></td>
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