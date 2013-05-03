<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../funciones/funciones.php';
	include_once '../../class/paciente.php';
	include_once '../../class/historialinterno.php';
	$fecha=$_POST['fecha'];
	$idespecialidad=$_POST['especialidad'];
	$idhistorialinterno=$_POST['idhistorialinterno'];
	$alta=$_POST['alta'];
	$paciente=new paciente;
	$historialinterno=new historialinterno;
	$hist=$historialinterno->mostrarTodo("idpaciente LIKE '%$idhistorialinterno%' and fechaelaboracion LIKE '%$fecha%' and idespecialidad LIKE '%$idespecialidad%' and alta LIKE '%$alta%'");

	$i=0;
	foreach($hist as $h){$i++;
		$datopac=array_shift($paciente->mostrar($h['idpaciente']));
		$pac[$i]['idhistorialinterno']=$h['idhistorialinterno'];
		$pac[$i]['idpaciente']="HI-".$datopac['idpaciente'];
		$pac[$i]['nombre']=$datopac['nombre'];
		$pac[$i]['apep']=$datopac['apep'];
		$pac[$i]['apem']=$datopac['apem'];
		$pac[$i]['fecha']=$datopac['fecha'];
		$pac[$i]['hora']=$datopac['hora'];
	}
	$menu=array("Ver Historial Interno"=>"../historialinternomedico/revisar.php",
				"Notas de Evolución"=>"../notaevolucionmedico/revisar.php",
				"Ordenes Médicas"=>"../ordenmedicamentomedico/revisar.php");
	
	$titulo=array("idpaciente"=>"Nº Hist","nombre"=>"Nombre","apep"=>"Apellido Paterno","apem"=>"Apellido Materno","fecha"=>"Fecha","hora"=>"Hora");
	listadoTabla($titulo,$pac,1,"","","../historialinterno/ver.php",$menu,"","idhistorialinterno");
}
?>