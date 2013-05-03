<?php
include_once("../../login/check.php");
$titulo="Modificar Especialidad";
$folder="../../";
extract($_GET);
$nombre="especialidad";
include_once '../../class/'.$nombre.'.php';
${$nombre}=new $nombre;
$datos=array_shift(${$nombre}->mostrar($id));

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
         <td class="der"><?php campos("Especialidad","espe","text",$datos['nombre'],1,array("required"=>"required"));?></td>
     
      	<td class="der"><?php campos("Descripción","desc","text",$datos['descripcion'],0,array("required"=>"required"));?> </td>
      </tr>
      <tr>
        <td class="der"><?php campos("Precio","precio","text",$datos['precio'],0,array("required"=>"required"));?> </td>

        <td class="der"><?php campos("Observación","obs","text",$datos['obs'],0,array("required"=>"required"));?> </td>
      </tr>  
      <tr><td><?php campos("Guardar","","submit");?></td></tr>
  </table>
</fieldset>
</form>
</div>
<?php
include("../../piepagina.php");
?>