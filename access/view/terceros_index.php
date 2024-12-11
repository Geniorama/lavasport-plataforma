 <!-- Content Wrapper. Contains page content -->

 <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        Terceros

        <small>Versión 1.0</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

        <li class="active">Terceros</li>

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

                El Tercero se agrego con exito

              </div>



<?php



            } ?>

            <div class="box box-default collapsed-box">

            <div class="box-header with-border">

              <h3 class="box-title">Agregar Tercero</h3>



              <div class="box-tools pull-right">

                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>

                </button>

              </div>

              <!-- /.box-tools -->

            </div>

            <!-- /.box-header -->

            <div class="box-body">

            <form id="cupos-agregando" name="cupos-agregando" class="form-horizontal" method="post" action="<?php echo PATO; ?>admins/agregandotercero/" enctype="multipart/form-data">

          <div class="box-body">

                <div class="form-group">

                  <label for="exampleInputEmail1">Nit</label>

                  <input type="text" class="form-control" name="nit" id="nit" placeholder="Nit">

                </div>

                <div class="form-group">

                  <label for="exampleInputPassword1">Nombre</label>

                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">

                </div>

                <div class="form-group">

                  <label for="exampleInputPassword1">Contacto</label>

                  <input type="text" class="form-control" id="contacto" name="contacto" placeholder="Contacto">

                </div>

                <div class="form-group">

                  <label for="exampleInputPassword1">Teléfono </label>

                  <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono">

                </div>

     
                  <div class="form-group">

<label for="exampleInputPassword1">Dirección</label>

<input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion">

</div>
                  
 

        
              </div>

              <!-- /.box-body -->



              <div class="box-footer">

                <button type="submit" class="btn btn-primary">Agregar</button>

              </div>
              <form target="_blank" action='<?php echo PATO; ?>admins/cargarmasivoterceros/' method='post' enctype="multipart/form-data">
  <input type='file' name='sel_file' size='20'>
   <input type='submit' class="btn btn-success" name='submit' value='Cargar Terceros'>
  </form>
            </form>

            </div>

            <!-- /.box-body -->

          </div>

			<!-- /.box-header -->

			<div class="box box-default">

        <div class="box-header with-border">

          <h3 class="box-title">Filtros</h3>



          <div class="box-tools pull-right">

            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>

          </div>

        </div>



        

        <!-- /.box-header -->

        <div class="box-body">

        <form action="<?php echo PATO; ?>admins/tercerosfiltrar/" method="post" name="ciudades-filtrar" id="ciudades-filtrar" class="form-inline navbar-text">



          <div class="row">

            <div class="col">

              <div class="form-group">

                

                <input type="text" id="nombre" placeholder="Nombre" name="nombre" value="<?php echo $_POST["nombre"]; ?>" class="form-control">

              </div>

           

             


              <!-- /.form-group -->

            

            

             

              <!-- /.form-group -->

       

              <div class="form-group">

              <button type="submit" class="btn btn-primary">Filtrar</button>

</div>

              <!-- /.form-group -->

            </div>

            <!-- /.col -->

          </div>

          <!-- /.row -->

        </div>

        <!-- /.box-body -->

        <div class="box-footer">

       

</form>

Seleccione los filtros y presione el botón para filtrar. 

        </div>

      </div>

            <!-- /.box-header -->

            <div class="box-body">

              <table id="example2" class="table table-bordered table-hover">

                <thead>

                <tr>

                  <th>Nit</th>

				  <th>Nombre</th>

				  <th>Contacto</th>

				 

          <th>Teléfono</th>

          <th>Dirección</th>
          <th>Editar</th>
          <th>ELiminar</th>



                </tr>

                </thead>

                <tbody>

				<?php

$j=1;$i=0;

	while(!$sale->EOF){ ?>

                <tr>

                  <td><?php echo $sale->fields["nit"]; ?></td>

				  <td><?php echo $sale->fields["nombre"]; ?></td>

                  <td><?php echo $sale->fields["contacto"]; ?></td>
                  <td><?php echo $sale->fields["telefono"]; ?></td>
                  <td><?php echo $sale->fields["direccion"]; ?></td>
            
        <td>

        <button type="button" onclick="editar(<?php echo $sale->fields["id"]; ?>)" class="btn btn-block btn-primary btn-flat">Editar</button>

        </td>


                    
        <td>

        <button type="button" onclick="eliminar(<?php echo $sale->fields["id"]; ?>)" class="btn btn-block btn-danger btn-flat">Eliminar</button>

        </td>



                </tr>

				<?php if($j==1){$j=2;}else{$j=1;}$sale->MoveNext();$i++;}$sale->Move(0); ?>  

                </tbody>

                <tfoot>

                <tr>

                  <th>Nit</th>

				  <th>Nombre</th>

				  <th>Contacto</th>

				 

          <th>Telefono</th>

          <th>Dirección</th>



                </tr>

                </tfoot>

              </table>

            </div>

            <!-- /.box-body -->

          </div>

          <!-- /.box -->

		  <script>



function editar(id){

	window.location.href = "<?php echo PATO; ?>admins/editartercero/"+id;



  }

  function eliminar(id){

if(confirm("desea eliminar el Tercero?")){
window.location.href = "<?php echo PATO; ?>admins/eliminartercero/"+id;
}


}

  $(function () {

    $('.select2').select2();

    $('#example1').DataTable()

    $('#example2').DataTable({

      'paging'      : true,

      'lengthChange': false,

      'searching'   : false,

      'ordering'    : true,

      'info'        : true,

      'autoWidth'   : false

    })

  })

</script>





