<?php
include_once("../fpdf/fpdf.php");
$id=$_GET['id'];
include_once("../../class/historialexterno.php");
include_once("../../class/paciente.php");
include_once("../../class/medico.php");
$historialexterno=new historialexterno;
$paciente=new paciente;
$medico=new medico;
$hist=array_shift($historialexterno->mostrar($id));
$pac=array_shift($paciente->mostrar($hist['idpaciente']));
$med=array_shift($medico->mostrar($hist['idmedico']));

//print_r($med);
$pdf=new FPDF("P","mm",array(85,124));
$pdf->SetFont("arial","B",13);
$pdf->AddPage();
$pdf->SetFont("arial","",10);
$pdf->SetMargins(0,0,0);
$pdf->SetAutoPageBreak(true,0);
$pdf->SetXY(35,68);
escribir(30,"HE".$hist['idpaciente']);

$pdf->SetXY(25,75);
escribir(80,"".$pac['nombre']." ");
$pdf->SetXY(25,83);
escribir(80,$pac['apep']." ".$pac['apem']);

$pdf->SetXY(25,90);
escribir(100,$pac['direccion'],"","",8);

$pdf->SetXY(25,98);
escribir(50,"".$pac['telefono']);

$pdf->SetXY(40,107);
escribir(195,hoy());

$pdf->SetXY(35,114);
escribir("195",$med['paterno']." ".$med['materno']." ".$med['nombre']);

$pdf->Output();
//date
?>