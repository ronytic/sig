<?php
include_once("../../login/check.php");
include_once("../../funciones/funciones.php");
$titulo="Modificar Historial Externo";
$folder="../../";

extract($_GET);

$a2nombre="historialexterno";
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
  		<tr><td><?php campos("Fecha","fecha","date",$hist['fechaelaboracion'],1);?></td></tr>
     <tr>
        <td><?php campos("Motivo Consulta","motivoconsulta","textarea",$hist['motivoconsulta'],1,array("cols"=>20,"rows"=>8));?></td>
        <td><?php campos("Enfermedad Actual","enfermedadactual","textarea",$hist['enfermedadactual'],0,array("cols"=>20,"rows"=>8));?></td>
        <td><?php campos("Antecedentes","antecedentes","textarea",$hist['antecedentes'],0,array("cols"=>20,"rows"=>8));?></td>
     </tr>
   </table>
   <span class="resaltar">Exámen Físico General</span>
   <table class="tablareg2">
   	<tr>
    	<td><?php campos("P.A.","pa","text",$hist[pa],0,array("size"=>6,"maxlength"=>6));?>mmHg.</td>
    	<td><?php campos("F.C.","fc","text",$hist[fc],0,array("size"=>5,"maxlength"=>5));?>lpm.</td>
        <td><?php campos("F.R.","fr","text",$hist[fr],0,array("size"=>5,"maxlength"=>5));?>rpm.</td>
    </tr>
    <tr>
    	<td><?php campos("Talla","talla","text",$hist[talla],0,array("size"=>5,"maxlength"=>5));?>mts.</td>
    	<td><?php campos("Peso","peso","text",$hist[peso],0,array("size"=>5,"maxlength"=>5));?>kg.</td>
        <td><?php campos("IMC","imc","text",$hist[imc],0,array("size"=>5,"maxlength"=>5));?></td>
        <td><?php campos("Tº","t","text",$hist[t],0,array("size"=>5,"maxlength"=>5));?>ºC.</td>
    </tr>
    <tr><td colspan="4"><?php campos("Especialidad","idespecialidad","select",$espe,0,array("class"=>"seleccionar"),$hist['idespecialidad']);?></td></tr>
    <tr><td colspan="4"><?php campos("Medico","idmedico","select",$med,0,array("class"=>"seleccionar"),$hist['idmedico']);?></td></tr>
   </table>
   <?php campos("Guardar","","submit")?>
</fieldset>
</form>
</div>
<?php
include("../../piepagina.php");
?>