$(document).ready(function(e) {
    $("#guardarm").click(function(e) {
		e.preventDefault();
    	
		var idmedicamento=$("#idmedicamento").val();
		var cantidadmedicamento=$("#cantidadmedicamento").val();
		var cadamedicamento=$("#cadamedicamento").val();
		var durantemedicamento=$("#durantemedicamento").val();
		if(confirm("¿Está seguro de Guardar este Dato?"))
		{
		$.post("guardarm.php",{'idmedicamento':idmedicamento,'idhistorialexterno':id,'cantidad':cantidadmedicamento,'cada':cadamedicamento,'durante':durantemedicamento},function(){
			$.post("listarm.php",{'id':id},function(data){$("#resultado").html(data)});    
		});
		}
    });
	$.post("listarm.php",{'id':id},function(data){$("#resultado").html(data)});
});