<?php
include_once("../../login/check.php");
include_once("../../funciones/funciones.php");
$titulo="Listado de Especialidades";
$folder="../../";
	$anombre="especialidad";
	include_once '../../class/'.$anombre.'.php';
	${$anombre}=new $anombre;
	$espe=todolista(${$anombre}->mostrarTodo(),"idespecialidad","nombre","");
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
                        <td><?php echo campos("Ap. Paterno","paterno","text","",0);?></td>
                        <td><?php echo campos("Ap. Materno","materno","text","",0);?></td>
                    </tr>
                    <tr>
                        <td><?php echo campos("CI","ci","text","",0);?></td>
                        <td><?php echo campos("Especialidad","idespecialidad","select",$espe,0);?></td>
					</tr>
					<tr>
						<td><input type="submit" value="Buscar"></td>
                        <td colspan="2"><a href="todomedico.php" class="botonerror">Reporte Todos los Medicos
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