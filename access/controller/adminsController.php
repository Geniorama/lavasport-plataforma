<?php
class adminsController extends baseControl
{

	public $valor;
	public $obj;

	public function __construct()
	{
		veraut();
		include_once("model/adminsModel.php");
		include_once("model/sedesModel.php");
		$this->obj = new adminsModel();
	}

	public function index()
	{
		$sedesobj = new sedesModel();
		$sedes = $sedesobj->listar();
		if ($this->obj->cantidad() < 10001) {
			$sale = $this->obj->listar();
			$msg = 1;
		} else {
			$sale = new nada();
			$msg = 2;
		}
		include("view/_header.php");
		include("view/admins_index.php");
		include("view/_footer.php");
	}



	public function ver()
	{
		$sale = $this->obj->ver($this->valor[0]);
		include("view/_header.php");
		include("view/admins_ver.php");
		include("view/_footer.php");
	}

	public function filtrar()
	{
		if (count($_POST) > 0) {
			$llega = limpia2($_POST);
			$sale = $this->obj->filtrar($llega);
			$msg = 0;
		} else {
			if ($this->obj->cantidad() < 10001) {
				$sale = $this->obj->listar();
				$msg = 1;
			} else {
				$sale = new nada();
				$msg = 2;
			}
		}
		include("view/_header.php");
		include("view/admins_index.php");
		include("view/_footer.php");
	}

	public function agregar()
	{
		include("view/_header.php");
		include("view/admins_agregar.php");
		include("view/_footer.php");
	}

	public function agregando()
	{

		$entra = limpia2($_POST);
		$entra["creado"] = date("Y-m-d H:i:s");
		$ret = $this->obj->agregando($entra);

		$_SESSION["alertas"] = ($ret) ? iok() . __("Se agrego la informacion") : ierror() . __("Problema al agregar");
		header("Location: " . PATO . "admins/");
		exit;
	}

	public function editar()
	{
		$sedesobj = new sedesModel();
		$sedes = $sedesobj->listar();
		$sale = $this->obj->editar($this->valor[0]);
		include("view/_header.php");
		include("view/admins_editar.php");
		include("view/_footer.php");
	}

	public function editando()
	{

		$entra = limpia2($_POST);
		$entra["editado"] = date("Y-m-d H:i:s");
		$ret = $this->obj->editando($this->valor[0], $entra);
		$_SESSION["alertas"] = ($ret) ? iok() . __("Se actualizo la informacion") : ierror() . __("Problema al editar");
		header("Location: " . PATO . "admins/");
		exit;
	}

	public function eliminar()
	{
		$ret = $this->obj->eliminar($this->valor[0]);
		$_SESSION["alertas"] = ($ret) ? iok() . __("Se elimino correctamente") : ierror() . __("Problema al eliminar");
		header("Location: " . PATO . "admins/");
		exit;
	}

	public function activar()
	{
		$entra["editado"] = date("Y-m-d H:i:s");
		$entra["estado"] = 1;
		$ret = $this->obj->editando($this->valor[0], $entra);
		$_SESSION["alertas"] = ($ret) ? iok() . __("Se Activo correctamente") : ierror() . __("Problema al Activar");
		header("Location: " . PATO . "admins/");
		exit;
	}

	public function desactivar()
	{
		$entra["editado"] = date("Y-m-d H:i:s");
		$entra["estado"] = 0;
		$ret = $this->obj->editando($this->valor[0], $entra);
		$_SESSION["alertas"] = ($ret) ? iok() . __("Se Desactivo correctamente") : ierror() . __("Problema al Desactivar");
		header("Location: " . PATO . "admins/");
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
