<?php
include 'template/auth/header.php';
include 'model/conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = md5($_POST['password']); // Cifra la contraseña con MD5

    // Realiza la verificación del correo y la contraseña en tu base de datos
    $stmt = $bd->prepare("SELECT * FROM usuarios WHERE email = ? AND password = ?");
    $stmt->execute([$email, $password]);
    $usuario = $stmt->fetch();

    if ($usuario) {
        // Las credenciales son correctas, redirige al usuario a home.php
        header('Location: index.php?page=home');
    }
}
?>

<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-7 text-center text-lg-start">
            <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3">AGENDA - CRUD sign-up</h1>
            <p class="col-lg-10 fs-4">Organiza tus actividades en un solo sistema.</p>
        </div>
        <div class="col-md-10 mx-auto col-lg-5">
            <form method="post" class="p-4 p-md-5 border rounded-3 bg-body-tertiary">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                    <label for="email">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <label for="password">Contraseña</label>
                </div>
                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Recordarme
                    </label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Iniciar sesión</button>
                <hr class="my-4">
                <small class="text-body-secondary"><a href="index.php?page=recoverypass">Olvidé Contraseña</a></small> <br>
                <a href="index.php?page=register">Aun no registrado?</a>
            </form>
        </div>
    </div>
</div>

<?php include 'template/auth/footer.php' ?>