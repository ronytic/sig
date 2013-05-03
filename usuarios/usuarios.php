<?php
include_once("../class/enfermera.php");
include_once("../class/medico.php");
$enfermera=new enfermera;
$medico=new medico;
$nivel=$_POST['nivel'];
switch($nivel){
	case 3:{
		?>Enfermera a asignar este Usuario: <br>
        <select name="codusuario">
       	 <option value="">Selecciona a la Enfermera</option>
        	<?php
            	foreach($enfermera->mostrarTodo() as $enf){
					?>
                    <option value="<?php echo $enf['idenfermera']?>" <?php echo $enf['idenfermera']==$_POST['idcodusuario']?'selected="selected"':'';?>><?php echo $enf['nombre']." ".$enf['apep']." ".$enf['apem']?></option>
                    <?php	
				}
			?>
        </select>
        <?php
		}break;	
	case 4:{
	?>Medico a asignar este Usuario:  <br>
	<select name="codusuario">
    	<option value="">Selecciona al Medico</option>
		<?php
			foreach($medico->mostrarTodo() as $med){
				?>
				<option value="<?php echo $med['idmedico']?>"  <?php echo $med['idmedico']==$_POST['idcodusuario']?'selected="selected"':'';?>><?php echo $med['nombre']." ".$med['paterno']." ".$med['materno']?></option>
				<?php	
			}
		?>
	</select>
	<?php
	}break;	

}
?>