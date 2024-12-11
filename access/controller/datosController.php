<?php
class datosController extends baseControl
{

	public $valor;
	public $obj;

	public function __construct()
	{
		veraut();
		include_once("model/datosModel.php");
		$this->obj = new datosModel();
	}

	public function index()
	{


		$sale = $this->obj->listar();


		include("view/_header.php");
		include("view/datos_index.php");
		include("view/_footer.php");
	}

	public function excel()
	{
		header("Content-type: application/vnd.ms-excel; name='excel'");
		header("Content-Disposition: filename=datos" . date("Y-m-d") . ".xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		echo $_POST['datos_a_enviar'];
	}
}
