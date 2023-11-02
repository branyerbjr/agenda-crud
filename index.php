<?php
session_start(); // Inicia la sesión

if (isset($_GET['page'])) {
    if ($_GET['page'] === 'register') {
        include 'template/auth/register.php';
    } elseif ($_GET['page'] === 'recoverypass') {
        include 'template/auth/recoverypass.php';
    } elseif ($_GET['page'] === 'home') {
        // Asegúrate de que el usuario haya iniciado sesión
        if (isset($_SESSION['user_id'])) {
            include 'template/contactos/home.php';
        } else {
            // Si el usuario no ha iniciado sesión, redirige a la página de inicio de sesión
            header('Location: index.php');
        }
    } else {
        include 'template/auth/login.php';
    }
} else {
    include 'template/auth/login.php';
}
?>
