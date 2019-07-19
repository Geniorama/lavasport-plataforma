<?php
class clientecupoModel {

	public $db;

	function __construct() {
		$this->db = ADONewConnection(DB_TIPO);$this->db->debug = DB_DEBUG;
		$this->db->Connect(DB_SERVER,DB_USER,DB_CLAVE,DB_DB);$this->db->SetFetchMode(ADODB_FETCH_ASSOC);
	}

	function __destruct() {$this->db->close();}

	public function cantidad(){
		$sql="SELECT count(clientecupo.id) as son FROM clientecupo";
		$son=$this->db->Execute($sql);
		return $son->fields["son"];
	}

	public function activos(){
		$sql="
			SELECT clientecupo.*, clientes.nombre as clientes_nombre
			FROM clientecupo
			LEFT JOIN clientes ON clientecupo.cliente_id=clientes.id
			WHERE clientecupo.estado=1";
		return $this->db->Execute($sql);
	}

	public function inactivos(){
		$sql="
			SELECT clientecupo.*, clientes.nombre as clientes_nombre
			FROM clientecupo
			LEFT JOIN clientes ON clientecupo.cliente_id=clientes.id
			WHERE clientecupo.estado=0";
		return $this->db->Execute($sql);
	}

	public function listar(){
		$sql="
			SELECT clientecupo.*, clientes.nombre as clientes_nombre
			FROM clientecupo
			LEFT JOIN clientes ON clientecupo.cliente_id=clientes.id
			";
		return $this->db->Execute($sql);
	}

	public function ver($id){
		$sql="
			SELECT clientecupo.*, clientes.nombre as clientes_nombre
			FROM clientecupo 
			LEFT JOIN clientes ON clientecupo.cliente_id=clientes.id
			WHERE clientecupo.id = ".$id;
		return $this->db->Execute($sql);
	}

	public function filtrar($llega){
		$where="";
		if(isset($llega["cliente_id"]) && $llega["cliente_id"]!="")
			$where.="clientecupo.cliente_id REGEXP '".$llega["cliente_id"]."' AND ";
 		if(isset($llega["cupo_id"]) && $llega["cupo_id"]!="")
			$where.="clientecupo.cupo_id REGEXP '".$llega["cupo_id"]."' AND ";
 
		$sql="
			SELECT clientecupo.*, clientes.nombre as clientes_nombre
			FROM clientecupo
			LEFT JOIN clientes ON clientecupo.cliente_id=clientes.id
			
			WHERE ".$where." 1
			";
		return $this->db->Execute($sql);
	}

	public function agregando($entra){
		if($this->db->AutoExecute("clientecupo",$entra,"INSERT")==false){return 0;}else{return $this->db->INSERT_ID();}
	}

	public function editar($id){
		$sql="
			SELECT clientecupo.*, clientes.nombre as clientes_nombre
			FROM clientecupo 
			LEFT JOIN clientes ON clientecupo.cliente_id=clientes.id
			WHERE clientecupo.id = ".$id;
		return $this->db->Execute($sql);
	}

	public function editando($id,$entra){
		if($this->db->AutoExecute("clientecupo",$entra,"UPDATE","id=".$id)==false){return 0;}else{return $id;}
	}

	public function eliminar($id){
		return $this->db->Execute("DELETE FROM clientecupo WHERE id=".$id);
	}


}

