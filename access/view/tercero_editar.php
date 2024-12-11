<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        Editar Tercero

        <small>Versión 1.0</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li class="active">Editar Tercero</li>

      </ol>

    </section>



    <!-- Main content -->

 <!-- Info boxes -->

 <section class="content">

      <div class="row">

        <div class="col-xs-12">

          <div class="box">

        

            <div class="box">

            <div class="box-header with-border">

              <h3 class="box-title">Editar Tercero</h3>



              <div class="box-tools pull-right">

                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>

                </button>

              </div>

              <!-- /.box-tools -->

            </div>

            <!-- /.box-header -->

            <div class="box-body">

			<form id="admins-editando" name="admins-editando" class="form-horizontal" method="post" action="<?php echo PATO; ?>admins/editandotercero/<?php echo $this->valor[0]; ?>/" enctype="multipart/form-data">

   <div class="box-body">
   
   <div class="form-group">

<label for="exampleInputEmail1">Nit</label>

<input type="text" class="form-control" name="nit" value="<?php echo $sale->fields["nit"]; ?>" id="nit" placeholder="Nit">

</div>

                <div class="form-group">

                  <label for="exampleInputEmail1">Nombre</label>

                  <input type="text" class="form-control" name="nombre" value="<?php echo $sale->fields["nombre"]; ?>" id="nombre" placeholder="Nombre">

                </div>

                <div class="form-group">

                  <label for="exampleInputPassword1">Contacto</label>

                  <input type="text" class="form-control" id="contacto" name="contacto" value="<?php echo $sale->fields["contacto"]; ?>" placeholder="Contacto">

                </div>

                <div class="form-group">

                  <label for="exampleInputPassword1">Telefono</label>

                  <input type="text" class="form-control" id="telefono" value="<?php echo $sale->fields["telefono"]; ?>" name="telefono" placeholder="Telefono">

                </div>

                <div class="form-group">

                  <label for="exampleInputPassword1">Dirección</label>

                  <input type="text" class="form-control" id="direccion" value="<?php echo $sale->fields["direccion"]; ?>" name="direccion" placeholder="Dirección">

                </div>


              <div class="box-footer">

                <button type="submit" class="btn btn-primary">Guardar</button>

                <button type="button" class="btn btn-secondary" onClick="window.history.back();">&nbsp;&nbsp;<?php echo __("Volver"); ?></button>



              </div>

            </form>

            </div>

            <!-- /.box-body -->

		  </div>

		  

<script>
  $('.select2').select2();
</script>



