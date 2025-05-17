<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagos Delicarny</title>
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7"
    crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style-pagos.css">
    <link rel="shortcut icon" href="icon2.jpg" type="image/x-icon">
</head>
<body>
    <div class="container-fluid p-0" style="background-color: #FFB22C;">
        <nav class="navbar navbar-expand-lg navbar-dark">
          <div class="container">
            <a href="#" class="navbar-brand">
              <img
                src="../main-page/assets/Delicarny-logo.jpg"
                alt="Delicarny logo"
                width="100px" />
            </a>
    
            <button
              class="navbar-toggler"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navmenu">
              <span class="navbar-toggler-icon "></span>
            </button>
            <div class="collapse navbar-collapse" id="navmenu">
              <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                  <a href="../main-page/index.php" class="nav-link" style="font-weight: bold; color: white; text-transform: uppercase;">Inicio</a>
                </li>
                <li class="nav-item " style="font-weight: bold; color: white; text-transform: uppercase;">
                  <a href="../menu-page/index.php" class="nav-link" style="font-weight: bold; color: white; text-transform: uppercase;">Menú</a>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link" style="font-weight: bold; color: white; text-transform: uppercase;">Contacto</a>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link" style="font-weight: bold; color: white; text-transform: uppercase;">Pago</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    <div class="contenedor-pago">
        <h1>Información de Pago</h1>

        <div class="metodo-pago">
            <h2>Transferencia Bancaria</h2>
            <p>Por favor, realiza la transferencia a la siguiente cuenta:</p>
            <p><strong>Número de Cuenta:</strong> 1234-5678-9012-3456</p>
            <p><strong>Banco:</strong> Bancolombia</p>
            <p><strong>Tipo de Cuenta:</strong> Ahorros</p>
        </div>

        <div class="metodo-pago">
            <h2>Pago con Código QR</h2>
            <p>Escanea el siguiente código QR con tu aplicación de pagos:</p>
            <div class="qr-container">
                <img src="ruta/a/tu/codigo-qr.png" alt="Código QR para pago">
            </div>
        </div>

        <div class="metodo-pago">
            <h2>Pago en Efectivo</h2>
            <p>Para el pago en efectivo, por favor sigue estas instrucciones:</p>
            <ol>
                <li>Dirígete a la caja.</li>
                <li>Indica que realizarás un pago el numero de tu mesa.</li>
                <li>Realiza el pago por el valor total de tu compra.</li>
            </ol>
        </div>

        <p class="nota">Una vez realizado el pago, por favor envíanos el comprobante a delicarny@gmail.com o por nuestra linea de WhatsApp al 301 213 8682.</p>
    </div>
    <footer class="py-3 my-4 border-top custom-footer">
        <p class="text-center text-body-secondary">&copy; 2025 DeliCarny|</p>
        <ul>
            <li><a href="#">Menú</a></li>
            <li><a href="#">Ubicación</a></li>
            <li><a href="#">Contacto</a></li>
            <li><a href="#">Términos y Condiciones</a></li>
        </ul>
    </footer>
    <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
    crossorigin="anonymous"
  ></script>
</body>
</html>