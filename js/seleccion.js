$(document).ready(function(e) {
	var codespe=$("#idespecialidad").val();
	   	$.post("medico.php",{'idespecialidad':codespe},function(data){
			$("#idmedico").html(data).trigger("liszt:updated");
	});
    $("#idespecialidad").change(function(e) {
		
       	var codespe=$(this).val();
	   	$.post("medico.php",{'idespecialidad':codespe},function(data){
			$("#idmedico").html(data).trigger("liszt:updated");
		});
    });
});