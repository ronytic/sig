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

$a1nombre="paciente";
include_once '../../class/'.$a1nombre.'.php';
${$a1nombre}=new $a1nombre;
$pac=array_shift(${$a1nombre}->mostrar($hist['idpaciente']));
include_once("../../class/recetamedica.php");
include_once("../../class/medicamento.php");
include_once("../../class/tipofarmacia.php");
$recetamedica=new recetamedica;
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
<script language="javascript" type="text/javascript" src="../../js/farmacia/comprar.js"></script>
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
    <table class="tablalistado">
    	<th><tr class="cabecera"><td>Nº</td><td width="250">Medicamento</td><td>Cantidad</td><td>Cada</td><td>Durante</td><td width="500">Compra</td><td>Fecha Compra</td></tr></th>
        <a href="ver.php?idhistorialexterno=<?php echo $idhistorialexterno?>" class="botonerror">Ver Receta Medica</a>
        <?php
        	foreach($recetamedica->mostrarTodo("idhistorialexterno=$idhistorialexterno") as $rm){$i++;
$m=array_shift($medicamento->mostrar($rm['idmedicamento']));
$tf=array_shift($tipofarmacia->mostrar($m['idtipofarmacia']));
	?>
    <tr class="contenido">
    	<td><?php echo $i?></td>
        <td><?php echo $m['nombre']?> - <?php echo $tf['nombre']?></td>
        <td class="centrar"><?php echo $rm['cantidad']?></td>
        <td><?php echo $rm['cada']?></td>
        <td><?php echo $rm['durante']?></td>
        <td class="centrar"><input type="checkbox" class="comprado" rel="<?php echo $rm['idrecetamedica']?>" title="Marcar para Comprar" value="1" <?php echo $rm['comprado']=="checked"?'checked="checked"':'';?>><input type="text" class="observacion" rel="<?php echo $rm['idrecetamedica']?>" placeholder="Su Observación" size="15"></td>
        <td><input type="date" class="fechadecompra" rel="<?php echo $rm['idrecetamedica']?>" value="<?php echo date("Y-m-d");?>" ></td>
	</tr>
    <?php	
}

		?>
    </table>
    <table id="resultado" class="tablalistado">
    </table>
	
</fieldset>
</form>
</div>
<?php
include("../../piepagina.php");
?>