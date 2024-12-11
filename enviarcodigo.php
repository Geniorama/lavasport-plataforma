<?php
require_once('access/inc/adodb5/adodb.inc.php');
require_once('access/inc/class.phpmailer.php');
require_once('access/inc/config.php');
require_once('access/inc/db.php');
session_start();
date_default_timezone_set('America/Bogota');
//include_once('ean128/EAN128-4php.php');
$_SESSION["codigo"] = mt_rand(11111, 99999);
// $mensaje = "LavaSport indica el codigo de seguridad: " . $_SESSION["codigo"];


	$template = 'verificacion';
		$data = [
			'phone' => '57'.$_POST["numero"], // Receivers phone
			'template' => $template, // Template name
			'namespace' => 'cad4b4ec_c642_4380_a640_58bd2a161771', // Namespace of template
			'language' =>  ['code' => 'es', 'policy' => 'deterministic'], // Language parameters
            'params'=> [
			[
            'type'=> 'body',
            'parameters'=> [
              [ 'type' => 'text', 'text'=> ''.$_SESSION["codigo"]],
            ],
          ],
        ],

		];
		$json = json_encode($data); // Encode data to JSON
		// URL for request POST /message
		$token = 'k7410340lw939dri';
		$instanceId = '358816';
		$url = "https://api.chat-api.com/instance{$instanceId}/sendTemplate?token={$token}";
		// Make a POST request
		$options = stream_context_create([
			'http' => [
				'method'  => 'POST',
				'header'  => 'Content-type: application/json',
				'content' => $json
			]
		]);
		// Send a request
		$result = file_get_contents($url, false, $options);
		echo $result;
		
		
		
             $mail = new PHPMailer();
             $mail->From = "info@lavasport.co";
             $mail->FromName = "LavaSport";
             $mail->Subject = "Codigo de Seguridad";
             $mail->Body = "Saludos, LavaSport indica el codigo de seguridad:".$_SESSION["codigo"];
             $mail->AddAddress($_POST["email"]);
           
            $mail->Send();


