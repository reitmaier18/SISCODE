<!--Este es el header-->
    <div class="container-fluid">
        <nav class="mb-1 navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">    <div class="header-logo2"  class="navbar-brand">
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
                    <?php if ($_SESSION['rol']=='Administrador') {?>                    
                    <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">USUARIOS </a>
                        <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                            <a class="dropdown-item" onclick="mostrar_mod_user_a();">Registrar usuario</a>
                            <a class="dropdown-item" onclick="mostrar_mod_user_b();">Actualizar usuario</a>
                        </div>
                    </li><?php }if ($_SESSION['rol']=='Administrador'||$_SESSION['rol']=='Archivista'||$_SESSION['rol']=='Jefe de archivo') {?>
                    <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">EXPEDIENTES </a>
                        <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                            <a class="dropdown-item" onclick="mostrar_mod_expediente_a();">Registrar expediente</a>
                            <a class="dropdown-item" onclick="mostrar_mod_expediente_b();">Actualizar expediente</a>
                        </div>
                    </li><?php } ?>
                    <li class="nav-item">
                        <a class="nav-link" onclick="mostrar_mod_solicitud_list();">SOLICITUDES <span class="sr-only"></span></a>
                    </li>
                    <?php if ($_SESSION['rol']=='Administrador'||$_SESSION['rol']=='Jefe de archivo'||$_SESSION['rol']=='Archivista') {?>
                    <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">REPORTES </a>
                        <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                            <a class="dropdown-item" onclick="mostrar_mod_reporte_estadistico();">Estadistica</a>
                            <a class="dropdown-item" onclick="mostrar_inventario();">Inventario</a><?php if ($_SESSION['rol']=='Administrador') {?>
                            <a class="dropdown-item" onclick="mostrar_mod_log_sistema();">Log del sistema</a><?php } ?>
                        </div>
                    </li><?php } ?>
                </ul>
                <ul class="navbar-nav ml-auto nav-flex-icons">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="img/icon4.png">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                            <a class="dropdown-item" href="../Controlador/cerrar_session_contrl.php">Cerrar Sesión</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!--/.Navbar -->
    </div>