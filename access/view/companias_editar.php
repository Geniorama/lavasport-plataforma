<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Editar Compañia
      <small>Versión 1.0</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Editar Compañia</li>
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
              <h3 class="box-title">Editar Compañia</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form id="admins-editando" name="admins-editando" class="form-horizontal" method="post" action="<?php echo PATO; ?>companias/editando/<?php echo $this->valor[0]; ?>/" enctype="multipart/form-data">
                <div class="box-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="<?php echo $sale->fields["nombre"]; ?>" id="nombre" placeholder="Nombre">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Escuela</label>
                    <select name="escuela_id" id="escuela_id" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor seleccione la Escuela"); ?>">
                      <option value="0" <?php if (!$sale->fields["escuela_id"]) { ?> selected="selected" <?php } ?>><?php echo __("Seleccione Escuela"); ?></option><?php
                                                                                                                                                                    if (!$escuelas->EOF) {
                                                                                                                                                                      while (!$escuelas->EOF) { ?>
                          <option value="<?php echo $escuelas->fields["id"]; ?>" <?php if ($escuelas->fields["id"] == $sale->fields["escuela_id"]) { ?> selected="selected" <?php } ?>><?php echo $escuelas->fields["nombre"]; ?></option><?php
                                                                                                                                                                                                                                          $escuelas->MoveNext();
                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                        $escuelas->Move(0);
                                                                                                                                                                                                                                      } ?>
                    </select>
                  </div>



                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Editar</button>
                  <button type="button" class="btn btn-secondary" onClick="window.history.back();">&nbsp;&nbsp;<?php echo __("Volver"); ?></button>

                </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>