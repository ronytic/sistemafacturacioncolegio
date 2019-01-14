$(document).ready(function() {
  $(".radiolistadocurso").click(function(event) {
    var CodCurso=$(this).val();
    var CodAlumno=$(this).attr('rel');
    $.post(folder+"listar/alumnos.php",{'CodCurso':CodCurso,"listaalumno":1,'CodAlumno':CodAlumno},function(data){
      $("#respuestacurso").html(data);

      if($(".radiolistadoalumno:checked").val()==undefined){
        $(".radiolistadoalumno:eq(0)").click();
      }else{
        $(".radiolistadoalumno:checked").click();
      }

    });
  });
if($(".radiolistadocurso:checked").val()==undefined){
  $(".radiolistadocurso:eq(0)").click();
}else{
  $(".radiolistadocurso:checked").click();
}


  $(document).on("click",".radiolistadoalumno",function(event) {

    var CodAlumno=$(this).val();
    //alert(CodAlumno);
    var CodCurso=$(".radiolistadocurso:checked").val();
    $.post(folder+archivodestinoalumno,{'CodCurso':CodCurso,"CodAlumno":CodAlumno},function(data){
      $("#respuestaalumno").html(data);
    });
  });
});
