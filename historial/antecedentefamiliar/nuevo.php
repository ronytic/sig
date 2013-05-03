<?php
include_once("../../login/check.php");
include_once("../../funciones/funciones.php");
$titulo="Nueva Antecedente Familiar";
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
        <td><?php campos("antecedente padres vivo","antecedentepadresvivo","text","",1,"");?></td>
     </tr>
    <tr>
        <td><?php campos("antecedente padres muerto","antecedentepadresmuerto","text","",0,"");?></td>
      </tr>
      <tr>
      	<td><?php campos("antecedente hijos vivo","antecedentehijosvivo","text","",0,"");?></td>
      </tr>
    <tr>
        <td><?php campos("antecedente hijos muerto","antecedentehijosmuerto","text","",0,"");?></td>
      </tr>
      <tr>
      	<td><?php campos("antecedente hermanos vivo","antecedentehermanosvivo","text","",0,"");?></td>
      </tr>
    <tr>
        <td><?php campos("antecedente hermanos muerto","antecedentehermanosmuerto","text","",0,"");?></td>
      </tr>
      <tr>
      	<td><?php campos("estado","estado","text","",0,"");?></td>
      </tr>
    <tr>
        <td><?php campos("causas","causas","text","",0,"");?></td>
      </tr>
      <tr><td><?php campos("Guardar","","submit");?></td></tr>
  </table>
</fieldset>
</form>
</div>
<?php
include("../../piepagina.php");
?>