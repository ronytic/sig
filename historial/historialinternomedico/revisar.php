<?php
include_once("../../login/check.php");
include_once("../../funciones/funciones.php");
$titulo="Revisión Medico Interno";
$folder="../../";

extract($_GET);

$a2nombre="historialinterno";
include_once '../../class/'.$a2nombre.'.php';
${$a2nombre}=new $a2nombre;
$hist=array_shift(${$a2nombre}->mostrar($idhistorialinterno));

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


$a4nombre="cama";
include_once '../../class/'.$a4nombre.'.php';
${$a4nombre}=new $a4nombre;
$ca=todolista(${$a4nombre}->mostrarTodo(),"idcama","numerocama,descripcion"," - ");

$a5nombre="sala";
include_once '../../class/'.$a5nombre.'.php';
${$a5nombre}=new $a5nombre;
$sa=todolista(${$a5nombre}->mostrarTodo(),"idsala","numerosala,nombresala","  ");


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
if($hist['alta']){
	$alta=array("readonly"=>"readonly");	
	$altas=array("disabled"=>"disabled");
}else{
	$alta=array();	
	$altas=array();
}
include_once("../../cabecerahtml.php");
?>
<script language="javascript" type="text/javascript">var id=<?php echo $idhistorialinterno?>;</script>
<!--<script language="javascript" type="text/javascript" src="../../js/historial/externo.js"></script>-->
<?php include_once("../../cabecera.php");?>
<?php include_once("../../lateral.php");?>
<div class="contenido">
<form action="actualizar.php" method="post">
<fieldset>
	<legend><?php echo $titulo;?></legend>
    <table class="tablareg">
    	<?php campos("","idhistorialinterno","hidden",$idhistorialinterno);?>
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
        <td><?php campos("Motivo Internación","motivointernacion","textarea",$hist['motivointernacion'],1,array("cols"=>75,"rows"=>8,"readonly"=>"readonly"),"",1);?></td></tr>
     <tr><td><?php campos("Antecedentes Personales","antecedentespersonales","textarea",$hist['antecedentespersonales'],0,array("cols"=>75,"rows"=>8,"readonly"=>"readonly"),"",1);?></td></tr>
     <tr><td><?php campos("Antecedentes Familiares","antecedentesfamiliares","textarea",$hist['antecedentesfamiliares'],0,array("cols"=>75,"rows"=>8,"readonly"=>"readonly"),"",1);?></td>
     </tr>
     <tr><td><?php campos("Examén General","examengeneral","textarea",$hist['examengeneral'],0,array("cols"=>75,"rows"=>8,"readonly"=>"readonly"),"",1);?></td>
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
	<table class="tablareg2">
   	<tr>
    	<td><?php campos("Sala","idsala","select",$sa,0,array_merge($altas,array("class"=>"seleccionar","readonly"=>"readonly")));?></td>
    	<td><?php campos("Cama","idcama","select",$ca,0,array_merge($altas,array("class"=>"seleccionar","readonly"=>"readonly")));?></td>
    </tr>
    </table>
</fieldset>

<fieldset>

    	<legend>Exámen Médico</legend>
    
   <!-- <table class="tablalistado">
    	<th><tr class="cabecera"><td width="250">Medicamento</td><td>Cantidad</td><td>Cada</td><td>Durante</td></tr></th>
        <tr>
        	<td><?php campos("","idmedicamento","select",$medicamentos,0,array_merge($alta,array("class"=>"seleccionar")));?></td>
            <td><?php campos("","cantidadmedicamento","number","",0,array_merge($alta,array("style"=>"width:100px")));?></td>
            <td><?php campos("","cadamedicamento","text","",0,array_merge($alta,array("size"=>15,"maxlength"=>100)));?></td>
            <td><?php campos("","durantemedicamento","text","",0,array_merge($alta,array("size"=>15,"maxlength"=>100)));?></td>
            <td><a href="" class="botoninfo" id="guardarm">>></a></td>
        </tr>
    </table>
    
    <table id="resultado" class="tablalistado">
    </table>-->
    <table>
        <tr>
        <td><?php campos("Examén Segmentario y Sistemático","examensegmentario","textarea",$hist['examensegmentario'],1,array_merge($alta,array("cols"=>75,"rows"=>8)),"",1);?></td></tr>
     <tr><td><?php campos("Examen especial del aparato o sistema","examenespecial","textarea",$hist['examenespecial'],0,array_merge($alta,array("cols"=>75,"rows"=>8)),"",1);?></td></tr>
     <tr><td><?php campos("Diagnostico Probable","diagnosticoprobable","text",$hist['diagnosticoprobable'],0,array_merge($alta,array("size"=>100,"maxlength"=>150)),"",1);?></td>
     </tr>
     <tr><td><?php campos("Diagnostico Definitivo","diagnosticodefinitivo","text",$hist['diagnosticodefinitivo'],0,array_merge($alta,array("size"=>100,"maxlength"=>150)),"",1);?></td>
     </tr>
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