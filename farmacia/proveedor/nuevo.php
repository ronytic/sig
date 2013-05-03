<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Nuevo Proveedor";
include_once("../../funciones/funciones.php");
include_once("../../cabecerahtml.php");
?>
<?php include_once("../../cabecera.php");?>
<?php include_once("../../lateral.php");?>
<div class="contenido centrar">
<form action="guardar.php" method="post">
	<fieldset>
    	<legend>Registro Nuevo Proveedor</legend>
        <table class="tablareg2">
        	<tr><td><?php campos("Nombre Proveedor","nombreproveedor","text","",1,"","",1)?></td></tr>
            <tr><td><?php campos("Dirección","direccion","text","",0,"","",1)?></td></tr>
            <tr><td><?php campos("Teléfono","telefono","text","",0,"","",1)?></td></tr>
            <tr><td><?php campos("Email","email","text","",0,"","",1)?></td></tr>
            <tr><td><?php campos("Guardar","","submit","",0,"","",1)?></td></tr>
        </table>
    </fieldset>
</form>
</div>
<?php include_once("../../piepagina.php");?>