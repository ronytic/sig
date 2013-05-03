<?php
include_once("../../login/check.php");
$titulo="Modificar Antecedente Familiar";
$folder="../../";
extract($_GET);
$nombre="antecedentefamiliar";
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
        <td><?php campos("antecedente padres vivo","antecedentepadresvivo","text",$datos,1,"");?></td>
     </tr>
    <tr>
        <td><?php campos("antecedente padres muerto","antecedentepadresmuerto","text",$datos,0,"");?></td>
      </tr>
      <tr>
      	<td><?php campos("antecedente hijos vivo","antecedentehijosvivo","text",$datos,0,"");?></td>
      </tr>
    <tr>
        <td><?php campos("antecedente hijos muerto","antecedentehijosmuerto","text",$datos,0,"");?></td>
      </tr>
      <tr>
      	<td><?php campos("antecedente hermanos vivo","antecedentehermanosvivo","text",$datos,0,"");?></td>
      </tr>
    <tr>
        <td><?php campos("antecedente hermanos muerto","antecedentehermanosmuerto","text",$datos,0,"");?></td>
      </tr>
      <tr>
      	<td><?php campos("estado","estado","text",$datos,0,"");?></td>
      </tr>
    <tr>
        <td><?php campos("causas","causas","text",$datos,0,"");?></td>
      </tr>
      <tr><td><?php campos("Guardar","","submit");?></td></tr>
  </table>
</fieldset>
</form>
</div>
<?php
include("../../piepagina.php");
?>