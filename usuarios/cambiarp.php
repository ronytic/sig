<?php
include_once("../login/check.php");
$titulo="Cambiar Contrseña";
$_SESSION['idmenu']=0;
$_SESSION['subm']=0;
$folder="../";
include_once("../funciones/funciones.php");
?>

<?php include_once("../cabecerahtml.php"); ?>

<?php include_once("../cabecera.php");?>
<?php include_once("../lateral.php");?>
  <div class="contenido centrar">
  <fieldset>
  		<legend>Cambiar Contraseña</legend>
        	<form action="cambiar.php" method="post">
			<table class="tablareg">
            	<tr>
                	<td><?php campos("Contraseña Nueva","pass","password","",1);?></td>
                    <td><?php campos("Cambiar","","submit","",0);?></td>
                </tr>
            </table>
  			</form>
  </fieldset>
  </div>
<?php include_once("../piepagina.php");?>