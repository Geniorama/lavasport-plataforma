<div class="content-wrapper">

  <!-- Content Header (Page header) -->

  <section class="content-header">

    <h1>

      Editar Escuela

      <small>Versión 1.0</small>

    </h1>

    <ol class="breadcrumb">

      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Editar Escuela</li>

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

              <h3 class="box-title">Editar Escuela</h3>



              <div class="box-tools pull-right">

                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>

                </button>

              </div>

              <!-- /.box-tools -->

            </div>

            <!-- /.box-header -->

            <div class="box-body">

              <form id="admins-editando" name="admins-editando" class="form-horizontal" method="post" action="<?php echo PATO; ?>escuelas/editando/<?php echo $this->valor[0]; ?>/" enctype="multipart/form-data">

                <div class="box-body">
                  <div class="form-group">

                    <label for="exampleInputEmail1">Escuela</label>

                    <input type="text" class="form-control" name="escuela" id="escuela" value="<?php echo $sale->fields["escuela"]; ?>" placeholder="Escuela">

                  </div>
                  <div class="form-group">

                    <label for="exampleInputEmail1">Codigo</label>

                    <input type="text" class="form-control" name="codigo" id="codigo" value="<?php echo $sale->fields["codigo"]; ?>" placeholder="Codigo">

                  </div>
                  <div class="form-group">

                    <label for="exampleInputEmail1">Nombre</label>

                    <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $sale->fields["nombre"]; ?>" placeholder="Nombre">

                  </div>

                  <div class="form-group">

                    <label for="exampleInputEmail1">Dirección</label>

                    <input type="text" class="form-control" name="direccion" id="direccion" value="<?php echo $sale->fields["direccion"]; ?>" placeholder="Dirección">

                  </div>
                  <div class="form-group">

                    <label for="exampleInputEmail1">Contacto</label>

                    <input type="text" class="form-control" name="contacto" id="contacto" value="<?php echo $sale->fields["contacto"]; ?>" placeholder="Contacto">

                  </div>

                  <div class="form-group">

                    <label for="exampleInputEmail1">Email</label>

                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $sale->fields["email"]; ?>" placeholder="Email">

                  </div>
                  <div class="form-group">

                    <label for="exampleInputEmail1">Ciudad</label>

                    <input type="text" class="form-control" name="ciudad" id="ciudad" value="<?php echo $sale->fields["ciudad"]; ?>" placeholder="Ciudad">

                  </div>

                  <div class="form-group">

                    <label for="exampleInputEmail1">Imagen</label>

                    <input type="file" class="form-control" name="foto" id="foto" placeholder="Imagen">

                  </div>
                  <div class="form-group">

                    <label for="exampleInputEmail1">Color</label>

                    <input type="color" class="form-control" name="color" id="color" value="<?php echo $sale->fields["color"]; ?>">

                  </div>
                  <img src="<?php echo PATO; ?>img/escuelas/<?php echo $this->valor[0]; ?>foto.jpg">












                </div>

                <!-- /.box-body -->



                <div class="box-footer">

                  <button type="submit" class="btn btn-primary">Guardar</button>
                  <button type="button" class="btn btn-secondary" onClick="window.history.back();">&nbsp;&nbsp;<?php echo __("Volver"); ?></button>


                  <!--		<button type="button" class="btn btn-secondary" onClick="window.history.back();">&nbsp;&nbsp;<?php echo __("Volver"); ?></button> -->



                </div>

              </form>

            </div>

            <!-- /.box-body -->

          </div>