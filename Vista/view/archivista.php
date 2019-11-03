<?php 
    if ($_SESSION['id']==NULL) {
        header('Location: ../../login2.php');
    }
    if ($_SESSION['rol']==NULL||$_SESSION['rol']=='Alguacil'||$_SESSION['rol']=='Juez'||$_SESSION['rol']=='Administrador') {
        header('Location: ../main.php');
    }
?>
<!DOCTYPE html>
<html lang="es">
<?php require 'v/cabecera_commun.php'; ?>
<body id="body">
<!--Este es el header-->
<?php require 'v/menu_commun.php'; ?>    
    <!--Aqui comienza la pantalla donde se encuentran los formularios -->
    <section class="my-5 inicio">
        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                    <!--Inicio-->
                    <?php require 'v/inicio_commun.php'; ?>
                    
                    <!--Formularios del Expediente -->
                    <?php require 'v/formulario_expediente.php'; ?>
                    <!--2 Formularios del Expediente -->
                    <?php require 'v/formulario_exp_actualizacion.php'; ?>
                    <!-- Listado de solicitudes -->
                    <?php require 'v/listado_solicitudes.php'; ?>
                    <!-- Reportes de estadisticos-->
                    <?php require 'v/reporte_estadistico.php'; ?>
                    <!-- Reportes de inventario-->
                    <?php require 'v/reporte_inventario.php'; ?>
                    <!--Hasta aqui llega el container-->
                </div>
            </div>
        </div>
    </section>
    <!-- Modal mensaje-->
    <?php require 'v/modal_mensaje_commun.php'; ?>
    <!-- Modal notificaciones-->
    <?php require 'v/modal_notificacion_commun.php'; ?>
    
    <?php require 'graficas.php'; ?>
    <!-- SCRIPTS -->
    <?php require 'v/enlaces_js_commun.php'; ?>
    
</body>
</html>