<?php
class sedesController extends baseControl
{

	public $valor;
	public $obj;

	public function __construct()
	{
		veraut();
		include_once("model/sedesModel.php");
		$this->obj = new sedesModel();

		
	}

	public function index()
	{
		// $companiasobj = new companiasModel();
		// $companias = $companiasobj->listar();
		// $gradosobj = new gradosModel();
		// $grados = $gradosobj->listar();
		
		if ($this->obj->cantidad() < 10001) {
			$sale = $this->obj->listar();
			$msg = 1;
		} else {
			$sale = new nada();
			$msg = 2;
		}
		include("view/_header.php");
		include("view/sedes_index.php");
		include("view/_footer.php");
	}





			public function agregando()
			{

				$entra = limpia2($_POST);
				$entra["creado"] = date("Y-m-d H:i:s");
				$ret = $this->obj->agregando($entra);

				$_SESSION["alertas"] = ($ret) ? iok() . __("Se agrego la informacion") : ierror() . __("Problema al agregar");
				header("Location: " . PATO . "sedes/");
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
				include("view/sedes_editar.php");
				include("view/_footer.php");
			}

			public function editando()
			{

				$entra = limpia2($_POST);
			
				$ret = $this->obj->editando($this->valor[0], $entra);
				$_SESSION["alertas"] = ($ret) ? iok() . __("Se actualizo la informacion") : ierror() . __("Problema al editar");
				header("Location: " . PATO . "sedes/");
				exit;
			}

			public function eliminar()
			{
				$ret = $this->obj->eliminar($this->valor[0]);
				$_SESSION["alertas"] = ($ret) ? iok() . __("Se elimino correctamente") : ierror() . __("Problema al eliminar");
				header("Location: " . PATO . "sedes/");
				exit;
			}

			public function activar()
			{
				$entra["editado"] = date("Y-m-d H:i:s");
				$entra["estado"] = 1;
				$ret = $this->obj->editando($this->valor[0], $entra);
				$_SESSION["alertas"] = ($ret) ? iok() . __("Se Activo correctamente") : ierror() . __("Problema al Activar");
				header("Location: " . PATO . "sedes/");
				exit;
			}

			public function desactivar()
			{
				$entra["editado"] = date("Y-m-d H:i:s");
				$entra["estado"] = 0;
				$ret = $this->obj->editando($this->valor[0], $entra);
				$_SESSION["alertas"] = ($ret) ? iok() . __("Se Desactivo correctamente") : ierror() . __("Problema al Desactivar");
				header("Location: " . PATO . "sedes/");
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
