function mostrar_mod_user_a() {
    document.getElementById('inicio').style.display="none";
    document.getElementById('user_a').style.display="block";
    document.getElementById('user_b').style.display="none";
    document.getElementById('expediente_a').style.display="none";
    document.getElementById('expediente_b').style.display="none";
    //alert("Modulo de registro de usuario");
    //document.getElementsByClassName('inicio').style.display="block";
}

function mostrar_mod_user_b() {
    document.getElementById('inicio').style.display="none";
    document.getElementById('user_b').style.display="block";
    document.getElementById('user_a').style.display="none";
    document.getElementById('expediente_a').style.display="none";
    document.getElementById('expediente_b').style.display="none";
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
    //document.getElementsByClassName('inicio').style.display="block";
}

function mostrar_mod_expediente_a() {
    document.getElementById('inicio').style.display="none";
    document.getElementById('user_a').style.display="none";
    document.getElementById('user_b').style.display="none";
    document.getElementById('expediente_a').style.display="block";
    document.getElementById('expediente_b').style.display="none";
    //document.getElementsByClassName('inicio').style.display="block";
}

function mostrar_mod_expediente_b() {
    document.getElementById('inicio').style.display="none";
    document.getElementById('user_a').style.display="none";
    document.getElementById('user_b').style.display="none";
    document.getElementById('expediente_a').style.display="none";
    document.getElementById('expediente_b').style.display="block";
    //document.getElementsByClassName('inicio').style.display="block";
}

//pruebas del jquery

function enviar_formulario() {
    var dato = $('#form_actua_user').serialize();
    alert(dato);
    /*$.ajax({
        url:'#',
        type:'POST',
        data: 'envio='+dato,
    }).done(function(respuesta){

        var llenar_inputs = eval(respuesta);

            
                for (i =0; i < llenar_inputs.length; i++) {
                    
                    datos=llenar_inputs[i][0]+"*"+llenar_inputs[i][1]+"*"+llenar_inputs[i][2];
                    var d = datos.split("*");
                        $("#nombre").val(datos[0]);

                    }



    });*/
}

