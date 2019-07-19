<?php
class organizacionesModel {

	public $db;

	function __construct() {
		$this->db = ADONewConnection(DB_TIPO);$this->db->debug = DB_DEBUG;
		$this->db->Connect(DB_SERVER,DB_USER,DB_CLAVE,DB_DB);$this->db->SetFetchMode(ADODB_FETCH_ASSOC);
	}

	function __destruct() {$this->db->close();}

	public function cantidad(){
		$sql="SELECT count(organizaciones.id) as son FROM organizaciones";
		$son=$this->db->Execute($sql);
		return $son->fields["son"];
	}

	public function activos(){
		$sql="
			SELECT organizaciones.*
			FROM organizaciones
			WHERE organizaciones.estado=1";
		return $this->db->Execute($sql);
	}

	public function inactivos(){
		$sql="
			SELECT organizaciones.*
			FROM organizaciones
			WHERE organizaciones.estado=0";
		return $this->db->Execute($sql);
	}

	public function listar(){
		$sql="
			SELECT organizaciones.*
			FROM organizaciones";
		return $this->db->Execute($sql);
	}

	public function ver($id){
		$sql="
			SELECT organizaciones.*
			FROM organizaciones 
			WHERE organizaciones.id = ".$id;
		return $this->db->Execute($sql);
	}

	public function filtrar($llega){
		$where="";
		if(isset($llega["nombre"]) && $llega["nombre"]!="")
			$where.="organizaciones.nombre REGEXP '".$llega["nombre"]."' AND ";
 
		$sql="
			SELECT organizaciones.*
			FROM organizaciones
			
			WHERE ".$where." 1
			";
		return $this->db->Execute($sql);
	}

	public function agregando($entra){
		if($this->db->AutoExecute("organizaciones",$entra,"INSERT")==false){return 0;}else{return $this->db->INSERT_ID();}
	}

	public function editar($id){
		$sql="
			SELECT organizaciones.*
			FROM organizaciones 
			WHERE organizaciones.id = ".$id;
		return $this->db->Execute($sql);
	}

	public function editando($id,$entra){
		if($this->db->AutoExecute("organizaciones",$entra,"UPDATE","id=".$id)==false){return 0;}else{return $id;}
	}

	public function eliminar($id){
		return $this->db->Execute("DELETE FROM organizaciones WHERE id=".$id);
	}


}

