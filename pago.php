<!DOCTYPE html>
<html>
<head>
  <title>Formulario de Pago</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script type="text/javascript"
        src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script type="text/javascript"
        src="https://openpay.s3.amazonaws.com/openpay.v1.min.js"></script>
<script type='text/javascript'
  src="https://openpay.s3.amazonaws.com/openpay-data.v1.min.js"></script>
</head>
<body>
  <div class="container">
    <h1 class="mt-5">Formulario de Pago</h1>

    <div class="row mt-4">
      <div class="col-md-4">
        <button class="btn btn-primary btn-block" onclick="showForm('tarjeta')">Tarjeta</button>
      </div>
      <div class="col-md-4">
        <button class="btn btn-primary btn-block" onclick="showForm('pse')">PSE</button>
      </div>
      <div class="col-md-4">
        <button class="btn btn-primary btn-block" onclick="showForm('efectivo')">Efectivo</button>
      </div>
    </div>

    <div id="form-tarjeta" class="mt-5">
      <h3>Información de Tarjeta</h3>
      <form action="procesar_tarjeta.php" method="post" id="payment-form">
      <input type="hidden" name="token_id" id="token_id">
	    <input type="hidden" name="amount" id="amount" value="<?php echo $_GET["valor"]; ?>">
      <input type="hidden" name="doc" id="doc" value="<?php echo $_GET["doc"]; ?>">
      <input type="hidden" name="currency" id="currency" value="COP">
        <label for="nombre">Nombre del titular:</label>
        <input type="text" placeholder="Como aparece en la tarjeta" name="nombre" autocomplete="off" data-openpay-card="holder_name" required><br><br>

        <label for="direccion">Número de tarjeta:</label>
        <input type="text" autocomplete="off" data-openpay-card="card_number" required><br><br>

        <label for="telefono">Fecha de expiración:</label>
        <input type="text" placeholder="Mes" data-openpay-card="expiration_month" required><br>
		<input type="text" placeholder="Año" data-openpay-card="expiration_year" required>
		<br><br>
        <label for="numero_tarjeta">Código de seguridad:</label>
        <input type="text" placeholder="3 dígitos" autocomplete="off" data-openpay-card="cvv2" required><br><br>

        <label for="codigo_verificacion">Código de Verificación:</label>
        <input type="text" id="codigo_verificacion" name="codigo_verificacion" required><br><br>
        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" required><br><br>

        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono" required><br><br>
        <label for="telefono">Email:</label>
        <input type="tel" id="email" name="email" required><br><br>
        <input type="button" id="pay-button" value="Realizar Pago" class="btn btn-primary">
      </form>
    </div>

    <div id="form-pse" class="mt-5">
      <h3>Información de PSE</h3>
      <form action="procesar_pago.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" required><br><br>

        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono" required><br><br>

        <input type="submit" value="Realizar Pago" class="btn btn-primary">
      </form>
    </div>

    <div id="form-efectivo" class="mt-5">
      <h3>Información de Pago en Efectivo</h3>
      <form action="procesar_pago.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" required><br><br>

        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono" required><br><br>

        <input type="submit" value="Realizar Pago" class="btn btn-primary">
      </form>
    </div>
  </div>

<script type="text/javascript">
 $(document).ready(function() {
  OpenPay.setId('m5q3vfpwh0xzrt7t1t0y');
  OpenPay.setApiKey('pk_b3c187684dcd4340b7baeaa27d71acc1');
  var deviceSessionId = OpenPay.deviceData.setup("payment-form", "deviceIdHiddenFieldName");
  OpenPay.setSandboxMode(true);
  });

    function showForm(formType) {
      var forms = document.getElementsByClassName("mt-5");
      for (var i = 0; i < forms.length; i++) {
        forms[i].style.display = "none";
      }

      document.getElementById("form-" + formType).style.display = "block";
    }
	
	
	$('#pay-button').on('click', function(event) {
       event.preventDefault();
       $("#pay-button").prop( "disabled", true);
       OpenPay.token.extractFormAndCreate('payment-form', success_callbak, error_callbak);                
});

var success_callbak = function(response) {
              var token_id = response.data.id;
              $('#token_id').val(token_id);
              $('#payment-form').submit();
};

var error_callbak = function(response) {
     var desc = response.data.description != undefined ?
        response.data.description : response.message;
     alert("ERROR [" + response.status + "] " + desc);
     $("#pay-button").prop("disabled", false);
};
  </script>

</body>
</html>