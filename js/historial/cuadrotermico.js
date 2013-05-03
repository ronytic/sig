$(document).ready(function(e) {
    $("#guardarm").click(function(e) {
		e.preventDefault();
    	var idhistorialinterno=$("#idhistorialinterno").val();
		var fechacontrol=$("#fechacontrol").val();
		var horacontrol=$("#horacontrol").val();
		var turno=$("#turno").val();
		var temperatura=$("#temperatura").val();
		var presion=$("#presion").val();
		var talla=$("#talla").val();
		var peso=$("#peso").val();
		var respiracion=$("#respiracion").val();
		var orina=$("#orina").val();
		var deposicion=$("#deposicion").val();
		if(confirm("¿Está seguro de Guardar este Dato? no se podra modificar Posteriormente"))
		{
		$.post("guardarm.php",{'idhistorialinterno':idhistorialinterno,'fechacontrol':fechacontrol,'horacontrol':horacontrol,'turno':turno,'temperatura':temperatura,'presion':presion,'talla':talla,'peso':peso,'respiracion':respiracion,'orina':orina,'deposicion':deposicion},function(){
			$.post("listarm.php",{'id':id},function(data){$("#resultado").html(data)});    
		});
		}
    });
	$.post("listarm.php",{'id':id},function(data){$("#resultado").html(data)});
});