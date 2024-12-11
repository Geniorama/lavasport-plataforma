<?php

class entradaController
{



	public $valor;



	public function __construct()
	{

		include_once("model/entradaModel.php");
	}



	public function index()
	{

		$user = limpia($_POST['username']);
		$clave = limpia($_POST['password']);





		if ($user != '' && $clave != '') {

			$entrando = new entradaModel();

			$rs = $entrando->verificarADM($user, $clave);

			if (!$rs->EOF) {

				$_SESSION['JC_UserID'] = $rs->fields['id'];

				$_SESSION['JC_Nombre'] = $rs->fields['nombre'];

				$_SESSION['JC_Email'] = $rs->fields['email'];

				$_SESSION['JC_Grupo'] = PERFIL;

				$_SESSION['JC_Estado'] = $rs->fields['estado'];
				$_SESSION['sede'] = $rs->fields['sede_id'];

				if ($_SESSION['sede'] > 0) {

					if ($_SESSION['sede'] == 99) {
						header("Location: " . PATO . "admins/");
					} else {

						header("Location: " . PATO . "pedidos/");
					}
				} else {
					header("Location: " . PATO . "?adentro=1");
				}
			} else {

				header("Location: " . PATO . "?error=1");
			}
		} else {

			header("Location: " . PATO . "?error=2");
		}
	}



	public function salir()
	{

		unset($_SESSION['JC_UserID']);

		unset($_SESSION['JC_Nombre']);

		unset($_SESSION['JC_Email']);

		unset($_SESSION['JC_Grupo']);

		unset($_SESSION['JC_Estado']);

		header("Location: " . PATO);
	}



	public function http_post($url, $data)
	{

		$data_url = http_build_query($data);

		$data_len = strlen($data_url);

		return array(

			'content' => file_get_contents(

				$url,

				false,

				stream_context_create(

					array(

						'http' => array(

							'method' => 'POST',

							'header' => "Content-Type: application/x-www-form-urlencoded\r\nConnection: close\r\nContent-Length: $data_len\r\n",

							'content' => $data_url

						)

					)

				)

			),

			'headers' => $http_response_header

		);
	}
}
