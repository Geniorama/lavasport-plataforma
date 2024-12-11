<?php
class configuracionesModel
{

	public $db;

	function __construct()
	{
		$this->db = ADONewConnection(DB_TIPO);
		$this->db->debug = DB_DEBUG;
		$this->db->Connect(DB_SERVER, DB_USER, DB_CLAVE, DB_DB);
		$this->db->SetFetchMode(ADODB_FETCH_ASSOC);
	}

	function __destruct()
	{
		$this->db->close();
	}

	public function cantidad()
	{
		$sql = "SELECT count(*) as son FROM configuraciones";
		$son = $this->db->Execute($sql);
		return $son->fields["son"];
	}

	public function activos()
	{
		$sql = "
			SELECT configuraciones.*
			FROM configuraciones
			WHERE configuraciones.estado=1";
		return $this->db->Execute($sql);
	}

	public function inactivos()
	{
		$sql = "
			SELECT configuraciones.*
			FROM configuraciones
			WHERE configuraciones.estado=0";
		return $this->db->Execute($sql);
	}

	public function listar()
	{
		$sql = "
			SELECT configuraciones.*
			FROM configuraciones
			";
		return $this->db->Execute($sql);
	}

	public function ver($id)
	{
		$sql = "
			SELECT configuraciones.*
			FROM configuraciones 
			WHERE configuraciones.id = " . $id;
		return $this->db->Execute($sql);
	}

	public function filtrar($llega)
	{
		$where = "";

		$sql = "
			SELECT configuraciones.*
			FROM configuraciones
			
			WHERE " . $where . " 1
			";
		return $this->db->Execute($sql);
	}

	public function agregando($entra)
	{
		if ($this->db->AutoExecute("configuraciones", $entra, "INSERT") == false) {
			return 0;
		} else {
			return $this->db->INSERT_ID();
		}
	}

	public function editar($id)
	{
		$sql = "
			SELECT configuraciones.*
			FROM configuraciones 
			WHERE configuraciones.id = " . $id;
		return $this->db->Execute($sql);
	}

	public function editando($id, $entra)
	{
		if ($this->db->AutoExecute("configuraciones", $entra, "UPDATE", "id=" . $id) == false) {
			return 0;
		} else {
			return $id;
		}
	}

	public function eliminar($id)
	{
		return $this->db->Execute("DELETE FROM configuraciones WHERE id=" . $id);
	}
}
