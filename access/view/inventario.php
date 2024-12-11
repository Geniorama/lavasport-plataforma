 <style>
   input[type=checkbox] {
    transform: scale(2);
}
   </style>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Inventario
        <small>Versión 1.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Inventario</li>
      </ol>
    </section>

    <!-- Main content -->
 <!-- Info boxes -->
 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Inventario</h3>
			</div>
			
 
      <div class="row">
      <div class="col-md-6">
      <div class="box">
      <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tr>
                 
                  <th>Descripción</th>
                  <th>Cifra</th>
            
                </tr>
                <tr>
                
                <td>Numero de Ordenes</td>
                <td>
                 <?php echo $sale->_numOfRows;  ?>
                </td>
              
              </tr>
                <tr>
                
                  <td>Total Venta Extra</td>
                  <td>
                   $<?php $total1=$this->obj->totales($_POST,1); 
                   echo number_format($total1->fields["total"],0,',','.');
                   ?>
                  </td>
                
                </tr>
                <tr>
                  
                  <td>Total Gramos Cupo</td>
                  <td>
                  <?php $total1=$this->obj->totales($_POST,2); 
                   echo round($total1->fields["total"]);
                   ?> gramos
                  </td>
                 
                </tr>
             
               
             

              </table>
            </div>
            <!-- /.box-body -->
          </div>
			</div>
      <div class="col-md-6">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Prendas Por Compañia</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <div class="chart-responsive">
                    <canvas id="pieChart" height="150"></canvas>
                  </div>
                  <!-- ./chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <ul class="chart-legend clearfix">
                    <?php while(!$salecopanias->EOF){ ?>
                    <li><i class="fa fa-circle-o " style="color:<?php echo $salecopanias->fields["color"];  ?>"></i> <?php echo $salecopanias->fields["nombre"];  ?></li>
                    <?php
                  $salecopanias->MoveNext();
                  }
                  $salecopanias->Move(0);
                  ?>
                  </ul>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
           
          </div>






      </div>
            <div class="box-body">
              <button id="limpiar" class="btn btn-danger" onclick="limpiar()">Limpiar Invetariado</button>
              <button id="limpiar" class="btn btn-success" onclick="verreporte()">Ver Faltantes</button>
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                <th>Inventariar</th>
                <th>#</th>
          <th>Tipo</th> 
          <th>Radicado</th>
          <th>Cliente</th>
          <th>Documento</th>
          <th>Promesa</th>
          <th>Dias</th>
          <th>grms/$</th>
          <th>Acciones</th>         
                </tr>
                </thead>
                <tbody>
				<?php
$j=1;$i=0; $e=0;$p=0;$cal=0;
	while(!$sale->EOF){ 
    
  $suma= $this->obj->sumagramosprecio($sale->fields["id"]);
    ?>
                <tr>
          <td>  <input type="checkbox"  onchange="cambiarc(<?php echo $sale->fields["id"];  ?>)"  name="check<?php echo $sale->fields["id"];  ?>" id="check<?php echo $sale->fields["id"]; ?>" value="1" <?php if($sale->fields["inventariado"]==1){ ?> checked <?php } ?>></td>
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
     
          <td>
          <a href="#" onclick="ver(<?php echo $sale->fields["id"]; ?>,<?php echo $sale->fields["tipo"]; ?>);return false;"  class="btn btn-default" data-original-title="Ver"><i class="fa fa-eye"></i></a>
       

        </td>
     
       
                </tr>
				<?php if($j==1){$j=2;}else{$j=1;} if($sale->fields["estado"]==1){$e++; } if($sale->fields["estado"]==0){$p++; } $cal=$cal+ $sale->fields["calificacion"];  $sale->MoveNext();$i++;}$sale->Move(0); ?>  
                </tbody>
                <tfoot>
                <tr>
                  <th>Inventariar</th>
          <th>#</th>
          <th>Tipo</th> 
          <th>Radicado</th>
          <th>Recibió</th>
          
          <th>Cliente</th>
          <th>Documento</th>
          <th>Promesa</th>
          <th>Dias</th>
          <th>Acciones</th>
      
				
				 
				 
                  
                 
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <div class="modal fade" id="modal-default">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">FALTANTES!!</h4>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
             
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
		  <script>

function verreporte(){
  $("#carga").show();
  $('.modal-body').load('<?php echo PATO; ?>productocupos/reporteinventario/',function(){
        $('#modal-default').modal({show:true});
        $("#carga").hide();
    });
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

  
  $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Hoy'       : [moment(), moment()],
          'Ayer'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Ultimos 7 dias' : [moment().subtract(6, 'days'), moment()],
          'Ultimos 30 dias': [moment().subtract(29, 'days'), moment()],
          'Este mes'  : [moment().startOf('month'), moment().endOf('month')],
          'Mes pasado'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
       
        <?php if(isset($_POST["fecha1"]) and $_POST["fecha1"]!=""){ 
          
          $newDate = date("m/d/Y", strtotime($_POST["fecha1"]));
          $newDate2 = date("m/d/Y", strtotime($_POST["fecha2"]));
          ?>
           startDate: "<?php echo  $newDate; ?>",
    endDate: "<?php echo  $newDate2; ?>"
         
      <?php }else{
        echo " startDate: moment().subtract(29, 'days'),  endDate  : moment()";
      } ?>
        
       
      },
      function (start, end) { 
      
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
     
        $("#fecha1").val(start.format('YYYY-MM-DD'));
        $("#fecha2").val(end.format('YYYY-MM-DD'));
      }
    );
    <?php if(isset($_POST["fecha1"]) and $_POST["fecha1"]!=""){ ?>
    $('#daterange-btn span').html('<?php echo date('d-M-Y',strtotime($_POST["fecha1"])); ?> - <?php echo date('d-M-Y',strtotime($_POST["fecha2"])); ?>');
    <?php }else{ ?>
      $('#daterange-btn span').html('<span><i class="fa fa-calendar"></i> Rango de fechas</span>');
 $("#ordenentregada").html(<?php echo $e; ?>);
 <?php $porcentaje=(100*$e)/$sale->_numOfRows; ?>
 $("#porcenentregada").html('<div class="progress-bar progress-bar-success" style="width: <?php echo round($porcentaje); ?>%"></div>');
 $("#numentregada").html('<span class="badge bg-green"><?php echo round($porcentaje); ?>%</span>');


 $("#ordenpendiente").html(<?php echo $p; ?>);
 <?php $porcentajep=(100*$p)/$sale->_numOfRows; ?>
 $("#porcenpendiente").html('<div class="progress-bar progress-bar-danger" style="width: <?php echo round($porcentajep); ?>%"></div>');
 $("#numpendiente").html('<span class="badge bg-red"><?php echo round($porcentajep); ?>%</span>');
    <?php } ?> 



    var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
  var pieChart       = new Chart(pieChartCanvas);
  var PieData        = [

    <?php while(!$salecopanias->EOF){ ?>
      {
      value    : <?php echo $salecopanias->fields["num"]; ?>,
      color    : '<?php echo $salecopanias->fields["color"]; ?>',
      highlight: '<?php echo $salecopanias->fields["color"]; ?>',
      label    : '<?php echo $salecopanias->fields["nombre"]; ?>'
    },                 <?php
                  $salecopanias->MoveNext();
                  }
                  $salecopanias->Move(0);
                  ?>
  ];
  var pieOptions     = {
    // Boolean - Whether we should show a stroke on each segment
    segmentShowStroke    : true,
    // String - The colour of each segment stroke
    segmentStrokeColor   : '#fff',
    // Number - The width of each segment stroke
    segmentStrokeWidth   : 1,
    // Number - The percentage of the chart that we cut out of the middle
    percentageInnerCutout: 50, // This is 0 for Pie charts
    // Number - Amount of animation steps
    animationSteps       : 100,
    // String - Animation easing effect
    animationEasing      : 'easeOutBounce',
    // Boolean - Whether we animate the rotation of the Doughnut
    animateRotate        : true,
    // Boolean - Whether we animate scaling the Doughnut from the centre
    animateScale         : false,
    // Boolean - whether to make the chart responsive to window resizing
    responsive           : true,
    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio  : false,
    // String - A legend template
    legendTemplate       : '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<segments.length; i++){%><li><span style=\'background-color:<%=segments[i].fillColor%>\'></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>',
    // String - A tooltip template
    tooltipTemplate      : '<%=value %> <%=label%>'
  };
  // Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  pieChart.Doughnut(PieData, pieOptions);
  function cambiarc(id){
  
  if ($("#check"+id).is(':checked')) {
      //$("input[type=checkbox]").prop('checked', true); //todos los check
    valor=1;
  } else {
      //$("input[type=checkbox]").prop('checked', false);//todos los check
     valor=0;
  }

  $.ajax({type: "POST",url: "<?php echo PATO; ?>productocupos/inventariarOrden/"+id,data: "inventariado="+valor,


success: function(datos){


$("#datatable1").html(datos);
}


});




}
function limpiar(){
  $("#carga").show();
  $.ajax({type: "POST",url: "<?php echo PATO; ?>productocupos/limpiarorden/",data: "ok=1",


success: function(datos){


alert("inventariado limpio");
window.location.reload();
}


});

}
</script>


