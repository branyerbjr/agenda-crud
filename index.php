<?php
if (isset($_GET['page']) && $_GET['page'] === 'register') {
    include 'template/auth/register.php';
}elseif (isset($_GET['page']) && $_GET['page'] === 'recoverypass'){
    include 'template/auth/recoverypass.php';
}elseif (isset($_GET['page']) && $_GET['page'] === 'home'){
    include 'template/contactos/home.php';
} 
else {
    include 'template/auth/login.php';
}
?>