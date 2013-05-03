<?php
include_once("../fpdf/fpdf.php");
include_once("../../config.php");
$narchivo="proveedor";
include_once("../../class/".$narchivo.".php");
//include_once("../../class/enfermera.php");
include_once("../../class/medico.php");
${$narchivo}=new $narchivo;
//$enfermera=new enfermera;
$medico=new medico;
//extract($_GET);


class PDF extends FPDF{
	function Header(){
		global $title;
		escribir(50,"CLINICA QULLAYASIÑA UTA","B","C",10);
		$this->Ln(4);
		escribir(50,"EL ALTO - LA PAZ","","C",9);
		$this->Ln(3);
		escribir(50,"BOLIVIA","","C",9);
		$this->Ln();
		//$pdf->Image("../../imagenes/icono_medico.png",10,10,30,30);
		$this->SetXY(50,15);
		$this->SetFont("arial","B",12);


		$this->Cell(200,10,utf8_decode($title),0,5,"C");
		$this->SetFont("arial","UB",12);
		$this->Cell(200,10,utf8_decode("Datos de Todos los Proveedores"),0,0,"C");
		$this->Ln(15);
		$this->SetFont("arial","B",8);
		$this->Cell(10,5,utf8_decode("Nº"),1,0,"C");
		$this->Cell(80,5,utf8_decode("Nombre"),1,0,"C");
		$this->Cell(100,5,utf8_decode("Dirección"),1,0,"C");
		$this->Cell(30,5,utf8_decode("Teléfono"),1,0,"C");
		$this->Cell(40,5,utf8_decode("Email"),1,0,"C");

		$this->Ln(5);

	}	
}


$pdf=new PDF("P","mm","letter");

$pdf=new PDF("L","mm","letter");

$pdf->AddPage();
$pdf->SetFont("arial","",8);
$i=0;
foreach(${$narchivo}->mostrarTodo() as $pro){$i++;
	$pdf->Cell(10,5,utf8_decode($i),1,0,"R");
	$pdf->SetFont("arial","",8);
	$pdf->Cell(80,5,utf8_decode(ucwords(mb_strtolower($pro['nombre'],"utf8"))),1,0,"L");
	$pdf->Cell(100,5,utf8_decode(ucwords(mb_strtolower($pro['direccion'],"utf8"))),1,0,"L");
	$pdf->Cell(30,5,utf8_decode($pro['telefono']),1,0,"L");
	$pdf->SetFont("arial","",8);
	$pdf->Cell(40,5,utf8_decode(mb_strtolower($pro['email'],"utf8")),1,0,"L");

	$pdf->Ln(5);
}


$pdf->Output();
?>