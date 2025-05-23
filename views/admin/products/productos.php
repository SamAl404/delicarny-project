<!-- Create Form -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../public/productos.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Bangers&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap");

        body {
            font-family: "Open Sans", sans-serif;
            background: #1c1c1c;
            color: #fff;
            margin: 0;
        }

        .top-bar {
            background: #f5a623;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }

        .top-bar .logo {
            height: 120px;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        tbody {
            background-color: #f5a623;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container row g-3 m-3" style="position: left; left: 20px; top: 20px; width: auto; background: transparent; z-index: 10;">
        <a href="../views/admin/admin-main/index.php" class="btn d-flex align-items-center" style="background-color: #f5a623; color: #fff; width: 100px; height: 50px; text-decoration: none; font-family: 'Bangers', 'system-ui';">
            <span class="me-2">&#8592;</span> Volver
        </a>
    </div>

    <!-- Insert Form -->
    <form method="POST" action="productos.php" class="mb-3">
        <input type="hidden" name="action" value="create">
        <div class="container row g-3 m-3">
            <div class="col-md-4">
                <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
            </div>
            <div class="col-md-2">
                <input type="number" step="0.01" name="valor_unitario" class="form-control" placeholder="Valor Unitario" required>
            </div>
            <div class="col-md-3">
                <select name="estado" class="form-select" required>
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </select>
            </div>
            <div class="col-md-2">
                <select name="id_categoria" class="form-select" required>
                    <option value="" disabled selected>Seleccione una categoría</option>
                    <?php foreach ($categorias as $categoria): ?>
                        <option value="<?= $categoria['id_categoria'] ?>">
                            <?= htmlspecialchars($categoria['nombre']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-1">
                <button type="submit" class="btn" style="background-color: green; color:white">Agregar</button>
            </div>
        </div>
    </form>

    <!-- Products Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-xl">
            <thead class="table-dark">
                <tr class="bg-warning">
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Valor Unitario</th>
                    <th>Estado</th>
                    <th>Categoría</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <?php if (isset($_GET['edit_id']) && $_GET['edit_id'] == $product['id_producto']): ?>
                        <!-- Edit Form Row -->
                        <form method="POST" action="productos.php">
                            <input type="hidden" name="action" value="update">
                            <input type="hidden" name="id_producto" value="<?= $product['id_producto'] ?>">
                            <tr>
                                <td><?= $product['id_producto'] ?></td>
                                <td><input type="text" name="nombre" value="<?= htmlspecialchars($product['nombre']) ?>" class="form-control" required></td>
                                <td><input type="number" step="0.01" name="valor_unitario" value="<?= $product['valor_unitario'] ?>" class="form-control" required></td>
                                <td>
                                    <select name="estado" class="form-select" required>
                                        <option value="1" <?= $product['estado'] ? 'selected' : '' ?>>Activo</option>
                                        <option value="0" <?= !$product['estado'] ? 'selected' : '' ?>>Inactivo</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="id_categoria" class="form-select" required>
                                        <?php foreach ($categorias as $categoria): ?>
                                            <option value="<?= $categoria['id_categoria'] ?>" <?= $categoria['id_categoria'] == $product['id_categoria'] ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($categoria['nombre']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                                    <a href="productos.php" class="btn btn-secondary btn-sm">Cancelar</a>
                                </td>
                            </tr>
                        </form>
                    <?php else: ?>
                        <!-- Normal Row -->
                        <tr>
                            <td><?= $product['id_producto'] ?></td>
                            <td><?= htmlspecialchars($product['nombre']) ?></td>
                            <td>$<?= number_format($product['valor_unitario'], 2) ?></td>
                            <td><?= $product['estado'] ? 'Activo' : 'Inactivo' ?></td>
                            <td><?= htmlspecialchars($product['nombre_categoria']) ?></td>
                            <td>
                                <a href="productos.php?edit_id=<?= $product['id_producto'] ?>" class="btn btn-warning btn-sm">Editar</a>
                                <form method="POST" action="productos.php" style="display:inline-block; margin:0; padding:0;">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="id_producto" value="<?= $product['id_producto'] ?>">
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


</body>

</html>