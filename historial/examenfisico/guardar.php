<?php
include_once '../../login/check.php';
if(!empty($_POST)){
	$anombre="examenfisico";
	include_once '../../class/'.$anombre.'.php';
	${$anombre}=new $anombre;
	extract($_POST);
	$valores=array(
					"idhistorialexterno"=>"'$idhistorialexterno'",
					"presionarterial"=>"'$presionarterial'",
					"frecuenciacardiaca"=>"'$frecuenciacardiaca'",
					"frecuenciarespiratoria"=>"'$frecuenciarespiratoria'",
					"talla"=>"'$talla'",
					"peso"=>"'$peso'",
					"imc"=>"'$imc'",
					"temperatura"=>"'$temperatura'",
				);
		
	${$anombre}->insertar($valores);
		$mensaje[]="Sus Datos se registraron Correctamente";
	
	$codinsercion=${$anombre}->last_id();
$titulo="Datos Registrado";
$folder="../../";
include_once($folder."mensajeresultado.php");
}
?>