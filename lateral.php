<?php
include_once 'class/submenu.php'; 
$submenu=new submenu;
$idmenu=$_SESSION['idmenu'];
?>
<div class="grid_3">
    <?php if ($_SESSION['subm']==1): ?>
    <div class="lateraltitulo corner-top">SubMenu</div>
    <div class="lateralcuerpo corner-bottom">
        <table class="tabla">
            <tr><td>
        <?php 
            foreach ($submenu->mostrarSubMenu($nivel,$idmenu) as $sub): ?>
            <a href="<?php echo $sub['urlsubmenu']; ?>" class="<?php echo $sub['estilo']; ?>"><?php echo $sub['nombresubmenu']; ?></a>
        <?php endforeach;
            
         ?>
            </td></tr>
        </table>
    </div>    
    <?php endif ?>
    <?php if ($lateral==1): ?>
    <div class="lateraltitulo corner-top"><?php echo $titulolateral; ?></div>
    <div class="lateralcuerpo corner-bottom">
        <table class="tabla">
        <?php if(!empty($menulateral)):
            foreach ($menulateral as $key => $value): ?>
            <tr><td><a href="<?php echo $value; ?>" class="botoninfo"><?php echo $key; ?></a></td></tr>
        <?php endforeach;
            endif;
         ?>
        </table>
    </div>    
    <?php endif ?>
    <div class="lateraltitulousuario corner-top">DATOS DEL USUARIO</div>
	<div class="lateralcuerpousuario corner-bottom">
    	<table class="tablasec">
        	<tr><td>Nombre</td><td class="der"><?php echo $us['nombre'];?></td></tr>
            <tr><td>Usuario</td><td class="der"><?php echo $us['usuario'];?></td></tr>
            <tr><td>Hora de Ingreso</td><td class="der"><?php echo $_SESSION['horasesion']?></td></tr>
            <tr><td colspan="2"><a href="<?php echo $folder?>usuarios/cambiarp.php" class="enlace">Cambiar Contraseña</a></td></tr>
            <tr><td colspan="2"><a href="<?php echo $folder?>login/logout.php" class="botonalerta">Salir</a></td></tr>
        </table>
        <?php if($_SESSION['nivel']==1 || $_SESSION['nivel']==2 || $_SESSION['nivel']==7):?>
        <a href="<?php echo $folder?>usuarios/nuevo.php" class="botoninfo">Nuevo Usuario</a>
        <a href="<?php echo $folder?>usuarios/listar.php" class="botoninfo">Listar Usuarios</a>
        <hr />
        <a href="<?php echo $folder?>horario/listar.php" class="botonerror">Listar Horarios</a>
        <a href="<?php echo $folder?>horario/nuevo.php" class="botonerror">Nuevo Horario</a>
        <?php endif;?>
    </div>
    
    
</div>
<div class="grid_9">