<?php 
    if ($_SESSION['id']==NULL) {
        header('Location: ../login2.php');
    }
?>
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
                    <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">EXPEDIENTES </a>
                        <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                            <a class="dropdown-item" onclick="mostrar_mod_expediente_a();">Registrar expediente</a>
                            <a class="dropdown-item" onclick="mostrar_mod_expediente_b();">Actualizar expediente</a>
                            
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="mostrar_mod_solicitud_list();">SOLICITUDES <span class="sr-only"></span></a>
                    </li>                    
                    <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">REPORTES </a>
                        <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                            <a class="dropdown-item" onclick="mostrar_mod_reporte_estadistico();">Estadistica</a>
                        </div>
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
                    
                    <!--Formularios del Expediente -->
                    <div class="col-md-10" id="expediente_a">
                        <h2 class="h2-responsive font-weight-bold text-center my-5">Registrar expediente</h2>
                        <form id="form_regis_expe" class="col-md-12">
                            <div class="input-group">
                                <div class="md-form textbox col-md-4 offset-md-1" id="textbox1">
                                    <!--img src="img/icon2.png" class="prefix"-->
                                    <input type="text" name="numero_expe" id="h" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return check(event)">
                                    <label for="h">Numero del expediente</label>                            
                                </div>
                                <div class="md-form col-md-2">
                                    <select class="browser-default custom-select custom-select-md mb-3 btn-blue-grey" name="nac">
                                        <option disabled>Nac</option>
                                        <option value="1" selected>V-</option>
                                        <option value="2">E-</option>
                                    </select>
                                </div>
                                <div class="md-form textbox col-md-4 offset-md-0" id="textbox1">
                                    <!--img src="img/icon2.png" class="prefix"-->
                                    <input type="text" name="ci_procesado" id="i" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return check(event)">
                                    <label for="i">Cedula del procesado</label>                            
                                </div>                                
                            </div>
                            <div class="input-group">
                                <div class="md-form textbox col-md-4 offset-md-1" id="textbox1">
                                    <!--img src="img/icon2.png" class="prefix"-->
                                    <input type="text" name="nombre_procesado" id="j" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return check(event)">
                                    <label for="j">Nombre del procesado</label>                            
                                </div>
                                <div class="md-form textbox col-md-4 offset-md-2" id="textbox1">
                                    <!--img src="img/icon2.png" class="prefix"-->
                                    <input type="text" name="apellido_procesado" id="k" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return check(event)">
                                    <label for="k">Apellido del procesado</label>                            
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="md-form textbox col-md-4 offset-md-1" id="textbox1">
                                    <select class="browser-default custom-select custom-select-md mb-3 btn-blue-grey" onchange="listar_tribunales();" id="estado">
                                        <option disabled selected>Estado</option>
                                        <option value="1">Amazonas</option>
                                        <option value="2">Anzoátegui</option>
                                        <option value="3">Apure</option>
                                        <option value="4">Aragua</option>
                                        <option value="5">Barinas</option>
                                        <option value="6">Bolívar</option>
                                        <option value="7">Carabobo</option>
                                        <option value="8">Cojedes</option>
                                        <option value="9">Delta Amacuro</option>
                                        <option value="10">Distrito Capital</option>
                                        <option value="11">Falcón</option>
                                        <option value="12">Guárico</option>
                                        <option value="13">Lara</option>
                                        <option value="14">Mérida</option>
                                        <option value="15">Miranda</option>
                                        <option value="16">Monagas</option>
                                        <option value="17">Nueva Esparta</option>
                                        <option value="18">Portuguesa</option>
                                        <option value="19">Sucre</option>
                                        <option value="20">Táchira</option>
                                        <option value="21">Trujillo</option>
                                        <option value="22">Vargas</option>
                                        <option value="23">Yaracuy</option>
                                        <option value="24">Zulia</option>
                                    </select>                            
                                </div>
                                <div class="md-form textbox col-md-4 offset-md-1" id="textbox1">
                                    <select class="browser-default custom-select custom-select-md mb-3 btn-blue-grey" name="ubicacion">
                                        <option disabled selected>Ubicación</option>
                                        <option value="1">Tribunal 1</option>
                                        <option value="2">Tribunal 2</option>
                                        <option value="3">Tribunal 3</option>
                                        <option value="4">Corte 1</option>
                                        <option value="5">Corte 2</option>
                                        <option value="6">Corte 3</option>
                                        <option value="7">Sustanciacion</option>
                                        <option value="8">Secretaria del tribunal</option>
                                        <option value="9">Secretaria de la corte</option>
                                        <option value="10">Archivo</option>
                                    </select>                            
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="md-form textbox col-md-10 offset-md-1" id="tribunal">
                                    <select class="browser-default custom-select custom-select-md mb-3 btn-blue-grey" name="tribunal">                                        
                                    </select>                            
                                </div>
                            </div>
                            <div class="input-group text-center" id="oculto">
                                <div class="md-form text-center">
                                    <input type="button" class="btn btn-blue-grey text-center" id="btn-oculto" value="+" title="Añadir tribunal" data-toggle="modal" data-target="#añadir-tribunal">    
                                </div>
                            </div>
                            <div class="input-group text-center">
                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="question" onclick="question();">
                                  <label class="custom-control-label" for="question">Expediente asociado</label>
                                </div>
                            </div>                            
                            <div class="input-group">
                                <div class="md-form col-md-2 offset-md-3">
                                    <input type="button" class="btn btn-primary" onclick="enviar_form_regis_expe();" value="Registrar">    
                                </div> 
                                <div class="md-form col-md-2 offset-md-1 ">
                                    <input type="reset" class="btn btn-danger" value="Cancelar">
                                </div> 
                            </div>
                        </form>                        
                    </div>
                    <!--2 Formularios del Expediente -->
                    <div class="col-md-10" id="expediente_b">
                        <h2 class="h2-responsive font-weight-bold text-center my-5">Actualizar expediente</h2>
                        <div class="col-md-4">
                            <div class="md-form">
                                <i class="prefix" onclick="enviar_form_consul_expe();"><img src="img/icon6.png"></i>
                                <label for="search">Buscar...</label>
                                <input type="text" name="search" id="search" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" required="true">
                            </div>
                        </div>
                        <!--a>rgba(136, 133, 133, 1)</a-->
                        <hr>
                        <div">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>N° expediente</th>
                                        <th>Cedula</th>
                                        <th>Nombre</th>
                                        <th>Estado</th>
                                        <th>Tribunal</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody id="tc">
                                    
                                </tbody>
                            </table>
                        </div>
                    <!-- Listado de solicitudes -->
                    <div class="col-md-10" id="solicitud_list">
                        <h2 class="h2-responsive font-weight-bold text-center my-5">Listado de solicitudes</h2>
                        <div class="col-md-4">
                            <div class="md-form">
                                <i class="prefix"data-toggle='modal' data-target='#solicitud_modal'><img src="img/icon6.png"></i>
                                <label for="search">Buscar...</label>
                                <input type="text" name="search" id="search" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" required="true">
                            </div>
                        </div>
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

                

                    <!-- Reportes de solicitudes atendidas-->
                    <div class="col-md-10" id="reporte_estadistico">
                        <h2 class="h2-responsive font-weight-bold text-center my-5">Estadísticas</h2>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                      <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" role="tab" aria-controls="Solicitudes procesadas"
                                          aria-selected="true" onclick="mostrar_estadistica_solicitud();">Solicitudes</a>
                                      </li>
                                      <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" role="tab" aria-controls="Expedientes registrados"
                                          aria-selected="false" onclick="mostrar_estadistica_expediente();">Expedientes</a>
                                      </li>
                                      
                                    </ul>
                                    
                                </div>
                                <hr>
                            </div>
                        </div>
                        <div id="reporte_solicitud">
                            <hr>
                            <form  class="col-md-12" id="form_rep_solicitud">
                                <div class="input-group">
                                    <div class="md-form textbox col-md-4 offset-md-1" id="textbox1">
                                        <!--img src="img/icon2.png" class="prefix"-->
                                        <input type="date" name="desde" id="desde_solicitud" class="form-control validate">
                                        <label for="desde">Fecha de inicio</label>                            
                                    </div>
                                    <div class="md-form textbox col-md-4 offset-md-2" id="textbox1">
                                        <!--img src="img/icon2.png" class="prefix"-->
                                        <input type="date" name="hasta" id="hasta_solicitud" class="form-control validate">
                                        <label for="b">Fecha de cierre</label>                            
                                    </div>
                                    <div class="col-md-8 offset-md-2">
                                        <center><label class="btn btn-primary" onclick="reporte_solicitud();">Generar reporte</label></center>
                                                                    
                                    </div>
                                </div>
                                <br>

                            </form>
                            <div id="list_reporte_solicitud">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Fecha</th>
                                            <th>Solicitante</th>
                                            <th>Tipo de solicitud</th>
                                            <th>Expediente</th>
                                            <th>Pieza</th>
                                            <th>Área solicitante</th>
                                        </tr>
                                    </thead>
                                    <tbody id="l_reporte_solicitud">
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                          <td colspan="100">
                                            <div class="text-right">
                                              <div class="input-append input-append">
                                                <div class="btn-group" role="group" aria-label="...">
                                                  <button class="btn btn-blue-grey btn-next" type="button" onclick="mostrar_pre_rep_sol();"></button>
                                                  <div class="btn-group" role="group">
                                                    <select name="p" id="act_" class="form-control" onchange="list_rep_sol();">
                                                       <option value="1">1</option>
                                                    </select>
                                                    </div>
                                                  <button class="btn btn-blue-grey btn-back" type="button" onclick="mostrar_nex_rep_sol();"></button>
                                                </div>
                                            </div>
                                        </td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <center><button class="btn btn-primary" onclick="imprimir_reporte_solicitud();">Imprimir PDF</button> <button class="btn btn-blue-grey" onclick="reiniciar_reporte_solicitud();">Regresar</button></center>
                                <br>
                            </div>
                        </div>

                        <div id="reporte_expediente" class="oc">
                            <hr>
                            <form  class="col-md-12" id="form_rep_expediente">
                                <div class="input-group">
                                    <div class="md-form textbox col-md-4 offset-md-1" id="textbox1">
                                        <!--img src="img/icon2.png" class="prefix"-->
                                        <input type="date" name="desde" id="desde_expediente" class="form-control validate">
                                        <label for="desde">Fecha de inicio</label>                            
                                    </div>
                                    <div class="md-form textbox col-md-4 offset-md-2" id="textbox1">
                                        <!--img src="img/icon2.png" class="prefix"-->
                                        <input type="date" name="hasta" id="hasta_expediente" class="form-control validate">
                                        <label for="b">Fecha de cierre</label>                            
                                    </div>
                                    <div class="col-md-8 offset-md-2">
                                        <center><label class="btn btn-primary" onclick="reporte_expediente();">Generar reporte</label></center>
                                                                    
                                    </div>
                                </div>
                                <br>
                            </form>
                            <div id="list_reporte_expediente">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Fecha de registro</th>
                                            <th>N° expediente</th>
                                            <th>Cedula</th>
                                            <th>Nombre</th>
                                            <th>Estado</th>
                                            <th>Tribunal</th>
                                        </tr>
                                    </thead>
                                    <tbody id="l_reporte_expediente">
                                        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                          <td colspan="100">
                                            <div class="text-right">
                                              <div class="input-append input-append">
                                                <div class="btn-group" role="group" aria-label="...">
                                                  <button class="btn btn-blue-grey btn-next" type="button" onclick="mostrar_pre_rep_exp();"></button>
                                                  <div class="btn-group" role="group">
                                                    <select name="p" id="act_" class="form-control" onchange="list_rep_exp();">
                                                       <option value="1">1</option>
                                                    </select>
                                                    </div>
                                                  <button class="btn btn-blue-grey btn-back" type="button" onclick="mostrar_nex_rep_exp();"></button>
                                                </div>
                                            </div>
                                        </td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <center><button class="btn btn-primary" onclick="imprimir_reporte_expediente();">Imprimir PDF</button> <button class="btn btn-blue-grey" onclick="reiniciar_reporte_expediente();">Regresar</button></center>
                                <br>
                            </div>
                        </div>
                    </div>    
                        <!--Hasta aqui llega el container-->
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </section>
    
    <!-- Modal de actualización de usuarios-->
        <div class="modal fade" id="basicExampleModal" tabindex="0" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar datos del usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body container-fluid">
                <form class="col-md-12" id="form_actua_user_final">
                    <div class="input-group">
                        <div class="textbox col-md-4 offset-md-1" id="textbox1">
                            <label for="u_a_nombre" data-error="wrong" data-success="right">Nombre del funcionario</label>                            
                            <input type="text" name="nombre" id="u_a_nombre" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return check(event)">
                            
                        </div>
                        <div class="textbox col-md-4 offset-md-2" id="textbox1">
                            <label for="u_a_apellido" data-error="wrong" data-success="right">Apellido del funcionario</label>                            
                            <input type="text" name="apellido" id="u_a_apellido" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return check(event)">
                            
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="col-md-2 offset-md-1 ">
                            <label for="u_a_nac">Nacionalidad</label>                            
                            <select class="browser-default custom-select custom-select-md mb-3 btn-blue-grey" name="nac" id="u_a_nac">
                                <option disabled>Nac</option>
                                <option value="1">V-</option>
                                <option value="2">E-</option>
                            </select>
                        </div> 
                        <div class="textbox col-md-4 offset-md-0" id="textbox1">
                            <label for="u_a_ci">Cedula del funcionario</label>                            
                            <input type="text" name="ci" id="u_a_ci" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return check(event)">
                            
                        </div>
                        <div class="col-md-4">
                            <label for="u_a_rol">Rol</label>                            
                            <select class="browser-default custom-select custom-select-md mb-3 btn-blue-grey" name="rol" id="u_a_rol">
                                <option disabled>Roll de usuario</option>
                                <option value="1">Administrador</option>
                                <option value="2">Archivista</option>
                                <option value="3">Alguacil</option>                                        
                                <option value="4">Jefe de archivo</option>                                        
                                <option value="5">Juez</option>
                            </select>
                        </div> 
                    </div>
                    <div class="input-group">
                        <div class="textbox col-md-4 offset-md-1" id="textbox1">
                            <label for="u_a_usuario" data-error="wrong" data-success="right">Usuario del funcionario</label>                            
                            <input type="text" name="usuario" id="u_a_usuario" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return check(event)">
                            
                        </div>
                        <div class="textbox col-md-4 offset-md-2" id="textbox1">
                            <label for="u_a_password" data-error="wrong" data-success="right">Password del funcionario</label>                            
                            <input type="password" name="password" id="u_a_password" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return check(event)">
                            
                        </div>
                    </div>
                    <div class="input-group col-md-4 offset-md-1" id="oculto">
                        <input type="text" id="valor_oculto" name="id_user"class="form-control disabled">
                    </div>
                    <div class="input-group">
                        <div class="col-md-3 offset-md-1 ">
                            <label for="u_a_estatus">Estatus</label>                            
                            <select class="browser-default custom-select custom-select-md mb-3 btn-blue-grey" name="estatus" id="u_a_estatus">
                                <option disabled>Estatus</option>
                                <option value="0">Inactivo</option>
                                <option value="1">Activo</option>
                                <option value="2">Bloqueado</option>
                            </select>
                        </div> 
                        <div class="md-form textbox col-md-4 offset-md-3" id="textbox1">
                            <select class="browser-default custom-select custom-select-md mb-3 btn-blue-grey" name="ubicacion" id="u_a_ubicacion">
                                <option disabled selected>Ubicación</option>
                                <option value="1">Tribunal 1</option>
                                <option value="2">Tribunal 2</option>
                                <option value="3">Tribunal 3</option>
                                <option value="4">Corte 1</option>
                                <option value="5">Corte 2</option>
                                <option value="6">Corte 3</option>
                                <option value="7">Sustanciacion</option>
                                <option value="8">Secretaria del tribunal</option>
                                <option value="9">Secretaria de la corte</option>
                                <option value="10">Archivo</option>
                            </select>                            
                        </div>
                            
                    </div>           
                    <div class="input-group">
                        <div class="md-form text-center">
                            <input type="button" class="btn btn-primary text-center" value="Actualizar" onclick="enviar_form_act_user_final();">    
                        </div> 
                        
                    </div>
                </form>
            </div>
            
            </div>
        </div>
    </div>

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

    <!--Modal para listar piezas-->
    <div class="modal fade" id="pieza_list" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Listado de piezas del expediente <label id="expediente_pieza"></label></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id="table-pieza">
                <table class="table table-bordered">
                <thead class="thead-dark">
                    <th>Número de pieza</th>
                    <th>Ubicación</th>
                    <th>Acción</th>
                </thead>
                <tbody id="l_pieza">
                    
                </tbody>
            </table>
            <center><label class="btn btn-ligth" onclick='modal_pieza();'><img src='img/icon11.png' id='detail'></label></center>    
            </div>

            <div id="form-pieza" class="oc">
                <div class="oc"><input type="text" id="num_pieza"></div>
                <div class="input-group">
                    <select class="custom-select btn-blue-grey" name="ubicacion" id="ubicacion_pieza">
                        <option disabled selected>Ubicación</option>
                        <option value="1">Tribunal 1</option>
                        <option value="2">Tribunal 2</option>
                        <option value="3">Tribunal 3</option>
                        <option value="4">Corte 1</option>
                        <option value="5">Corte 2</option>
                        <option value="6">Corte 3</option>
                        <option value="7">Sustanciacion</option>
                        <option value="8">Secretaria del tribunal</option>
                        <option value="9">Secretaria de la corte</option>
                        <option value="10">Archivo</option>
                    </select>
                    
                                                
                </div>
                <div id="btn_a">
                    <center><button class="btn btn-primary" type="button" onclick="añadir_pieza();">Aceptar</button></center>
                </div>
                <div id="btn_b" class="oc">
                    <center><button class="btn btn-primary" type="button" onclick="update_pieza();">Actualizar</button></center>
                </div>
                       
                
            </div>
            
          </div>
          
        </div>
      </div>
    </div>

    <!-- Modal para añadir tribunales -->
    <div class="modal fade" id="añadir-tribunal" tabindex="0" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Añadir tribunal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="false">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="col-md-12" id="form_añadir_tribunal">
                    <div class="input-group">
                        <div class="md-form textbox col-md-11 offset-md-1" id="textbox1">
                            <!--img src="img/icon2.png" class="prefix"-->
                            <input type="text" name="tribunal" id="tribunal1" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return check(event)">
                            <label for="tribunal1" data-error="wrong" data-success="right">Tribunal</label>                            
                        </div>                        
                    </div>
                    <div class="input-group">
                            <div class="md-form textbox col-md-4 offset-md-1" id="textbox1">
                                <select class="browser-default custom-select custom-select-md mb-3 btn-blue-grey" name="estado">
                                    <option disabled selected>Estado</option>
                                    <option value="1">Amazonas</option>
                                    <option value="2">Anzoátegui</option>
                                    <option value="3">Apure</option>
                                    <option value="4">Aragua</option>
                                    <option value="5">Barinas</option>
                                    <option value="6">Bolívar</option>
                                    <option value="7">Carabobo</option>
                                    <option value="8">Cojedes</option>
                                    <option value="9">Delta Amacuro</option>
                                    <option value="10">Distrito Capital</option>
                                    <option value="11">Falcón</option>
                                    <option value="12">Guárico</option>
                                    <option value="13">Lara</option>
                                    <option value="14">Mérida</option>
                                    <option value="15">Miranda</option>
                                    <option value="16">Monagas</option>
                                    <option value="17">Nueva Esparta</option>
                                    <option value="18">Portuguesa</option>
                                    <option value="19">Sucre</option>
                                    <option value="20">Táchira</option>
                                    <option value="21">Trujillo</option>
                                    <option value="22">Vargas</option>
                                    <option value="23">Yaracuy</option>
                                    <option value="24">Zulia</option>
                                </select>                            
                            </div>
                        </div>
                        <div class="input-group text-center">
                            <div class="md-form text-center">
                                <input type="button" class="btn btn-primary text-center" value="Añadir" onclick="añadir_tribunales();">    
                            </div>                         
                        </div>
                </form>
            </div>
        
        </div>
    </div>
    </div>
    <!-- Modal para actualizar expediente -->
    <div class="modal fade" id="actualizar_expediente" tabindex="0" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar expediente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="false">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="col-md-12" id="form_actualizar_expediente">
                            <div class="input-group">
                                <div class="textbox col-md-4 offset-md-1" id="textbox1">
                                    <label for="numero_expe_update">Numero del expediente</label>                            
                                    <input type="text" name="numero_expe" id="numero_expe_update" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return check(event)">
                                </div>
                            
                                <div class="textbox col-md-4 offset-md-1" id="oculto">
                                    <label for="numero_expe_update">Numero del expediente</label>                            
                                    <input type="text" name="id" id="val_oculto" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return check(event)">
                                </div>

                                <div class="md-form textbox col-md-2">
                                    <select class="browser-default custom-select custom-select-md btn-blue-grey" name="nac" id="nac_expe_update">
                                        <option disabled selected>Nac</option>
                                        <option value="1">V-</option>
                                        <option value="2">E-</option>
                                    </select>
                                </div>
                                <div class="textbox col-md-4 " id="textbox1">
                                    <label for="ci_proc_expe_update">Cedula del procesado</label>
                                    <input type="text" name="ci_procesado" id="ci_proc_expe_update" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return check(event)">
                                </div>                                
                            </div>
                            <div class="input-group">
                                <div class="textbox col-md-4 offset-md-1" id="textbox1">
                                    <label for="nombre_proc_expe_update">Nombre del procesado</label>                            
                                    <input type="text" name="nombre_procesado" id="nombre_proc_expe_update" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return check(event)">
                                </div>
                                <div class="textbox col-md-4 offset-md-2" id="textbox1">
                                    <label for="apellido_proc_expe_update">Apellido del procesado</label>                            
                                    <input type="text" name="apellido_procesado" id="apellido_proc_expe_update" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return check(event)">
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="md-form textbox col-md-4 offset-md-1" id="textbox1">
                                    <select class="browser-default custom-select custom-select-md mb-3 btn-blue-grey" onclick="listar_tribunales_update();" id="estado_update" name="estado">
                                        <option disabled selected>Estado</option>
                                        <option value="1">Amazonas</option>
                                        <option value="2">Anzoátegui</option>
                                        <option value="3">Apure</option>
                                        <option value="4">Aragua</option>
                                        <option value="5">Barinas</option>
                                        <option value="6">Bolívar</option>
                                        <option value="7">Carabobo</option>
                                        <option value="8">Cojedes</option>
                                        <option value="9">Delta Amacuro</option>
                                        <option value="10">Distrito Capital</option>
                                        <option value="11">Falcón</option>
                                        <option value="12">Guárico</option>
                                        <option value="13">Lara</option>
                                        <option value="14">Mérida</option>
                                        <option value="15">Miranda</option>
                                        <option value="16">Monagas</option>
                                        <option value="17">Nueva Esparta</option>
                                        <option value="18">Portuguesa</option>
                                        <option value="19">Sucre</option>
                                        <option value="20">Táchira</option>
                                        <option value="21">Trujillo</option>
                                        <option value="22">Vargas</option>
                                        <option value="23">Yaracuy</option>
                                        <option value="24">Zulia</option>
                                    </select>                            
                                </div>                                
                            </div>
                            <div class="input-group">
                                <div class="md-form col-md-10 offset-md-1">
                                    <select class="browser-default custom-select custom-select-md mb-3 btn-blue-grey" name="tribunal" id="tribunal_update">                                        
                                    </select>                            
                                </div>
                            </div>
                            <div class="input-group text-center" id="oculto">
                                <div class="md-form text-center">
                                    <input type="button" class="btn btn-blue-grey text-center" id="btn-oculto" value="+" title="Añadir tribunal" data-toggle="modal" data-target="#añadir-tribunal">    
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="col-md-2 offset-md-1">
                                    <input type="button" class="btn btn-primary" onclick="update_expe();" value="Actualizar">    
                                </div> 
                            </div>
                </form>
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
                  <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" aria-selected="false" onclick="display_form_sol_ext();">Solicitud externa</a>
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
                <form class="col-md-12 oc" id="form_sol_externa">
                    <br>
                    <div class="input-group">
                        <div class="md-form col-md-2 offset-md-3">
                                <select class="browser-default custom-select custom-select-md mb-3 btn-blue-grey" name="nac">
                                    <option disabled>Nac</option>
                                    <option value="1" selected>V-</option>
                                    <option value="2">E-</option>
                                </select>
                            </div> 
                            <div class="md-form textbox col-md-4 offset-md-0" id="textbox1">
                                <!--img src="img/icon2.png" class="prefix"-->
                                <input type="text" name="ci" id="ci_sol_ext" class="form-control validate" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return check(event)" placeholder="Cédula del solicitante">
                                <label for="ci_sol_ext">Cédula del solicitante</label>                            
                            </div>
                        </div>

                    <div class="input-group">
                        <div class="md-form textbox col-md-4 offset-md-1" id="textbox1">
                            <!--img src="img/icon2.png" class="prefix"-->
                            <input type="text" name="nombre" id="nombre_sol_ext" class="form-control validate" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return check(event)" placeholder="Nombre del solicitante">
                            <label for="nombre_sol_ext">Nombre del solicitante</label>                            
                        </div>
                        <div class="md-form textbox col-md-4 offset-md-2" id="textbox1">
                            <!--img src="img/icon2.png" class="prefix"-->
                            <input type="text" name="apellido" id="apellido_sol_ext" class="form-control validate" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeypress="return check(event)" placeholder="Apellido del solicitante">
                            <label for="apellido_sol_ext">Apellido del solicitante</label>                            
                        </div>
                        
                    </div>
                    <div class="input-group">
                        <div class="md-form offset-md-1">
                            <i class="prefix"data-toggle='modal' data-target='' onclick="display_expe_list();"><img src="img/icon14.png"></i>
                            <label for="sol_int_expe">Expediente</label>
                            <input type="text" name="expediente" id="sol_ext_expe" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" required="true" placeholder="Expediente" onblur="auto_select_pieza();">
                        </div>
                        <div class="md-form textbox col-md-4 offset-md-2" id="textbox1">
                            <select class="browser-default custom-select custom-select-md mb-3 btn-blue-grey" id="sol_ext_pieza" name="pieza">
                                <option disabled selected>Pieza</option>
                            </select>                            
                        </div>                                
                        
                    </div>
                    <center><label class="btn btn-primary" onclick="registrar_solicitud_ext();">externa</label></center>
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
                    <button class="btn btn-md btn-rounded btn-link btn-search  m-0 px-3" type="button"></button>
                    </div>
                  <input type="text" class="form-control" size="10" placeholder="Buscar..." 
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
    <script type="text/javascript" src="js/efectos_archivista.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.js"></script>
</body>
</html>