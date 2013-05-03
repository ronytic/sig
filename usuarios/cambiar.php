<?php
include_once("../login/check.php");
if(!empty($_POST)){
	$p=$_POST['pass'];
	include_once("../class/usuarios.php");		
	
	$usuarios=new usuarios;
	$usuarios->actualizar(array("password"=>"MD5('{$p}')"),$_SESSION['idusuario']);
	header("Location:../login/logout.php");
}

?>