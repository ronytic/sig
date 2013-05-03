<?php
include_once("../../login/check.php");
include_once("../../funciones/funciones.php");
$titulo="Revisión Medico Externo";
$folder="../../";

extract($_GET);

$a2nombre="historialexterno";
include_once '../../class/'.$a2nombre.'.php';
${$a2nombre}=new $a2nombre;
$hist=array_shift(${$a2nombre}->mostrar($idhistorialexterno));
if($hist['revisado']){
	$revi=array("readonly"=>"readonly");
}else{
	$revi=array();	
}
//print_r($revi);
$a1nombre="paciente";
include_once '../../class/'.$a1nombre.'.php';
${$a1nombre}=new $a1nombre;
$pac=array_shift(${$a1nombre}->mostrar($hist['idpaciente']));

$a3nombre="especialidad";
include_once '../../class/'.$a3nombre.'.php';
${$a3nombre}=new $a3nombre;
$espe=todolista(${$a3nombre}->mostrarTodo(),"idespecialidad","nombre,descripcion"," - ");

$a4nombre="medico";
include_once '../../class/'.$a4nombre.'.php';
${$a4nombre}=new $a4nombre;
$med=todolista(${$a4nombre}->mostrarTodo(),"idmedico","paterno,materno,nombre"," ");

include_once("../../class/medicamento.php");
include_once("../../class/tipofarmacia.php");
$medicamento=new medicamento;
$tipofarmacia=new tipofarmacia;
$medicamentos=array();
foreach($medicamento->mostrarTodo() as $medica){
	$medica['nombre'];
	$tf=array_shift($tipofarmacia->mostrar($medica['idtipofarmacia']));
	$medicamentos[$medica['idmedicamento']]=$medica['nombre']." - ".$tf['nombre'];
	
}
include_once("../../cabecerahtml.php");
?>
<script language="javascript" type="text/javascript">var id=<?php echo $idhistorialexterno?>;</script>
<script language="javascript" type="text/javascript" src="../../js/historial/externo.js"></script>
<?php include_once("../../cabecera.php");?>
<?php include_once("../../lateral.php");?>
<div class="contenido">
<form action="actualizar.php" method="post">
<fieldset>
	<legend><?php echo $titulo;?></legend>
    <table class="tablareg">
    	<?php campos("","idhistorialexterno","hidden",$idhistorialexterno);?>
    	<tr><td>Nombre</td><td class="resaltar"><?php echo $pac['apep']?> <?php echo $pac['apem']?> <?php echo $pac['nombre']?></td><td>CI</td><td class="resaltar"><?php echo $pac['ci']?></td><td>Fecha Nac</td><td class="resaltar"><?php echo fecha2str($pac['fecnac'])?></td><td>Edad</td><td class="resaltar"><?php echo calcularEdad($pac['fecnac'])?></td></tr>
		<tr><td>Estado Civil</td><td class="resaltar"><?php echo $pac['estcivil']?></td><td>Ocupación</td><td class="resaltar"><?php echo $pac['ocup']?></td><td>Teléfono</td><td class="resaltar"><?php echo $pac['telefono']?></td></tr>
        <tr><td>Teléfono Referencia</td><td class="resaltar"><?php echo $pac['reffono']?></td></tr>
        <tr><td>Dirección</td><td class="resaltar" colspan="10"><?php echo $pac['direccion']?></td></tr>
    </table>
    
</fieldset>
<fieldset>
  <table class="tablareg2">
  		<tr><td><?php campos("Fecha","fecha","date",$hist['fechaelaboracion'],1,array("readonly"=>"readonly"));?></td></tr>
     <tr>
        <td><?php campos("Motivo Consulta","motivoconsulta","textarea",$hist['motivoconsulta'],1,array("cols"=>20,"rows"=>8,"readonly"=>"readonly"));?></td>
        <td><?php campos("Enfermedad Actual","enfermedadactual","textarea",$hist['enfermedadactual'],0,array("cols"=>20,"rows"=>8,"readonly"=>"readonly"));?></td>
        <td><?php campos("Antecedentes","antecedentes","textarea",$hist['antecedentes'],0,array("cols"=>20,"rows"=>8,"readonly"=>"readonly"));?></td>
     </tr>
   </table>
   <span class="resaltar">Exámen Físico General</span>
   <table class="tablareg2">
   	<tr>
    	<td><?php campos("P.A.","pa","text",$hist[pa],0,array("size"=>5,"maxlength"=>5,"readonly"=>"readonly"));?>mmHg.</td>
    	<td><?php campos("F.C.","fc","text",$hist[fc],0,array("size"=>5,"maxlength"=>5,"readonly"=>"readonly"));?>lpm.</td>
        <td><?php campos("F.R.","fr","text",$hist[fr],0,array("size"=>5,"maxlength"=>5,"readonly"=>"readonly"));?>rpm.</td>
    </tr>
    <tr>
    	<td><?php campos("Talla","talla","text",$hist[talla],0,array("size"=>5,"maxlength"=>5,"readonly"=>"readonly"));?>mts.</td>
    	<td><?php campos("Peso","peso","text",$hist[peso],0,array("size"=>5,"maxlength"=>5,"readonly"=>"readonly"));?>kg.</td>
        <td><?php campos("IMC","imc","text",$hist[imc],0,array("size"=>5,"maxlength"=>5,"readonly"=>"readonly"));?>mmHg.</td>
        <td><?php campos("Tº","t","text",$hist[t],0,array("size"=>5,"maxlength"=>5,"readonly"=>"readonly"));?>ºC.</td>
    </tr>
   </table>
</fieldset>
<fieldset>
	<legend>ANTECEDENTES GINECO-OBSTETRICOS</legend>
    <table>
    	<tr><td><?php campos("Menarca","menarca","text",$hist['menarca'],0,array_merge($revi,array("size"=>20)),"",1);?></td>
        <td><?php campos("Catamenio","catamenio","text",$hist['catamenio'],0,array_merge($revi,array("size"=>20)),"",1);?></td>
        <td><?php campos("MAC","mac","text",$hist['mac'],0,array_merge($revi,array("size"=>20)),"",1);?></td>
        <td><?php campos("PAP","pap","text",$hist['pap'],0,array_merge($revi,array("size"=>20)),"",1);?></td></tr>
        <tr><td><?php campos("FUM","fum","text",$hist['fum'],0,array_merge($revi,array("size"=>20)),"",1);?></td>
        <td><?php campos("Gestas","gestas","text",$hist['gestas'],0,array_merge($revi,array("size"=>20)),"",1);?></td>
        <td><?php campos("Partos","partos","text",$hist['partos'],0,array_merge($revi,array("size"=>20)),"",1);?></td>
        <td><?php campos("Cesarea","cesarea","text",$hist['cesarea'],0,array_merge($revi,array("size"=>20)),"",1);?></td></tr>
        <tr><td><?php campos("AB","ab","text",$hist['ab'],0,array_merge($revi,array("size"=>20)),"",1);?></td></tr>
    </table>
</fieldset>
<fieldset>
	<legend>INSPECCION GENERAL</legend>
    <table>
    	<tr><td><?php campos("Cabeza Cuello","cabezacuello","text",$hist['cabezacuello'],0,array_merge($revi,array("size"=>100)),"",1);?></td></tr>
        <tr><td><?php campos("Sistema Cardiovascular","sistemacardiovascular","text",$hist['sistemacardiovascular'],0,array_merge($revi,array("size"=>100)),"",1);?></td></tr>
        <tr><td><?php campos("Sistema Respiratorio","sistemarespiratorio","text",$hist['sistemarespiratorio'],0,array_merge($revi,array("size"=>100)),"",1);?></td></tr>
        <tr><td><?php campos("Abdomen","abdomen","text",$hist['abdomen'],0,array_merge($revi,array("size"=>100)),"",1);?></td></tr>
    </table>
</fieldset>
<fieldset>
	<legend>EXAMEN GINECO-OBSTETRICOS</legend>
    <table>
    	<tr><td><?php campos("Examen Gineco-Obstetricos","examenginecoobstetrico","textarea",$hist['examenginecoobstetrico'],0,array_merge($revi,array("cols"=>80,"rows"=>10)));?></td></tr>
    </table> 	
</fieldset>
<fieldset>
	<legend>GENITO-URINARIO</legend>
    <table>
        <tr><td><?php campos("Genito Urinario","genitourinario","text",$hist['genitourinario'],0,array_merge($revi,array("size"=>100)));?></td></tr>
    </table>
</fieldset>
<fieldset>
	<legend>OTROS</legend>
    <table>
    	<tr><td><?php campos("Extremidades","extremidades","text",$hist['extremidades'],0,array_merge($revi,array("size"=>100)),"",1);?></td></tr>
    	<tr><td><?php campos("Examen Neurologico","examenneurologico","text",$hist['examenneurologico'],0,array_merge($revi,array("size"=>100)));?></td></tr>
        <tr><td><?php campos("Examenes de Laboratorio y Gabinete","examenesdelaboratorio","text",$hist['examenesdelaboratorio'],0,array_merge($revi,array("size"=>100)));?></td></tr>
        <tr><td><?php campos("Impresión Diagnostica","impresiondiagnostica","text",$hist['impresiondiagnostica'],0,array_merge($revi,array("size"=>100)));?></td></tr>
    </table>
</fieldset>
<fieldset>
	<table>
    	<tr><td colspan="3"><?php campos("Tratamiento","tratamiento","textarea",$hist['tratamiento'],0,array_merge($revi,array("cols"=>80,"rows"=>10)));?>
        
        </td></tr>
    </table>
    <?php if($hist['revisado']==0){?>
    <table class="tablalistado">
    	<th><tr class="cabecera"><td width="250" colspan="4">Medicamento</td></tr></th>
        <tr>
        	<td colspan="4"><?php campos("","idmedicamento","select",$medicamentos,0,array_merge($revi,array("class"=>"seleccionar")));?></td>
        </tr>
        <tr class="cabecera"><td>Cantidad</td><td>Cada</td><td>Durante</td></tr>
            <td><?php campos("","cantidadmedicamento","number","",0,array_merge($revi,array("style"=>"width:100px")));?></td>
            <td><?php campos("","cadamedicamento","text","",0,array_merge($revi,array("size"=>15,"maxlength"=>100)));?></td>
            <td><?php campos("","durantemedicamento","text","",0,array_merge($revi,array("size"=>15,"maxlength"=>100)));?></td>
            
            <td><a href="" class="botoninfo" id="guardarm" >>></a></td>
            
        </tr>
    </table>
    <?php }?>
    <table id="resultado" class="tablalistado">
    </table>
    <hr />
    <?php if($hist['revisado']==0){ campos("¿Historial Totalmente Llenado?","revisado","select",array("1"=>"Si","0"=>"No",),0,array_merge($revi,array("class"=>"seleccionar")),1);?><br /> No se podrá Modificar los datos Introducidos posteriormente Si esta seleccionado "SI"
    <hr />
    <?php }?>
    <table>
        <tr><td><?php campos("Fecha de Control","fechacontrol","date",date("Y-m-d",strtotime(hoy()." +1week")),0,$revi)?></td></tr>
    </table>    	
</fieldset>
<fieldset>
	<?php campos("Guardar","","submit")?>
</fieldset>
</form>
</div>
<?php
include("../../piepagina.php");
?>