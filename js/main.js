function ajax_calendario(){
    
    var fecha = $("#fecha").val();
    
    $.ajax({
      method: "POST",
      url: "/trabajadores/ajax_calendario/",
      data: { fecha: fecha }
    })
      .done(function( data ) {
        $("#contenido_calendario_ajax").html(data);
      });
}