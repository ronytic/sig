<?php
include_once("../../login/check.php");
include_once("../../class/medico.php");
$medico=new medico;
extract($_POST);
foreach($medico->mostrarTodo("idespecialidad=$idespecialidad") as $m){
	?>
		<option value="<?php echo $m['idmedico']?>"><?php echo ucwords($m['paterno'])?> <?php echo ucwords($m['materno'])?> <?php echo ucwords($m['nombre'])?></option>
	<?php	
}
?>