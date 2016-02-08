function ajax_calendario(){
    
    var fecha = $("#fecha").val();
    
    $.ajax({
      method: "POST",
      url: "/trabajadores/ajax_calendario/",
      data: { fecha: fecha, idusuario: idusuario }
    })
      .done(function( data ) {
        $("#contenido_calendario_ajax").html(data);
      });
}

function ajax_guardar_calendario(){
    
    formData    = $('#form_calendario').serialize();
    
    $.ajax({
      method: "POST",
      url: "/trabajadores/ajax_guardar_calendario/",
      data: formData
    })
      .done(function( data ) {
        
      });
    
}