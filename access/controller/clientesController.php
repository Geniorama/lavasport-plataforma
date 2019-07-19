<?php
class clientesController extends baseControl {

	public $valor;
	public $obj;

	public function __construct(){
		veraut();
		include_once("model/clientesModel.php");$this->obj = new clientesModel();
		include_once("model/gradosModel.php");
		include_once("model/companiasModel.php");
		include_once("model/organizacionesModel.php");
		include_once("model/cuposModel.php");
	}

	public function index(){
		$_POST["estado"]=1;
		$gradosobj = new gradosModel();$grados = $gradosobj->listar();
		$companiasobj = new companiasModel();$companias = $companiasobj->listar();
		$organizacionesobj = new organizacionesModel();$organizaciones = $organizacionesobj->listar();
		$cuposobj = new cuposModel();$cupos1 = $cuposobj->listar();
		if($this->obj->cantidad()<10001){$sale = $this->obj->listar();$msg=1;}else{$sale=new nada();$msg=2;}
		include("view/_header.php");
		include("view/clientes_index.php");
		include("view/_footer.php");
	}

	public function ver(){
		$sale = $this->obj->ver($this->valor[0]);
		echo $sale->fields["nombre"]." ".$sale->fields["apellido"]."-".$sale->fields["grados_nombre"]."-".$sale->fields["companias_nombre"]."-".$sale->fields["email"]."-".$sale->fields["telefono"]."-".$sale->fields["id"]."-".$sale->fields["especial"];
		//include("view/_header.php");
		//include("view/clientes_ver.php");
		//include("view/_footer.php");
	}

	public function verpororden(){

		$sale = $this->obj->verpororden($this->valor[0]);
		if($sale->fields["tipo"]==2){
			$tipo="Cupo";
		}else{

			$tipo="extra";
		}
		echo $sale->fields["nombre"]." ".$sale->fields["apellido"]."/".$sale->fields["grados_nombre"]."/".$sale->fields["companias_nombre"]."/".$sale->fields["email"]."/".$sale->fields["telefono"]."/".$sale->fields["id"]."/".$sale->fields["fecha_radicado"]."/".$sale->fields["fecha_promesa"]."/".$sale->fields["recibidopor"]."/".$sale->fields["estado_orden"]."/".$tipo;
		
	}

	public function filtrar(){
		$gradosobj = new gradosModel();$grados = $gradosobj->listar();
		$companiasobj = new companiasModel();$companias = $companiasobj->listar();
		$organizacionesobj = new organizacionesModel();$organizaciones = $organizacionesobj->listar();
		$cuposobj = new cuposModel();$cupos1 = $cuposobj->listar();

		if(count($_POST)>0){
			$llega = $_POST;
			$sale = $this->obj->filtrar($llega);$msg=0;
		}else{
			if($this->obj->cantidad()<10001){$sale = $this->obj->listar();$msg=1;}else{$sale=new nada();$msg=2;}
		}
		include("view/_header.php");
		include("view/clientes_index.php");
		include("view/_footer.php");
	}

	public function agregar(){
		$gradosobj = new gradosModel();$grados = $gradosobj->listar();
		$companiasobj = new companiasModel();$companias = $companiasobj->listar();
		$organizacionesobj = new organizacionesModel();$organizaciones = $organizacionesobj->listar();
		include("view/_header.php");
		include("view/clientes_agregar.php");
		include("view/_footer.php");
	}

	public function agregando(){

		$entra = limpia2($_POST);
		if(!isset($entra["organizacione_id"])){
			$entra["organizacione_id"]=$_SESSION['organizacione_id'];

		}
		$entra["creado"]=date("Y-m-d H:i:s");
		$ret = $this->obj->agregando($entra);

		$_SESSION["alertas"]=($ret)?iok().__("Se agrego la informacion"):ierror().__("Problema al agregar");
		header("Location: ".PATO."clientes/index/1");exit;
	}

	public function editar(){
		$gradosobj = new gradosModel();$grados = $gradosobj->listar();
		$companiasobj = new companiasModel();$companias = $companiasobj->listar();
		$organizacionesobj = new organizacionesModel();$organizaciones = $organizacionesobj->listar();

		$sale = $this->obj->editar($this->valor[0]);
		$cupocliente = $this->obj->vercuposcliente($this->valor[0]);
		$cuposobj = new cuposModel();$cupos1 = $cuposobj->listar();
		include("view/_header.php");
		include("view/clientes_editar.php");
		include("view/_footer.php");
	}

	public function editando(){

		$entra = limpia2($_POST);
		$entra["editado"]=date("Y-m-d H:i:s");
		$ret = $this->obj->editando($this->valor[0],$entra);
		$_SESSION["alertas"]=($ret)?iok().__("Se actualizo la informacion"):ierror().__("Problema al editar");
		header("Location: ".PATO."clientes/");exit;
	}

	public function eliminar(){
		$ret = $this->obj->eliminar($this->valor[0]);
		$_SESSION["alertas"]=($ret)?iok().__("Se elimino correctamente"):ierror().__("Problema al eliminar");
		header("Location: ".PATO."clientes/");exit;
	}

	public function activar(){
		$entra["editado"]=date("Y-m-d H:i:s");
		$entra["estado"]=1;
		$ret = $this->obj->editando($this->valor[0],$entra);
		$_SESSION["alertas"]=($ret)?iok().__("Se Activo correctamente"):ierror().__("Problema al Activar");
		header("Location: ".PATO."clientes/");exit;
	}

	public function desactivar(){
		$entra["editado"]=date("Y-m-d H:i:s");
		$entra["estado"]=0;
		$ret = $this->obj->editando($this->valor[0],$entra);
		$_SESSION["alertas"]=($ret)?iok().__("Se Desactivo correctamente"):ierror().__("Problema al Desactivar");
		header("Location: ".PATO."clientes/");exit;
	}

	public function descargar(){
		$rs = $this->obj->ver($this->valor[0]);
		header("Content-length: ".$rs->fields[$this->valor[1]."_size"]);
		header("Content-type: ".$rs->fields[$this->valor[1]."_type"]);
		header("Content-Disposition: attachment; filename=".$rs->fields[$this->valor[1]."_name"]);//inline
		echo $rs->fields[$this->valor[1]];exit;
	}


}

