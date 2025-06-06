<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pagos Delicarny</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style-pagos.css">
  <link rel="shortcut icon" href="../main-page/assets/icon2.jpg" type="image/x-icon">
</head>

<body class="d-flex flex-column min-vh-100">
  <!-- NAVBAR (igual al de la página principal) -->
  <div class="container-fluid p-0" style="background-color: #FFB22C;">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container">
        <a href="#" class="navbar-brand">
          <img src="../main-page/assets/Delicarny-logo.jpg" alt="Delicarny logo" width="100px" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navmenu">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a href="../../index.php" class="nav-link text-white fw-bold text-uppercase">Inicio</a></li>
            <li class="nav-item"><a href="../menu-page/index.php" class="nav-link text-white fw-bold text-uppercase">Menú</a></li>
            <li class="nav-item"><a href="https://api.whatsapp.com/send/?phone=573044334678" class="nav-link text-white fw-bold text-uppercase">Contacto</a></li>
            <li class="nav-item"><a href="" class="nav-link text-white fw-bold text-uppercase">Pago</a></li>
            <li class="nav-item"><a href="../admin/adminLogin/index.php" class="nav-link text-white fw-bold text-uppercase">Administrador</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
  <main class="flex-grow-1">
    <!-- CONTENIDO PRINCIPAL -->
    <div class="container py-5">
      <h1 class="titulo-pago text-center mb-5">Métodos de Pago</h1>

      <div class="row">
        <!-- Transferencia Bancaria -->
        <div class="col-md-4 mb-4">
          <div class="card metodo-pago h-100">
            <div class="card-body">
              <h2 class="card-title text-center mb-4"><i class="bi bi-bank"></i> Transferencia Bancaria</h2>
              <div class="pago-details">
                <p>Por favor, realiza la transferencia a la siguiente cuenta:</p>
                <div class="detail-item">
                  <span class="detail-label">Banco:</span>
                  <span class="detail-value">Bancolombia</span>
                </div>
                <div class="detail-item">
                  <span class="detail-label">Número de Cuenta:</span>
                  <span class="detail-value">1234-5678-9012-3456</span>
                </div>
                <div class="detail-item">
                  <span class="detail-label">Tipo de Cuenta:</span>
                  <span class="detail-value">Ahorros</span>
                </div>
                <div class="detail-item">
                  <span class="detail-label">Titular:</span>
                  <span class="detail-value">Delicarny SAS</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Pago QR -->
        <div class="col-md-4 mb-4">
          <div class="card metodo-pago h-100">
            <div class="card-body">
              <h2 class="card-title text-center mb-4"><i class="bi bi-qr-code"></i> Pago con QR</h2>
              <div class="qr-container text-center mb-3">
                <img src="qr-example.png" alt="Código QR para pago" class="img-fluid qr-image">
              </div>
              <p class="text-center">Escanea este código con tu aplicación bancaria para realizar el pago.</p>
            </div>
          </div>
        </div>

        <!-- Pago Efectivo -->
        <div class="col-md-4 mb-4">
          <div class="card metodo-pago h-100">
            <div class="card-body">
              <h2 class="card-title text-center mb-4"><i class="bi bi-cash"></i> Pago en Efectivo</h2>
              <div class="pago-instructions">
                <p>Para pagar en efectivo, sigue estas instrucciones:</p>
                <ol class="steps-list">
                  <li>Dirígete a la caja principal.</li>
                  <li>Indica el número de tu mesa.</li>
                  <li>Realiza el pago por el valor total.</li>
                  <li>Solicita tu comprobante de pago.</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="nota-pago text-center mt-5 p-4">
        <h3 class="mb-3">¡Importante!</h3>
        <p>Después de realizar tu pago, envíanos el comprobante a:</p>
        <ul class="list-unstyled">
          <li><strong>Email:</strong> delicarny@gmail.com</li>
          <li><strong>WhatsApp:</strong> 301 213 8682</li>
        </ul>
        <p class="mt-3">Incluye tu número de mesa y pedido en el mensaje.</p>
      </div>
    </div>
  </main>
  <!-- FOOTER -->
  <div class="container-fluid" id="main-footer">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-0 border-top">
      <div class="col-md-4 d-flex align-items-center">
        <span class="mb-3 mb-md-0 text-body-secondary">© 2025 Delicarny</span>
      </div>
      <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
        <li class="ms-3">
          <a class="text-body-secondary" href="https://www.instagram.com/gastrobardelicarny/" aria-label="Instagram">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
              <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
            </svg>
          </a>
        </li>
        <li class="ms-3">
          <a class="text-body-secondary" href="#" aria-label="Facebook">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
              <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
            </svg>
          </a>
        </li>
      </ul>
    </footer>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
</body>

</html>