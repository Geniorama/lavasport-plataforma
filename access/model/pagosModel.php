<?php
class pagosModel
{

	public $db;

	function __construct()
	{
		$this->db = ADONewConnection(DB_TIPO);
		$this->db->debug = DB_DEBUG;
		$this->db->Connect(DB_SERVER, DB_USER, DB_CLAVE, DB_DB);
		$this->db->SetFetchMode(ADODB_FETCH_ASSOC);
		$this->db->setCharset('utf8');
	}

	function __destruct()
	{
		$this->db->close();
	}

	public function cantidad()
	{
		$sql = "SELECT count(pagos.id) as son FROM pagos";
		$son = $this->db->Execute($sql);
		return $son->fields["son"];
	}

	public function activos()
	{
		$sql = "
			SELECT pagos.*, estudiantes.nombre as estudiantes_nombre, facturas.inicio as facturas_inicio
			FROM pagos
			LEFT JOIN estudiantes ON pagos.estudiante=estudiantes.id
			LEFT JOIN facturas ON pagos.factura_id=facturas.id
			WHERE pagos.estado=1";
		return $this->db->Execute($sql);
	}

	public function inactivos()
	{
		$sql = "
			SELECT pagos.*, estudiantes.nombre as estudiantes_nombre, facturas.inicio as facturas_inicio
			FROM pagos
			LEFT JOIN estudiantes ON pagos.estudiante=estudiantes.id
			LEFT JOIN facturas ON pagos.factura_id=facturas.id
			WHERE pagos.estado=0";
		return $this->db->Execute($sql);
	}

	public function listar()
	{
		$sql = "SELECT pagos.*,bancos.nombre as nombre_banco,escuelas.nombre as nombre_escuela,estudiantes.nombre as estudiantes_nombre
			FROM pagos
			LEFT JOIN estudiantes ON pagos.estudiante=estudiantes.id LEFT JOIN escuelas ON escuelas.codigo=estudiantes.escuela_id LEFT JOIN bancos ON bancos.id=pagos.banco_id";
		return $this->db->Execute($sql);
	}

	public function ver($id)
	{
		$sql = "
			SELECT pagos.*, estudiantes.nombre as estudiantes_nombre, facturas.inicio as facturas_inicio
			FROM pagos 
			LEFT JOIN estudiantes ON pagos.estudiante=estudiantes.id
			LEFT JOIN facturas ON pagos.factura_id=facturas.id
			WHERE pagos.id = " . $id;
		return $this->db->Execute($sql);
	}

	public function filtrar($llega)
	{
		$where = "pagos.fecha>='" . $llega["fecha1"] . "' AND pagos.fecha<='" . $llega["fecha2"] . "'";


		// $sql = "
		// 	SELECT pagos.*, estudiantes.nombre as estudiantes_nombre, facturas.inicio as facturas_inicio
		// 	FROM pagos
		// 	LEFT JOIN estudiantes ON pagos.estudiante=estudiantes.id
		// 	LEFT JOIN facturas ON pagos.factura_id=facturas.id

		// 	WHERE " . $where . "
		// 	";
		$sql = "SELECT pagos.*, estudiantes.nombre as estudiantes_nombre,escuelas.codigo as nombre_escuela,estudiantes.documento,bancos.nombre as nombre_banco FROM pagos LEFT JOIN bancos ON bancos.id=pagos.banco_id LEFT JOIN estudiantes ON pagos.estudiante=estudiantes.documento LEFT JOIN escuelas ON escuelas.codigo=estudiantes.escuela_id WHERE " . $where;

		return $this->db->Execute($sql);
	}

	public function filtraragrupado($llega)
	{
		$where = "pagos.fecha>='" . $llega["fecha1"] . "' AND pagos.fecha<='" . $llega["fecha2"] . "'";


		// $sql = "
		// 	SELECT pagos.*, estudiantes.nombre as estudiantes_nombre, facturas.inicio as facturas_inicio
		// 	FROM pagos
		// 	LEFT JOIN estudiantes ON pagos.estudiante=estudiantes.id
		// 	LEFT JOIN facturas ON pagos.factura_id=facturas.id

		// 	WHERE " . $where . "
		// 	";
		$sql = "SELECT pagos.id,pagos.banco_id,pagos.fecha,pagos.estudiante,sum(pagos.valor) as valor, estudiantes.nombre as estudiantes_nombre,estudiantes.documento,escuelas.codigo as nombre_escuela,escuelas.id AS id_escuela,bancos.nombre as nombre_banco FROM pagos LEFT JOIN bancos ON bancos.id=pagos.banco_id LEFT JOIN estudiantes ON pagos.estudiante=estudiantes.documento LEFT JOIN escuelas ON escuelas.codigo=estudiantes.escuela_id WHERE " . $where . " GROUP BY estudiantes.id ORDER BY valor ASC";

		return $this->db->Execute($sql);
	}

	function pagaronxescuela($escuela, $valor, $fecha1, $fecha2)
	{
		$sql = "SELECT count(*) as total FROM (SELECT pagos.id FROM pagos LEFT JOIN estudiantes ON estudiantes.documento=pagos.estudiante LEFT JOIN escuelas ON escuelas.codigo=estudiantes.escuela_id WHERE pagos.fecha BETWEEN '" . $fecha1 . "' AND '" . $fecha2 . "' AND escuelas.id=" . $escuela . " group by estudiante
		having sum(valor) >= " . $valor . ") AS resultado";

		return $this->db->Execute($sql);
	}
	function cifraxescuela($escuela, $valor, $fecha1, $fecha2)
	{
		$sql = "SELECT count(*) as total FROM pagos LEFT JOIN estudiantes ON estudiantes.documento=pagos.estudiante LEFT JOIN escuelas ON escuelas.codigo=estudiantes.escuela_id WHERE pagos.fecha BETWEEN '" . $fecha1 . "' AND '" . $fecha2 . "' AND escuelas.id=" . $escuela . " AND valor = " . $valor . "";

		return $this->db->Execute($sql);
	}
	function mirarcifras($fecha1, $fecha2)
	{
		$sql = "SELECT valor FROM pagos  WHERE pagos.fecha BETWEEN '" . $fecha1 . "' AND '" . $fecha2 . "' GROUP BY valor ORDER BY valor ASC";

		return $this->db->Execute($sql);
	}

	function pagaronxescuelaprecios($escuela, $fecha1, $fecha2)
	{
		$sql = "SELECT sum(valor) as total  FROM pagos LEFT JOIN estudiantes ON estudiantes.documento=pagos.estudiante LEFT JOIN escuelas ON escuelas.codigo=estudiantes.escuela_id WHERE pagos.fecha BETWEEN '" . $fecha1 . "' AND '" . $fecha2 . "' AND escuelas.id=" . $escuela . "";
		return $this->db->Execute($sql);
	}

	function pagaronxescuelapreciosmes($escuela, $mes, $fecha1, $fecha2)
	{
		$sql = "SELECT sum(valor) as total  FROM pagos LEFT JOIN estudiantes ON estudiantes.documento=pagos.estudiante LEFT JOIN escuelas ON escuelas.codigo=estudiantes.escuela_id WHERE pagos.fecha BETWEEN '" . $fecha1 . "' AND '" . $fecha2 . "' AND escuelas.id=" . $escuela . " AND MONTH(pagos.fecha)='" . $mes . "'";
		return $this->db->Execute($sql);
	}
	function datosfacturaescuela($escuela, $fecha1, $fecha2)
	{

		$sql = "SELECT * FROM facturas WHERE escuela_id=" . $escuela . "  AND '" . $fecha1 . "' BETWEEN inicio AND fin AND '" . $fecha2 . "' BETWEEN inicio AND fin";

		return $this->db->Execute($sql);
	}

	function vervalorpago($escuela, $fecha)
	{
		$sql = "SELECT fecha1,valor1,fecha2,valor2,fecha3,valor3,fecha4,valor4 FROM facturas WHERE escuela_id=" . $escuela . " AND '" . $fecha . "' BETWEEN inicio AND fin";
		return $this->db->Execute($sql);
	}
	function datosbancoescuela($escuela, $banco, $fecha1, $fecha2)
	{

		$sql = "SELECT count(*) as total FROM pagos LEFT JOIN estudiantes ON estudiantes.documento=pagos.estudiante LEFT JOIN escuelas ON escuelas.codigo=estudiantes.escuela_id WHERE escuelas.id=" . $escuela . " AND banco_id=" . $banco . " AND pagos.fecha>='" . $fecha1 . "' AND pagos.fecha<='" . $fecha2 . "'";
		//echo $sql;
		return $this->db->Execute($sql);
	}

	function traernumestudiantes($escuela)
	{
		$sql = "SELECT count(*) as total FROM estudiantes LEFT JOIN escuelas ON escuelas.codigo=estudiantes.escuela_id WHERE escuelas.id=" . $escuela . " AND estudiantes.estado=1";

		return $this->db->Execute($sql);
	}

	function traerescuelas()
	{


		$sql = "SELECT * FROM escuelas";

		return $this->db->Execute($sql);
	}
	function traerbancos()
	{

		$sql = "SELECT * FROM bancos";

		return $this->db->Execute($sql);
	}

	public function agregando($entra)
	{
		if ($this->db->AutoExecute("pagos", $entra, "INSERT") == false) {
			return 0;
		} else {
			return $this->db->INSERT_ID();
		}
	}

	public function editar($id)
	{
		$sql = "
			SELECT pagos.*, estudiantes.nombre as estudiantes_nombre, facturas.inicio as facturas_inicio
			FROM pagos 
			LEFT JOIN estudiantes ON pagos.estudiante=estudiantes.id
			LEFT JOIN facturas ON pagos.factura_id=facturas.id
			WHERE pagos.id = " . $id;
		return $this->db->Execute($sql);
	}

	public function editando($id, $entra)
	{
		if ($this->db->AutoExecute("pagos", $entra, "UPDATE", "id=" . $id) == false) {
			return 0;
		} else {
			return $id;
		}
	}

	public function eliminar($id)
	{
		return $this->db->Execute("DELETE FROM pagos WHERE id=" . $id);
	}
}
