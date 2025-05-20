<!-- Create Form -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="productos.css">
    <style>
        
    </style>
</head>
<body>
    
<form method="POST" action="admin.php" class="mb-4">
    <input type="hidden" name="action" value="create">
    <div class="row g-3">
        <div class="col-md-4">
            <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
        </div>
        <div class="col-md-2">
            <input type="number" step="0.01" name="valor_unitario" class="form-control" placeholder="Valor Unitario" required>
        </div>
        <div class="col-md-3">
            <select name="estado" class="form-select" required>
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
            </select>
        </div>
        <div class="col-md-2">
            <input type="number" name="id_categoria" class="form-control" placeholder="Categoría ID" required>
        </div>
        <div class="col-md-1">
            <button type="submit" class="btn btn-primary">Agregar</button>
        </div>
    </div>
</form>

<!-- Products Table -->
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Valor Unitario</th>
            <th>Estado</th>
            <th>Categoría</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product): ?>
        <tr>
            <td><?= $product['id_producto'] ?></td>
            <td><?= htmlspecialchars($product['nombre']) ?></td>
            <td>$<?= number_format($product['valor_unitario'], 2) ?></td>
            <td><?= $product['estado'] ? 'Activo' : 'Inactivo' ?></td>
            <td><?= $product['id_categoria'] ?></td>
            <td>
                <!-- Edit form would need to pass all fields -->
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>

