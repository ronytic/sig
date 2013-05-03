<?php 
include_once 'class/usuarios.php';
include_once 'funciones/funciones.php';
$codusuario=$_SESSION['idusuario'];
$nivel=$_SESSION['nivel'];
$usuarios=new usuarios;
$us=array_shift($usuarios->mostrar($_SESSION['idusuario']));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php php_start();?>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php php_start();?>" />
<title><?php echo $titulo;?> | SIGHELP</title>
<link href="<?php echo $folder;?>css/960/960.css" type="text/css" rel="stylesheet" media="screen">
<link href="<?php echo $folder;?>css/core.css" type="text/css" rel="stylesheet" media="screen">
<link href="<?php echo $folder;?>css/menu.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo $folder;?>css/chosen.css" type="text/css" rel="stylesheet"/>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $folder; ?>imagenes/logo.ico" />
<style>._css3m{display:none}</style>
<script language="javascript" type="text/javascript" src="<?php echo $folder;?>js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $folder;?>js/jquery.form.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $folder;?>js/jquery.chosen.min.js"></script>
<script language="javascript" type="text/javascript">
	$(document).ready(function(){
		$(".seleccionar").chosen();	
	});
	$(document).close(function(){
		alert("asd");	
	});
	/*$( window ).bind( 'beforeunload', function() {
    	return false;
	} );*/
//$(window).unload( function () { alert("Bye now!"); } );
</script>