<?php
session_start();
 if(empty($_SESSION['nombre']) and empty($_SESSION['apellido'])){
    header('location:login/login.php');
 }
?>

<!-- primero se carga el topbar -->
<?php require('./layout/topbar.php'); ?>
<!-- luego se carga el sidebar -->
<?php require('./layout/sidebar.php'); ?>

<!-- inicio del contenido principal -->
<div class="page-content">

    
    <div style="margin-top: 20px;">
    <h3>Accesos Rápidos</h3>
    <a href="plazos_mayores.php" style="display: inline-block; padding: 30px 50px; background-color: #007bff; color: white; text-decoration: none; border-radius: 10px; font-size: 20px;">Gestionar Plazos Mayores</a>
    <a href="plazos_menores.php" style="display: inline-block; padding: 30px 50px; background-color: #28a745; color: white; text-decoration: none; border-radius: 10px; margin-left: 10px; font-size: 20px;">Gestionar Plazos Menores</a>
</div>

</div>
</div>
<!-- fin del contenido principal -->


<!-- por ultimo se carga el footer -->
<?php require('./layout/footer.php'); ?>