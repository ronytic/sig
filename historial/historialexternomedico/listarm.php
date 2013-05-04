<?php
include_once("../../login/check.php");
if(isset($_POST)){
include_once("../../class/recetamedica.php");
include_once("../../class/medicamento.php");
include_once("../../class/tipofarmacia.php");
$recetamedica=new recetamedica;
$medicamento=new medicamento;
$tipofarmacia=new tipofarmacia;
$id=$_POST['id'];
$i=0;
?>

<tr class="cabecera"><td>Nº</td><td>Nombre</td><td>Total Med.</td><td>Cantidad</td><td>Cada</td><td>Durante</td></tr>
<?php
foreach($recetamedica->mostrarTodo("idhistorialexterno=$id") as $rm){$i++;
$m=array_shift($medicamento->mostrar($rm['idmedicamento']));
$tf=array_shift($tipofarmacia->mostrar($m['idtipofarmacia']));
	?>
    <tr class="contenido">
    	<td><?php echo $i?></td>
        <td><?php echo $m['nombre']?> - <?php echo $tf['nombre']?></td>
        <td class="der"><?php echo $rm['total']?></td>
        <td class="der"><?php echo $rm['cantidad']?></td>
        <td><?php echo $rm['cada']?></td>
        <td><?php echo $rm['durante']?></td>
	</tr>
    <?php	
}
?>

<?php
}
?>
