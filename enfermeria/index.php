<?php 
include_once '../login/check.php';
$_SESSION['idmenu']=$_GET['id'];
$_SESSION['subm']=$_GET['sub'];
include_once '../class/submenu.php';
$submenu1=new submenu;
$sb1=array_shift($submenu1->mostrarSubMenu($_SESSION['nivel'],$_GET['id']));
header("Location:enfermeria/".$sb1['urlsubmenu']);
 ?>