<?php
class escuelasModel
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
		$sql = "SELECT count(escuelas.id) as son FROM escuelas";
		$son = $this->db->Execute($sql);
		return $son->fields["son"];
	}

	public function activos()
	{
		$sql = "
			SELECT escuelas.*
			FROM escuelas
			WHERE escuelas.estado=1";
		return $this->db->Execute($sql);
	}

	public function inactivos()
	{
		$sql = "
			SELECT escuelas.*
			FROM escuelas
			WHERE escuelas.estado=0";
		return $this->db->Execute($sql);
	}

	public function listar()
	{
		$sql = "
			SELECT escuelas.*
			FROM escuelas
			";
		return $this->db->Execute($sql);
	}

	public function ver($id)
	{
		$sql = "
			SELECT escuelas.*
			FROM escuelas 
			WHERE escuelas.id = " . $id;
		return $this->db->Execute($sql);
	}

	public function filtrar($llega)
	{
		$where = "";
		if (isset($llega["nombre"]) && $llega["nombre"] != "")
			$where .= "escuelas.nombre REGEXP '" . $llega["nombre"] . "' AND ";

		$sql = "
			SELECT escuelas.*
			FROM escuelas
			
			WHERE " . $where . " 1
			";
		return $this->db->Execute($sql);
	}

	public function agregando($entra)
	{
		if ($this->db->AutoExecute("escuelas", $entra, "INSERT") == false) {
			return 0;
		} else {
			return $this->db->INSERT_ID();
		}
	}

	public function editar($id)
	{
		$sql = "
			SELECT escuelas.*
			FROM escuelas 
			WHERE escuelas.id = " . $id;
		return $this->db->Execute($sql);
	}

	public function editando($id, $entra)
	{
		if ($this->db->AutoExecute("escuelas", $entra, "UPDATE", "id=" . $id) == false) {
			return 0;
		} else {
			return $id;
		}
	}

	public function eliminar($id)
	{
		return $this->db->Execute("DELETE FROM escuelas WHERE id=" . $id);
	}
}
