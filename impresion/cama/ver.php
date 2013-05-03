<?php
include_once("../fpdf/fpdf.php");
include_once("../../config.php");
$narchivo="cama";
include_once("../../class/".$narchivo.".php");
//include_once("../../class/enfermera.php");
include_once("../../class/sala.php");
${$narchivo}=new $narchivo;
//$enfermera=new enfermera;
$sala=new sala;
extract($_GET);
$dato=array_shift(${$narchivo}->mostrar($id));
$s=array_shift($sala->mostrar($dato['idsala']));


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
$pdf->Cell(150,10,utf8_decode("Datos de Enfermería"),0,0,"C");
$pdf->Ln(15);
$pdf->Cell(190,0,"",1,10,"C");
$pdf->Ln(5);

$datos=array(
				"Sala"=>$s['nombresala'],
				"Número Cama"=>$dato['numerocama'],
				"Marca"=>$dato['marca'],
				"Descripción"=>$dato['descripcion'],
			);

mostrarI($datos);
$pdf->Output();
?>