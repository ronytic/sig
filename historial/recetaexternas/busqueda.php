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
	$i=0;
	foreach(${$a1nombre}->mostrarTodo("nombre LIKE '%$nombre%' and apep LIKE '%$apep%' and apem LIKE '%$apem%' and ci LIKE '%$ci%' ") as $pac){
		foreach(${$anombre}->mostrarTodo("idpaciente LIKE '%{$pac[idpaciente]}' and idpaciente LIKE '%{$idhistorialexterno}%' and fechaelaboracion LIKE '%$fechaelaboracion%' and revisado=$revisado","fechaelaboracion",0,1) as $he){
			$i++;
			$datos[$i]['idhistorialexterno']=$he['idhistorialexterno'];
			$datos[$i]['idpaciente']=$pac['idpaciente'];
			$datos[$i]['nombre']=$pac['nombre'];
			$datos[$i]['apep']=$pac['apep'];
			$datos[$i]['apem']=$pac['apem'];
			$datos[$i]['fechaelaboracion']=$he['fechaelaboracion'];
		}
	}
	
	//$pa=implode(",",$pa);
//	echo $pa;
	
	
	
	$titulo=array("idpaciente"=>"Nº Hist.","fechaelaboracion"=>"Fecha Elaboración","nombre"=>"Nombre","apep"=>"Ape. Paterno","apem"=>"Ape. Materno");
	
	listadoTabla($titulo,$datos,1,"","","ver.php",array(),"","idhistorialexterno");
}
?>