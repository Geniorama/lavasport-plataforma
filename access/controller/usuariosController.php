<?php
class usuariosController extends baseControl
{

	public $valor;
	public $obj;

	public function __construct()
	{
		veraut();
		include_once("model/usuariosModel.php");
		$this->obj = new usuariosModel();

		include_once("model/sedesModel.php");
	}

	public function index()
	{
		// $companiasobj = new companiasModel();
		// $companias = $companiasobj->listar();
		// $gradosobj = new gradosModel();
		// $grados = $gradosobj->listar();
		$sedesobj = new sedesModel();
		$sedes = $sedesobj->listar();

		$sale = $this->obj->listar();
		$msg = 1;

		include("view/_header.php");
		include("view/usuarios_index.php");
		include("view/_footer.php");
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
					echo "<h5>LAVASPORT LOG DE CARGA usuarios</h5>";
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
							$existente = $this->obj->ver($data[0]);
							if ($existente->fields["id"] > 0) {
								$entra["documento"] = $data[0];
								if ($data[1] > 0) {

									$entra["codigo_ropero"] = $data[1];
								}

								if ($data[2] != "") {

									$entra["apellido1"] = utf8_encode($data[2]);
								}

								if ($data[3] != "") {

									$entra["apellido2"] = utf8_encode($data[3]);
								}
								if ($data[4] != "") {

									$entra["nombre"] = utf8_encode($data[4]);
								}
								if ($data[5] != "") {

									$entra["email"] = $data[5];
								}

								if ($data[6] != "") {

									$entra["telefono"] = $data[6];
								}
								if ($data[7] != "") {

									$entra["sexo"] = $data[7];
								}
								if ($data[8] != "") {

									$entra["nacimiento"] = $data[8];
								}
								if ($data[9] != "") {

									$entra["compania_id"] = $data[9];
								}
								if ($data[10] != "") {

									$entra["grado_id"] = $data[10];
								}
								if ($data[11] != "") {

									$entra["escuela_id"] = $data[11];
								}
								if ($data[12] != "") {

									$entra["curso"] = $data[12];
								}
								if ($data[13] != "") {

									$entra["estado"] = $data[13];
								}

								if ($this->obj->editando($existente->fields["id"], $entra) > 0) {
									$actualizados++;
									echo "<tr><td><p style='color:green;'>estudiante con documento " . $data[0] . " actualizado</p></tr></td>";
								}
								//Insertamos los datos con los valores...
							} else {


								if (isset($data[0]) && $data[0] != "") {

									$entra["documento"] = $data[0];
									if ($data[1] > 0) {

										$entra["codigo_ropero"] = $data[1];
									}

									if ($data[2] != "") {

										$entra["apellido1"] = utf8_encode($data[2]);
									}

									if ($data[3] != "") {

										$entra["apellido2"] = utf8_encode($data[3]);
									}
									if ($data[4] != "") {

										$entra["nombre"] = utf8_encode($data[4]);
									}
									if ($data[5] != "") {

										$entra["email"] = $data[5];
									}

									if ($data[6] != "") {

										$entra["telefono"] = $data[6];
									}
									if ($data[7] != "") {

										$entra["sexo"] = $data[7];
									}
									if ($data[8] != "") {

										$entra["nacimiento"] = $data[8];
									}
									if ($data[9] != "") {

										$entra["compania_id"] = $data[9];
									}
									if ($data[10] != "") {

										$entra["grado_id"] = $data[10];
									}
									if ($data[11] != "") {

										$entra["escuela_id"] = $data[11];
									}
									if ($data[12] != "") {

										$entra["curso"] = $data[12];
									}
									if ($data[13] != "") {

										$entra["estado"] = $data[13];
									}



									if ($this->obj->agregando($entra) > 0) {
										$nuevos++;
										echo "<tr><td><p style='color:green;'>estudiante con documento " . $data[0] . " agregado<p></tr></td>";
									}
								} else {
									echo "<tr><td><p style='color:red;'>error cargando documento</p></tr></td>";
								}
							}
						}
						//cerramos la lectura del archivo "abrir archivo" con un "cerrar archivo"
						fclose($handle);
						echo "</table>";
						echo "<p style='color:green;'>Importación exitosa!</p><br>";
						echo "<p style='color:green;'>nuevos usuarios:" . $nuevos . "</p>";
						echo "<p style='color:green;'>usuarios actualizados:" . $actualizados . "</p>";
					} else {
						//si aparece esto es posible que el archivo no tenga el formato adecuado, inclusive cuando es cvs, revisarlo para             
						//ver si esta separado por " , "
						echo "<p style='color:red;'>Archivo invalido!</p>";
					}
				}
				include("view/_footer.php");
			}


			public function vertelefono()
			{

				$telefono = $this->obj->vertel($_POST["usuario_id"]);
				if ($telefono->fields["celular"] != "") {

					echo "ok";
				} else {

					echo "no";
				}
			}
			public function filtrar()
			{
				//	$companiasobj = new companiasModel();
				//	$companias = $companiasobj->listar();
				//		$gradosobj = new gradosModel();
				//		$grados = $gradosobj->listar();
				$escuelasobj = new escuelasModel();
				$escuelas = $escuelasobj->listar();
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
				include("view/usuarios_index.php");
				include("view/_footer.php");
			}

			public function agregar()
			{
				// $companiasobj = new companiasModel();
				// $companias = $companiasobj->listar();
				// $gradosobj = new gradosModel();
				// $grados = $gradosobj->listar();
				$escuelasobj = new escuelasModel();
				$escuelas = $escuelasobj->listar();
				include("view/_header.php");
				include("view/usuarios_agregar.php");
				include("view/_footer.php");
			}

			public function agregando()
			{

				$entra = limpia2($_POST);
				$entra["sede_id"] = $_SESSION['sede'];
				$ret = $this->obj->agregando($entra);

				$_SESSION["alertas"] = ($ret) ? iok() . __("Se agrego la informacion") : ierror() . __("Problema al agregar");
				if (isset($this->valor[0]) && $this->valor[0] > 0) {
					header("Location: " . PATO . "pedidos/");
				} else {

					header("Location: " . PATO . "usuarios/");
				}
				exit;
			}


			public function editar()
			{
				// $companiasobj = new companiasModel();
				// $companias = $companiasobj->listar();
				// $gradosobj = new gradosModel();
				// $grados = $gradosobj->listar();
				$sedesobj = new sedesModel();
				$sedes = $sedesobj->listar();
				$sale = $this->obj->editar($this->valor[0]);
				include("view/_header.php");
				include("view/usuarios_editar.php");
				include("view/_footer.php");
			}

			public function editando()
			{

				$entra = limpia2($_POST);
				$entra["editado"] = date("Y-m-d H:i:s");
				$ret = $this->obj->editando($this->valor[0], $entra);
				$_SESSION["alertas"] = ($ret) ? iok() . __("Se actualizo la informacion") : ierror() . __("Problema al editar");
				header("Location: " . PATO . "usuarios/");
				exit;
			}

			public function eliminar()
			{
				$ret = $this->obj->eliminar($this->valor[0]);
				$_SESSION["alertas"] = ($ret) ? iok() . __("Se elimino correctamente") : ierror() . __("Problema al eliminar");
				header("Location: " . PATO . "usuarios/");
				exit;
			}

			public function activar()
			{
				$entra["editado"] = date("Y-m-d H:i:s");
				$entra["estado"] = 1;
				$ret = $this->obj->editando($this->valor[0], $entra);
				$_SESSION["alertas"] = ($ret) ? iok() . __("Se Activo correctamente") : ierror() . __("Problema al Activar");
				header("Location: " . PATO . "usuarios/");
				exit;
			}

			public function desactivar()
			{
				$entra["editado"] = date("Y-m-d H:i:s");
				$entra["estado"] = 0;
				$ret = $this->obj->editando($this->valor[0], $entra);
				$_SESSION["alertas"] = ($ret) ? iok() . __("Se Desactivo correctamente") : ierror() . __("Problema al Desactivar");
				header("Location: " . PATO . "usuarios/");
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
