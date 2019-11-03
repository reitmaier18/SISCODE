<div class="col-md-10" id="user_b">
    <h2 class="h2-responsive font-weight-bold text-center my-5">Actualizar Usuario</h2>
    <p class="text-center">Por favor indique el numero de cedula del usuario que desea actualizar</p>
    <form action="#" method="post" class="col-md-12" id="form_actua_user">
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
                <input type="text" name="ci" id="g" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return check(event)">
                <label for="g">Cedula del funcionario</label>                            
            </div>
        </div>
        <div class="input-group">
            <div class="md-form col-md-2 offset-md-3">
                <button type="button" class="btn btn-primary" onclick="enviar_form_act_user();"> SIGUIENTE </button>    
            </div> 
            <div class="md-form col-md-2 offset-md-1 ">
                <input type="reset" class="btn btn-danger" value="Cancelar">
            </div> 
        </div>
    </form>                        
</div>

<!-- Modal de actualización de usuarios-->
<div class="modal fade" id="basicExampleModal" tabindex="0" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Actualizar datos del usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body container-fluid">
            <form class="col-md-12" id="form_actua_user_final">
                <div class="input-group">
                    <div class="textbox col-md-4 offset-md-1" id="textbox1">
                        <label for="u_a_nombre" data-error="wrong" data-success="right">Nombre del funcionario</label>                            
                        <input type="text" name="nombre" id="u_a_nombre" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return check(event)">
                        
                    </div>
                    <div class="textbox col-md-4 offset-md-2" id="textbox1">
                        <label for="u_a_apellido" data-error="wrong" data-success="right">Apellido del funcionario</label>                            
                        <input type="text" name="apellido" id="u_a_apellido" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return check(event)">
                        
                    </div>
                </div>
                <div class="input-group">
                    <div class="col-md-2 offset-md-1 ">
                        <label for="u_a_nac">Nacionalidad</label>                            
                        <select class="browser-default custom-select custom-select-md mb-3 btn-blue-grey" name="nac" id="u_a_nac">
                            <option disabled>Nac</option>
                            <option value="1">V-</option>
                            <option value="2">E-</option>
                        </select>
                    </div> 
                    <div class="textbox col-md-4 offset-md-0" id="textbox1">
                        <label for="u_a_ci">Cedula del funcionario</label>                            
                        <input type="text" name="ci" id="u_a_ci" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return check(event)">
                        
                    </div>
                    <div class="col-md-4">
                        <label for="u_a_rol">Rol</label>                            
                        <select class="browser-default custom-select custom-select-md mb-3 btn-blue-grey" name="rol" id="u_a_rol">
                            <option disabled>Roll de usuario</option>
                            <option value="1">Administrador</option>
                            <option value="2">Archivista</option>
                            <option value="3">Alguacil</option>                                        
                            <option value="4">Jefe de archivo</option>                                        
                            <option value="5">Juez</option>
                        </select>
                    </div> 
                </div>
                <div class="input-group">
                    <div class="textbox col-md-4 offset-md-1" id="textbox1">
                        <label for="u_a_usuario" data-error="wrong" data-success="right">Usuario del funcionario</label>                            
                        <input type="text" name="usuario" id="u_a_usuario" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return check(event)">
                        
                    </div>
                    <div class="textbox col-md-4 offset-md-2" id="textbox1">
                        <label for="u_a_password" data-error="wrong" data-success="right">Password del funcionario</label>                            
                        <input type="password" name="password" id="u_a_password" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return check(event)">
                        
                    </div>
                </div>
                <div class="input-group col-md-4 offset-md-1" id="oculto">
                    <input type="text" id="valor_oculto" name="id_user"class="form-control disabled">
                </div>
                <div class="input-group">
                    <div class="col-md-3 offset-md-1 ">
                        <label for="u_a_estatus">Estatus</label>                            
                        <select class="browser-default custom-select custom-select-md mb-3 btn-blue-grey" name="estatus" id="u_a_estatus">
                            <option disabled>Estatus</option>
                            <option value="0">Inactivo</option>
                            <option value="1">Activo</option>
                            <option value="2">Bloqueado</option>
                        </select>
                    </div> 
                    <div class="md-form textbox col-md-4 offset-md-3" id="textbox1">
                        <select class="browser-default custom-select custom-select-md mb-3 btn-blue-grey" name="ubicacion" id="u_a_ubicacion">
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
                        
                </div>           
                <div class="input-group">
                    <div class="md-form text-center">
                        <input type="button" class="btn btn-primary text-center" value="Actualizar" onclick="enviar_form_act_user_final();">    
                    </div> 
                    
                </div>
            </form>
        </div>
        
        </div>
    </div>
</div>
<script type="text/javascript">
function mostrar_mod_user_b() {
    document.getElementById('inicio').style.display="none";
    document.getElementById('user_b').style.display="block";
    document.getElementById('user_a').style.display="none";
    document.getElementById('expediente_a').style.display="none";
    document.getElementById('expediente_b').style.display="none";
    document.getElementById('solicitud_list').style.display="none";
    document.getElementById('log_sistema').style.display="none";
    document.getElementById('reporte_estadistico').style.display="none";
    document.getElementById('inventario').style.display="none";
}
/*
* función para enviar datos del usuario para ser buscado
*/
function enviar_form_act_user() {
    var dato = $('#form_actua_user').serialize();
    var cedula = document.getElementById('g').value;
    if (cedula=='') {
        $("#mensaje").modal("show");
        $("#mensaje_text").html('Ingrese cedula');
    }
    $.ajax({
        url:'./../Controlador/buscar_usuario_contrl.php',
        type:'POST',
        data: dato,
    }).done(function(respuesta){
        if (respuesta==0) {
            $("#mensaje").modal("show");
            $("#mensaje_text").html('Usuario no registrado');
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
                $("#u_a_ubicacion").val(datos[9]);
                $('#basicExampleModal').modal("show");
            }    
        }
        
    });
}
/*
* función para enviar datos del usuario para ser actualizados
*/
function enviar_form_act_user_final() {
    var dato = $('#form_actua_user_final').serialize();
    $.ajax({
        url:'./../Controlador/actual_usuario_contrl.php',
        type:'POST',
        data: dato,
    }).done(function(respuesta){
        var datos = eval(respuesta);
        $("#mensaje").modal("show");
        $("#mensaje_text").html(datos);
        $('#form_actua_user_final')[0].reset();
        $('#basicExampleModal').modal("hide");
        $('#form_actua_user')[0].reset();
    });
}
</script>