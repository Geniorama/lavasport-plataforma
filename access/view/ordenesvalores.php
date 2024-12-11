<style>
 
.contentdetalle {
  z-index: 800;
  background-color: #ecf0f5;
}
   </style>
 <!-- Content Wrapper. Contains page content -->
  <div class="contentdetalle">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">

   


      <!-- =========================================================== -->



           <!-- Small boxes (Stat box) -->
           <div class="row">
        <div class="col-xs-12">
          <!-- small box -->
		  <div class="box box-default">
        
        <!-- /.box-header -->
       
        <div class="box-body">
        
          <!-- /.row -->
          <div class="row">
            <div class="col-md-3">
            <div id="recibidopor">
            <strong>Recibido Por: </strong> <?php echo $sale->fields["nombre"]; ?>
		 
        </div>
              <!-- /.form-group -->
			
     
     
     
     
              <!-- /.form-group -->
            </div>

            <div class="col-md-3">
            <div id="fecharadicado">
            <strong>Fecha Inicial: </strong>   <?php echo date('d-M-Y',strtotime($llega["fecha1"])); ?>
		 
      </div>
</div>
            <!-- /.col -->
            <div class="col-md-3">
            
              <!-- /.form-group -->
              <div id="fechapromesa">
              <strong>Fecha Final:</strong>  <?php echo date('d-M-Y',strtotime($llega["fecha2"]));   ?>
		 
        </div>
			 
              <!-- /.form-group -->
       
     
      </div>
   
		

            <!-- /.col -->
          </div>
     
          <!-- /.row -->
 
          <!-- /.row -->

            <!-- /.col -->
            
          </div>
          <!-- /.row -->



        </div>
        <!-- /.box-body -->
        
      </div>
      <!-- /.box -->
     
       
       
      
      </div>
      <!-- /.row -->






      <!-- =========================================================== -->

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <div class="box-body">
            <form action="<?php echo PATO; ?>clientes/excel" method="post" target="_blank" id="FormularioExportacion">
    <p><input type="button" onclick="exportaraexcel()" value="exportar"></p>
    <input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
</form>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding" id="datatable1">
            <table class="table table-hover" id="example3">
                <tr>
                <th>Fecha Rad.</th>
                  <th>N orden</th>
                  <th>Nombre</th>
                  <th>Documento</th>
                  <th>Valor Total</th>
                  <th>Abonado</th>
                  <th>Estado</th>
                </tr>
			  <?php
	
			  while(!$sale->EOF){   ?>
				<tr>
        <td> <?php echo $sale->fields["fecha_radicado"]; ?></td>          
        <td><?php echo $sale->fields["id"]; ?></td>
			  <td><?php echo $sale->fields["cliente"]; ?></td>
                  <td><?php echo $sale->fields["documento"]; ?></td>
                  <td><?php echo number_format($sale->fields["valor"],0,",","."); ?></td>
                  <td><strong><?php echo number_format($sale->fields["abono"],0,",","."); ?></strong></td>
                  <td><?php if($sale->fields["estado"]==0 && $sale->fields["calificacion"]==0){
            echo "<span class='label label-danger'>Sin Entregar</span>";

          }
          if($sale->fields["estado"]==0 && $sale->fields["calificacion"]>0){
            echo "<span class='label label-warning'>Entregado p.</span>";
          }
          
          if($sale->fields["estado"]==1){
            echo "<span class='label label-success'>Entregado</span>";
          } 
          
          ?></td>
                  
				        </tr>
			  <?php  $sale->MoveNext(); } ?>

	




			  </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>



     <!-- Small boxes (Stat box) -->
        




        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <script>
        function exportaraexcel() {

$("#datos_a_enviar").val($("<div>").append($("#example3").eq(0).clone()).html());
$("#FormularioExportacion").submit();

}
    </script>
  <!-- /.content-wrapper -->
