<?php
include_once '../../login/check.php';
if(!empty($_POST)){
	$anombre="laboratorio";
	include_once '../../class/'.$anombre.'.php';
	${$anombre}=new $anombre;
	extract($_POST);
	$valores=array("nombreanalisis"=>"'$nombreanalisis'",
					"descripcion"=>"'$descripcion'",
					"idtipolaboratorio"=>"'$idtipolaboratorio'",
					"precio"=>"'$precio'",
					"obs"=>"'$obs'",
				);
	${$anombre}->insertar($valores);
	
	$codinsercion=${$anombre}->last_id();
	if($codinsercion!=""){
		$mensaje[]="Sus Datos se registraron Correctamente";
	}
$titulo="Datos Registrado";
$folder="../../";
include_once($folder."mensajeresultado.php");
}
?>