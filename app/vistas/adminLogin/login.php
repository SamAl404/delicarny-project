<?php
session_start();

// Usuario y contraseña
$usuarioValido = "admin";
$contrasenaValida = "12345";

$usuario = $_POST['usuario'] ?? '';
$contrasena = $_POST['contrasena'] ?? '';

if ($usuario === $usuarioValido && $contrasena === $contrasenaValida) {
    $_SESSION['admin'] = $usuario;
    header("Location: ../admin-main/index.php");
    exit();
} else {
    header("Location: index.php?error=1");
    exit();
}
