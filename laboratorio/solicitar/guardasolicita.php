<?php
include_once '../../login/check.php';
if(!empty($_POST)){
	$anombre="solicitaexamen";
	extract($_POST);
	include_once '../../class/'.$anombre.'.php';
	${$anombre}=new $anombre;
	$a1nombre="subsolicita";
	include_once '../../class/'.$a1nombre.'.php';
	${$a1nombre}=new $a1nombre;
	//print_r($_POST);
	
	$idmedico=$_SESSION['idmedico'];
	
	$valores=array("fechaexamen"=>"'$fechaexamen'",
					"idpaciente"=>"'$idpaciente'",
					"idmedico"=>"'$idmedico'",
					"responsable"=>"'0'",
					"precio"=>"'$precio'",
					"obs"=>"'$obs'",
				);
				
	${$anombre}->insertar($valores);
	$cod=${$anombre}->last_id();
	foreach($analisis as $k=>$v){
		$val=array(
				"idsolicitaexamen"=>"'$cod'",
				"idlaboratorio"=>"'$k'",
		);	
		${$a1nombre}->insertar($val);
	}
		$mensaje[]="Sus Datos se registraron Correctamente";
$listar=1;
$titulo="Datos Registrado";
$folder="../../";
include_once($folder."mensajeresultado.php");
}
?>