<?php
include_once("../../login/check.php");
if(isset($_POST)){
include_once("../../class/enfermera.php");
include_once("../../class/controlenfermera.php");

$enfermera=new enfermera;
$controlenfermera=new controlenfermera;


$id=$_POST['id'];
$i=0;
?>

<tr class="cabecera"><td>Nº</td><td width="80">Fecha</td><td width="50">Hora</td><td>Medicación</td><td>Vomit</td><td>Orina</td><td>Depost</td><td>Descripción de Sintomas</td><td>Enfermera</td></tr>
<?php
foreach($controlenfermera->mostrarTodo("idhistorialinterno=$id","fechacontrol DESC, horacontrol",0,1) as $ce){$i++;
$e=array_shift($enfermera->mostrar($ce['idenfermera']));

	?>
    <tr class="contenido">
    	<td><?php echo $i?></td>
        
        <td class="der"><?php echo fecha2Str($ce['fechacontrol'])?></td>
        <td><?php echo $ce['horacontrol']?></td>
        <td><?php echo $ce['medicacion']?></td>
        <td><?php echo $ce['vomito']?></td>
        <td><?php echo $ce['orina']?></td>
        <td><?php echo $ce['depost']?></td>
        <td><?php echo $ce['descripcion']?></td>
        <td><?php echo $e['nombre']?> <?php echo $e['apep']?></td>
	</tr>
    <?php	
}
?>

<?php
}
?>
