<?php
include_once '../../login/check.php';
if(!empty($_POST)){
	$anombre="solicitaexamen";
	extract($_POST);
	include_once '../../class/'.$anombre.'.php';
	${$anombre}=new $anombre;
		
	$valores=array("examenfisico"=>"'$examenfisico'",
					"examenquimico"=>"'$examenquimico'",
					"examenmicroscopico"=>"'$examenmicroscopico'",
					"cuadrohematico1"=>"'$cuadrohematico1'",
					"cuadrohematico2"=>"'$cuadrohematico2'",
					"otrosresultados"=>"'$otrosresultados'",
					"resultadogeneral"=>"'$resultadogeneral'",
				);
				
	${$anombre}->actualizar($valores,$id);
		$mensaje[]="Sus Datos se registraron Correctamente";

$titulo="Datos Registrado";
$nuevo=1;
$listar=0;
$archivolistar="listar.php";
$folder="../../";
include_once($folder."mensajeresultado.php");
}
?>