$(document).on("ready",function(){
    $("input").attr("autocomplete","off");
    //$('#formulario').disableAutoFill();
    var TipoBusqueda="";
	var Registro=0;
    var CodAlumno=0;
   $(document).on("click",".buscar",function(e){
       e.preventDefault();
       TipoBusqueda=$(this).attr("rel");
        if(TipoBusqueda=="Registro"){
            Registro=$(this).attr("rel-id");
        }
        $('.modal').modal('show');
   }).on("change","#selectcurso",function(){
       var CodCurso=$("#selectcurso").val();
       $.post("../../listar/alumnos.php",{CodCurso:CodCurso},function(datos){
          $("#selectalumno").html("").html(datos);
          $(".listadoalumnos").select2("destroy");
          $(".listadoalumnos").select2(); 
       });
       
   }).on("change",".listadoalumnos",function(){
       CodAlumno=$(this).val();
   });
    
    $("#seleccionar").click(function(e) {
		e.preventDefault();
		switch(TipoBusqueda){
			case "BusquedaNit":{
				
				$.post("sacarnit.php",{'CodAlumno':CodAlumno},function(data){
					$("input[name=CodAlumno]").val(CodAlumno);
					$("input[name=FacturaAlumno]").val(data.Alumno);
					$("input[name=Nit]").val(data.Nit);
					$("input[name=NombreFactura]").val(data.FacturaA);

					$('.modal').modal('hide');
					//alert(CodAlumno);
					Registro=1;
					//alert(Registro);
					TipoBusqueda="Registro";
					$("#seleccionar").click();
				},"json");
			}break;
            case "Registro":{
                $.post("sacarregistro.php",{CodAlumno:CodAlumno,Registro:Registro},function(datos){
                    //alert(datos.Cuota);
                    
                    $(".cuotas[rel="+Registro+"]").html(datos.Cuota);
                    
                    $("input[name='a["+Registro+"][Nombre]']").val(datos.Alumno);
					$("input[name='a["+Registro+"][CodAlumno]']").val(datos.CodAlumno);
                    $("input[name='a["+Registro+"][MontoCuota]']").val((datos.MontoCuota));
                    $('.modal').modal('hide');
                    //$(".MostrarCuota").select2("destroy").select2(); 
                   // $('#formulario').disableAutoFill();
                },"json");
            }break;
        }
    });
	//alert("Cargo");
	$(document).on("click","#guardar",function(e){
		
		var Cancelado=parseFloat($(".Cancelado").val());
		if(Cancelado>0){
			
		}else{
			alert("El Monto Cancelado debe ser Mayor a 0");
			$(".Cancelado").select();
			e.preventDefault();	
		}
		
	});
    $(document).on("change",".opcionCuota",function(){
        var fi=$(this).attr("rel");
        var cantvalores=$(".opcionCuota[rel="+fi+"]:checked").length;
                
        var MontoCuota=($("input.MontoCuota[rel="+fi+"]").val());
        var Total=MontoCuota*cantvalores;
    
        $("input.Total[rel="+fi+"]").val(Total.toFixed(2));
        sumarTodo();
        
    });
    var f=0;
    $(".aumentar").click(function(e){f++;
        e.preventDefault();
        $.post("fila.php",{l:f},function(datos){
            $("#senal").before(datos);
        });
    }).click();
    $(document).on("change keyup",".Cancelado",function(){
        var TotalBs=parseFloat($(".TotalBs").val());
        var Cancelado=parseFloat($(this).val());
        var Cambio=Cancelado-TotalBs;
        $(".MontoDevuelto").val(Cambio.toFixed(2));
    }).on("focus",".Cancelado",function(){
        $(this).select();
    });
    $(document).on("click",".eliminar",function(){
       $(this).parent().parent().remove();
        sumarTodo();
    });
    function sumarTodo(){
        var suma=0;
        $(".Total").each(function(i,e){
            
            suma=suma+parseFloat($(this).val());
            
        });
        $(".TotalBs").val(suma.toFixed(2));
    }
});