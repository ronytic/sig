<?php
include_once("../../login/check.php");
include_once("../../funciones/funciones.php");
$titulo="Nueva Antecedente Patologico";
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
        <td><?php campos("Nombre","nombre","text","",1,"");?></td>
      </tr>
      <tr>
      	<td><?php campos("menarca","menarca","text","",0,"");?></td>
        <td><?php campos("menopausia","menopausia","text","",0,"");?></td>
      </tr>
      <tr>
      	<td><?php campos("ciclo","ciclo","text","",0,"");?></td>
        <td><?php campos("fum","fum","text","",0,"");?></td>
      </tr>
      <tr>
      	<td><?php campos("gestas","gestas","text","",0,"");?></td>
        <td><?php campos("partos","partos","text","",0,"");?></td>
      </tr>
      <tr>
      	<td><?php campos("abortos","abortos","text","",0,"");?></td>
        <td><?php campos("cesarea","cesarea","text","",0,"");?></td>
      </tr>
      <tr><td><?php campos("Guardar","","submit");?></td></tr>
  </table>
</fieldset>
</form>
</div>
<?php
include("../../piepagina.php");
?>