<?php
include_once '../login/check.php';
$folder="../";
$titulo="Nuevo Horario";
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
						
                        <td><?php campos("Nivel","nivel","select",array(""=>"Seleccionar",3=>"Enfermera",4=>"Medico"),0,"",$usu['nivel'],1);?></td>
                        <td><div id="respuesta"></div></td>
                        <td><?php campos("Turno","turno","select",array("M"=>"Mañana","T"=>"Tarde","N"=>"Noche"),0,"","",1);?></td>
					</tr> 
                 </table>
                 <table class="tablareg">
                    <tr class="titulo"><td>Lunes</td><td>Martes</td><td>Miercoles</td><td>Jueves</td><td>Viernes</td><td>Sábado</td><td>Domingo</td></tr>
                    <tr>
                    
                    <td>
                    	<?php campos("","lunes","select",array("0"=>"No","1"=>"Si"),0,"","",1);?><br />
                        <?php campos("Entrada","entradalunes","time","00:00",0,"","",0);?><br />
                        <?php campos("Salida","salidalunes","time","00:00",0,"","",0);?><br />
                    </td>
                    <td>
                    	<?php campos("","martes","select",array("0"=>"No","1"=>"Si"),0,"","",1);?><br />
                        <?php campos("Entrada","entradamartes","time","00:00",0,"","",0);?><br />
                        <?php campos("Salida","salidamartes","time","00:00",0,"","",0);?><br />
                    </td>
                    <td>
                    	<?php campos("","miercoles","select",array("0"=>"No","1"=>"Si"),0,"","",1);?><br />
                        <?php campos("Entrada","entradamiercoles","time","00:00",0,"","",0);?><br />
                        <?php campos("Salida","salidamiercoles","time","00:00",0,"","",0);?><br />
                    </td>
                    <td>
                    	<?php campos("","jueves","select",array("0"=>"No","1"=>"Si"),0,"","",1);?><br />
                        <?php campos("Entrada","entradajueves","time","00:00",0,"","",0);?><br />
                        <?php campos("Salida","salidajueves","time","00:00",0,"","",0);?><br />
                    </td>
                    <td>
                    	<?php campos("","viernes","select",array("0"=>"No","1"=>"Si"),0,"","",1);?><br />
                        <?php campos("Entrada","entradaviernes","time","00:00",0,"","",0);?><br />
                        <?php campos("Salida","salidaviernes","time","00:00",0,"","",0);?><br />
                    </td>
                    <td>
                    	<?php campos("","sabado","select",array("0"=>"No","1"=>"Si"),0,"","",1);?><br />
                        <?php campos("Entrada","entradasabado","time","00:00",0,"","",0);?><br />
                        <?php campos("Salida","salidasabado","time","00:00",0,"","",0);?><br />
                    </td>
                    <td>
                    	<?php campos("","domingo","select",array("0"=>"No","1"=>"Si"),0,"","",1);?><br />
                        <?php campos("Entrada","entradadomingo","time","00:00",0,"","",0);?><br />
                        <?php campos("Salida","salidadomingo","time","00:00",0,"","",0);?><br />
                    </td>	
                    </tr>
					<tr><td><?php campos("Guardar Horario","guardar","submit");?></td></tr>
				</table>
                </form>
			</fieldset>
		</div>

<?php include_once '../piepagina.php';?>