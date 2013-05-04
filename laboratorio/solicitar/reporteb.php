<?php 
include_once("../../login/check.php"); 
$titulo="Revisión de Solicitud de Exámen";
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
<table class="tabla">
   <tr><td>Paciente:</td><td class="resaltar"><?php echo $p['apep'] ?> <?php echo $p['apem'] ?> <?php echo $p['nombre'] ?></td><td>C.I.</td><td class="resaltar"><?php echo $p['ci'] ?></td></tr>
   <tr><td>Telefono</td><td class="resaltar"><?php echo $p['telefono']?></td></tr>
</table>
  <table class="tablareg2 ">
    <tr>
     <td><?php campos("Fecha Examen","fechaexamen","date",$se['fechaexamen'],1); ?></td>
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
    </table>
</fieldset>
<fieldset>
	<table>
    </tr>
    <tr>
    	
		<td colspan="2"><?php campos("Observación","obs","textarea",$se['obs'],1,array("rows"=>5,"cols"=>50)); ?></td>
    </tr>
    <tr>
      <td><?php campos("Actualizar","","submit","",1); ?></td>
    </tr>
  </table>
</fieldset>
</form>
</div>
<?php include("../../piepagina.php");?>