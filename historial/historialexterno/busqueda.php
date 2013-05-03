<?php 
include_once '../../login/check.php';
include_once("../../funciones/funciones.php");
if (!empty($_POST)) {
	extract($_POST);
	$folder="../../";
	$anombre="historialexterno";
	include_once '../../class/'.$anombre.'.php';
	${$anombre}=new $anombre;
	
	$a1nombre="paciente";
	include_once '../../class/'.$a1nombre.'.php';
	${$a1nombre}=new $a1nombre;
	$pac=${$a1nombre}->mostrarTodo("nombre LIKE '%$nombre%' and apep LIKE '%$apep%' and apem LIKE '%$apem%' and ci LIKE '%$ci%' ");
	$pa=todolista($pac,"idpaciente","idpaciente","");
	$pa=implode(",",$pa);
//	echo $pa;
	
	
	$datos=${$anombre}->mostrarTodo("idpaciente IN ($pa) and idpaciente LIKE '%{$idhistorialexterno}%'");
	$titulo=array("idpaciente"=>"Nº Hist.","fechaelaboracion"=>"Fecha Elaboración","motivoconsulta"=>"Motivo Consulta","enfermedadactual"=>"Enfermedad Actual","antecedentes"=>"Antecedentes");
	
	listadoTabla($titulo,$datos,1,"modificar.php","eliminar.php","ver.php",array("Kardex"=>"kardex.php"));
}
?>