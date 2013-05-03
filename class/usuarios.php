<?php
include_once("bd.php");
class usuarios extends bd{
	var $tabla="usuarios";
	function loginUsuarios($Usuario,$Password){
		$this->campos=array("count(*) as Can,idusuarios,nivel,codusuario");	
		return $this->getRecords("usuario='$Usuario' and password=MD5('$Password') and activo=1");
	}
}
?>