 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Prendas
        <small>Version 1.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Prendas</li>
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
                La Prenda se agrego con exito
              </div>

<?php

            } ?>
            <div class="box box-default collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Agregar Prenda</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form id="cupos-agregando" name="cupos-agregando" class="form-horizontal" method="post" action="<?php echo PATO; ?>productos/agregando/" enctype="multipart/form-data">
          <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Categoria</label>
                 <select name="categoria" id="categoria" class="form-control" >
                 <option value="0"><?php echo __("Sin categoria"); ?></option>
                  <option value="3"><?php echo __("Categoria 3"); ?></option>
                  <option value="2"><?php echo __("Categoria 2"); ?></option>
                 
    <option value="1"><?php echo __("Categoria 1"); ?></option>
    
        
            </select>   </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Precio</label>
                  <input type="text" class="form-control" id="precio" name="precio" placeholder="precio">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Moneda</label>
                  <input type="text" class="form-control" id="moneda" value="COP" readonly name="moneda" placeholder="Moneda">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Peso</label>
                  <input type="text" class="form-control" id="peso" name="peso" placeholder="Peso">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Precio Fijo</label>
                  <select name="fijo" id="fijo" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor seleccione si el precio es fijo"); ?>" required>
		
		<option value="1"><?php echo __("Si"); ?></option>
		<option value="0"><?php echo __("No"); ?></option>
		
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
        <form action="<?php echo PATO; ?>productos/filtrar/" method="post" name="ciudades-filtrar" id="ciudades-filtrar" class="form-inline navbar-text">

          <div class="row">
            <div class="col">
              <div class="form-group">
                
                <input type="text" id="nombre" placeholder="nombre" name="nombre" value="<?php echo $_POST["nombre"]; ?>" class="form-control">
              </div>
           
              <div class="form-group">
                
                <input type="text" id="codigo" placeholder="Código" name="codigo" value="<?php echo $_POST["codigo"]; ?>" class="form-control">
              </div>
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
                  <th>Codigo</th>
				  <th>Nombre</th>
          <th>Categoria</th>
          <th>Precio (pesos)</th>
				  <th>Peso (gramos)</th>
				  <th>Acciones</th>
				 
                  
                 
                </tr>
                </thead>
                <tbody>
				<?php
$j=1;$i=0;
	while(!$sale->EOF){ ?>
                <tr>
                  <td><?php echo $sale->fields["id"]; ?></td>
          <td><?php echo $sale->fields["nombre"]; ?></td>
          <td>
          <?php if($sale->fields["categoria"]==3){  echo __("Categoria 3"); } ?></option>
          <?php if($sale->fields["categoria"]==2){  echo __("Categoria 2"); } ?></option>
          <?php if($sale->fields["categoria"]==1){  echo __("Categoria 1"); } ?></option>
          <?php if($sale->fields["categoria"]==0){  echo __("Sin Categoria"); } ?></option>
          

          </td>
                  <td>$<?php echo number_format($sale->fields["precio"],0,',','.'); ?>
                  </td>
				  <td><?php echo $sale->fields["peso"]; ?></td>
				 
        <td>
        <button type="button" onclick="editar(<?php echo $sale->fields["id"]; ?>)" class="btn btn-success btn-flat"><i class="fa fa-edit"></i> </button>
			
      <button type="button" onclick="borrarregistro(<?php echo $sale->fields["id"]; ?>)" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i> </button>

      </td>
                 
                </tr>
				<?php if($j==1){$j=2;}else{$j=1;}$sale->MoveNext();$i++;}$sale->Move(0); ?>  
                </tbody>
                <tfoot>
                <tr>
				<th>Codigo</th>
          <th>Nombre</th>
          <th>Categoria</th>
				  <th>Precio</th>
				  <th>Peso</th>
				  <th>Acciones</th>
				 
				 
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		  <script>

function editar(id){
	window.location.href = "<?php echo PATO; ?>productos/editar/"+id;

  }
  function borrarregistro(id){
    if(confirm("Realmente Desea eliminar la prenda?")){
    $("#carga").show();
    $.ajax({type: "POST",url: "<?php echo PATO; ?>productos/eliminar/"+id+"",data: "ok=1",


success: function(datos){
  $("#carga").hide();
  if(datos=='ok'){
//alert("eliminado con exito");
window.location.reload();
  }
//$("#carga").hide();
//$("#ubicacion1").html(datos);

}


});
}
    
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


