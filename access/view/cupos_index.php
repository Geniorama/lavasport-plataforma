 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Cupos
        <small>Version 1.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Cupos</li>
      </ol>
    </section>

    <!-- Main content -->
 <!-- Info boxes -->
 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Cupos</h3>
			</div>
			
      <?php if(isset($this->valor[0]) && $this->valor[0]>0){
?>
<div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-info"></i> Alerta!</h4>
                El cupo se agrego con exito
              </div>

<?php

            } ?>
            <div class="box box-default collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Agregar Cupo</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form id="cupos-agregando" name="cupos-agregando" class="form-horizontal" method="post" action="<?php echo PATO; ?>cupos/agregando/" enctype="multipart/form-data">
          <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">gramos asignados</label>
                  <input type="number" class="form-control" id="grm_asignados" name="grm_asignados" placeholder="Gramos">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">% descuento para extras</label>
                  <input type="number" class="form-control" id="descuento_extra" name="descuento_extra" placeholder="Descuento">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Entregas Mensuales</label>
                  <input type="number" class="form-control" id="num_recibidos" name="num_recibidos" placeholder="Entregas Mensuales">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Dias Promesa Entrega</label>
                  <input type="number" class="form-control" id="dias" name="dias" placeholder="Dias Promesas">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Valor</label>
                  <input type="number" class="form-control" id="valor" name="valor" placeholder="Valor">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Iva</label>
                  <input type="number" class="form-control" id="iva" name="iva" placeholder="Iva">
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
			
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
				  <th>Nombre</th>
          <th>Gramos asignados</th>
          <th># Entregas/Mes</th>
          <th>% descuento extra</th>
          <th>dias de entrega</th>
          <th>Ver</th>
				 
				 
				 
                  
                 
                </tr>
                </thead>
                <tbody>
				<?php
$j=1;$i=0;
	while(!$sale->EOF){ ?>
                <tr>
				  <td><?php echo $sale->fields["nombre"]; ?></td>
          <td><?php echo $sale->fields["grm_asignados"]; ?></td>
          <td><?php echo $sale->fields["num_recibidos"]; ?></td>
          <td><?php echo $sale->fields["descuento_extra"]; ?></td>
          <td><?php echo $sale->fields["dias"]; ?></td>
          <td> <button type="button" onclick="ver(<?php echo $sale->fields["id"]; ?>)" class="btn btn-block btn-primary btn-flat">Ver</button>
      </td>
				
                 
                </tr>
				<?php if($j==1){$j=2;}else{$j=1;}$sale->MoveNext();$i++;}$sale->Move(0); ?>  
                </tbody>
                <tfoot>
                <tr>
				<th>Nombre</th>
          <th>Gramos asignados</th>
          <th>% descuento extra</th>
				  <th>Ver</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		  <script>

function ver(id){
	window.location.href = "<?php echo PATO; ?>cupos/ver/"+id;

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


