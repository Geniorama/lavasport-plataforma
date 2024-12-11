<?php
class pedidosModel
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
		$sql = "SELECT count(pedidos.id) as son FROM pedidos";
		$son = $this->db->Execute($sql);
		return $son->fields["son"];
	}


	public function listar($fecha1, $fecha2)
	{
		$sql = "SELECT pedidos.*,usuarios.nombre as nombre_usuario,usuarios.documento,usuarios.celular,usuarios.email,usuarios.nacimiento,usuarios.direccion FROM pedidos LEFT JOIN usuarios ON usuarios.id=pedidos.usuario_id WHERE pedidos.sede_id=" . $_SESSION['sede'] . " AND fecha BETWEEN '" . $fecha1 . " 00:00:00' AND '" . $fecha2 . " 23:59:59' ORDER BY fecha DESC";

		return $this->db->Execute($sql);
	}

	public function filtrar($fecha1, $fecha2, $estado, $palabra)
	{


		$where = "";
		if ($estado != "5") {
			$where .= " AND pedidos.estado=" . $estado;
		}

		if ($palabra != "") {
			$where .= " AND (usuarios.nombre like '%" . $palabra . "%' OR pedidos.codigo like '%" . $palabra . "%' OR usuarios.documento like '%" . $palabra . "%' OR usuarios.celular like '%" . $palabra . "%' OR usuarios.email like '%" . $palabra . "%')";
		}

		$sql = "SELECT pedidos.*,usuarios.nombre as nombre_usuario,usuarios.documento,usuarios.celular,usuarios.email,usuarios.nacimiento,usuarios.direccion FROM pedidos LEFT JOIN usuarios ON usuarios.id=pedidos.usuario_id WHERE pedidos.sede_id=" . $_SESSION['sede'] . " AND fecha BETWEEN '" . $fecha1 . " 00:00:00' AND '" . $fecha2 . " 23:59:59' " . $where . " ORDER BY fecha DESC";

		return $this->db->Execute($sql);
	}




	public function agregando($entra)
	{

		if ($this->db->AutoExecute("pedidos", $entra, "INSERT") == false) {
			return 0;
		} else {
			return $this->db->INSERT_ID();
		}
	}

	public function editar($id)
	{
		$sql = "
			SELECT pedidos.*
			FROM pedidos
			WHERE pedidos.id = " . $id;
		return $this->db->Execute($sql);
	}

	public function editando($id, $entra)
	{

		if ($this->db->AutoExecute("pedidos", $entra, "UPDATE", "id=" . $id) == false) {
			return 0;
		} else {
			return $id;
		}
	}

	public function eliminar($id)
	{
		return $this->db->Execute("DELETE FROM pedidos WHERE id=" . $id);
	}
}
