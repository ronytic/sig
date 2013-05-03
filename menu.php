<?php 
include_once 'class/menu.php';
$menu=new menu;
?>
<div  class="grid_12 corner-bottom" >
	<ul id="css3menu1" class="topmenu">
		<li class="topmenu">
			<a href="<?php echo $folder; ?>index.php" style="height:20px;line-height:20px;">
			<img src="<?php echo $folder; ?>imagenes/menu/home1.png" alt="Inicio"/>INICIO</a>
		</li>
		<?php 
			foreach ($menu->mostrarMenu($nivel) as $key => $value) {
				?>
				<li class="topmenu">
					<a href="<?php echo $folder; ?><?php echo $value['url']; ?>?id=<?php echo $value['idmenu']; ?>&sub=<?php echo $value['submenu'] ?>" style="height:20px;vertical-align:">
					<img src="<?php echo $folder; ?>imagenes/menu/<?php echo $value['imagen'] ?>" alt="<?php echo $value['nombremenu']; ?>"/><?php echo $value['nombremenu']; ?></a>
				</li>
				<?php
			}
		?>
</ul>
</div>
<div class="clear">
</div>

<div  class="grid_12 corner-bottom" id="sesion"></div>
<div class="clear"></div>