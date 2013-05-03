<?php
include_once("../../login/check.php");
include_once("../../funciones/funciones.php");
$titulo="Nueva Cama";
$folder="../../";
$anombre="sala";
include_once '../../class/'.$anombre.'.php';
${$anombre}=new $anombre;
$sal=todolista(${$anombre}->mostrarTodo(),"idsala","nombresala,numerosala,numerocamas"," - ");
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
        <td><?php campos("Sala","idsala","select",$sal,1,array("required"=>"required"));?></td>
    </tr>
    <tr>
        <td><?php campos("Número Cama","numerocama","text","",0,"");?></td>
    </tr>
    <tr>
        <td><?php campos("Marca","marca","text","",0,"");?></td>
    </tr>
    <tr>
        <td><?php campos("Descripción","descripcion","text","",0,"");?></td>
   	</tr>
    <tr><td><?php campos("Guardar","","submit");?></td></tr>
  </table>
</fieldset>
</form>
</div>
<?php
include("../../piepagina.php");
?>