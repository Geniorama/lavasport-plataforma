<?php
$customer = array(
     'name' => $_POST["nombre"],
     'last_name' => $_POST["apellido"],
     'phone_number' => $_POST["telefono"],
     'email' => $_POST["email"]);


$headers = array(
  'Content-type: application/json',
  'Authorization: Basic c2tfYjgxM2EzNzc4MTNhNDBlZGJmZmQyZjE3OWZmZDczMTk6'
);
$valor=$_POST["amount"];
$iva=$valor*0.16;
$orden=$_POST["doc"]."-".uniqid();
$data = array(

  "method" => "store",
  "amount" => $valor,
  "currency" => "COP",
  "description" => "Servicio Lavasport",
  "order_id" => $orden,
  "iva" => "" . $iva,
  "customer" =>$customer,
  "confirm" => "false",
  "send_email"=>"false",
  "redirect_url"=>"http://www.openpay.co/index.html"
);

$ch = curl_init('https://api.openpay.co/v1/mgog1ybgaa7guwkja4co/charges');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);

$result = json_decode($response, true);
print_r($result);
if ($httpCode == 200 || $httpCode == 201) {
  $reference = $result['payment_method']['reference'];
  $barcode_url = $result['payment_method']['barcode_url'];

  
  // Redireccionar al usuario a la URL de captura de tarjeta
  $html = '
  <html>
  <head>
    <style>
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
      }
  
      h1 {
        text-align: center;
      }
  
      .receipt {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 20px;
        margin-bottom: 20px;
      }
  
      .header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
      }
  
      .info-table {
        width: 100%;
        border-collapse: collapse;
      }
  
      .info-table th,
      .info-table td {
        padding: 10px;
        border-bottom: 1px solid #ccc;
      }
  
      .info-table th {
        text-align: left;
      }
  
      .barcode {
        text-align: center;
        margin-top: 20px;
      }
  
      .barcode img {
        width: 200px;
        display: block;
        margin: 0 auto;
      }
  
      .total-section {
        margin-top: 30px;
        text-align: right;
      }
  
      .total-section p {
        margin: 5px 0;
      }
  
      .signature {
        text-align: right;
        margin-top: 50px;
      }
  
      .header-container {
        display: flex;
        justify-content: space-between;
      
        padding: 10px;
        margin-bottom: 20px;
      }
  
      .logo {
        display: flex;
        align-items: center;
      }
  

  
      .button-print {
        background-color: #009cde;
        color: #ffffff;
        border: none;
        padding: 10px 15px;
        border-radius: 5px;
        cursor: pointer;
      }
  
      .button-print a {
        color: #ffffff;
        text-decoration: none;
      }
    </style>
  </head>
  
  <body>
    <div class="receipt">
      <div class="header-container">
        <div class="logo">
          <img src="https://lavasport.co/plataforma/assets/img/logo.png" alt="Logo" class="logo-img">
         
        </div>
        <a href="https://docs.openpay.co/docs/mapa-de-tiendas.html" style="color: white; background-color: #009cde; font-size: 20px; font-weight: bold; text-decoration: none;  padding: 5px;">Buscar puntos de pago autorizados</a>
      </div>
  
      <div class="header">
        <table class="info-table">
          <tr>
            <th>Fecha:</th>
            <td>' . date('Y-m-d H:i:s') . '</td>
          </tr>
          <tr>
            <th>Cliente:</th>
            <td>' . $result['customer']['name'] . ' ' . $result['customer']['last_name'] . '</td>
          </tr>
          <tr>
            <th>Descripción:</th>
            <td>' . $result['description'] . '</td>
          </tr>
          <tr>
            <th>Referencia:</th>
            <td>' . $reference . '</td>
          </tr>
        </table>
      </div>
  
      <div class="barcode">
        <img src="' . $barcode_url . '" alt="Código de Barras">
      </div>
  
      <div class="total-section">
        <p><strong>Monto:</strong> $' . number_format($result['amount'],0,".",",") . '</p>
        <p><strong>IVA:</strong> $' . number_format($result['iva'],0,".",",") . '</p>
      </div>
  
      <div class="signature">
        <p>Firma: ______________________</p>
      </div>
    </div>
  
    <div class="button-print-container">
      <button class="button-print" onclick="window.print()">Imprimir Recibo</button>
    </div>
  
    <!-- Otros elementos de la hoja de pago -->
  
  </body>
  </html>';
  
  // Guardar el contenido HTML en un archivo
  $file = 'recibo_pago.html';
  file_put_contents($file, $html);
  
  // Redireccionar al archivo de la hoja de pago
  header("Location: $file");
  exit();
}



?>



