<?php
session_start();
$carrito = $_SESSION['carrito'] ?? [];

require_once '../../config/database.php';
$db = database::conexion();
$tiposPago = $db->query("SELECT id_tipoPago, tipo FROM Tipo_Pago");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Delicarny - Carrito</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/icon2.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../menu-page/style.css">
    <link rel="stylesheet" href="carrito_style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;800&family=Open+Sans&display=swap" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- NAVBAR -->
    <div class="container-fluid p-0" style="background-color: #FFB22C;">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a href="#" class="navbar-brand">
                    <img src="assets/Delicarny-logo.jpg" alt="Delicarny logo" width="100px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navmenu">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a href="../../index.php" class="nav-link text-white fw-bold text-uppercase">Inicio</a></li>
                        <li class="nav-item"><a href="../menu-page/index.php" class="nav-link text-white fw-bold text-uppercase">Menú</a></li>
                        <li class="nav-item"><a href="https://api.whatsapp.com/send/?phone=573044334678" class="nav-link text-white fw-bold text-uppercase">Contacto</a></li>
                        <li class="nav-item"><a href="../pagos-page/pasarela.php" class="nav-link text-white fw-bold text-uppercase">Pago</a></li>
                        <li class="nav-item"><a href="../admin/adminLogin/index.php" class="nav-link text-white fw-bold text-uppercase">Administrador</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <main class="flex-grow-1">
        <!-- CARRITO -->
        <div class="container py-5">
            <h1 class="titulo-menu text-center mb-4">Tu Carrito</h1>

            <?php if (!empty($carrito)): ?>
                <form method="POST" action="../../controllers/CarritoController.php">
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle text-center carrito-table">
                            <thead class="table-warning">
                                <tr>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Subtotal</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($carrito as $id => $item): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($item['nombre']) ?></td>
                                        <td>$<?= number_format($item['precio'], 0, ',', '.') ?></td>
                                        <td><input type="number" name="cantidades[<?= $id ?>]" value="<?= $item['cantidad'] ?>" min="1" class="form-control text-center"></td>
                                        <td>$<?= number_format($item['precio'] * $item['cantidad'], 0, ',', '.') ?></td>
                                        <td>
                                            <form method="POST" action="../../controllers/CarritoController.php">
                                                <input type="hidden" name="id" value="<?= $id ?>">
                                                <button type="submit" name="eliminar" class="btn btn-danger btn-sm">X</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <button type="submit" name="actualizar" class="btn btn-warning">Actualizar cantidades</button>
                        <form method="post" action="../../controllers/CarritoController.php">
                            <button type="submit" name="vaciar_carrito" class="btn btn-outline-dark">Vaciar carrito</button>
                        </form>
                    </div>
                </form>

                <?php
                $total = 0;
                foreach ($carrito as $item) {
                    $total += $item['precio'] * $item['cantidad'];
                }
                ?>
                <h3 class="text-end mb-4">Total a pagar: <strong>$<?= number_format($total, 0, ',', '.') ?></strong></h3>

                <h3 class="mb-3">Información del Cliente</h3>
                <form method="post" action="../../controllers/CarritoController.php">
                    <div class="row g-3 mb-3">
                        <div class="col-md-4"><input type="text" name="nombre" class="form-control" placeholder="Nombre" required></div>
                        <div class="col-md-4"><input type="text" name="telefono" class="form-control" placeholder="Teléfono" required></div>
                        <div class="col-md-4"><input type="text" name="direccion" class="form-control" placeholder="Dirección (si aplica)"></div>
                    </div>
                    <div class="mb-3">
                        <label for="tipo_pago" class="form-label">Tipo de pago:</label>
                        <select name="tipo_pago" id="tipo_pago" class="form-select w-50" required>
                            <?php while ($row = $tiposPago->fetch_assoc()): ?>
                                <option value="<?= $row['id_tipoPago'] ?>"><?= htmlspecialchars($row['tipo']) ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <button type="submit" name="confirmar_pedido" class="btn btn-success">Confirmar Pedido</button>
                </form>
            <?php else: ?>
                <p class="alert alert-info text-center">Tu carrito está vacío. Agrega productos para realizar un pedido.</p>
            <?php endif; ?>
        </div>
    </main>
    <!-- FOOTER -->
    <div class="container-fluid" id="main-footer">
        <footer
            class="d-flex flex-wrap justify-content-between align-items-center py-3 my-0 border-top">
            <div class="col-md-4 d-flex align-items-center">
                <a
                    href="/"
                    class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1"
                    aria-label="Bootstrap">
                    <svg class="bi" width="30" height="24" aria-hidden="true">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>
                <span class="mb-3 mb-md-0 text-body-secondary">© 2025 Delicarny</span>
            </div>

            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                <li class="ms-3">
                    <a class="text-body-secondary" href="https://www.instagram.com/gastrobardelicarny/" aria-label="Instagram">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="32"
                            height="32  "
                            fill="currentColor"
                            class="bi bi-instagram"
                            viewBox="0 0 16 16">
                            <path
                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                        </svg></a>
                </li>
                <li class="ms-3">
                    <a class="text-body-secondary" href="#" aria-label="Facebook"><svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="32"
                            height="32"
                            fill="currentColor"
                            class="bi bi-facebook"
                            viewBox="0 0 16 16">
                            <path
                                d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                        </svg></a>
                </li>
            </ul>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>