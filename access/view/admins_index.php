 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Usuarios
        <small>Version 1.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Usuarios</li>
      </ol>
    </section>

    <!-- Main content -->
 <!-- Info boxes -->
 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
        
      <?php if(isset($this->valor[0]) && $this->valor[0]>0){
?>
<div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-info"></i> Alerta!</h4>
                El usuario se agrego con exito
              </div>

<?php

            } ?>
            <div class="box box-default collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Agregar Usuario</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form id="cupos-agregando" name="cupos-agregando" class="form-horizontal" method="post" action="<?php echo PATO; ?>admins/agregando/" enctype="multipart/form-data">
          <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Email</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Usuario</label>
                  <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Clave</label>
                  <input type="text" class="form-control" id="clave" name="clave" placeholder="Clave">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Estado</label>
                  <select name="estado" id="estado" class="form-control" >
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                  </select>
                  </div>
                  <div class="form-group">
                  <label for="exampleInputPassword1">Perfil</label>
                  <select name="perfil" id="perfil" class="form-control" >
                    <option value="2">Administrador</option>
                    <option value="0">Operario</option>
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
                <button type="submit" class="btn btn-primary">Agregar</button>
              </div>
            </form>
            </div>
            <!-- /.box-body -->
          </div>
			<!-- /.box-header -->
			<div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Filtros</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>

        
        <!-- /.box-header -->
        <div class="box-body">
        <form action="<?php echo PATO; ?>admins/filtrar/" method="post" name="ciudades-filtrar" id="ciudades-filtrar" class="form-inline navbar-text">

          <div class="row">
            <div class="col">
              <div class="form-group">
                
                <input type="text" id="nombre" placeholder="nombre" name="nombre" value="<?php echo $_POST["nombre"]; ?>" class="form-control">
              </div>
           
             
              <!-- /.form-group -->
              <div class="form-group">
             
                <input type="text" placeholder="Usuario" id="usuario" name="usuario" value="<?php echo $_POST["usuario"]; ?>" class="form-control">
              </div>
              <!-- /.form-group -->
            
            
             
              <!-- /.form-group -->
       
              <div class="form-group">
              <button type="submit" class="btn btn-primary">Filtrar</button>
</div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
       
</form>
selecione los filtros y presione el boton para filtrar.
        </div>
      </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Nombre</th>
				  <th>Email</th>
				  <th>Usuario</th>
				 
          <th>Perfil</th>
          <th>Estado</th>
				 
				 
                  
                 
                </tr>
                </thead>
                <tbody>
				<?php
$j=1;$i=0;
	while(!$sale->EOF){ ?>
                <tr>
                  <td><?php echo $sale->fields["nombre"]; ?></td>
				  <td><?php echo $sale->fields["email"]; ?></td>
                  <td><?php echo $sale->fields["usuario"]; ?>
                  </td>
				
				  <td><?php if($sale->fields["perfil"]==1){ 
      echo "Super Administrador";
				  }if($sale->fields["perfil"]==2){
            echo "Administrador";

          } 
          if($sale->fields["perfil"]==0){
            echo "Operario";

				  }
          ?>
        </td>
        <td><?php if($sale->fields["estado"]==1){ 
      echo "Activo";
				  }if($sale->fields["estado"]==0){
            echo "Inactivo";

          } 
        
          ?>
        </td>
        <td>
        <button type="button" onclick="editar(<?php echo $sale->fields["id"]; ?>)" class="btn btn-block btn-primary btn-flat">Editar</button>
        </td>
                 
                </tr>
				<?php if($j==1){$j=2;}else{$j=1;}$sale->MoveNext();$i++;}$sale->Move(0); ?>  
                </tbody>
                <tfoot>
                <tr>
				<th>Nombre</th>
				  <th>Email</th>
				  <th>Usuario</th>
				  <th>Clave</th>
				  <th>Perfil</th>
				 
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		  <script>

function editar(id){
	window.location.href = "<?php echo PATO; ?>admins/editar/"+id;

  }
  $(function () {
    $('.select2').select2();
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>


