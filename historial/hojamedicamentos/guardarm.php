<?php
include_once("../../login/check.php");
if(isset($_POST)){
include_once("../../class/hojamedicamentos.php");
extract($_POST);
$hojamedicamentos=new hojamedicamentos;
$idenfermera=$_SESSION['idenfermera'];
if(empty($idenfermera)){
	$idenfermera=0;	
}
$valor=array("idhistorialinterno"=>"$idhistorialinterno",
			"fechacontrol"=>"'$fechacontrol'",
			"horacontrol"=>"'$horacontrol'",
			"medicamento"=>"'$medicamento'",
			"idenfermera"=>$idenfermera,
);
$hojamedicamentos->insertar($valor);
}
?>
