<?php
include_once("../../login/check.php");
include_once("../../funciones/funciones.php");
$titulo="Modificar Historial Interno";
$folder="../../";

extract($_GET);

$a2nombre="historialinterno";
include_once '../../class/'.$a2nombre.'.php';
${$a2nombre}=new $a2nombre;
$hist=array_shift(${$a2nombre}->mostrar($id));

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

$a5nombre="cama";
include_once '../../class/'.$a5nombre.'.php';
${$a5nombre}=new $a5nombre;
$ca=todolista(${$a5nombre}->mostrarTodo(),"idcama","numerocama,descripcion"," - ");

$a6nombre="sala";
include_once '../../class/'.$a6nombre.'.php';
${$a6nombre}=new $a6nombre;
$sa=todolista(${$a6nombre}->mostrarTodo(),"idsala","numerosala,nombresala","  ");

if($hist['alta']){
	$alta=array("readonly"=>"readonly");	
	$altas=array("disabled"=>"disabled");
}else{
	$alta=array();	
	$altas=array();
}

include_once("../../cabecerahtml.php");
?>
<script language="javascript" type="text/javascript" src="../../js/seleccion.js"></script>
<?php include_once("../../cabecera.php");?>
<?php include_once("../../lateral.php");?>
<div class="contenido">
<form action="actualizar.php" method="post">
<fieldset>
	<legend><?php echo $titulo;?></legend>
    <table class="tablareg">
    	<?php campos("","id","hidden",$id);?>
    	<tr><td>Nombre</td><td class="resaltar"><?php echo $pac['apep']?> <?php echo $pac['apem']?> <?php echo $pac['nombre']?></td><td>CI</td><td class="resaltar"><?php echo $pac['ci']?></td><td>Fecha Nac</td><td class="resaltar"><?php echo fecha2str($pac['fecnac'])?></td><td>Edad</td><td class="resaltar"><?php echo calcularEdad($pac['fecnac'])?></td></tr>
		<tr><td>Estado Civil</td><td class="resaltar"><?php echo $pac['estcivil']?></td><td>Ocupación</td><td class="resaltar"><?php echo $pac['ocup']?></td><td>Teléfono</td><td class="resaltar"><?php echo $pac['telefono']?></td></tr>
        <tr><td>Teléfono Referencia</td><td class="resaltar"><?php echo $pac['reffono']?></td></tr>
        <tr><td>Dirección</td><td class="resaltar" colspan="10"><?php echo $pac['direccion']?></td></tr>
    </table>
    
</fieldset>
<fieldset>
	<table class="tablareg2">
   	<tr>
    	<td><?php campos("Sala","idsala","select",$sa,0,array_merge($altas,array("class"=>"seleccionar")),$hist['idsala']);?></td>
    	<td><?php campos("Cama","idcama","select",$ca,0,array_merge($altas,array("class"=>"seleccionar")),$hist['idcama']);?></td>
    </tr>
    </table>
</fieldset>
<fieldset>
  <table class="tablareg2">
  		<tr><td><?php campos("Fecha","fecha","date",$hist['fechaelaboracion'],1,$alta);?></td></tr>
     <tr>
        <td><?php campos("Motivo Internación","motivointernacion","textarea",$hist['motivointernacion'],1,array_merge($alta,array("cols"=>75,"rows"=>8)),"",1);?></td></tr>
     <tr><td><?php campos("Antecedentes Personales","antecedentespersonales","textarea",$hist['antecedentespersonales'],0,array_merge($alta,array("cols"=>75,"rows"=>8)),"",1);?></td></tr>
     <tr><td><?php campos("Antecedentes Familiares","antecedentesfamiliares","textarea",$hist['antecedentesfamiliares'],0,array_merge($alta,array("cols"=>75,"rows"=>8)),"",1);?></td>
     </tr>
     <tr><td><?php campos("Examén General","examengeneral","textarea",$hist['examengeneral'],0,array_merge($alta,array("cols"=>75,"rows"=>8)),"",1);?></td>
     </tr>
   </table>
   <span class="resaltar">Exámen Físico General</span>
   <table class="tablareg2">
   	<tr>
    	<td><?php campos("P.A.","pa","text",$hist[pa],0,array_merge($alta,array("size"=>6,"maxlength"=>6)));?>mmHg.</td>
    	<td><?php campos("F.C.","fc","text",$hist[fc],0,array_merge($alta,array("size"=>5,"maxlength"=>5)));?>lpm.</td>
        <td><?php campos("F.R.","fr","text",$hist[fr],0,array_merge($alta,array("size"=>5,"maxlength"=>5)));?>rpm.</td>
    </tr>
    <tr>
    	<td><?php campos("Talla","talla","text",$hist[talla],0,array_merge($alta,array("size"=>5,"maxlength"=>5)));?>mts.</td>
    	<td><?php campos("Peso","peso","text",$hist[peso],0,array_merge($alta,array("size"=>5,"maxlength"=>5)));?>kg.</td>
        <td><?php campos("IMC","imc","text",$hist[imc],0,array_merge($alta,array("size"=>5,"maxlength"=>5)));?>mmHg.</td>
        <td><?php campos("Tº","t","text",$hist[t],0,array_merge($alta,array("size"=>5,"maxlength"=>5)));?>ºC.</td>
    </tr>
    <tr><td colspan="4"><?php campos("Especialidad","idespecialidad","select",$espe,0,array_merge($altas,array("class"=>"seleccionar ","style"=>"width:650px")),$hist['idespecialidad']);?></td></tr>
    <tr><td colspan="4"><?php campos("Medico","idmedico","select",$med,0,array_merge($altas,array("class"=>"seleccionar")),$hist['idmedico']);?></td></tr>
   </table>
   <hr />
   <?php 
  if($hist['alta']==0){
		campos("¿Dado de Alta?","alta","select",array("0"=>"No","1"=>"Si"),0,array_merge($altas,array("class"=>"seleccionar")),$hist['alta']);
   
   ?>
   El paciente dado de Alta no podrá ser modificado posteriormente
   <hr />
   <?php }else{
		campos("","alta","hidden",$hist['alta']);   
	}?>
   <?php campos("Guardar","","submit")?>
</fieldset>
</form>
</div>
<?php
include("../../piepagina.php");
?>