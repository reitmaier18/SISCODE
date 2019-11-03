<div class="col-md-10" id="log_sistema">
    <h2 class="h2-responsive font-weight-bold text-center my-5">Log del sistema</h2>
    <div class="col-md-4">
        <div class="md-form">
            <i class="prefix" onclick="search_log();"><img src="img/icon6.png"></i>
            <label for="search_log">Buscar...</label>
            <input type="text" name="search_log" id="search_log" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" required="true">
        </div>
    </div>
    <div>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Fecha</th>
                    <th>Usuario</th>
                    <th>IP</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody id="l_log">
                
            </tbody>
            <tfoot>
                <tr>
                  <td colspan="100">
                    <div class="text-right">
                      <div class="input-append input-append">
                        <div class="btn-group" role="group" aria-label="...">
                          <button class="btn btn-blue-grey btn-next" type="button" onclick="mostrar_pre_log();"></button>
                          <div class="btn-group" role="group">
                            <select name="p" id="act_log" class="form-control" onchange="list_log();">
                               <option value="1">1</option>
                            </select>
                            </div>
                          <button class="btn btn-blue-grey btn-back" type="button" onclick="mostrar_nex_log();"></button>
                        </div>
                    </div>
                </td>
                </tr>
            </tfoot>
        </table>
        <center><button class="btn btn-primary" onclick="imprimir_log()">Imprimir PDF</button></center>
        <br>
    </div>
</div>
<script type="text/javascript">
function mostrar_mod_log_sistema() {
    document.getElementById('inicio').style.display="none";
    <?php if ($_SESSION['rol']=='Administrador') {?>
    document.getElementById('user_a').style.display="none";
    document.getElementById('user_b').style.display="none";
    document.getElementById('log_sistema').style.display="block";
    <?php } if ($_SESSION['rol']=='Administrador'||$_SESSION['rol']=='Archivista'||$_SESSION['rol']=='Jefe de archivo') {?>
    document.getElementById('expediente_a').style.display="none";
    document.getElementById('expediente_b').style.display="none";
    document.getElementById('reporte_estadistico').style.display="none";
    document.getElementById('inventario').style.display="none";
    <?php } ?>
    document.getElementById('solicitud_list').style.display="none";
    list_log();
    
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
  var dato = document.getElementById('search_log').value;
  var reg = document.getElementById('l_log');
  num = dato.substring(0,1);
  if (dato=='') {
    list_log();
  }else{
    // Recorremos todas las filas con contenido de la tabla
        for (let i = 0; i < reg.rows.length; i++) {
          var fila = i+1;              
          var celdas = reg.rows[i].getElementsByTagName('td');
          if (num/1) {
            for (let j = 1; j < celdas.length-1; j++) {
              var dat=celdas[j].innerHTML;
              //console.log(dat);
              console.log(dat);
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
            for (let j = 1; j < celdas.length-2; j++) {
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

//Buscador del log
/*
$("#search_log").on('keyup', function (e) {
  var keycode = e.keyCode || e.which;
    if (keycode == 13) {
        search_log();
    }
});*/
</script>