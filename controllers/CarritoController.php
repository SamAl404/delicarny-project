<?php
session_start();

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

if (isset($_POST['agregar_carrito'])) {
    $id = $_POST['id_producto'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];

    if (isset($_SESSION['carrito'][$id])) {
        $_SESSION['carrito'][$id]['cantidad']++;
    } else {
        $_SESSION['carrito'][$id] = ['nombre' => $nombre, 'precio' => $precio, 'cantidad' => 1];
    }
    header("Location: ../views/menu-page/index.php");
    exit;
}

if (isset($_POST['actualizar'])) {
    foreach ($_POST['cantidades'] as $id => $cantidad) {
        if ($cantidad > 0) {
            $_SESSION['carrito'][$id]['cantidad'] = $cantidad;
        } else {
            unset($_SESSION['carrito'][$id]);
        }
    }
    header("Location: ../views/carrito/index.php");
    exit;
}

if (isset($_POST['eliminar'])) {
    $id = $_POST['id'];
    unset($_SESSION['carrito'][$id]);
    header("Location: ../views/carrito/index.php");
    exit;
}

if (isset($_POST['confirmar_pedido'])) {
    require_once '../config/database.php';
    $db = database::conexion();

    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $id_tipoPago = $_POST['tipo_pago'];

    // Verificar si el cliente ya existe por teléfono
    $stmt = $db->prepare("SELECT id_cliente FROM Cliente WHERE telefono = ?");
    $stmt->bind_param("s", $telefono);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id_cliente);
        $stmt->fetch();
        $stmt_update = $db->prepare("UPDATE Cliente SET nombre = ?, telefono = ? WHERE id_cliente = ?");
        $stmt_update->bind_param("ssi", $nombre, $telefono, $id_cliente);
        $stmt_update->execute();
        $stmt_update->close();
    } else {
        $stmt_insert = $db->prepare("INSERT INTO Cliente (nombre, telefono) VALUES (?, ?)");
        $stmt_insert->bind_param("ss", $nombre, $telefono);
        $stmt_insert->execute();
        $id_cliente = $stmt_insert->insert_id;
        $stmt_insert->close();
    }

    $stmt->close();

    // Calcular el valor total del pedido
    $valor_total = 0;
    foreach ($_SESSION['carrito'] as $item) {
        $valor_total += $item['precio'] * $item['cantidad'];
    }

    // Insertar el pedido
    $fecha = date('Y-m-d');
    $estado = 'Pendiente';
    $stmt_pedido = $db->prepare("INSERT INTO Pedido (direccion, fecha_facturacion, valor_total, estado, id_cliente, id_tipoPago) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt_pedido->bind_param("ssdssi", $direccion, $fecha, $valor_total, $estado, $id_cliente, $id_tipoPago);
    $stmt_pedido->execute();
    $id_pedido = $stmt_pedido->insert_id;
    $stmt_pedido->close();

    // Insertar los detalles del pedido
    $stmt_detalle = $db->prepare("INSERT INTO Detalle_Pedido (cantidad, sub_total, id_pedido, id_producto) VALUES (?, ?, ?, ?)");
    foreach ($_SESSION['carrito'] as $id_producto => $item) {
        $cantidad = $item['cantidad'];
        $sub_total = $item['precio'] * $cantidad;
        $stmt_detalle->bind_param("idii", $cantidad, $sub_total, $id_pedido, $id_producto);
        $stmt_detalle->execute();
    }
    $stmt_detalle->close();

    // Vaciar el carrito
    unset($_SESSION['carrito']);

    // Redireccionar a una página de confirmación
    header("Location: ../views/carrito/confirmacion.php");
    exit;
}

if (isset($_POST['vaciar_carrito'])) {
    unset($_SESSION['carrito']);
    header("Location: ../views/carrito/index.php");
    exit;
}

