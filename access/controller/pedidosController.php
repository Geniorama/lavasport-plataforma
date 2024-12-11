<?php
class pedidosController extends baseControl
{

	public $valor;
	public $obj;

	public function __construct()
	{
		veraut();
		include_once("model/pedidosModel.php");
		$this->obj = new pedidosModel();

		include_once("model/usuariosModel.php");
		include_once("model/sedesModel.php");
	}

	public function index()
	{
		if (!isset($_POST["fecha1"])) {

			$_POST["fecha1"] = date("Y-m-d");
			$_POST["fecha2"] = date("Y-m-d");
		}
		// $companiasobj = new companiasModel();
		// $companias = $companiasobj->listar();
		// $gradosobj = new gradosModel();
		// $grados = $gradosobj->listar();
		$usuariosobj = new usuariosModel();
		$usuario = $usuariosobj->listaractivos();
		$sedesobj = new sedesModel();
		$sedes = $sedesobj->listar();
		if ($this->obj->cantidad() < 10001) {
			$sale = $this->obj->listar($_POST["fecha1"], $_POST["fecha2"]);
			$msg = 1;
		} else {
			$sale = new nada();
			$msg = 2;
		}
		include("view/_header.php");
		include("view/pedidos_index.php");
		include("view/_footer.php");
	}



	public function filtrar()
	{
		if (!isset($_POST["fecha1"])) {

			$_POST["fecha1"] = date("Y-m-d");
			$_POST["fecha2"] = date("Y-m-d");
		}
		// $companiasobj = new companiasModel();
		// $companias = $companiasobj->listar();
		// $gradosobj = new gradosModel();
		// $grados = $gradosobj->listar();
		$usuariosobj = new usuariosModel();
		$usuario = $usuariosobj->listaractivos();
		$sedesobj = new sedesModel();
		$sedes = $sedesobj->listar();
		if ($this->obj->cantidad() < 10001) {
			$sale = $this->obj->filtrar($_POST["fecha1"], $_POST["fecha2"], $_POST["estado"], $_POST["palabra"]);
			$msg = 1;
		} else {
			$sale = new nada();
			$msg = 2;
		}
		include("view/_header.php");
		include("view/pedidos_index.php");
		include("view/_footer.php");
	}

	public function agregando()
	{

		$entra = limpia2($_POST);
		$entra["sede_id"] = $_SESSION['sede'];
		$entra["fecha"] = date("Y-m-d H:i:s");
		$ret = $this->obj->agregando($entra);
		$usuariosobj = new usuariosModel();
		$usuario = $usuariosobj->ver($entra["usuario_id"]);



		$mensaje = "ESTIMADO SEÑOR@ " . strtoupper($usuario->fields["nombre"]) . ", LavaSport le notifica que " . strtolower("HEMOS RECIBIDO SU SERVICIO PARA PROCESAR, GRACIAS POR CONFIAR EN NOSOTROS.") . " Feliz dia.";


		// $curl = curl_init();

		// curl_setopt_array($curl, array(
		// 	CURLOPT_URL => 'https://api.chat-api.com/instance358816/sendMessage?token=k7410340lw939dri',
		// 	CURLOPT_RETURNTRANSFER => true,
		// 	CURLOPT_ENCODING => '',
		// 	CURLOPT_MAXREDIRS => 10,
		// 	CURLOPT_TIMEOUT => 0,
		// 	CURLOPT_FOLLOWLOCATION => true,
		// 	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		// 	CURLOPT_CUSTOMREQUEST => 'POST',
		// 	CURLOPT_POSTFIELDS => array('phone' => '57' . $usuario->fields["celular"], 'body' => $mensaje),
		// ));

		// $response = curl_exec($curl);

		// curl_close($curl);
		// echo $response;
		$template = 'recibido';
		$data = [
			'phone' => '57' . $usuario->fields["celular"], // Receivers phone
			'template' => $template, // Template name
			'namespace' => 'cad4b4ec_c642_4380_a640_58bd2a161771', // Namespace of template
			'language' =>  ['code' => 'es', 'policy' => 'deterministic'], // Language parameters


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





		$_SESSION["alertas"] = ($ret) ? iok() . __("Se agrego la informacion") : ierror() . __("Problema al agregar");
		header("Location: " . PATO . "pedidos/index/" . $ret);
		exit;
	}


	public function editar()
	{
		// $companiasobj = new companiasModel();
		// $companias = $companiasobj->listar();
		// $gradosobj = new gradosModel();
		// $grados = $gradosobj->listar();

		$sale = $this->obj->editar($this->valor[0]);
		include("view/_header.php");
		include("view/pedidos_editar.php");
		include("view/_footer.php");
	}

	public function editando()
	{

		$entra = limpia2($_POST);

		$ret = $this->obj->editando($this->valor[0], $entra);
		$_SESSION["alertas"] = ($ret) ? iok() . __("Se actualizo la informacion") : ierror() . __("Problema al editar");
		header("Location: " . PATO . "pedidos/");
		exit;
	}

	public function ajaxcambiarestado()
	{
		$entra["estado"] = $_POST["estado"];
		$ret = $this->obj->editando($this->valor[0], $entra);
		if ($entra["estado"] == "0") {
			$mensaje = "ESTIMADO SEÑOR@ " . strtoupper($_POST["nombre"]) . ", LavaSport le notifica que " . strtolower("HEMOS RECIBIDO SU SERVICIO PARA PROCESAR, GRACIAS POR CONFIAR EN NOSOTROS.") . " Feliz dia.";
			$template = 'recibido';
		}

		if ($entra["estado"] == "1") {

			$mensaje = "ESTIMADO SEÑOR@ " . strtoupper($_POST["nombre"]) . ", LavaSport le notifica que " . strtolower("ESTAMOS PROCESANDO SUS PRENDAS CON CALIDAD Y AMOR, PRONTO ESTARáN LISTAS.");
			$template = 'procesando';
		}
		if ($entra["estado"] == "2") {
			$template = 'entregado';
			$mensaje = "ESTIMADO SEÑOR@ " . strtoupper($_POST["nombre"]) . ", LavaSport le notifica que " . strtolower("HEMOS PROCESADO SUS PRENDAS CON éXITO, están LISTAS PARA SER ENTREGADAS.  *!! Ayúdenos a cuidar el planeta reintegrando los ganchos plásticos para su próximo servició !!");
		}
		if ($entra["estado"] != "3") {
			$data = [
				'phone' => '57' . $_POST["celular"], // Receivers phone
				'template' => $template, // Template name
				'namespace' => 'cad4b4ec_c642_4380_a640_58bd2a161771', // Namespace of template
				'language' =>  ['code' => 'es', 'policy' => 'deterministic'], // Language parameters


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





			// $curl = curl_init();

			// curl_setopt_array($curl, array(
			// 	CURLOPT_URL => 'https://api.chat-api.com/instance358816/sendTemplate?token=k7410340lw939dri',
			// 	CURLOPT_RETURNTRANSFER => true,
			// 	CURLOPT_ENCODING => '',
			// 	CURLOPT_MAXREDIRS => 10,
			// 	CURLOPT_TIMEOUT => 0,
			// 	CURLOPT_FOLLOWLOCATION => true,
			// 	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			// 	CURLOPT_CUSTOMREQUEST => 'POST',
			// 	CURLOPT_POSTFIELDS => array('template' => 'pedidos', 'phone' => '57' . $_POST["celular"], 'params' => ['type' => 'body', 'text' => 'prueba']),
			// ));

			// $response = curl_exec($curl);

			// curl_close($curl);
			// echo $response;
		}
	}

	public function eliminar()
	{
		$ret = $this->obj->eliminar($this->valor[0]);
		$_SESSION["alertas"] = ($ret) ? iok() . __("Se elimino correctamente") : ierror() . __("Problema al eliminar");
		header("Location: " . PATO . "pedidos/");
		exit;
	}

	public function activar()
	{
		$entra["editado"] = date("Y-m-d H:i:s");
		$entra["estado"] = 1;
		$ret = $this->obj->editando($this->valor[0], $entra);
		$_SESSION["alertas"] = ($ret) ? iok() . __("Se Activo correctamente") : ierror() . __("Problema al Activar");
		header("Location: " . PATO . "pedidos/");
		exit;
	}

	public function desactivar()
	{
		$entra["editado"] = date("Y-m-d H:i:s");
		$entra["estado"] = 0;
		$ret = $this->obj->editando($this->valor[0], $entra);
		$_SESSION["alertas"] = ($ret) ? iok() . __("Se Desactivo correctamente") : ierror() . __("Problema al Desactivar");
		header("Location: " . PATO . "pedidos/");
		exit;
	}

	public function descargar()
	{
		$rs = $this->obj->ver($this->valor[0]);
		header("Content-length: " . $rs->fields[$this->valor[1] . "_size"]);
		header("Content-type: " . $rs->fields[$this->valor[1] . "_type"]);
		header("Content-Disposition: attachment; filename=" . $rs->fields[$this->valor[1] . "_name"]); //inline
		echo $rs->fields[$this->valor[1]];
		exit;
	}
}
