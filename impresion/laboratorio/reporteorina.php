<?php
include_once("../fpdf/fpdf.php");
$id=$_GET['id'];
include_once("../../class/solicitaexamen.php");
include_once("../../class/paciente.php");
include_once("../../class/medico.php");
$solicitaexamen=new solicitaexamen;
$paciente=new paciente;
$medico=new medico;
$se=array_shift($solicitaexamen->mostrar($id));
$pac=array_shift($paciente->mostrar($se['idpaciente']));
$med=array_shift($medico->mostrar($se['idmedico']));

$pdf=new FPDF("P","mm",array(165,214));
$pdf->SetFont("arial","B",13);
$pdf->AddPage();
$pdf->SetFont("arial","",10);
$pdf->SetMargins(0,0,0);
$pdf->SetAutoPageBreak(true,0);
$pdf->SetXY(85,32);
escribir(30,utf8_decode("Nº  ".$se['idsolicitaexamen']));

$pdf->SetXY(25,37);
escribir(80,utf8_decode($pac['apep']." ".$pac['apem']." ".$pac['nombre']));

$pdf->SetXY(115,37);
escribir(35,utf8_decode(calcularEdad($pac['fecnac'])),"","C");

$pdf->SetXY(25,43);
escribir(50,utf8_decode("Dr.: ".$med['nombre']." ".$med['paterno']." ".$med['materno']));

$pdf->SetXY(115,43);
escribir(35,hoy());


//

$pdf->SetXY(30,64);
$pdf->MultiCell(50,5,utf8_decode($se['examenfisico']),0,"C");

$pdf->SetXY(105,64);
$pdf->MultiCell(45,5,utf8_decode($se['examenquimico']),0,"C");

$pdf->SetXY(60,127);
$pdf->MultiCell(60,5,utf8_decode($se['examenmicroscopico']),0,"C");

$pdf->Output();
//date
?>