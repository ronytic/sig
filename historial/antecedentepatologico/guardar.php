<?php
include_once '../../login/check.php';
if(!empty($_POST)){
	$anombre="antecedentepatologico";
	include_once '../../class/'.$anombre.'.php';
	${$anombre}=new $anombre;
	extract($_POST);
	$valores=array(
					
					"idhistorialexterno"=>"'$idhistorialexterno'",
					"nombre"=>"'$nombre'",
					"menarca"=>"'$menarca'",
					"menopausia"=>"'$menopausia'",
					"ciclo"=>"'$ciclo'",
					"fum"=>"'$fum'",
					"gestas"=>"'$gestas'",
					"partos"=>"'$partos'",
					"abortos"=>"'$abortos'",
					"cesarea"=>"'$cesarea'"
				);
		
	${$anombre}->insertar($valores);
		$mensaje[]="Sus Datos se registraron Correctamente";
	
	$codinsercion=${$anombre}->last_id();
$titulo="Datos Registrado";
$folder="../../";
include_once($folder."mensajeresultado.php");
}
?>