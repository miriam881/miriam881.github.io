<?php
session_start();
if (empty($_SESSION['user']) && empty($_SESSION['clave'])) {
    header('location:./vista/login/login.php');
    exit; // Asegúrate de detener el script después de redirigir
} else {
    // Si la sesión está activa, redirigir a inicio
    header('location:./vista/inicio.php');
    exit; // Detén el script después de redirigir
}
?>
