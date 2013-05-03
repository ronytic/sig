<?php
include_once("../../login/check.php");
$titulo="Modificar Medico";
$folder="../../";
extract($_GET);
$nombre="medico";
include_once '../../class/'.$nombre.'.php';
${$nombre}=new $nombre;
$datos=array_shift(${$nombre}->mostrar($id));

$anombre="especialidad";
	include_once '../../class/'.$anombre.'.php';
	${$anombre}=new $anombre;
	$espe=todolista(${$anombre}->mostrarTodo(),"idespecialidad","nombre","");

include_once("../../cabecerahtml.php");
?>
<?php include_once("../../cabecera.php");?>
<?php include_once("../../lateral.php");?>
<div class="contenido">
<form action="actualizar.php" method="post">
<?php campos("","id","hidden",$id);?>
<fieldset>
	<legend><?php echo $titulo;?></legend>
    <table class="tablareg">
      <tr>
        <td><?php campos("Nombre","nombre","text",$datos['nombre'],1,array("required"=>"required"));?></td>
      	<td><?php campos("Paterno","paterno","text",$datos['paterno'],0);?> </td>
      </tr>
      <tr>
        <td><?php campos("Materno","materno","text",$datos['materno'],0);?> </td>
	    <td><?php campos("Teléfono","telefono","text",$datos['telefono'],0);?> </td>
      </tr>  
      <tr>
        <td><?php campos("Dirección","direccion","text",$datos['direccion']);?></td>
      	<td><?php campos("Correo","correo","text",$datos['correo'],0);?> </td>
      </tr>
      <tr>
        <td><?php campos("CI","ci","text",$datos['ci']);?></td>
      	<td><?php campos("Cedula","ced","text",$datos['ced']);?> </td>
      </tr>
      <tr>
        <td><?php campos("Fecha Egreso","fecegre","text",$datos['fecegre']);?></td>
      	<td><?php campos("Especialidad","idespecialidad","select",$espe,0,"",$datos['idespecialidad']);?> </td>
      </tr>
      <tr><td><?php campos("Guardar","","submit");?></td></tr>
  </table>
</fieldset>
</form>
</div>
<?php
include("../../piepagina.php");
?>