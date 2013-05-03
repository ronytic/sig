<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../class/proveedor.php';
	$nombre=$_POST['nombre'];
	$proveedor=new proveedor;
	$pro=$proveedor->mostrarTodo("nombre LIKE '%$nombre%' ");
	$titulo=array("nombre"=>"Nombre","direccion"=>"Dirección","telefono"=>"Teléfono","email"=>"Email");
	listadoTabla($titulo,$pro,1,"modificar.php","eliminar.php","ver.php");
}
?>