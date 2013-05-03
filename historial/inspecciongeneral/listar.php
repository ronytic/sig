<?php
include_once("../../login/check.php");
include_once("../../funciones/funciones.php");
$titulo="Listado de Inspección General";
$folder="../../";
	$anombre="historialexterno";
include_once '../../class/'.$anombre.'.php';
${$anombre}=new $anombre;
$hist=todolista(${$anombre}->mostrarTodo(),"idhistorialexterno","idhistorialexterno,fechaelaboracion,motivoconsulta,enfermedadactual"," - ");
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
                        <td><?php campos("Numero Historal","idhistorialexterno","select",$hist,1,"");?></td>
                    </tr>
					<tr>
						<td><input type="submit" value="Buscar"></td>
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