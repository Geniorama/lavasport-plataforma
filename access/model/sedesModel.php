<?php
class sedesModel
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
		$sql = "SELECT count(sedes.id) as son FROM sedes";
		$son = $this->db->Execute($sql);
		return $son->fields["son"];
	}


	public function listar()
	{
		$sql = "SELECT sedes.* FROM sedes";

		return $this->db->Execute($sql);
	}




	public function agregando($entra)
	{

		if ($this->db->AutoExecute("sedes", $entra, "INSERT") == false) {
			return 0;
		} else {
			return $this->db->INSERT_ID();
		}
	}

	public function editar($id)
	{
		$sql = "
			SELECT sedes.*
			FROM sedes
			WHERE sedes.id = " . $id;
		return $this->db->Execute($sql);
	}

	public function editando($id, $entra)
	{

		if ($this->db->AutoExecute("sedes", $entra, "UPDATE", "id=" . $id) == false) {
			return 0;
		} else {
			return $id;
		}
	}

	public function eliminar($id)
	{
		return $this->db->Execute("DELETE FROM sedes WHERE id=" . $id);
	}
}
