<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../adminLogin/index.php");
    exit();
}
?>


<?php
function getData($file) {
    return json_decode(file_get_contents($file), true) ?? [];
}

function saveData($file, $data) {
    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
}

$pendientesFile = 'data/pendientes.json';
$estadoFile = 'data/estado.json';
$historialFile = 'data/historial.json';

$pendientes = getData($pendientesFile);
$estado = getData($estadoFile);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['aceptar'])) {
        $id = $_POST['id'];
        $pedido = $pendientes[$id];
        $pedido['estado'] = 'Aceptado';
        $estado[] = $pedido;
        unset($pendientes[$id]);
        saveData($pendientesFile, $pendientes);
        saveData($estadoFile, $estado);
    }

    if (isset($_POST['actualizar_estado'])) {
        $id = $_POST['id'];
        $nuevoEstado = $_POST['estado'];

        if ($nuevoEstado === 'Terminar Pedido') {
            $historial = getData($historialFile);
            $historial[] = $estado[$id];
            unset($estado[$id]);
            saveData($historialFile, $historial);
        } else {
            $estado[$id]['estado'] = $nuevoEstado;
        }

        saveData($estadoFile, $estado);
    }

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Administrador de Pedidos</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./assets/icon2.jpg" type="image/x-icon">
</head>
<body>

    <div class="top-bar">
        <img src="assets/Delicarny-logo.jpg" alt="Logo" class="logo">
        <div class="nav-links">
            <a href="historial.php">Historial</a>
            <a href="../adminLogin/logout.php">Cerrar sesión</a>
        </div>
    </div>

    <h1>Administrador de pedidos</h1>
    <div class="container">

        <div class="column">
            <h2>Pendientes de aceptacion</h2>
            <?php foreach ($pendientes as $id => $pedido): ?>
                <div class="card">
                    <h3><?= $pedido['nombre'] ?></h3>
                    <p><?= $pedido['descripcion'] ?></p>
                    <p>Subtotal: $<?= $pedido['subtotal'] ?></p>
                    <p>Total: $<?= $pedido['total'] ?></p>
                    <form method="post">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <button name="aceptar">Aceptar</button>
                        <button name="rechazar">Rechazar</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="column">
            <h2>Estado</h2>
            <?php foreach ($estado as $id => $pedido): ?>
                <div class="card">
                    <h3><?= $pedido['nombre'] ?></h3>
                    <p><?= $pedido['descripcion'] ?></p>
                    <p>Subtotal: $<?= $pedido['subtotal'] ?></p>
                    <p>Total: $<?= $pedido['total'] ?></p>
                    <form method="post">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <select name="estado">
                            <option <?= $pedido['estado'] === 'Aceptado' ? 'selected' : '' ?>>Aceptado</option>
                            <option <?= $pedido['estado'] === 'En preparación' ? 'selected' : '' ?>>En preparación</option>
                            <option <?= $pedido['estado'] === 'Empaquetado' ? 'selected' : '' ?>>Empaquetado</option>
                            <option <?= $pedido['estado'] === 'Por entregar' ? 'selected' : '' ?>>Por entregar</option>
                            <option <?= $pedido['estado'] === 'Pendiente por recogida' ? 'selected' : '' ?>>Pendiente por recogida</option>
                            <option>Terminar Pedido</option>
                        </select>
                        <button name="actualizar_estado">Actualizar</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</body>
</html>
