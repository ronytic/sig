<?php
include_once("../../login/check.php");
if(isset($_POST)){
include_once("../../class/enfermera.php");
include_once("../../class/hojamedicamentos.php");

$enfermera=new enfermera;
$hojamedicamentos=new hojamedicamentos;


$id=$_POST['id'];
$i=0;
?>

<tr class="cabecera"><td>Nº</td><td width="80">Fecha</td><td width="50">Hora</td><td>Medicamentos</td><td>Enfermera</td></tr>
<?php
foreach($hojamedicamentos->mostrarTodo("idhistorialinterno=$id","fechacontrol DESC, horacontrol",0,1) as $hm){$i++;
$e=array_shift($enfermera->mostrar($hm['idenfermera']));

	?>
    <tr class="contenido">
    	<td class="der"><?php echo $i?></td>
        
        <td class="der"><?php echo fecha2Str($hm['fechacontrol'])?></td>
        <td><?php echo $hm['horacontrol']?></td>
        
        <td><?php echo $hm['medicamento']?></td>
        <td><?php echo $e['nombre']?> <?php echo $e['apep']?> <?php echo $e['apem']?></td>
	</tr>
    <?php	
}
?>

<?php
}
?>
