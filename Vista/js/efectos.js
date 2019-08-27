function mostrar_mod_user_a() {
    document.getElementById('inicio').style.display="none";
    document.getElementById('user_a').style.display="block";
    document.getElementById('user_b').style.display="none";
    document.getElementById('expediente_a').style.display="none";
    document.getElementById('expediente_b').style.display="none";
    document.getElementById('expediente_c').style.display="none";
    //alert("Modulo de registro de usuario");
    //document.getElementsByClassName('inicio').style.display="block";
}

function mostrar_mod_user_b() {
    document.getElementById('inicio').style.display="none";
    document.getElementById('user_b').style.display="block";
    document.getElementById('user_a').style.display="none";
    document.getElementById('expediente_a').style.display="none";
    document.getElementById('expediente_b').style.display="none";
    document.getElementById('expediente_c').style.display="none";
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
    document.getElementById('expediente_c').style.display="none";
    //document.getElementsByClassName('inicio').style.display="block";
}

function mostrar_mod_expediente_a() {
    document.getElementById('inicio').style.display="none";
    document.getElementById('user_a').style.display="none";
    document.getElementById('user_b').style.display="none";
    document.getElementById('expediente_a').style.display="block";
    document.getElementById('expediente_b').style.display="none";
    document.getElementById('expediente_c').style.display="none";
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
        $('#tribunal_update select').html(respuesta).fadeIn();           
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
        window.location="main.php";      
    });
}

function mostrar_mod_expediente_b() {
    document.getElementById('inicio').style.display="none";
    document.getElementById('user_a').style.display="none";
    document.getElementById('user_b').style.display="none";
    document.getElementById('expediente_a').style.display="none";
    document.getElementById('expediente_b').style.display="block";
    document.getElementById('expediente_c').style.display="none";
    //document.getElementsByClassName('inicio').style.display="block";
}

function mostrar_mod_expediente_c() {
    document.getElementById('inicio').style.display="none";
    document.getElementById('user_a').style.display="none";
    document.getElementById('user_b').style.display="none";
    document.getElementById('expediente_a').style.display="none";
    document.getElementById('expediente_b').style.display="none";
    document.getElementById('expediente_c').style.display="block";
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
        window.location="main.php";       
    });

}

/*
* función para enviar datos del usuario para ser buscado
*/
function enviar_form_act_user() {
    var dato = $('#form_actua_user').serialize();
    //alert(dato);
    $.ajax({
        url:'./../Controlador/buscar_usuario_contrl.php',
        type:'POST',
        data: dato,
    }).done(function(respuesta){
        //alert(respuesta);
        if (respuesta==0) {
            alert('Usuario no registrado');
            window.location="main.php";
        }
        var datos = eval(respuesta);
        //alert(dato);
        
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

                    }
    });
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
        alert(datos);
        window.location="main.php"; 
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
        //alert(respuesta);
        var datos = eval(respuesta);
        
    });
}

/*
* función para enviar datos del expediente para ser actualizados
*/
function enviar_form_act_expe(){
    var dato = $('#form_act_expe').serialize();
    $.ajax({
        url:'./../Controlador/consultar_expediente_contrl.php',
        type:'POST',
        data: dato,
    }).done(function(respuesta){
        //alert(respuesta);
        if (respuesta=='Este expediente no existe') {
            alert(respuesta);
        }else{
            var datos = eval(respuesta);
            //alert (datos['nombre']);    
            //alert(datos[1]);
            $("#numero_expe_update").val(datos[0]);
            $("#nac_expe_update").val(datos[5]);
            $("#ci_proc_expe_update").val(datos[6]);
            $("#nombre_proc_expe_update").val(datos[3]);
            $("#apellido_proc_expe_update").val(datos[4]);
            $("#estado_update").val(datos[2]);
            $('#tribunal_update select').html(datos[1]).fadeIn();
        }
        
        
        
        //window.location="main.php";*/
    });
}
