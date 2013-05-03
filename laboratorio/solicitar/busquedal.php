<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../class/paciente.php';
	include_once '../../class/solicitaexamen.php';
	$nombre=$_POST['nombre'];
	$paterno=$_POST['paterno'];
	$materno=$_POST['materno'];
	$fechaexamen=$_POST['fechaexamen'];
	$ci=$_POST['ci'];
	$paciente=new paciente;
	$solicitaexamen=new solicitaexamen;
	
	$pacientes=$paciente->mostrarTodo("nombre LIKE '%$nombre%' and apep LIKE '%$apep%' and apem LIKE '%$apem%' and ci LIKE '%$ci%'");
	$pac=todoLista($pacientes,"idpaciente","idpaciente");
	$pac=implode(",",$pac);
	$i=0;
	foreach($solicitaexamen->mostrarTodo("idpaciente IN($pac) and fechaexamen LIKE '%$fechaexamen%'","fechaexamen","",1) as $se){$i++;
		$p=array_shift($paciente->mostrar($se['idpaciente']));
		$datos[$i]['idsolicitaexamen']=$se['idsolicitaexamen'];
		$datos[$i]['fechaexamen']=$se['fechaexamen'];
		$datos[$i]['nombre']=$p['nombre'];
		$datos[$i]['apep']=$p['apep'];
		$datos[$i]['apem']=$p['apem'];
		$datos[$i]['obs']=$p['obs'];
	}
	
	$titulo=array("fechaexamen"=>"Fecha Examen","nombre"=>"Nombre","apep"=>"Apellido Paterno","apem"=>"Apellido Materno","obs"=>"Observación");
	listadoTabla($titulo,$datos,1,"","","",array("Ver"=>"ver.php"));
}
?>