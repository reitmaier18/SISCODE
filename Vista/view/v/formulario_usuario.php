<div class="col-md-10" id="user_a">
    <h2 class="h2-responsive font-weight-bold text-center my-5">Registrar Usuario</h2>
    <form  class="col-md-12" id="form_reg_user">
        <div class="input-group">
            <div class="md-form textbox col-md-4 offset-md-1" id="textbox1">
                <!--img src="img/icon2.png" class="prefix"-->
                <input type="text" name="nombre" id="a" class="form-control validate validaletras" onkeyup="javascript:this.value=this.value.toUpperCase();">
                <label for="a">Nombre del funcionario</label>                            
            </div>
            <div class="md-form textbox col-md-4 offset-md-2" id="textbox1">
                <!--img src="img/icon2.png" class="prefix"-->
                <input type="text" name="apellido" id="b" class="form-control validate validaletras" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return check(event)">
                <label for="b">Apellido del funcionario</label>                            
            </div>
        </div>
        <div class="input-group">
            <div class="md-form col-md-2 offset-md-1 ">
                <select class="browser-default custom-select custom-select-md mb-3 btn-blue-grey" name="nac">
                    <option disabled>Nac</option>
                    <option value="1" selected>V-</option>
                    <option value="2">E-</option>
                </select>
            </div> 
            <div class="md-form textbox col-md-4 offset-md-0" id="textbox1">
                <!--img src="img/icon2.png" class="prefix"-->
                <input type="text" name="ci" id="c" class="form-control validate  validanumericos" onkeyup="javascript:this.value=this.value.toUpperCase();">
                <label for="c">Cédula del funcionario</label>                            
            </div>
            <div class="md-form col-md-4">
                <select class="browser-default custom-select custom-select-md mb-3 btn-blue-grey" name="rol" id="reg_rol">
                    <option disabled selected>Roll de usuario</option>
                    <option value="1">Administrador</option>
                    <option value="2">Archivista</option>
                    <option value="3">Alguacil</option>                                        
                    <option value="4">Jefe de archivo</option>                                        
                    <option value="5">Juez</option>
                </select>
            </div> 
        </div>
        <div class="input-group">
            <div class="md-form textbox col-md-4 offset-md-1" id="textbox1">
                <!--img src="img/icon2.png" class="prefix"-->
                <input type="text" name="usuario" id="d" class="form-control validate validaletras" onkeyup="javascript:this.value=this.value.toUpperCase();">
                <label for="d">Usuario del funcionario</label>                            
            </div>
            <div class="md-form textbox col-md-4 offset-md-2" id="textbox1">
                <!--img src="img/icon2.png" class="prefix"-->
                <input type="password" name="password" id="f" class="form-control validate" onkeyup="javascript:this.value=this.value.toUpperCase();">
                <label for="f">Password del funcionario</label>                            
            </div>
        </div>
        <div class="input-group">
            <div class="md-form textbox col-md-4 offset-md-4" id="textbox1">
                <select class="browser-default custom-select custom-select-md mb-3 btn-blue-grey" name="ubicacion" id="reg_user_ubicacion">
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
            <div class="md-form col-md-2 offset-md-3">
                <input type="button" class="btn btn-primary" value="Registrar" id="reg_user" onmouseover="val_formulario('#form_reg_user');" onclick="enviar_form_reg_user();">    
            </div> 
            <div class="md-form col-md-2 offset-md-1 ">
                <input type="reset" class="btn btn-danger" value="Cancelar">
            </div> 
        </div>
    </form>
    <p class="text-center"></p>
</div>
<script type="text/javascript">
function mostrar_mod_user_a() {
    document.getElementById('inicio').style.display="none";
    document.getElementById('user_a').style.display="block";
    document.getElementById('user_b').style.display="none";
    document.getElementById('expediente_a').style.display="none";
    document.getElementById('expediente_b').style.display="none";
    document.getElementById('solicitud_list').style.display="none";
    document.getElementById('log_sistema').style.display="none";
    document.getElementById('reporte_estadistico').style.display="none";
    document.getElementById('inventario').style.display="none";
}
/*
* función para enviar datos del usuario para ser registrados
*/
function enviar_form_reg_user() {
    var dato = $('#form_reg_user').serialize();
    $.ajax({
        url:'./../Controlador/crear_usuario_contrl.php',
        type:'POST',
        data: dato,
    }).done(function(respuesta){
        if (respuesta==0) {
            $("#mensaje").modal("show");
            $("#mensaje_text").html('El usuario no fue creado, información de identificación duplicada');    
        }else{
            $("#mensaje").modal("show");
            $("#mensaje_text").html('El usuario fue creado exitosamente');
            $('#form_reg_user')[0].reset();    
        }
    });
}
/*
* función para validar que la cedula del usuario a registrar no este vacia
*/

</script>