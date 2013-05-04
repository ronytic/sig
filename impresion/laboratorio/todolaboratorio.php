<?php
include_once("../fpdf/fpdf.php");
include_once("../../config.php");
$narchivo="solicitaexamen";
include_once("../../class/".$narchivo.".php");
include_once("../../class/tipolaboratorio.php");
include_once("../../class/laboratorio.php");
include_once("../../class/subsolicita.php");
include_once("../../class/paciente.php");
$paciente=new paciente;
//include_once("../../class/medico.php");
${$narchivo}=new $narchivo;
$laboratorio=new laboratorio;
$tipolaboratorio=new tipolaboratorio;
$subsolicita=new subsolicita;
//$medico=new medico;
extract($_GET);
$se=array_shift(${$narchivo}->mostrar($id));
$pac=array_shift($paciente->mostrar($se['idpaciente']));


$pdf=new FPDF("P","mm","letter");
$pdf->SetFont("arial","B",12);
$pdf->AddPage();
escribir(50,"CLINICA QULLAYASIÑA UTA","B","C",10);
			$pdf->Ln(4);
			escribir(50,"EL ALTO - LA PAZ","","C",9);
			$pdf->Ln(3);
			escribir(50,"BOLIVIA","","C",9);
			$pdf->Ln();
$pdf->SetXY(50,15);
$pdf->SetFont("arial","B",12);
$pdf->Cell(150,10,utf8_decode($title),0,5,"C");
$pdf->SetFont("arial","UB",12);
$pdf->Cell(150,10,utf8_decode("Datos del Análisis"),0,0,"C");
$pdf->Ln(15);
$pdf->Cell(190,0,"",1,10,"C");
$pdf->Ln(5);

$datos=array(	"Nombre"=>$pac['nombre'],
				"Apellido Paterno"=>$pac['apep'],
				"Apellido Materno"=>$pac['apem'],
				"Fecha de Examen"=>date("d-m-Y",strtotime($se['fechaexamen'])),
				"Precio"=>$se['precio'],
			);
mostrarI($datos);
$pdf->SetFont("arial","B",12);
$pdf->Cell(50,5,utf8_decode("Tipo de Laboratorio"),1,0,"C");
$pdf->Cell(100,5,utf8_decode("Tipo Análisis"),1,0,"C");
$pdf->Cell(40,5,utf8_decode("Precio"),1,0,"C");
$pdf->Ln();
$pdf->SetFont("arial","",12);
foreach($subsolicita->mostrarTodo("idsolicitaexamen=".$se['idsolicitaexamen']) as $ss){
	$l=array_shift($laboratorio->mostrar($ss['idlaboratorio']));
	$tl=array_shift($tipolaboratorio->mostrar($l['idtipolaboratorio']));
	$pdf->Cell(50,5,utf8_decode($tl['nombre']),1,0,"L");
	$pdf->Cell(100,5,utf8_decode($l['nombreanalisis']),1,0,"L");
	$pdf->Cell(40,5,utf8_decode($l['precio']),1,0,"C");
	$pdf->Ln();
}
$pdf->Output();
?>