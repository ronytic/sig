<?php
include_once("../../login/check.php");
$titulo="Modificar Sala";
$folder="../../";
extract($_GET);
$nombre="sala";
include_once '../../class/'.$nombre.'.php';
${$nombre}=new $nombre;
$datos=array_shift(${$nombre}->mostrar($id));

$anombre="historialexterno";
include_once '../../class/'.$anombre.'.php';
${$anombre}=new $anombre;
$hist=todolista(${$anombre}->mostrarTodo(),"idhistorialexterno","idhistorialexterno,fechaelaboracion,motivoconsulta,enfermedadactual"," - ");

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
        <td colspan="2"><?php campos("Nombre Sala","nombresala","text",$datos,1,array("required"=>"required"));?></td>
        <td colspan="2"><?php campos("Número Sala","numerosala","text",$datos,0);?></td>
    </tr>
    <tr>
        <td><?php campos("Número Camas","numerocamas","text",$datos,0,"");?></td>
     </tr>
      <tr><td><?php campos("Guardar","","submit");?></td></tr>
  </table>
</fieldset>
</form>
</div>
<?php
include("../../piepagina.php");
?>