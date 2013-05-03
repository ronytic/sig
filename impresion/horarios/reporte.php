<?php
include_once("../fpdf/fpdf.php");
$nivel=$_GET['nivel'];
$turno=$_GET['turno'];
include_once("../../funciones/funciones.php");
include_once("../../class/enfermera.php");
include_once("../../class/medico.php");
include_once("../../class/horarios.php");

$enfermera=new enfermera;
$medico=new medico;
$horarios=new horarios;

class PDF extends FPDF{
	function Header(){
		global $nivel,$hist,$turno;
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
			escribir(260,"HORARIOS DE ENFERMERA y MEDICOS","UB","C",15,0);
			$this->SetXY(15,35);
			escribir(15,"Turno: ","B");
			switch($turno){
				case "M":{escribir(80,"Mañana");}break;
				case "T":{escribir(80,"Tarde");}break;
				case "N":{escribir(80,"Noche");}break;
				default:{escribir(80,"Todos los Horarios");}break;
			}
			
			$this->SetY(40);
			$this->Ln();
			escribir(10,"Nº","B","C",10,1);
			escribir(75,"Nombre y Apellidos","B","C",10,1);
			escribir(25,"Lunes","B","C",10,1);

			escribir(25,"Martes","B","C",10,1);

			escribir(25,"Mierc.","B","C",10,1);

			escribir(25,"Jueves","B","C",10,1);

			escribir(25,"Viernes","B","C",10,1);

			escribir(25,"Sábado","B","C",10,1);

			escribir(25,"Domingo","B","C",10,1);
	
			$this->Ln();
	}	
}

$pdf=new PDF("L","mm","letter");
$pdf->SetFont("arial","B",13);
$pdf->AliasNbPages();
$pdf->AddPage();

$i=0;
foreach($horarios->mostrarTodo("nivel LIKE '%$nivel%' and turno LIKE '%$turno%'") as $h){$i++;
	switch($h['nivel']){
		case "3":{$enf=array_shift($enfermera->mostrar($h['idusuario']));
				$dato="Enf. ".$enf['apep']." ".$enf['apem']." ".$enf['nombre'];
				}break;
		case "4":{$enf=array_shift($medico->mostrar($h['idusuario']));
				$dato="Dr. ".$enf['paterno']." ".$enf['materno']." ".$enf['nombre'];
				}break;
	}
	escribir(10,$i,"","R",9,1);
	escribir(75,$dato,"","L",9,1);
	escribir(25,$h['lunes']?$h['entradalunes']." - ".$h['salidalunes']:'',"","C",10,1);

	escribir(25,$h['martes']?$h['entradamartes']." - ".$h['salidamartes']:'',"","C",10,1);

	escribir(25,$h['miercoles']?$h['entradamiercoles']." - ".$h['salidamiercoles']:'',"","C",10,1);

	escribir(25,$h['jueves']?$h['entradajueves']." - ".$h['salidajueves']:'',"","C",10,1);

	escribir(25,$h['viernes']?$h['entradaviernes']." - ".$h['salidaviernes']:'',"","C",10,1);

	escribir(25,$h['sabado']?$h['entradasabado']." - ".$h['salidasabado']:'',"","C",10,1);

	escribir(25,$h['domingo']?$h['entradadomingo']." - ".$h['salidadomingo']:'',"","C",10,1);
	$pdf->Ln();
}

$pdf->Output();

?>