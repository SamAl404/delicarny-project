<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../adminLogin/index.php");
    exit();
}

require_once '../../../config/database.php';
$db = Database::conexion();

// Pedidos pendientes
$pendientes = [];
$sql = "SELECT p.id_pedido, p.valor_total, p.estado, tp.tipo AS tipo_pago
        FROM pedido p
        LEFT JOIN tipo_pago tp ON p.id_tipoPago = tp.id_tipoPago
        WHERE LOWER(p.estado) = 'pendiente'";
$result = $db->query($sql);
while ($row = $result->fetch_assoc()) {
    // Obtener subtotal del detalle_pedido
    $id_pedido = $row['id_pedido'];
    $resDetalle = $db->query("SELECT SUM(sub_total) as subtotal FROM detalle_pedido WHERE id_pedido = $id_pedido");
    $detalle = $resDetalle->fetch_assoc();
    $row['subtotal'] = $detalle['subtotal'] ?? 0;
    $pendientes[] = $row;
}

// Pedidos en estado aceptado o en preparación
$estado = [];
$sql = "SELECT p.id_pedido, p.valor_total, p.estado, tp.tipo AS tipo_pago
        FROM pedido p
        LEFT JOIN tipo_pago tp ON p.id_tipoPago = tp.id_tipoPago
        WHERE LOWER(p.estado) IN ('aceptado', 'en preparación')";
$result = $db->query($sql);
while ($row = $result->fetch_assoc()) {
    $id_pedido = $row['id_pedido'];
    $resDetalle = $db->query("SELECT SUM(sub_total) as subtotal FROM detalle_pedido WHERE id_pedido = $id_pedido");
    $detalle = $resDetalle->fetch_assoc();
    $row['subtotal'] = $detalle['subtotal'] ?? 0;
    $estado[] = $row;
}

// Cambiar estado del pedido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['aceptar'])) {
        $id = intval($_POST['id_pedido']);
        $db->query("UPDATE pedido SET estado = 'en preparación' WHERE id_pedido = $id");
    }
    if (isset($_POST['rechazar'])) {
        $id = intval($_POST['id_pedido']);
        $db->query("UPDATE pedido SET estado = 'Cancelado' WHERE id_pedido = $id");
    }
    if (isset($_POST['actualizar_estado'])) {
        $id = intval($_POST['id_pedido']);
        $nuevoEstado = $db->real_escape_string($_POST['estado']);
        if ($nuevoEstado === 'Finalizar') {
            $db->query("UPDATE pedido SET estado = 'Finalizado' WHERE id_pedido = $id");
        } elseif ($nuevoEstado === 'Cancelar') {
            $db->query("UPDATE pedido SET estado = 'Cancelado' WHERE id_pedido = $id");
        }
    }
    header('Location: index.php');
    exit;
}

function obtenerNombresProductos($db, $id_pedido)
{
    $productos = [];
    $sql = "SELECT pr.nombre, dp.cantidad
            FROM detalle_pedido dp
            INNER JOIN producto pr ON dp.id_producto = pr.id_producto
            WHERE dp.id_pedido = $id_pedido";
    $result = $db->query($sql);
    while ($row = $result->fetch_assoc()) {
        $productos[] = [
            'nombre' => $row['nombre'],
            'cantidad' => $row['cantidad']
        ];
    }
    return $productos;
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
            <a href="../../../public/productos.php">Productos</a>
            <a href="historial.php">Historial</a>
            <a href="../adminLogin/logout.php">Cerrar sesión</a>
        </div>
    </div>

    <h1>Administrador de pedidos</h1>
    <div class="container">

        <!-- Columna de pendientes de aceptación -->
        <div class="column">
            <h2>Pendientes de aceptación</h2>
            <?php foreach ($pendientes as $pedido): ?>
                <div class="card">
                    <h3>Pedido #<?= $pedido['id_pedido'] ?></h3>
                    <strong>Productos:</strong>
                    <ul>
                        <?php foreach (obtenerNombresProductos($db, $pedido['id_pedido']) as $producto): ?>
                            <li><?= htmlspecialchars($producto['nombre']) ?> (x<?= $producto['cantidad'] ?>)</li>
                        <?php endforeach; ?>
                    </ul>
                    
                    <p>Total: $<?= number_format($pedido['valor_total'], 2) ?></p>
                    <p>Tipo de pago: <?= htmlspecialchars($pedido['tipo_pago']) ?></p>
                    <form method="post">
                        <input type="hidden" name="id_pedido" value="<?= $pedido['id_pedido'] ?>">
                        <button type="submit" name="aceptar">Aceptar</button>
                        <button type="submit" name="rechazar">Rechazar</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Columna de estado -->
        <div class="column">
            <h2>Estado</h2>
            <?php foreach ($estado as $pedido): ?>
                <div class="card">
                    <h3>Pedido #<?= $pedido['id_pedido'] ?></h3>
                    <strong>Productos:</strong>
                    <ul>
                        <?php foreach (obtenerNombresProductos($db, $pedido['id_pedido']) as $producto): ?>
                            <li><?= htmlspecialchars($producto['nombre']) ?> (x<?= $producto['cantidad'] ?>)</li>
                        <?php endforeach; ?>
                    </ul>

                    <p>Total: $<?= number_format($pedido['valor_total'], 2) ?></p>
                    <p>Tipo de pago: <?= htmlspecialchars($pedido['tipo_pago']) ?></p>
                    <form method="post">
                        <input type="hidden" name="id_pedido" value="<?= $pedido['id_pedido'] ?>">
                        <select name="estado" required>
                            <option value="Finalizar">Finalizar</option>
                            <option value="Cancelar">Cancelar</option>
                        </select>
                        <button type="submit" name="actualizar_estado">Actualizar</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</body>

</html>