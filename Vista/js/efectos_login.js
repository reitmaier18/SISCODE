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

