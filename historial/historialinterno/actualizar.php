<?php
include_once '../../login/check.php';
if(!empty($_POST)){
	$anombre="historialinterno";
	include_once '../../class/'.$anombre.'.php';
	${$anombre}=new $anombre;
	extract($_POST);
	
	$valores=array(//"idpaciente"=>"'$idpaciente'",
					"idmedico"=>"'$idmedico'",
					"idespecialidad"=>"'$idespecialidad'",
					"idenfermera"=>"'".$_SESSION['idusuario']."'",
					"idsala"=>"'$idsala'",
					"idcama"=>"'$idcama'",
					"fechaelaboracion"=>"'$fecha'",
					"motivointernacion"=>"'$motivointernacion'",
					"antecedentespersonales"=>"'$antecedentespersonales'",
					"antecedentesfamiliares"=>"'$antecedentesfamiliares'",
					"examengeneral"=>"'$examengeneral'",
					"pa"=>"'$pa'",
					"fc"=>"'$fc'",
					"fr"=>"'$fr'",
					"talla"=>"'$talla'",
					"peso"=>"'$peso'",
					"imc"=>"'$imc'",
					"t"=>"'$t'",
					"alta"=>"'$alta'"
				);
	${$anombre}->actualizar($valores,$id);
	$mensaje[]="Sus Datos se registraron Correctamente";
	$codinsercion=$id;
	$nuevo=1;
$titulo="Datos Registrado";
$folder="../../";
include_once($folder."mensajeresultado.php");
}
?>