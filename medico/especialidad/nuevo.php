<?php
include_once("../../login/check.php");
include_once("../../funciones/funciones.php");
$titulo="Nueva Especialidad";
$folder="../../";
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
         <td class="der"><?php campos("Especialidad","espe","text","",1,array("required"=>"required"));?></td>
     
      	<td class="der"><?php campos("Descripción","desc","text","",0,array("required"=>"required"));?> </td>
      </tr>
      <tr>
        <td class="der"><?php campos("Precio","precio","text","",0,array("required"=>"required"));?> </td>

        <td class="der"><?php campos("Observación","obs","text","",0,array("required"=>"required"));?> </td>
      </tr>  
      <tr><td><?php campos("Guardar","","submit");?></td></tr>
  </table>
</fieldset>
</form>
</div>
<?php
include("../../piepagina.php");
?>