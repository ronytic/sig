<?php
include_once("../fpdf/fpdf.php");
$id=$_GET['id'];
include_once("../../class/historialexterno.php");
include_once("../../class/paciente.php");
include_once("../../class/medico.php");
include_once("../../class/recetamedica.php");
include_once("../../class/medicamento.php");
include_once("../../class/tipofarmacia.php");
$historialexterno=new historialexterno;
$paciente=new paciente;
$medico=new medico;
$recetamedica=new recetamedica;
$medicamento=new medicamento;
$tipofarmacia=new tipofarmacia;
$hist=array_shift($historialexterno->mostrar($id));
$pac=array_shift($paciente->mostrar($hist['idpaciente']));
$med=array_shift($medico->mostrar($hist['idmedico']));

class PDF extends FPDF{
	function Header(){
		global $pdf,$hist,$pac;
		$pdf->Cell(195,10,"HISTORIA CLINICA",0,0,"C");
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
		escribir(45,"".$pac['telefono']);	
		escribir(50,"Pag.: ".$this->PageNo()."/{nb}");	
		$pdf->Ln();
		$pdf->Cell(195,0,"",1);
		$pdf->Ln(5);

		$pdf->Ln();
	}	
}
$pdf=new PDF("P","mm","letter");
$pdf->SetFont("arial","B",13);
$pdf->AliasNbPages();
$pdf->AddPage();



escribir(80,"MOTIVO CONSULTA:","B");
$pdf->Ln();
escribirM(195,$hist['motivoconsulta']);
$pdf->Ln();
escribir(80,"ENFERMEDAD ACTUAL:","B");
$pdf->Ln();
escribirM(195,$hist['enfermedadactual']);
$pdf->Ln();
escribir(80,"ANTECEDENTES:","B");
$pdf->Ln();
escribirM(195,$hist['antecedentes']);
$pdf->Ln();
escribir(80,"ANTECEDENTES GINECO-OBSTÉTRICOS:","B");
$pdf->Ln();
escribir(20,"Menarca:	","B");
escribir(40,"".$hist['menarca']);
escribir(20,"Catamenio:	","B");
escribir(35,"".$hist['catamenio']);
escribir(10,"MAC:	","B");
escribir(25,"".$hist['mac']);
escribir(10,"PAP:	","B");
escribir(35,"".$hist['pap']);
$pdf->Ln();
escribir(10,"FUM:	","B");
escribir(30,"".$hist['fum']);
escribir(15,"Gestas:	","B");
escribir(25,"".$hist['gestas']);
escribir(15,"Partos:	","B");
escribir(15,"".$hist['partos']);
escribir(15,"Cesárea:	","B");
escribir(25,"".$hist['cesarea']);
escribir(10,"AB:	","B");
escribir(30,"".$hist['ab']);
$pdf->Ln();
escribir(50,"EXÁMEN FISICO GENERAL	","B");
escribir(10,"P.A.:	","B");
escribir(30,"".$hist['pa']." mmHg");
escribir(10,"F.C.:	","B");
escribir(25,$hist['fc']." lpm");
escribir(10,"FR:	","B");
escribir(25,"".$hist['fr']." rpm");
$pdf->Ln();
escribir(50,"");
escribir(15,"TALLA:	","B");
escribir(25,"".$hist['talla']." mts.");
escribir(15,"PESO:	","B");
escribir(25,"".$hist['peso']." kg.");
escribir(15,"IMC:	","B");
escribir(35,"".$hist['imc']." Tº.");
escribir(35,"".$hist['t']." ºC");
$pdf->Ln();
escribir(35,"CABEZA CUELLO:	"."","B");
escribir(170,$hist['cabezacuello']."","");
$pdf->Ln();
escribir(55,"SISTEMA CARDIOVASCULAR:		"."","B");
escribir(140,$hist['sistemacardiovascular']."","");
$pdf->Ln();
escribir(50,"SISTEMA RESPIRATORIO:			","B");
escribir(145,$hist['sistemarespiratorio']."","");
$pdf->Ln();
escribir(195,"ABDOMEN"."","B");
$pdf->Ln();
escribirM(195,"".$hist['abdomen']."");
$pdf->Ln();
escribir(195,"EXAMEN GINECO-OBSTRETICOS"."","B");
$pdf->Ln();
escribirM(195,"".$hist['examenginecoobstetrico']."");
$pdf->Ln();
escribir(195,"Genito Urinario"."","B");
$pdf->Ln();
escribirM(195,"".$hist['genitourinario']."");
$pdf->Ln();
escribir(30,"EXTREMIDADES:"."","B");
escribirM(165,"".$hist['extremidades']."");
$pdf->Ln();
escribir(50,"EXAMEN NEUROLÓGICO:"."","B");
escribirM(165,"".$hist['examenneurologico']."");
$pdf->Ln();
escribir(195,"EXAMENES DE LABORATORIO Y GABINETE:"."","B");
$pdf->Ln();
escribirM(195,"".$hist['examenesdelaboratorio']."");
$pdf->Ln();
escribir(195,"IMPRESIÓN DIAGNOSTICA:"."","B");
$pdf->Ln();
escribirM(195,"".$hist['impresiondiagnostica']."");
$pdf->Ln();
escribir(195,"TRATAMIENTO:"."","B");
$pdf->Ln();
escribirM(195,"".$hist['tratamiento']."");
$pdf->Ln();
escribir(8,"N","B","C",10,1);
escribir(100,"Medicamento","B","C",10,1);
escribir(10,"Cant","B","C",10,1);
escribir(25,"Cada","B","C",10,1);
escribir(50,"Durante","B","C",10,1);

$pdf->Ln();
foreach($recetamedica->mostrarTodo("idhistorialexterno=$id") as $rm){$i++;
	$m=array_shift($medicamento->mostrar($rm['idmedicamento']));
	$tf=array_shift($tipofarmacia->mostrar($m['idtipofarmacia']));
	escribir(8,$i,"","R",10,1);
	escribir(100,$m['nombre']." ".$tf['nombre'],"","",10,1);
	escribir(10,$rm['cantidad'],"","R",10,1);
	escribir(25,$rm['cada'],"","R",10,1);
	escribir(50,$rm['durante'],"","R",10,1);

	$pdf->Ln();
}


escribir(195,"FECHA DE CONTROL:	".fecha2str($hist['fechacontrol']),"B");
$pdf->Ln();
escribir("195",$med['paterno']." ".$med['materno']." ".$med['nombre'],"B","R");
$pdf->Ln(2);
escribir("195","....................................","B","R");
$pdf->Ln();
escribir("195","MEDICO TRATANTE","B","R");




$pdf->Output();
//date
?>