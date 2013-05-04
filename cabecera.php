</head>
<body onUnload="" >

<?php //print_r($_SESSION);?>
<div class="container_12" id="contenedor"> 
	<div  class="grid_12">
    	<div  id="cabecera" class="corner-all">
        <!--<img src="<?php echo $folder;?>imagenes/icono_medico.png">
        	<h1>SISTEMA DE ASISTENCIA MÉDICA</h1>
            <h1>CLINICA QULLASIÑAUTA</h1>-->
            <img src="<?php echo $folder;?>imagenes/portada<?php echo rand(1,3)?>.jpg">
        </div>
    </div>
	<div class="clear"></div>
    <?php include($folder."menu.php");?>
