<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Proyecto III</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
    <script type="text/javascript" src="js/efectos.js"></script>
</head>
<body id="body">
    <!--Este es el header-->
    <div class="container-fluid">
        <!--header>
            <div class="header-logo">
                <img src="img/logo2.png">   
            </div>
            <h1>Sistema de Control y Distribución de Expedientes</h1>
        </header-->
        <!--Navbar -->
        <nav class="mb-1 navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">             
            <div class="header-logo2"  class="navbar-brand">
                <img src="img/logo.png" title="Jurisdicción Disciplinaria Judicial">   
            </div>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333" aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
                <ul class="navbar-nav nav-pills mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" onclick="mostrar_mod_inicio();">INICIO <span class="sr-only">(current)</span></a>
                    </li>                    
                    <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">USUARIOS </a>
                        <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                            <a class="dropdown-item" onclick="mostrar_mod_user_a();">Registrar usuario</a>
                            <a class="dropdown-item" onclick="mostrar_mod_user_b();">Actualizar usuario</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">EXPEDIENTES </a>
                        <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                            <a class="dropdown-item" href="#">Registrar expediente</a>
                            <a class="dropdown-item" href="#">Actualizar expediente</a>
                            <a class="dropdown-item" href="#">Solicitar expediente</a>
                            <a class="dropdown-item" href="#">Inventario de expediente</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">SOLICITUDES </a>
                        <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                            <a class="dropdown-item" href="#">Consultar solicitud</a>
                            <a class="dropdown-item" href="#">Tramitar solicitud</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">REPORTES </a>
                        <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                            <a class="dropdown-item" href="#">Estadistica</a>
                            <a class="dropdown-item" href="#">Tramitar solicitud</a>
                        </div>
                    </li>

                </ul>
                <ul class="navbar-nav ml-auto nav-flex-icons">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="img/icon4.png">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                            <a class="dropdown-item" href="login2.php">Cerrar Sesión</a>
                            <a class="dropdown-item" href="#">Opciones</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!--/.Navbar -->
    </div>
    <!--Aqui comienza la pantalla donde se encuentran los formularios -->
    <section class="my-5 inicio">
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                    <div class="col-md-8" id="inicio">
                        <h2 class="h2-responsive font-weight-bold text-center my-5">¡Bienvenido! <br><br> usuario <br><br> Sistema de Control y Distribución de Expedientes</h2>
                        <p class="text-center"></p>
                    </div>
                    <!--Formularios del usuario -->
                    <div class="col-md-8" id="user_a">
                        <h2 class="h2-responsive font-weight-bold text-center my-5">Registrar Usuario</h2>
                        <form action="#" method="post" class="col-md-12">
                            <div class="input-group">
                                <div class="md-form textbox col-md-4 offset-md-1" id="textbox1">
                                    <!--img src="img/icon2.png" class="prefix"-->
                                    <input type="text" name="#" id="a" class="form-control validate" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return check(event)">
                                    <label for="a" data-error="wrong" data-success="right">Nombre del funcionario</label>                            
                                </div>
                                <div class="md-form textbox col-md-4 offset-md-2" id="textbox1">
                                    <!--img src="img/icon2.png" class="prefix"-->
                                    <input type="text" name="#" id="b" class="form-control validate" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return check(event)">
                                    <label for="b" data-error="wrong" data-success="right">Apellido del funcionario</label>                            
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="md-form col-md-2 offset-md-1 ">
                                    <select class="browser-default custom-select custom-select-md mb-3 btn-blue-grey">
                                        <option disabled>Nac</option>
                                        <option value="1">V-</option>
                                        <option value="2">E-</option>
                                    </select>
                                </div> 
                                <div class="md-form textbox col-md-4 offset-md-0" id="textbox1">
                                    <!--img src="img/icon2.png" class="prefix"-->
                                    <input type="text" name="#" id="c" class="form-control validate" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return check(event)">
                                    <label for="c" data-error="wrong" data-success="right">Cedula del funcionario</label>                            
                                </div>
                                <div class="md-form col-md-4">
                                    <select class="browser-default custom-select custom-select-md mb-3 btn-blue-grey">
                                        <option disabled>Roll de usuario</option>
                                        <option value="1">Administrador</option>
                                        <option value="2">Juez</option>
                                    </select>
                                </div> 
                            </div>
                            <div class="input-group">
                                <div class="md-form textbox col-md-4 offset-md-1" id="textbox1">
                                    <!--img src="img/icon2.png" class="prefix"-->
                                    <input type="text" name="#" id="d" class="form-control validate" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return check(event)">
                                    <label for="d" data-error="wrong" data-success="right">Usuario del funcionario</label>                            
                                </div>
                                <div class="md-form textbox col-md-4 offset-md-2" id="textbox1">
                                    <!--img src="img/icon2.png" class="prefix"-->
                                    <input type="password" name="#" id="f" class="form-control validate" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return check(event)">
                                    <label for="f" data-error="wrong" data-success="right">Password del funcionario</label>                            
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="md-form col-md-2 offset-md-3">
                                    <input type="submit" class="btn btn-success" value="Registrar">    
                                </div> 
                                <div class="md-form col-md-2 offset-md-1 ">
                                    <input type="reset" class="btn btn-danger" value="Cancelar">
                                </div> 
                            </div>
                        </form>
                        <p class="text-center"></p>
                    </div>
                    <!--Formularios del usuario -->
                    <div class="col-md-8" id="user_b">
                        <h2 class="h2-responsive font-weight-bold text-center my-5">Actualizar Usuario</h2>
                        <p class="text-center">Por favor seleccine que dato del usuario desea cambiar</p>
                        <form action="#" method="post" class="col-md-12">
                            <div class="input-group">
                                <div class="md-form col-md-2 offset-md-1 ">
                                    <select class="browser-default custom-select custom-select-md mb-3 btn-blue-grey">
                                        <option disabled>Nac</option>
                                        <option value="1">V-</option>
                                        <option value="2">E-</option>
                                    </select>
                                </div>
                                <div class="md-form textbox col-md-4 offset-md-0" id="textbox1">
                                    <!--img src="img/icon2.png" class="prefix"-->
                                    <input type="text" name="#" id="g" class="form-control validate" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return check(event)">
                                    <label for="g" data-error="wrong" data-success="right">Cedula del funcionario</label>                            
                                </div>
                                <div class="md-form col-md-4">
                                    <select class="browser-default custom-select custom-select-md mb-3 btn-blue-grey">
                                        <option disabled>Dato que desea cambiar</option>
                                        <option value="1">Nombre</option>
                                        <option value="2">Apellido</option>
                                        <option value="3">Nacionalidad</option>
                                        <option value="4">Cedula</option>
                                        <option value="5">Roll</option>
                                        <option value="6">Usuario</option>
                                        <option value="7">Password</option>
                                        <option value="8">Estatus</option>
                                    </select>
                                </div> 
                            </div>
                            <div class="input-group">
                                <div class="md-form col-md-2 offset-md-3">
                                    <input type="submit" class="btn btn-success" value="Siguiente">    
                                </div> 
                                <div class="md-form col-md-2 offset-md-1 ">
                                    <input type="reset" class="btn btn-danger" value="Cancelar">
                                </div> 
                            </div>
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    

    </section>
    
	<!-- SCRIPTS -->
    <script type="text/javascript" src="js/efectos.js"></script>
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.js"></script>
</body>
</html>