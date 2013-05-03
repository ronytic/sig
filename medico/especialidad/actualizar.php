<?php
include_once '../../login/check.php';
if(!empty($_POST)){
	$nombre="especialidad";
	include_once '../../class/'.$nombre.'.php';
	${$nombre}=new $nombre;
	extract($_POST);
	
	$valores=array("nombre"=>"'$espe'",
					"descripcion"=>"'$desc'",
					"precio"=>"$precio",
					"obs"=>"'$obs'"
		);
	${$nombre}->actualizar($valores,$id);
		$mensaje[]="Sus Datos se registraron Correctamente";
$titulo="Datos Registrado";
$folder="../../";
include_once($folder."mensajeresultado.php");
}
?>