 <!-- Content Wrapper. Contains page content -->

 <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        Cajas

        <small>Versión 1.0</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

        <li class="active">Cajas</li>

      </ol>

    </section>



    <!-- Main content -->

 <!-- Info boxes -->

 <section class="content">

      <div class="row">

        <div class="col-xs-12">

          <div class="box">

          <?php if(isset($this->valor[0]) && $this->valor[0]>0){

?>

<div class="alert alert-info alert-dismissible">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                <h4><i class="icon fa fa-info"></i> Alerta!</h4>

               SE AGREGO CON EXITO

              </div>



<?php



            } ?>

            <div class="box box-default collapsed-box">

            <div class="box-header with-border">

              <h3 class="box-title">Entrada Caja</h3>



              <div class="box-tools pull-right">

                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>

                </button>

              </div>

              <!-- /.box-tools -->

            </div>

            <!-- /.box-header -->

            <div class="box-body">

            <form id="cupos-agregando" name="cupos-agregando" class="form-horizontal" method="post" action="<?php echo PATO; ?>cajas/agregando/" enctype="multipart/form-data">

          <div class="box-body">

          <div class="form-group">

                  <label for="exampleInputEmail1">Detalle</label>

                  <input type="text" class="form-control" name="descripcion" id="descripcion" onchange="verexistecodigo()" placeholder="Descripción" require>

                </div>

     

                <div class="form-group">

                  <label for="exampleInputEmail1">Tercero</label>

                 <select name="tercero_id" id="tercero_id"  class="form-control select2" require >


<?php while(!$terceros->EOF){ ?>
                 <option value="<?php echo $terceros->fields["id"]; ?>-<?php echo $terceros->fields["tipo"]; ?>"><?php echo $terceros->fields["nombre"]; ?></option>
<?php $terceros->MoveNext(); } $terceros->Move(0); ?>

            </select>   </div>

          

                <div class="form-group">

                  <label for="exampleInputPassword1">Valor Entrada</label>

                  <input type="text" class="form-control" id="entrada" name="entrada" placeholder="Valor" require>

                </div>

                       
                <div class="form-group">

<label for="exampleInputPassword1">Fecha</label>

<input type="date" class="form-control" id="fecha" name="fecha" placeholder="Fecha" require>

</div>
         

               

                 

      

              </div>

              <!-- /.box-body -->



              <div class="box-footer">

                <button type="submit" class="btn btn-primary">Agregar</button>

              </div>

            </form>


            </div>

            <!-- /.box-body -->

          </div>

			


            <!-- /.box-header -->

            <div class="box-body">

              <table id="example2" class="table table-bordered table-hover">

                <thead>

                <tr>
                <th>Salida</th>
                  <th>Entrada</th>
                  <th>Fecha</th>

				  <th>Tercero</th>

      
          <th>Detalle</th>
          <th>Saldo</th>
				 
                </tr>

                </thead>

                <tbody>

				<?php

$j=1;$i=0;
$salidas=0;
$entradas=0;
	while(!$sale->EOF){ 
    $nombreter=$this->obj->vertercerotipo($sale->fields["tercero_id"],$sale->fields["tipo_tercero"]);
    ?>

                <tr style="">

                  <td><?php if($sale->fields["caja"]=='no'){

$salidas=$salidas+$sale->fields["entrada"];

echo number_format($sale->fields["entrada"],0,".",".");
}?></td>
                  <td><?php if($sale->fields["caja"]=='si'){

$entradas=$entradas+$sale->fields["entrada"];
echo number_format($sale->fields["entrada"],0,",",".");
}?></td>

          <td><?php echo $sale->fields["fecha"]; ?></td>
          <td><?php echo $nombreter->fields["tercero"]; ?></td>
          
          <td><?php echo $sale->fields["descripcion"]; ?></td>

          <td>
          $<?php  echo number_format($entradas-$salidas,0,',','.'); ?>

          </td>


                 

                </tr>

				<?php if($j==1){$j=2;}else{$j=1;}$sale->MoveNext();$i++;}$sale->Move(0); ?>  

                </tbody>

                <tfoot>

                <tr>
                <th>Salida</th>
                  <th>Entrada</th>
                  <th>Fecha</th>

				  <th>Tercero</th>

      
          <th>Detalle</th>
          <th>Saldo</th>
				 
                </tr>

                </tfoot>

              </table>

            </div>

            <!-- /.box-body -->

          </div>

          <!-- /.box -->

		  <script>



function editar(id){

	window.location.href = "<?php echo PATO; ?>productos/editar/"+id;



  }



  function verexistecodigo(){

    $.ajax({type: "POST",url: "<?php echo PATO; ?>productos/vercodigoexiste/"+$("#codigo").val()+"",data: "ok=1",





success: function(datos){

 // $("#carga").hide();

  if(datos=='1'){

    alert('el codigo ya pertenece a otro producto, por favor cambiarlo');

    $("#codigo").val("");

    $("#codigo").focus();



//alert("eliminado con exito");

//window.location.reload();

  }

//$("#carga").hide();

//$("#ubicacion1").html(datos);



}





});



  }

  function borrarregistro(id){

    if(confirm("Realmente Desea eliminar el egreso?")){

    $("#carga").show();

    $.ajax({type: "POST",url: "<?php echo PATO; ?>cajas/eliminaregreso/"+id+"",data: "ok=1",





success: function(datos){

  $("#carga").hide();

  if(datos=='ok'){

//alert("eliminado con exito");

window.location.reload();

  }

//$("#carga").hide();

//$("#ubicacion1").html(datos);



}





});

}

    

  }

  $(function () {

    $('.select2').select2();

    $('#example1').DataTable()

    $('#example2').DataTable({

      'paging'      : true,

      'lengthChange': false,

      'searching'   : true,

      'ordering'    : true,

      'info'        : true,

      'autoWidth'   : false

    })

  })

  function ponercategoriaimp(){

    $("#categoria_impresion").val($("#categoria").val());

  }

</script>





