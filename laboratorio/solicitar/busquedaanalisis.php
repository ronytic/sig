<?php 
$valor=$_POST['Valor'];
include_once("../../login/check.php");
$anombre="laboratorio";
	include_once '../../class/'.$anombre.'.php';
	${$anombre}=new $anombre;
	$labos=${$anombre}->mostrarTodo("idtipolaboratorio=$valor");
?>
Tipo de Analisis<br />
 <select name="analisis"  class="seleccionar">
        <?php foreach($labos as $lab){ ?>
        <option value="<?php echo $lab['idlaboratorio']?>" rel="<?php echo $lab['precio']?>"><?php echo $lab['nombreanalisis'];?></option>
        <?php		
							}
							?>
      </select>
<br />
<a href="#" id="anadir" class="botoncorrecto">Añadir al Analisis</a>
<hr />