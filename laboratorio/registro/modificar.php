<?php
include_once("../../login/check.php");
$titulo="Modificar Medico";
$folder="../../";
extract($_GET);
$nombre="laboratorio";
include_once '../../class/'.$nombre.'.php';
${$nombre}=new $nombre;
$datos=array_shift(${$nombre}->mostrar($id));

$anombre="tipolaboratorio";
	include_once '../../class/'.$anombre.'.php';
	${$anombre}=new $anombre;
	$tipolabo=todolista(${$anombre}->mostrarTodo(),"idtipolaboratorio","nombre","");

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
        <td><?php campos("Nombre Analisis","nombreanalisis","text",$datos['nombreanalisis'],1,array("required"=>"required"));?></td>
      	<td><?php campos("Descripción","descripcion","text",$datos[''],0);?> </td>
      </tr>
      <tr>
        <td><?php campos("Tipo de Laboratorio","idtipolaboratorio","select",$tipolabo,0,"",$datos['idtipolaboratorio']);?> </td>
      </tr>  
      <tr>
        <td><?php campos("Precio","precio","text",$datos['precio']);?></td>
      	<td><?php campos("Observación","obs","text",$datos['obs'],0);?> </td>
      </tr>
      <tr><td><?php campos("Guardar","","submit");?></td></tr>
  </table>
</fieldset>
</form>
</div>
<?php
include("../../piepagina.php");
?>