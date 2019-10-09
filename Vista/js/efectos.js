function mostrar_mod_user_a() {
    document.getElementById('inicio').style.display="none";
    document.getElementById('user_a').style.display="block";
    document.getElementById('user_b').style.display="none";
    document.getElementById('expediente_a').style.display="none";
    document.getElementById('expediente_b').style.display="none";
    document.getElementById('solicitud_list').style.display="none";
    //alert("Modulo de registro de usuario");
    //document.getElementsByClassName('inicio').style.display="block";
}

function mostrar_mod_user_b() {
    document.getElementById('inicio').style.display="none";
    document.getElementById('user_b').style.display="block";
    document.getElementById('user_a').style.display="none";
    document.getElementById('expediente_a').style.display="none";
    document.getElementById('expediente_b').style.display="none";
    document.getElementById('solicitud_list').style.display="none";
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
    document.getElementById('solicitud_list').style.display="none";
    //document.getElementsByClassName('inicio').style.display="block";
}

function mostrar_mod_expediente_a() {
    document.getElementById('inicio').style.display="none";
    document.getElementById('user_a').style.display="none";
    document.getElementById('user_b').style.display="none";
    document.getElementById('expediente_a').style.display="block";
    document.getElementById('expediente_b').style.display="none";
    document.getElementById('solicitud_list').style.display="none";
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
    document.getElementById('solicitud_list').style.display="none";
    //document.getElementsByClassName('inicio').style.display="block";
}

function mostrar_mod_solicitud_list() {
    document.getElementById('inicio').style.display="none";
    document.getElementById('user_a').style.display="none";
    document.getElementById('user_b').style.display="none";
    document.getElementById('expediente_a').style.display="none";
    document.getElementById('expediente_b').style.display="none";
    document.getElementById('solicitud_list').style.display="block";
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

function update_pieza_modal(){
    $("table tbody tr").click(function() {
        var dato = document.getElementById('search').value;
        var num = $(this).find("td:eq(0)").text();
        var dat = $(this).find("td:eq(2)").text();
        modal_pieza();//alert(dato);
        document.getElementById('ubicacion_pieza').value=dat;
        document.getElementById('num_pieza').value=num;
        $('#btn_a').hide();
        $('#btn_b').show();
    });
}

function update_pieza(){
    var ubicacion = document.getElementById('ubicacion_pieza').value;
    var dato = document.getElementById('num_pieza').value;
    var dat = document.getElementById('search').value;
    $.ajax({
        url:'./../Controlador/update_pieza_contrl.php?num='+dato+'&expe='+dat,
        type:'POST',
        data: {value:ubicacion},
    }).done(function(respuesta){
        if (respuesta=='True') {
            $('#pieza_list').modal('hide');
            $("#mensaje").modal("show");
            $("#mensaje_text").html("Pieza actualizada, exitosamente");
        }else{
            $('#pieza_list').modal('hide');
            $("#mensaje").modal("show");
            $("#mensaje_text").html("Pieza no actualizada");
        }
    });
}

function modal_pieza(){
    $('#table-pieza').hide();
    $('#form-pieza').show();
    $('#btn_a').show();
    $('#btn_b').hide();
    //alert("En construcción");
}

function añadir_pieza(){
    var ubicacion = document.getElementById('ubicacion_pieza').value;
    var dato = document.getElementById('search').value;
    $.ajax({
        url:'./../Controlador/añadir_pieza_contrl.php?val='+dato,
        type:'POST',
        data: "value="+ubicacion,
    }).done(function(respuesta){
        console.log(respuesta);
        if (respuesta==true) {
            $('#pieza_list').modal('hide');
            $("#mensaje").modal("show");
            $("#mensaje_text").html("Pieza añadida al expediente, exitosamente");
        }else{
            $('#pieza_list').modal('hide');
            $("#mensaje").modal("show");
            $("#mensaje_text").html("Pieza añadida al expediente, no efectuado");
        }
    });
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


//funciones para el paginado del listado de piezas
var table;
var x;
var element;
var y;
var pages;
var dato;


function mostrar_nex(){
  x = document.getElementById('act').value;    
  x = parseInt(x)+1;
  if(x>pages){
    x=x-1;
  }
  document.getElementById('act').value=x;
  element = 8*x;
  y=element-8;
  for (let index = 1; index <= y+1; index++){
    $("#"+index).hide();
    //console.log(index);
  }
  for (let index = y; index < element; index++){
    $("#"+index).show();
  }
  for (let index = table; index > element; index--) {
    $("#"+index).hide();
  }
}

function mostrar_pre(){
  x = document.getElementById('act').value;    
  x = parseInt(x)-1;
  if(x==0){
    x=x+1;
  }
  document.getElementById('act').value=x;
  element = 8*x;
  y=element-8;
  for (let index = 1; index < y; index++){
    $("#"+index).hide();
  }
  for (let index = element; index > y; index--){
    $("#"+index).show();
  }
  for (let index = table; index > element; index--) {
    $("#"+index).hide();
  }
}



function search(){
  var dato = document.getElementById('q').value;
  var reg = document.getElementById('tc');
  num = dato.substring(0,1);
  
  // Recorremos todas las filas con contenido de la tabla
    for (let i = 0; i < reg.rows.length; i++) {
      var fila = i+1;              
      var celdas = reg.rows[i].getElementsByTagName('td');
      if (num/1) {
        for (let j = 1; j < celdas.length-2; j++) {
          var dat=celdas[j].innerHTML;
          //console.log(dat);
          if (dat==dato) {
            $("#"+fila).show();
          }else{
            if(dato==dat.substring(0, dato.length)){
              $("#"+fila).show();
            }else{
              $("#"+fila).hide();
            }
          }
        }
      }
      else{
        for (let j = 1; j < celdas.length-1; j++) {
          var dat=celdas[j].innerHTML;
          if (dat==dato) {
            $("#"+fila).show();
          }if(dato==dat.substring(0, dato.length)){
            $("#"+fila).show();
          }else{
            $("#"+fila).hide();
          }                
        }
      }
    }
}

function get_list_chart_account(){
  var dato = document.getElementById('company').value
  $.ajax({
    url:'chart_account_list',
    type:'GET',
    data: 'company= '+dato,
  }).done(function(respuesta){
    $("#tc").html(respuesta);
    table = document.getElementById('tc').rows.length;
    group = table/8;
    pages;
    if(group % 1 == 0){
      pages = group;
    }else{
      x = group % 1;
      y = 1 - x;
        pages = group+y;
    }
    x = document.getElementById('act').value;
    
    delete_pages();
    for (let index = 1; index <= pages; index++) {
      //console.log(index);
      var option = document.createElement("option");
      option.setAttribute('value',index);
      $(option).html(index);
      $(option).appendTo("#act");
    }
    document.getElementById('act').value=x;
    element = 8*x;
    y = element-8;
    for (let index = table; index > element; index--) {
      $("#"+index).hide();
      
    }
    for (let index = 1; index <= y; index++) {
      $("#"+index).hide();
    }
    //modifico desde aqui
    
    var tb = document.getElementById('tc');
    for (let i = 0; i < 1; i++) {
      var fila = i+1;              
      var celdas = tb.rows[i].getElementsByTagName('td');
      for (let j = 3; j < 4; j++) {
        var status=celdas[j].innerHTML;
      }
    }
    if (status==1) {
      $("#save").show();
    }
    
  });
}

function delete_pages(){
    $('#act').html('');
}

function page_actual(val){
  x = val;    
  element = 8*x;
  y = element-8;
  for (let index = table; index > element; index--) {
      $("#"+index).hide();
      
  }
    for (let index = 1; index <= y; index++) {
      $("#"+index).hide();
    }
  $('#act').val(x);
}

function solicitud_modal(){
    $('#solicitud_modal').modal('show');
}

function display_form_sol_int(){
    $('#form_sol_interna').show();
    $('#form_sol_externa').hide();
}

function display_form_sol_ext(){
    $('#form_sol_interna').hide();
    $('#form_sol_externa').show();   
}

function display_expe_list(){
    $('#solicitud_modal').modal('hide');
    $('#expediente_modal').modal('show');
    $.ajax({
        url:'./../Controlador/list_expediente_contrl.php',
        type:'GET',
        data: '',
      }).done(function(respuesta){
        $('#l_expediente').html(respuesta);
        console.log(respuesta);
      });      
}
/*
function active_chekbutton_1(){
    //Con jquery
    var select=$('#id_select').val();
    $('#checkbutton_2').prop('checked', false);
    $('#checkbutton_3').prop('checked', false);
    $('#checkbutton_4').prop('checked', false);
    $('#checkbutton_5').prop('checked', false);
    //Con javascript
    var select=document.getElementById('id_select').value;
    document.getElementById('checkbutton_2').checked='false';
    document.getElementById('checkbutton_3').checked='false';
    document.getElementById('checkbutton_4').checked='false';
    document.getElementById('checkbutton_5').checked='false';
}
*/