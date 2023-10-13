<?php
include 'model/conexion.php';
include  'template/contactos/header.php';
// AGREGAR 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['guardarContacto'])) {
    $contactoNombre = $_POST['contactoNombre'];
    $contactoEmail = $_POST['contactoEmail'];

    // Lógica para guardar el contacto en la base de datos
    $stmt = $bd->prepare("INSERT INTO contactos (nombre, email) VALUES (?, ?)");
    if ($stmt->execute([$contactoNombre, $contactoEmail])) {
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
    $stmt = $bd->prepare("INSERT INTO eventos (nombre, fecha) VALUES (?, ?)");
    if ($stmt->execute([$eventoNombre, $fechaEvento])) {
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
$consultaContactos = $bd->query("SELECT * FROM contactos");
$contactos = $consultaContactos->fetchAll(PDO::FETCH_ASSOC);

// Obtener la lista de eventos
$consultaEventos = $bd->query("SELECT * FROM eventos");
$eventos = $consultaEventos->fetchAll(PDO::FETCH_ASSOC);
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Mi Agenda</a>
    </div>
</nav>

<div class="container mt-4">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregarEventoModal">Agregar Evento</button>
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregarContactoModal">Agregar Contacto</button>
</div>

<!-- Modales para agregar evento y contacto -->
<div class="modal fade" id="agregarEventoModal" tabindex="-1" role="dialog" aria-labelledby="agregarEventoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agregarEventoModalLabel">Agregar Evento</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario para agregar evento -->
                <form method="post">
                    <div class="mb-3">
                        <label for="eventoNombre" class="form-label">Nombre del Evento</label>
                        <input type="text" class="form-control" id="eventoNombre" name="eventoNombre">
                    </div>
                    <div class="mb-3">
                        <label for="fechaEvento" class="form-label">Fecha del Evento</label>
                        <input type="date" class="form-control" id="fechaEvento" name="fechaEvento">
                    </div>
                    <button type="submit" name="guardarEvento" class="btn btn-primary">Guardar Evento</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="agregarContactoModal" tabindex="-1" role="dialog" aria-labelledby="agregarContactoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agregarContactoModalLabel">Agregar Contacto</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario para agregar contacto -->
                <form method="post">
                    <div class="mb-3">
                        <label for="contactoNombre" class="form-label">Nombre del Contacto</label>
                        <input type="text" class="form-control" id="contactoNombre" name="contactoNombre">
                    </div>
                    <div class="mb-3">
                        <label for="contactoEmail" class="form-label">Email del Contacto</label>
                        <input type="email" class="form-control" id="contactoEmail" name="contactoEmail">
                    </div>
                    <button type="submit" name="guardarContacto" class="btn btn-success">Guardar Contacto</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<div class="container mt-4">
    <h2>Contactos</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contactos as $contacto) { ?>
                <tr>
                    <td><?= $contacto['nombre'] ?></td>
                    <td><?= $contacto['email'] ?></td>
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
<?php include 'template/contactos/editar.php' ?>
<?php include 'template/contactos/eliminar.php' ?>
<?php include  'template/contactos/footer.php' ?>