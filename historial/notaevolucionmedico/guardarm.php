<?php
include_once("../../login/check.php");
if(isset($_POST)){
include_once("../../class/notaevolucion.php");
extract($_POST);
$notae=new notaevolucion;
$idmedico=$_SESSION['idmedico'];
if(empty($idmedico)){
	$idmedico=0;	
}
$valor=array("idhistorialinterno"=>"$idhistorialinterno",
			"fechaevolucion"=>"'$fechaevolucion'",
			"horaevolucion"=>"'$horaevolucion'",
			"notaevolucion"=>"'$notaevolucion'",
			"idmedico"=>$idmedico,
);
$notae->insertar($valor);
}
?>