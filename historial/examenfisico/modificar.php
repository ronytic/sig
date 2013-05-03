<?php
include_once("../../login/check.php");
$titulo="Modificar Examen Fisico";
$folder="../../";
extract($_GET);
$nombre="examenfisico";
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
        <td><?php campos("presionarterial","presionarterial","text",$datos,1,"");?></td>
     </tr>
    <tr>
        <td><?php campos("frecuenciacardiaca","frecuenciacardiaca","text",$datos,0,"");?></td>
      </tr>
      <tr>
      	<td><?php campos("frecuenciarespiratoria","frecuenciarespiratoria","text",$datos,0,"");?></td>
      </tr>
    <tr>
        <td><?php campos("talla","talla","text",$datos,0,"");?></td>
      </tr>
      <tr>
      	<td><?php campos("peso","peso","text",$datos,0,"");?></td>
      </tr>
    <tr>
        <td><?php campos("imc","imc","text",$datos,0,"");?></td>
      </tr>
      <tr>
      	<td><?php campos("temperatura","temperatura","text",$datos,0,"");?></td>
      </tr>
      <tr><td><?php campos("Guardar","","submit");?></td></tr>
  </table>
</fieldset>
</form>
</div>
<?php
include("../../piepagina.php");
?>