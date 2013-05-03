<?php
include_once("../../login/check.php");
$titulo="Modificar Antecedente Patologico";
$folder="../../";
extract($_GET);
$nombre="antecedentepatologico";
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
        <td><?php campos("Nombre","nombre","text",$datos,1);?></td>
      </tr>
      <tr>
      	<td><?php campos("menarca","menarca","text",$datos,0,"");?></td>
        <td><?php campos("menopausia","menopausia","text",$datos,0,"");?></td>
      </tr>
      <tr>
      	<td><?php campos("ciclo","ciclo","text",$datos,0,"");?></td>
        <td><?php campos("fum","fum","text",$datos,0,"");?></td>
      </tr>
      <tr>
      	<td><?php campos("gestas","gestas","text",$datos,0,"");?></td>
        <td><?php campos("partos","partos","text",$datos,0,"");?></td>
      </tr>
      <tr>
      	<td><?php campos("abortos","abortos","text",$datos,0,"");?></td>
        <td><?php campos("cesarea","cesarea","text",$datos,0,"");?></td>
      </tr>
      <tr><td><?php campos("Guardar","","submit");?></td></tr>
  </table>
</fieldset>
</form>
</div>
<?php
include("../../piepagina.php");
?>