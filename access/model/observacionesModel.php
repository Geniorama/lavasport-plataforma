<?php
class observacionesModel {

	public $db;

	function __construct() {
		$this->db = ADONewConnection(DB_TIPO);$this->db->debug = DB_DEBUG;
		$this->db->Connect(DB_SERVER,DB_USER,DB_CLAVE,DB_DB);$this->db->SetFetchMode(ADODB_FETCH_ASSOC);
	}

	function __destruct() {$this->db->close();}

	public function cantidad(){
		$sql="SELECT count(observaciones.id) as son FROM observaciones WHERE organizacione_id=".$_SESSION['organizacione_id'];
		$son=$this->db->Execute($sql);
		return $son->fields["son"];
	}

	public function activos(){
		$sql="
			SELECT observaciones.*
			FROM observaciones
			WHERE observaciones.estado=1 AND organizacione_id=".$_SESSION['organizacione_id'];
		return $this->db->Execute($sql);
	}

	public function inactivos(){
		$sql="
			SELECT observaciones.*
			FROM observaciones
			WHERE observaciones.estado=0 AND organizacione_id=".$_SESSION['organizacione_id'];
		return $this->db->Execute($sql);
	}

	public function listar(){
		$sql="
			SELECT observaciones.*
			FROM observaciones WHERE organizacione_id=".$_SESSION['organizacione_id'];
		return $this->db->Execute($sql);
	}

	public function ver($id){
		$sql="
			SELECT observaciones.*
			FROM observaciones 
			WHERE observaciones.id = ".$id;
		return $this->db->Execute($sql);
	}


	public function verporcodigo($codigo){
		$sql="
		SELECT observaciones.*
		FROM observaciones 
		WHERE observaciones.codigo = '".$codigo."'";
	return $this->db->Execute($sql);

	}

	public function filtrar($llega){
		$where="";

		$sql="
			SELECT observaciones.*
			FROM observaciones
			
			WHERE ".$where." 1
			";
		return $this->db->Execute($sql);
	}

	public function agregando($entra){
		if($this->db->AutoExecute("observaciones",$entra,"INSERT")==false){return 0;}else{return $this->db->INSERT_ID();}
	}

	public function editar($id){
		$sql="
			SELECT observaciones.*
			FROM observaciones 
			WHERE observaciones.id = ".$id;
		return $this->db->Execute($sql);
	}

	public function editando($id,$entra){
		if($this->db->AutoExecute("observaciones",$entra,"UPDATE","id=".$id)==false){return 0;}else{return $id;}
	}

	public function eliminar($id){
		return $this->db->Execute("DELETE FROM observaciones WHERE id=".$id);
	}


}

