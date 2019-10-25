//Función para mostrar la pantalla de inicio
function mostrar_mod_inicio() {
    document.getElementById('inicio').style.display="block";
    document.getElementById('solicitud_list').style.display="none";
    //document.getElementsByClassName('inicio').style.display="block";
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
        //window.locationreload();    
    });
}

function mostrar_mod_solicitud_list() {
    document.getElementById('inicio').style.display="none";
    document.getElementById('solicitud_list').style.display="block";
    //document.getElementsByClassName('inicio').style.display="block";
    list_solicitud();   
    
}



function question(){
    
    $("#mensaje").modal("show");
    $("#mensaje_text").html(document.getElementById('question').value);
}

/*
* función para enviar datos del usuario para ser actualizados
*/

function notificacion(){
    $("#notificacion").modal("show");
    
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
    //console.log(tiempo);
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
  element = 4*x;
  y=element-4;
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
  element = 4*x;
  y=element-4;
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
  var reg = document.getElementById('list_solicitud');
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

function list_solicitud(){
  $.ajax({
    url:'./../Controlador/list_solicitud_contrl.php',
    type:'GET',
    data: '',
  }).done(function(respuesta){
    $("#list_solicitud").html(respuesta);
    table = document.getElementById('list_solicitud').rows.length;
    group = table/4;
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
    element = 4*x;
    y = element-4;
    for (let index = table; index > element; index--) {
      $("#"+index).hide();
      
    }
    for (let index = 1; index <= y; index++) {
      $("#"+index).hide();
    }
    //modifico desde aqui
  });
}

function delete_pages(){
    $('#act').html('');
}

function page_actual(val){
  alert('aqui toy');
  x = val;    
  element = 4*x;
  y = element-4;
  for (let index = table; index > element; index--) {
      $("#"+index).hide();
      
  }
    for (let index = 1; index <= y; index++) {
      $("#"+index).hide();
    }
  $('#act').val(x);
}

//aqui termina el paginado de piezas
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
      });      
}

function seleccion_expe_list(){
    $("table tbody tr").click(function() {
        var num = $(this).find("td:eq(1)").text();
        $('#sol_int_expe').val(num);
        $('#sol_ext_expe').val(num);
        $('#expediente_modal').modal('hide');
        $('#solicitud_modal').modal('show');
        auto_select_pieza();
    });  
}

function auto_select_pieza(){
    var dato=$('#sol_int_expe').val();
    if (dato.length==0) {
        dato=$('#sol_ext_expe').val();
    }
    $.ajax({
        url:'./../Controlador/list_pieza_contrl.php?option="1"',
        type:'POST',
        data: {value:dato},
    }).done(function(respuesta){
        $('#sol_int_pieza').html(respuesta);
        $('#sol_ext_pieza').html(respuesta);
        
    });
}

function gestionar_solicitud(){
    $("table tbody tr").click(function() {
        var id = $(this).find("td:eq(1)").text();
        var expediente = $(this).find("td:eq(5)").text();
        var pieza = $(this).find("td:eq(6)").text();
        var ubicacion = $(this).find("td:eq(7)").text();
        $.ajax({
            url:'./../Controlador/gestionar_solicitud_contrl.php?n='+id+'&expediente='+expediente+'&pieza='+pieza+'ubicacion='+ubicacion,
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

//funciones para el paginado del log del sistema
function mostrar_nex_log(){
  x = document.getElementById('act_log').value;    
  x = parseInt(x)+1;
  if(x>pages){
    x=x-1;
  }
  document.getElementById('act_log').value=x;
  element = 4*x;
  y=element-4;
  for (let index = 1; index <= y+1; index++){
    $("#log"+index).hide();
    //console.log(index);
  }
  for (let index = y; index < element; index++){
    $("#log"+index).show();
  }
  for (let index = table; index > element; index--) {
    $("#log"+index).hide();
  }
}

function mostrar_pre_log(){
  x = document.getElementById('act_log').value;    
  x = parseInt(x)-1;
  if(x==0){
    x=x+1;
  }
  document.getElementById('act_log').value=x;
  element = 4*x;
  y=element-4;
  for (let index = 1; index < y; index++){
    $("#log"+index).hide();
  }
  for (let index = element; index > y; index--){
    $("#log"+index).show();
  }
  for (let index = table; index > element; index--) {
    $("#log"+index).hide();
  }
}

function search_log(){
  var dato = document.getElementById('q').value;
  var reg = document.getElementById('l_log');
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
            $("#log"+fila).show();
          }else{
            if(dato==dat.substring(0, dato.length)){
              $("#log"+fila).show();
            }else{
              $("#log"+fila).hide();
            }
          }
        }
      }
      else{
        for (let j = 1; j < celdas.length-1; j++) {
          var dat=celdas[j].innerHTML;
          if (dat==dato) {
            $("#log"+fila).show();
          }if(dato==dat.substring(0, dato.length)){
            $("#log"+fila).show();
          }else{
            $("#log"+fila).hide();
          }                
        }
      }
    }
}

function list_log(){
  $.ajax({
        url:'./../Controlador/list_log_accion.php',
        type:'POST',
        data: '',
    }).done(function(respuesta){
    $("#l_log").html(respuesta);
    table = document.getElementById('l_log').rows.length;
    group = table/4;
    pages;
    if(group % 1 == 0){
      pages = group;
    }else{
      x = group % 1;
      y = 1 - x;
        pages = group+y;
    }
    x = document.getElementById('act_log').value;
    
    delete_pages_log();
    for (let index = 1; index <= pages; index++) {
      //console.log(index);
      var option = document.createElement("option");
      option.setAttribute('value',index);
      $(option).html(index);
      $(option).appendTo("#act_log");
    }
    document.getElementById('act_log').value=x;
    element = 4*x;
    y = element-4;
    for (let index = table; index > element; index--) {
      $("#log"+index).hide();
      
    }
    for (let index = 1; index <= y; index++) {
      $("#log"+index).hide();
    }
  });
}

function delete_pages_log(){
    $('#act_log').html('');
}
//termina paginado del log
function imprimir_log(){
    window.location="../Reportes/reporte_log.php"; 
}

function imprimir_reporte_solicitud(){
    var desde = $('#desde_solicitud').val();
    var hasta = $('#hasta_solicitud').val();
    var url = "../Reportes/reporte_solicitud.php?desde="+desde+"&hasta="+hasta; 
    //alert(url);
    window.location="../Reportes/reporte_solicitud.php?desde="+desde+"&hasta="+hasta; 

}

function imprimir_reporte_expediente(){
    var desde = $('#desde_expediente').val();
    var hasta = $('#hasta_expediente').val();
    var url = "../Reportes/reporte_expediente.php?desde="+desde+"&hasta="+hasta; 
    //alert(url);
    window.location="../Reportes/reporte_expediente.php?desde="+desde+"&hasta="+hasta; 

}

function reporte_solicitud(){
    //var dato = $('#form_rep_solicitud').serialize();
    $('#form_rep_solicitud').hide();
    $('#list_reporte_solicitud').show();
    list_rep_sol();
    /*
    $.ajax({
        url:'./../Controlador/list_reporte_solicitud_contrl.php',
        type:'POST',
        data: dato,
    }).done(function(respuesta){
        $("#l_reporte_solicitud").html(respuesta);
        
    });
    */      
}

function reiniciar_reporte_solicitud(){
    $('#form_rep_solicitud').show();
    $('#list_reporte_solicitud').hide();
}

function reporte_expediente(){
    //var dato = $('#form_rep_expediente').serialize();
    $('#form_rep_expediente').hide();
    $('#list_reporte_expediente').show();
    list_rep_exp();
    /*
    $.ajax({
        url:'./../Controlador/list_reporte_expediente_contrl.php',
        type:'POST',
        data: dato,
    }).done(function(respuesta){
        $("#l_reporte_expediente").html(respuesta);
        
    });
    */      
}

function reiniciar_reporte_expediente(){
    $('#form_rep_expediente').show();
    $('#list_reporte_expediente').hide();
}

//paginado de las solicitudes/////////////////////////////////////////////////////////////
function mostrar_nex_rep_sol(){
  x = document.getElementById('act_rep_sol').value;    
  x = parseInt(x)+1;
  if(x>pages){
    x=x-1;
  }
  document.getElementById('act_rep_sol').value=x;
  element = 4*x;
  y=element-4;
  for (let index = 1; index <= y+1; index++){
    $("#rep_sol"+index).hide();
    //console.log(index);
  }
  for (let index = y; index < element; index++){
    $("#rep_sol"+index).show();
  }
  for (let index = table; index > element; index--) {
    $("#rep_sol"+index).hide();
  }
}

function mostrar_pre_rep_sol(){
  x = document.getElementById('act_rep_sol').value;    
  x = parseInt(x)-1;
  if(x==0){
    x=x+1;
  }
  document.getElementById('act_rep_sol').value=x;
  element = 4*x;
  y=element-4;
  for (let index = 1; index < y; index++){
    $("#rep_sol"+index).hide();
  }
  for (let index = element; index > y; index--){
    $("#rep_sol"+index).show();
  }
  for (let index = table; index > element; index--) {
    $("#rep_sol"+index).hide();
  }
}

function search_rep_sol(){
  var dato = document.getElementById('q').value;
  var reg = document.getElementById('l_reporte_solicitud');
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
            $("#rep_sol"+fila).show();
          }else{
            if(dato==dat.substring(0, dato.length)){
              $("#rep_sol"+fila).show();
            }else{
              $("#rep_sol"+fila).hide();
            }
          }
        }
      }
      else{
        for (let j = 1; j < celdas.length-1; j++) {
          var dat=celdas[j].innerHTML;
          if (dat==dato) {
            $("#rep_sol"+fila).show();
          }if(dato==dat.substring(0, dato.length)){
            $("#rep_sol"+fila).show();
          }else{
            $("#rep_sol"+fila).hide();
          }                
        }
      }
    }
}

function list_rep_sol(){
  var dato = $('#form_rep_solicitud').serialize();
  $.ajax({
        url:'./../Controlador/list_reporte_solicitud_contrl.php',
        type:'POST',
        data: dato,
    }).done(function(respuesta){
    $("#l_reporte_solicitud").html(respuesta);
    table = document.getElementById('l_reporte_solicitud').rows.length;
    group = table/4;
    pages;
    if(group % 1 == 0){
      pages = group;
    }else{
      x = group % 1;
      y = 1 - x;
        pages = group+y;
    }
    x = document.getElementById('act_rep_sol').value;
    
    delete_pages_rep_sol();
    for (let index = 1; index <= pages; index++) {
      //console.log(index);
      var option = document.createElement("option");
      option.setAttribute('value',index);
      $(option).html(index);
      $(option).appendTo("#act_rep_sol");
    }
    document.getElementById('act_rep_sol').value=x;
    element = 4*x;
    y = element-4;
    for (let index = table; index > element; index--) {
      $("#rep_sol"+index).hide();
      
    }
    for (let index = 1; index <= y; index++) {
      $("#rep_sol"+index).hide();
    }
  });
}

function delete_pages_rep_sol(){
    $('#act_rep_sol').html('');
}

//paginado del reporte de expedientes

function mostrar_nex_rep_exp(){
  x = document.getElementById('act_rep_exp').value;    
  x = parseInt(x)+1;
  if(x>pages){
    x=x-1;
  }
  document.getElementById('act_rep_exp').value=x;
  element = 4*x;
  y=element-4;
  for (let index = 1; index <= y+1; index++){
    $("#rep_exp"+index).hide();
    //console.log(index);
  }
  for (let index = y; index < element; index++){
    $("#rep_exp"+index).show();
  }
  for (let index = table; index > element; index--) {
    $("#rep_exp"+index).hide();
  }
}

function mostrar_pre_rep_exp(){
  x = document.getElementById('act_rep_exp').value;    
  x = parseInt(x)-1;
  if(x==0){
    x=x+1;
  }
  document.getElementById('act_rep_exp').value=x;
  element = 4*x;
  y=element-4;
  for (let index = 1; index < y; index++){
    $("#rep_exp"+index).hide();
  }
  for (let index = element; index > y; index--){
    $("#rep_exp"+index).show();
  }
  for (let index = table; index > element; index--) {
    $("#rep_exp"+index).hide();
  }
}

function search_rep_exp(){
  var dato = document.getElementById('q').value;
  var reg = document.getElementById('l_reporte_expediente');
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
            $("#rep_exp"+fila).show();
          }else{
            if(dato==dat.substring(0, dato.length)){
              $("#rep_exp"+fila).show();
            }else{
              $("#rep_exp"+fila).hide();
            }
          }
        }
      }
      else{
        for (let j = 1; j < celdas.length-1; j++) {
          var dat=celdas[j].innerHTML;
          if (dat==dato) {
            $("#rep_exp"+fila).show();
          }if(dato==dat.substring(0, dato.length)){
            $("#rep_exp"+fila).show();
          }else{
            $("#rep_exp"+fila).hide();
          }                
        }
      }
    }
}

function list_rep_exp(){
  var dato = $('#form_rep_expediente').serialize();
  $.ajax({
        url:'./../Controlador/list_reporte_expediente_contrl.php',
        type:'POST',
        data: dato,
    }).done(function(respuesta){
    $("#l_reporte_expediente").html(respuesta);
    table = document.getElementById('l_reporte_expediente').rows.length;
    group = table/4;
    pages;
    if(group % 1 == 0){
      pages = group;
    }else{
      x = group % 1;
      y = 1 - x;
        pages = group+y;
    }
    x = document.getElementById('act_rep_exp').value;
    
    delete_pages_rep_exp();
    for (let index = 1; index <= pages; index++) {
      //console.log(index);
      var option = document.createElement("option");
      option.setAttribute('value',index);
      $(option).html(index);
      $(option).appendTo("#act_rep_exp");
    }
    document.getElementById('act_rep_exp').value=x;
    element = 4*x;
    y = element-4;
    for (let index = table; index > element; index--) {
      $("#rep_exp"+index).hide();
      
    }
    for (let index = 1; index <= y; index++) {
      $("#rep_exp"+index).hide();
    }
  });
}

function delete_pages_rep_exp(){
    $('#act_rep_exp').html('');
}