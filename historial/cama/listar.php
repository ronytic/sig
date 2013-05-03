<?php
include_once("../../login/check.php");
include_once("../../funciones/funciones.php");
$titulo="Listado de Camas";
$folder="../../";
$anombre="sala";
include_once '../../class/'.$anombre.'.php';
${$anombre}=new $anombre;
$sal=todolista(${$anombre}->mostrarTodo(),"idsala","nombresala,numerosala,numerocamas"," - ");
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
                        <td><?php campos("Sala","idsala","select",$sal,1);?></td>
                        <td><?php campos("Número Cama","numerocama","text","",0,"");?></td>
                        <td><?php campos("Marca","marca","text","",0,"");?></td>
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