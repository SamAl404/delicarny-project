<?php
session_start();
$error = $_GET['error'] ?? null;
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Administrador - Delicarny</title>
  <link rel="stylesheet" href="styles.css" />
  <link rel="shortcut icon" href="./assets/icon2.jpg" type="image/x-icon">
</head>
<body>

<div class="container">
  <div class="login-box">
    
    <a href="../main-page/index.php" class="back-button">
      <img src="./assets/back-arrow.png" alt="Regresar" />
    </a>

    <img src="./assets/Delicarny-logo.jpg" alt="Logo Delicarny" class="logo" />
    
    <div class="login-form">
      <h2>Administrador</h2>
      <?php if ($error): ?>
        <p style="color:red; margin-bottom: 10px;">Usuario o contraseña incorrectos</p>
      <?php endif; ?>
      <form action="login.php" method="POST">
        <input type="text" name="usuario" placeholder="Usuario" required />
        <input type="password" name="contrasena" placeholder="Contraseña" required />
        <button type="submit">Iniciar sesión</button>
      </form>
    </div>
    
  </div>
</div>


</body>
</html>
