<?php
include_once '../../login/check.php';
if(!empty($_POST)){
	$anombre="historialexterno";
	include_once '../../class/'.$anombre.'.php';
	${$anombre}=new $anombre;
	extract($_POST);
	$valores=array("idpaciente"=>"'$idpaciente'",
					"idmedico"=>"'$idmedico'",
					"idespecialidad"=>"'$idespecialidad'",
					"idenfermera"=>"'".$_SESSION['idusuario']."'",
					"fechaelaboracion"=>"'$fecha'",
					"motivoconsulta"=>"'$motivoconsulta'",
					"enfermedadactual"=>"'$enfermedadactual'",
					"antecedentes"=>"'$antecedentes'",
					"pa"=>"'$pa'",
					"fc"=>"'$fc'",
					"fr"=>"'$fr'",
					"talla"=>"'$talla'",
					"peso"=>"'$peso'",
					"imc"=>"'$imc'",
					"t"=>"'$t'"
				);
		
	${$anombre}->insertar($valores);
	$mensaje[]="Sus Datos se registraron Correctamente";
	
	//$codinsercion=${$anombre}->last_id();
$titulo="Datos Registrado";
$folder="../../";
$archivonuevo="../busqueda/nuevo.php";
include_once($folder."mensajeresultado.php");
}
?>