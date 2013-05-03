<?php
include_once '../login/check.php';
$folder="../";
$titulo="Modificar Horario";
$narchivo="horarios";
include_once("../class/".$narchivo.".php");
include_once("../class/medico.php");
include_once("../class/enfermera.php");
$horarios=new horarios;
$medico=new medico;
$enfermera=new enfermera;
$id=$_GET['id'];
$hist=array_shift($horarios->mostrar($id));
include_once '../funciones/funciones.php';
include_once '../cabecerahtml.php';
?>
<script language="javascript" type="text/javascript" src="../js/usuarios/usu.js"></script>
<?php include_once '../cabecera.php';?>
<?php include_once '../lateral.php';?>
    	<div class="contenido">
			<fieldset>
				<legend><?php echo $titulo;?></legend>
                <form action="actualizar.php" method="post">
				<?php campos("","ident","hidden",$hist['idusuario'])?>
                <?php campos("","cod","hidden",$id)?>
				<table class="tablareg">
                    
                    <tr>
						
                        <td><?php campos("Nivel","nivel","select",array(""=>"Seleccionar",3=>"Enfermera",4=>"Medico"),0,"",$hist['nivel'],1);?></td>
                        <td><div id="respuesta"></div></td>
                        <td><?php campos("Turno","turno","select",array("M"=>"Mañana","T"=>"Tarde","N"=>"Noche"),0,"",$hist['turno'],1);?></td>
					</tr> 
                 </table>
                 <table class="tablareg">
                    <tr class="titulo"><td>Lunes</td><td>Martes</td><td>Miercoles</td><td>Jueves</td><td>Viernes</td><td>Sábado</td><td>Domingo</td></tr>
                    <tr>
                    
                    <td>
                    	<?php campos("","lunes","select",array("0"=>"No","1"=>"Si"),0,"",$hist['lunes'],1);?><br />
                        <?php campos("Entrada","entradalunes","time",$hist['entradalunes'],0,"","",0);?><br />
                        <?php campos("Salida","salidalunes","time",$hist['salidalunes'],0,"","",0);?><br />
                    </td>
                    <td>
                    	<?php campos("","martes","select",array("0"=>"No","1"=>"Si"),0,"",$hist['martes'],1);?><br />
                        <?php campos("Entrada","entradamartes","time",$hist['entradamartes'],0,"","",0);?><br />
                        <?php campos("Salida","salidamartes","time",$hist['salidamartes'],0,"","",0);?><br />
                    </td>
                    <td>
                    	<?php campos("","miercoles","select",array("0"=>"No","1"=>"Si"),0,"",$hist['miercoles'],1);?><br />
                        <?php campos("Entrada","entradamiercoles","time",$hist['entradamiercoles'],0,"","",0);?><br />
                        <?php campos("Salida","salidamiercoles","time",$hist['salidamiercoles'],0,"","",0);?><br />
                    </td>
                    <td>
                    	<?php campos("","jueves","select",array("0"=>"No","1"=>"Si"),0,"",$hist['jueves'],1);?><br />
                        <?php campos("Entrada","entradajueves","time",$hist['entradajueves'],0,"","",0);?><br />
                        <?php campos("Salida","salidajueves","time",$hist['salidajueves'],0,"","",0);?><br />
                    </td>
                    <td>
                    	<?php campos("","viernes","select",array("0"=>"No","1"=>"Si"),0,"",$hist['viernes'],1);?><br />
                        <?php campos("Entrada","entradaviernes","time",$hist['entradaviernes'],0,"","",0);?><br />
                        <?php campos("Salida","salidaviernes","time",$hist['salidaviernes'],0,"","",0);?><br />
                    </td>
                    <td>
                    	<?php campos("","sabado","select",array("0"=>"No","1"=>"Si"),0,"",$hist['sabado'],1);?><br />
                        <?php campos("Entrada","entradasabado","time",$hist['entradasabado'],0,"","",0);?><br />
                        <?php campos("Salida","salidasabado","time",$hist['salidasabado'],0,"","",0);?><br />
                    </td>
                    <td>
                    	<?php campos("","domingo","select",array("0"=>"No","1"=>"Si"),0,"",$hist['domingo'],1);?><br />
                        <?php campos("Entrada","entradadomingo","time",$hist['entradadomingo'],0,"","",0);?><br />
                        <?php campos("Salida","salidadomingo","time",$hist['salidadomingo'],0,"","",0);?><br />
                    </td>	
                    </tr>
					<tr><td><?php campos("Guardar Horario","guardar","submit");?></td></tr>
				</table>
                </form>
			</fieldset>
		</div>

<?php include_once '../piepagina.php';?>