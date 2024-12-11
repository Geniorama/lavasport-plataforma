<?php
class companiasModel {

	public $db;

	function __construct() {
		$this->db = ADONewConnection(DB_TIPO);$this->db->debug = DB_DEBUG;
		$this->db->Connect(DB_SERVER,DB_USER,DB_CLAVE,DB_DB);$this->db->SetFetchMode(ADODB_FETCH_ASSOC);
	}

	function __destruct() {$this->db->close();}

	public function cantidad(){
		$sql="SELECT count(companias.id) as son FROM companias";
		$son=$this->db->Execute($sql);
		return $son->fields["son"];
	}

	public function activos(){
		$sql="
			SELECT companias.*, escuelas.nombre as escuelas_nombre
			FROM companias
			LEFT JOIN escuelas ON companias.escuela_id=escuelas.id
			WHERE companias.estado=1";
		return $this->db->Execute($sql);
	}

	public function inactivos(){
		$sql="
			SELECT companias.*, escuelas.nombre as escuelas_nombre
			FROM companias
			LEFT JOIN escuelas ON companias.escuela_id=escuelas.id
			WHERE companias.estado=0";
		return $this->db->Execute($sql);
	}

	public function listar(){
		$sql="
			SELECT companias.*, escuelas.nombre as escuelas_nombre
			FROM companias
			LEFT JOIN escuelas ON companias.escuela_id=escuelas.id
			";
		return $this->db->Execute($sql);
	}

	public function ver($id){
		$sql="
			SELECT companias.*, escuelas.nombre as escuelas_nombre
			FROM companias 
			LEFT JOIN escuelas ON companias.escuela_id=escuelas.id
			WHERE companias.id = ".$id;
		return $this->db->Execute($sql);
	}

	public function filtrar($llega){
		$where="";
		if(isset($llega["nombre"]) && $llega["nombre"]!="")
			$where.="companias.nombre REGEXP '".$llega["nombre"]."' AND ";
 		if(isset($llega["escuela_id"]) && $llega["escuela_id"]!="")
			$where.="companias.escuela_id REGEXP '".$llega["escuela_id"]."' AND ";
 
		$sql="
			SELECT companias.*, escuelas.nombre as escuelas_nombre
			FROM companias
			LEFT JOIN escuelas ON companias.escuela_id=escuelas.id
			
			WHERE ".$where." 1
			";
		return $this->db->Execute($sql);
	}

	public function agregando($entra){
		if($this->db->AutoExecute("companias",$entra,"INSERT")==false){return 0;}else{return $this->db->INSERT_ID();}
	}

	public function editar($id){
		$sql="
			SELECT companias.*, escuelas.nombre as escuelas_nombre
			FROM companias 
			LEFT JOIN escuelas ON companias.escuela_id=escuelas.id
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

