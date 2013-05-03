$(document).ready(function(e) {
    $("#guardarm").click(function(e) {
		e.preventDefault();
    	var idhistorialinterno=$("#idhistorialinterno").val();
		var fechaevolucion=$("#fechaevolucion").val();
		var horaevolucion=$("#horaevolucion").val();
		var notaevolucion=$("#notaevolucion").val();
		if(confirm("¿Está seguro de Guardar este Dato? no se podra modificar Posteriormente"))
		{
		$.post("guardarm.php",{'idhistorialinterno':idhistorialinterno,'fechaevolucion':fechaevolucion,'horaevolucion':horaevolucion,'notaevolucion':notaevolucion},function(){
			$.post("listarm.php",{'id':id},function(data){$("#resultado").html(data)});    
		});
		}
    });
	$.post("listarm.php",{'id':id},function(data){$("#resultado").html(data)});
});