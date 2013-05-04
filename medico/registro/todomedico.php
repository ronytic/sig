<?php
include_once("../../login/check.php");
$titulo="Reporte de Medico";
$folder="../../";
include_once("../../cabecerahtml.php");
$id=$_GET['id'];
?>
<?php include_once("../../cabecera.php");?>
<?php include_once("../../lateral.php");?>
<div class="contenido">
	<fieldset>
    	<legend><?php echo $titulo?></legend>
        <iframe height="800" width="670" src="../../impresion/medico/todomedico.php?id=<?php echo $id?>#zoom=80"></iframe>
    </fieldset>
</div>
<?php
include_once("../../piepagina.php");
?>