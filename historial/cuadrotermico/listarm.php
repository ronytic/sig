<?php
include_once("../../login/check.php");
if(isset($_POST)){
include_once("../../class/enfermera.php");
include_once("../../class/cuadrotermico.php");

$enfermera=new enfermera;
$cuadrotermico=new cuadrotermico;


$id=$_POST['id'];
$i=0;
?>

<tr class="cabecera"><td>Nº</td><td style="width:800px;">Fecha</td><td width="50">Hora</td><td>Turno</td><td>Presion</td><td>Resp.</td><td>Orina</td><td>Deposicion</td><td>Temperatura</td><td>Talla</td><td>Peso</td><td>Enfermera</td></tr>
<?php
foreach($cuadrotermico->mostrarTodo("idhistorialinterno=$id","fechacontrol DESC, horacontrol",0,1) as $ct){$i++;
$e=array_shift($enfermera->mostrar($ct['idenfermera']));

	?>
    <tr class="contenido">
    	<td class="der"><?php echo $i?></td>
        <td><?php echo date("d-m-y",strtotime($ct['fechacontrol']));?></td>
        <td><?php echo date("H:i",strtotime($ct['horacontrol']));?></td>
        <td class="centrar"><?php echo $ct['turno']?></td>
       	<td class="centrar"><?php echo $ct['presion']?></td>
        <td class="centrar"><?php echo $ct['respiracion']?></td>
        <td class="centrar"><?php echo $ct['orina']?></td>
        <td class="centrar"><?php echo $ct['deposicion']?></td>
        <td class="centrar"><?php echo $ct['temperatura']?></td>
        <td class="centrar"><?php echo $ct['talla']?></td>
        <td class="centrar"><?php echo $ct['peso']?></td>
        <td><?php echo $e['nombre']?> <?php echo $e['apep']?> <?php echo $e['apem']?></td>
	</tr>
    <?php	
}
?>

<?php
}
?>
