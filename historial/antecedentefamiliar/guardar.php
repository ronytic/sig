<?php
include_once '../../login/check.php';
if(!empty($_POST)){
	$anombre="antecedentefamiliar";
	include_once '../../class/'.$anombre.'.php';
	${$anombre}=new $anombre;
	extract($_POST);
	$valores=array(
					
					"idhistorialexterno"=>"'$idhistorialexterno'",
					"antecedentepadresvivo"=>"'$antecedentepadresvivo'",
					"antecedentepadresmuerto"=>"'$antecedentepadresmuerto'",
					"antecedentehijosvivo"=>"'$antecedentehijosvivo'",
					"antecedentehijosmuerto"=>"'$antecedentehijosmuerto'",
					"antecedentehermanosvivo"=>"'$antecedentehermanosvivo'",
					"antecedentehermanosmuerto"=>"'$antecedentehermanosmuerto'",
					"estado"=>"'$estado'",
					"causas"=>"'$causas'"
				);
		
	${$anombre}->insertar($valores);
		$mensaje[]="Sus Datos se registraron Correctamente";
	
	$codinsercion=${$anombre}->last_id();
$titulo="Datos Registrado";
$folder="../../";
include_once($folder."mensajeresultado.php");
}
?>