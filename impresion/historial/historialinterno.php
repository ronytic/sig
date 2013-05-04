<?php
include_once("../fpdf/fpdf.php");
$id=$_GET['id'];
include_once("../../class/historialinterno.php");
include_once("../../class/paciente.php");
include_once("../../class/medico.php");
include_once("../../class/sala.php");
include_once("../../class/cama.php");
include_once("../../class/medico.php");
$historialinterno=new historialinterno;
$paciente=new paciente;
$sala=new sala;
$cama=new cama;
$medico=new medico;
$hist=array_shift($historialinterno->mostrar($id));
$pac=array_shift($paciente->mostrar($hist['idpaciente']));
$med=array_shift($medico->mostrar($hist['idmedico']));
$sa=array_shift($sala->mostrar($hist['idsala']));
$ca=array_shift($cama->mostrar($hist['idcama']));

$pdf=new FPDF("P","mm","letter");
$pdf->SetFont("arial","B",13);
$pdf->AddPage();
$pdf->Cell(195,10,"",0,0,"C");
$pdf->SetFont("arial","",10);
$pdf->Ln();
$pdf->SetXY(145,53);
escribir(120,fechaSep($hist['fechaelaboracion'],"d")." de ".fechaSep($hist['fechaelaboracion'],"B")." de ".fechaSep($hist['fechaelaboracion'],"Y"));

$pdf->SetXY(35,53);
escribir(80,"".$pac['nombre']." ".$pac['apep']." ".$pac['apem']);

$pdf->SetXY(180,60);
escribir(20,calcularEdad($pac['fecnac']));

$pdf->SetXY(145,60);
escribir(15,$pac['sexo']);

$pdf->SetXY(35,60);
escribir(15,$sa['nombresala']);

$pdf->SetXY(80,60);
escribir(15,$ca['numerocama']);

$pdf->SetXY(115,60);
escribir(15,$pac['estcivil']);

$pdf->SetXY(35,67);
escribir(100,$pac['direccion']);

$pdf->SetXY(115,67);
escribir(50,"".$pac['telefono']);

$pdf->SetXY(145,67);
escribir("55",$med['paterno']." ".$med['materno']." ".$med['nombre']);


//motivointernacio
$pdf->SetXY(20,80);
$pdf->MultiCell(175,6.5,utf8_decode(recortarTexto($hist['motivointernacion'],699)),0);
//antecedentepersonal
$pdf->SetXY(20,139);
$pdf->MultiCell(175,6.5,utf8_decode(recortarTexto($hist['antecedentespersonales'],590)),0);
//antecedentesfamiliares
$pdf->SetXY(20,191);
$pdf->MultiCell(175,6.5,utf8_decode(recortarTexto($hist['antecedentesfamiliares'],590)),0);
//examen general
$pdf->SetXY(20,245);
$pdf->MultiCell(175,6.5,utf8_decode(recortarTexto($hist['examengeneral'],699)),0);
//Examen Segmentario
if($pdf->GetY()>=57){
	$pdf->AddPage();
}
$pdf->SetXY(20,57);
$pdf->MultiCell(175,6.5,utf8_decode(recortarTexto($hist['examensegmentario'],1180)),0);


//Examen especial
$pdf->SetXY(20,144);
$pdf->MultiCell(175,6.5,utf8_decode(recortarTexto($hist['examenespecial'],1180)),0);

$pdf->SetXY(50,224);
escribir(145,$hist['diagnosticoprobable'],"","","",0);
$pdf->SetXY(50,230);
escribir(145,$hist['diagnosticoprobable'],"","","",0);


$pdf->SetXY(25,248);
escribir("55",$med['paterno']." ".$med['materno']." ".$med['nombre']);
/*
$pdf->Ln(2);
escribir("195","....................................","B","R");
$pdf->Ln();
escribir("195","MEDICO TRATANTE","B","R");
*/



$pdf->Output();
//date
?>