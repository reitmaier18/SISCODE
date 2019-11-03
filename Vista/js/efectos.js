//funcion que mide el tiempo de inactividad de un usuario en el sistema para poder sacarlo del mismo, el intervalo de tiempo es de 10min
var tiempo = 0;

window.onload=function(){
    
    var intervalo_tiempo = setInterval(incremento_tiempo, 60000); // 1 minute

    //alert("hola aqui esta el temporizador");
    $(this).mousemove(function (e) { 
     tiempo = 0; 
    }); 
    $(this).keypress(function (e) { 
     tiempo = 0; 
    }); 

}
function incremento_tiempo() { 
    tiempo = tiempo + 1; 
    //console.log(tiempo);
    if (tiempo > 10) { // 20 minutes 
        window.location="../Controlador/cerrar_session_contrl.php"; 
    } 
}

















