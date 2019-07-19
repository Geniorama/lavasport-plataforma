<?php
class productocuposController extends baseControl {

	public $valor;
	public $obj;

	public function __construct(){
		veraut();
		include_once("model/productocuposModel.php");$this->obj = new productocuposModel();
		include_once("model/productosModel.php");
		include_once("model/cuposModel.php");
		include_once("model/clientesModel.php");
		include_once("model/observacionesModel.php");
	}

	public function index(){
		$productosobj = new productosModel();$productos = $productosobj->listarcupos();
		$observacionesobj = new observacionesModel();$observaciones = $observacionesobj->listar();
		//$cuposobj = new cuposModel();$cupos = $cuposobj->listar();
		//if($this->obj->cantidad()<10001){$sale = $this->obj->listar();$msg=1;}else{$sale=new nada();$msg=2;}
		include("view/_header.php");
		include("view/productocupos_index.php");
		include("view/_footer.php");
	}
	public function salidas(){
		$productosobj = new productosModel();$productos = $productosobj->listarcupos();
		include("view/_header.php");
		include("view/salidas_index.php");
		include("view/_footer.php");

	}

	public function ver(){
		$sale = $this->obj->ver($this->valor[0]);
		include("view/_header.php");
		include("view/productocupos_ver.php");
		include("view/_footer.php");
	}

	public function filtrar(){
		$productosobj = new productosModel();$productos = $productosobj->listar();
		$cuposobj = new cuposModel();$cupos = $cuposobj->listar();
		if(count($_POST)>0){
			$llega = limpia2($_POST);
			$sale = $this->obj->filtrar($llega);$msg=0;
		}else{
			if($this->obj->cantidad()<10001){$sale = $this->obj->listar();$msg=1;}else{$sale=new nada();$msg=2;}
		}
		include("view/_header.php");
		include("view/productocupos_index.php");
		include("view/_footer.php");
	}

	public function agregar(){
		$productosobj = new productosModel();$productos = $productosobj->listar();
		$cuposobj = new cuposModel();$cupos = $cuposobj->listar();
		include("view/_header.php");
		include("view/productocupos_agregar.php");
		include("view/_footer.php");
	}

	public function agregando(){

		$entra = limpia2($_POST);
		$entra["creado"]=date("Y-m-d H:i:s");
		$ret = $this->obj->agregando($entra);

		$_SESSION["alertas"]=($ret)?iok().__("Se agrego la informacion"):ierror().__("Problema al agregar");
		header("Location: ".PATO."cupos/ver/".$this->valor[0]);exit;
	}

	public function editar(){
		$productosobj = new productosModel();$productos = $productosobj->listar();
		$cuposobj = new cuposModel();$cupos = $cuposobj->listar();
		$sale = $this->obj->editar($this->valor[0]);
		include("view/_header.php");
		include("view/productocupos_editar.php");
		include("view/_footer.php");
	}

	public function editando(){

		$entra = limpia2($_POST);
		//$entra["editado"]=date("Y-m-d H:i:s");
		$ret = $this->obj->editando($this->valor[0],$entra);
		//$_SESSION["alertas"]=($ret)?iok().__("Se actualizo la informacion"):ierror().__("Problema al editar");
		//header("Location: ".PATO."productocupos/");exit;
	}

	public function eliminar(){
		$ret = $this->obj->eliminar($this->valor[0]);
		echo "ok";
	//	$_SESSION["alertas"]=($ret)?iok().__("Se elimino correctamente"):ierror().__("Problema al eliminar");
	//	header("Location: ".PATO."productocupos/");exit;
	}

	public function activar(){
		$entra["editado"]=date("Y-m-d H:i:s");
		$entra["estado"]=1;
		$ret = $this->obj->editando($this->valor[0],$entra);
		$_SESSION["alertas"]=($ret)?iok().__("Se Activo correctamente"):ierror().__("Problema al Activar");
		header("Location: ".PATO."productocupos/");exit;
	}

	public function desactivar(){
		$entra["editado"]=date("Y-m-d H:i:s");
		$entra["estado"]=0;
		$ret = $this->obj->editando($this->valor[0],$entra);
		$_SESSION["alertas"]=($ret)?iok().__("Se Desactivo correctamente"):ierror().__("Problema al Desactivar");
		header("Location: ".PATO."productocupos/");exit;
	}

	public function descargar(){
		$rs = $this->obj->ver($this->valor[0]);
		header("Content-length: ".$rs->fields[$this->valor[1]."_size"]);
		header("Content-type: ".$rs->fields[$this->valor[1]."_type"]);
		header("Content-Disposition: attachment; filename=".$rs->fields[$this->valor[1]."_name"]);//inline
		echo $rs->fields[$this->valor[1]];exit;
	}

	public function generarOrden(){

		$session_id = session_id();
		$entra = limpia2($_POST);
		$entra["fecha_radicado"]=date("Y-m-d H:i:s");
		$entra["session"]=$session_id;
		$entra["admin_id"]=$_SESSION['JC_UserID'];
	


//iinserto
$ret = $this->obj->agregandoorden($entra);
//actualiza productos con el id de la orden
$this->obj->actualizar_producto_orden($ret,$session_id);

session_regenerate_id();

echo $ret;
	}

	public function editarcomentario(){
		$entra = limpia2($_POST);
		$this->obj->actualizar_producto_orden_coment($this->valor[0],$entra);

	}
	public function eliminarreg(){
	
		$this->obj->eliminarreg($this->valor[0]);

	}

public function impresionticket(){
?>

	<!DOCTYPE html>
	<html>
	
	<head>
	 <style>
	* {
      font-size: 12px;
      font-family: 'Times New Roman';
    }
    
    td,
    th,
    tr,
    table {
      border-top: 1px solid black;
      border-collapse: collapse;
    }
    
    td.producto,
    th.producto {
      width: 400px;
      max-width: 400px;
    }
    
    td.cantidad,
    th.cantidad {
      width: 60px;
      max-width: 60px;
      word-break: break-all;
    }
    
    td.precio,
    th.precio {
      width: 60px;
      max-width: 60px;
      word-break: break-all;
    }
    
    .centrado {
      text-align: center;
      align-content: center;
    }
    
    .ticket {
      width: 400px;
      max-width: 400px;
    }
    
    img {
      max-width: inherit;
      width: inherit;
    }
		 </style>
	
	
	</head>
	
	<body>
	  <div class="ticket">
		<img src="https://yt3.ggpht.com/-3BKTe8YFlbA/AAAAAAAAAAI/AAAAAAAAAAA/ad0jqQ4IkGE/s900-c-k-no-mo-rj-c0xffffff/photo.jpg" alt="Logotipo">
		<p class="centrado">TICKET DE VENTA
		  <br>New New York
		  <br>17/10/2017 02:22 a.m.</p>
		<table>
		  <thead>
			<tr>
			  <th class="cantidad">CANT</th>
			  <th class="producto">PRODUCTO</th>
			  <th class="precio">$$</th>
			</tr>
		  </thead>
		  <tbody>
			<tr>
			  <td class="cantidad">1.00</td>
			  <td class="producto">CHEETOS VERDES 80 G</td>
			  <td class="precio">$8.50</td>
			</tr>
			<tr>
			  <td class="cantidad">2.00</td>
			  <td class="producto">KINDER DELICE</td>
			  <td class="precio">$10.00</td>
			</tr>
			<tr>
			  <td class="cantidad">1.00</td>
			  <td class="producto">COCA COLA 600 ML</td>
			  <td class="precio">$10.00</td>
			</tr>
			<tr>
			  <td class="cantidad"></td>
			  <td class="producto">TOTAL</td>
			  <td class="precio">$28.50</td>
			</tr>
		  </tbody>
		</table>
		<p class="centrado">¡GRACIAS POR SU COMPRA!
		  <br>parzibyte.me</p>
	  </div>
	</body>
	
	</html>
<?php
}


public function impresion(){
	$categorias=$this->obj->vercategoriasorden($this->valor[0]);

?>
	
		<!DOCTYPE html>
		<html>
		
		<head>
		 <style>
		* {
		  font-size: 14px;
		  font-family: 'Times New Roman';
		}
		
		td,
		th,
		tr,
		table {
		  border-top: 1px solid black;
		  border-collapse: collapse;
		}
		
		td.producto,
		th.producto {
		  width: 400px;
		  max-width: 400px;
		}
		
		td.cantidad,
		th.cantidad {
		  width: 60px;
		  max-width: 60px;
		  word-break: break-all;
		}
		
		td.precio,
		th.precio {
		  width: 60px;
		  max-width: 60px;
		  word-break: break-all;
		}
		
		.centrado {
		  text-align: center;
		  align-content: center;
		  font-size: 25px;
		}
		.categoria {

			font-size: 21px;	
			font-weight: bold;
			text-align: center;
		  align-content: center;
		}
		
		.ticket {
		  width: 400px;
		  max-width: 400px;
		}
		
		img {
		  max-width: inherit;
		  width: inherit;
		}
			 </style>
		
		
		</head>
		
		<body onafterprint="window.close()">
		<?php while(!$categorias->EOF){
			
			$entra=$this->obj->listarproductosOrdenGuardado($this->valor[0],$categorias->fields["categoria"]);
			?>
		  <div class="ticket">
			  <p><strong>FECHA RADICADO:</strong> <?php echo $entra->fields["fecha_radicado"];  ?></p>
				
			  <p><strong>FECHA PROMESA:</strong > <?php echo $entra->fields["fecha_promesa"];  ?></p>
			  <p class="categoria"><?php 
			  
			  if($categorias->fields["categoria"]==0){
				echo "SIN CATEGORIA";
				
							  } 

			  if($categorias->fields["categoria"]==1){
echo "GRAMOS";

			  } 
			  if($categorias->fields["categoria"]==2){
				echo "GANCHO";
				
							  } 
							  if($categorias->fields["categoria"]==3){
								echo "COLCHA";
								
											  } ?></p>
			 <p class="centrado"><?php echo $entra->fields["ordene_id"]; ?>
			  <br><?php echo $entra->fields["cliente_nombre"]; ?>
			  <br><?php echo $entra->fields["documento"]; ?>
			 </p>
			  <p></p>
			<table>
			  <thead>
				<tr>
				  <th class="cantidad">CANT</th>
				  <th class="producto">PRODUCTO</th>
				  <th class="precio">PESO</th>
				</tr>
			  </thead>
			  <tbody>
			  <?php 
			 $total=0; 
			 $cantprendas=0;
			  while(!$entra->EOF){ ?>
				<tr>
				  <td class="cantidad"><?php echo $entra->fields["cantidad"]; ?></td>
				  <td class="producto"><?php echo $entra->fields["productos_nombre"]; ?></td>
				  <td class="precio"><?php echo round($entra->fields["peso"]*$entra->fields["cantidad"]); ?></td>
				</tr>
			  <?php 
			 $cantprendas=$cantprendas+$entra->fields["cant_prendas"]*$entra->fields["cantidad"]; 
			  $total=$total+round($entra->fields["peso"]*$entra->fields["cantidad"]); $entra->MoveNext(); } $entra->Move(0);?>
			  <tr>
				  <td class="cantidad"></td>
				  <td class="producto"><strong>Total Gramos</strong></td>
				  <td class="precio"><strong><?php echo $total; ?></strong></td>
				</tr>
				<tr>
				  <td class="cantidad"></td>
				  <td class="producto"><strong>Total Prendas</strong></td>
				  <td class="precio"><strong><?php echo $cantprendas; ?></strong></td>
				</tr>
			</tbody>
			</table>
			
		  </div>
		  <br>
		  <br>
		  <br>
		  <div>----------------------------------------------------------------------------------------</div>
		  <br>
		  <br>
		  <br> 	
		  <?php 	$categorias->MoveNext(); } ?>
			
		</body>
		
		</html>
		<script>
			 window.print(); 
				  </script>
	<?php
	}

	public function agregar_producto(){

		$session_id = session_id();
        
		$entra = limpia2($_POST);
		$cliente=$entra["cliente_id"];
		$entra["session"]=$session_id;


//VERIFICAR LO AGREGADO CON EL CUPO
$totalgramos=$this->obj->sumagramos($cliente);
$cantidadprenda=$this->obj->sumcantidadelementos($cliente,$entra["producto_id"]);
$pg=$this->obj->totalcupo($entra["cupo"]);
$productoasignado=$this->obj->productoasignado($entra["cupo"],$entra["producto_id"]);
$prendasgramos=$pg->fields["grm_asignados"];
$prendastot=$productoasignado->fields["cantidad"];


		if($entra["cantidad"]>0){

			//si el producto pertenece a cupo
if(isset($productoasignado->fields["cantidad"]) && $productoasignado->fields["cantidad"]>0){
			if((($entra["precio"]*$entra["cantidad"])+$totalgramos->fields["total"]>$prendasgramos) || ($entra["cantidad"]+$cantidadprenda->fields["cantidad"]>$prendastot)){

				echo "<script>alert('se supera lo asignado en el cupo');</script>";
				
					}else{

						$ret = $this->obj->agregandoprod($entra);
					}
				}else{

					
//si no pertenece a cupo el producto solo verificamos la cantidad de gramos
					if(($entra["precio"]*$entra["cantidad"])+$totalgramos->fields["total"]>$prendasgramos){

						echo "<script>alert('se superó los gramos asignado en el cupo');</script>";
						
							}else{
		
								$ret = $this->obj->agregandoprod($entra);
							}



				}
	
	}
		if (isset($this->valor[0])) {//codigo elimina un elemento del array
            $id = intval($this->valor[0]);

            $ret = $this->obj->eliminarreg($id);
		}
	
		$sale=$this->obj->listarproductosOrden();
		
	
		?>
<table class="table table-hover">
                <tr>
                  <th>Cantidad</th>
                  <th>Detalle</th>
                  <th>Piezas</th>
                  <th>Peso Un.</th>
                  <th>Peso Tot.</th>
                  <th>Quitar</th>
                </tr>
			  <?php
			 $totalp=0; 
			 $totalpiezas=0;
			  while(!$sale->EOF){   ?>
				<tr>
                  <td><?php echo $sale->fields["cantidad"]; ?></td>
			  <td><?php echo $sale->fields["productos_nombre"]; ?>  <input type="text" id="comment<?php echo $sale->fields["id"]; ?>" name="comment<?php echo $sale->fields["id"]; ?>" onchange="editarcoment(<?php echo $sale->fields["id"]; ?>)" value="<?php echo $sale->fields["observacione_id"]; ?>" class="form-control" style="width: 100%;"> </td>
                  <td><?php echo $sale->fields["cant_prendas"]; ?></td>
				  <td><?php echo $sale->fields["precio"]; ?></td>
				  <td><?php echo round($sale->fields["precio"]*$sale->fields["cantidad"],2); ?></td>
                  <td> <button type="button" onclick="borrarregistro(<?php echo $sale->fields["id"]; ?>)" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i> </button>
</td>
                </tr>
			  <?php $totalpiezas=$totalpiezas+$sale->fields["cant_prendas"]; $totalp=$totalp+round($sale->fields["peso"]*$sale->fields["cantidad"],2); $sale->MoveNext(); } ?>

			  <tr>
                  <td><strong>Totales:</strong></td>
                  <td></td>
                  <td><strong><?php echo $totalpiezas; ?></strong></td>
				  <td></td>
				  <td><strong><?php echo round($totalp,2); gramos ?></strong></td>
                  <td></td>
                </tr>
			  </table>
			  
			
		<?php 

	}



	public function verprodorden(){

		


			//si el producto pertenece a cupo

		$sale=$this->obj->listarproductosOrden2($this->valor[0]);
		
	
		?>
<table class="table table-hover">
                <tr>
                  <th>Cantidad</th>
                  <th>Detalle</th>
                  <th>Piezas</th>
                  <th>Peso Un.</th>
                  <th>Peso Tot.</th>
                  <th>Check</th>
                </tr>
			  <?php
			 $totalp=0; 
			 $totalpiezas=0;
			  while(!$sale->EOF){   ?>
				<tr>
                  <td><?php echo $sale->fields["cantidad"]; ?></td>
			  <td><?php echo $sale->fields["productos_nombre"]; ?> <?php echo $sale->fields["observacione_id"]; ?> </td>
                  <td><?php echo $sale->fields["cant_prendas"]; ?></td>
				  <td><?php echo $sale->fields["precio"]; ?></td>
				  <td><?php echo round($sale->fields["precio"]*$sale->fields["cantidad"],2); ?></td>
                  <td> <input type="checkbox" id="cbox1" value="first_checkbox"></td>
                </tr>
			  <?php $totalpiezas=$totalpiezas+$sale->fields["cant_prendas"]; $totalp=$totalp+round($sale->fields["peso"]*$sale->fields["cantidad"],2); $sale->MoveNext(); } ?>

			  <tr>
                  <td><strong>Totales:</strong></td>
                  <td></td>
                  <td><strong><?php echo $totalpiezas; ?></strong></td>
				  <td></td>
				  <td><strong><?php echo round($totalp,2); gramos ?></strong></td>
                  <td></td>
                </tr>
			  </table>
			  
			
		<?php 

	}



	public function estadocupo(){
		$session_id = session_id();
		$this->obj->borrartmpprod($session_id);
		$clientesobj = new clientesModel();$cupos = $clientesobj->vercupos($this->valor[0]);
		$cuposobj= new cuposModel(); 
		$prendas=$cuposobj->listarprenda($cupos->fields["id_cupo"]);
		$gramos=$this->obj->sumagramos($this->valor[0]);
		//numero de ordenes al mes
		$numorden=$this->obj->numero_de_ordenes_mes($this->valor[0]);
		if(!$cupos->fields["grm_asignados"]){
echo "<script>alert('no se ha asignado cupo al cliente');</script>";

		}
	?>
		<p class="text-center">
			<?php 
				if(!$cupos->fields["grm_asignados"]){
					echo "SIN CUPO";
					
							}else{
							?>
                    <strong> del <?php echo $cupos->fields["inicio"];?> al <?php echo $cupos->fields["fin"];?></strong>
				<?php } ?> 
				</p>

                  <div class="progress-group">
                    <span class="progress-text">Consumos cupos</span>
                    <span class="progress-number"><b><?php echo round($gramos->fields["total"]); ?></b>/<?php echo $cupos->fields["grm_asignados"]; ?> gramos</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width: <?php echo round(($gramos->fields["total"]*100)/$cupos->fields["grm_asignados"]);  ?>%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <!-- /.progress-group -->
			 <?php  while(!$prendas->EOF){ 
				$cantidadelemento= $this->obj->sumcantidadelementos($this->valor[0],$prendas->fields["producto_id"]);
				 ?>
				  <div class="progress-group">
                    <span class="progress-text"><?php  echo $prendas->fields["nombre"]; ?></span>
                    <span class="progress-number"><b><?php echo $cantidadelemento->fields["cantidad"]; ?></b>/<?php echo  $prendas->fields["cantidad"];  ?> unidades</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-green" style="width: <?php echo round(($cantidadelemento->fields["cantidad"]*100)/$prendas->fields["cantidad"]);  ?>%"></div>
                    </div>
				  </div>
			 <?php $prendas->MoveNext(); } ?>
			 <input type="hidden" name="cupo" id="cupo" value="<?php echo $cupos->fields["id_cupo"]; ?>">
			
			 <script>
				 <?php
				 $fecha=date("Y-m-d");
				 $nuevafecha = strtotime ( '+'.$cupos->fields["dias"].' day' , strtotime ( $fecha ) ) ;
                 $nuevafecha = date ( 'Y-m-d' , $nuevafecha );
				  ?>
				 $("#fecha_promesa").val(<?php echo $nuevafecha;  ?>);

				
				 <?php
				 if($numorden->fields["numero"]>=$cupos->fields["num_recibidos"]){
                 echo "alert('ya finalizo el numero de recibidos del mes')";

				 }else{

				echo "$('#botonenvio').show();";	
				 }
				 
				  ?>
				 
				 </script>
			  <!-- /.progress-group -->
               
                  <!-- /.progress-group -->

<?php

	}


}