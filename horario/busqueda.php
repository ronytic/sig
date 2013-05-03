<?php 
include_once '../login/check.php';
if (!empty($_POST)) {
	$folder="../";
	$narchivo="horarios";
	include_once("../class/".$narchivo.".php");
	include_once("../class/enfermera.php");
	include_once("../class/medico.php");
	$enfermera=new enfermera;
	$medico=new medico;
	${$narchivo}=new $narchivo;
	extract($_POST);
	
	$d=${$narchivo}->mostrarTodo("turno LIKE '%$turno%' and nivel LIKE '%$nivel%'");
	$i=0;
	foreach($d as $dato){$i++;
		$datos[$i]['idhorarios']=$dato['idhorarios'];
		$datos[$i]['turno']=$dato['turno'];
		$datos[$i]['nombre']=$dato['nombre'];
		$datos[$i]['lunes']=$dato['lunes']?'Si':'No';
		$datos[$i]['martes']=$dato['martes']?'Si':'No';
		$datos[$i]['miercoles']=$dato['miercoles']?'Si':'No';
		$datos[$i]['jueves']=$dato['jueves']?'Si':'No';
		$datos[$i]['viernes']=$dato['viernes']?'Si':'No';
		$datos[$i]['sabado']=$dato['sabado']?'Si':'No';
		$datos[$i]['domingo']=$dato['domingo']?'Si':'No';
		
		switch($dato['nivel']){
			case 2:{$datos[$i]['nivel']="Administrador";}break;
			case 3:{$datos[$i]['nivel']="Enfermera";
				$enf=array_shift($enfermera->mostrar($dato['idusuario']));
				$nombre=$enf['nombre']." ".$enf['apep']." ".$enf['apem'];
				}break;
			case 4:{$datos[$i]['nivel']="Medico";
				$med=array_shift($medico->mostrar($dato['idusuario']));
				$nombre=$med['nombre']." ".$med['paterno']." ".$med['materno'];
				}break;
			case 5:{$datos[$i]['nivel']="Laboratorio";}break;
			case 6:{$datos[$i]['nivel']="Farmacia";}break;
			case 7:{$datos[$i]['nivel']="Secretaria";}break;
		}
		$datos[$i]['nombre']=$nombre;
	}
	$titulo=array("nivel"=>"Nivel","nombre"=>"Nombre","turno"=>"Turno","lunes"=>"Lunes","martes"=>"Martes","miercoles"=>"Miercoles","jueves"=>"Jueves","viernes"=>"Viernes","sabado"=>"Sábado","domingo"=>"Domingo");
	if(count($datos)>0){
	?>
    <a href="ver.php?turnoh=<?php echo $turno?>&nivelh=<?php echo $nivel?>" class="botonerror">Reporte para Imprimir</a>
    <?php
	}
	listadoTabla($titulo,$datos,1,"modificar.php","eliminar.php","");
}
?>