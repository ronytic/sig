$(document).ready(function(e) {
	var nivel=$("#nivel").val();
	switch(nivel){
		case "3":{$.post("usuarios.php",{'nivel':nivel,'idcodusuario':$('#ident').val()},respuesta);}break;
		case "4":{$.post("usuarios.php",{'nivel':nivel,'idcodusuario':$('#ident').val()},respuesta);}break;
		default:{
		$.post("usuarios.php",{'nivel':nivel},respuesta);	
		}	
	}
	
	
    $("#nivel").change(function(e) {
		var nivel=$(this).val();
		$.post("usuarios.php",{'nivel':nivel},respuesta);
    });
	function respuesta(data){
		$("#respuesta").html(data);
	}
});