<?php
include_once("../fpdf/fpdf.php");
$id=$_GET['id'];
include_once("../../class/historialexterno.php");
include_once("../../class/paciente.php");
include_once("../../class/medico.php");
include_once("../../class/recetamedica.php");
include_once("../../class/medicamento.php");
include_once("../../class/tipofarmacia.php");
class PDF extends FPDF{
	function Header(){
		global $pdf,$hist,$pac;
		$pdf->Cell(195,10,"RECETA MEDICA",0,0,"C");
		$pdf->SetFont("arial","",10);
		$pdf->Ln();
		escribir(120,"La Paz, El Alto ".fechaSep($hist['fechaelaboracion'],"d")." de ".fechaSep($hist['fechaelaboracion'],"B")." de ".fechaSep($hist['fechaelaboracion'],"Y"),"B");
		escribir(30,"Edad: ","B");
		escribir(20,calcularEdad($pac['fecnac']));
		
		escribir(15,"Sexo: ","B");
		escribir(15,$pac['sexo']);
		$pdf->Ln();
		
		escribir(40,"Nombre y Apellido:   	","B");
		escribir(80,"".$pac['nombre']." ".$pac['apep']." ".$pac['apem']);
		escribir(50,"Fecha de Nacimiento: 	","B");
		escribir(50,"".fecha2str($pac['fecnac']));
		$pdf->Ln();
		escribir(30,"Estado Civil: 		","B");
		escribir(50,$pac['estcivil']);
		
		escribir(30,"Ocupación: 		","B");
		escribir(50,$pac['ocup']);
		$pdf->Ln();
		escribir(20,"Dirección: 	","B");
		escribir(100,$pac['direccion']);
		escribir(15,"Telf: 			","B");
		escribir(50,"".$pac['telefono']);	
		$pdf->Ln();
		$pdf->Cell(195,0,"",1);
		$pdf->Ln(5);
		escribir(8,"N","B","C",10,1);
		escribir(87,"Medicamento","B","C",10,1);
		escribir(10,"Total","B","C",10,1);
		escribir(10,"Cant","B","C",10,1);
		escribir(25,"Cada","B","C",10,1);
		escribir(50,"Durante","B","C",10,1);
		escribir(6,"Co","B","C",10,1);
		$pdf->Ln();
	}	
}
$historialexterno=new historialexterno;
$paciente=new paciente;
$medico=new medico;
$recetamedica=new recetamedica;
$medicamento=new medicamento;
$tipofarmacia=new tipofarmacia;
$hist=array_shift($historialexterno->mostrar($id));
$pac=array_shift($paciente->mostrar($hist['idpaciente']));
$med=array_shift($medico->mostrar($hist['idmedico']));
$pdf=new PDF("P","mm","letter");
$pdf->SetFont("arial","B",13);
$pdf->AddPage();



$i=0;
foreach($recetamedica->mostrarTodo("idhistorialexterno=$id") as $rm){$i++;
	$m=array_shift($medicamento->mostrar($rm['idmedicamento']));
	$tf=array_shift($tipofarmacia->mostrar($m['idtipofarmacia']));
	escribir(8,$i,"","R",10,1);
	escribir(87,$m['nombre']." ".$tf['nombre'],"","",10,1);
	escribir(10,$rm['total'],"","R",10,1);
	escribir(10,$rm['cantidad'],"","R",10,1);
	escribir(25,$rm['cada'],"","R",10,1);
	escribir(50,$rm['durante'],"","R",10,1);
	escribir(6,$rm['comprado']?'Si':'No',"","R",10,1);
	$pdf->Ln();
}
$pdf->Ln();
escribir("195",$med['paterno']." ".$med['materno']." ".$med['nombre'],"B","R");
$pdf->Ln(2);
escribir("195","....................................","B","R");
$pdf->Ln();
escribir("195","MEDICO TRATANTE","B","R");




$pdf->Output();
//date
?>