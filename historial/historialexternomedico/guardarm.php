<?php
include_once("../../login/check.php");
if(isset($_POST)){
include_once("../../class/recetamedica.php");
extract($_POST);
$recetamedica=new recetamedica;
$valor=array("idhistorialexterno"=>"$idhistorialexterno",
			"idmedicamento"=>"$idmedicamento",
			"total"=>"'$totalmedicamento'",
			"cantidad"=>"'$cantidad'",
			"durante"=>"'$durante'",
			"cada"=>"'$cada'",
);
$recetamedica->insertar($valor);
}
?>
