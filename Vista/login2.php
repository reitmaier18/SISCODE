<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Proyecto III</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/est_login.css">
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <!-- SCRIPTS -->
    <script type="text/javascript" src="js/efectos_login.js"></script>
</head>
<body>
    <!--Este es el header-->
    <div class="container-fluid">
        <header>
            <div class="header-logo">
                <img src="img/logo2.png">   
            </div>
            <h1>Jurisdicción Disciplinaria Judicial</h1>
        </header>
    </div>
    <!--Este es el login-->
    <div class="container">
        <div class="row no-gutters">
            <div class="col-sm-6">
                <div class="login-wallpaper">
                    <img src="img/wallpaper2.jpg">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="login-box">
                    <div class="login-icon">
                        <center>
                            <img src="img/icon1.png">
                        </center>
                    </div>
                    <h2>Iniciar Sesión</h2>        
                    <form action="#" method="POST" id="formulario">
                        <div class="md-form textbox" id="textbox1">
                            <img src="img/icon2.png" class="prefix">
                            <input type="text" name="user" id="bloquear" class="form-control validate" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return check(event)">
                            <label for="bloquear" data-error="wrong" data-success="right">Usuario</label>                            
                        </div>
                        <div class="md-form textbox" id="textbox2">
                            <img src="img/icon3.png" class="prefix">
                            <input type="password" name="password" id="bloquearb" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return check(event)">
                            <label for="bloquearb" data-error="wrong" data-success="right">Contraseña</label>
                        </div>
                        <input id="send" type="button" value="Iniciar" onclick="formulario_login();">
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.js"></script>
</body>
</html>