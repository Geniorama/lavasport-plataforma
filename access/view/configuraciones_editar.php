<div class="content-wrapper">

  <!-- Content Header (Page header) -->

  <section class="content-header">

    <h1>

      Editar Configuraciones

      <small>Versión 1.0</small>

    </h1>

    <ol class="breadcrumb">

      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

      <li class="active">Editar Configuraciones</li>

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

              <h3 class="box-title">Editar Configuraciones</h3>



              <div class="box-tools pull-right">

                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>

                </button>

              </div>

              <!-- /.box-tools -->

            </div>

            <!-- /.box-header -->

            <div class="box-body">

              <form id="grados-editando" name="grados-editando" class="form-horizontal" method="post" action="<?php echo PATO; ?>configuraciones/editando/<?php echo $this->valor[0]; ?>/" enctype="multipart/form-data">



                <div class="box-body">

                  <div class="form-group">

                    <label for="exampleInputEmail1">código de barras part.1</label>

                    <input type="text" class="form-control" name="codigobarras1" value="<?php echo $sale->fields["codigobarras1"]; ?>" id="codigobarras1" placeholder="Codigo barras part 1">

                  </div>

                  <div class="form-group">

                    <label for="exampleInputEmail1">código de barras part.2</label>

                    <input type="text" class="form-control" name="codigobarras2" value="<?php echo $sale->fields["codigobarras2"]; ?>" id="codigobarras2" placeholder="Codigo barras part 2">

                  </div>

                  <div class="form-group">

                    <label for="exampleInputEmail1">código de barras part.3</label>

                    <input type="text" class="form-control" name="codigobarras3" value="<?php echo $sale->fields["codigobarras3"]; ?>" id="codigobarras3" placeholder="Codigo barras part 3">

                  </div>

                  <div class="form-group">

                    <label for="exampleInputEmail1">color tema Factura</label>

                    <input type="color" class="form-control" name="color_tema" value="<?php echo $sale->fields["color_tema"]; ?>" id="color_tema">

                  </div>
                  <div class="form-group">

                    <label for="exampleInputEmail1">Color Texto Titulos</label>

                    <input type="color" class="form-control" name="texto_titulo" value="<?php echo $sale->fields["texto_titulo"]; ?>" id="texto_titulo">

                  </div>

                  <div class="form-group">

                    <label for="exampleInputEmail1">Logo LavaSport</label>

                    <input type="file" class="form-control" name="logo" id="logo">

                  </div>
                  <div class="form-group">

                    <label>Contrato:</label>



                    <div class="input-group">



                      <textarea id="contrato" name="contrato" rows="10" cols="120"><?php echo $sale->fields["contrato"]; ?></textarea>
                    </div>

                    <!-- /.input group -->

                  </div>
                  <div class="form-group">

                    <label>Mensaje:</label>



                    <div class="input-group">



                      <textarea id="mensaje" name="mensaje" rows="10" cols="120"><?php echo $sale->fields["mensaje"]; ?></textarea>
                    </div>

                    <!-- /.input group -->

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
          <script>
            CKEDITOR.replace("contrato")
          </script>