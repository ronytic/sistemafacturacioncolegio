// JavaScript Document
$(document).ready(function(e) {
	var MontoGeneral;
	var MontoBeca;
   /*$('#FechaNac').datepicker({altField: "#FechaNac", maxDate:"0 D",changeMonth: true,changeYear: true,yearRange:"c-100:c+10",dateFormat: 'dd-mm-yy'});
   $('#FechaRetiro').datepicker({altField: "#FechaRetiro",changeMonth: true,changeYear: true,dateFormat: 'dd-mm-yy'})*/
   sacarMonto();
	$("#curso").change(function(e) {
		sacarMonto();
    });

	function sacarMonto(){
		var valor=$("#curso").val();
        $.post("../sacarmonto.php",{'CodCurso':valor},function(data){
			$('#MontoPagar').val(data)
			MontoGeneral=parseFloat(data);
			MontoBeca=$("#MontoBeca").val();
			$('#MontoPagar').val(MontoGeneral-(MontoBeca));
			PorcentajeBeca=isNaN((MontoBeca*100/MontoGeneral))?0:(MontoBeca*100/MontoGeneral);
			$("#PorcentajeBeca").val(PorcentajeBeca.toFixed(2));
		});
	}

	if($('#MontoPagar').val()!="0"){
		MontoGeneral=$('#MontoPagar').val();
		MontoBeca=$("#MontoBeca").val();
		$('#MontoPagar').val(MontoGeneral-($("#MontoBeca").val()));
		$("#PorcentajeBeca").val((MontoBeca*100/MontoGeneral).toFixed(2));
	}

	$("#MontoBeca").keyup(function(e) {
		var valor=$(this).val();
		if(valor==""){valor=0;}
		valor=parseFloat(valor);
		var PorcentajeBeca=0;
		valor=valor.toFixed(2);
			PorcentajeBeca=(valor/MontoGeneral)*100;
			$('#MontoPagar').val(MontoGeneral-(valor));
		$("#PorcentajeBeca").val(PorcentajeBeca.toFixed(2));
    });

	MontoBeca=$("#MontoBeca").val();

	$("#PorcentajeBeca").keyup(function(e) {
		var valor=$(this).val();
		var MontoBeca=0;

			MontoBeca=(valor*MontoGeneral)/100;
			$('#MontoPagar').val(MontoGeneral-(MontoBeca.toFixed(2)));
		$("#MontoBeca").val(MontoBeca.toFixed(2));

    });
});
