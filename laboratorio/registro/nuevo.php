<?php
include_once("../../login/check.php");
include_once("../../funciones/funciones.php");
$titulo="Nuevo Laboratorio";
$folder="../../";
$anombre="tipolaboratorio";
include_once '../../class/'.$anombre.'.php';
${$anombre}=new $anombre;
$tipolabo=todolista(${$anombre}->mostrarTodo(),"idtipolaboratorio","nombre","");
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
        <td><?php campos("Nombre Analisis","nombreanalisis","text","",1,array("required"=>"required"));?></td>
      	<td><?php campos("Descripción","descripcion","text","",0);?> </td>
      </tr>
      <tr>
        <td><?php campos("Tipo de Laboratorio","idtipolaboratorio","select",$tipolabo,0);?> </td>
      </tr>  
      <tr>
        <td><?php campos("Precio","precio","text","");?></td>
      	<td><?php campos("Observación","obs","text","",0);?> </td>
      </tr>
      <tr><td><?php campos("Guardar","","submit");?></td></tr>
  </table>
</fieldset>
</form>
</div>
<?php
include("../../piepagina.php");
?>