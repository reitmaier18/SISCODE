<div class="col-md-10" id="reporte_estadistico">
    <h2 class="h2-responsive font-weight-bold text-center my-5">Estadísticas</h2>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" role="tab" aria-controls="Solicitudes procesadas"
                      aria-selected="true" onclick="mostrar_estadistica_solicitud();">Solicitudes atendidas</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" role="tab" aria-controls="Expedientes registrados"
                      aria-selected="false" onclick="mostrar_estadistica_expediente();">Expedientes registrados</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" role="tab" aria-controls="Expedientes registrados"
                      aria-selected="false" onclick="mostrar_estadistica();">Estadistica y gráficos</a>
                  </li>
                </ul>
            </div>
            <hr>
        </div>
    </div>
    <div id="reporte_solicitud">
        <hr>
        <form  class="col-md-12" id="form_rep_solicitud">
            <div class="input-group">
                <div class="md-form textbox col-md-4 offset-md-1" id="textbox1">
                    <!--img src="img/icon2.png" class="prefix"-->
                    <input type="date" name="desde" id="desde_solicitud" class="form-control validate">
                    <label for="desde">Fecha de inicio</label>                            
                </div>
                <div class="md-form textbox col-md-4 offset-md-2" id="textbox1">
                    <!--img src="img/icon2.png" class="prefix"-->
                    <input type="date" name="hasta" id="hasta_solicitud" class="form-control validate">
                    <label for="b">Fecha de cierre</label>                            
                </div>
                <div class="col-md-8 offset-md-2">
                    <center><label class="btn btn-primary" onclick="reporte_solicitud();">Generar reporte</label></center>
                                                
                </div>
            </div>
            <br>

        </form>
        <!--Listado del reporte de solicitudes-->
        <div id="list_reporte_solicitud">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Fecha</th>
                        <th>Solicitante</th>
                        <th>Tipo de solicitud</th>
                        <th>Expediente</th>
                        <th>Pieza</th>
                        <th>Área solicitante</th>
                    </tr>
                </thead>
                <tbody id="l_reporte_solicitud">
                </tbody>
                <tfoot>
                    <tr>
                      <td colspan="100">
                        <div class="text-right">
                          <div class="input-append input-append">
                            <div class="btn-group" role="group" aria-label="...">
                              <button class="btn btn-blue-grey btn-next" type="button" onclick="mostrar_pre_rep_sol();"></button>
                              <div class="btn-group" role="group">
                                <select name="p" id="act_rep_sol" class="form-control" onchange="list_rep_sol();">
                                   <option value="1">1</option>
                                </select>
                                </div>
                              <button class="btn btn-blue-grey btn-back" type="button" onclick="mostrar_nex_rep_sol();"></button>
                            </div>
                        </div>
                    </td>
                    </tr>
                </tfoot>
            </table>
            <center><button class="btn btn-primary" onclick="imprimir_reporte_solicitud();">Imprimir PDF</button> <button class="btn btn-blue-grey" onclick="reiniciar_reporte_solicitud();">Regresar</button> </center>
            <br>
        </div>
    </div>

    <div id="reporte_expediente" class="oc">
        <hr>
        <form  class="col-md-12" id="form_rep_expediente">
            <div class="input-group">
                <div class="md-form textbox col-md-4 offset-md-1" id="textbox1">
                    <!--img src="img/icon2.png" class="prefix"-->
                    <input type="date" name="desde" id="desde_expediente" class="form-control validate">
                    <label for="desde">Fecha de inicio</label>                            
                </div>
                <div class="md-form textbox col-md-4 offset-md-2" id="textbox1">
                    <!--img src="img/icon2.png" class="prefix"-->
                    <input type="date" name="hasta" id="hasta_expediente" class="form-control validate">
                    <label for="b">Fecha de cierre</label>                            
                </div>
                <div class="col-md-8 offset-md-2">
                    <center><label class="btn btn-primary" onclick="reporte_expediente();">Generar reporte</label></center>
                                                
                </div>
            </div>
            <br>
        </form>
        <!--Listado del reporte de expedientes-->
        <div id="list_reporte_expediente">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Fecha de registro</th>
                        <th>N° expediente</th>
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th>Tribunal</th>
                    </tr>
                </thead>
                <tbody id="l_reporte_expediente">
                    
                </tbody>
                <tfoot>
                    <tr>
                      <td colspan="100">
                        <div class="text-right">
                          <div class="input-append input-append">
                            <div class="btn-group" role="group" aria-label="...">
                              <button class="btn btn-blue-grey btn-next" type="button" onclick="mostrar_pre_rep_exp();"></button>
                              <div class="btn-group" role="group">
                                <select name="p" id="act_rep_exp" class="form-control" onchange="list_rep_exp();">
                                   <option value="1">1</option>
                                </select>
                                </div>
                              <button class="btn btn-blue-grey btn-back" type="button" onclick="mostrar_nex_rep_exp();"></button>
                            </div>
                        </div>
                    </td>
                    </tr>
                </tfoot>
            </table>
            <center><button class="btn btn-primary" onclick="imprimir_reporte_expediente();">Imprimir PDF</button> <button class="btn btn-blue-grey" onclick="reiniciar_reporte_expediente();">Regresar</button></center>
            <br>
        </div>
    </div>

    <div id="reporte_estadistica" class="oc">
        <hr>
        <form  class="col-md-12" id="form_rep_estadistica">
            <div class="input-group">
                <div class="md-form textbox col-md-4 offset-md-1" id="textbox1">
                    <!--img src="img/icon2.png" class="prefix"-->
                    <input type="date" name="desde" id="desde_estadistica" class="form-control validate">
                    <label for="desde_estadistica">Fecha de inicio</label>                            
                </div>
                <div class="md-form textbox col-md-4 offset-md-2" id="textbox1">
                    <!--img src="img/icon2.png" class="prefix"-->
                    <input type="date" name="hasta" id="hasta_estadistica" class="form-control validate">
                    <label for="hasta_estadistica">Fecha de cierre</label>                            
                </div>
                <div class="col-md-8 offset-md-2">
                    <center><label class="btn btn-primary" onclick="reporte_estadistica();">Generar reporte</label></center>
                                                
                </div>
                
            </div>
            <br>
        </form>
        <div id="list_reporte_estadistica">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Actividad</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody id="l_reporte_estadistica">
                </tbody>
            </table>
            <center><button class="btn btn-primary" onclick="imprimir_reporte_estadistica();">Imprimir PDF</button> <button class="btn btn-blue-grey" onclick="reiniciar_reporte_estadistica();">Regresar</button> <button class="btn btn-success" onclick="mostrar_grafica();">Graficas</button></center>
            <br>
        </div>
    </div>
</div>
<script type="text/javascript">
function mostrar_mod_reporte_estadistico() {
    document.getElementById('inicio').style.display="none";
    <?php if ($_SESSION['rol']=='Administrador') {?>
    document.getElementById('user_a').style.display="none";
    document.getElementById('user_b').style.display="none";
    document.getElementById('log_sistema').style.display="none";
    <?php } if ($_SESSION['rol']=='Administrador'||$_SESSION['rol']=='Archivista'||$_SESSION['rol']=='Jefe de archivo') {?>
    document.getElementById('expediente_a').style.display="none";
    document.getElementById('expediente_b').style.display="none";
    document.getElementById('reporte_estadistico').style.display="block";
    document.getElementById('inventario').style.display="none";
    <?php } ?>
    document.getElementById('solicitud_list').style.display="none";
}
function mostrar_estadistica_expediente(){
    document.getElementById('reporte_solicitud').style.display="none";
    document.getElementById('reporte_expediente').style.display="block";
    document.getElementById('reporte_estadistica').style.display="none";
}

function mostrar_estadistica_solicitud(){
    document.getElementById('reporte_solicitud').style.display="block";
    document.getElementById('reporte_expediente').style.display="none";
    document.getElementById('reporte_estadistica').style.display="none";
}

function mostrar_estadistica(){
    document.getElementById('reporte_solicitud').style.display="none";
    document.getElementById('reporte_expediente').style.display="none";
    document.getElementById('reporte_estadistica').style.display="block";
}

function imprimir_reporte_solicitud(){
    var desde = $('#desde_solicitud').val();
    var hasta = $('#hasta_solicitud').val();
    //var url = "../Reportes/reporte_solicitud.php?desde="+desde+"&hasta="+hasta; 
    window.location="../Reportes/reporte_solicitud.php?desde="+desde+"&hasta="+hasta; 
}

function imprimir_reporte_estadistica(){
    var desde = $('#desde_estadistica').val();
    var hasta = $('#hasta_estadistica').val();
    window.location="../Reportes/reporte_estadistica.php?desde="+desde+"&hasta="+hasta; 
}

function imprimir_reporte_expediente(){
    var desde = $('#desde_expediente').val();
    var hasta = $('#hasta_expediente').val();
    //var url = "../Reportes/reporte_expediente.php?desde="+desde+"&hasta="+hasta; 
    window.location="../Reportes/reporte_expediente.php?desde="+desde+"&hasta="+hasta; 
}

function reporte_solicitud(){
    $('#form_rep_solicitud').hide();
    $('#list_reporte_solicitud').show();
    list_rep_sol();
}

function reiniciar_reporte_solicitud(){
    $('#form_rep_solicitud').show();
    $('#list_reporte_solicitud').hide();
}

function reporte_expediente(){
    $('#form_rep_expediente').hide();
    $('#list_reporte_expediente').show();
    list_rep_exp();
}

function reiniciar_reporte_expediente(){
    $('#form_rep_expediente').show();
    $('#list_reporte_expediente').hide();
}

function reporte_estadistica(){
    $('#form_rep_estadistica').hide();
    $('#list_reporte_estadistica').show();
    var dato = $('#form_rep_estadistica').serialize();
    $.ajax({
        url:'./../Controlador/list_reporte_estadistica_contrl.php',
        type:'POST',
        data: dato,
    }).done(function(respuesta){
        $('#l_reporte_estadistica').html(respuesta);
        $('#form_rep_estadistica').hide();
        $('#list_reporte_estadistica').show();
        
    });
}

function reiniciar_reporte_estadistica(){
    $('#form_rep_estadistica').show();
    $('#list_reporte_estadistica').hide();   
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

function mostrar_grafica(){
    $('#grafica_modal').modal('show');
    var dato = $('#form_rep_estadistica').serialize();
            $.ajax({
                url:'./../Controlador/grafica_contrl.php',
                type:'POST',
                data: dato,
            }).done(function(respuesta){
                var dat = eval(respuesta);
                var expediente = dat[0];
                var solicitud = dat[1];
                grafica(expediente, solicitud);
            });
}
</script>