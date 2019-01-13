$(document).ready(function() {
  $(".radiolistadocurso").click(function(event) {
    var CodCurso=$(this).val();
    $.post(folder+"listar/alumnos.php",{'CodCurso':CodCurso,"listaalumno":1},function(data){
      $("#respuestacurso").html(data);
      $(".radiolistadoalumno:eq(0)").click();
    });
  });
  $(".radiolistadocurso:eq(0)").click();


  $(document).on("click",".radiolistadoalumno",function(event) {

    var CodAlumno=$(this).val();
    //alert(CodAlumno);
    var CodCurso=$(".radiolistadocurso:checked").val();
    $.post(folder+archivodestinoalumno,{'CodCurso':CodCurso,"CodAlumno":CodAlumno},function(data){
      $("#respuestaalumno").html(data);
    });
  });
});
