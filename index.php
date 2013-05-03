<?php
include_once("login/check.php");
$titulo="Inicio";
$_SESSION['idmenu']=0;


$_SESSION['subm']=0;

?>

<?php include_once("cabecerahtml.php"); ?>

<?php include_once("cabecera.php");?>
<?php include_once("lateral.php");?>
	<div class="contenido">
    	<div class="grid_5">
    	<fieldset>
        	<img src="imagenes/hospitales.jpg"  width="600"/>
        </fieldset>
        </div>
    	<div class="clear"></div>
		<div class="grid_4 omega">
			<fieldset class="justificar">
            	<div class="titulo">Visión</div><br />
                    Formar una institución de alto nivel y prestigio a disposición de todos los pacientes un servicio médico integral, dando las mejores condiciones de atención con tecnología avanzada para un óptimo cuidado de la salud y bienestar social.
			</fieldset>
		</div>
        <div class="grid_4 omega">
			<fieldset class="justificar">
            	<div class="titulo">Misión</div><br />
					Atención integral de calidad, calidez y eficiencia, sin mirar la clase social, acogiendo a todos con eficiencia y humanidad. 
			</fieldset>
		</div>
	</div>
<?php include_once("piepagina.php");?>
