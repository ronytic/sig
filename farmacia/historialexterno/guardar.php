<?php
include_once("../../login/check.php");
if(isset($_POST)){
include_once("../../class/recetamedica.php");
extract($_POST);
$recetamedica=new recetamedica;
$valor=array("comprado"=>"'$comprado'",
			"observacion"=>"'$observacion'",
			"fechadecompra"=>"'$fechadecompra'",
);
$recetamedica->actualizar($valor,"$idrecetamedica");
}
?>
