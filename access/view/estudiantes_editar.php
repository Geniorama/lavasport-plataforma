<div class="content-wrapper">

  <!-- Content Header (Page header) -->

  <section class="content-header">

    <h1>

      Editar Estudiante

      <small>Versión 1.0</small>

    </h1>

    <ol class="breadcrumb">

      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Editar Estudiante</li>

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

              <h3 class="box-title">Editar Estudiante</h3>



              <div class="box-tools pull-right">

                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>

                </button>

              </div>

              <!-- /.box-tools -->

            </div>

            <!-- /.box-header -->

            <div class="box-body">

              <form id="admins-editando" name="admins-editando" class="form-horizontal" method="post" action="<?php echo PATO; ?>estudiantes/editando/<?php echo $this->valor[0]; ?>/" enctype="multipart/form-data">

                <div class="box-body">

                  <div class="form-group">

                    <label for="exampleInputEmail1">Tipo de Documento</label>

                    <select id="tipo_doc" name="tipo_doc">
                      <option <?php if ($sale->fields["tipo_doc"] == "CC") { ?> selected <?php } ?> value="cc">CC</option>
                      <option <?php if ($sale->fields["tipo_doc"] == "TI") { ?> selected <?php } ?> value="ti">TI</option>
                      <option <?php if ($sale->fields["tipo_doc"] == "CE") { ?> selected <?php } ?> value="ce">CE</option>

                    </select>
                  </div>
                  <div class="form-group">

                    <label for="exampleInputEmail1">Documento</label>

                    <input type="text" class="form-control" value="<?php echo $sale->fields["documento"]; ?>" name="documento" id="documento" placeholder="Documento" require>

                  </div>
                  <div class="form-group">

                    <label for="exampleInputEmail1">Codigo Ropero</label>

                    <input type="text" class="form-control" value="<?php echo $sale->fields["codigo_ropero"]; ?>" name="codigo_ropero" id="codigo_ropero" placeholder="Codigo Ropero" require>

                  </div>
                  <div class="form-group">

                    <label for="exampleInputEmail1">Nombre</label>

                    <input type="text" class="form-control" value="<?php echo $sale->fields["nombre"]; ?>" name="nombre" id="nombre" placeholder="Nombre" require>

                  </div>
                  <div class="form-group">

                    <label for="exampleInputEmail1">Primer Apellido</label>

                    <input type="text" value="<?php echo $sale->fields["apellido1"]; ?>" class="form-control" name="apellido1" id="apellido1" placeholder="Primer Apellido" require>

                  </div>
                  <div class="form-group">

                    <label for="exampleInputEmail1">Segundo Apellido</label>

                    <input type="text" value="<?php echo $sale->fields["apellido2"]; ?>" class="form-control" name="apellido2" id="apellido2" placeholder="Segundo Apellido" require>

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

                    <label for="exampleInputEmail1">Telefono</label>

                    <input type="text" value="<?php echo $sale->fields["telefono"]; ?>" class="form-control" name="telefono" id="telefono" placeholder="Telefono" require>

                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Escuela</label>
                    <select name="escuela_id" id="escuela_id" class="form-control select2" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor seleccione la Escuela"); ?>">
                      <option value="0" selected="selected"><?php echo __("Seleccione Escuela"); ?></option><?php
                                                                                                            if (!$escuelas->EOF) {
                                                                                                              while (!$escuelas->EOF) { ?>
                          <option value="<?php echo $escuelas->fields["codigo"]; ?>" <?php if ($sale->fields["escuela_id"] == $escuelas->fields["codigo"]) { ?> selected <?php } ?>><?php echo $escuelas->fields["nombre"]; ?></option><?php
                                                                                                                                                                                                                                        $escuelas->MoveNext();
                                                                                                                                                                                                                                      }
                                                                                                                                                                                                                                      $escuelas->Move(0);
                                                                                                                                                                                                                                    } ?>
                    </select>
                  </div>
                  <div class="form-group">

                    <label for="exampleInputEmail1">Curso</label>

                    <input type="text" class="form-control" value="<?php echo $sale->fields["curso"]; ?>" name="curso" id="curso" placeholder="Curso" require>

                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Compañia</label>
                    <input type="text" class="form-control" value="<?php echo $sale->fields["compania_id"]; ?>" name="compania_id" id="compania_id" placeholder="Compañia" require>


                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Grado</label>
                    <input type="text" class="form-control" value="<?php echo $sale->fields["grado_id"]; ?>" name="grado_id" id="grado_id" placeholder="Grado" require>
                  </div>

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