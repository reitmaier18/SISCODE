function formulario_login() {
  var envio = $('#formulario').serialize();
  //alert(envio);
  $.ajax({
    url:'./../Controlador/login_contrl.php',
    type: 'POST',
    data: envio,
  }).done(function (respuesta) {
    
    var datos = eval(respuesta);
    //alert(datos);
    /*
    if (datos===1) {
      //alert('Aqui estoy');
      window.location="main.php";
    }else{
      alert('Usuario o contrasena invalidos');
    }
    */
    
    switch (datos) {
      case 0:
        alert('Usuario o contrasena invalidos');
        break;
      
      case 1:
        window.location="main.php";
        break;
        
      case 2:
        alert('Este usuario se encuentra activo en otro navegador o PC, por favor cerrar sesión para poder ingresar');
        break;

      case 3:
        alert('Este usuario se encuentra bloqueado');
        break;  

      default:
        break;
    }
    //window.location="main.php";

  }).fail(function () {
    alert('error de sistema');
    

  });
  
}

function check(e) {
	tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8){
        return true;
    }
    patron =/[A-Za-z0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}

window.onload = function() {
  var myInput = document.getElementById('bloquear');
  var myInputb = document.getElementById('bloquearb');
  myInput.onpaste = function(e) {
    e.preventDefault();
    alert("esta acción está prohibida");
  }  
  myInput.oncopy = function(e) {
    e.preventDefault();
    alert("esta acción está prohibida");
  }
  myInputb.onpaste = function(e) {
    e.preventDefault();
    alert("Esta acción está prohibida");
  }  
  myInputb.oncopy = function(e) {
    e.preventDefault();
    alert("Esta acción está prohibida");
  }
}

