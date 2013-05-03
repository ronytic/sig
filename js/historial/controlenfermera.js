$(document).ready(function(e) {
    $("#guardarm").click(function(e) {
		e.preventDefault();
    	var idhistorialinterno=$("#idhistorialinterno").val();
		var fechacontrol=$("#fechacontrol").val();
		var horacontrol=$("#horacontrol").val();
		var medicacion=$("#medicacion").val();
		var vomito=$("#vomito").val();
		var orina=$("#orina").val();
		var depost=$("#depost").val();
		var descripcion=$("#descripcion").val();
		if(confirm("¿Está seguro de Guardar este Dato? no se podra modificar Posteriormente"))
		{
		$.post("guardarm.php",{'idhistorialinterno':idhistorialinterno,'fechacontrol':fechacontrol,'horacontrol':horacontrol,'medicacion':medicacion,'vomito':vomito,'orina':orina,'depost':depost,'descripcion':descripcion},function(){
			$.post("listarm.php",{'id':id},function(data){$("#resultado").html(data)});    
		});
		}
    });
	$.post("listarm.php",{'id':id},function(data){$("#resultado").html(data)});
});