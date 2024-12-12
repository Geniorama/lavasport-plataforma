<!doctype html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>lavasport</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="main.css" rel="stylesheet">
  </head>

  <body>
    <div class="container-fluid m-0 p-0 ">
      <div class="py-sm-5 py-4 text-center bg-pinc">
        <img src="img/logo.svg" class="logo">
      </div>
      <h2 class="text-center my-sm-5 my-4 fs-4">ESCOJA UNA OPCION DE PAGO</h2>
        <nav class="container mt-sm-5 mt-2">
          <div class="nav justify-content-center align-items-start" id="nav-tab" role="tablist">
            <button class="col-sm-2 col-12 mb-sm-4 mb-0 border-0 bg-transparent nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
              <div class="text-bg-light mb-3 p-3 w-100 text-center border borderAzul  border-dark-subtle rounded" >
                <img src="img/iconsLS-01.svg" class="img-fluig tTcon">
              </div>
              <h3 class="fs-5 text-center text-secondary">Tarjeta Débito/Crédito</h3>
            </button>
         <!--   <button class="col-sm-2 col-12 mb-sm-4 mb-0 border-0 bg-transparent nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
              <div class="text-bg-light mb-3 p-3 w-100 text-center border borderAzul  border-dark-subtle rounded" >
              <img src="img/iconsLS-02.svg" class="img-fluig tTcon">
            </div>
            <h3 class="fs-5 text-center text-secondary">PSE</h3>
            </button> -->
            <button class="col-sm-2 col-12 mb-sm-4 mb-0 border-0 bg-transparent nav-link" id="nav-profile-tab" type="button" role="tab" aria-controls="nav-profile" aria-selected="false" onclick="window.location.href='https://www.psepagos.co/PSEHostingUI/ShowTicketOffice.aspx?ID=8956';">
            <div class="text-bg-light mb-3 p-3 w-100 text-center border borderAzul border-dark-subtle rounded" >
              <img src="img/iconsLS-02.svg" class="img-fluig tTcon">
            </div>
            <h3 class="fs-5 text-center text-secondary">PSE</h3>
          </button>

            <button class="col-sm-2 col-12 mb-sm-4 mb-0 border-0 bg-transparent nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
              <div class="text-bg-light mb-3 p-3 w-100 text-center border borderAzul border-dark-subtle rounded" >
              <img src="img/iconsLS-03.svg" class="img-fluig tTcon">
            </div>
            <h3 class="fs-5 text-center text-secondary">Efectivo</h3>
            </button>
          </div>
        </nav>
        <div class="bg-light">
        <div class="tab-content container" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
            <div class="row justify-content-center m-0">
              <div class="col-sm-2 text-center position-relative">
                <div class="arrowText arrowTop"></div>
              </div>
              <div class="col-sm-2 text-center">
              </div>
              <div class="col-sm-2 text-center">
              </div>
            </div>
              <div class="container p-4">
                <div class="row justify-content-center my-5">
                  <div class="col-sm-4">
                  <form action="procesar_tarjeta.php" method="post" id="payment-form">
                  <input type="hidden" name="token_id" id="token_id">
	    <input type="hidden" name="amount" id="amount" value="<?php echo $_GET["valor"]; ?>">
      <input type="hidden" name="doc" id="doc" value="<?php echo $_GET["doc"]; ?>">
      <input type="hidden" name="currency" id="currency" value="COP">
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label text-darck">Nombre del titular:</label>
                        <input type="text"  class="form-control" name="nombre" autocomplete="off" data-openpay-card="Nombre" required>
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label text-darck">Apellido del titular:</label>
                        <input type="exampleFormControlInput1" class="form-control" name="apellido" autocomplete="off" data-openpay-card="Apellido" required>
                      </div>
                     
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label text-darck">Teléfono:</label>
                        <input type="exampleFormControlInput1" class="form-control" id="telefono" name="telefono" required>
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label text-darck">Email:</label>
                        <input type="exampleFormControlInput1" class="form-control" id="email" name="email" required>
                      </div>
                      <div class="d-grid gap-2 pt-3">
                        <button class="btn btn-dark btnImpor"  id="pay-button" value="Realizar Pago" type="submit">Realizar Pago <i class="fa-solid fa-arrow-right colorB"></i></button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
          </div>
          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
            <div class="row justify-content-center m-0">
              <div class="col-sm-2 text-center">
              </div>
              <div class="col-sm-2 text-center position-relative">
                <div class="arrowText arrowTop"></div>
              </div>
              <div class="col-sm-2 text-center">
              </div>
            </div>
              <div class="container p-4">
                <div class="row justify-content-center my-5">
                  <div class="col-sm-4">
                  <form action="procesar_pse.php" method="post" id="payment-form">
                  <input type="hidden" name="token_id" id="token_id">
	    <input type="hidden" name="amount" id="amount" value="<?php echo $_GET["valor"]; ?>">
      <input type="hidden" name="doc" id="doc" value="<?php echo $_GET["doc"]; ?>">
      <input type="hidden" name="currency" id="currency" value="COP">
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label text-darck">Nombre:</label>
                        <input type="text"  class="form-control"  name="nombre" autocomplete="off" data-openpay-card="Nombre" required>
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label text-darck">Apellido:</label>
                        <input type="exampleFormControlInput1" class="form-control" name="apellido" autocomplete="off" data-openpay-card="Apellido" required>
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label text-darck">Departamento:</label>
                        <input type="exampleFormControlInput1" class="form-control" id="departamento" name="departamento" required>
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label text-darck">Ciudad:</label>
                        <input type="exampleFormControlInput1" class="form-control" id="ciudad" name="ciudad" required>
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label text-darck">Teléfono:</label>
                        <input type="exampleFormControlInput1" class="form-control" id="telefono" name="telefono" required>
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label text-darck">Email:</label>
                        <input type="exampleFormControlInput1" class="form-control" id="email" name="email" required>
                      </div>
                      <div class="d-grid gap-2 pt-3">
                        <button class="btn btn-dark btnImpor"  id="pay-button" value="Realizar Pago" type="submit">Realizar Pago <i class="fa-solid fa-arrow-right colorB"></i></button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
          </div>
          <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
            <div class="row justify-content-center m-0">
              <div class="col-sm-2 text-center">
              </div>
              <div class="col-sm-2 text-center">
              </div>
              <div class="col-sm-2 text-center position-relative">
                <div class="arrowText arrowTop"></div>
              </div>
            </div>
              <div class="container p-4">
                <div class="row justify-content-center my-5">
                  <div class="col-sm-4">
                  <form action="procesar_efectivo.php" method="post" id="payment-form">
                  <input type="hidden" name="token_id" id="token_id">
	    <input type="hidden" name="amount" id="amount" value="<?php echo $_GET["valor"]; ?>">
      <input type="hidden" name="doc" id="doc" value="<?php echo $_GET["doc"]; ?>">
      <input type="hidden" name="currency" id="currency" value="COP">
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label text-darck">Nombre:</label>
                        <input type="text"  class="form-control"  name="nombre" autocomplete="off" data-openpay-card="Nombre" required>
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label text-darck">Apellido:</label>
                        <input type="exampleFormControlInput1" class="form-control" name="apellido" autocomplete="off" data-openpay-card="Apellido" required>
                      </div>
                      
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label text-darck">Teléfono:</label>
                        <input type="exampleFormControlInput1" class="form-control" id="telefono" name="telefono" required>
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label text-darck">Email:</label>
                        <input type="exampleFormControlInput1" class="form-control" id="email" name="email" required>
                      </div>
                      <div class="d-grid gap-2 pt-3">
                        <button class="btn btn-dark btnImpor"  id="pay-button" value="Realizar Pago" type="submit">Realizar Pago <i class="fa-solid fa-arrow-right colorB"></i></button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
      
    </body>
    </html>