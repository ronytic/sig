<?php
include_once("../login/check.php");
$titulo="Listado de Usuarios";
$folder="../";
include_once("../funciones/funciones.php");
include_once "../cabecerahtml.php";
?>
<?php include_once "../cabecera.php";?>
<script language="javascript" type="text/javascript" src="../js/busquedas/busquedas.js"></script>
<?php include_once "../lateral.php";?>
	<div class="contenido">
        	<fieldset>
        		<legend><?php echo $titulo;?> - Criterio de Busqueda</legend>
            <form id="busqueda" action="busqueda.php" method="post" >
                <table class="tablabus">
                    <tr>
                    	<td><?php campos("Usuario","usuario","text","",1,array("size"=>30),"",1);?></td>
                        <td><?php campos("Nombre","nombre","text","",1,array("size"=>30),"",1);?></td>
                        <td><?php campos("Email","email","text","",0,array("size"=>30),"",1);?></td>
                    </tr>
                    <tr>
						<td><?php campos("Nivel","nivel","select",array(""=>"Seleccionar",2=>"Administrador",3=>"Enfermera",4=>"Medico",5=>"Laboratorio",6=>"Farmacia",7=>"Secretaria"),0,"","",1);?></td>
                        <td><?php campos("Buscar","enviar","submit","",0,array("size"=>15),"",1);?></td>
                    </tr>
                </table>
            </form>
            </fieldset>
             <div id="respuesta"></div>
	</div>
<?php include_once "../piepagina.php";?>