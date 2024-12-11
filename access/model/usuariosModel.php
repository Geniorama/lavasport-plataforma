<?php
class usuariosModel
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
		$sql = "SELECT count(usuarios.id) as son FROM usuarios";
		$son = $this->db->Execute($sql);
		return $son->fields["son"];
	}


	public function listar()
	{
		$sql = "SELECT usuarios.*, sedes.nombre as sedes_nombre FROM usuarios LEFT JOIN sedes ON sedes.id=usuarios.sede_id WHERE usuarios.sede_id=" . $_SESSION['sede'];

		return $this->db->Execute($sql);
	}

	public function listaractivos()
	{
		$sql = "SELECT usuarios.*, sedes.nombre as sedes_nombre FROM usuarios LEFT JOIN sedes ON sedes.id=usuarios.sede_id WHERE usuarios.sede_id=" . $_SESSION['sede'] . " AND usuarios.estado=1";

		return $this->db->Execute($sql);
	}

	public function ver($id)
	{
		$sql = "SELECT usuarios.nombre,usuarios.celular FROM usuarios  WHERE usuarios.id=" . $id;

		return $this->db->Execute($sql);
	}
	public function vertel($id)
	{
		$sql = "SELECT usuarios.celular FROM usuarios  WHERE usuarios.id=" . $id;

		return $this->db->Execute($sql);
	}

	public function agregando($entra)
	{

		if ($this->db->AutoExecute("usuarios", $entra, "INSERT") == false) {
			return 0;
		} else {
			return $this->db->INSERT_ID();
		}
	}

	public function editar($id)
	{
		$sql = "
			SELECT usuarios.*
			FROM usuarios
			WHERE usuarios.id = " . $id;
		return $this->db->Execute($sql);
	}

	public function editando($id, $entra)
	{

		if ($this->db->AutoExecute("usuarios", $entra, "UPDATE", "id=" . $id) == false) {
			return 0;
		} else {
			return $id;
		}
	}

	public function eliminar($id)
	{
		return $this->db->Execute("DELETE FROM usuarios WHERE id=" . $id);
	}
}
