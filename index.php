<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Delicarny</title>
  <link rel="shortcut icon" href="./views/main-page/assets/icon.jpg" type="image/x-icon">
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="./views/main-page/style.css" />
</head>

<body>
  <div class="container-fluid p-0" style="background-color: #FFB22C;">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container">
        <a href="#" class="navbar-brand">
          <img
            src="./views/main-page/assets/Delicarny-logo.jpg"
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
              <a href="" class="nav-link" style="font-weight: bold; color: white; text-transform: uppercase;">Inicio</a>
            </li>
            <li class="nav-item " style="font-weight: bold; color: white; text-transform: uppercase;">
              <a href="./views/menu-page/index.php" class="nav-link" style="font-weight: bold; color: white; text-transform: uppercase;">Menú</a>
            </li>
            <li class="nav-item">
              <a href="https://api.whatsapp.com/send/?phone=573044334678&text&type=phone_number&app_absent=0" class="nav-link" style="font-weight: bold; color: white; text-transform: uppercase;">Contacto</a>
            </li>
            <li class="nav-item">
              <a href="./views/pagos-page/pasarela.php" class="nav-link" style="font-weight: bold; color: white; text-transform: uppercase;">Pago</a>
            </li>
            <li class="nav-item">
              <a href="./views/admin/adminLogin/index.php" class="nav-link" style="font-weight: bold; color: white; text-transform: uppercase;">Administrador</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>

  <div class="container-fluid p-0">
    <div class="bg-dark text-secondary px-4 py-5 text-center" id="header">
      <div class="py-5">
        <h1 class="fw-bold text-white">Delicarny</h1>
        <div class="col-lg-6 mx-auto">
          <p class="mb-4">Paciencia y sabor la combinación perfecta</p>
          <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="./views/menu-page/index.php">
              <button
                type="button"
                class="btn btn-outline btn-lg px-4 me-sm-3 "
                id="button-header">
                Ver Menú
              </button>
            </a>

          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container m-6">
    <h1 class="fw-bold text-black" id="heading2">
      Conoce nuestros productos
    </h1>
    <div id="carouselExampleIndicators" class="carousel slide">
      <div class="carousel-indicators">
        <button
          type="button"
          data-bs-target="#carouselExampleIndicators"
          data-bs-slide-to="0"
          class="active"
          aria-current="true"
          aria-label="Slide 1"></button>
        <button
          type="button"
          data-bs-target="#carouselExampleIndicators"
          data-bs-slide-to="1"
          aria-label="Slide 2"></button>
        <button
          type="button"
          data-bs-target="#carouselExampleIndicators"
          data-bs-slide-to="2"
          aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img
            src="./views/main-page/assets/pexels-jonathanborba-2983101.jpg"
            class="d-block w-100"
            alt="..." />
        </div>
        <div class="carousel-item">
          <img
            src="./views/main-page/assets/pexels-dzeninalukac-1583884.jpg"
            class="d-block w-100"
            alt="..." />
        </div>
        <div class="carousel-item">
          <img
            src="./views/main-page/assets/pexels-caleboquendo-3023479.jpg"
            class="d-block w-100"
            alt="..." />
        </div>
      </div>
      <button
        class="carousel-control-prev"
        type="button"
        data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button
        class="carousel-control-next"
        type="button"
        data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
  <div class="container-fluid bg-dark my-4">
    <div class="container col-xxl-8 px-4 py-5">
      <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
          <img
            src="./views/main-page/assets/WhatsApp Image 2025-04-01 at 17.41.43_deb06a71.jpg"
            class="d-block mx-lg-auto img-fluid"
            alt="Bootstrap Themes"
            width="700"
            height="500"
            loading="lazy"
            style="border-radius: 20%" />
        </div>
        <div class="col-lg-6">
          <h1
            class=" lh-1 mb-3"
            style="color: white; font-size: 5vw;">
            Ubicación
          </h1>
          <p class="lead">Lunes a Domingo 5:00 Pm a 12:00 Am</p>
          <p class="lead">Cra 20B #56-54</p>
        </div>
      </div>
    </div>
  </div>

  <div class="container mt-5 mb-5">
    <h2 class="text-center mb-4">Contactanos</h2>
  <form action=" process-contact.php" method="POST">

      <div class="mb-3">
        <label for="name" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese su nombre" required style="background-color: #FFB22C;">
      </div>


      <div class="mb-3">
        <label for="email" class="form-label">Dirección email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su email" required style="background-color: #FFB22C;">
      </div>


      <div class="mb-3">
        <label for="subject" class="form-label">Motivo</label>
        <select class="form-select" id="subject" name="subject" required style="background-color: #FFB22C;">
          <option value="" disabled selected>Seleccione su motivo</option>
          <option value="Order Issue">Problema con orden</option>
          <option value="Feedback">Sugerencias</option>
          <option value="General Question">Pregunta general</option>
        </select>
      </div>


      <div class="mb-3">
        <label for="orderNumber" class="form-label">Numero de orden (Opcional)</label>
        <input type="text" class="form-control" id="orderNumber" name="orderNumber" placeholder="Ingrese su numero de orden" style="background-color: #FFB22C;">
      </div>


      <div class="mb-3">
        <label for="message" class="form-label">Descripción</label>
        <textarea class="form-control" id="message" name="message" rows="5" placeholder="Ingrese su mensaje aqui" required style="background-color: #FFB22C;"></textarea>
      </div>


      <div class="text-center">
        <button type="submit" class="btn" id="button-form">Enviar</button>
      </div>
      </form>
  </div>

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
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
    crossorigin="anonymous"></script>
</body>

</html>