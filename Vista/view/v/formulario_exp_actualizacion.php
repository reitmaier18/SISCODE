<div class="col-md-10" id="expediente_b">
    <h2 class="h2-responsive font-weight-bold text-center my-5">Actualizar expediente</h2>
    <div class="col-md-4">
        <div class="md-form">
            <i class="prefix" onclick="enviar_form_consul_expe();"><img src="img/icon6.png"></i>
            <label for="search">Buscar...</label>
            <input type="text" name="search" id="search" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" required="true">
        </div>
    </div>
    <!--a>rgba(136, 133, 133, 1)</a-->
    <hr>
    <div>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>N° expediente</th>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th>Tribunal</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody id="tc">
                
            </tbody>
        </table>
    </div>
</div>
<!--Modal para listar piezas-->
<div class="modal fade" id="pieza_list" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Listado de piezas del expediente <label id="expediente_pieza"></label></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="table-pieza">
            <table class="table table-bordered">
            <thead class="thead-dark">
                <th>Número de pieza</th>
                <th>Ubicación</th>
                <th>Acción</th>
            </thead>
            <tbody id="l_pieza">
                
            </tbody>
        </table>
        <center><label class="btn btn-ligth" onclick='modal_pieza();'><img src='img/icon11.png' id='detail'></label></center>    
        </div>

        <div id="form-pieza" class="oc">
            <div class="oc"><input type="text" id="num_pieza"></div>
            <div class="input-group">
                <select class="custom-select btn-blue-grey" name="ubicacion" id="ubicacion_pieza">
                    <option disabled selected>Ubicación</option>
                    <option value="1">Tribunal 1</option>
                    <option value="2">Tribunal 2</option>
                    <option value="3">Tribunal 3</option>
                    <option value="4">Corte 1</option>
                    <option value="5">Corte 2</option>
                    <option value="6">Corte 3</option>
                    <option value="7">Sustanciacion</option>
                    <option value="8">Secretaria del tribunal</option>
                    <option value="9">Secretaria de la corte</option>
                    <option value="10">Archivo</option>
                </select>
                
                                            
            </div>
            <div id="btn_a">
                <center><button class="btn btn-primary" type="button" onclick="añadir_pieza();">Aceptar</button></center>
            </div>
            <div id="btn_b" class="oc">
                <center><button class="btn btn-primary" type="button" onclick="update_pieza();">Actualizar</button></center>
            </div>
                   
            
        </div>
        
      </div>
      
    </div>
  </div>
</div>

<!-- Modal para actualizar expediente -->
<div class="modal fade" id="actualizar_expediente" tabindex="0" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar expediente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="false">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="col-md-12" id="form_actualizar_expediente">
                            <div class="input-group">
                                <div class="textbox col-md-4 offset-md-1" id="textbox1">
                                    <label for="numero_expe_update">Numero del expediente</label>                            
                                    <input type="text" name="numero_expe" id="numero_expe_update" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return check(event)">
                                </div>
                            
                                <div class="textbox col-md-4 offset-md-1" id="oculto">
                                    <label for="numero_expe_update">Numero del expediente</label>                            
                                    <input type="text" name="id" id="val_oculto" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return check(event)">
                                </div>

                                <div class="md-form textbox col-md-2">
                                    <select class="browser-default custom-select custom-select-md btn-blue-grey" name="nac" id="nac_expe_update">
                                        <option disabled selected>Nac</option>
                                        <option value="1">V-</option>
                                        <option value="2">E-</option>
                                    </select>
                                </div>
                                <div class="textbox col-md-4 " id="textbox1">
                                    <label for="ci_proc_expe_update">Cedula del procesado</label>
                                    <input type="text" name="ci_procesado" id="ci_proc_expe_update" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return check(event)">
                                </div>                                
                            </div>
                            <div class="input-group">
                                <div class="textbox col-md-4 offset-md-1" id="textbox1">
                                    <label for="nombre_proc_expe_update">Nombre del procesado</label>                            
                                    <input type="text" name="nombre_procesado" id="nombre_proc_expe_update" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return check(event)">
                                </div>
                                <div class="textbox col-md-4 offset-md-2" id="textbox1">
                                    <label for="apellido_proc_expe_update">Apellido del procesado</label>                            
                                    <input type="text" name="apellido_procesado" id="apellido_proc_expe_update" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return check(event)">
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="md-form textbox col-md-4 offset-md-1" id="textbox1">
                                    <select class="browser-default custom-select custom-select-md mb-3 btn-blue-grey" onclick="listar_tribunales_update();" id="estado_update" name="estado">
                                        <option disabled selected>Estado</option>
                                        <option value="1">Amazonas</option>
                                        <option value="2">Anzoátegui</option>
                                        <option value="3">Apure</option>
                                        <option value="4">Aragua</option>
                                        <option value="5">Barinas</option>
                                        <option value="6">Bolívar</option>
                                        <option value="7">Carabobo</option>
                                        <option value="8">Cojedes</option>
                                        <option value="9">Delta Amacuro</option>
                                        <option value="10">Distrito Capital</option>
                                        <option value="11">Falcón</option>
                                        <option value="12">Guárico</option>
                                        <option value="13">Lara</option>
                                        <option value="14">Mérida</option>
                                        <option value="15">Miranda</option>
                                        <option value="16">Monagas</option>
                                        <option value="17">Nueva Esparta</option>
                                        <option value="18">Portuguesa</option>
                                        <option value="19">Sucre</option>
                                        <option value="20">Táchira</option>
                                        <option value="21">Trujillo</option>
                                        <option value="22">Vargas</option>
                                        <option value="23">Yaracuy</option>
                                        <option value="24">Zulia</option>
                                    </select>                            
                                </div>                                
                            </div>
                            <div class="input-group">
                                <div class="md-form col-md-10 offset-md-1">
                                    <select class="browser-default custom-select custom-select-md mb-3 btn-blue-grey" name="tribunal" id="tribunal_update">                                        
                                    </select>                            
                                </div>
                            </div>
                            <div class="input-group text-center" id="oculto">
                                <div class="md-form text-center">
                                    <input type="button" class="btn btn-blue-grey text-center" id="btn-oculto" value="+" title="Añadir tribunal" data-toggle="modal" data-target="#añadir-tribunal">    
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="col-md-2 offset-md-1">
                                    <input type="button" class="btn btn-primary" onmouseover="val_formulario('#form_actualizar_expediente');" onclick="update_expe();" value="Actualizar">    
                                </div> 
                            </div>
                </form>
            </div>
        
        </div>
    </div>
</div>
<script type="text/javascript">
function mostrar_mod_expediente_b() {
    document.getElementById('inicio').style.display="none";
    <?php if ($_SESSION['rol']=='Administrador') {?>
    document.getElementById('user_a').style.display="none";
    document.getElementById('user_b').style.display="none";
    document.getElementById('log_sistema').style.display="none";
    <?php } if ($_SESSION['rol']=='Administrador'||$_SESSION['rol']=='Archivista'||$_SESSION['rol']=='Jefe de archivo') {?>
    document.getElementById('expediente_a').style.display="none";
    document.getElementById('expediente_b').style.display="block";
    document.getElementById('reporte_estadistico').style.display="none";
    document.getElementById('inventario').style.display="none";
    <?php } ?>
    document.getElementById('solicitud_list').style.display="none";
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
/*
* función para listar las piezas del expediente
*/
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
/*
* función para desplegar el modal de las piezas
*/
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
/*
* función para actualizar la ubicación de la pieza
*/
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
/*
* función para desplegar y ocultar modales relacionados a las piezas
*/
function modal_pieza(){
    $('#table-pieza').hide();
    $('#form-pieza').show();
    $('#btn_a').show();
    $('#btn_b').hide();
    //alert("En construcción");
}
/*
* función para añadir pieza a un expediente
*/
function añadir_pieza(){
    var ubicacion = document.getElementById('ubicacion_pieza').value;
    var dato = document.getElementById('search').value;
    $.ajax({
        url:'./../Controlador/añadir_pieza_contrl.php?val='+dato,
        type:'POST',
        data: "value="+ubicacion,
    }).done(function(respuesta){
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
/*
* función para listar los datos de un expediente
*/
function update_form_expe(){
    $("table tbody tr").click(function() {
        var dato = $(this).find("td:eq(1)").text();
        $.ajax({
            url:'./../Controlador/consultar_expediente_act_contrl.php',
            type:'POST',
            data: "value="+dato,
        }).done(function(respuesta){
            var datos = eval(respuesta);
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
/*
* función para actualizar los datos de un expediente
*/
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

//Buscador de expedientes segundo formulario
/*
$("#search").on('keyup', function (e) {
  var keycode = e.keyCode || e.which;
    if (keycode == 13) {
        enviar_form_consul_expe();
    }
});*/
</script>