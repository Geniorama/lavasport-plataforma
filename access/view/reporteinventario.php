<div class="box-body">
<div class="box-body">
          <form action="<?php echo PATO; ?>clientes/excel" method="post" target="_blank" id="FormularioExportacion">
    <p><input type="button" onclick="exportaraexcel()" value="exportar"></p>
    <input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
</form>
                <table id="example3" class="table table-bordered table-hover">
                <thead>
                <tr>
              
                <th>#</th>
          <th>Tipo</th> 
          <th>Radicado</th>
          <th>Cliente</th>
          <th>Documento</th>
          <th>Promesa</th>
          <th>Dias</th>
          <th>grms/$</th>
             
                </tr>
                </thead>
                <tbody>
				<?php
$j=1;$i=0; $e=0;$p=0;$cal=0;
	while(!$sale->EOF){ 
    
  $suma= $this->obj->sumagramosprecio($sale->fields["id"]);
    ?>
                <tr>
     		  <td><?php echo $sale->fields["id"]; ?></td>
          <td><?php if($sale->fields["tipo"]==1){ echo "EXTRA";} if($sale->fields["tipo"]==2){ echo "CUPO";} ?></td>
           <td><?php echo date('d-M-Y',strtotime($sale->fields["fecha_radicado"]));?></td>
         
<td><?php echo $sale->fields["cliente"]; ?></td>
          <td><?php echo $sale->fields["documento"]; ?></td>
          <td <?php 
$fecha_actual = strtotime(date("d-m-Y H:i:00",time()));
$fecha_entrada = strtotime($sale->fields["fecha_promesa"]." 07:00:00"); 
if($fecha_actual > $fecha_entrada  && $sale->fields["estado"]==0)
	{
echo "style='color:red;' ";
	}

?> ><?php echo  date('d-M-Y',strtotime($sale->fields["fecha_promesa"])); ?></td>
  <td>
            <?php 
          $dias	= (strtotime($sale->fields["fecha_promesa"])-strtotime(date("d-m-Y H:i:00",time())))/86400;
                          $dias 	= abs($dias); $dias = floor($dias);	
                          if($fecha_actual > $fecha_entrada  && $sale->fields["estado"]==0)
                          {       echo $dias; }
                          ?>
        </td>
        
        <td>
          <?php if($sale->fields["tipo"]==1){ echo "$".number_format($suma->fields["total"],0,",","."); } if($sale->fields["tipo"]==2){ echo round($suma->fields["total"])." grms";  } ?> 

        </td>
     
    
       
                </tr>
				<?php if($j==1){$j=2;}else{$j=1;} if($sale->fields["estado"]==1){$e++; } if($sale->fields["estado"]==0){$p++; } $cal=$cal+ $sale->fields["calificacion"];  $sale->MoveNext();$i++;}$sale->Move(0); ?>  
                </tbody>
                <tfoot>
                <tr>
             <th>#</th>
          <th>Tipo</th> 
          <th>Radicado</th>
          <th>Recibió</th>
          
          <th>Cliente</th>
          <th>Documento</th>
          <th>Promesa</th>
          <th>Dias</th>
      
      
				
				 
				 
                  
                 
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
            <script>
              function exportaraexcel() {

$("#datos_a_enviar").val($("<div>").append($("#example3").eq(0).clone()).html());
$("#FormularioExportacion").submit();

}
              </script>