<?php
include_once("../../login/check.php");
include_once("../../funciones/funciones.php");
$titulo="Nueva Enfermera";
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
        <td><?php campos("CIE","cie","text","",1,array("required"=>"required"));?></td>
      	<td><?php campos("CI","ci","text","",0);?> </td>
      </tr>
      <tr>
        <td><?php campos("Nombre","nombre","text","",1,array("required"=>"required"));?></td>
      	<td><?php campos("Paterno","apep","text","",0);?> </td>
      </tr>
      <tr>
        <td><?php campos("Materno","apem","text","",0);?> </td>
	    <td><?php campos("Teléfono","telefono","text","",0);?> </td>
      </tr>  
      <tr>
        <td><?php campos("Dirección","direccion","text","");?></td>
      	<td><?php campos("Nivel Profesional","nivelprof","select",array("Licenciatura"=>"Licenciatura","Auxiliar"=>"Auxiliar"),0);?> </td>
      </tr>
      <tr>
        <td><?php campos("Cargo","cargo","text","");?></td>
      	<td><?php campos("Fecha Ingreso","fechain","date","");?> </td>
      </tr>
      <tr>
        <td><?php campos("Observación","observ","text","");?></td>
      </tr>
      <tr><td><?php campos("Guardar","","submit");?></td></tr>
  </table>
</fieldset>
</form>
</div>
<?php
include("../../piepagina.php");
?>