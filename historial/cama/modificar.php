<?php
include_once("../../login/check.php");
$titulo="Modificar Cama";
$folder="../../";
extract($_GET);
$nombre="cama";
include_once '../../class/'.$nombre.'.php';
${$nombre}=new $nombre;
$datos=array_shift(${$nombre}->mostrar($id));

$anombre="sala";
include_once '../../class/'.$anombre.'.php';
${$anombre}=new $anombre;
$sal=todolista(${$anombre}->mostrarTodo(),"idsala","nombresala,numerosala,numerocamas"," - ");

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
        <td><?php campos("Sala","idsala","select",$sal,1,array("required"=>"required"),$datos['idsala']);?></td>
    </tr>
    <tr>
        <td><?php campos("Número Cama","numerocama","text",$datos,0,"");?></td>
    </tr>
    <tr>
        <td><?php campos("Marca","marca","text",$datos,0,"");?></td>
    </tr>
    <tr>
        <td><?php campos("Descripción","descripcion","text",$datos,0,"");?></td>
   	</tr>
    <tr><td><?php campos("Guardar","","submit");?></td></tr>
  </table>
</fieldset>
</form>
</div>
<?php
include("../../piepagina.php");
?>