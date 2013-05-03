<?php
include_once("../../login/check.php");
include_once("../../funciones/funciones.php");
$titulo="Nuevo Medico";
$folder="../../";
$anombre="especialidad";
include_once '../../class/'.$anombre.'.php';
${$anombre}=new $anombre;
$espe=todolista(${$anombre}->mostrarTodo(),"idespecialidad","nombre","");
include_once("../../cabecerahtml.php");
?>
<?php include_once("../../cabecera.php");?>
<?php include_once("../../lateral.php");?>
<div class="contenido">
<form action="guardar.php" method="post">
<fieldset>
	<legend><?php echo $titulo;?></legend>
    <table class="tablareg">
      <tr>
        <td><?php campos("Nombre","nombre","text","",1,array("required"=>"required"));?></td>
      	<td><?php campos("Paterno","paterno","text","",0);?> </td>
      </tr>
      <tr>
        <td><?php campos("Materno","materno","text","",0);?> </td>
	    <td><?php campos("Teléfono","telefono","text","",0);?> </td>
      </tr>  
      <tr>
        <td><?php campos("Dirección","direccion","text","");?></td>
      	<td><?php campos("Correo","correo","text","",0);?> </td>
      </tr>
      <tr>
        <td><?php campos("CI","ci","text","");?></td>
      	<td><?php campos("Cedula","ced","text","");?> </td>
      </tr>
      <tr>
        <td><?php campos("Fecha Egreso","fecegre","text","");?></td>
      	<td><?php campos("Especialidad","idespecialidad","select",$espe);?> </td>
      </tr>
      <tr><td><?php campos("Guardar","","submit");?></td></tr>
  </table>
</fieldset>
</form>
</div>
<?php
include("../../piepagina.php");
?>