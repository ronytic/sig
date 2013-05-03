<?php
include_once("../../login/check.php");
if(isset($_POST)){
include_once("../../class/recetamedica.php");
include_once("../../class/medico.php");
include_once("../../class/notaevolucion.php");

$medico=new medico;
$notaevolucion=new notaevolucion;
$id=$_POST['id'];
$i=0;
?>

<tr class="cabecera"><td>Nº</td><td>Fecha</td><td>Hora</td><td>Nota Evolución</td><td>Médico</td></tr>
<?php
foreach($notaevolucion->mostrarTodo("idhistorialinterno=$id","fechaevolucion DESC, horaevolucion",0,1) as $ne){$i++;
$m=array_shift($medico->mostrar($ne['idmedico']));

	?>
    <tr class="contenido">
    	<td><?php echo $i?></td>
        
        <td class="der"><?php echo fecha2Str($ne['fechaevolucion'])?></td>
        <td><?php echo $ne['horaevolucion']?></td>
        <td><?php echo $ne['notaevolucion']?></td>
        <td><?php echo $m['nombre']?> <?php echo $m['paterno']?> <?php echo $m['materno']?></td>
	</tr>
    <?php	
}
?>

<?php
}
?>
