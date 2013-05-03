$(document).ready(function(e) {
	var preciototal=0;
    $("select[name=lab]").change(function(e) {
		var valor=$(this).val();
     	$.post("busquedaanalisis.php",{'Valor':valor},respuestaanalisis);
    });
	function respuestaanalisis(data){
		$("div#divtipoanalisis").html(data);
	}
	$("div#divtipoanalisis").on("click","#anadir",anadiranalisis);
	var i=0;
	function anadiranalisis(){
		i++;
		var valoranalisis=$("select[name=analisis]").val();
		var precio=parseFloat($("select[name=analisis]").find("option:selected").attr("rel"));
		var nombre=$("select[name=analisis]").find("option:selected").html();
		var contenido="<tr><td><input type=\"hidden\" name=\"analisis["+i+"][idanalisis]\" value=\""+valoranalisis+"\">"+nombre+"</td><td>"+precio+"</td><td><a href=\"#\" rel=\""+precio+"\" class=\"eliminar\">X</a></td></td></tr>";
		if(valoranalisis!=null){
			preciototal+=precio;
		//"<a href=\""+valor+"\"></a>" valor
			$("#lista table tr.cabecera").after(contenido);
			$("#prec").val(preciototal);
		}else{
			alert("seleccione un analisis");	
		}
	}
	$("#lista").on("click",".eliminar",eliminar);
	function eliminar(e){
		e.preventDefault();
		e.stopPropagation();
		$(this).parent().parent().empty();
		var precio=$(this).attr("rel");
		preciototal-=precio;
		$("#prec").val(preciototal);
		return false;
	}
}); 