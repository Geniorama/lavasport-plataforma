<?php
class estudiantesModel
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
		$sql = "SELECT count(estudiantes.id) as son FROM estudiantes";
		$son = $this->db->Execute($sql);
		return $son->fields["son"];
	}

	public function activos()
	{
		$sql = "
			SELECT estudiantes.*, companias.nombre as companias_nombre, grados.nombre as grados_nombre, escuelas.nombre as escuelas_nombre
			FROM estudiantes
			LEFT JOIN companias ON estudiantes.compania_id=companias.id
			LEFT JOIN grados ON estudiantes.grado_id=grados.id
			LEFT JOIN escuelas ON estudiantes.escuela_id=escuelas.id
			WHERE estudiantes.estado=1";
		return $this->db->Execute($sql);
	}

	public function inactivos()
	{
		$sql = "
			SELECT estudiantes.*, companias.nombre as companias_nombre, grados.nombre as grados_nombre, escuelas.nombre as escuelas_nombre
			FROM estudiantes
			LEFT JOIN companias ON estudiantes.compania_id=companias.id
			LEFT JOIN grados ON estudiantes.grado_id=grados.id
			LEFT JOIN escuelas ON estudiantes.escuela_id=escuelas.id
			WHERE estudiantes.estado=0";
		return $this->db->Execute($sql);
	}

	public function listar()
	{
		$sql = "
			SELECT estudiantes.*, escuelas.nombre as escuelas_nombre
			FROM estudiantes LEFT JOIN escuelas ON estudiantes.escuela_id=escuelas.codigo
			";

		return $this->db->Execute($sql);
	}

	public function ver($documento)
	{
		$sql = "
			SELECT estudiantes.id
			FROM estudiantes WHERE estudiantes.documento = '" . $documento . "'";

		return $this->db->Execute($sql);
	}

	public function filtrar($llega)
	{
		$where = "";
		if (isset($llega["documento"]) && $llega["documento"] != "")
			$where .= "estudiantes.documento REGEXP '" . $llega["documento"] . "' AND ";
		if (isset($llega["nombre"]) && $llega["nombre"] != "")
			$where .= "estudiantes.nombre REGEXP '" . $llega["nombre"] . "' AND ";
		if (isset($llega["email"]) && $llega["email"] != "")
			$where .= "estudiantes.email REGEXP '" . $llega["email"] . "' AND ";
		if (isset($llega["compania_id"]) && $llega["compania_id"] != "")
			$where .= "estudiantes.compania_id REGEXP '" . $llega["compania_id"] . "' AND ";
		if (isset($llega["grado_id"]) && $llega["grado_id"] != "")
			$where .= "estudiantes.grado_id REGEXP '" . $llega["grado_id"] . "' AND ";
		if (isset($llega["escuela_id"]) && $llega["escuela_id"] != "")
			$where .= "estudiantes.escuela_id REGEXP '" . $llega["escuela_id"] . "' AND ";

		$sql = "
			SELECT estudiantes.*, companias.nombre as companias_nombre, grados.nombre as grados_nombre, escuelas.nombre as escuelas_nombre
			FROM estudiantes LEFT JOIN escuelas ON estudiantes.escuela_id=escuelas.id WHERE " . $where . " 1
			";
		return $this->db->Execute($sql);
	}

	public function agregando($entra)
	{

		if ($this->db->AutoExecute("estudiantes", $entra, "INSERT") == false) {
			return 0;
		} else {
			return $this->db->INSERT_ID();
		}
	}

	public function editar($id)
	{
		$sql = "
			SELECT estudiantes.*, escuelas.nombre as escuelas_nombre
			FROM estudiantes LEFT JOIN escuelas ON estudiantes.escuela_id=escuelas.id
			WHERE estudiantes.id = " . $id;
		return $this->db->Execute($sql);
	}

	public function editando($id, $entra)
	{

		if ($this->db->AutoExecute("estudiantes", $entra, "UPDATE", "id=" . $id) == false) {
			return 0;
		} else {
			return $id;
		}
	}

	public function eliminar($id)
	{
		return $this->db->Execute("DELETE FROM estudiantes WHERE id=" . $id);
	}
	public function agregarmasivo($data)
	{

		$sql = "INSERT INTO estudiantes values(0,'$data[0]',$data[1],'$data[2]','$data[3]','$data[4]','$data[5]','$data[6]',$data[7],$data[8],$data[9],'$data[10]')";
		return $this->db->Execute($sql);
	}
}
