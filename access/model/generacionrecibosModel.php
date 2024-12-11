<?php
class generacionrecibosModel {

	public $db;

	function __construct() {
		$this->db = ADONewConnection(DB_TIPO);$this->db->debug = DB_DEBUG;
		$this->db->Connect(DB_SERVER,DB_USER,DB_CLAVE,DB_DB);$this->db->SetFetchMode(ADODB_FETCH_ASSOC);
	}

	function __destruct() {$this->db->close();}

	public function cantidad(){
		$sql="SELECT count(generacionrecibos.id) as son FROM generacionrecibos";
		$son=$this->db->Execute($sql);
		return $son->fields["son"];
	}

	public function activos(){
		$sql="
			SELECT generacionrecibos.*
			FROM generacionrecibos
			WHERE generacionrecibos.estado=1";
		return $this->db->Execute($sql);
	}

	public function inactivos(){
		$sql="
			SELECT generacionrecibos.*
			FROM generacionrecibos
			WHERE generacionrecibos.estado=0";
		return $this->db->Execute($sql);
	}

	public function listar(){
		$sql="
			SELECT generacionrecibos.*
			FROM generacionrecibos
			";
		return $this->db->Execute($sql);
	}

	public function ver($id){
		$sql="
			SELECT generacionrecibos.*
			FROM generacionrecibos 
			WHERE generacionrecibos.id = ".$id;
		return $this->db->Execute($sql);
	}

	public function filtrar($llega){
		$where="";
		if(isset($llega["recibo_id"]) && $llega["recibo_id"]!="")
			$where.="generacionrecibos.recibo_id REGEXP '".$llega["recibo_id"]."' AND ";
 
		$sql="
			SELECT generacionrecibos.*
			FROM generacionrecibos
			
			WHERE ".$where." 1
			";
		return $this->db->Execute($sql);
	}

	public function agregando($entra){
		if($this->db->AutoExecute("generacionrecibos",$entra,"INSERT")==false){return 0;}else{return $this->db->INSERT_ID();}
	}

	public function editar($id){
		$sql="
			SELECT generacionrecibos.*
			FROM generacionrecibos 
			WHERE generacionrecibos.id = ".$id;
		return $this->db->Execute($sql);
	}

	public function editando($id,$entra){
		if($this->db->AutoExecute("generacionrecibos",$entra,"UPDATE","id=".$id)==false){return 0;}else{return $id;}
	}

	public function eliminar($id){
		return $this->db->Execute("DELETE FROM generacionrecibos WHERE id=".$id);
	}


}

