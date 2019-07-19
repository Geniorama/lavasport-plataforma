<?php
class productocuposModel {

	public $db;

	function __construct() {
		$this->db = ADONewConnection(DB_TIPO);$this->db->debug = DB_DEBUG;
		$this->db->Connect(DB_SERVER,DB_USER,DB_CLAVE,DB_DB);$this->db->SetFetchMode(ADODB_FETCH_ASSOC);
	}

	function __destruct() {$this->db->close();}

	public function cantidad(){
		$sql="SELECT count(productocupos.id) as son FROM productocupos";
		$son=$this->db->Execute($sql);
		return $son->fields["son"];
	}

	public function activos(){
		$sql="
			SELECT productocupos.*, productos.nombre as productos_nombre, cupos.nombre as cupos_nombre
			FROM productocupos
			LEFT JOIN productos ON productocupos.producto_id=productos.id
			LEFT JOIN cupos ON productocupos.cupo_id=cupos.id
			WHERE productocupos.estado=1";
		return $this->db->Execute($sql);
	}
	

	public function inactivos(){
		$sql="
			SELECT productocupos.*, productos.nombre as productos_nombre, cupos.nombre as cupos_nombre
			FROM productocupos
			LEFT JOIN productos ON productocupos.producto_id=productos.id
			LEFT JOIN cupos ON productocupos.cupo_id=cupos.id
			WHERE productocupos.estado=0";
		return $this->db->Execute($sql);
	}

	public function listar(){
		$sql="
			SELECT producto_ordenes.*, productos.nombre as productos_nombre, cupos.nombre as cupos_nombre
			FROM productocupos
			LEFT JOIN productos ON productocupos.producto_id=productos.id
			LEFT JOIN cupos ON productocupos.cupo_id=cupos.id
			";
		return $this->db->Execute($sql);
	}
	public function borrartmpprod($id){
		
		return $this->db->Execute("DELETE FROM producto_ordenes WHERE ordene_id=0 AND session='".$id."'");
		

	}

	public function sumagramos($cliente){
		$session_id = session_id();
$sql="SELECT sum(cantidad*precio) as total FROM producto_ordenes LEFT JOIN ordenes ON (ordenes.id=producto_ordenes.ordene_id) LEFT JOIN clientes ON (clientes.id=ordenes.cliente_id) WHERE clientes.id=".$cliente." OR producto_ordenes.session='".$session_id."'";
//echo $sql;
return $this->db->Execute($sql);
	}

	public function numero_de_ordenes_mes($cliente){
$sql="SELECT COUNT(*) AS numero FROM ordenes WHERE MONTH(fecha_radicado)=MONTH(CURDATE()) AND cliente_id=".$cliente;
		return $this->db->Execute($sql);	
	}
	public function sumcantidadelementos($cliente,$producto){
		$session_id = session_id();
	$sql="SELECT sum(cantidad) as cantidad FROM producto_ordenes LEFT JOIN ordenes ON (ordenes.id=producto_ordenes.ordene_id) LEFT JOIN clientes ON (clientes.id=ordenes.cliente_id) WHERE (clientes.id=".$cliente." AND producto_id=".$producto.") OR (producto_ordenes.session='".$session_id."' AND  producto_id=".$producto.")";	
//echo $sql;
	return $this->db->Execute($sql);
}
	public function listarproductosOrden(){
		$sql="
			SELECT producto_ordenes.*, productos.nombre as productos_nombre,productos.cant_prendas,productos.peso, observaciones.observacion
			FROM producto_ordenes
			LEFT JOIN productos ON producto_ordenes.producto_id=productos.id
			LEFT JOIN observaciones ON producto_ordenes.observacione_id=observaciones.id WHERE session='".session_id()."'";
	
	//echo $sql;
			return $this->db->Execute($sql);
	}

	public function listarproductosOrden2($orden){
		$sql="
			SELECT producto_ordenes.*, productos.nombre as productos_nombre,productos.cant_prendas,productos.peso, observaciones.observacion
			FROM producto_ordenes
			LEFT JOIN productos ON producto_ordenes.producto_id=productos.id
			LEFT JOIN observaciones ON producto_ordenes.observacione_id=observaciones.id WHERE ordene_id=".$orden."";
	
	//echo $sql;
			return $this->db->Execute($sql);
	}
	public function totalcupo($id){

$sql="SELECT grm_asignados FROM cupos WHERE id=".$id;
return $this->db->Execute($sql);
	}
	public function productoasignado($cupo,$producto){

		$sql="SELECT cantidad FROM productocupos WHERE cupo_id=".$cupo." and producto_id=".$producto;
	//echo $sql; 
		return $this->db->Execute($sql);

	}

public function vercategoriasorden($id){
	$sql="
	SELECT distinct productos.categoria FROM  producto_ordenes 
	LEFT JOIN productos ON producto_ordenes.producto_id=productos.id
	 WHERE producto_ordenes.ordene_id=".$id." ORDER BY categoria DESC";
	 return $this->db->Execute($sql);
}

public function listarproductosOrdenGuardado($id,$cat){
		$sql="
			SELECT producto_ordenes.*,clientes.nombre as cliente_nombre,clientes.id,clientes.documento,ordenes.fecha_radicado,ordenes.fecha_promesa,ordenes.admin_id,ordenes.descuento,ordenes.estado,productos.categoria,productos.nombre as productos_nombre,productos.cant_prendas,productos.peso, observaciones.observacion
			FROM ordenes LEFT JOIN producto_ordenes ON producto_ordenes.ordene_id=ordenes.id
			LEFT JOIN productos ON producto_ordenes.producto_id=productos.id
			LEFT JOIN clientes ON clientes.id=ordenes.cliente_id
			LEFT JOIN observaciones ON producto_ordenes.observacione_id=observaciones.id WHERE ordenes.id=".$id." AND productos.categoria=".$cat;
	
	//echo $sql;
			return $this->db->Execute($sql);
	}



	public function ver($id){
		$sql="
			SELECT productocupos.*, productos.nombre as productos_nombre, cupos.nombre as cupos_nombre
			FROM productocupos 
			LEFT JOIN productos ON productocupos.producto_id=productos.id
			LEFT JOIN cupos ON productocupos.cupo_id=cupos.id
			WHERE productocupos.id = ".$id;
		return $this->db->Execute($sql);
	}

	public function filtrar($llega){
		$where="";
		if(isset($llega["producto_id"]) && $llega["producto_id"]!="")
			$where.="productocupos.producto_id REGEXP '".$llega["producto_id"]."' AND ";
 		if(isset($llega["cupo_id"]) && $llega["cupo_id"]!="")
			$where.="productocupos.cupo_id REGEXP '".$llega["cupo_id"]."' AND ";
 
		$sql="
			SELECT productocupos.*, productos.nombre as productos_nombre, cupos.nombre as cupos_nombre
			FROM productocupos
			LEFT JOIN productos ON productocupos.producto_id=productos.id
			LEFT JOIN cupos ON productocupos.cupo_id=cupos.id
			
			WHERE ".$where." 1
			";
		return $this->db->Execute($sql);
	}
	public function agregandoprod($entra){

		if($this->db->AutoExecute("producto_ordenes",$entra,"INSERT")==false){return 0;}else{return $this->db->INSERT_ID();}

	}

	public function agregandoorden($entra){
		if($this->db->AutoExecute("ordenes",$entra,"INSERT")==false){return 0;}else{return $this->db->INSERT_ID();}


	}

	public function actualizar_producto_orden($id,$session){
		$entra["ordene_id"]=$id;
		if($this->db->AutoExecute("producto_ordenes",$entra,"UPDATE","session='".$session."'")==false){return 0;}else{return $id;}


	}
	public function actualizar_producto_orden_coment($id,$entra){
		
		if($this->db->AutoExecute("producto_ordenes",$entra,"UPDATE","id=".$id."")==false){return 0;}else{return $id;}


	}

	public function agregando($entra){
		if($this->db->AutoExecute("productocupos",$entra,"INSERT")==false){return 0;}else{return $this->db->INSERT_ID();}
	}

	public function editar($id){
		$sql="
			SELECT productocupos.*, productos.nombre as productos_nombre, cupos.nombre as cupos_nombre
			FROM productocupos 
			LEFT JOIN productos ON productocupos.producto_id=productos.id
			LEFT JOIN cupos ON productocupos.cupo_id=cupos.id
			WHERE productocupos.id = ".$id;
		return $this->db->Execute($sql);
	}

	public function editando($id,$entra){
		if($this->db->AutoExecute("productocupos",$entra,"UPDATE","id=".$id)==false){return 0;}else{return $id;}
	}

	public function eliminar($id){
		return $this->db->Execute("DELETE FROM productocupos WHERE id=".$id);
	}
	public function eliminarreg($id){

		return $this->db->Execute("DELETE FROM producto_ordenes WHERE id=".$id);	
	}




}

