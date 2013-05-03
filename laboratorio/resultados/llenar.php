<?php 
include_once("../../login/check.php"); 
$titulo="Llenar los resultados de laboratorio";
$folder="../../";
$id=$_GET['id'];
include_once("../../funciones/funciones.php");
include_once '../../class/paciente.php';
include_once '../../class/tipolaboratorio.php';
include_once '../../class/solicitaexamen.php';
include_once '../../class/subsolicita.php';
include_once '../../class/laboratorio.php';
$tipolaboratorio=new tipolaboratorio;
$solicitaexamen=new solicitaexamen;
$paciente=new paciente;
$subsolicita=new subsolicita;
$laboratorio=new laboratorio;
$se=array_shift($solicitaexamen->mostrar($id));
$p=array_shift($paciente->mostrar($se['idpaciente']));


include("../../cabecerahtml.php"); 
?>

<?php include("../../cabecera.php");?>
<?php include("../../lateral.php");?>
<div class="contenido">

<fieldset>
<legend>Datos del Paciente</legend>
<form action="actualizarsolicita.php" method="post">
  <input type="hidden" name="id" value="<?php echo $id; ?>">
<table class="tablareg2">
   <tr><td>Paciente:</td><td class="resaltar"><?php echo $p['apep'] ?> <?php echo $p['apem'] ?> <?php echo $p['nombre'] ?></td><td>C.I.</td><td class="resaltar"><?php echo $p['ci'] ?></td></tr>
   <tr><td>Telefono</td><td class="resaltar"><?php echo $p['telefono']?></td></tr>
</table>
  <table class="tablareg2 ">
    <tr>
     <td  class="resaltar">Fecha de Analisis:</td><td><?php echo fecha2Str($se['fechaexamen']); ?></td>
    </tr>
    <tr>
</table>
</fieldset>
<fieldset>
	<legend>Tipo de Analisis</legend>
	<table class="tablalistado">
    <tr class="cabecera"><td>Tipo Laboratorio</td><td>Tipo Analisis</td><td>Precio</td></tr>
	<?php
	foreach($subsolicita->mostrarTodo("idsolicitaexamen=$id") as $ss){
		$l=array_shift($laboratorio->mostrar($ss['idlaboratorio']));
		$tl=array_shift($tipolaboratorio->mostrar($l['idtipolaboratorio']));
		?>
        <tr class="contenido"><td class="resaltar"><?php echo $tl['nombre']?></td><td><?php echo $l['nombreanalisis']?></td><td class="der"><?php echo $l['precio']?></td></tr>
        <?php		
	}
	?>
    	<tr class="contenido"><td></td><td class="resaltar">Precio Total</td><td class="der resaltar"><?php echo $se['precio']?></td></tr>
        <tr class="cabecera"><td class="resaltar" colspan="3">Observación</td></tr>
    <tr>
    	
		<td colspan="3" class="contenido"><?php echo $se['obs']?></td>
    </tr>
    </table>
</fieldset>
<fieldset>
	<legend>Examén General de Orina</legend>
	<table class="tablalistado">
    	<tr class="cabecera"><td>Exámen Fisico</td><td>Exámen Quimico</td><td>Exámen Microscópico</td></tr>
       	<tr class="contenido">
        	<td><textarea rows="20" cols="22" name="examenfisico" placeholder="Ingrese los datos del Examen Fisico"><?php echo $se['examenfisico'];?></textarea></td>
            <td><textarea rows="20" cols="22" name="examenquimico" placeholder="Ingrese los datos del Examen Quimico"><?php echo $se['examenquimico'];?></textarea></td>
            <td><textarea rows="20" cols="22" name="examenmicroscopico" placeholder="Ingrese los datos del Examen Microscopico"><?php echo $se['examenmicroscopico'];?></textarea></td>
        </tr>
    </table>
</fieldset>

<fieldset>
	<legend>Cuadro Hematico</legend>
    <table class="tablalistado">
    	<tr class="cabecera"><td>Cuadro Hematico 1</td><td>Cuadro Hematico 2</td></tr>
    	<tr class="contenido">
        	<td><textarea rows="20" cols="22" name="cuadrohematico1"  placeholder="Ingrese los datos del Cuadro Termico, Primera Columna"><?php echo $se['cuadrohematico1'];?></textarea></td>
            <td><textarea rows="20" cols="22" name="cuadrohematico2" placeholder="Ingrese los datos del Cuadro Termico, Segunda Columna"><?php echo $se['cuadrohematico2'];?></textarea></td>
        </tr>
        <tr class="cabecera"><td colspan="2">Otros Resultados</td></tr>
        <tr class="contenido">
        	<td colspan="2" class="centrar"><textarea rows="10" cols="50" name="otrosresultados" placeholder="Ingrese otros Resultados"><?php echo $se['otrosresultados'];?></textarea></td>
        </tr>
    </table>
</fieldset>
<fieldset>
	<legend>Resultados del Análisis General</legend>
    <table class="tablalistado">
    	<tr class="cabecera"><td>Resultados</td></tr>
        <tr class="contenido">
        	<td colspan="2" class="centrar"><textarea rows="20" cols="50" name="resultadogeneral" placeholder="Ingrese los resultados Generales"><?php echo $se['resultadogeneral'];?></textarea></td>
    </table>
</fieldset>
<fieldset>
<?php campos("Actualizar","","submit","",1); ?>
</fieldset>
</form>
</div>
<?php include("../../piepagina.php");?>