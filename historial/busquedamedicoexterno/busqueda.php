<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../funciones/funciones.php';
	include_once '../../class/paciente.php';
	include_once '../../class/historialexterno.php';
	$fecha=$_POST['fecha'];
	$idespecialidad=$_POST['especialidad'];
	$revisado=$_POST['revisado'];
	$paciente=new paciente;
	$historialexterno=new historialexterno;
	$hist=$historialexterno->mostrarTodo("fechaelaboracion LIKE '%$fecha%' and idespecialidad LIKE '%$idespecialidad%' and revisado=$revisado");

	$i=0;
	foreach($hist as $h){$i++;
		$datopac=array_shift($paciente->mostrar($h['idpaciente']));
		$pac[$i]['idhistorialexterno']=$h['idhistorialexterno'];
		$pac[$i]['nombre']=$datopac['nombre'];
		$pac[$i]['apep']=$datopac['apep'];
		$pac[$i]['apem']=$datopac['apem'];
		$pac[$i]['fecha']=$datopac['fecha'];
		$pac[$i]['hora']=$datopac['hora'];
	}
	$titulo=array("nombre"=>"Nombre","apep"=>"Apellido Paterno","apem"=>"Apellido Materno","fecha"=>"Fecha","hora"=>"Hora");
	listadoTabla($titulo,$pac,1,"","","../historialexterno/ver.php",array("Ver Historial Externo"=>"../historialexternomedico/revisar.php"),"","idhistorialexterno");
}
?>