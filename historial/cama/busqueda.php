<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	$anombre="cama";
	include_once '../../class/'.$anombre.'.php';
	${$anombre}=new $anombre;
	extract($_POST);
	$datos=${$anombre}->mostrarTodo("idsala LIKE '%$idsala%' and numerocama LIKE '%$numerocama%' and marca LIKE '%$marca%'");
	$titulo=array("numerocama"=>"Número de Cama","marca"=>"Marca","descripcion"=>"Descripción");
	listadoTabla($titulo,$datos,1,"modificar.php","eliminar.php","ver.php");
}
?>