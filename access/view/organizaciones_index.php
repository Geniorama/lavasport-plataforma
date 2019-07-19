 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Organizaciones
        <small>Version 1.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Organizaciones</li>
      </ol>
    </section>

    <!-- Main content -->
 <!-- Info boxes -->
 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Organizaciones</h3>
			</div>
			
		
			<!-- /.box-header -->
			
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Nombre</th>
				 
				 
				 
                  
                 
                </tr>
                </thead>
                <tbody>
				<?php
$j=1;$i=0;
	while(!$sale->EOF){ ?>
                <tr>
                  <td><?php echo $sale->fields["nombre"]; ?></td>
				
                 
                </tr>
				<?php if($j==1){$j=2;}else{$j=1;}$sale->MoveNext();$i++;}$sale->Move(0); ?>  
                </tbody>
                <tfoot>
                <tr>
				<th>Nombre</th>
				
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		  <script>

function ver(id){
	window.location.href = "<?php echo PATO; ?>clientes/editar/"+id;

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


