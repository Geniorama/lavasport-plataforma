 <!-- Content Wrapper. Contains page content -->

 <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        Órdenes

        <small>Versión 1.0</small>

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

        <form action="<?php echo PATO; ?>productocupos/ordenesfiltro/" method="post" name="ciudades-filtrar" id="ciudades-filtrar" class="form-inline navbar-text">



          <div class="row">

            <div class="col">
            <div class="form-group">

<select id="ordendecliente" class="form-control" name="ordendecliente"  data-placeholder="Orden Generada desde"  style="width: 100%;">

      




   <option value="1" <?php if($_POST["ordendecliente"]==1){ ?> selected <?php } ?>><?php echo __("Orden desde el cliente"); ?></option>

   <option value="0" <?php if($_POST["ordendecliente"]==0){ ?> selected <?php } ?>><?php echo __("Orden desde recepción"); ?></option>
  
   <option value="2" <?php if($_POST["ordendecliente"]==2){ ?> selected <?php } ?>><?php echo __("Todas las Ordenes"); ?></option>



      </select>

      </div>

            <div class="form-group">

            <select id="tipofecha" class="form-control" name="tipofecha"  data-placeholder="Tipo de Fecha"  style="width: 100%;">

                  

               

               <option value="1" <?php if($_POST["tipofecha"]==1){ ?> selected <?php } ?>><?php echo __("Filtrar Por Fecha de Radicado"); ?></option>

               <option value="2" <?php if($_POST["tipofecha"]==2){ ?> selected <?php } ?>><?php echo __("Filtra Por Fecha de Entrega"); ?></option>

			

			

                  </select>

                  </div>

            <div class="form-group">

                

                <button type="button" class="btn btn-default pull-right" id="daterange-btn">

                      <span>

                        <i class="fa fa-calendar"></i> Rango de fechas

                      </span>

                      <i class="fa fa-caret-down"></i>

                    </button>      </div>

              <div class="form-group">

                

                <input type="text" id="id" placeholder="numero de orden" name="id" value="<?php echo $_POST["id"]; ?>" class="form-control">

              </div>

           

             

              <!-- /.form-group -->

              <div class="form-group">

             

                <input type="text" placeholder="Documento del cliente" id="documento" name="documento" value="<?php echo $_POST["documento"]; ?>" class="form-control">

              </div>
              <div class="form-group">

             

<input type="number" placeholder="Codigo del cliente" id="cliente_id" name="cliente_id" value="<?php echo $_POST["cliente_id"]; ?>" class="form-control">

</div>

              <!-- /.form-group -->

              <div class="form-group">

             

                <input type="text" placeholder="Nombre del cliente" id="nombre" name="nombre" value="<?php echo $_POST["nombre"]; ?>" class="form-control">

              </div>

            

              <div class="form-group">

               

                <select class="form-control select2" name="compania_id[]" id="compania_id" multiple="multiple" data-placeholder="Compañia"

                        style="width: 100%;">

               <?php while(!$companias->EOF){   ?>

                        <option value="<?php echo $companias->fields["id"]; ?>" <?php if (in_array($companias->fields["id"], $_POST["compania_id"])) { ?> selected="" <?php } ?> ><?php echo $companias->fields["nombre"]; ?></option>

               <?php $companias->MoveNext(); }  ?>

                </select>

               </div>

               <div class="form-group">

               

               <select class="form-control select2" name="admin_id[]" id="admin_id" multiple="multiple" data-placeholder="Usuario"

                       style="width: 100%;">

              <?php while(!$usuarios->EOF){   ?>

                       <option value="<?php echo $usuarios->fields["id"]; ?>" <?php if (in_array($usuarios->fields["id"], $_POST["admin_id"])) { ?> selected="" <?php } ?> ><?php echo $usuarios->fields["nombre"]; ?></option>

              <?php $usuarios->MoveNext(); }  ?>

               </select>

              </div>

               <div class="form-group">

                

                  <select id="estado" class="form-control" name="estado"  data-placeholder="Estado"  style="width: 100%;">

                  <option value=""><?php echo __("Todos los estados"); ?></option>



                  <option value="0" <?php if(isset($_POST["estado"]) and $_POST["estado"]!="" and $_POST["estado"]==0){ ?> selected <?php } ?> ><?php echo __("Sin Entrega"); ?></option>



               <option value="1" <?php if($_POST["estado"]==1){ ?> selected <?php } ?>><?php echo __("Entregado"); ?></option>

               <option value="2" <?php if($_POST["estado"]==2){ ?> selected <?php } ?>><?php echo __("Entregado con Pendientes"); ?></option>

               <option value="3" <?php if($_POST["estado"]==3){ ?> selected <?php } ?>><?php echo __("Anulados"); ?></option>

			

			

                  </select>

                  </div>



                  <div class="form-group">

                

                <select id="tipo" class="form-control" name="tipo"  data-placeholder="Tipo de orden"  style="width: 100%;">

                <option value=""><?php echo __("Todos los tipos"); ?></option>



                <option value="1" <?php if(isset($_POST["tipo"]) and $_POST["tipo"]==1){ ?> selected <?php } ?> ><?php echo __("Extra"); ?></option>



             <option value="2" <?php if($_POST["tipo"]==2){ ?> selected <?php } ?>><?php echo __("Cupo"); ?></option>

    

                </select>

                </div>

              <!-- /.form-group -->

       

              <div class="form-group">

              <input type="hidden"  name="fecha1" <?php if(isset($_POST["fecha1"]) and $_POST["fecha1"]!=""){ ?> value="<?php echo $_POST["fecha1"]; ?>" <?php }?> id="fecha1">

                <input type="hidden"  name="fecha2" id="fecha2" <?php if(isset($_POST["fecha2"]) and $_POST["fecha2"]!=""){ ?> value="<?php echo $_POST["fecha2"]; ?>" <?php }?>>

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

      <?php if(isset($_POST["tipofecha"])){ ?>

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

                  <th>%</th>

                  <th style="width: 40px"></th>

                </tr>

                <tr>

                

                <td>Numero de Ordenes</td>

                <td>

                 <?php echo $sale->_numOfRows;  ?>

                </td>

                <td></td> 

                <td></td> 

              </tr>

                <tr>

                

                  <td>Total Venta Extra</td>

                  <td>

                   $<?php $total1=$this->obj->totales($_POST,1); 

                   echo number_format($total1->fields["total"],0,',','.');

                   ?>

                  </td>

                  <td></td>

                  <td></td> 

                </tr>

                <tr>

                  

                  <td>Total Gramos Cupo</td>

                  <td>

                  <?php $total1=$this->obj->totales($_POST,2); 

                   echo round($total1->fields["total"]);

                   ?> gramos

                  </td>

                 <td>

               </td>

               <td></td> 

                </tr>

             

               

                <tr>

                

                  <td>Ordenes Pendientes</td>

                  <td id="ordenpendiente"></td> 

                  <td  id="ordenenpendiente">

                   

                  </td>

                  <td id="numpendiente"></td> 

                </tr>



                <tr>

                

                <td>Ordenes Entregadas</td>

                <td id="ordenentregada"></td> 

                <td>

                  <div class="progress progress-xs progress-striped active" id="porcenentregada">

                 

                  </div>

                </td>

                <td id="numentregada"></td> 

              </tr>

                <tr>

                

                  <td>Calificación Promedio</td>

                  <td><div align="center" id="star1" class='starrr'></div></td>

                  <td>

                    

                  </td>

                  <td></td>

                </tr>

              </table>

            </div>

            <!-- /.box-body -->

          </div>

          </div>

          <div class="col-md-6">

          <div class="box box-default">

            <div class="box-header with-border">

              <h3 class="box-title">Ordenes Por Compañia</h3>



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

          </div>

          <!-- /.box -->

            <div class="box-body">

              <table id="example2" class="table table-bordered table-hover">

                <thead>

                <tr>

                <th>#</th>

          <th>Tipo</th> 

          <th>Radicado</th>

          <th>Recibió</th>

          <th>Entrega</th>

          <th>Entregó</th>

          <th>Cliente</th>

          <th>Documento</th>

          <th>Promesa</th>

          <th>En Bodega</th>

          <th>Estado</th>

          <th>Calif.</th>

          <th>Acciones</th>           

                </tr>

                </thead>

                <tbody>

				<?php

$j=1;$i=0; $e=0;$p=0;$cal=0;

	while(!$sale->EOF){ ?>

                <tr>

  <td <?php if($sale->fields["aprobado_cliente"]==1){ ?> style="background-color:green" <?php } ?>><?php echo $sale->fields["id"]; ?></td>

          <td><?php if($sale->fields["tipo"]==1){ echo "EXTRA";} if($sale->fields["tipo"]==2){ echo "CUPO";} ?></td>

           <td><?php echo date('d-M-Y',strtotime($sale->fields["fecha_radicado"]));?></td>

           <td><?php if($sale->fields["ordendecliente"]==1){echo "<font style='color:blue'>Generado del cliente</font>"; } echo $sale->fields["recibio"];?></td>

        

           <td><?php if($sale->fields["estado"]!=0){ echo date('d-M-Y',strtotime($sale->fields["fecha_entrega"])); }?></td>

           <td><?php echo $sale->fields["entrego"];?></td>

        

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

                          {       echo $dias; echo " dias";}

                          ?>

        </td>

          <td id="estado<?php echo $sale->fields["id"]; ?>"><?php if($sale->fields["estado"]==0 && $sale->fields["calificacion"]==0){

            echo "<span class='label label-danger'>Sin Entrega</span>";



          }

          if($sale->fields["estado"]==0 && $sale->fields["calificacion"]>0){

            echo "<span class='label label-warning'>Entregado p.</span>";

          }

          

          if($sale->fields["estado"]==1){

            echo "<span class='label label-success'>Entregado</span>";

          } 

          if($sale->fields["estado"]==3){

            echo "<span class='label label-default'>Anulado</span>";

          } 

          

          ?></td>

        

           <td>

            <?php echo $sale->fields["calificacion"]; ?>   

        </td>

          <td>
          
      <a href="#" onclick="ver(<?php echo $sale->fields["id"]; ?>,<?php echo $sale->fields["tipo"]; ?>);return false;"  class="btn btn-default" data-original-title="Ver"><i class="fa fa-eye"></i></a> 
        

          <a href="#" <?php if($sale->fields["tipo"]==1){ ?> onclick="imprimircliente(<?php echo $sale->fields["id"]; ?>); return false;" <?php } ?> <?php if($sale->fields["tipo"]==2){ ?> onclick="imprimir(<?php echo $sale->fields["id"]; ?>)" <?php } ?>  class="btn btn-default" data-original-title="Imprimir"><i class="fa fa-print"></i></a>

         

        <?php if($_SESSION['perfil']==1 || $_SESSION['perfil']==2){ ?>   <a href="#"   onclick="anular(<?php echo $sale->fields["id"]; ?>);return false;" class="btn btn-default" data-original-title="Anular"><i class="fa fa-ban"></i></a>

     <?php } ?>



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

          <th>Entrega</th>

          <th>Entregó</th>

          <th>Cliente</th>

          <th>Documento</th>

          <th>Promesa</th>

          <th>Dias</th>

          <th>Estado</th>

          <th>Calif.</th>

          <th>Acciones</th>

      

				

				 

				 

                  

                 

                </tr>

                </tfoot>

              </table>

            </div>

        <?php } ?>

            <!-- /.box-body -->

          </div>

          <!-- /.box -->

          <div class="modal fade" id="modal-default">

          <div class="modal-dialog">

            <div class="modal-content">

              <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                  <span aria-hidden="true">&times;</span></button>

                <h4 class="modal-title">Detalle de la orden</h4>

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

$('[data-toggle="push-menu"]').pushMenu('toggle');

function ver(id,tipo){

  $("#carga").show();

  $('.modal-body').load('<?php echo PATO; ?>productocupos/detalle/'+id+'/'+tipo,function(){

        $('#modal-default').modal({show:true});

        $("#carga").hide();

    });

}

function verrecepcion(id,tipo){

$("#carga").show();

$('.modal-body').load('<?php echo PATO; ?>productocupos/detalledesdecliente/'+id+'/'+tipo,function(){

      $('#modal-default').modal({show:true});

      $("#carga").hide();

  });

}



function anular(id){

  if(confirm("desea eliminar la orden #"+id)){ 

  $.ajax({type: "POST",url: "<?php echo PATO; ?>productocupos/anularOrden/"+id,data: "ok=1",





success: function(datos){

  $("#estado"+id).html("<span class='label label-default'>Anulado</span>");

alert("Anulado Con Exito");

}





});

}

}

function imprimir(orden){

if(confirm("Desea imprimir la orden numero "+orden)){

  window.open("<?php echo PATO; ?>productocupos/impresion/"+orden, "Impresion", "width=10, height=10")

}

}

function imprimir2(orden){

if(confirm("Desea imprimir la orden numero "+orden)){

  window.open("<?php echo PATO; ?>productocupos/impresionextra/"+orden, "Impresion2", "width=10, height=10")

}

}

function imprimircliente(orden){

if(confirm("Desea imprimir la orden numero "+orden)){

  window.open("<?php echo PATO; ?>productocupos/impresionclienteextra/"+orden, "Impresion", "width=10, height=10")

}

}

function imprimircliente2(orden){

if(confirm("Desea imprimir la orden numero "+orden)){

  window.open("<?php echo PATO; ?>productocupos/impresionextra/"+orden, "Impresion2", "width=10, height=10")

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

      <?php } ?> 

 $("#ordenentregada").html(<?php echo $e; ?>);

 <?php $porcentaje=(100*$e)/$sale->_numOfRows; ?>

 $("#porcenentregada").html('<div class="progress-bar progress-bar-success" style="width: <?php echo round($porcentaje); ?>%"></div>');

 $("#numentregada").html('<span class="badge bg-green"><?php echo round($porcentaje); ?>%</span>');





 $("#ordenpendiente").html(<?php echo $p; ?>);

 <?php $porcentajep=(100*$p)/$sale->_numOfRows; ?>

 $("#porcenpendiente").html('<div class="progress-bar progress-bar-danger" style="width: <?php echo round($porcentajep); ?>%"></div>');

 $("#numpendiente").html('<span class="badge bg-red"><?php echo round($porcentajep); ?>%</span>');

    



    document.getElementById('star1').style.pointerEvents = 'none';



$('.starrr').starrr({

      max: 5,

    rating: <?php echo round($cal/$sale->_numOfRows); ?>,

      change: function(e, value){

      

      

      }

    });

    <?php if(isset($_POST["tipofecha"])){ ?>

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

<?php } ?>





</script>





