<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editar Categoria
        <small>Versión 1.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Editar Categoria</li>
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
              <h3 class="box-title">Editar Categoria</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			<form id="admins-editando" name="admins-editando" class="form-horizontal" method="post" action="<?php echo PATO; ?>productos/editandocat/<?php echo $this->valor[0]; ?>/" enctype="multipart/form-data">
   <div class="box-body">
   
   <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $sale->fields["nombre"]; ?>" placeholder="Nombre">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
				<button type="submit" class="btn btn-primary">Guardar</button>
		<!--		<button type="button" class="btn btn-secondary" onClick="window.history.back();">&nbsp;&nbsp;<?php echo __("Volver"); ?></button> -->

              </div>
            </form>
            </div>
            <!-- /.box-body -->
		  </div>
		  <script>

        </script>


