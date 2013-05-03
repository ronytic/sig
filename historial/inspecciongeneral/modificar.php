<?php
include_once("../../login/check.php");
$titulo="Modificar Inspección General";
$folder="../../";
extract($_GET);
$nombre="inspecciongeneral";
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
        <td colspan="2"><?php campos("Numero Historial","idhistorialexterno","select",$hist,1,array("required"=>"required"),$datos['idhistorialexterno']);?></td>
    </tr>
    <tr>
        <td><?php campos("cabeza","cabeza","text",$datos,1,"");?></td>
     </tr>
    <tr>
        <td><?php campos("cuello","cuello","text",$datos,0,"");?></td>
      </tr>
      <tr>
      	<td><?php campos("torax","torax","text",$datos,0,"");?></td>
      </tr>
    <tr>
        <td><?php campos("cardio","cardio","text",$datos,0,"");?></td>
      </tr>
      <tr>
      	<td><?php campos("abdomen","abdomen","text",$datos,0,"");?></td>
      </tr>
    <tr>
        <td><?php campos("urinario","urinario","text",$datos,0,"");?></td>
      </tr>
      <tr>
      	<td><?php campos("otros","otros","text",$datos,0,"");?></td>
      </tr>
      <tr><td><?php campos("Guardar","","submit");?></td></tr>
  </table>
</fieldset>
</form>
</div>
<?php
include("../../piepagina.php");
?>