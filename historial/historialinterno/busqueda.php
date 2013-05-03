<?php 
include_once '../../login/check.php';
include_once("../../funciones/funciones.php");
if (!empty($_POST)) {
	extract($_POST);
	$folder="../../";
	$anombre="historialinterno";
	include_once '../../class/'.$anombre.'.php';
	${$anombre}=new $anombre;
	
	$a1nombre="paciente";
	include_once '../../class/'.$a1nombre.'.php';
	${$a1nombre}=new $a1nombre;
	$pac=${$a1nombre}->mostrarTodo("nombre LIKE '%$nombre%' and apep LIKE '%$apep%' and apem LIKE '%$apem%' and ci LIKE '%$ci%'");
	$pa=todolista($pac,"idpaciente","idpaciente","");
	$pa=implode(",",$pa);
//	echo $pa;
	
	
	$datos=${$anombre}->mostrarTodo("idpaciente IN ($pa) and idpaciente LIKE '%{$idhistorialinterno}%'  and alta LIKE '%$alta%'");
	$titulo=array("idpaciente"=>"Nº Hist","fechaelaboracion"=>"Fecha Internación","motivointernacion"=>"Motivo Internación","antecedentespersonales"=>"Antecedente Personal","examengeneral"=>"Examen General");
	
	listadoTabla($titulo,$datos,1,"modificar.php","eliminar.php","ver.php");
}
?>