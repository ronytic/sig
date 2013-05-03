<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	$anombre="enfermera";
	include_once '../../class/'.$anombre.'.php';
	${$anombre}=new $anombre;
	extract($_POST);
	$datos=${$anombre}->mostrarTodo("nombre LIKE '%$nombre%' and apep LIKE '%$apep%' and apem LIKE '%$apem%' and ci LIKE '%$ci%' ");
	$titulo=array("nombre"=>"Nombre","apep"=>"Apellido Paterno","apem"=>"Apellido Materno");
	listadoTabla($titulo,$datos,1,"modificar.php","eliminar.php","ver.php");
}
?>