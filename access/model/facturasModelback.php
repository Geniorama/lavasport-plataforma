<?php
class facturasModel
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
		$sql = "SELECT count(facturas.id) as son FROM facturas";
		$son = $this->db->Execute($sql);
		return $son->fields["son"];
	}

	public function activos()
	{
		$sql = "
			SELECT facturas.*, escuelas.nombre as escuelas_nombre, bancos.nombre as bancos_nombre, bancos.nombre as bancos_nombre, bancos.nombre as bancos_nombre, bancos.nombre as bancos_nombre, bancos.nombre as bancos_nombre
			FROM facturas
			LEFT JOIN escuelas ON facturas.escuela_id=escuelas.id
			LEFT JOIN bancos ON facturas.banco1=bancos.id
			LEFT JOIN bancos ON facturas.banco2=bancos.id
			LEFT JOIN bancos ON facturas.banco3=bancos.id
			LEFT JOIN bancos ON facturas.banco4=bancos.id
			LEFT JOIN bancos ON facturas.banco5=bancos.id
			WHERE facturas.estado=1";
		return $this->db->Execute($sql);
	}

	public function traercsvpse()
	{

		$sql = "(SELECT *,escuelas.nombre as escuela_nombre,estudiantes.nombre as nombre_estudiante FROM estudiantes LEFT JOIN escuelas ON escuelas.codigo=estudiantes.escuela_id LEFT JOIN facturas ON facturas.escuela_id=escuelas.id WHERE NOW() BETWEEN facturas.inicio AND facturas.fin AND facturas.id NOT IN (SELECT factura_id FROM facturasestudiantes) AND estudiantes.id NOT IN (SELECT estudiante_id FROM facturasestudiantes LEFT JOIN facturas ON facturasestudiantes.factura_id=facturas.id WHERE NOW() BETWEEN facturas.inicio AND facturas.fin)  ORDER BY estudiantes.id) union (SELECT estudiantes.*,escuelas.*,facturas.*,escuelas.nombre as escuela_nombre,estudiantes.nombre as nombre_estudiante FROM facturasestudiantes LEFT JOIN estudiantes on estudiantes.id=facturasestudiantes.estudiante_id LEFT JOIN facturas ON facturas.id=facturasestudiantes.factura_id LEFT JOIN escuelas ON escuelas.codigo=estudiantes.escuela_id  WHERE NOW() BETWEEN facturas.inicio AND facturas.fin  ORDER BY estudiantes.id)";
		return $this->db->Execute($sql);
	}

	public function listar()
	{
		$sql = "
		SELECT facturas.*, escuelas.nombre as escuelas_nombre, b1.nombre as bancos_nombre1, b2.nombre as bancos_nombre2, b3.nombre as bancos_nombre3, b4.nombre as bancos_nombre4
			FROM facturas
			LEFT JOIN escuelas ON facturas.escuela_id=escuelas.id
			LEFT JOIN bancos AS  b1 ON facturas.banco1=b1.id
			LEFT JOIN bancos AS b2 ON facturas.banco2=b2.id
			LEFT JOIN bancos AS b3 ON facturas.banco3=b3.id
			LEFT JOIN bancos AS b4 ON facturas.banco4=b4.id ORDER BY facturas.id DESC";
		return $this->db->Execute($sql);
	}

	public function ver($id)
	{
		$sql = "
			SELECT facturas.*, escuelas.nombre as escuelas_nombre, bancos.nombre as bancos_nombre, bancos.nombre as bancos_nombre, bancos.nombre as bancos_nombre, bancos.nombre as bancos_nombre, bancos.nombre as bancos_nombre
			FROM facturas 
			LEFT JOIN escuelas ON facturas.escuela_id=escuelas.id
			LEFT JOIN bancos ON facturas.banco1=bancos.id
			LEFT JOIN bancos ON facturas.banco2=bancos.id
			LEFT JOIN bancos ON facturas.banco3=bancos.id
			LEFT JOIN bancos ON facturas.banco4=bancos.id
			LEFT JOIN bancos ON facturas.banco5=bancos.id
			WHERE facturas.id = " . $id;
		return $this->db->Execute($sql);
	}

	public function estudiantesxescuela($escuela)
	{

		$sql = "SELECT * FROM estudiantes WHERE escuela_id=" . $escuela;

		return $this->db->Execute($sql);
	}
	public function estudiantesFactura($factura)
	{

		$sql = "SELECT * FROM facturasestudiantes WHERE factura_id=" . $factura;

		return $this->db->Execute($sql);
	}

	public function filtrar($llega)
	{
		$where = "";
		if (isset($llega["escuela_id"]) && $llega["escuela_id"] != "")
			$where .= "facturas.escuela_id REGEXP '" . $llega["escuela_id"] . "' AND ";

		$sql = "
			SELECT facturas.*, escuelas.nombre as escuelas_nombre, bancos.nombre as bancos_nombre, bancos.nombre as bancos_nombre, bancos.nombre as bancos_nombre, bancos.nombre as bancos_nombre, bancos.nombre as bancos_nombre
			FROM facturas
			LEFT JOIN escuelas ON facturas.escuela_id=escuelas.id
			LEFT JOIN bancos ON facturas.banco1=bancos.id
			LEFT JOIN bancos ON facturas.banco2=bancos.id
			LEFT JOIN bancos ON facturas.banco3=bancos.id
			LEFT JOIN bancos ON facturas.banco4=bancos.id
			LEFT JOIN bancos ON facturas.banco5=bancos.id
			
			WHERE " . $where . " 1
			";
		return $this->db->Execute($sql);
	}

	public function agregando($entra)
	{
		if ($this->db->AutoExecute("facturas", $entra, "INSERT") == false) {
			return 0;
		} else {


			return $this->db->INSERT_ID();
		}
	}


	public function agregandoestudiantef($entra)
	{
		if ($this->db->AutoExecute("facturasestudiantes", $entra, "INSERT") == false) {
			return 0;
		} else {


			return $this->db->INSERT_ID();
		}
	}

	public  function consultargeneracionrecibo($recibo, $estudiante)
	{

		$sql = "SELECT id FROM generacionrecibos WHERE recibo_id=" . $recibo . " AND estudiante='" . $estudiante . "'";
		return $this->db->Execute($sql);
	}
	public function agregandonumrecibo($entra)
	{
		if ($this->db->AutoExecute("generacionrecibos", $entra, "INSERT") == false) {
			return 0;
		} else {
			if (isset($entra["estudiante_id"]) && count($entra["estudiante_id"]) > 0) {
				foreach ($entra["estudiante_id"] as $estudiante) {
					$entra2["factura_id"] = $this->db->INSERT_ID();
					$entra2["estudiante_id"] = $estudiante;
					if ($this->db->AutoExecute("facturasestudiantes", $entra2, "INSERT") == false) {
						echo "0";
					} else {
						echo "1";
					}
				}
			}


			return $this->db->INSERT_ID();
		}
	}

	public function editar($id)
	{
		$sql = "
		SELECT facturas.*, escuelas.nombre as escuelas_nombre, b1.nombre as bancos_nombre1, b2.nombre as bancos_nombre2, b3.nombre as bancos_nombre3, b4.nombre as bancos_nombre4
		FROM facturas
		LEFT JOIN escuelas ON facturas.escuela_id=escuelas.id
		LEFT JOIN bancos AS  b1 ON facturas.banco1=b1.id
		LEFT JOIN bancos AS b2 ON facturas.banco2=b2.id
		LEFT JOIN bancos AS b3 ON facturas.banco3=b3.id
		LEFT JOIN bancos AS b4 ON facturas.banco4=b4.id
			WHERE facturas.id = " . $id;
		return $this->db->Execute($sql);
	}

	public function editando($id, $entra)
	{
		if ($this->db->AutoExecute("facturas", $entra, "UPDATE", "id=" . $id) == false) {
			return 0;
		} else {

			if (isset($entra["estudiante_id"]) && count($entra["estudiante_id"]) > 0) {
				$this->db->Execute("DELETE FROM facturasestudiantes WHERE factura_id=" . $id);
				foreach ($entra["estudiante_id"] as $estudiante) {
					$entra2["factura_id"] = $id;
					$entra2["estudiante_id"] = $estudiante;
					if ($this->db->AutoExecute("facturasestudiantes", $entra2, "INSERT") == false) {
						echo "0";
					} else {
						echo "1";
					}
				}
			}



			return $id;
		}
	}

	public function eliminar($id)
	{
		return $this->db->Execute("DELETE FROM facturas WHERE id=" . $id);
	}
	public function eliminarestudiantesf($id)
	{
		return $this->db->Execute("DELETE FROM facturasestudiantes WHERE factura_id=" . $id);
	}
}
