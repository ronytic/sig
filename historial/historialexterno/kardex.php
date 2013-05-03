<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Reporte de Historial Externo";
$id=$_GET['id'];
if(empty($id)){
	$id=$_GET['idhistorialexterno'];
}
include_once("../../cabecerahtml.php");
?>
<?php include_once("../../cabecera.php");?>
<?php include_once("../../lateral.php");?>
<div class="contenido">
	<fieldset>
    	<legend><?php echo $titulo;?></legend>
		<iframe width="100%" src="../../impresion/historial/kardex.php?id=<?php echo $id?>" height="700"></iframe>
    </fieldset>
</div>
<?php include_once("../../piepagina.php");?>