<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../class/medicamento.php';
	$nombre=$_POST['nombre'];
	$medicamento=new medicamento;
	$med=$medicamento->mostrarTodo("nombre LIKE '%$nombre%' ");
	$titulo=array("nombre"=>"Nombre","preciounitario"=>"Precio","observacion"=>"Observaciones");
	listadoTabla($titulo,$med,1,"modificar.php","eliminar.php","ver.php");
}
?>