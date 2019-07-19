<?php
class clientesModel {

	public $db;

	function __construct() {
		$this->db = ADONewConnection(DB_TIPO);$this->db->debug = DB_DEBUG;
		$this->db->Connect(DB_SERVER,DB_USER,DB_CLAVE,DB_DB);$this->db->SetFetchMode(ADODB_FETCH_ASSOC);
	    $this->db->setCharset('utf8');
	}

	function __destruct() {$this->db->close();}

	public function cantidad(){
		$sql="SELECT count(clientes.id) as son FROM clientes";
		$son=$this->db->Execute($sql);
		return $son->fields["son"];
	}

	public function activos(){
		$sql="
			SELECT clientes.*, grados.nombre as grados_nombre, companias.nombre as companias_nombre, organizaciones.nombre as organizaciones_nombre
			FROM clientes
			LEFT JOIN grados ON clientes.grado_id=grados.id
			LEFT JOIN companias ON clientes.compania_id=companias.id
			LEFT JOIN organizaciones ON clientes.organizacione_id=organizaciones.id
			WHERE clientes.estado=1 AND organizaciones.id=".$_SESSION['organizacione_id'];
		return $this->db->Execute($sql);
	}

	public function inactivos(){
		$sql="
			SELECT clientes.*, grados.nombre as grados_nombre, companias.nombre as companias_nombre, organizaciones.nombre as organizaciones_nombre
			FROM clientes
			LEFT JOIN grados ON clientes.grado_id=grados.id
			LEFT JOIN companias ON clientes.compania_id=companias.id
			LEFT JOIN organizaciones ON clientes.organizacione_id=organizaciones.id
			WHERE clientes.estado=0 AND organizaciones.id=".$_SESSION['organizacione_id'];
		return $this->db->Execute($sql);
	}
 
	public function listar(){
		$sql="
			SELECT clientes.*, grados.nombre as grados_nombre, companias.nombre as companias_nombre, organizaciones.nombre as organizaciones_nombre
			FROM clientes
			LEFT JOIN grados ON clientes.grado_id=grados.id
			LEFT JOIN companias ON clientes.compania_id=companias.id
			LEFT JOIN organizaciones ON clientes.organizacione_id=organizaciones.id AND organizaciones.id=".$_SESSION['organizacione_id'];
		//	echo $sql;
		return $this->db->Execute($sql);
	}

public function vercupos($cliente){

	$sql=" SELECT *, cupos.nombre as cupo_nombre,cupos.id as id_cupo,cupos.grm_asignados,cupos.num_recibidos,cupos.dias from  clientecupo LEFT JOIN cupos ON (cupos.id=clientecupo.cupo_id)  WHERE CURDATE()>=clientecupo.inicio AND  CURDATE()<=clientecupo.fin AND cliente_id=".$cliente;
	 
	return $this->db->Execute($sql);
}
public function vercuposcliente($cliente){

	$sql=" SELECT clientecupo.id,clientecupo.pago, cupos.nombre as cupo_nombre,clientecupo.inicio,clientecupo.fin from  clientecupo LEFT JOIN cupos ON (cupos.id=clientecupo.cupo_id)  WHERE cliente_id=".$cliente. " ORDER BY inicio DESC";
	return $this->db->Execute($sql);
}

	public function ver($id){
		$sql="
			SELECT clientes.*, grados.nombre as grados_nombre, companias.nombre as companias_nombre, organizaciones.nombre as organizaciones_nombre
			FROM clientes 
			LEFT JOIN grados ON clientes.grado_id=grados.id
			LEFT JOIN companias ON clientes.compania_id=companias.id
			LEFT JOIN organizaciones ON clientes.organizacione_id=organizaciones.id
			WHERE clientes.documento = '".$id."'";
		
		return $this->db->Execute($sql);
	}

	public function verpororden($orden){
		$sql="
			SELECT clientes.*, grados.nombre as grados_nombre, companias.nombre as companias_nombre, organizaciones.nombre as organizaciones_nombre,
			ordenes.fecha_promesa,admins.nombre as recibidopor,ordenes.estado as estado_orden,ordenes.fecha_radicado,ordenes.tipo FROM ordenes LEFT JOIN clientes ON clientes.id=ordenes.cliente_id 
			LEFT JOIN grados ON clientes.grado_id=grados.id
			LEFT JOIN companias ON clientes.compania_id=companias.id
			LEFT JOIN organizaciones ON clientes.organizacione_id=organizaciones.id
			LEFT JOIN admins ON admins.id=ordenes.admin_id
			WHERE ordenes.id = '".$orden."'";
		//	echo $sql;
		
		return $this->db->Execute($sql);
	}

	public function filtrar($llega){
		$where="";
 		if(isset($llega["nombre"]) && $llega["nombre"]!="")
			$where.="clientes.nombre REGEXP '".$llega["nombre"]."' AND ";
 		if(isset($llega["compania_id"]) && $llega["compania_id"]!="")
		 $where .= " clientes.compania_id  IN(" . implode(",", $llega["compania_id"]) . ") AND ";
		 if(isset($llega["codigo"]) && $llega["codigo"]!="")
		 $where.="clientes.id =".$llega["codigo"]." AND ";
		 if(isset($llega["estado"]) && $llega["estado"]!="")
		 $where.="clientes.estado = ".$llega["estado"]." AND ";
 	
		$sql="
			SELECT clientes.*, grados.nombre as grados_nombre, companias.nombre as companias_nombre, organizaciones.nombre as organizaciones_nombre
			FROM clientes
			LEFT JOIN grados ON clientes.grado_id=grados.id
			LEFT JOIN companias ON clientes.compania_id=companias.id
			LEFT JOIN organizaciones ON clientes.organizacione_id=organizaciones.id
			
			WHERE ".$where." clientes.organizacione_id=".$_SESSION['organizacione_id']."";
		//echo $sql;
		return $this->db->Execute($sql);
	}

	public function agregando($entra){
		if($this->db->AutoExecute("clientes",$entra,"INSERT")==false){return 0;}else{return $this->db->INSERT_ID();}
	}

	public function editar($id){
		$sql="
			SELECT clientes.*, grados.nombre as grados_nombre, companias.nombre as companias_nombre, organizaciones.nombre as organizaciones_nombre
			FROM clientes 
			LEFT JOIN grados ON clientes.grado_id=grados.id
			LEFT JOIN companias ON clientes.compania_id=companias.id
			LEFT JOIN organizaciones ON clientes.organizacione_id=organizaciones.id
			WHERE clientes.id = ".$id;
		return $this->db->Execute($sql);
	}

	public function editando($id,$entra){
		if($this->db->AutoExecute("clientes",$entra,"UPDATE","id=".$id)==false){return 0;}else{return $id;}
	}

	public function eliminar($id){
		return $this->db->Execute("DELETE FROM clientes WHERE id=".$id);
	}


}

