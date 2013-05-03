<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Nuevo Medicamento";
include_once("../../class/tipofarmacia.php");
include_once("../../class/proveedor.php");
$tipofarmacia=new tipofarmacia;
$proveedor=new proveedor;
$tipof=todolista($tipofarmacia->mostrarTodo("","nombre"),"idtipofarmacia","nombre","");
$tipop=todolista($proveedor->mostrarTodo("","nombre"),"idproveedor","nombre","");
include_once("../../funciones/funciones.php");
include_once("../../cabecerahtml.php");
?>
<?php include_once("../../cabecera.php");?>
<?php include_once("../../lateral.php");?>
<div class="contenido centrar">
<form action="guardar.php" method="post">
	<fieldset>
    	<legend>Registro Nuevo Medicamento</legend>
        <table class="tablareg2">
        	<tr><td><?php campos("Nombre Medicamento","nombremedicamento","text","",1,array("size"=>50),"",1)?></td></tr>
            <tr><td><?php campos("Tipo Medicamento","idtipofarmacia","select",$tipof,0,"","",1)?></td></tr>
            <tr><td><?php campos("Precio Unitario","preciounitario","number","0.00",0,array("min"=>0,"step"=>"0.01"),"",1)?></td></tr>
            <tr><td><?php campos("Proveedor","idproveedor","select",$tipop,0,"","",1)?></td></tr>
            <tr><td><?php campos("Observación","observacion","text","",0,array("size"=>50),"",1)?></td></tr>
            <tr><td><?php campos("Guardar","","submit","",0,"","",1)?></td></tr>
        </table>
    </fieldset>
</form>
</div>
<?php include_once("../../piepagina.php");?>