<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	$anombre="antecedentepatologico";
	include_once '../../class/'.$anombre.'.php';
	${$anombre}=new $anombre;
	extract($_POST);
	$datos=${$anombre}->mostrarTodo("nombre LIKE '%$nombre%' and idhistorialexterno LIKE '%$idhistorialexterno%'");
	$titulo=array("nombre"=>"Nombre");
	listadoTabla($titulo,$datos,1,"modificar.php","eliminar.php","ver.php");
}
?>