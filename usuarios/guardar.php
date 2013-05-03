<?php
include_once("../login/check.php");
if(!empty($_POST)):
$narchivo="usuarios";
include_once("../class/".$narchivo.".php");
${$narchivo}=new $narchivo;
extract($_POST);
$valores=array("usuario"=>"'$usuario'",
			"nombre"=>"'$nombres'",
			"codusuario"=>"'$codusuario'",
			"email"=>"'$email'",
			"nivel"=>"'$nivel'",
			"fecha"=>"'".date("Y-m-d")."'",
			"hora"=>"'".date("H:i:s")."'",
			"obs"=>"'$observacion'",
			"activo"=>"'1'",
			);
if(!empty($password) && $password!=""){
	$valores["password"]="MD5('$password')";
}
${$narchivo}->insertar($valores,0);
$codinsercion=$cod;
$mensaje[]="EL USUARIO SE GUARDO CORRECTAMENTE";
$titulo="Confirmación de Guardado";
$folder="../";
include_once '../mensajeresultado.php';
endif;?>