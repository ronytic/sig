<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../class/paciente.php';
	$nombre=$_POST['nombre'];
	$apep=$_POST['apep'];
	$apem=$_POST['apem'];
	$ci=$_POST['ci'];
	$pac=new paciente;
	$pacientes=$pac->mostrarTodo("nombre LIKE '%$nombre%' and apep LIKE '%$apep%' and apem LIKE '%$apem%' and ci LIKE '%$ci%'","idpaciente","",1);
	$titulo=array("nombre"=>"Nombre","apep"=>"Apellido Paterno","apem"=>"Apellido Materno");
	listadoTabla($titulo,$pacientes,1,"modificar.php","eliminar.php","ver.php");
}
?>