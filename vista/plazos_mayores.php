<?php
 session_start();
 if(empty($_SESSION['nombre']) and empty($_SESSION['apellido'])){
    header('location:login/login.php');
 }

?>
<style>
    ul li:nth-child(1) .activo{
        background: rgb(11, 150, 214) !important;
        
    }
</style>

<!-- primero se carga el topbar -->
<?php require('./layout/topbar.php'); ?>
<!-- luego se carga el sidebar -->
<?php require('./layout/sidebar.php'); ?>

<!-- inicio del contenido principal -->
<div class="page-content">

    <h4 class="text-center text-secondary">CRONOGRAMA DE PLAZOS MAYORES</h4>
    <?php
    include "../modelo/conexion.php";
    include "../controlador/controlador_plazos_mayores.php";
    include "../controlador/controlador_eliminar_usuario.php";
    
    $sql = $conexion->query(" SELECT * from usuario ");

    ?>
    <?php 

    ?>

     
    <script>
        setTimeout(() => {
            window.history.replaceState(null, null, window.location.pathname);

        }, 0);
    </script>

    

</div>
</div>
<!-- fin del contenido principal -->


<!-- por ultimo se carga el footer -->
<?php require('./layout/footer.php'); ?>