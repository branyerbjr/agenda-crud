<?php
include 'model/conexion.php';
include 'template/contactos/header.php';

// ingresar sesion
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Ahora puedes usar $user_id en esta página para identificar al usuario logueado.
    // Realiza las operaciones necesarias con el ID del usuario.
} else {
    // Si el usuario no ha iniciado sesión, redirige a la página de inicio de sesión.
    header('Location: index.php');
}
// salir sesion
if (isset($_POST['cerrarSesion'])) {
    // Destruye la sesión actual
    session_destroy();

    // Redirige al usuario a la página de inicio de sesión
    header('Location: index.php');
    exit;
}

// AGREGAR 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['guardarContacto'])) {
    $contactoNombre = $_POST['contactoNombre'];
    $contactoEmail = $_POST['contactoEmail'];
    $contactoNumber = $_POST['contactoTelefono'];

    // Lógica para guardar el contacto en la base de datos
    $stmt = $bd->prepare("INSERT INTO contactos (nombre, email, telefono, usuario_id) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$contactoNombre, $contactoEmail, $contactoNumber, $user_id])) {
        header('Location: index.php?page=home'); // Redirige a la página de inicio
        echo "Contacto guardado exitosamente."; // Muestra un mensaje de confirmación
    } else {
        echo "Error al guardar el contacto.";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['guardarEvento'])) {
    $eventoNombre = $_POST['eventoNombre'];
    $fechaEvento = $_POST['fechaEvento'];

    // Lógica para guardar el evento en la base de datos
    $stmt = $bd->prepare("INSERT INTO eventos (nombre, fecha, usuario_id) VALUES (?, ?, ?)");
    if ($stmt->execute([$eventoNombre, $fechaEvento, $user_id])) {
        header('Location: index.php?page=home'); // Redirige a la página de inicio
        echo "Evento guardado exitosamente."; // Muestra un mensaje de confirmación
    } else {
        echo "Error al guardar el evento.";
    }
}
//EDITAR
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editarContacto'])) {
    $contactoId = $_POST['contactoId'];
    $contactoNombre = $_POST['contactoNombre'];
    $contactoEmail = $_POST['contactoEmail'];

    $stmt = $bd->prepare("UPDATE contactos SET nombre = ?, email = ? WHERE id = ?");
    if ($stmt->execute([$contactoNombre, $contactoEmail, $contactoId])) {
        header('Location: index.php?page=home'); // Redirige a la página de inicio
        echo "Contacto actualizado exitosamente."; // Muestra un mensaje de confirmación
    } else {
        echo "Error al actualizar el contacto.";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editarEvento'])) {
    $eventoId = $_POST['eventoId'];
    $eventoNombre = $_POST['eventoNombre'];
    $fechaEvento = $_POST['fechaEvento'];

    $stmt = $bd->prepare("UPDATE eventos SET nombre = ?, fecha = ? WHERE id = ?");
    if ($stmt->execute([$eventoNombre, $fechaEvento, $eventoId])) {
        header('Location: index.php?page=home'); // Redirige a la página de inicio
        echo "Evento actualizado exitosamente."; // Muestra un mensaje de confirmación
    } else {
        echo "Error al actualizar el evento.";
    }
}


// ELIMINAR
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['eliminarContacto'])) {
    $contactoId = $_POST['contactoId'];

    // Lógica para eliminar el contacto de la base de datos
    $stmt = $bd->prepare("DELETE FROM contactos WHERE id = ?");
    if ($stmt->execute([$contactoId])) {
        header('Location: index.php?page=home'); // Redirige a la página de inicio
        echo "Contacto eliminado exitosamente."; // Muestra un mensaje de confirmación
    } else {
        echo "Error al eliminar el contacto.";
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['eliminarEvento'])) {
    $eventoId = $_POST['eventoId'];

    $stmt = $bd->prepare("DELETE FROM eventos WHERE id = ?");
    if ($stmt->execute([$eventoId])) {
        header('Location: index.php?page=home'); // Redirige a la página de inicio
        echo "Evento eliminado exitosamente."; // Muestra un mensaje de confirmación
    } else {
        echo "Error al eliminar el evento.";
    }
}

// Obtener la lista de contactos
$consultaContactos = $bd->query("SELECT * FROM contactos WHERE usuario_id = $user_id");
$contactos = $consultaContactos->fetchAll(PDO::FETCH_ASSOC);

// Obtener la lista de eventos
$consultaEventos = $bd->query("SELECT * FROM eventos WHERE usuario_id = $user_id");
$eventos = $consultaEventos->fetchAll(PDO::FETCH_ASSOC);
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Mi Agenda</a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <form method="post">
                    <button type="submit" name="cerrarSesion" class="btn btn-link nav-link">Cerrar sesión</button>
                </form>
            </li>
        </ul>
    </div>
</nav>

<div class="container mt-4">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregarEventoModal">Agregar Evento</button>
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregarContactoModal">Agregar Contacto</button>
    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#agregarTokenModal">Agregar Token</button>
</div>

<div class="container mt-4">
    <h2>Contactos</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th> <!-- Nuevo campo "Teléfono" -->
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contactos as $contacto) { ?>
                <tr>
                    <td><?= $contacto['nombre'] ?></td>
                    <td><?= $contacto['email'] ?></td>
                    <td><?= $contacto['telefono'] ?></td> <!-- Nuevo campo "Teléfono" -->
                    <td>
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editarContactoModal<?= $contacto['id'] ?>">Editar</button>
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarContactoModal<?= $contacto['id'] ?>">Eliminar</button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<div class="container mt-4">
    <h2>Eventos</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre del Evento</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($eventos as $evento) { ?>
                <tr>
                    <td><?= $evento['nombre'] ?></td>
                    <td><?= $evento['fecha'] ?></td>
                    <td>
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editarEventoModal<?= $evento['id'] ?>">Editar</button>
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarEventoModal<?= $evento['id'] ?>">Eliminar</button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php include 'template/contactos/agregar.php' ?>
<?php include 'template/contactos/editar.php' ?>
<?php include 'template/contactos/eliminar.php' ?>
<?php include  'template/contactos/footer.php' ?>