function ajax_calendario(){
    
    var fecha = $("#fecha").val();
    $(".ajax_calendario").toggleClass('active');
    
    $("#fecha_base").val(fecha);
    
    $.ajax({
      method: "POST",
      url: "/trabajadores/ajax_calendario/",
      data: { fecha: fecha, idusuario: idusuario }
    })
      .done(function( data ) {
        $("#contenido_calendario_ajax").html(data);
        $(".boton-guardar-calendario").fadeIn();
        $(".ajax_calendario").toggleClass('active');
        
        $("#contenido_calendario_ajax li li").click(function(){
       
            var checkBoxes = $(this).find('input[type=checkbox]');
            checkBoxes.prop("checked", !checkBoxes.prop("checked"));
        });
    
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

function ajax_guardar_bonos(){
    
    var bonos = $("#form_bonos").serialize();
    $(".boton-guardar-bonos").toggleClass('active');
    
    $.ajax({
      method: "POST",
      url: "/trabajadores/ajax_guardar_bonos/",
      data: { bonos: bonos, idusuario: idusuario }
    })
      .done(function( data ) {
        $("#contenido_liquidacion_ajax").html(data);
        $(".boton-guardar-bonos").toggleClass('active');
      });
}

function dar_formato(num){  
    var cadena = "";
    var aux;  
    var cont = 1,m,k;  
    if(num<0) aux=1; else aux=0;  
    num=num.toString();  
    for(m=num.length-1; m>=0; m--){  
        cadena = num.charAt(m) + cadena;  
        if(cont%3 == 0 && m >aux)  cadena = "." + cadena; else cadena = cadena;  
        if(cont== 3) cont = 1; else cont++;  
    }
    cadena = cadena.replace(/.,/,",");
    return cadena;
}

function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

$(document).ready(function(e) {
    
    $("#contenido_calendario_ajax li").click(function(){
        console.log('1');
        var checkBoxes = $(this).find('input[type=checkbox]');
        checkBoxes.prop("checked", !checkBoxes.prop("checked"));
    });
    
    
    $("#btn_agregar_bono").click(function(){
        
        var html = '<p><br/>&nbsp;</p><div class="col-sm-8">';
            html += '                        <div class="form-group">';
            html += '                            <label for="concepto">Concepto</label>';
            html += '                            <input type="text" class="form-control" id="concepto" placeholder="Cocepto" name="concepto[]">';
            html += '                        </div>';
            html += '                        <div class="form-group">';
            html += '                            <label for="monto">Monto</label>';
            html += '                            <input type="text" class="form-control" id="monto" placeholder="Monto" name="monto">';
            html += '                        </div>';
            html += '                    </div>';
        
        $("#bonos").append(html);
    });
});