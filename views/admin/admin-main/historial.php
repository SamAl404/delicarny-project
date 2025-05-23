<?php
require_once '../../../config/database.php';
$db = Database::conexion();

// Obtener pedidos finalizados y cancelados
$historial = [];
$sql = "SELECT p.id_pedido, p.valor_total, p.estado, tp.tipo AS tipo_pago
        FROM pedido p
        LEFT JOIN tipo_pago tp ON p.id_tipoPago = tp.id_tipoPago
        WHERE LOWER(p.estado) IN ('finalizado', 'cancelado')";
$result = $db->query($sql);
while ($row = $result->fetch_assoc()) {
    // Obtener subtotal del detalle_pedido
    $id_pedido = $row['id_pedido'];
    $resDetalle = $db->query("SELECT SUM(sub_total) as subtotal FROM detalle_pedido WHERE id_pedido = $id_pedido");
    $detalle = $resDetalle->fetch_assoc();
    $row['subtotal'] = $detalle['subtotal'] ?? 0;
    $historial[] = $row;
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
    <title>Historial de Pedidos</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./assets/icon2.jpg" type="image/x-icon">
</head>

<body>

    <div class="top-bar">
        <img src="assets/Delicarny-logo.jpg" alt="Logo" class="logo">
        <div class="nav-links">
            <a href="index.php">Administrador de pedidos</a>
            <a href="../adminLogin/logout.php">Cerrar sesión</a>
        </div>
    </div>

    <h1>Historial de Pedidos</h1>
    <div class="container">
        <div class="column">
            <?php foreach ($historial as $pedido): ?>
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
                    <p>Estado: <?= ucfirst($pedido['estado']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>