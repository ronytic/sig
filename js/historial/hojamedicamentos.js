$(document).ready(function(e) {
    $("#guardarm").click(function(e) {
		e.preventDefault();
    	var idhistorialinterno=$("#idhistorialinterno").val();
		var fechacontrol=$("#fechacontrol").val();
		var horacontrol=$("#horacontrol").val();
		var medicamento=$("#medicamento").val();
		if(confirm("¿Está seguro de Guardar este Dato? no se podra modificar Posteriormente"))
		{
		$.post("guardarm.php",{'idhistorialinterno':idhistorialinterno,'fechacontrol':fechacontrol,'horacontrol':horacontrol,'medicamento':medicamento},function(){
			$.post("listarm.php",{'id':id},function(data){$("#resultado").html(data)});    
		});
		}
    });
	$.post("listarm.php",{'id':id},function(data){$("#resultado").html(data)});
});