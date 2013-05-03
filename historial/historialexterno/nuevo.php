<?php
include_once("../../login/check.php");
include_once("../../funciones/funciones.php");
$titulo="Nuevo Historial Externo";
$folder="../../";

$a1nombre="paciente";
extract($_GET);
include_once '../../class/'.$a1nombre.'.php';
${$a1nombre}=new $a1nombre;
$pac=array_shift(${$a1nombre}->mostrar($idpaciente));

$a2nombre="medico";
include_once '../../class/'.$a2nombre.'.php';
${$a2nombre}=new $a2nombre;
$med=todolista(${$a2nombre}->mostrarTodo(),"idmedico","nombre,paterno,materno"," ");

$a3nombre="especialidad";
include_once '../../class/'.$a3nombre.'.php';
${$a3nombre}=new $a3nombre;
$espe=todolista(${$a3nombre}->mostrarTodo(),"idespecialidad","nombre,descripcion"," - ");
include_once("../../cabecerahtml.php");
?>
<script language="javascript" type="text/javascript" src="../../js/seleccion.js"></script>
<?php include_once("../../cabecera.php");?>
<?php include_once("../../lateral.php");?>
<div class="contenido">
<form action="guardar.php" method="post">
<fieldset>
	<legend><?php echo $titulo;?></legend>
    <table class="tablareg">
    	<?php campos("","idpaciente","hidden",$idpaciente);?>
    	<tr><td>Nombre</td><td class="resaltar"><?php echo $pac['apep']?> <?php echo $pac['apem']?> <?php echo $pac['nombre']?></td><td>CI</td><td class="resaltar"><?php echo $pac['ci']?></td><td>Fecha Nac</td><td class="resaltar"><?php echo fecha2str($pac['fecnac'])?></td><td>Edad</td><td class="resaltar"><?php echo calcularEdad($pac['fecnac'])?></td></tr>
		<tr><td>Estado Civil</td><td class="resaltar"><?php echo $pac['estcivil']?></td><td>Ocupación</td><td class="resaltar"><?php echo $pac['ocup']?></td><td>Teléfono</td><td class="resaltar"><?php echo $pac['telefono']?></td></tr>
        <tr><td>Teléfono Referencia</td><td class="resaltar"><?php echo $pac['reffono']?></td></tr>
        <tr><td>Dirección</td><td class="resaltar" colspan="10"><?php echo $pac['direccion']?></td></tr>
    </table>
    
</fieldset>
<fieldset>
  <table class="tablareg2">
  		<tr><td><?php campos("Fecha","fecha","date",hoy(0),1);?></td></tr>
     <tr>
        <td><?php campos("Motivo Consulta","motivoconsulta","textarea","",1,array("cols"=>20,"rows"=>8));?></td>
        <td><?php campos("Enfermedad Actual","enfermedadactual","textarea","",0,array("cols"=>20,"rows"=>8));?></td>
        <td><?php campos("Antecedentes","antecedentes","textarea","",0,array("cols"=>20,"rows"=>8));?></td>
     </tr>
   </table>
   <span class="resaltar">Exámen Físico General</span>
   <table class="tablareg2">
   	<tr>
    	<td><?php campos("P.A.","pa","text","",0,array("size"=>6,"maxlength"=>6));?>mmHg.</td>
    	<td><?php campos("F.C.","fc","text","",0,array("size"=>5,"maxlength"=>5));?>lpm.</td>
        <td><?php campos("F.R.","fr","text","",0,array("size"=>5,"maxlength"=>5));?>rpm.</td>
    </tr>
    <tr>
    	<td><?php campos("Talla","talla","text","",0,array("size"=>5,"maxlength"=>5));?>mts.</td>
    	<td><?php campos("Peso","peso","text","",0,array("size"=>5,"maxlength"=>5));?>kg.</td>
        <td><?php campos("IMC","imc","text","",0,array("size"=>5,"maxlength"=>5));?></td>
        <td><?php campos("Tº","t","text","",0,array("size"=>5,"maxlength"=>5));?>ºC.</td>
    </tr>
    <tr><td colspan="4"><?php campos("Especialidad","idespecialidad","select",$espe,0,array("class"=>"seleccionar"));?></td></tr>
    <tr><td colspan="4"><?php campos("Medico","idmedico","select",$espe,0,array("class"=>"seleccionar"));?></td></tr>
   </table>
   <?php campos("Guardar","","submit")?>
</fieldset>
</form>
</div>
<?php
include("../../piepagina.php");
?>