<?php
class productosController extends baseControl {

	public $valor;
	public $obj;

	public function __construct(){
		veraut();
		
		include_once("model/productosModel.php");$this->obj = new productosModel();
		include_once("model/organizacionesModel.php");
	}

	public function index(){
		$organizacionesobj = new organizacionesModel();$organizacion= $organizacionesobj->listar();
		if($this->obj->cantidad()<10001){$sale = $this->obj->listar();$msg=1;}else{$sale=new nada();$msg=2;}
		include("view/_header.php");
		include("view/productos_index.php");
		include("view/_footer.php");
	}

	public function ver(){
		$sale = $this->obj->ver($this->valor[0]);
	
		echo $sale->fields["id"];echo "-";echo $sale->fields["peso"];
	}
	public function verpeso(){
		$sale = $this->obj->ver($this->valor[0]);
		echo $sale->fields["peso"];
	}
	public function verxcod(){
		$sale = $this->obj->verxcod($this->valor[0]);
		echo $sale->fields["id"];echo "-";echo $sale->fields["peso"];
	}

	public function filtrar(){
		$organizacionesobj = new organizacionesModel();$organizacion= $organizacionesobj->listar();
	
		if(count($_POST)>0){
			$llega = limpia2($_POST);
			$sale = $this->obj->filtrar($llega);$msg=0;
		}else{
			if($this->obj->cantidad()<10001){$sale = $this->obj->listar();$msg=1;}else{$sale=new nada();$msg=2;}
		}
		include("view/_header.php");
		include("view/productos_index.php");
		include("view/_footer.php");
	}

	public function agregar(){
		include("view/_header.php");
		include("view/productos_agregar.php");
		include("view/_footer.php");
	}

	public function agregando(){

		$entra = limpia2($_POST);
		if(!isset($entra["organizacione_id"])){
			$entra["organizacione_id"]=$_SESSION['organizacione_id'];

		}
		
		$ret = $this->obj->agregando($entra);

		$_SESSION["alertas"]=($ret)?iok().__("Se agrego la informacion"):ierror().__("Problema al agregar");
		header("Location: ".PATO."productos/index/1");exit;
	}

	public function editar(){
		$organizacionesobj = new organizacionesModel();$organizacion= $organizacionesobj->listar();
		$sale = $this->obj->editar($this->valor[0]);
		include("view/_header.php");
		include("view/productos_editar.php");
		include("view/_footer.php");
	}

	public function editando(){

		$entra = limpia2($_POST);
		if(!isset($entra["organizacione_id"])){
			$entra["organizacione_id"]=$_SESSION['organizacione_id'];

		}
		//$entra["editado"]=date("Y-m-d H:i:s");
		$ret = $this->obj->editando($this->valor[0],$entra);
		$_SESSION["alertas"]=($ret)?iok().__("Se actualizo la informacion"):ierror().__("Problema al editar");
		header("Location: ".PATO."productos/");exit;
	}

	public function eliminar(){
		$ret = $this->obj->eliminar($this->valor[0]);
		echo "ok";
	
	}

	public function activar(){
		$entra["editado"]=date("Y-m-d H:i:s");
		$entra["estado"]=1;
		$ret = $this->obj->editando($this->valor[0],$entra);
		$_SESSION["alertas"]=($ret)?iok().__("Se Activo correctamente"):ierror().__("Problema al Activar");
		header("Location: ".PATO."productos/");exit;
	}

	public function desactivar(){
		$entra["editado"]=date("Y-m-d H:i:s");
		$entra["estado"]=0;
		$ret = $this->obj->editando($this->valor[0],$entra);
		$_SESSION["alertas"]=($ret)?iok().__("Se Desactivo correctamente"):ierror().__("Problema al Desactivar");
		header("Location: ".PATO."productos/");exit;
	}

	public function descargar(){
		$rs = $this->obj->ver($this->valor[0]);
		header("Content-length: ".$rs->fields[$this->valor[1]."_size"]);
		header("Content-type: ".$rs->fields[$this->valor[1]."_type"]);
		header("Content-Disposition: attachment; filename=".$rs->fields[$this->valor[1]."_name"]);//inline
		echo $rs->fields[$this->valor[1]];exit;
	}


}

