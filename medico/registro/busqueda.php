<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	$anombre="medico";
	include_once '../../class/'.$anombre.'.php';
	${$anombre}=new $anombre;
	extract($_POST);
	$datos=${$anombre}->mostrarTodo("nombre LIKE '%$nombre%' and paterno LIKE '%$paterno%' and materno LIKE '%$materno%' and ci LIKE '%$ci%' and idespecialidad LIKE '%$especialidad%'");
	$titulo=array("nombre"=>"Nombre","paterno"=>"Apellido Paterno","materno"=>"Apellido Materno");
	listadoTabla($titulo,$datos,1,"modificar.php","eliminar.php","ver.php");
}
?>