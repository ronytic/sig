<?php 
include_once("../login/check.php"); 
$titulo="Reporte de Horarios";
$folder="../";
extract($_GET);

include("../cabecerahtml.php"); 
?>

<?php include("../cabecera.php");?>
<?php include("../lateral.php");?>
<div class="contenido">

<fieldset>
<legend>Reporte de Horarios</legend>
	<iframe src="../impresion/horarios/reporte.php?nivel=<?php echo $nivelh?>&turno=<?php echo $turnoh?>" width="100%" height="750"></iframe>
</fieldset>
</form>
</div>
<?php include("../piepagina.php");?>