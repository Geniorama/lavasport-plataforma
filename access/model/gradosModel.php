<?php
class gradosModel {

	public $db;

	function __construct() {
		$this->db = ADONewConnection(DB_TIPO);$this->db->debug = DB_DEBUG;
		$this->db->Connect(DB_SERVER,DB_USER,DB_CLAVE,DB_DB);$this->db->SetFetchMode(ADODB_FETCH_ASSOC);
	}

	function __destruct() {$this->db->close();}

	public function cantidad(){
		$sql="SELECT count(grados.id) as son FROM grados";
		$son=$this->db->Execute($sql);
		return $son->fields["son"];
	}

	public function activos(){
		$sql="
			SELECT grados.*
			FROM grados
			WHERE grados.estado=1";
		return $this->db->Execute($sql);
	}

	public function inactivos(){
		$sql="
			SELECT grados.*
			FROM grados
			WHERE grados.estado=0";
		return $this->db->Execute($sql);
	}

	public function listar(){
		$sql="
			SELECT grados.*
			FROM grados
			";
		return $this->db->Execute($sql);
	}

	public function ver($id){
		$sql="
			SELECT grados.*
			FROM grados 
			WHERE grados.id = ".$id;
		return $this->db->Execute($sql);
	}

	public function filtrar($llega){
		$where="";
		if(isset($llega["nombre"]) && $llega["nombre"]!="")
			$where.="grados.nombre REGEXP '".$llega["nombre"]."' AND ";
 
		$sql="
			SELECT grados.*
			FROM grados
			
			WHERE ".$where." 1
			";
		return $this->db->Execute($sql);
	}

	public function agregando($entra){
		if($this->db->AutoExecute("grados",$entra,"INSERT")==false){return 0;}else{return $this->db->INSERT_ID();}
	}

	public function editar($id){
		$sql="
			SELECT grados.*
			FROM grados 
			WHERE grados.id = ".$id;
		return $this->db->Execute($sql);
	}

	public function editando($id,$entra){
		if($this->db->AutoExecute("grados",$entra,"UPDATE","id=".$id)==false){return 0;}else{return $id;}
	}

	public function eliminar($id){
		return $this->db->Execute("DELETE FROM grados WHERE id=".$id);
	}


}
