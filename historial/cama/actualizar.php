<?php
include_once '../../login/check.php';
if(!empty($_POST)){
	$anombre="cama";
	include_once '../../class/'.$anombre.'.php';
	${$anombre}=new $anombre;
	extract($_POST);
	
	$valores=array("idsala"=>"'$idsala'",
					"numerocama"=>"'$numerocama'",
					"marca"=>"'$marca'",
					"descripcion"=>"'$descripcion'",
				);
	${$anombre}->actualizar($valores,$id);
	$mensaje[]="Sus Datos se registraron Correctamente";
	$codinsercion=$id;
$titulo="Datos Registrado";
$folder="../../";
include_once($folder."mensajeresultado.php");
}
?>