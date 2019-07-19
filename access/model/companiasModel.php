<?php
class companiasModel {

	public $db;

	function __construct() {
		$this->db = ADONewConnection(DB_TIPO);$this->db->debug = DB_DEBUG;
		$this->db->Connect(DB_SERVER,DB_USER,DB_CLAVE,DB_DB);$this->db->SetFetchMode(ADODB_FETCH_ASSOC);
	}

	function __destruct() {$this->db->close();}

	public function cantidad(){
		$sql="SELECT count(companias.id) as son FROM companias where organizacione_id=".$_SESSION['organizacione_id'];
		$son=$this->db->Execute($sql);
		return $son->fields["son"];
	}

	public function activos(){
		$sql="
			SELECT companias.*
			FROM companias
			WHERE companias.estado=1 AND organizacione_id=".$_SESSION['organizacione_id'];
		return $this->db->Execute($sql);
	}

	public function inactivos(){
		$sql="
			SELECT companias.*
			FROM companias
			WHERE companias.estado=0 AND organizacione_id=".$_SESSION['organizacione_id'];
		return $this->db->Execute($sql);
	}

	public function listar(){
		$sql="
			SELECT companias.*
			FROM companias
			WHERE organizacione_id=".$_SESSION['organizacione_id'];
		return $this->db->Execute($sql);
	}

	public function ver($id){
		$sql="
			SELECT companias.*
			FROM companias 
			WHERE companias.id = ".$id;
		return $this->db->Execute($sql);
	}

	public function filtrar($llega){
		$where="";
		if(isset($llega["nombre"]) && $llega["nombre"]!="")
			$where.="companias.nombre REGEXP '".$llega["nombre"]."' AND ";
 
		$sql="
			SELECT companias.*
			FROM companias
			
			WHERE ".$where." organizacione_id=".$_SESSION['organizacione_id']."";
		return $this->db->Execute($sql);
	}

	public function agregando($entra){
		if($this->db->AutoExecute("companias",$entra,"INSERT")==false){return 0;}else{return $this->db->INSERT_ID();}
	}

	public function editar($id){
		$sql="
			SELECT companias.*
			FROM companias 
			WHERE companias.id = ".$id;
		return $this->db->Execute($sql);
	}

	public function editando($id,$entra){
		if($this->db->AutoExecute("companias",$entra,"UPDATE","id=".$id)==false){return 0;}else{return $id;}
	}

	public function eliminar($id){
		return $this->db->Execute("DELETE FROM companias WHERE id=".$id);
	}


}

