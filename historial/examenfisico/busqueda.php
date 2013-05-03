<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	$anombre="examenfisico";
	include_once '../../class/'.$anombre.'.php';
	${$anombre}=new $anombre;
	extract($_POST);
	$datos=${$anombre}->mostrarTodo("idhistorialexterno LIKE '%$idhistorialexterno%'");
	$titulo=array("presionarterial"=>"presionarterial","frecuenciacardiaca"=>"frecuenciacardiaca","talla"=>"talla","peso"=>"peso");
	listadoTabla($titulo,$datos,1,"modificar.php","eliminar.php","ver.php");
}
?>