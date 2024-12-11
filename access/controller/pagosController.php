<?php
class pagosController extends baseControl
{

	public $valor;
	public $obj;

	public function __construct()
	{
		veraut();
		include_once("model/pagosModel.php");
		$this->obj = new pagosModel();
		include_once("model/estudiantesModel.php");
		include_once("model/facturasModel.php");
	}

	public function index()
	{


		include("view/_header.php");
		include("view/pagos_index.php");
		include("view/_footer.php");
	}

	public function ver()
	{
		$sale = $this->obj->ver($this->valor[0]);
		include("view/_header.php");
		include("view/pagos_ver.php");
		include("view/_footer.php");
	}

	public function filtrar()
	{

		if (count($_POST) > 0) {
			$llega = limpia2($_POST);

			$saleescuela = $this->obj->traerescuelas();
			$salebancos = $this->obj->traerbancos();
			$sale = $this->obj->filtrar($llega);
			$saleagrupado = $this->obj->filtraragrupado($llega);
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

		$f1 = new DateTime($_POST["fecha1"]);
		$f2 = new DateTime($_POST["fecha2"]);

		$cant_meses = $f2->diff($f1);
		$cant_meses = $cant_meses->format('%m'); //devuelve el numero de meses entre ambas fechas.
		$listaMeses = array($f1->format('y-m-d'));

		for ($i = 1; $i <= $cant_meses; $i++) {

			$ultimaFecha = end($listaMeses);
			$ultimaFecha = new DateTime($ultimaFecha);
			$nuevaFecha = $ultimaFecha->add(new DateInterval("P1M"));
			$nuevaFecha = $nuevaFecha->format('y-m-d');

			array_push($listaMeses, $nuevaFecha);
		}
		$salecifras = $this->obj->mirarcifras($_POST["fecha1"], $_POST["fecha2"]);
		include("view/_header.php");
		include("view/pagos_index.php");
		include("view/_footer.php");
	}

	public function agregar()
	{
		$estudiantesobj = new estudiantesModel();
		$estudiantes = $estudiantesobj->listar();
		$facturasobj = new facturasModel();
		$facturas = $facturasobj->listar();
		include("view/_header.php");
		include("view/pagos_agregar.php");
		include("view/_footer.php");
	}

	public function agregando()
	{

		$entra = limpia2($_POST);
		$entra["creado"] = date("Y-m-d H:i:s");
		$ret = $this->obj->agregando($entra);

		$_SESSION["alertas"] = ($ret) ? iok() . __("Se agrego la informacion") : ierror() . __("Problema al agregar");
		header("Location: " . PATO . "pagos/");
		exit;
	}

	public function editar()
	{
		$estudiantesobj = new estudiantesModel();
		$estudiantes = $estudiantesobj->listar();
		$facturasobj = new facturasModel();
		$facturas = $facturasobj->listar();
		$sale = $this->obj->editar($this->valor[0]);
		include("view/_header.php");
		include("view/pagos_editar.php");
		include("view/_footer.php");
	}

	public function editando()
	{

		$entra = limpia2($_POST);
		$entra["editado"] = date("Y-m-d H:i:s");
		$ret = $this->obj->editando($this->valor[0], $entra);
		$_SESSION["alertas"] = ($ret) ? iok() . __("Se actualizo la informacion") : ierror() . __("Problema al editar");
		header("Location: " . PATO . "pagos/");
		exit;
	}

	public function eliminar()
	{
		$ret = $this->obj->eliminar($this->valor[0]);
		$_SESSION["alertas"] = ($ret) ? iok() . __("Se elimino correctamente") : ierror() . __("Problema al eliminar");
		header("Location: " . PATO . "pagos/");
		exit;
	}

	public function activar()
	{
		$entra["editado"] = date("Y-m-d H:i:s");
		$entra["estado"] = 1;
		$ret = $this->obj->editando($this->valor[0], $entra);
		$_SESSION["alertas"] = ($ret) ? iok() . __("Se Activo correctamente") : ierror() . __("Problema al Activar");
		header("Location: " . PATO . "pagos/");
		exit;
	}

	public function desactivar()
	{
		$entra["editado"] = date("Y-m-d H:i:s");
		$entra["estado"] = 0;
		$ret = $this->obj->editando($this->valor[0], $entra);
		$_SESSION["alertas"] = ($ret) ? iok() . __("Se Desactivo correctamente") : ierror() . __("Problema al Desactivar");
		header("Location: " . PATO . "pagos/");
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
	public function normalize_date($date)
	{

		if (!empty($date)) {
			$var = explode('/', str_replace('-', '/', $date));
			return "$var[2]/$var[1]/$var[0]";
		}
	}

	public function cargarmasivo()
	{
		include("view/_header.php");
?>
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					Log de carga
					<small>Version 2.0</small>
				</h1>
				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
					<li class="active">Log De Carga</li>
				</ol>
			</section>
			<section class="col-lg-12 connectedSortable ui-sortable">
				<div class="box box-default">

					<!-- /.box-header -->
					<div class="box-body">
				<?php
				//conexiones, conexiones everywhere
				if (isset($_POST['submit'])) {
					//Aquí es donde seleccionamos nuestro csv
					$fname = $_FILES['archivo']['name'];
					echo "<h5>LAVASPORT LOG DE CARGA PAGOS</h5>";
					echo 'Cargando nombre del archivo: ' . $fname . ' <br>';
					$chk_ext = explode(".", $fname);

					if (strtolower(end($chk_ext)) == "csv") {
						//si es correcto, entonces damos permisos de lectura para subir
						$filename = $_FILES['archivo']['tmp_name'];
						$handle = fopen($filename, "r");
						$nuevos = 0;
						$actualizados = 0;
						echo "<table>";
						while (($data = fgetcsv($handle, 9000, ";")) !== FALSE) {



							if (isset($data[0]) && $data[0] != "") {

								$entra["banco_id"] = $data[0];


								if ($data[1] != "") {

									$entra["fecha"] = $this->normalize_date($data[1]);
								}

								if ($data[2] != "") {

									$entra["estudiante"] = $data[2];
								}
								if ($data[3] != "") {

									$entra["valor"] = $data[3];
								}


								if ($this->obj->agregando($entra) > 0) {
									$nuevos++;
									echo "<tr><td><p style='color:green;'>pago con documento " . $data[2] . " agregado<p></tr></td>";
								}
							} else {
								echo "<tr><td><p style='color:red;'>error cargando documento</p></tr></td>";
							}
						}

						//cerramos la lectura del archivo "abrir archivo" con un "cerrar archivo"
						fclose($handle);
						echo "</table>";
						echo "<p style='color:green;'>Importación exitosa!</p><br>";
						echo "<p style='color:green;'>nuevos pagos:" . $nuevos . "</p>";
					} else {
						//si aparece esto es posible que el archivo no tenga el formato adecuado, inclusive cuando es cvs, revisarlo para             
						//ver si esta separado por " , "
						echo "<p style='color:red;'>Archivo invalido!</p>";
					}
				}
				include("view/_footer.php");
			}
		}
