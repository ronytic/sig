<?php
include_once '../../login/check.php';
if(!empty($_POST)){
	$anombre="enfermera";
	include_once '../../class/'.$anombre.'.php';
	${$anombre}=new $anombre;
	extract($_POST);
	$valores=array("cie"=>"'$cie'",
					"ci"=>"'$ci'",
					"nombre"=>"'$nombre'",
					"apep"=>"'$apep'",
					"apem"=>"'$apem'",
					"telefono"=>"'$telefono'",
					"direccion"=>"'$direccion'",
					"nivelprof"=>"'$nivelprof'",
					"cargo"=>"'$cargo'",
					"fechain"=>"'$fechain'",
					"observ"=>"'$observ'",
				);
		
	${$anombre}->insertar($valores);
		$mensaje[]="Sus Datos se registraron Correctamente";
	
	$codinsercion=${$anombre}->last_id();
$titulo="Datos Registrado";
$folder="../../";
include_once($folder."mensajeresultado.php");
}
?>