function ajax_calendario(){
    
    var fecha = $("#fecha").val();
    $(".ajax_calendario").toggleClass('active');
    
    $.ajax({
      method: "POST",
      url: "/trabajadores/ajax_calendario/",
      data: { fecha: fecha, idusuario: idusuario }
    })
      .done(function( data ) {
        $("#contenido_calendario_ajax").html(data);
        $(".boton-guardar-calendario").fadeIn();
        $(".ajax_calendario").toggleClass('active');
      });
}

function ajax_guardar_calendario(){
    
    formData    = $('#form_calendario').serialize();
    $("#form_calendario .glyphicon-refresh").toggleClass('active');
    
    $.ajax({
      method: "POST",
      url: "/trabajadores/ajax_guardar_calendario/",
      data: formData
    })
      .done(function( data ) {
        $("#form_calendario .glyphicon-refresh").toggleClass('active');
      });
    
}

function ajax_liquidacion(){
    
    var fecha = $("#fecha").val();
    $(".ajax_liquidacion").toggleClass('active');
    
    $.ajax({
      method: "POST",
      url: "/trabajadores/ajax_liquidacion/",
      data: { fecha: fecha, idusuario: idusuario }
    })
      .done(function( data ) {
        $("#contenido_liquidacion_ajax").html(data);
        $(".ajax_liquidacion").toggleClass('active');
      });
}
