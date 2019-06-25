function mostrar_mod_user_a() {
    document.getElementById('inicio').style.display="none";
    document.getElementById('user_a').style.display="block";
    document.getElementById('user_b').style.display="none";
    alert("Modulo de registro de usuario");
    //document.getElementsByClassName('inicio').style.display="block";

}

function mostrar_mod_user_b() {
    document.getElementById('inicio').style.display="none";
    document.getElementById('user_b').style.display="block";
    document.getElementById('user_a').style.display="none";
    alert("Modulo de actualización de usuario");
    //document.getElementsByClassName('inicio').style.display="block";

}

//Función para mostrar la pantalla de inicio
function mostrar_mod_inicio() {
    document.getElementById('inicio').style.display="block";
    document.getElementById('user_a').style.display="none";
    document.getElementById('user_b').style.display="none";
    
    //document.getElementsByClassName('inicio').style.display="block";

}