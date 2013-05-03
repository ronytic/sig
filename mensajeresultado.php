<?php
include_once $folder.'cabecerahtml.php';
if($archivonuevo=="" && empty($archivonuevo)){
	$archivonuevo="nuevo.php";
}
if($archivovolver=="" && empty($archivovolver)){
	$archivovolver="modificar.php";
}
if($archivolistar=="" && empty($archivolistar)){
	$archivolistar="listar.php";
}

?>
<?php include_once $folder.'cabecera.php';?>
<?php include_once($folder."lateral.php");?>
<div class="contenido">
    <div class="prefix_2 grid_4 suffix_3">
			<fieldset>
            	<legend>Mensaje de Confirmación</legend>
                <?php
				if(!empty($mensaje)){
	                foreach($mensaje as $m){
						?>
        	            <div class="mensaje"><?php echo $m?></div>
            	        <?php	
					}
				}
				?>
                
                <hr />
                <?php if($nuevo==0){?>
                <a href="<?php echo $archivonuevo;?>" class="botoncorrecto" >Nuevo Registro</a>
                <?php }?>
                <?php if($codinsercion!=""){?>
                <a href="<?php echo $archivovolver;?>?id=<?php echo $codinsercion;?>" class="botoninfo" >Modificar Registro</a>
                <?php }?>
                <?php if($listar==0){?>
                <a href="<?php echo $archivolistar;?>" class="botonerror">Listar Registros</a>
                <?php }?>
         	</fieldset>
	</div>
</div> 
<?php include_once($folder."piepagina.php");?>