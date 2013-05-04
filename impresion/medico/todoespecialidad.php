<?php
include_once("../fpdf/fpdf.php");
include_once("../../config.php");
$narchivo="especialidad";
include_once("../../class/".$narchivo.".php");
//include_once("../../class/enfermera.php");
include_once("../../class/especialidad.php");
include_once("../../class/tipofarmacia.php");
${$narchivo}=new $narchivo;
//$enfermera=new enfermera;
$especialidad=new especialidad;
$tipofarmacia=new tipofarmacia;
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
		$this->Cell(200,10,utf8_decode("Datos de todas las Especialidades"),0,0,"C");
		$this->Ln(15);
		$this->SetFont("arial","B",8);
		$this->Cell(10,5,utf8_decode("Nº"),1,0,"C");
		$this->Cell(50,5,utf8_decode("Nombre"),1,0,"C");
		$this->Cell(145,5,utf8_decode("Descripción"),1,0,"C");
		$this->Cell(50,5,utf8_decode("Precio"),1,0,"C");

//		$this->Cell(60,5,utf8_decode("Observación"),1,0,"C");
		$this->Ln(5);

	}	
	function Footer(){
		$this->AliasNbPages();
		$this->Cell(210,0,"",1,0,"C");
		$this->Ln();
		$this->SetY(-15);
		$this->Cell(100,5,utf8_decode("Fecha de Reporte: ".date("d-m-Y H:i:s")),0,0,"C");
		$this->Cell(100,5,utf8_decode("Página: ".$this->PageNo()." / {nb}"),0,0,"C");
	}
}

$pdf=new PDF("L","mm","letter");
$pdf->AddPage();
$pdf->SetFont("arial","",8);
$i=0;
foreach(${$narchivo}->mostrarTodo() as $pac){$i++;
	$esp=array_shift($especialidad->mostrar($pac['idespecialidad']));
//	$pro=array_shift($proveedor->mostrar($med['idproveedor']));
	$pdf->Cell(10,5,utf8_decode($i),1,0,"R");
	$pdf->SetFont("arial","",8);
	$pdf->Cell(50,5,utf8_decode(ucwords(mb_strtolower($pac['nombre'],"utf8"))),1,0,"L");
	$pdf->Cell(145,5,utf8_decode(ucwords(mb_strtolower($pac['descripcion'],"utf8"))),1,0,"L");
	$pdf->Cell(50,5,utf8_decode(ucwords(mb_strtolower(number_format($pac['precio'],2),"utf8"))),1,0,"R");

	
	$pdf->Ln(5);
}


$pdf->Output();
?>