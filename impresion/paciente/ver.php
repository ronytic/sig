<?php
include_once("../fpdf/fpdf.php");
include_once("../../config.php");
$narchivo="paciente";
include_once("../../class/".$narchivo.".php");
include_once("../../class/enfermera.php");
include_once("../../class/medico.php");
${$narchivo}=new $narchivo;
$enfermera=new enfermera;
$medico=new medico;
extract($_GET);
$dato=array_shift(${$narchivo}->mostrar($id));



$pdf=new FPDF("P","mm","letter");
$pdf->SetFont("arial","B",12);
$pdf->AddPage();
escribir(50,"CLINICA QULLAYASIÑA UTA","B","C",10);
			$pdf->Ln(4);
			escribir(50,"EL ALTO - LA PAZ","","C",9);
			$pdf->Ln(3);
			escribir(50,"BOLIVIA","","C",9);
			$pdf->Ln();
//$pdf->Image("../../imagenes/icono_medico.png",10,10,30,30);
$pdf->SetXY(50,15);
$pdf->SetFont("arial","B",12);
$pdf->Cell(150,10,utf8_decode($title),0,5,"C");
$pdf->SetFont("arial","UB",12);
$pdf->Cell(150,10,"Datos de Paciente",0,0,"C");
$pdf->Ln(15);
$pdf->Cell(190,0,"",1,10,"C");
$pdf->Ln(5);

/*$datos=array();
switch($dato['nivel']){
	case 2:{$nivel="Administrador";}break;	
	case 3:{$nivel="Enfermera";
			$e=array_shift($enfermera->mostrar($dato['codusuario']));
			$datos['Nombre Enfermera']=$e['nombre'];
			$datos['Apellidos Enfermera']=$e['apep']." ".$e['apem'];
			$datos['Teléfono']=$e['telefono'];
			}break;	
	case 4:{$nivel="Medico";}break;	
	case 5:{$nivel="Laboratorio";}break;	
	case 6:{$nivel="Farmacia";}break;	
	case 7:{$nivel="Secretaria";}break;	
}*/
$datos=array(
				"Nombres"=>$dato['nombre']." ".$dato['apep']." ".$dato['apem'],
				"Dirección"=>$dato['direccion'],
				"Teléfono"=>$dato['telefono'],
				"Fecha de Nacimiento"=>$dato['fecnac'],
				"C.I."=>$dato['ci'],
				"Sexo"=>$dato['sexo']=="M"?'Masculino':'Femenino',
				"Estado Civil"=>$dato['estcivil'],
				"Lugar de Origen"=>$dato['lugorg'],
				"Lugar de Residencia"=>$dato['lugres'],
				"Nacionalidad"=>$dato['nac'],
				"Ocupación"=>$dato['ocup'],
				"Referencia Personal"=>$dato['refper'],
				"Referencia Telefonica"=>$dato['reffono'],
				"Observación"=>$dato['obs'],
			);

mostrarI($datos);
$pdf->Output();
?>