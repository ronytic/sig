<?php
include_once("../../login/check.php");
include_once("../../funciones/funciones.php");
$titulo="Nuevo Examen Fisico";
$folder="../../";
$anombre="historialexterno";
include_once '../../class/'.$anombre.'.php';
${$anombre}=new $anombre;
$hist=todolista(${$anombre}->mostrarTodo(),"idhistorialexterno","idhistorialexterno,fechaelaboracion,motivoconsulta,enfermedadactual"," - ");
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
        <td colspan="2"><?php campos("Numero Historial","idhistorialexterno","select",$hist,1,array("required"=>"required"));?></td>
    </tr>
    <tr>
        <td><?php campos("presionarterial","presionarterial","text","",1,"");?></td>
     </tr>
    <tr>
        <td><?php campos("frecuenciacardiaca","frecuenciacardiaca","text","",0,"");?></td>
      </tr>
      <tr>
      	<td><?php campos("frecuenciarespiratoria","frecuenciarespiratoria","text","",0,"");?></td>
      </tr>
    <tr>
        <td><?php campos("talla","talla","text","",0,"");?></td>
      </tr>
      <tr>
      	<td><?php campos("peso","peso","text","",0,"");?></td>
      </tr>
    <tr>
        <td><?php campos("imc","imc","text","",0,"");?></td>
      </tr>
      <tr>
      	<td><?php campos("temperatura","temperatura","text","",0,"");?></td>
      </tr>
      <tr><td><?php campos("Guardar","","submit");?></td></tr>
  </table>
</fieldset>
</form>
</div>
<?php
include("../../piepagina.php");
?>