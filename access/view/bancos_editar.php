<div class="content-wrapper">

  <!-- Content Header (Page header) -->

  <section class="content-header">

    <h1>

      Editar Banco

      <small>Versión 1.0</small>

    </h1>

    <ol class="breadcrumb">

      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Editar Banco</li>

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

              <h3 class="box-title">Editar Banco</h3>



              <div class="box-tools pull-right">

                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>

                </button>

              </div>

              <!-- /.box-tools -->

            </div>

            <!-- /.box-header -->

            <div class="box-body">

              <form id="admins-editando" name="admins-editando" class="form-horizontal" method="post" action="<?php echo PATO; ?>bancos/editando/<?php echo $this->valor[0]; ?>/" enctype="multipart/form-data">

                <div class="box-body">

                  <div class="form-group">

                    <label for="exampleInputEmail1">Nombre</label>

                    <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $sale->fields["nombre"]; ?>" placeholder="Nombre">

                  </div>

                  <div class="form-group">

                    <label for="exampleInputEmail1">Numero</label>

                    <input type="text" class="form-control" name="numero" id="numero" value="<?php echo $sale->fields["numero"]; ?>" placeholder="Numero">

                  </div>
                  <div class="form-group">

                    <label for="exampleInputEmail1">Tipo De Cuenta</label>

                    <select name="cuenta" id="cuenta" class="form-control">
                      <option value="ahorros" <?php if ($sale->fields["cuenta"] == "ahorros") {
                                                echo "selected";
                                              } ?>>ahorros</option>
                      <option value="corriente" <?php if ($sale->fields["cuenta"] == "corriente") {
                                                  echo "selected";
                                                } ?>>corriente</option>
                    </select>

                  </div>

                  <div class="form-group">

                    <label for="exampleInputEmail1">Color</label>

                    <input type="color" class="form-control" name="color" id="color" value="<?php echo $sale->fields["color"]; ?>">

                  </div>
                  <div class="form-group">

                    <label for="exampleInputEmail1">Imagen</label>

                    <input type="file" class="form-control" name="foto" id="foto" placeholder="Imagen">

                  </div>

                  <img src="<?php echo PATO; ?>img/bancos/<?php echo $this->valor[0]; ?>foto.jpg">












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