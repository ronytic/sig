<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../class/paciente.php';
	$nombre=$_POST['nombre'];
	$paterno=$_POST['paterno'];
	$materno=$_POST['materno'];
	$ci=$_POST['ci'];
	$pac=new paciente;
	$pacientes=$pac->mostrarTodo("nombre LIKE '%$nombre%' and apep LIKE '%$apep%' and apem LIKE '%$apem%' and ci LIKE '%$ci%'");
	$titulo=array("nombre"=>"Nombre","apep"=>"Apellido Paterno","apem"=>"Apellido Materno");
	listadoTabla($titulo,$pacientes,1,"","","",array("Analizar"=>"analisis.php"));
}
?>