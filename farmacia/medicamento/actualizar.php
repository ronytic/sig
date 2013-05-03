<?php
include_once("../../login/check.php");
if(!empty($_POST)){
	$nombre="medicamento";
	include_once '../../class/'.$nombre.'.php';
	${$nombre}=new $nombre;
	extract($_POST);
	$values=array("nombre"=>"'$nombremedicamento'",
			"idtipofarmacia"=>"'$idtipofarmacia'",
			"preciounitario"=>"'$preciounitario'",
			"idproveedor"=>"'$idproveedor'",
			"observacion"=>"'$observacion'",
		);
		//print_r( get_class_methods(${$nombre}));
	${$nombre}->actualizar($values,$id);
$mensaje[]="Sus Datos se registraron Correctamente";
$titulo="Datos Registrado";
$folder="../../";
include_once($folder."mensajeresultado.php");
 } ?>