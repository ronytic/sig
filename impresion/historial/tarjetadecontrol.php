<?php
include_once("../fpdf/fpdf.php");
$id=$_GET['id'];
include_once("../../class/historialinterno.php");
include_once("../../class/paciente.php");
include_once("../../class/enfermera.php");
include_once("../../class/sala.php");
include_once("../../class/cama.php");
include_once("../../class/medico.php");
include_once("../../class/tarjetacontrol.php");
include_once("../../funciones/funciones.php");
$historialinterno=new historialinterno;
$paciente=new paciente;
$sala=new sala;
$cama=new cama;
$enfermera=new enfermera;
$tarjetacontrol=new tarjetacontrol;
$medico=new medico;
$hist=array_shift($historialinterno->mostrar($id));
$pac=array_shift($paciente->mostrar($hist['idpaciente']));
$med=array_shift($medico->mostrar($hist['idmedico']));
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
		
			$this->SetXY(175,15);
			escribir(30,$this->PageNo(),"","C");
			
			
			
			$this->SetXY(153,27);
			escribir(15,$sa['nombresala']);
			
			$this->SetXY(189,27);
			escribir(15,$ca['numerocama']);
			
/*			$this->SetXY(189,45);
			escribir(15,"HI-".$hist['idpaciente']);*/
			$this->Ln();
//			$this->Cell(195,0,"",1);
			$this->SetY(39);
		}
	}
	function Footer(){
		global $ca,$pac,$hist,$sa,$med;
		
		$this->SetXY(25,-15);
		escribir(105,$pac['apep']." ".$pac['apem']." ".$pac['nombre']);
		$this->SetX(148);
		escribir(50,$med['paterno']." ".$med['materno']." ".$med['nombre']);
//		$this->SetY(55,45);
//		escribir(80,);
//		$this->SetXY(90,45);
//		escribir(80,);
	}	
}

$pdf=new PDF("L","mm",array(215.9,143));
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




$pdf->SetXY(10,34);

foreach($tarjetacontrol->mostrarTodo("idhistorialinterno=".$hist['idhistorialinterno']) as $tc){
	$enf=array_shift($enfermera->mostrar($ce['idenfermera']));
	$pdf->SetX(10);

	$pdf->SetFont("arial","",9);
	$pdf->Cell(15,5.5,date("d-m-y",strtotime($tc['fechacontrol'])));
	$pdf->Cell(12,5.5,date("H:i",strtotime($tc['horacontrol'])));
	$pdf->Cell(122,5.5,recortarTexto(utf8_decode($tc['ordenes']),150));
	$pdf->Cell(28,5.5,utf8_decode($tc['dato']),0,0,"C");
	$pdf->Cell(18,5.5,utf8_decode($tc['discontinuo']),0,0,"C");

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