function mostrar_mod_user_a() {
    document.getElementById('inicio').style.display="none";
    document.getElementById('user_a').style.display="block";
    document.getElementById('user_b').style.display="none";
    document.getElementById('expediente_a').style.display="none";
    document.getElementById('expediente_b').style.display="none";
    document.getElementById('expediente_c').style.display="none";
    //alert("Modulo de registro de usuario");
    //document.getElementsByClassName('inicio').style.display="block";
}

function mostrar_mod_user_b() {
    document.getElementById('inicio').style.display="none";
    document.getElementById('user_b').style.display="block";
    document.getElementById('user_a').style.display="none";
    document.getElementById('expediente_a').style.display="none";
    document.getElementById('expediente_b').style.display="none";
    document.getElementById('expediente_c').style.display="none";
    //alert("Modulo de actualización de usuario");
    //document.getElementsByClassName('inicio').style.display="block";
}

//Función para mostrar la pantalla de inicio
function mostrar_mod_inicio() {
    document.getElementById('inicio').style.display="block";
    document.getElementById('user_a').style.display="none";
    document.getElementById('user_b').style.display="none";
    document.getElementById('expediente_a').style.display="none";
    document.getElementById('expediente_b').style.display="none";
    document.getElementById('expediente_c').style.display="none";
    //document.getElementsByClassName('inicio').style.display="block";
}

function mostrar_mod_expediente_a() {
    document.getElementById('inicio').style.display="none";
    document.getElementById('user_a').style.display="none";
    document.getElementById('user_b').style.display="none";
    document.getElementById('expediente_a').style.display="block";
    document.getElementById('expediente_b').style.display="none";
    document.getElementById('expediente_c').style.display="none";
    //document.getElementsByClassName('inicio').style.display="block";
    /*$.ajax({
        url:'./../Controlador/listar_tribunales_contrl.php',
        type:'POST',
        
    }).done(function(respuesta){
        $('#tribunal select').html(respuesta).fadeIn();           
    });*/
    
}

function listar_tribunales(){
    var dato = document.getElementById('estado').value;
    $.ajax({
        url:'./../Controlador/listar_tribunales_contrl.php',
        type:'POST',
        data: "envio= "+dato,
    }).done(function(respuesta){
        $('#tribunal select').html(respuesta).fadeIn();           
    });
    document.getElementById('oculto').style.display="block";
}

function listar_tribunales_update(){
    var dato = document.getElementById('estado_update').value;
    $.ajax({
        url:'./../Controlador/listar_tribunales_contrl.php',
        type:'POST',
        data: "envio= "+dato,
    }).done(function(respuesta){
        $('#tribunal_update').html(respuesta).fadeIn();           
    });
}

function añadir_tribunales(){
    var dato = $('#form_añadir_tribunal').serialize();
    //alert(dato);
    $.ajax({
        url:'./../Controlador/añadir_tribunales_contrl.php',
        type:'POST',
        data: dato,
    }).done(function(respuesta){
        alert(respuesta);
        //alert(r);
        //window.location.reload();    
    });
}

function mostrar_mod_expediente_b() {
    document.getElementById('inicio').style.display="none";
    document.getElementById('user_a').style.display="none";
    document.getElementById('user_b').style.display="none";
    document.getElementById('expediente_a').style.display="none";
    document.getElementById('expediente_b').style.display="block";
    document.getElementById('expediente_c').style.display="none";
    //document.getElementsByClassName('inicio').style.display="block";
}

function mostrar_mod_expediente_c() {
    document.getElementById('inicio').style.display="none";
    document.getElementById('user_a').style.display="none";
    document.getElementById('user_b').style.display="none";
    document.getElementById('expediente_a').style.display="none";
    document.getElementById('expediente_b').style.display="none";
    document.getElementById('expediente_c').style.display="block";
    //document.getElementsByClassName('inicio').style.display="block";
   
    
}

//Jquery
/*
* función para enviar datos del usuario para ser registrados
*/
function enviar_form_reg_user() {
    var dato = $('#form_reg_user').serialize();
    //alert(dato);
    $.ajax({
        url:'./../Controlador/crear_usuario_contrl.php',
        type:'POST',
        data: dato,
    }).done(function(respuesta){
        var r = eval(respuesta);
        //alert(respuesta);
        alert(r);
        window.location.reload();      
    });

}

/*
* función para enviar datos del usuario para ser buscado
*/
function enviar_form_act_user() {
    var dato = $('#form_actua_user').serialize();
    //validarr que el campo cedula no este vacio//////////URGENTE
    var cedula = document.getElementById('g').value;
    if (cedula=='') {
        $("#mensaje").modal("show");
        $("#mensaje_text").html('Ingrese cedula');
    }
    //alert(dato);
    $.ajax({
        url:'./../Controlador/buscar_usuario_contrl.php',
        type:'POST',
        data: dato,
    }).done(function(respuesta){
        if (respuesta==0) {
            $("#mensaje").modal("show");
            $("#mensaje_text").html('Usuario no registrado');
            //$("#mensaje_text").html(respuesta);
        }else{
            var datos = eval(respuesta);
            for (i =0; i < datos.length; i++) {
                dat=datos[i][0]+"*"+datos[i][1]+"*"+datos[i][2]+"*"+datos[i][3]+"*"+datos[i][3]+"*"+datos[i][3]+"*"+datos[i][4]+"*"+datos[i][5]+"*"+datos[i][6];
                var d = dat.split("*");
                $("#u_a_nombre").val(datos[0]);
                $("#u_a_apellido").val(datos[1]);
                $("#u_a_nac").val(datos[2]);
                $("#u_a_ci").val(datos[3]);
                $("#u_a_rol").val(datos[4]);
                $("#u_a_usuario").val(datos[5]);
                $("#u_a_password").val(datos[6]);
                $("#u_a_estatus").val(datos[7]);
                $("#valor_oculto").val(datos[8]);
                //alert(d);
                $('#basicExampleModal').modal("show");
            }    
        }
        
    });
}

function question(){
    
    $("#mensaje").modal("show");
    $("#mensaje_text").html(document.getElementById('question').value);
}

/*
* función para enviar datos del usuario para ser actualizados
*/
function enviar_form_act_user_final() {
    var dato = $('#form_actua_user_final').serialize();
    //alert(dato);
    
    $.ajax({
        url:'./../Controlador/actual_usuario_contrl.php',
        type:'POST',
        data: dato,
    }).done(function(respuesta){
        //alert(respuesta);
        var datos = eval(respuesta);
        $("#mensaje").modal("show");
        $("#mensaje_text").html(datos);
        $('#form_actua_user_final')[0].reset();
        //window.location="main.php"; 
    });
}

function enviar_form_regis_expe(){
    var dato = $('#form_regis_expe').serialize();
    //alert(dato);

    $.ajax({
        url:'./../Controlador/registrar_expediente_contrl.php',
        type:'POST',
        data: dato,
    }).done(function(respuesta){
        alert(respuesta);
        //var datos = eval(respuesta);
        $('#form_regis_expe')[0].reset();
    });
}

/*
* función para enviar datos del expediente para ser actualizados
*/
function enviar_form_consul_expe(){
    var dato = document.getElementById('search').value;
    if (dato=='') {
        //alert();
        $("#mensaje").modal("show");
        $("#mensaje_text").html("Ingrese algun valor");
        $('#tc').html('');
    }else{
        $.ajax({
            url:'./../Controlador/consultar_expediente_contrl.php',
            type:'POST',
            data: "value="+dato,
        }).done(function(respuesta){
            //alert(respuesta);
            if (respuesta=='Este expediente no existe') {
                $("#mensaje").modal("show");
                $("#mensaje_text").html(respuesta);
                $('#tc').html('');
                //alert(respuesta);
            }else{
                $('#tc').html(respuesta);
                
            }
        });    
    }
    
}


//en construcción///////////////////////////////////////////////////////
function auto_complete_expediente(){
  var dato = document.getElementById('search').value;
  var dat;
  $.ajax({
    url:'Accounting_entries/autocomplete',
    type:'GET',
    data: 'id='+dato,
  }).done(function(respuesta){
    var datos = eval(respuesta);
    var a = new Array();
      $("#assistant").autocomplete({
          source: a
    });
    
  });
}

function list_pieza(){
 var dato = document.getElementById('search').value;
    //alert(dato);
    $.ajax({
        url:'./../Controlador/list_pieza_contrl.php',
        type:'POST',
        data: "value="+dato,
    }).done(function(respuesta){
        $('#pieza_list').modal('show');
        $('#table-pieza').show();
        $('#form-pieza').hide();
        $('#l_pieza').html(respuesta);
        //alert(respuesta);
        
    });   
}

function update_pieza(){
    alert("En construcción");
}

function añadir_pieza(){
    alert("En construcción");
    var dato = document.getElementById('search').value;
    $('#table-pieza').hide();
    $('#form-pieza').show();
}

function update_form_expe(){
    $("table tbody tr").click(function() {
        var dato = $(this).find("td:eq(1)").text();
        //alert(dato);
        $.ajax({
            url:'./../Controlador/consultar_expediente_act_contrl.php',
            type:'POST',
            data: "value="+dato,
        }).done(function(respuesta){
            var datos = eval(respuesta);
            console.log(datos);
            $("#numero_expe_update").val(datos[0]);
            $("#tribunal_update").html(datos[1]);
            $("#estado_update").val(datos[2]);
            $("#apellido_proc_expe_update").val(datos[4]);
            $("#nombre_proc_expe_update").val(datos[3]);
            $("#ci_proc_expe_update").val(datos[6]);
            $("#nac_expe_update").val(datos[5]);
            $("#val_oculto").val(datos[7]);
        });       
    });
}

function notificacion(){
    $("#notificacion").modal("show");
    
}

function update_expe(){
    var dato = $('#form_actualizar_expediente').serialize();
    $.ajax({
        url:'./../Controlador/update_expe_contrl.php',
        type:'POST',
        data: dato,
    }).done(function(respuesta){
       $("#actualizar_expediente").modal("hide");
       $("#mensaje").modal("show");
       $("#mensaje_text").html("Expediente actualizado");
       enviar_form_consul_expe();
    });
}


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
    console.log(tiempo);
    if (tiempo > 10) { // 20 minutes 
        window.location="../Controlador/cerrar_session_contrl.php"; 
    } 
}



