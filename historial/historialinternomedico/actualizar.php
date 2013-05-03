<?php
include_once '../../login/check.php';
if(!empty($_POST)){
	$anombre="historialinterno";
	include_once '../../class/'.$anombre.'.php';
	${$anombre}=new $anombre;
	extract($_POST);
	
	$valores=array(
					
					"examensegmentario"=>"'$examensegmentario'",
					"examenespecial"=>"'$examenespecial'",
					"diagnosticoprobable"=>"'$diagnosticoprobable'",
					"diagnosticodefinitivo"=>"'$diagnosticodefinitivo'",
			);
	${$anombre}->actualizar($valores,$idhistorialinterno);
	$mensaje[]="Sus Datos se registraron Correctamente";
	//$codinsercion=$id;
	$nuevo=2;
	$archivolistar="../busquedamedicointerno/nuevo.php";
$titulo="Datos Registrado";
$folder="../../";
include_once($folder."mensajeresultado.php");
}
?>