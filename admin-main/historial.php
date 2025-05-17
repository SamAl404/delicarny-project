<?php
$historial = json_decode(file_get_contents('data/historial.json'), true) ?? [];
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
                    <h3><?= $pedido['nombre'] ?></h3>
                    <p><?= $pedido['descripcion'] ?></p>
                    <p>Total: $<?= $pedido['total'] ?></p>
                    <p>Estado Finalizado</p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
