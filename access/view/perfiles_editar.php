<div class="content-wrapper">

  <!-- Content Header (Page header) -->

  <section class="content-header">

    <h1>

      Editar Perfiles

      <small>Versión 1.0</small>

    </h1>

    <ol class="breadcrumb">

      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

      <li class="active">Editar Perfiles</li>

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

              <h3 class="box-title">Editar Perfil</h3>



              <div class="box-tools pull-right">

                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>

                </button>

              </div>

              <!-- /.box-tools -->

            </div>

            <!-- /.box-header -->

            <div class="box-body">

              <form id="admins-editando" name="admins-editando" class="form-horizontal" method="post" action="<?php echo PATO; ?>admins/editandoperfil/<?php echo $this->valor[0]; ?>/" enctype="multipart/form-data">

                <div class="box-body">

                  <div class="form-group">

                    <label for="exampleInputEmail1">Nombre</label>

                    <input type="text" class="form-control" name="nombre" value="<?php echo $sale->fields["nombre"]; ?>" id="nombre" placeholder="Nombre">

                  </div>
                  <div class="form-group">

                    <label for="exampleInputPassword1">Privilegios</label>
                    <select name="privilegios[]" id="privilegios" multiple class="form-control select2">
                      <option value="dashboard" <?php if ($sale->fields["dashboard"] == 1) { ?> selected <?php } ?>>dashboard </option>
                      <option value="noticias" <?php if ($sale->fields['noticias'] == 1) { ?> selected <?php } ?>>Noticias </option>
                      <option value="prendas" <?php if ($sale->fields['prendas'] == 1) { ?> selected <?php } ?>>Prendas </option>
                      <option value="cupos" <?php if ($sale->fields['cupos'] == 1) { ?> selected <?php } ?>>Cupos</option>
                      <option value="bases" <?php if ($sale->fields['bases'] == 1) { ?> selected <?php } ?>>Bases Generales</option>
                      <option value="editarorden" <?php if ($sale->fields['editarorden'] == 1) { ?> selected <?php } ?>>Editar Orden</option>
                      <option value="clientes" <?php if ($sale->fields['clientes'] == 1) { ?> selected <?php } ?>>Clientes </option>
                      <option value="ordenes" <?php if ($sale->fields['ordenes'] == 1) { ?> selected <?php } ?>>Ordenes </option>
                      <option value="reportes" <?php if ($sale->fields['reportes'] == 1) { ?> selected <?php } ?>>Reportes </option>
                      <option value="entradaespecial" <?php if ($sale->fields['entradaespecial'] == 1) { ?> selected <?php } ?>>E especiales</option>
                      <option value="entradacupo" <?php if ($sale->fields['entradacupo'] == 1) { ?> selected <?php } ?>>Entrada Cupo </option>
                      <option value="entradaextra" <?php if ($sale->fields['entradaextra'] == 1) { ?> selected <?php } ?>>Entrada Extra</option>
                      <option value="salidas" <?php if ($sale->fields['salidas'] == 1) { ?> selected <?php } ?>> Salidas </option>
                      <option value="caja" <?php if ($sale->fields['caja'] == 1) { ?> selected <?php } ?>> Caja </option>
                      <option value="egresos" <?php if ($sale->fields['egresos'] == 1) { ?> selected <?php } ?>> Egresos </option>

                    </select>
                  </div>
                  <!-- /.box-body -->



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