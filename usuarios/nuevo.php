<?php
include_once '../login/check.php';
$folder="../";
$titulo="Nuevo Usuario";
$narchivo="usuarios";
include_once("../class/".$narchivo.".php");
include_once("../class/medico.php");
include_once("../class/enfermera.php");
$usu=new usuarios;
$medico=new medico;
$enfermera=new enfermera;
$iden=$_GET['id'];
$usu=array_shift($usu->mostrar($iden));
include_once '../funciones/funciones.php';
include_once '../cabecerahtml.php';
?>
<script language="javascript" type="text/javascript" src="../js/usuarios/usu.js"></script>
<?php include_once '../cabecera.php';?>
<?php include_once '../lateral.php';?>
    	<div class="contenido">
			<fieldset>
				<legend><?php echo $titulo;?></legend>
                <form action="guardar.php" method="post">
				<?php campos("","ident","hidden",$usu['codusuario'])?>
                <?php campos("","cod","hidden",$iden)?>
				<table class="tablareg">
                	<tr>
						<td><?php campos("Usuario","usuario","text",$usu['usuario'],1,array("required"=>"required","size"=>30));?></td>
						<td><?php campos("Contraseña","password","text","",0,array("required"=>"required","size"=>30));?></td>
					</tr>
                    <tr>
						<td><?php campos("Nombres","nombres","text",$usu['nombre'],0,array("required"=>"required","size"=>30));?></td>
                        <td><?php campos("Email","email","text",$usu['email'],0,array("size"=>30));?></td>
					</tr>
                    
                    <tr>
						
                        <td><?php campos("Nivel","nivel","select",array(""=>"Seleccionar",2=>"Administrador",3=>"Enfermera",4=>"Medico",5=>"Laboratorio",6=>"Farmacia",7=>"Secretaria"),0,"",$usu['nivel']);?></td>
                        <td><div id="respuesta"></div></td>
					</tr> 
                    
                    <tr>
                    <td colspan="3"></td>
                    	
                    </tr>
					<tr>
						<td colspan="2"><?php campos("Observación","observacion","textarea",$usu['obs'],"",array("rows"=>5,"cols"=>50,"size"=>30));?></td>
					</tr>
					<tr><td><?php campos("Guardar Usuario","guardar","submit");?></td><td></td></tr>
				</table>
                </form>
			</fieldset>
		</div>

<?php include_once '../piepagina.php';?>