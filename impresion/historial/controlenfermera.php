<?php
include_once("../fpdf/fpdf.php");
$id=$_GET['id'];
include_once("../../class/historialinterno.php");
include_once("../../class/paciente.php");
include_once("../../class/enfermera.php");
include_once("../../class/sala.php");
include_once("../../class/cama.php");
include_once("../../class/controlenfermera.php");
$historialinterno=new historialinterno;
$paciente=new paciente;
$sala=new sala;
$cama=new cama;
$enfermera=new enfermera;
$controlenfermera=new controlenfermera;
$hist=array_shift($historialinterno->mostrar($id));
$pac=array_shift($paciente->mostrar($hist['idpaciente']));

$sa=array_shift($sala->mostrar($hist['idsala']));
$ca=array_shift($cama->mostrar($hist['idcama']));
class PDF extends FPDF{
	function Header(){
		global $ca,$pac,$hist,$sa;
		if($this->PageNo()%2==0){
			$this->SetTopMargin(18);
			$this->SetY(18);
		}else{
			$this->SetTopMargin(30);
		
			$this->SetXY(15,45);
			escribir(80,$pac['apep']);
			$this->SetXY(55,45);
			escribir(80,$pac['apem']);
			$this->SetXY(90,45);
			escribir(80,$pac['nombre']);
			
			
			$this->SetXY(153,45);
			escribir(15,$sa['nombresala']);
			
			$this->SetXY(170,45);
			escribir(15,$ca['numerocama']);
			
			$this->SetXY(189,45);
			escribir(15,"HI-".$hist['idpaciente']);
			$this->Ln();
//			$this->Cell(195,0,"",1);
			$this->SetY(60);
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




$pdf->SetXY(12,60);

foreach($controlenfermera->mostrarTodo("idhistorialinterno=".$hist['idhistorialinterno']) as $ce){
	$enf=array_shift($enfermera->mostrar($ce['idenfermera']));
	$pdf->SetX(12);

	$pdf->SetFont("arial","",9);
	$pdf->Cell(18,6.5,date("d-m-Y",strtotime($ce['fechacontrol'])));
	$pdf->Cell(12,6.5,date("H:i",strtotime($ce['horacontrol'])));
	$pdf->Cell(22,6.5,utf8_decode($ce['medicacion']));
	$pdf->Cell(10,6.5,utf8_decode($ce['vomito']),0,0,"C");
	$pdf->Cell(10,6.5,utf8_decode($ce['orina']),0,0,"C");
	$pdf->Cell(10,6.5,utf8_decode($ce['depost']),0,0,"C");
	$x=$pdf->GetX();
	$pdf->SetX(176);
	$pdf->Cell(10,6.5,utf8_decode($enf['apep']." ".$enf['nombre']));
	$pdf->SetX($x);
	$pdf->MultiCell(70,6.5,utf8_decode($ce['descripcion']),0);

	//$pdf->Ln(6.5);
	//
	//escribir("29",);
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