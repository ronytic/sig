<?php
include_once '../../login/check.php';
if(!empty($_POST)){
	$anombre="medico";
	include_once '../../class/'.$anombre.'.php';
	${$anombre}=new $anombre;
	extract($_POST);
	
	$valores=array("nombre"=>"'$nombre'",
					"paterno"=>"'$paterno'",
					"materno"=>"'$materno'",
					"telefono"=>"'$telefono'",
					"direccion"=>"'$direccion'",
					"correo"=>"'$correo'",
					"ci"=>"'$ci'",
					"ced"=>"'$ced'",
					"fecegre"=>"'$fecegre'",
					"idespecialidad"=>"'$idespecialidad'",
				);
	${$anombre}->actualizar($valores,$id);
		$mensaje[]="Sus Datos se registraron Correctamente";
	
	$codinsercion=$id;
$titulo="Datos Registrado";
$folder="../../";
include_once($folder."mensajeresultado.php");
}
?>