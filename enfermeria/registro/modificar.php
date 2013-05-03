<?php
include_once("../../login/check.php");
$titulo="Modificar Enfermera";
$folder="../../";
extract($_GET);
$nombre="enfermera";
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
        <td><?php campos("CIE","cie","text",$datos['cie'],1,array("required"=>"required"));?></td>
      	<td><?php campos("CI","ci","text",$datos['ci'],0);?> </td>
      </tr>
      <tr>
        <td><?php campos("Nombre","nombre","text",$datos['nombre'],1,array("required"=>"required"));?></td>
      	<td><?php campos("Paterno","apep","text",$datos['apep'],0);?> </td>
      </tr>
      <tr>
        <td><?php campos("Materno","apem","text",$datos['apem'],0);?> </td>
	    <td><?php campos("Teléfono","telefono","text",$datos['telefono'],0);?> </td>
      </tr>  
      <tr>
        <td><?php campos("Dirección","direccion","text",$datos['direccion']);?></td>
      	<td><?php campos("Nivel Profesional","nivelprof","select",array("Licenciatura"=>"Licenciatura","Auxiliar"=>"Auxiliar"),0,"",$datos['nivelprof']);?> </td>
      </tr>
      <tr>
        <td><?php campos("Cargo","cargo","text",$datos['cargo']);?></td>
      	<td><?php campos("Fecha Ingreso","fechain","date",$datos['fechain']);?> </td>
      </tr>
      <tr>
        <td><?php campos("Observación","observ","text",$datos['observ']);?></td>
      </tr>
      <tr><td><?php campos("Guardar","","submit");?></td></tr>
  </table>
</fieldset>
</form>
</div>
<?php
include("../../piepagina.php");
?>