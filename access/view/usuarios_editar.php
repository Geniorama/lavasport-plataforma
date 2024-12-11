<div class="content-wrapper">

  <!-- Content Header (Page header) -->

  <section class="content-header">

    <h1>

      Editar Usuario

      <small>Versión 1.0</small>

    </h1>

    <ol class="breadcrumb">

      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Editar Usuario</li>

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

              <h3 class="box-title">Editar Usuario</h3>



              <div class="box-tools pull-right">

                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>

                </button>

              </div>

              <!-- /.box-tools -->

            </div>

            <!-- /.box-header -->

            <div class="box-body">

              <form id="admins-editando" name="admins-editando" class="form-horizontal" method="post" action="<?php echo PATO; ?>usuarios/editando/<?php echo $this->valor[0]; ?>/" enctype="multipart/form-data">

                <div class="box-body">


                  <div class="form-group">

                    <label for="exampleInputEmail1">Documento</label>

                    <input type="text" class="form-control" value="<?php echo $sale->fields["documento"]; ?>" name="documento" id="documento" placeholder="Documento" require>

                  </div>

                  <div class="form-group">

                    <label for="exampleInputEmail1">Nombre</label>

                    <input type="text" class="form-control" value="<?php echo $sale->fields["nombre"]; ?>" name="nombre" id="nombre" placeholder="Nombre" require>

                  </div>

                  <div class="form-group">

                    <label for="exampleInputEmail1">Email</label>

                    <input type="text" value="<?php echo $sale->fields["email"]; ?>" class="form-control" name="email" id="email" placeholder="Email" require>

                  </div>
                  <div class="form-group">

                    <label for="exampleInputEmail1">Sexo</label>

                    <select name="sexo" id="sexo" class="form-control">
                      <option value="m" <?php if ($sale->fields["sexo"] == "m") {
                                          echo "selected";
                                        } ?>>Masculino</option>
                      <option value="f" <?php if ($sale->fields["sexo"] == "f") {
                                          echo "selected";
                                        } ?>>Femenino</option>
                    </select>
                  </div>
                  <div class="form-group">

                    <label for="exampleInputEmail1">Fecha de Nacimiento</label>

                    <input type="date" value="<?php echo $sale->fields["nacimiento"]; ?>" class="form-control" name="nacimiento" id="nacimiento" placeholder="Fecha de Nacimiento" require>

                  </div>
                  <div class="form-group">

                    <label for="exampleInputEmail1">Celular</label>

                    <input type="text" value="<?php echo $sale->fields["celular"]; ?>" class="form-control" name="celular" id="celular" placeholder="Telefono" require>

                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Sede</label>
                    <select name="sede_id" disabled id="sede_id" class="form-control select2" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor seleccione la Sede"); ?>">
                      <option value="0" selected="selected"><?php echo __("Seleccione Sede"); ?></option><?php
                                                                                                          if (!$sedes->EOF) {
                                                                                                            while (!$sedes->EOF) { ?>
                          <option value="<?php echo $sedes->fields["id"]; ?>" <?php if ($sale->fields["sede_id"] == $sedes->fields["id"]) { ?> selected <?php } ?>><?php echo $sedes->fields["nombre"]; ?></option><?php
                                                                                                                                                                                                                    $sedes->MoveNext();
                                                                                                                                                                                                                  }
                                                                                                                                                                                                                  $sedes->Move(0);
                                                                                                                                                                                                                } ?>
                    </select>
                  </div>
                  <div class="form-group">

                    <label for="exampleInputEmail1">Dirección</label>

                    <input type="text" class="form-control" value="<?php echo $sale->fields["direccion"]; ?>" name="direccion" id="direccion" placeholder="Dirección" require>

                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Comentario</label>
                    <input type="text" class="form-control" value="<?php echo $sale->fields["comentario"]; ?>" name="comentario" id="comentario" placeholder="Comentario" require>


                  </div>
                  <div class="form-group">

                    <label for="exampleInputEmail1">Estado</label>

                    <select name="estado" id="estado" class="form-control">
                      <option value="1" <?php if ($sale->fields["estado"] == 1) {
                                          echo "selected";
                                        } ?>>Activo</option>
                      <option value="0" <?php if ($sale->fields["estado"] == 0) {
                                          echo "selected";
                                        } ?>>Inactivo</option>
                    </select>
                  </div>
                </div>



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