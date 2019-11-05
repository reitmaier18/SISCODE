//funcion que mide el tiempo de inactividad de un usuario en el sistema para poder sacarlo del mismo, el intervalo de tiempo es de 10min
var tiempo = 0;

window.onload=function(){
    
    var intervalo_tiempo = setInterval(incremento_tiempo, 60000); // 1 minute

    //alert("hola aqui esta el temporizador");
    $(this).mousemove(function (e) { 
     tiempo = 0; 
    }); 
    $(this).keypress(function (e) { 
     tiempo = 0; 
    }); 

}
function incremento_tiempo() { 
    tiempo = tiempo + 1; 
    //console.log(tiempo);
    if (tiempo > 10) { // 20 minutes 
        window.location="../Controlador/cerrar_session_contrl.php"; 
    } 
}
/*
* función para validar todos los campos vacios del formulario
*/
function val_formulario(formulario){
    var dato = $(formulario).serializeArray();
    for (index = 0; index < dato.length; ++index) { 
        if (dato[index].value.length == 0) { 
            $("#mensaje").modal("show");
            $("#mensaje_text").html('Es necesario que llene todo los campos del formulario');
        } 
    }
}

/*
* función para gestionar solicitudes
*/
function gestionar_solicitud(){
    $("table tbody tr").click(function() {
        var id = $(this).find("td:eq(1)").text();
        var expediente = $(this).find("td:eq(5)").text();
        var pieza = $(this).find("td:eq(6)").text();
        var ubicacion = $(this).find("td:eq(7)").text();
        $.ajax({
            url:'./../Controlador/gestionar_solicitud_contrl.php?n='+id+'&expediente='+expediente+'&pieza='+pieza+'&ubicacion='+ubicacion,
        }).done(function(respuesta){
            if (respuesta==1) {
                $("#mensaje").modal("show");
                $("#mensaje_text").html('Solicitud actualizada');
                list_solicitud();
            }else{
                $("#mensaje").modal("show");
                $("#mensaje_text").html('Surgió un error en la acción');
                list_solicitud();
            }
            
        }); 
    });   
}

/*
* función para cancelar solicitudes
*/
function cancelar_solicitud(){
    $("table tbody tr").click(function() {
        var id = $(this).find("td:eq(1)").text();
        var expediente = $(this).find("td:eq(5)").text();
        var pieza = $(this).find("td:eq(6)").text();
        var ubicacion = $(this).find("td:eq(7)").text();
        $.ajax({
            url:'./../Controlador/cancelar_solicitud_contrl.php?n='+id+'&expediente='+expediente+'&pieza='+pieza+'&ubicacion='+ubicacion,
        }).done(function(respuesta){
            
            if (respuesta==1) {
                $("#mensaje").modal("show");
                $("#mensaje_text").html('Solicitud cancelada');
                list_solicitud();
            }else{
                $("#mensaje").modal("show");
                $("#mensaje_text").html('Surgió un error en la acción');
                list_solicitud();
            }

        });       
    });      
}

//Buscador universal
function onKeyUp(event,param) {
    var keycode = event.keyCode;
    if(keycode == '13'){
      if (param==1) {
        list_log();
      }
      if (param==2) {
        enviar_form_consul_expe();
      }
      if (param==3) {
        search_expe_list();
      }
    }
}

//validación de solo numeros
$(function(){
    $('.validanumericos').keypress(function(e) {
    if(isNaN(this.value + String.fromCharCode(e.charCode))){
        $("#mensaje").modal("show");
        $("#mensaje_text").html('Dato invalido para este input');   
        return false;
    }    
  }).on("cut copy paste",function(e){
    e.preventDefault();
  });
});

//validacion de solo letras
$(function(){
    $('.validaletras').keypress(function(e) {
    if(this.value + String.fromCharCode(e.charCode)>=0) {
        $("#mensaje").modal("show");
        $("#mensaje_text").html('Dato invalido para este input');   
        return false;
    }
  }).on("cut copy paste",function(e){
    e.preventDefault();
  });
});








