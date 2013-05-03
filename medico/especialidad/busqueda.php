<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	$anombre="especialidad";
	include_once '../../class/'.$anombre.'.php';
	${$anombre}=new $anombre;
	extract($_POST);
	
	$datos=${$anombre}->mostrarTodo("nombre LIKE '%$nombre%'");
	$titulo=array("nombre"=>"Nombre","descripcion"=>"Descripción");
	listadoTabla($titulo,$datos,1,"modificar.php","eliminar.php","ver.php");
}
?>