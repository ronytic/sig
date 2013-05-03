<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	$anombre="laboratorio";
	include_once '../../class/'.$anombre.'.php';
	${$anombre}=new $anombre;
	extract($_POST);
	$datos=${$anombre}->mostrarTodo("nombreanalisis LIKE '%$nombreanalisis%' and idtipolaboratorio LIKE '%$idtipolaboratorio%'");
	$titulo=array("nombreanalisis"=>"Nombre Analisis","descripcion"=>"Descripción","precio"=>"Precio");
	listadoTabla($titulo,$datos,1,"modificar.php","eliminar.php","ver.php");
}
?>