<?php
include_once("../../login/check.php");
if(!empty($_POST)){
	$nombre="paciente";
	include_once '../../class/'.$nombre.'.php';
	${$nombre}=new $nombre;
	extract($_POST);
	$values=array("nombre"=>"'$nombres'",
			"apep"=>"'$app'",
			"apem"=>"'$apm'",
			"direccion"=>"'$dir'",
			"telefono"=>"'$fono'",
			"fecnac"=>"'$fec'",
			"ci"=>"'$ci'",
			"sexo"=>"'$sexo'",
			"estcivil"=>"'$civil'",
			"lugorg"=>"'$origen'",
			"lugres"=>"'$res'",
			"nac"=>"'$nac'",
			"ocup"=>"'$ocu'",
			"refper"=>"'$ref'",
			"reffono"=>"'$reffono'",
			"obs"=>"'$observaciones'"
		);
		//print_r( get_class_methods(${$nombre}));
	${$nombre}->insertar($values);
$mensaje[]="Sus Datos se registraron Correctamente";
$titulo="Datos Registrado";
$folder="../../";
include_once($folder."mensajeresultado.php");
 } ?>