$(document).ready(function(e) {
    $(".comprado,.observacion,.fechadecompra").change(function(e) {
		var id=$(this).attr("rel");
        var comprado=$(".comprado[rel="+id+"]").attr("checked");
		var observacion=$(".observacion[rel="+id+"]").val();
		var fechadecompra=$(".fechadecompra[rel="+id+"]").val();
		
		$.post("guardar.php",{"idrecetamedica":id,"comprado":comprado,"observacion":observacion,"fechadecompra":fechadecompra});
    });
	
});