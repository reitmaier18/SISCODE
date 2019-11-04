<div class="col-md-10" id="expediente_a">
    <h2 class="h2-responsive font-weight-bold text-center my-5">Registrar expediente</h2>
    <form id="form_regis_expe" class="col-md-12">
        <div class="input-group">
            <div class="md-form textbox col-md-4 offset-md-1" id="textbox1">
                <!--img src="img/icon2.png" class="prefix"-->
                <input type="text" name="numero_expe" id="h" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();">
                <label for="h">Número del expediente</label>                            
            </div>
            <div class="md-form col-md-2">
                <select class="browser-default custom-select custom-select-md mb-3 btn-blue-grey" name="nac">
                    <option disabled>Nac</option>
                    <option value="1" selected>V-</option>
                    <option value="2">E-</option>
                </select>
            </div>
            <div class="md-form textbox col-md-4 offset-md-0" id="textbox1">
                <!--img src="img/icon2.png" class="prefix"-->
                <input type="text" name="ci_procesado" id="i" class="form-control validanumericos" onkeyup="javascript:this.value=this.value.toUpperCase();">
                <label for="i">Cédula del procesado</label>                            
            </div>                                
        </div>
        <div class="input-group">
            <div class="md-form textbox col-md-4 offset-md-1" id="textbox1">
                <!--img src="img/icon2.png" class="prefix"-->
                <input type="text" name="nombre_procesado" id="j" class="form-control validaletras" onkeyup="javascript:this.value=this.value.toUpperCase();">
                <label for="j">Nombre del procesado</label>                            
            </div>
            <div class="md-form textbox col-md-4 offset-md-2" id="textbox1">
                <!--img src="img/icon2.png" class="prefix"-->
                <input type="text" name="apellido_procesado" id="k" class="form-control validaletras" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return check(event)">
                <label for="k">Apellido del procesado</label>                            
            </div>
        </div>
        <div class="input-group">
            <div class="md-form textbox col-md-4 offset-md-1" id="textbox1">
                <select class="browser-default custom-select custom-select-md mb-3 btn-blue-grey" onchange="listar_tribunales();" id="estado">
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
            <div class="md-form textbox col-md-4 offset-md-1" id="textbox1">
                <select class="browser-default custom-select custom-select-md mb-3 btn-blue-grey" name="ubicacion">
                    <option disabled selected>Ubicación</option>
                    <option value="1">Tribunal 1</option>
                    <option value="2">Tribunal 2</option>
                    <option value="3">Tribunal 3</option>
                    <option value="4">Corte 1</option>
                    <option value="5">Corte 2</option>
                    <option value="6">Corte 3</option>
                    <option value="7">Sustanciación</option>
                    <option value="8">Secretaría del tribunal</option>
                    <option value="9">Secretaría de la corte</option>
                    <option value="10">Archivo</option>
                </select>                            
            </div>
        </div>
        <div class="input-group">
            <div class="md-form textbox col-md-10 offset-md-1" id="tribunal">
                <select class="browser-default custom-select custom-select-md mb-3 btn-blue-grey" name="tribunal">                                        
                </select>                            
            </div>
        </div>
        
            <div class="md-form text-center">
                <center>
                    <input type="button" class="btn btn-blue-grey text-center" id="btn-oculto" value="+" title="Añadir tribunal" data-toggle="modal" data-target="#añadir-tribunal">
                </center>    
            </div>
        
        <div class="input-group text-center">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" onclick="habilitar_expediente_asociado();" onblur="habilitar_expediente_asociado();" id="question" onclick="question();">
              <label class="custom-control-label" for="question">Expediente asociado</label>
            </div>
        </div>
        <div class="input-group oc" id="n_asociado">
            <div class="md-form textbox col-md-4 offset-md-1" id="textbox1">
              <input type="text" name="numero_expediente_asociado" id="numero_expediente_asociado" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return check(event)" disabled="true">
                <label for="numero_expediente_asociado">Número del asociado</label>
            </div>
        </div>                            
        <div class="input-group">
            <div class="md-form col-md-2 offset-md-3">
                <input type="button" class="btn btn-primary" onmouseover="val_formulario('#form_regis_expe');" onclick="enviar_form_regis_expe();" value="Registrar">    
            </div> 
            <div class="md-form col-md-2 offset-md-1 ">
                <input type="reset" class="btn btn-danger" value="Cancelar">
            </div> 
        </div>
    </form>                        
</div>
<!-- Modal para añadir tribunales -->
<div class="modal fade" id="añadir-tribunal" tabindex="0" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Añadir tribunal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="false">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="col-md-12" id="form_añadir_tribunal">
                    <div class="input-group">
                        <div class="md-form textbox col-md-11 offset-md-1" id="textbox1">
                            <!--img src="img/icon2.png" class="prefix"-->
                            <input type="text" name="tribunal" id="tribunal1" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return check(event)">
                            <label for="tribunal1" data-error="wrong" data-success="right">Tribunal</label>                            
                        </div>                        
                    </div>
                    <div class="input-group">
                            <div class="md-form textbox col-md-4 offset-md-1" id="textbox1">
                                <select class="browser-default custom-select custom-select-md mb-3 btn-blue-grey" name="estado">
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
                        <div class="input-group text-center">
                            <div class="md-form text-center">
                                <input type="button" class="btn btn-primary text-center" value="Añadir" onclick="añadir_tribunales();">    
                            </div>                         
                        </div>
                </form>
            </div>
        
        </div>
    </div>
</div>
<script type="text/javascript">
function mostrar_mod_expediente_a() {
    document.getElementById('inicio').style.display="none";
    <?php if ($_SESSION['rol']=='Administrador') {?>
    document.getElementById('user_a').style.display="none";
    document.getElementById('user_b').style.display="none";
    document.getElementById('log_sistema').style.display="none";
    <?php } if ($_SESSION['rol']=='Administrador'||$_SESSION['rol']=='Archivista'||$_SESSION['rol']=='Jefe de archivo') {?>
    document.getElementById('expediente_a').style.display="block";
    document.getElementById('expediente_b').style.display="none";
    document.getElementById('reporte_estadistico').style.display="none";
    document.getElementById('inventario').style.display="none";
    <?php } ?>
    document.getElementById('solicitud_list').style.display="none";
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
function añadir_tribunales(){
    var dato = $('#form_añadir_tribunal').serialize();
    $.ajax({
        url:'./../Controlador/añadir_tribunales_contrl.php',
        type:'POST',
        data: dato,
    }).done(function(respuesta){
        $("#mensaje").modal("show");
        $("#mensaje_text").html(respuesta);
        $("#añadir-tribunal").modal("hide");
    });
}
/*
* función para enviar datos del expediente para ser registrados
*/
function enviar_form_regis_expe(){
    var dato = $('#form_regis_expe').serialize();
    $.ajax({
        url:'./../Controlador/registrar_expediente_contrl.php',
        type:'POST',
        data: dato,
    }).done(function(respuesta){
        $("#mensaje").modal("show");
        $("#mensaje_text").html(respuesta);
        $('#form_regis_expe')[0].reset();
    });
}
/*
* función para habilitar el registro de expediente sociado
*/
function habilitar_expediente_asociado(){
    var question = document.getElementById('question').checked;
    if(question){
      $('#n_asociado').show();
      document.getElementById('numero_expediente_asociado').disabled=false;
    }else{
      $('#n_asociado').hide();
      document.getElementById('numero_expediente_asociado').disabled=true;
    }
}
</script>