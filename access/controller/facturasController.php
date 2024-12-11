<?php
class facturasController extends baseControl
{

	public $valor;
	public $obj;

	public function __construct()
	{
		veraut();
		include_once("model/facturasModel.php");
		$this->obj = new facturasModel();
		include_once("model/escuelasModel.php");
		include_once("model/bancosModel.php");
	}
	//ponerlo como generarcsv cuando habiliten mas pagos se configuro solo con cuotas mientras tanto
	public function generarcsvpsecompletoconlospagos()
	{


		//$csv_export = 'TIPO DE IDENTIFICACION;NUMERO DE IDENTIFICACION;NOMBRE DEL ALUMNO;ESCUELA;CURSO;PRIMER VALOR TOTAL A PAGAR;SEGUNDO VALOR;TERCER VALOR;CUARTO VALOR;CODIGO DE LAVANDERIA;NUMERO DE RECIBO;CONCEPTO;FECHA LIMITE DE PAGO 1;FECHA LIMITE DE PAGO 2;FECHA LIMITE DE PAGO 3;FECHA LIMITE DE PAGO 4;PRIMER VALOR IMPUESTO;SEGUNDO VALOR IMPUESTO;TERCER VALOR IMPUESTO;CUARTO VALOR IMPUESTO;PERIODO DE PAGO';
		$csv_export = 'TIPO DE IDENTIFICACION;NUMERO DE IDENTIFICACION;NOMBRE DEL ALUMNO;ESCUELA;CURSO;PRIMER VALOR TOTAL A PAGAR;CODIGO DE LAVANDERIA;NUMERO DE RECIBO;CONCEPTO;FECHA LIMITE DE PAGO;VALOR IMPUESTO;PERIODO DE PAGO';

		$csv_export .= "\r\n";
		$sale = $this->obj->traercsvpse();

		while (!$sale->EOF) {
			$fecha1 = $sale->fields["fecha1"];
			$valor1 = $sale->fields["valor1"];
			$valor3 = 0;
			$fecha3 = "";
			$valor4 = 0;
			$fecha4 = "";
			if ($sale->fields["cuotas"] == 1) {

				$fecha2 = $sale->fields["cuotafecha1"];
				$valor2 = $sale->fields["cuotavalor1"];
				$fecha3 = $sale->fields["cuotafecha2"];
				$valor3 = $sale->fields["cuotavalor2"];
				$fecha4 = $sale->fields["cuotafecha3"];
				$valor4 = $sale->fields["cuotavalor3"];
			} else {

				$fecha2 = $sale->fields["fecha2"];
				$valor2 = $sale->fields["valor2"];
			}

			$csv_export .= $sale->fields["tipo_doc"] . ';';
			$csv_export .= '"' . $sale->fields["documento"] . '";';
			$csv_export .= '"' . utf8_decode($sale->fields["nombre_estudiante"] . '  ' . $sale->fields["apellido1"]) . '";';
			$csv_export .=  '"' . utf8_decode($sale->fields["escuela_nombre"] . '  ' . $sale->fields["escuela"]) . '";';
			$csv_export .= '"' . $sale->fields["curso"] . '";';
			$csv_export .= '"' . $valor1 . '";';
			$csv_export .= '"' . $valor2 . '";';
			$csv_export .= '"' . $valor3 . '";';
			$csv_export .= '"' . $valor4 . '";';
			$csv_export .= '"' . $sale->fields["codigo"] . '";';
			$csv_export .= '"' . $sale->fields["id"] . '";';
			$csv_export .= '"' . $sale->fields["concepto"] . '";';
			$csv_export .= '"' . $fecha1 . '";';
			$csv_export .= '"' . $fecha2 . '";';
			$csv_export .= '"' . $fecha3 . '";';
			$csv_export .= '"' . $fecha4 . '";';
			$csv_export .=  '0;';
			$csv_export .=  '0;';
			$csv_export .=  '0;';
			$csv_export .=  '0;';
			$csv_export .= '"' . $sale->fields["periodo"] . '";';

			$csv_export .= "\r\n";
			$sale->MoveNext();
		}
		$csv_filename = "ordenes_pse_" . date("Y-m-d") . ".csv";
		header("Content-type: text/x-csv");
		header("Content-Disposition: attachment; filename=" . $csv_filename . "");
		echo ($csv_export);
	}
	//se configuro solo con cuotas mientras tanto
	public function generarcsvpse()
	{


		//$csv_export = 'TIPO DE IDENTIFICACION;NUMERO DE IDENTIFICACION;NOMBRE DEL ALUMNO;ESCUELA;CURSO;PRIMER VALOR TOTAL A PAGAR;SEGUNDO VALOR;TERCER VALOR;CUARTO VALOR;CODIGO DE LAVANDERIA;NUMERO DE RECIBO;CONCEPTO;FECHA LIMITE DE PAGO 1;FECHA LIMITE DE PAGO 2;FECHA LIMITE DE PAGO 3;FECHA LIMITE DE PAGO 4;PRIMER VALOR IMPUESTO;SEGUNDO VALOR IMPUESTO;TERCER VALOR IMPUESTO;CUARTO VALOR IMPUESTO;PERIODO DE PAGO';
		//	$csv_export = 'TIPO DE IDENTIFICACION;NUMERO DE IDENTIFICACION;NOMBRE DEL ALUMNO;ESCUELA;CURSO;PRIMER VALOR TOTAL A PAGAR;CODIGO DE LAVANDERIA;NUMERO DE RECIBO;CONCEPTO;FECHA LIMITE DE PAGO;VALOR IMPUESTO;PERIODO DE PAGO';

		//	$csv_export .= "\r\n";
		$csv_export = "";
		$sale = $this->obj->traercsvpse();

		while (!$sale->EOF) {

			$valor1 = $sale->fields["valor1"];
			$fecha = new DateTime($sale->fields["fecha1"]);
			$fecha1 = $fecha->format('d/m/Y');
			if ($sale->fields["cuotas"] == 1) {

				$fecha2 = $sale->fields["cuotafecha1"];
				$valor2 = $sale->fields["cuotavalor1"];
				$fecha3 = $sale->fields["cuotafecha2"];
				$valor3 = $sale->fields["cuotavalor2"];
				$fecha4 = $sale->fields["cuotafecha3"];
				$valor4 = $sale->fields["cuotavalor3"];

				$fecha = new DateTime($sale->fields["cuotafecha1"]);
				$fecha2 = $fecha->format('d/m/Y');

				$fecha = new DateTime($sale->fields["cuotafecha2"]);
				$fecha3 = $fecha->format('d/m/Y');
				$fecha = new DateTime($sale->fields["cuotafecha3"]);
				$fecha4 = $fecha->format('d/m/Y');
			} else {

				$fecha2 = $sale->fields["fecha2"];
				$valor2 = $sale->fields["valor2"];
			}
			$consultar = $this->obj->consultargeneracionrecibo($sale->fields["id"], $sale->fields["documento"]);
			if (isset($consultar->fields["id"]) && $consultar->fields["id"] > 0) {
				$i = $consultar->fields["id"];
			} else {
				$entra["recibo_id"] = $sale->fields["id"];
				$entra["estudiante"] = $sale->fields["documento"];
				$i = $this->obj->agregandonumrecibo($entra);
			}
			$csv_export .= $sale->fields["tipo_doc"] . ';';
			$csv_export .= '' . $sale->fields["documento"] . ';';
			$csv_export .= '' . utf8_decode($sale->fields["nombre_estudiante"] . '  ' . $sale->fields["apellido1"]) . ';';
			$csv_export .=  '' . utf8_decode($sale->fields["escuela"] . '  ' . $sale->fields["escuela_nombre"]) . ';';
			$csv_export .= '' . $sale->fields["curso"] . ';';
			$csv_export .= '' . $valor1 . ';';
			$csv_export .= '' . $sale->fields["codigo"] . ';';
			$csv_export .= '' . $i . ';';
			$csv_export .= '' . $sale->fields["concepto"] . ';';
			$csv_export .= '' . $fecha1 . ';';
			$csv_export .=  '0;';
			$csv_export .= '' . $sale->fields["periodo"] . '';
			$csv_export .= "\r\n";

			if ($sale->fields["cuotas"] == 1) {

				$consultar = $this->obj->consultargeneracionrecibo($sale->fields["id"], $sale->fields["documento"] . '1');
				if (isset($consultar->fields["id"]) && $consultar->fields["id"] > 0) {
					$i = $consultar->fields["id"];
				} else {
					$entra["recibo_id"] = $sale->fields["id"];
					$entra["estudiante"] = $sale->fields["documento"] . '1';
					$i = $this->obj->agregandonumrecibo($entra);
				}
				//cuota 1 poner el 1 en el final del documento
				$csv_export .= $sale->fields["tipo_doc"] . ';';
				$csv_export .= '' . $sale->fields["documento"] . '1;';
				$csv_export .= '' . utf8_decode($sale->fields["nombre_estudiante"] . '  ' . $sale->fields["apellido1"]) . ';';
				$csv_export .=  '' . utf8_decode($sale->fields["escuela"] . '  ' . $sale->fields["escuela_nombre"]) . ';';
				$csv_export .= '' . $sale->fields["curso"] . ';';
				$csv_export .= '' . $valor2 . ';';
				$csv_export .= '' . $sale->fields["codigo"] . ';';
				$csv_export .= '' . $i . ';';
				$csv_export .= '' . $sale->fields["concepto"] . ';';
				$csv_export .= '' . $fecha2 . ';';
				$csv_export .=  '0;';
				$csv_export .= '' . $sale->fields["periodo"] . '';
				$csv_export .= "\r\n";
				$consultar = $this->obj->consultargeneracionrecibo($sale->fields["id"], $sale->fields["documento"] . '2');
				if (isset($consultar->fields["id"]) && $consultar->fields["id"] > 0) {
					$i = $consultar->fields["id"];
				} else {
					$entra["recibo_id"] = $sale->fields["id"];
					$entra["estudiante"] = $sale->fields["documento"] . '2';
					$i = $this->obj->agregandonumrecibo($entra);
				}
				//cuota 2 poner el 2 en el final del documento
				$csv_export .= $sale->fields["tipo_doc"] . ';';
				$csv_export .= '' . $sale->fields["documento"] . '2;';
				$csv_export .= '' . utf8_decode($sale->fields["nombre_estudiante"] . '  ' . $sale->fields["apellido1"]) . ';';
				$csv_export .=  '' .  utf8_decode($sale->fields["escuela"] . '  ' . $sale->fields["escuela_nombre"]) . ';';
				$csv_export .= '' . $sale->fields["curso"] . ';';
				$csv_export .= '' . $valor3 . ';';
				$csv_export .= '' . $sale->fields["codigo"] . ';';
				$csv_export .= '' . $i . ';';
				$csv_export .= '' . $sale->fields["concepto"] . ';';
				$csv_export .= '' . $fecha3 . ';';
				$csv_export .=  '0;';
				$csv_export .= '' . $sale->fields["periodo"] . '';
				$csv_export .= "\r\n";
				$consultar = $this->obj->consultargeneracionrecibo($sale->fields["id"], $sale->fields["documento"] . '3');
				if (isset($consultar->fields["id"]) && $consultar->fields["id"] > 0) {
					$i = $consultar->fields["id"];
				} else {
					$entra["recibo_id"] = $sale->fields["id"];
					$entra["estudiante"] = $sale->fields["documento"] . '3';
					$i = $this->obj->agregandonumrecibo($entra);
				}
				//cuota 3 poner el 3 en el final del documento
				$csv_export .= $sale->fields["tipo_doc"] . ';';
				$csv_export .= '' . $sale->fields["documento"] . '3;';
				$csv_export .= '' . utf8_decode($sale->fields["nombre_estudiante"] . '  ' . $sale->fields["apellido1"]) . ';';
				$csv_export .=  '' .  utf8_decode($sale->fields["escuela"] . '  ' . $sale->fields["escuela_nombre"]) . ';';
				$csv_export .= '' . $sale->fields["curso"] . ';';
				$csv_export .= '' . $valor4 . ';';
				$csv_export .= '' . $sale->fields["codigo"] . ';';
				$csv_export .= '' . $i . ';';
				$csv_export .= '' . $sale->fields["concepto"] . ';';
				$csv_export .= '' . $fecha4 . ';';
				$csv_export .=  '0;';
				$csv_export .= '' . $sale->fields["periodo"] . '';
				$csv_export .= "\r\n";
			}
			$sale->MoveNext();
		}
		$csv_filename = "ordenes_pse_" . date("Y-m-d") . ".csv";
		header("Content-type: text/x-csv");
		header("Content-Disposition: attachment; filename=" . $csv_filename . "");
		echo ($csv_export);
	}
	public function index()
	{
		$escuelasobj = new escuelasModel();
		$escuelas = $escuelasobj->listar();
		$bancosobj = new bancosModel();
		$bancos = $bancosobj->listar();
		if ($this->obj->cantidad() < 10001) {
			$sale = $this->obj->listar();
			$msg = 1;
		} else {
			$sale = new nada();
			$msg = 2;
		}
		include("view/_header.php");
		include("view/facturas_index.php");
		include("view/_footer.php");
	}

	public function ver()
	{
		$sale = $this->obj->ver();
		include("view/_header.php");
		include("view/facturas_ver.php");
		include("view/_footer.php");
	}


	public function verestudiantes()
	{
		$sale = $this->obj->estudiantesxescuela($this->valor[0]);

?>
		<select name="estudiante_id[]" id="estudiante_id[]" multiple="multiple" class="form-control select2" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor seleccione el Estudiante"); ?>">
			<?php
			if (!$sale->EOF) {
				while (!$sale->EOF) { ?>
					<option value="<?php echo $sale->fields["id"]; ?>"><?php echo $sale->fields["nombre"]; ?> <?php echo $sale->fields["apellido1"]; ?> - <?php echo $sale->fields["documento"]; ?></option><?php
																																																			$sale->MoveNext();
																																																		}
																																																		$sale->Move(0);
																																																	} ?>
		</select>

	<?php


	}


	public function verestudiantesedit()
	{
		$sale = $this->obj->estudiantesxescuela($this->valor[0]);
		$fes = $this->obj->estudiantesFactura($_POST["factura"]);
		$arrest[] = 0;
		if (!$fes->EOF) {
			while (!$fes->EOF) {
				$arrest[] = $fes->fields["estudiante_id"];

				$fes->MoveNext();
			}
		}


	?>
		<select name="estudiante_id[]" id="estudiante_id[]" multiple="multiple" class="form-control select2" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor seleccione el Estudiante"); ?>">
			<?php
			if (!$sale->EOF) {
				while (!$sale->EOF) { ?>
					<option value="<?php echo $sale->fields["id"]; ?>" <?php if (in_array($sale->fields["id"], $arrest)) {
																			echo "selected";
																		} ?>><?php echo $sale->fields["nombre"]; ?> <?php echo $sale->fields["apellido1"]; ?> - <?php echo $sale->fields["documento"]; ?></option><?php
																																																					$sale->MoveNext();
																																																				}
																																																				$sale->Move(0);
																																																			} ?>
		</select>

<?php


	}

	public function filtrar()
	{
		$escuelasobj = new escuelasModel();
		$escuelas = $escuelasobj->listar();
		$bancosobj = new bancosModel();
		$bancos = $bancosobj->listar();
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
		include("view/facturas_index.php");
		include("view/_footer.php");
	}

	public function agregar()
	{
		$escuelasobj = new escuelasModel();
		$escuelas = $escuelasobj->listar();
		$bancosobj = new bancosModel();
		$bancos = $bancosobj->listar();
		include("view/_header.php");
		include("view/facturas_agregar.php");
		include("view/_footer.php");
	}

	public function agregando()
	{

		$entra = limpia2($_POST);
		$entra["creado"] = date("Y-m-d");
		$ret = $this->obj->agregando($entra);

		foreach ($_POST['estudiante_id'] as $valor) {
			$entra["estudiante_id"] = $valor;
			$entra["factura_id"] = $ret;
			$this->obj->agregandoestudiantef($entra);
			//echo $valor . "<br>";
		}

		$_SESSION["alertas"] = ($ret) ? iok() . __("Se agrego la informacion") : ierror() . __("Problema al agregar");
		header("Location: " . PATO . "facturas/");
		exit;
	}

	public function editar()
	{
		$escuelasobj = new escuelasModel();
		$escuelas = $escuelasobj->listar();
		$bancosobj = new bancosModel();
		$bancos = $bancosobj->listar();
		$sale = $this->obj->editar($this->valor[0]);
		include("view/_header.php");
		include("view/facturas_editar.php");
		include("view/_footer.php");
	}

	public function editando()
	{

		$entra = limpia2($_POST);
		$entra["editado"] = date("Y-m-d");
		$ret = $this->obj->editando($this->valor[0], $entra);
		$ret1 = $this->obj->eliminarestudiantesf($this->valor[0]);
		foreach ($_POST['estudiante_id'] as $valor) {
			$entra["estudiante_id"] = $valor;
			$entra["factura_id"] = $ret;
			$this->obj->agregandoestudiantef($entra);
			//echo $valor . "<br>";
		}

		$_SESSION["alertas"] = ($ret) ? iok() . __("Se actualizo la informacion") : ierror() . __("Problema al editar");
		header("Location: " . PATO . "facturas/");
		exit;
	}

	public function eliminar()
	{
		$ret = $this->obj->eliminar($this->valor[0]);
		$_SESSION["alertas"] = ($ret) ? iok() . __("Se elimino correctamente") : ierror() . __("Problema al eliminar");
		header("Location: " . PATO . "facturas/");
		exit;
	}

	public function activar()
	{
		$entra["editado"] = date("Y-m-d H:i:s");
		$entra["estado"] = 1;
		$ret = $this->obj->editando($this->valor[0], $entra);
		$_SESSION["alertas"] = ($ret) ? iok() . __("Se Activo correctamente") : ierror() . __("Problema al Activar");
		header("Location: " . PATO . "facturas/");
		exit;
	}

	public function desactivar()
	{
		$entra["editado"] = date("Y-m-d H:i:s");
		$entra["estado"] = 0;
		$ret = $this->obj->editando($this->valor[0], $entra);
		$_SESSION["alertas"] = ($ret) ? iok() . __("Se Desactivo correctamente") : ierror() . __("Problema al Desactivar");
		header("Location: " . PATO . "facturas/");
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
