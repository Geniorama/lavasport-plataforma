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
            <div id="fecharadicado">
            <strong>Fecha Inicial: </strong>   <?php echo date('d-M-Y H:i:s',strtotime($llega["fecha1"])); ?>
		 
      </div>
</div>
            <!-- /.col -->
            <div class="col-md-3">
            
              <!-- /.form-group -->
              <div id="fechapromesa">
              <strong>Fecha Final:</strong>  <?php echo date('d-M-Y H:i:s',strtotime($llega["fecha2"]));   ?>
		 
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
            <table id="example3" class="table table-bordered table-hover">
                <thead>
         
               
                <tr>
                <th>Fecha</th>
                <th>Codigo</th>
                <th>Nombre</th>
          <th>Cupo</th> 
          <th>Tipo</th> 
          <th>Valor</th>
          
          
          
				 
				 
                  
                 
                </tr>
                </thead>
                <tbody>
				<?php

	while(!$salep->EOF){ 
    
   
    ?>
                <tr>
                <td><?php echo $salep->fields["fechapago"]; ?></td>
                <td><?php echo $salep->fields["id"]; ?></td>
          <td><?php echo $salep->fields["nombre"]; ?></td>
          <td><?php echo $salep->fields["cupo_nombre"]; ?></td>
          <td><?php if($salep->fields["metodo"]==1){
echo "Efectivo";

          }
          if($salep->fields["metodo"]==2){
            echo "Banco";
            
                      }
          ?></td>
          <td>$<?php echo number_format($salep->fields["pago"],0,",","."); ?></td>

         
                 
                </tr>
				<?php if($j==1){$j=2;}else{$j=1;} $totalvalor3=$totalvalor3+$salep->fields["pago"];  $salep->MoveNext();$i++;}$salep->Move(0); ?>  
        <tr>
				  <td><strong>TOTALES</strong></td>
          <td></td>
          <td></td>
          <td><strong>$<?php echo number_format($totalvalor3,0,",","."); ?></strong></td>
         
                 
                </tr>
        
      </tbody>
                <tfoot>
                <tr>
                <th>Fecha</th>
                <th>Codigo</th>
                <th>Nombre</th>
          <th>cupo</th> 
          <th>Valor</th>
          
          
          
				 
				 
                  
                 
                </tr>
                </tfoot>
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
