<?php
include_once '../../login/check.php';
if(!empty($_POST)){
	$anombre="antecedentenopatologico";
	include_once '../../class/'.$anombre.'.php';
	${$anombre}=new $anombre;
	extract($_POST);
	
	$valores=array(
					"nombre"=>"'$nombre'",
					"idhistorialexterno"=>"'$idhistorialexterno'"
				);
	${$anombre}->actualizar($valores,$id);
	$mensaje[]="Sus Datos se registraron Correctamente";
	$codinsercion=$id;
$titulo="Datos Registrado";
$folder="../../";
include_once($folder."mensajeresultado.php");
}
?>