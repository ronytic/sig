<?php
include_once("../fpdf/fpdf.php");
$id=$_GET['id'];
include_once("../../class/historialinterno.php");
include_once("../../class/paciente.php");
include_once("../../class/medico.php");
include_once("../../class/sala.php");
include_once("../../class/cama.php");
include_once("../../class/notaevolucion.php");
$historialinterno=new historialinterno;
$paciente=new paciente;
$sala=new sala;
$cama=new cama;
$medico=new medico;
$notaevolucion=new notaevolucion;
$hist=array_shift($historialinterno->mostrar($id));
$pac=array_shift($paciente->mostrar($hist['idpaciente']));

$sa=array_shift($sala->mostrar($hist['idsala']));
$ca=array_shift($cama->mostrar($hist['idcama']));
class PDF extends FPDF{
	function Header(){
		global $ca,$pac,$hist,$sa;
		if($this->PageNo()%2==0){
			$this->SetTopMargin(150);
		}else{
			$this->SetTopMargin(30);
		
			$this->SetXY(15,50);
			escribir(80,$pac['apep']);
			$this->SetXY(55,50);
			escribir(80,$pac['apem']);
			$this->SetXY(90,50);
			escribir(80,$pac['nombre']);
			
			
			$this->SetXY(153,50);
			escribir(15,$sa['nombresala']);
			
			$this->SetXY(170,50);
			escribir(15,$ca['numerocama']);
			
			$this->SetXY(189,50);
			escribir(15,"HI-".$hist['idpaciente']);
			$this->Ln();
//			$this->Cell(195,0,"",1);
			$this->SetY(68);
		}
	}	
}

$pdf=new PDF("P","mm","letter");
$pdf->SetFont("arial","B",13);
$pdf->AliasNbPages();

$pdf->AddPage();

$pdf->Cell(195,10,"",0,0,"C");
$pdf->SetFont("arial","",10);
$pdf->Ln();
$pdf->SetXY(145,53);
//escribir(120,fechaSep($hist['fechaelaboracion'],"d")." de ".fechaSep($hist['fechaelaboracion'],"B")." de ".fechaSep($hist['fechaelaboracion'],"Y"));

/*$pdf->SetXY(15,50);
escribir(80,$pac['apep']);
$pdf->SetXY(55,50);
escribir(80,$pac['apem']);
$pdf->SetXY(90,50);
escribir(80,$pac['nombre']);


$pdf->SetXY(153,50);
escribir(15,$sa['nombresala']);

$pdf->SetXY(170,50);
escribir(15,$ca['numerocama']);

$pdf->SetXY(189,50);
escribir(15,"HI-".$hist['idpaciente']);
*/




$pdf->SetXY(14,68);
foreach($notaevolucion->mostrarTodo("idhistorialinterno=".$hist['idhistorialinterno']) as $ne){
	$med=array_shift($medico->mostrar($ne['idmedico']));
	$pdf->SetX(14);
	$pdf->SetFont("arial","",9);
	$pdf->Cell(18,6.5,date("d-m-Y",strtotime($ne['fechaevolucion'])));
	$pdf->Cell(18,6.5,date("H:i",strtotime($ne['horaevolucion'])));
	$pdf->MultiCell(150,6.5,utf8_decode($ne['notaevolucion']),0);
	
	$pdf->Ln(6.5);
	$pdf->SetX(130);
	escribir("55",$med['paterno']." ".$med['materno']." ".$med['nombre']);
	$pdf->Ln(6.5);
}




/*
$pdf->Ln(2);
escribir("195","....................................","B","R");
$pdf->Ln();
escribir("195","MEDICO TRATANTE","B","R");
*/



$pdf->Output();
//date
?>