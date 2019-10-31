<?php 
    if ($_SESSION['id']==NULL) {
        header('Location: ../login2.php');
    }
    if ($_SESSION['rol']==NULL||$_SESSION['rol']=='Administrador'||$_SESSION['rol']=='Alguacil'||$_SESSION['rol']=='Archivista'||$_SESSION['rol']=='Jefe de archivo') {
        header('Location: ../main.php');
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SISCODE</title>
    <link rel="shortcut icon" href="img/logo2.png">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
    
    
        
    <script>
        
    </script>
</head>
<body id="body">
    <!--Este es el header-->
    <div class="container-fluid">
        
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
                    <li class="nav-item">
                        <a class="nav-link" onclick="mostrar_mod_solicitud_list();">SOLICITUDES <span class="sr-only"></span></a>
                    </li>                    
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
    <!--Aqui comienza la pantalla donde se encuentran los formularios -->
    <section class="my-5 inicio">
        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                    <div class="col-md-10" id="inicio">
                        <h2 class="h2-responsive font-weight-bold text-center my-5"> Sistema de Control y Distribución de Expedientes</h2>
                        <h2 class="h2-responsive font-weight-bold text-center my-5">¡Bienvenido! <?php echo $_SESSION['nombre']." ".$_SESSION['apellido']; ?></h2>                        
                    </div>
                    
                    <!-- Listado de solicitudes -->
                    <div class="col-md-10" id="solicitud_list">
                        <h2 class="h2-responsive font-weight-bold text-center my-5">Listado de solicitudes</h2>
                        
                        <div>
                            <hr>
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <th>#</th>
                                    <th>Fecha</th>
                                    <th>Solicitante</th>
                                    <th>Tipo de solicitud</th>
                                    <th>Expediente</th>
                                    <th>Pieza</th>
                                    <th>Área solicitante</th>
                                    <th>Estatus</th>
                                    <th>Acción</th>
                                </thead>
                                <tbody id="list_solicitud">
                                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                      <td colspan="100">
                                        <div class="text-right">
                                          <div class="input-append input-append">
                                            <div class="btn-group" role="group" aria-label="...">
                                              <button class="btn btn-blue-grey btn-next" type="button" onclick="mostrar_pre();"></button>
                                              <div class="btn-group" role="group">
                                                <select name="p" id="act" class="form-control" onchange="list_solicitud();">
                                                   <option value="1">1</option>
                                                </select>
                                                </div>
                                              <button class="btn btn-blue-grey btn-back" type="button" onclick="mostrar_nex();"></button>
                                            </div>
                                        </div>
                                    </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <center><button class="btn btn-primary" onclick="solicitud_modal();">Solicitar</button></center>
                        <br>
                    </div>

                    
                        <!--Hasta aqui llega el container-->
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </section>
    
    

    <!-- Modal -->
    <div class="modal fade" id="mensaje" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Mensaje</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p id="mensaje_text"></p>
          </div>
          
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade right" id="notificacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
      <div class="modal-dialog modal-sm modal-side modal-top-right" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Notificacion</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ...
          </div>
          
        </div>
      </div>
    </div>

    

    
    
        <!-- Modal para realizar una solicitud -->
    <div class="modal fade" id="solicitud_modal" tabindex="0" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Formulario de solicitud de expedientes y piezas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="false">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" onclick="display_form_sol_int();" 
                      aria-selected="true">Solicitud interna</a>
                  </li>
                  
                </ul>
                <form class="col-md-12" id="form_sol_interna">
                    <br>
                    <div class="input-group">
                        <div class="md-form offset-md-1">
                            <i class="prefix"data-toggle='modal' onclick="display_expe_list();"><img src="img/icon14.png"></i>
                            <label for="sol_int_expe">Expediente</label>
                            <input type="text" name="expediente" id="sol_int_expe" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" required="true" placeholder="Expediente" onblur="auto_select_pieza();">
                        </div>
                        <div class="md-form textbox col-md-4 offset-md-2" id="textbox1">
                            <select class="browser-default custom-select custom-select-md mb-3 btn-blue-grey" onclick="" id="sol_int_pieza" name="pieza" onmouseover="auto_select_pieza();">
                                <option disabled selected>Pieza</option>
                            </select>                            
                        </div>                                
                        
                    </div>

                    <center><label class="btn btn-primary" onclick="registrar_solicitud_int();">registrar</label></center>
                </form>
                
            </div>
        
        </div>
    </div>
    </div>

    <!-- Modal para listar los expedientes -->
    <div class="modal fade" id="expediente_modal" tabindex="0" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="false">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Listado de expedientes</h5>
                <br>
                <div class="md-form input-group col-md-4 offset-md-4">
                  <div class="input-group-append" id="MaterialButton-addon4">
                    <button class="btn btn-md btn-rounded btn-link btn-search  m-0 px-3" type="button" onclick="search_expe_list();"></button>
                    </div>
                  <input type="text" class="form-control" size="10" id="search_expe" placeholder="Buscar..." 
                    aria-describedby="MaterialButton-addon4">
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="false">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>N° expediente</th>
                                <th>Cedula</th>
                                <th>Nombre</th>
                                <th>Estado</th>
                                <th>Tribunal</th>
                            </tr>
                        </thead>
                        <tbody id="l_expediente">
                            
                        </tbody>
                    </table>
                </div>
            </div>
        
        </div>
    </div>
    </div>



    
    </section>
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <!-- SCRIPTS -->
    <script type="text/javascript" src="js/efectos_juez.js"></script>    
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.js"></script>
</body>
</html>