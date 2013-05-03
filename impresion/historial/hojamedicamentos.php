<?php
include_once("../fpdf/fpdf.php");
$id=$_GET['id'];
include_once("../../funciones/funciones.php");
include_once("../../class/historialinterno.php");
include_once("../../class/paciente.php");
include_once("../../class/enfermera.php");
include_once("../../class/sala.php");
include_once("../../class/cama.php");
include_once("../../class/hojamedicamentos.php");
$historialinterno=new historialinterno;
$paciente=new paciente;
$sala=new sala;
$cama=new cama;
$enfermera=new enfermera;
$hojamedicamentos=new hojamedicamentos;
$hist=array_shift($historialinterno->mostrar($id));
$pac=array_shift($paciente->mostrar($hist['idpaciente']));

$sa=array_shift($sala->mostrar($hist['idsala']));
$ca=array_shift($cama->mostrar($hist['idcama']));
class PDF extends FPDF{
	function Header(){
		global $ca,$pac,$hist,$sa;
		//if($this->PageNo()%2==0){
		//	$this->SetTopMargin(150);
		//}else{
			//$this->SetTopMargin(30);
			escribir(50,"CLINICA QULLAYASIÑA UTA","B","C",10);
			$this->Ln(4);
			escribir(50,"EL ALTO - LA PAZ","","C",9);
			$this->Ln(3);
			escribir(50,"BOLIVIA","","C",9);
			$this->Ln();
			escribir(195,"HOJA DE MEDICAMENTOS","UB","C",15);
			$this->SetXY(15,35);
			escribir(35,"Nombre y Apellido: ","B");
			escribir(80,$pac['apep']." ".$pac['apem']." ".$pac['nombre']);
			
			
			$this->SetXY(125,35);
			escribir(10,"Sala: ","B");
			escribir(15,$sa['nombresala']);
			
			$this->SetXY(160,35);
			escribir(11,"Cama: ","B");
			escribir(15,$ca['numerocama']);
			
			$this->SetXY(179,35);
			escribir(10,"H.I.: ","B");
			escribir(15,"HI-".$hist['idpaciente']);
			$this->Ln();
//			$this->Cell(195,0,"",1);
			$this->SetY(40);
			$this->Ln();
			escribir(100,"Medicamento Vía Dosis","B","C",10,1);
			escribir(30,"Fecha","B","C",10,1);
			escribir(20,"Hora","B","C",10,1);
			escribir(50,"Firma","B","C",10,1);
		//}
	}	
}

$pdf=new PDF("P","mm","letter");
$pdf->SetFont("arial","B",13);
$pdf->AliasNbPages();

$pdf->AddPage();

$pdf->Cell(195,10,"",0,0,"C");
$pdf->SetFont("arial","",10);
//$pdf->SetXY(145,53);
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




foreach($hojamedicamentos->mostrarTodo("idhistorialinterno=".$hist['idhistorialinterno']) as $hm){
	$enf=array_shift($enfermera->mostrar($hm['idenfermera']));
		escribir(100,$hm['medicamento'],"","L",9,1);
			escribir(30,fecha2Str($hm['fechacontrol']),"","C",9,1);
			escribir(20,$hm['horacontrol'],"","C",9,1);
			escribir(50,$enf['apep']." ".$enf['apem']." ".$enf['nombre'],"","L",9,1);
	$pdf->Ln();
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