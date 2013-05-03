<?php
include_once '../../login/check.php';
if(!empty($_POST)){
	$anombre="inspecciongeneral";
	include_once '../../class/'.$anombre.'.php';
	${$anombre}=new $anombre;
	extract($_POST);
	$valores=array(
					"idhistorialexterno"=>"'$idhistorialexterno'",
					"cabeza"=>"'$cabeza'",
					"cuello"=>"'$cuello'",
					"torax"=>"'$torax'",
					"cardio"=>"'$cardio'",
					"abdomen"=>"'$abdomen'",
					"urinario"=>"'$urinario'",
					"otros"=>"'$otros'",
				);
		
	${$anombre}->insertar($valores);
		$mensaje[]="Sus Datos se registraron Correctamente";
	
	$codinsercion=${$anombre}->last_id();
$titulo="Datos Registrado";
$folder="../../";
include_once($folder."mensajeresultado.php");
}
?>