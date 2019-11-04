<div class="col-md-10" id="solicitud_list">
    <h2 class="h2-responsive font-weight-bold text-center my-5">Listado de solicitudes</h2>
    <div>
        <hr>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <th>#</th>
                <th>Fecha</th>
                <th>Solicitante</th>
                <th>Solicitud</th>
                <th>Expediente</th>
                <th>Pieza</th>
                <th>Área solicitante</th>
                <th>Estatus</th>
                <th>Acción</th>
            </thead>
            <tbody id="list_solicitud">
                
            </tbody>
            <tfoot>
                <tr>
                  <td colspan="100">
                    <div class="text-right">
                      <div class="input-append input-append">
                        <div class="btn-group" role="group" aria-label="...">
                          <button class="btn btn-blue-grey btn-next" type="button" onclick="mostrar_pre();"></button>
                          <div class="btn-group" role="group">
                            <select name="p" id="act" class="form-control" onchange="list_solicitud();">
                               <option value="1">1</option>
                            </select>
                            </div>
                          <button class="btn btn-blue-grey btn-back" type="button" onclick="mostrar_nex();"></button>
                        </div>
                    </div>
                </td>
                </tr>
            </tfoot>
        </table>
    </div>
    <?php if ($_SESSION['rol']=='Juez'||$_SESSION['rol']=='Archivista') {?>
    <center><button class="btn btn-primary" onclick="solicitud_modal();">Solicitar</button></center>
    <br>
    <?php } ?>
</div>
<!-- Modal para realizar una solicitud -->
<div class="modal fade" id="solicitud_modal" tabindex="0" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Formulario de solicitud de expedientes y piezas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="false">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" onclick="display_form_sol_int();" 
                      aria-selected="true">Solicitud interna</a>
                  </li>
                  <?php if ($_SESSION['rol']=='Archivista') {?>
                  <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" aria-selected="false" onclick="display_form_sol_ext();">Solicitud externa</a>
                  </li>
                    <?php } ?>
                </ul>
                <form class="col-md-12" id="form_sol_interna">
                    <br>
                    <div class="input-group">
                        <div class="md-form offset-md-1">
                            <i class="prefix"data-toggle='modal' onclick="display_expe_list();"><img src="img/icon14.png"></i>
                            <label for="sol_int_expe">Expediente</label>
                            <input type="text" name="expediente" id="sol_int_expe" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" required="true" placeholder="Expediente" onblur="auto_select_pieza();">
                        </div>
                        <div class="md-form textbox col-md-4 offset-md-2" id="textbox1">
                            <select class="browser-default custom-select custom-select-md mb-3 btn-blue-grey" onclick="" id="sol_int_pieza" name="pieza" onmouseover="auto_select_pieza();">
                                <option disabled selected>Pieza</option>
                            </select>                            
                        </div>                                
                        
                    </div>

                    <center><label class="btn btn-primary" onmouseover="val_formulario('#form_sol_interna');" onclick="registrar_solicitud_int();">Solicitar</label></center>
                </form>
                <?php if ($_SESSION['rol']=='Archivista') { ?>
                <form class="col-md-12 oc" id="form_sol_externa">
                    <br>
                    <div class="input-group">
                        <div class="md-form col-md-2 offset-md-3">
                                <select class="browser-default custom-select custom-select-md mb-3 btn-blue-grey" name="nac">
                                    <option disabled>Nac</option>
                                    <option value="1" selected>V-</option>
                                    <option value="2">E-</option>
                                </select>
                            </div> 
                            <div class="md-form textbox col-md-4 offset-md-0" id="textbox1">
                                <!--img src="img/icon2.png" class="prefix"-->
                                <input type="text" name="ci" id="ci_sol_ext" class="form-control validate" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return check(event)" placeholder="Cédula del solicitante">
                                <label for="ci_sol_ext">Cédula del solicitante</label>                            
                            </div>
                        </div>

                    <div class="input-group">
                        <div class="md-form textbox col-md-4 offset-md-1" id="textbox1">
                            <!--img src="img/icon2.png" class="prefix"-->
                            <input type="text" name="nombre" id="nombre_sol_ext" class="form-control validate" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return check(event)" placeholder="Nombre del solicitante">
                            <label for="nombre_sol_ext">Nombre del solicitante</label>                            
                        </div>
                        <div class="md-form textbox col-md-4 offset-md-2" id="textbox1">
                            <!--img src="img/icon2.png" class="prefix"-->
                            <input type="text" name="apellido" id="apellido_sol_ext" class="form-control validate" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return check(event)" placeholder="Apellido del solicitante">
                            <label for="apellido_sol_ext">Apellido del solicitante</label>                            
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="md-form offset-md-1">
                            <i class="prefix"data-toggle='modal' data-target='' onclick="display_expe_list();"><img src="img/icon14.png"></i>
                            <label for="sol_int_expe">Expediente</label>
                            <input type="text" name="expediente" id="sol_ext_expe" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" required="true" placeholder="Expediente" onblur="auto_select_pieza();">
                        </div>
                        <div class="md-form textbox col-md-4 offset-md-2" id="textbox1">
                            <select class="browser-default custom-select custom-select-md mb-3 btn-blue-grey" id="sol_ext_pieza" name="pieza">
                                <option disabled selected>Pieza</option>
                            </select>                            
                        </div>                                
                    </div>
                    <center><label class="btn btn-primary" onmouseover="val_formulario('#form_sol_externa');" onclick="registrar_solicitud_ext();">Solicitar</label></center>
                </form>
            <?php } ?>
        </div>
    </div>
</div>

</div>
<!-- Modal para listar los expedientes -->
<div class="modal fade" id="expediente_modal" tabindex="0" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Listado de expedientes</h5>
                <br>
                <div class="md-form input-group col-md-4 offset-md-4">
                  <div class="input-group-append" id="MaterialButton-addon4">
                    <button class="btn btn-md btn-rounded btn-link btn-search  m-0 px-3" type="button" onclick="search_expe_list();"></button>
                    </div>
                  <input type="text" class="form-control" size="10" id="search_expe" placeholder="Buscar..." 
                    aria-describedby="MaterialButton-addon4" onkeyup="onKeyUp(event,3)">
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="false">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>N° expediente</th>
                                <th>Cedula</th>
                                <th>Nombre</th>
                                <th>Estado</th>
                                <th>Tribunal</th>
                            </tr>
                        </thead>
                        <tbody id="l_expediente">
                            
                        </tbody>
                    </table>
                </div>
            </div>
           
        </div>
    </div>
<script type="text/javascript">
function mostrar_mod_solicitud_list() {
    document.getElementById('inicio').style.display="none";
    <?php if ($_SESSION['rol']=='Administrador') {?>
    document.getElementById('user_a').style.display="none";
    document.getElementById('user_b').style.display="none";
    document.getElementById('log_sistema').style.display="none";
    <?php } if ($_SESSION['rol']=='Administrador'||$_SESSION['rol']=='Archivista'||$_SESSION['rol']=='Jefe de archivo') {?>
    document.getElementById('expediente_a').style.display="none";
    document.getElementById('expediente_b').style.display="none";
    document.getElementById('reporte_estadistico').style.display="none";
    document.getElementById('inventario').style.display="none";
    <?php } ?>
    document.getElementById('solicitud_list').style.display="block";
    list_solicitud();   
    
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

function search_expe_list(){
  var dato = document.getElementById('search_expe').value;
  var reg = document.getElementById('l_expediente');
  num = dato.substring(0,1);
  if (dato=='') {
    display_expe_list();
  }else{
    // Recorremos todas las filas con contenido de la tabla
    for (let i = 0; i < reg.rows.length; i++) {
      var fila = i+1;              
      var celdas = reg.rows[i].getElementsByTagName('td');
      for (let j = 1; j < celdas.length-4; j++) {
        var dat=celdas[j].innerHTML;
        if (dat==dato) {
          $("#expe"+fila).show();
        }if(dato==dat.substring(0, dato.length)){
          $("#expe"+fila).show();
        }else{
          $("#expe"+fila).hide();
        }                
      }
    }
  }
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

function registrar_solicitud_int(){
    var dato = $('#form_sol_interna').serialize();
    $.ajax({
        url:'./../Controlador/registrar_solicitud_contrl.php?option="0"',
        type:'POST',
        data: dato,
    }).done(function(respuesta){
        $('#solicitud_modal').modal('hide');
        $("#mensaje").modal("show");
        $("#mensaje_text").html('Se registro su solicitud');
        list_solicitud();
    });  
}

function registrar_solicitud_ext(){
    var dato = $('#form_sol_externa').serialize();
    $.ajax({
        url:'./../Controlador/registrar_solicitud_contrl.php?option=1',
        type:'POST',
        data: dato,
    }).done(function(respuesta){
        $('#solicitud_modal').modal('hide');
        $("#mensaje").modal("show");
        $("#mensaje_text").html('Se registro su solicitud');
        list_solicitud();
    });  
}
</script>