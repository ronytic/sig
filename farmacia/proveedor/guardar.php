<?php
include_once("../../login/check.php");
if(!empty($_POST)){
	$nombre="proveedor";
	include_once '../../class/'.$nombre.'.php';
	${$nombre}=new $nombre;
	extract($_POST);
	$values=array("nombre"=>"'$nombreproveedor'",
			"direccion"=>"'$direccion'",
			"telefono"=>"'$telefono'",
			"email"=>"'$email'",
		);
		//print_r( get_class_methods(${$nombre}));
	${$nombre}->insertar($values);
$mensaje[]="Sus Datos se registraron Correctamente";
$titulo="Datos Registrado";
$folder="../../";
include_once($folder."mensajeresultado.php");
 } ?>