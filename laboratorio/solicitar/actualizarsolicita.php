<?php
include_once '../../login/check.php';
if(!empty($_POST)){
	$anombre="solicitaexamen";
	extract($_POST);
	include_once '../../class/'.$anombre.'.php';
	${$anombre}=new $anombre;
		
	$valores=array("fechaexamen"=>"'$fechaexamen'",
					"obs"=>"'$obs'",
				);
				
	${$anombre}->actualizar($valores,$id);
		$mensaje[]="Sus Datos se registraron Correctamente";
$listar=1;
$titulo="Datos Registrado";
$folder="../../";
include_once($folder."mensajeresultado.php");
}
?>