<?php 
include_once("../../login/check.php"); 
$titulo="Busqueda de Paciente Enfermera ";
$folder="../../"; 
include_once("../../class/especialidad.php");
$especialidad=new especialidad;
$espe=todolista($especialidad->mostrarTodo(),"idespecialidad","nombre"," ");
include("../../cabecerahtml.php"); 
?>
<script language="javascript" type="text/javascript" src="../../js/busquedas/busquedas.js"></script>
<?php include("../../cabecera.php");?>
<?php include("../../lateral.php");?>
<div class="contenido">
<!--<form action="guardasolicita.php" method="get">-->
<form action="busqueda.php" method="post" id="busqueda">
<fieldset>
	<legend>Busqueda de Paciente Interno en Espera</legend>
	<table class="tabla">
	<tr>
    	<td>HI-:<input type="text" name="idhistorialinterno" placeholder="Historial Interno"/><span class="pequeno">HI-xxxx</span></td>
		<td>Fecha:<input type="date" name="fecha" autofocus value="<?php //echo date("Y-m-d")?>"></td>
        <td><?php campos("Especialidad","especialidad","select",array_merge(array("0"=>"Seleccionar"),$espe),0,array("class"=>"seleccionar"))?></td>
	</tr>
    <tr><td><?php echo campos("Alta","alta","select",array("0"=>"No","1"=>"Si"),0,array("class"=>"seleccionar"));?></td></tr>
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