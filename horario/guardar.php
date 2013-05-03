<?php
include_once("../login/check.php");
if(!empty($_POST)):
$narchivo="horarios";
include_once("../class/".$narchivo.".php");
${$narchivo}=new $narchivo;
extract($_POST);
$valores=array("nivel"=>"'$nivel'",
			"idusuario"=>"'$idusuario'",
			"turno"=>"'$turno'",
			"lunes"=>"'$lunes'",
			"entradalunes"=>"'$entradalunes'",
			"salidalunes"=>"'$salidalunes'",
			"martes"=>"'$martes'",
			"entradamartes"=>"'$entradamartes'",
			"salidamartes"=>"'$salidamartes'",
			"miercoles"=>"'$miercoles'",
			"entradamiercoles"=>"'$entradamiercoles'",
			"salidamiercoles"=>"'$salidamiercoles'",
			"jueves"=>"'$jueves'",
			"entradajueves"=>"'$entradajueves'",
			"salidajueves"=>"'$salidajueves'",
			"viernes"=>"'$viernes'",
			"entradaviernes"=>"'$entradaviernes'",
			"salidaviernes"=>"'$salidaviernes'",
			"sabado"=>"'$sabado'",
			"entradasabado"=>"'$entradasabado'",
			"salidasabado"=>"'$salidasabado'",
			"domingo"=>"'$domingo'",
			"entradadomingo"=>"'$entradadomingo'",
			"salidadomingo"=>"'$salidadomingo'",
			);

${$narchivo}->insertar($valores,1);
$codinsercion=$cod;
$mensaje[]="EL USUARIO SE GUARDO CORRECTAMENTE";
$titulo="Confirmación de Guardado";
$folder="../";
include_once '../mensajeresultado.php';
endif;?>