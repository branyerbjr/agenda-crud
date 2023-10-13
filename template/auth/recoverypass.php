<?php include 'template/auth/header.php' ?>
<?php
include 'model/conexion.php';

$emailExists = false;
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Verifica si el email existe en la base de datos (debes tener una tabla de usuarios)
    $stmt = $bd->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch();

    if ($usuario) {
        $emailExists = true;

        if (isset($_POST['submit'])) {
            $newPassword = md5($_POST['newPassword']); // Cifrar la nueva contraseña con MD5

            // Actualizar la contraseña en la base de datos para el usuario correspondiente
            $stmt = $bd->prepare("UPDATE usuarios SET password = ? WHERE email = ?");
            $stmt->execute([$newPassword, $email]);

            $successMessage = "Contraseña restablecida con éxito.";
        }
    }
}
?>

<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <div class="col-md-3 mb-2 mb-md-0">
            <a href="index.php" class="d-inline-flex link-body-emphasis text-decoration-none">
                <i class="bi bi-calendar2-check"></i>
            </a>
        </div>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">

        </ul>

        <div class="col-md-3 text-end">
            <a type="button" href="index.php" class="btn btn-outline-primary me-2">Login</a>
        </div>
    </header>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Recuperación de Contraseña
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Ingresa tu email">
                        </div>

                        <div id="passwordDiv" style="display: <?php echo ($emailExists) ? 'block' : 'none'; ?>;">
                            <div class="mb-3">
                                <label for="newPassword" class="form-label">Nueva Contraseña</label>
                                <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Ingresa tu nueva contraseña">
                            </div>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary" style="display: <?php echo ($emailExists) ? 'block' : 'none'; ?>;">Restablecer Contraseña</button>
                        <button type="submit" id="checkEmail" class="btn btn-primary">Verificar Email</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="text-center text-success mt-3">
    <?php echo $successMessage; ?>
</div>
<?php include 'template/auth/footer.php' ?>