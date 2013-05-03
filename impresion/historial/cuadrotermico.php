<?php
include_once("../fpdf/fpdf.php");
$id=$_GET['id'];
include_once("../../class/historialinterno.php");
include_once("../../class/paciente.php");
include_once("../../class/medico.php");
include_once("../../class/sala.php");
include_once("../../class/cama.php");
include_once("../../class/cuadrotermico.php");
$historialinterno=new historialinterno;
$paciente=new paciente;
$sala=new sala;
$cama=new cama;
$medico=new medico;
$cuadrotermico=new cuadrotermico;
$hist=array_shift($historialinterno->mostrar($id));
$pac=array_shift($paciente->mostrar($hist['idpaciente']));

$sa=array_shift($sala->mostrar($hist['idsala']));
$ca=array_shift($cama->mostrar($hist['idcama']));
class PDF extends FPDF{
	function Header(){
		global $ca,$pac,$hist,$sa;
		/*if($this->PageNo()%2==0){
			$this->SetTopMargin(150);
		}else{*/
			$this->SetTopMargin(30);
		
			$this->SetXY(165,24);
			escribir(15,date("d"));
			$this->SetXY(180,24);
			escribir(15,date("m"));
			$this->SetXY(195,24);
			escribir(15,date("Y"));
			
			
			$this->SetXY(10,47);
			escribir(40,$pac['apep'],"","C");
			$this->SetXY(60,47);
			escribir(40,$pac['apem'],"","C");
			$this->SetXY(115,47);
			escribir(40,$pac['nombre'],"","C");
			/*$this->SetXY(115,47);
			escribir(40,$pac['nombre']);
			*/
			
			$this->SetXY(150,59);
			escribir(25,$sa['nombresala']);
			
			$this->SetXY(185,59);
			escribir(25,$ca['numerocama']);
			
			$this->SetXY(40,61);
			escribir(15,"HI-".$hist['idpaciente']);
			
			$this->Ln();
//			$this->Cell(195,0,"",1);
			$this->SetY(62.5);
		/*}*/
	}	
}

$pdf=new PDF("P","mm","letter");
$pdf->SetFont("arial","B",13);
$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true,10);
$pdf->AddPage();

$pdf->Cell(195,10,"",0,0,"C");
$pdf->SetFont("arial","",10);
$pdf->Ln();

$pdf->Line(28,81,28,232);
$pdf->Line(36,81,36,232);
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



$xt=40;
$pdf->SetXY(14,68);
$xtemp1=36;
$ytemp1=232;
$xpresion1=28;
$ypresion1=232;
$i=1;
$conta=0;
$contar=0;
foreach($cuadrotermico->mostrarTodo("idhistorialinterno=".$hist['idhistorialinterno']) as $ct){
	//$med=array_shift($medico->mostrar($ne['idmedico']));
	$contar++;
	if($contar==22){
		$pdf->Line(28,81,28,232);
		$pdf->Line(36,81,36,232);
		$pdf->SetXY(145,53);
		$xt=40;
		$pdf->SetXY(14,68);
		$xtemp1=36;
		$ytemp1=232;
		$xpresion1=28;
		$ypresion1=232;
		$i=1;
		$conta=0;
		$contar=0;
	}
//	$pdf->SetX(14);
	
	
/*	$pdf->Cell(18,6,date("d-m-Y",strtotime($ne['fechaevolucion'])));
	$pdf->Cell(18,6,date("H:i",strtotime($ne['horaevolucion'])));
	$pdf->Ln(6);
	$pdf->SetX(130);*/
	
	
	/*PARTE de Temperatura*/
	$formtemp=(232-((($ct['temperatura']-35)/0.2)*5));
	$formpresion=(232-(((rand(40,160)-35)/4)*5));
	
	$xtemp2=$xtemp1+(6.3);
	$xpresion2=$xpresion1+(6.3);

	if($conta==0){$xpresion2+=8;$conta=1;}//para aumentar la presion la primera posición
		
	/*Fin de los adicional*/
	if($i==2){
		if($fech!=$ct['fechacontrol']){
			$xt=$xt+6.25;
			$xtemp2+=6.3;
		}
		$i=1;
	}else{
		$fech=$ct['fechacontrol'];
		$i++;
	}
	/*Fin de la parte Adicional*/
	
	$pdf->Line($xtemp1,$ytemp1,$xtemp2,$formtemp);// Temperatura
	$pdf->Line($xpresion1,$ypresion1,$xpresion2,$formpresion);// Presion
	
	$xtemp1=$xtemp2;
	$ytemp1=$formtemp;
	
	
	$xpresion1=$xpresion2;
	$ypresion1=$formpresion;
	
	
	/*Fin de temperatura*/
	
	
	$pdf->SetFont("arial","",4.5);
	$pdf->SetXY($xt,67);
	$pdf->Cell(6.25,5,utf8_decode(date("d-m",strtotime($ct['fechacontrol'])).$ct['turno']),1,0,"C");
	
	$pdf->SetXY($xt,232);
	$pdf->Cell(6.25,5,utf8_decode($ct['presion']),1);
	$pdf->SetFont("arial","",6);
	$pdf->SetXY($xt,237);
	$pdf->Cell(6.25,5,utf8_decode($ct['respiracion']),1);
	$pdf->SetXY($xt,242);
	$pdf->Cell(6.25,5,utf8_decode($ct['orina']),1);
	$pdf->SetXY($xt,247);
	$pdf->Cell(6.25,5,utf8_decode($ct['deposicion']),1);
	$pdf->SetXY($xt,252);
	$pdf->Cell(6.25,5,utf8_decode($ct['temperatura']),1);
	$pdf->SetXY($xt,257);
	$pdf->Cell(6.25,5,utf8_decode($ct['peso']),1);
	$pdf->SetXY($xt,262);
	$pdf->Cell(6.25,5,utf8_decode($ct['talla']),1);
//	escribir("55",$med['paterno']." ".$med['materno']." ".$med['nombre']);
	//$pdf->Ln(6);
	$xt=$xt+6.25;

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