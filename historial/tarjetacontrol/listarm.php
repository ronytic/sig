<?php
include_once("../../login/check.php");
if(isset($_POST)){
include_once("../../class/enfermera.php");
include_once("../../class/tarjetacontrol.php");

$enfermera=new enfermera;
$tarjetacontrol=new tarjetacontrol;


$id=$_POST['id'];
$i=0;
?>

<tr class="cabecera"><td>Nº</td><td width="80">Fecha</td><td width="50">Hora</td><td>Ordenes</td><td>Datos</td><td>Discontinuo</td></tr>
<?php
foreach($tarjetacontrol->mostrarTodo("idhistorialinterno=$id","fechacontrol DESC, horacontrol",0,1) as $ce){$i++;
$e=array_shift($enfermera->mostrar($ce['idenfermera']));

	?>
    <tr class="contenido">
    	<td class="der"><?php echo $i?></td>
        
        <td class="der"><?php echo fecha2Str($ce['fechacontrol'])?></td>
        <td><?php echo $ce['horacontrol']?></td>
        <td><?php echo $ce['ordenes']?></td>
        <td><?php echo $ce['dato']?></td>
        <td><?php echo $ce['discontinuo']?></td>
	</tr>
    <?php	
}
?>

<?php
}
?>
