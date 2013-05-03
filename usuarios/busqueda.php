<?php 
include_once '../login/check.php';
if (!empty($_POST)) {
	$folder="../";
	$narchivo="usuarios";
	include_once("../class/".$narchivo.".php");
	${$narchivo}=new $narchivo;
	extract($_POST);
	$d=${$narchivo}->mostrarTodo("usuario LIKE '%$usuario%' and nombre LIKE '%$nombre%' and email LIKE '%$email%' and email LIKE '%$email%' and nivel!=1 and nivel LIKE '%$nivel%'");
	$i=0;
	foreach($d as $dato){$i++;
		$datos[$i]['idusuarios']=$dato['idusuarios'];
		$datos[$i]['usuario']=$dato['usuario'];
		$datos[$i]['nombre']=$dato['nombre'];
		$datos[$i]['email']=$dato['email'];
		switch($dato['nivel']){
			case 2:{$datos[$i]['nivel']="Administrador";}break;
			case 3:{$datos[$i]['nivel']="Enfermera";}break;
			case 4:{$datos[$i]['nivel']="Medico";}break;
			case 5:{$datos[$i]['nivel']="Laboratorio";}break;
			case 6:{$datos[$i]['nivel']="Farmacia";}break;
			case 7:{$datos[$i]['nivel']="Secretaria";}break;
		}
	}
	$titulo=array("usuario"=>"Usuario","nombre"=>"Nombre","email"=>"Email","nivel"=>"Nivel");
	listadoTabla($titulo,$datos,1,"modificar.php","eliminar.php","ver.php");
}
?>