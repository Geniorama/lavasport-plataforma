<?php
class facturasgeneradasModel
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
		$sql = "SELECT count(facturasgeneradas.id) as son FROM facturasgeneradas";
		$son = $this->db->Execute($sql);
		return $son->fields["son"];
	}

	public function activos()
	{
		$sql = "
			SELECT facturasgeneradas.*, facturas.inicio as facturas_inicio, estudiantes.nombre as estudiantes_nombre
			FROM facturasgeneradas
			LEFT JOIN facturas ON facturasgeneradas.factura_id=facturas.id
			LEFT JOIN estudiantes ON facturasgeneradas.estudiante_id=estudiantes.id
			WHERE facturasgeneradas.estado=1";
		return $this->db->Execute($sql);
	}

	public function inactivos()
	{
		$sql = "
			SELECT facturasgeneradas.*, facturas.inicio as facturas_inicio, estudiantes.nombre as estudiantes_nombre
			FROM facturasgeneradas
			LEFT JOIN facturas ON facturasgeneradas.factura_id=facturas.id
			LEFT JOIN estudiantes ON facturasgeneradas.estudiante_id=estudiantes.id
			WHERE facturasgeneradas.estado=0";
		return $this->db->Execute($sql);
	}

	public function listar()
	{
		$sql = "SELECT facturasgeneradas.*,escuelas.codigo as codigo_escuela,facturas.concepto, estudiantes.nombre as estudiantes_nombre
		FROM facturasgeneradas
		LEFT JOIN facturas ON facturasgeneradas.factura_id=facturas.id
		LEFT JOIN estudiantes ON facturasgeneradas.estudiante_id=estudiantes.id
		LEFT JOIN escuelas ON escuelas.id=facturas.escuela_id";
		return $this->db->Execute($sql);
	}

	public function ver($id)
	{
		$sql = "
			SELECT facturasgeneradas.*, facturas.inicio as facturas_inicio, estudiantes.nombre as estudiantes_nombre
			FROM facturasgeneradas 
			LEFT JOIN facturas ON facturasgeneradas.factura_id=facturas.id
			LEFT JOIN estudiantes ON facturasgeneradas.estudiante_id=estudiantes.id
			WHERE facturasgeneradas.id = " . $id;
		return $this->db->Execute($sql);
	}
	public function verlistadototales($llega)
	{
		$where = "facturasgeneradas.fecha>='" . $llega["fecha1"] . " 00:00:00' AND facturasgeneradas.fecha<='" . $llega["fecha2"] . " 23:59:59'";

		$sql = "SELECT sum(pse) AS pse,SUM(pdf) as pdf,SUM(imprimio) AS imprimio FROM facturasgeneradas WHERE " . $where;
		return $this->db->Execute($sql);
	}

	function traerescuelas($llega)
	{
		$where = "facturasgeneradas.fecha>='" . $llega["fecha1"] . " 00:00:00' AND facturasgeneradas.fecha<='" . $llega["fecha2"] . " 23:59:59' AND ";

		$sql = "SELECT COUNT(*) AS numero,escuelas.codigo,escuelas.color FROM facturasgeneradas LEFT JOIN facturas ON facturas.id=facturasgeneradas.factura_id LEFT JOIN escuelas ON escuelas.id=facturas.escuela_id WHERE " . $where . " 1=1  GROUP BY facturas.escuela_id";

		return $this->db->Execute($sql);
	}
	public function filtrar($llega)
	{
		$where = "";
		if ($llega["fecha1"] != "") {
			$where = "facturasgeneradas.fecha>='" . $llega["fecha1"] . " 00:00:00' AND facturasgeneradas.fecha<='" . $llega["fecha2"] . " 23:59:59' AND ";
		}
		$sql = "
		SELECT facturasgeneradas.*,escuelas.codigo as codigo_escuela,facturas.concepto, estudiantes.nombre as estudiantes_nombre,estudiantes.documento
		FROM facturasgeneradas
		LEFT JOIN facturas ON facturasgeneradas.factura_id=facturas.id
		LEFT JOIN estudiantes ON facturasgeneradas.estudiante_id=estudiantes.id
		LEFT JOIN escuelas ON escuelas.id=facturas.escuela_id WHERE " . $where . " 1=1";

		return $this->db->Execute($sql);
	}

	public function agregando($entra)
	{
		if ($this->db->AutoExecute("facturasgeneradas", $entra, "INSERT") == false) {
			return 0;
		} else {
			return $this->db->INSERT_ID();
		}
	}

	public function editar($id)
	{
		$sql = "
			SELECT facturasgeneradas.*, facturas.inicio as facturas_inicio, estudiantes.nombre as estudiantes_nombre
			FROM facturasgeneradas 
			LEFT JOIN facturas ON facturasgeneradas.factura_id=facturas.id
			LEFT JOIN estudiantes ON facturasgeneradas.estudiante_id=estudiantes.id
			WHERE facturasgeneradas.id = " . $id;
		return $this->db->Execute($sql);
	}

	public function editando($id, $entra)
	{
		if ($this->db->AutoExecute("facturasgeneradas", $entra, "UPDATE", "id=" . $id) == false) {
			return 0;
		} else {
			return $id;
		}
	}

	public function eliminar($id)
	{
		return $this->db->Execute("DELETE FROM facturasgeneradas WHERE id=" . $id);
	}
}
