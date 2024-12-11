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

  "method" => "card",
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
  $transactionId = $result['id'];
  $redirectUrl = $result['payment_method']['url'];
  
  // Redireccionar al usuario a la URL de captura de tarjeta
  header("Location: $redirectUrl");
}



?>


