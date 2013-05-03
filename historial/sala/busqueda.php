<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	$anombre="sala";
	include_once '../../class/'.$anombre.'.php';
	${$anombre}=new $anombre;
	extract($_POST);
	$datos=${$anombre}->mostrarTodo("nombresala LIKE '%$nombreosala%' and numerosala LIKE '%$numerosala%' and numerocamas LIKE '%$numerocamas%'");
	$titulo=array("nombresala"=>"Nombre Sala","numerosala"=>"Número de Sala","numerocamas"=>"Número Camas");
	listadoTabla($titulo,$datos,1,"modificar.php","eliminar.php","ver.php");
}
?>