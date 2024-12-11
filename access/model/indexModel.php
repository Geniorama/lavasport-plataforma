<?php
class indexModel
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

	public function verificar($email, $passw)
	{
		$result = $this->db->Execute("SELECT * FROM admins WHERE email = '$email' and pass = '$passw' ");
		return $result;
	}
	function verpagos($fecha1, $fecha2)
	{
		$sql = "SELECT sum(valor) as total FROM pagos WHERE pagos.fecha BETWEEN '" . $fecha1 . "' AND '" . $fecha2 . "'";

		return $this->db->Execute($sql);
	}
	function verfacturas($fecha1, $fecha2)
	{
		$sql = "SELECT count(*) as total FROM facturasgeneradas WHERE facturasgeneradas.fecha BETWEEN '" . $fecha1 . " 00:00:00' AND '" . $fecha2 . " 23:59:59'";

		return $this->db->Execute($sql);
	}
}
