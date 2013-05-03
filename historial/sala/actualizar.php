<?php
include_once '../../login/check.php';
if(!empty($_POST)){
	$anombre="sala";
	include_once '../../class/'.$anombre.'.php';
	${$anombre}=new $anombre;
	extract($_POST);
	
	$valores=array("nombresala"=>"'$nombresala'",
					"numerocamas"=>"'$numerocamas'",
					"numerosala"=>"'$numerosala'",
				);
	${$anombre}->actualizar($valores,$id);
	$mensaje[]="Sus Datos se registraron Correctamente";
	$codinsercion=$id;
$titulo="Datos Registrado";
$folder="../../";
include_once($folder."mensajeresultado.php");
}
?>