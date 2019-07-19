<?php
class cuposModel {

	public $db;

	function __construct() {
		$this->db = ADONewConnection(DB_TIPO);$this->db->debug = DB_DEBUG;
		$this->db->Connect(DB_SERVER,DB_USER,DB_CLAVE,DB_DB);$this->db->SetFetchMode(ADODB_FETCH_ASSOC);
	}

	function __destruct() {$this->db->close();}

	public function cantidad(){
		$sql="SELECT count(cupos.id) as son FROM cupos WHERE organizacione_id=".$_SESSION['organizacione_id'];
		$son=$this->db->Execute($sql);
		return $son->fields["son"];
	}

	public function activos(){
		$sql="
			SELECT cupos.*
			FROM cupos
			WHERE cupos.estado=1 AND organizacione_id=".$_SESSION['organizacione_id'];
		return $this->db->Execute($sql);
	}

	public function inactivos(){
		$sql="
			SELECT cupos.*
			FROM cupos
			WHERE cupos.estado=0 AND organizacione_id=".$_SESSION['organizacione_id'];
		return $this->db->Execute($sql);
	}

	public function listar(){
		$sql="
			SELECT cupos.*
			FROM cupos WHERE organizacione_id=".$_SESSION['organizacione_id'];
			
		return $this->db->Execute($sql);
	}
	public function listarprenda($cupo){
		$sql="SELECT productocupos.*,productos.peso,productos.nombre FROM productocupos LEFT JOIN productos ON productos.id=productocupos.producto_id WHERE cupo_id=".$cupo;
		//echo $sql;
		return $this->db->Execute($sql);
	}

	public function ver($id){
		$sql="
			SELECT cupos.*
			FROM cupos 
			WHERE cupos.id = ".$id;
		
		return $this->db->Execute($sql);
	}

	public function filtrar($llega){
		$where="";
		if(isset($llega["nombre"]) && $llega["nombre"]!="")
			$where.="cupos.nombre REGEXP '".$llega["nombre"]."' AND ";
 
		$sql="
			SELECT cupos.*
			FROM cupos
			
			WHERE ".$where." organizacione_id=".$_SESSION['organizacione_id']."";
		return $this->db->Execute($sql);
	}

	public function agregando($entra){
		if($this->db->AutoExecute("cupos",$entra,"INSERT")==false){return 0;}else{return $this->db->INSERT_ID();}
	}

	public function editar($id){
		$sql="
			SELECT cupos.*
			FROM cupos 
			WHERE cupos.id = ".$id;
		return $this->db->Execute($sql);
	}

	public function editando($id,$entra){
		if($this->db->AutoExecute("cupos",$entra,"UPDATE","id=".$id)==false){return 0;}else{return $id;}
	}

	public function eliminar($id){
		return $this->db->Execute("DELETE FROM cupos WHERE id=".$id);
	}


}

