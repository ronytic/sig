<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Modificar Proveedor";
$id=$_GET['id'];
include_once("../../class/proveedor.php");
$proveedor=new proveedor;
$prove=array_shift($proveedor->mostrar($id));
include_once("../../funciones/funciones.php");
include_once("../../cabecerahtml.php");
?>
<?php include_once("../../cabecera.php");?>
<?php include_once("../../lateral.php");?>
<div class="contenido centrar">
<form action="actualizar.php" method="post">
	<?php campos("","id","hidden",$id);?>
	<fieldset>
    	<legend>Registro Nuevo Proveedor</legend>
        <table class="tablareg2">
        	<tr><td><?php campos("Nombre Proveedor","nombreproveedor","text",$prove['nombre'],1,"","",1)?></td></tr>
            <tr><td><?php campos("Dirección","direccion","text",$prove['direccion'],0,"","",1)?></td></tr>
            <tr><td><?php campos("Teléfono","telefono","text",$prove['telefono'],0,"","",1)?></td></tr>
            <tr><td><?php campos("Email","email","text",$prove['email'],0,"","",1)?></td></tr>
            <tr><td><?php campos("Guardar","","submit","",0,"","",1)?></td></tr>
        </table>
    </fieldset>
</form>
</div>
<?php include_once("../../piepagina.php");?>