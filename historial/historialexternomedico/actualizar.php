<?php
include_once '../../login/check.php';
if(!empty($_POST)){
	$anombre="historialexterno";
	include_once '../../class/'.$anombre.'.php';
	${$anombre}=new $anombre;
	extract($_POST);
	
	$valores=array(
					
					"menarca"=>"'$menarca'",
					"catamenio"=>"'$catamenio'",
					"mac"=>"'$mac'",
					"pap"=>"'$pap'",
					"fum"=>"'$fum'",
					"gestas"=>"'$gestas'",
					"partos"=>"'$partos'",
					"cesarea"=>"'$cesarea'",
					"ab"=>"'$ab'",
					"cabezacuello"=>"'$cabezacuello'",
					"sistemacardiovascular"=>"'$sistemacardiovascular'",
					"sistemarespiratorio"=>"'$sistemarespiratorio'",
					"abdomen"=>"'$abdomen'",
					"examenginecoobstetrico"=>"'$examenginecoobstetrico'",
					"genitourinario"=>"'$genitourinario'",
					"extremidades"=>"'$extremidades'",
					"examenneurologico"=>"'$examenneurologico'",
					"examenesdelaboratorio"=>"'$examenesdelaboratorio'",
					"impresiondiagnostica"=>"'$impresiondiagnostica'",
					"tratamiento"=>"'$tratamiento'",
					"fechacontrol"=>"'$fechacontrol'",
					"revisado"=>"$revisado"
				);
	${$anombre}->actualizar($valores,$idhistorialexterno);
	$mensaje[]="Sus Datos se registraron Correctamente";
	//$codinsercion=$id;
	$nuevo=2;
	$archivolistar="../busquedamedicoexterno/nuevo.php";
$titulo="Datos Registrado";
$folder="../../";
include_once($folder."mensajeresultado.php");
}
?>