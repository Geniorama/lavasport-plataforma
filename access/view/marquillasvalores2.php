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
         <!--   <div class="col-md-3">
            <div id="recibidopor">
            <strong>Recibido Por: </strong> <?php echo $sale->fields["nombre"]; ?>
		 
        </div>
             
            </div> -->

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
                 
                <th>Fecha</th>
                  <th>Nombre</th>
                  <th>Documento</th>
                  <th>Codigo</th>
                  <th>Compañia</th>
                  <th>Producto</th>
                  <th>Cantidad</th>
                  <th>Valor Total</th>
                 
                </tr>
			  <?php
	
			  while(!$sale->EOF){   ?>
				<tr>
        <td><?php echo $sale->fields["fecha"]; ?></td> 
                  <td><?php echo $sale->fields["nombre"]; ?></td>
			  <td><?php echo $sale->fields["documento"]; ?></td>
                  <td><?php echo $sale->fields["id"]; ?></td>
                  <td><?php echo $sale->fields["compania"]; ?></td>
                  <td><?php if($sale->fields["categoria"]==1){ echo "Tulas";} if($sale->fields["categoria"]==2){ echo "Mallas";} ?></td>
      
                  <td><?php echo $sale->fields["cantidad"]; ?></td>
                  <td><?php echo number_format($sale->fields["precio"],0,",","."); ?></td>
                 
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
