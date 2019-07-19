<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editar Usuario
        <small>Version 1.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Editar Usuarios</li>
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
			<form id="admins-editando" name="admins-editando" class="form-horizontal" method="post" action="<?php echo PATO; ?>admins/editando/<?php echo $this->valor[0]; ?>/" enctype="multipart/form-data">
   <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input type="text" class="form-control" name="nombre" value="<?php echo $sale->fields["nombre"]; ?>" id="nombre" placeholder="Nombre">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Email</label>
                  <input type="text" class="form-control" id="email" name="email" value="<?php echo $sale->fields["email"]; ?>" placeholder="Email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Usuario</label>
                  <input type="text" class="form-control" id="usuario" value="<?php echo $sale->fields["usuario"]; ?>" name="usuario" placeholder="Usuario">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Clave</label>
                  <input type="text" class="form-control" id="clave" value="<?php echo $sale->fields["clave"]; ?>" name="clave" placeholder="Clave">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Estado</label>
                  <select name="estado" id="estado" class="form-control" >
				  <option value="1"<?php if($sale->fields["estado"]) { ?> selected="selected"<?php } ?>><?php echo __("Activo"); ?></option>
			<option value="0"<?php if(!$sale->fields["estado"]){ ?> selected="selected"<?php } ?>><?php echo __("Inactivo"); ?></option>

                  </select>
                  </div>
                  <div class="form-group">
                  <label for="exampleInputPassword1">Perfil</label>
                  <select name="perfil" id="perfil" class="form-control" >
                  <option value="2"<?php if($sale->fields["perfil"]==2) { ?> selected="selected"<?php } ?>><?php echo __("Administrador"); ?></option>
			<option value="0"<?php if(!$sale->fields["estado"]==0){ ?> selected="selected"<?php } ?>><?php echo __("Operario"); ?></option>
		
                  </select>
                  </div>
                 
                  <div class="form-group">
                  <label for="exampleInputPassword1">Organizacion</label>
          <select  <?php if($_SESSION['perfil']!=1){ ?> disabled <?php } ?> name="organizacione_id" id="organizacione_id" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Organizaciones"); ?>" required>
          <?php
if(!$organizacion->EOF){
	while(!$organizacion->EOF){ ?>
    	<option value="<?php echo $organizacion->fields["id"]; ?>" <?php if($_SESSION['organizacione_id']==$organizacion->fields["id"]){ ?> selected <?php } ?>><?php echo $organizacion->fields["nombre"]; ?></option><?php
		$organizacion->MoveNext();
	}
	$organizacion->Move(0);
} ?></select>
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
		  


