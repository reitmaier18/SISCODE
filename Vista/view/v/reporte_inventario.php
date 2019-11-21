<div class="col-md-10" id="inventario">
    <h2 class="h2-responsive font-weight-bold text-center my-5">   Inventario</h2>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" role="tab" aria-controls="Solicitudes procesadas"
                      aria-selected="true" onclick="mostrar_inv();">Inventario de expedientes y piezas</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" role="tab" aria-controls="Expedientes registrados"
                      aria-selected="false" onclick="mostrar_exp();">Expedientes por estados</a>
                  </li>
                  
                </ul>
            </div>
            <hr>
        </div>
    </div>
    <div id="list_inventario">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <th width="10%">#</th>
                <th width="20%">Número de Expediente</th>
                <th width="20%">Número de Pieza</th>
                <th>Ubicación</th>
            </thead>
            <tbody id="l_inventario"></tbody>
            <tfoot>
                <tr>
                  <td colspan="100">
                    <div class="text-right">
                      <div class="input-append input-append">
                        <div class="btn-group" role="group" aria-label="...">
                          <button class="btn btn-blue-grey btn-next" type="button" onclick="mostrar_pre_inventario();"></button>
                          <div class="btn-group" role="group">
                            <select name="p" id="act_inventario" class="form-control" onchange="list_inventario();">
                               <option value="1">1</option>
                            </select>
                            </div>
                          <button class="btn btn-blue-grey btn-back" type="button" onclick="mostrar_nex_inventario()"></button>
                        </div>
                    </div>
                </td>
                </tr>
            </tfoot>
        </table>
        <center><button class="btn btn-primary" onclick="imprimir_inventario();">Imprimir PDF</button></center>
        <br>
    </div>
    <div id="list_rep_exp_est" class="oc">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <th width="5%">#</th>
                <th width="20%">Estado</th>
                <th width="20%">Cantidad</th>
            </thead>
            <tbody id="l_rep_exp_est"></tbody>
            <tfoot>
                <tr>
                  <td colspan="100">
                    <div class="text-right">
                      <div class="input-append input-append">
                        <div class="btn-group" role="group" aria-label="...">
                          <button class="btn btn-blue-grey btn-next" type="button" onclick="mostrar_pre_exp_est();"></button>
                          <div class="btn-group" role="group">
                            <select name="p" id="act_exp_est" class="form-control" onchange="list_exp_est();">
                               <option value="1">1</option>
                            </select>
                            </div>
                          <button class="btn btn-blue-grey btn-back" type="button" onclick="mostrar_nex_exp_est()"></button>
                        </div>
                    </div>
                </td>
                </tr>
            </tfoot>
        </table>
        <center><button class="btn btn-primary" onclick="imprimir_reporte_expediente_estado();">Imprimir PDF</button></center>
        <br>
    </div>
</div> 
<script type="text/javascript">
function mostrar_inventario(){
    document.getElementById('inicio').style.display="none";
    <?php if ($_SESSION['rol']=='Administrador') {?>
    document.getElementById('user_a').style.display="none";
    document.getElementById('user_b').style.display="none";
    document.getElementById('log_sistema').style.display="none";
    <?php } if ($_SESSION['rol']=='Administrador'||$_SESSION['rol']=='Archivista'||$_SESSION['rol']=='Jefe de archivo') {?>
    document.getElementById('expediente_a').style.display="none";
    document.getElementById('expediente_b').style.display="none";
    document.getElementById('reporte_estadistico').style.display="none";
    document.getElementById('inventario').style.display="block";
    <?php } ?>
    document.getElementById('solicitud_list').style.display="none";
    list_inventario();
    list_exp_est();
}
function mostrar_inv(){
    document.getElementById('list_inventario').style.display="block";
    document.getElementById('list_rep_exp_est').style.display="none";   
}

function mostrar_exp(){
    document.getElementById('list_inventario').style.display="none";
    document.getElementById('list_rep_exp_est').style.display="block";      
}

function imprimir_inventario(){
    window.location="../Reportes/reporte_inventario.php";    
}

function imprimir_reporte_expediente_estado(){
    window.location="../Reportes/reporte_expediente_estado.php";    
}

//inventario
function mostrar_nex_inventario(){
  x = document.getElementById('act_inventario').value;    
  x = parseInt(x)+1;
  if(x>pages){
    x=x-1;
  }
  document.getElementById('act_inventario').value=x;
  element = 4*x;
  y=element-4;
  for (let index = 1; index <= y+1; index++){
    $("#inventario"+index).hide();
    //console.log(index);
  }
  for (let index = y; index < element; index++){
    $("#inventario"+index).show();
  }
  for (let index = table; index > element; index--) {
    $("#inventario"+index).hide();
  }
}

function mostrar_pre_inventario(){
  x = document.getElementById('act_inventario').value;    
  x = parseInt(x)-1;
  if(x==0){
    x=x+1;
  }
  document.getElementById('act_inventario').value=x;
  element = 4*x;
  y=element-4;
  for (let index = 1; index < y; index++){
    $("#inventario"+index).hide();
  }
  for (let index = element; index > y; index--){
    $("#inventario"+index).show();
  }
  for (let index = table; index > element; index--) {
    $("#inventario"+index).hide();
  }
}

function list_inventario(){
  $.ajax({
        url:'./../Controlador/list_inventario_contrl.php',
        type:'POST',
        data: "",
    }).done(function(respuesta){
    $('#l_inventario').html(respuesta);
    table = document.getElementById('l_inventario').rows.length;
    group = table/4;
    pages;
    if(group % 1 == 0){
      pages = group;
    }else{
      x = group % 1;
      y = 1 - x;
        pages = group+y;
    }
    x = document.getElementById('act_inventario').value;
    
    delete_pages_inventario();
    for (let index = 1; index <= pages; index++) {
      //console.log(index);
      var option = document.createElement("option");
      option.setAttribute('value',index);
      $(option).html(index);
      $(option).appendTo("#act_inventario");
    }
    document.getElementById('act_inventario').value=x;
    element = 4*x;
    y = element-4;
    for (let index = table; index > element; index--) {
      $("#inventario"+index).hide();
      
    }
    for (let index = 1; index <= y; index++) {
      $("#inventario"+index).hide();
    }
  });
}

function delete_pages_inventario(){
    $('#act_inventario').html('');
}

//reporte de cantidad de expedientes por estados
function mostrar_nex_exp_est(){
  x = document.getElementById('act_exp_est').value;    
  x = parseInt(x)+1;
  if(x>pages){
    x=x-1;
  }
  document.getElementById('act_exp_est').value=x;
  element = 4*x;
  y=element-4;
  for (let index = 1; index <= y+1; index++){
    $("#exp_est"+index).hide();
    //console.log(index);
  }
  for (let index = y; index < element; index++){
    $("#exp_est"+index).show();
  }
  for (let index = table; index > element; index--) {
    $("#exp_est"+index).hide();
  }
}

function mostrar_pre_exp_est(){
  x = document.getElementById('act_exp_est').value;    
  x = parseInt(x)-1;
  if(x==0){
    x=x+1;
  }
  document.getElementById('act_exp_est').value=x;
  element = 4*x;
  y=element-4;
  for (let index = 1; index < y; index++){
    $("#exp_est"+index).hide();
  }
  for (let index = element; index > y; index--){
    $("#exp_est"+index).show();
  }
  for (let index = table; index > element; index--) {
    $("#exp_est"+index).hide();
  }
}

function list_exp_est(){
  $.ajax({
        url:'./../Controlador/reporte_expediente_estado_contrl.php',
        type:'POST',
        data: "",
    }).done(function(respuesta){
    $('#l_rep_exp_est').html(respuesta);
    table = document.getElementById('l_rep_exp_est').rows.length;
    group = table/4;
    pages;
    if(group % 1 == 0){
      pages = group;
    }else{
      x = group % 1;
      y = 1 - x;
        pages = group+y;
    }
    x = document.getElementById('act_exp_est').value;
    
    delete_pages_exp_est();
    for (let index = 1; index <= pages; index++) {
      //console.log(index);
      var option = document.createElement("option");
      option.setAttribute('value',index);
      $(option).html(index);
      $(option).appendTo("#act_exp_est");
    }
    document.getElementById('act_exp_est').value=x;
    element = 4*x;
    y = element-4;
    for (let index = table; index > element; index--) {
      $("#exp_est"+index).hide();
      
    }
    for (let index = 1; index <= y; index++) {
      $("#exp_est"+index).hide();
    }
  });
}

function delete_pages_exp_est(){
    $('#act_exp_est').html('');
}
</script>