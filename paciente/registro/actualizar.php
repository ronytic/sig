<?php
include_once("../../login/check.php");
if(!empty($_POST)){
	include_once("../../class/paciente.php");
	$paciente=new paciente;
	extract($_POST);
	$values=array("nombre"=>"'$nombres'",
			"apep"=>"'$paterno'",
			"apem"=>"'$materno'",
			"direccion"=>"'$direccion'",
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
			"obs"=>"'$obs'"
		);
	$paciente->actualizar($values,$id);
	$mensaje[]="La actualización fue Correcta";
	$titulo="Paciente Actualizado";
	$folder="../../";
	include_once($folder."mensajeresultado.php");
}
?>