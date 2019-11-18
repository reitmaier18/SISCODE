<div class="col-md-10" id="inicio">
    <h2 class="h2-responsive font-weight-bold text-center my-5"> Sistema de Prestamo y Control de Expedientes</h2>
    <h2 class="h2-responsive font-weight-bold text-center my-5">¡Bienvenido! <?php echo $_SESSION['nombre']." ".$_SESSION['apellido']; ?></h2>                        
</div>
<script type="text/javascript">
//Función para mostrar la pantalla de inicio
function mostrar_mod_inicio() {
    document.getElementById('inicio').style.display="block";
    <?php if ($_SESSION['rol']=='Administrador') {?>
    document.getElementById('user_a').style.display="none";
    document.getElementById('user_b').style.display="none";
    document.getElementById('log_sistema').style.display="none";
	<?php } if ($_SESSION['rol']=='Administrador'||$_SESSION['rol']=='Archivista'||$_SESSION['rol']=='Jefe de archivo') {?>
    document.getElementById('expediente_a').style.display="none";
    document.getElementById('expediente_b').style.display="none";
    document.getElementById('reporte_estadistico').style.display="none";
    document.getElementById('inventario').style.display="none";
	<?php } ?>
    document.getElementById('solicitud_list').style.display="none";
}
</script>