 <!-- Content Wrapper. Contains page content -->

 <div class="content-wrapper">

   <!-- Content Header (Page header) -->

   <section class="content-header">

     <h1>

       Pagos

       <small>Versión 1.0</small>

     </h1>

     <ol class="breadcrumb">

       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

       <li class="active">Pagos</li>

     </ol>

   </section>



   <!-- Main content -->

   <!-- Info boxes -->

   <section class="content">

     <div class="row">

       <div class="col-xs-12">

         <div class="box">

           <div class="box-header">
             <form target="_blank" action='<?php echo PATO; ?>productocupos/cargarmasivopagos/' method='post' enctype="multipart/form-data">
               <input type='file' name='sel_file' size='20'>
               <input type='submit' class="btn btn-success" name='submit' value='Cargar Pagos'>
             </form>

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

               <form action="<?php echo PATO; ?>productocupos/pagosfiltro/" method="post" name="ciudades-filtrar" id="ciudades-filtrar" class="form-inline navbar-text">



                 <div class="row">

                   <div class="col">

                     <!--    <div class="form-group">

            <input class="form-control" type="date"  name="fecha1" <?php if (isset($_POST["fecha1"]) and $_POST["fecha1"] != "") { ?> value="<?php echo $_POST["fecha1"]; ?>" <?php } ?> id="fecha1">

</div> 

            <div class="form-group">

                <input class="form-control" type="date"  name="fecha2" id="fecha2" <?php if (isset($_POST["fecha2"]) and $_POST["fecha2"] != "") { ?> value="<?php echo $_POST["fecha2"]; ?>" <?php } ?>>

           </div> -->







                     <!-- /.form-group -->

                     <div class="form-group">



                       <input type="text" placeholder="Documento del cliente" id="documento" name="documento" value="<?php echo $_POST["documento"]; ?>" class="form-control">

                     </div>

                     <!-- /.form-group -->





                     <div class="form-group">



                       <select class="form-control" name="cupo_id" id="cupo_id" data-placeholder="Cupo" style="width: 100%;">

                         <option value="0">Seleccione el cupo</option>



                         <?php while (!$cupos1->EOF) {   ?>

                           <option value="<?php echo $cupos1->fields["id"]; ?>" <?php if ($_POST["cupo_id"] == $cupos1->fields["id"]) { ?> selected <?php } ?>><?php echo $cupos1->fields["nombre"]; ?></option>

                         <?php $cupos1->MoveNext();
                          }  ?>

                       </select>

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

                     <thead>

                       <tr>



                         <th>Cuenta</th>

                         <th>Al dia</th>

                         <th>Debe</th>

                         <th style="width: 40px">Total</th>

                         <th>% x cupo</th>

                         <th>Pagado</th>

                         <th>Se debe</th>

                         <th>Proyectado</th>

                       </tr>

                     </thead>

                     <tbody>



                       <?php

                        $aldiat = 0;

                        $debet = 0;

                        $pagadot = 0;

                        $pagadodebet = 0;

                        while (!$salecopanias->EOF) {



                          $deben = $this->obj->debenxcompania($salecopanias->fields["id"]);

                          $platadeben = $this->obj->platadebenxcompania($salecopanias->fields["id"]);

                          $platapago = $this->obj->plataxcompania($salecopanias->fields["id"]);



                        ?>



                         <tr>

                           <td style="color:<?php echo $salecopanias->fields["color"];  ?>"><?php echo $salecopanias->fields["nombre"];  ?></td>

                           <td><?php echo $salecopanias->fields["num"]; ?></td>

                           <td><?php echo $deben->fields["num"]; ?></td>

                           <td><?php echo $salecopanias->fields["num"] + $deben->fields["num"]; ?></td>

                           <td> <span class="progress-number"><b><?php echo round(($salecopanias->fields["num"] * 100) / ($salecopanias->fields["num"] + $deben->fields["num"])); ?>%</span>



                             <div class="progress sm">

                               <div class="progress-bar progress-bar-blue" style="width: <?php echo round(($salecopanias->fields["num"] * 100) / ($salecopanias->fields["num"] + $deben->fields["num"])); ?>%"></div>

                             </div>
                           </td>

                           <td><?php echo  number_format($platapago->fields["num"], 0, ",", "."); ?></td>

                           <td><?php echo number_format($platadeben->fields["num"], 0, ",", "."); ?></td>

                           <td><?php echo number_format($platadeben->fields["num"] + $platapago->fields["num"], 0, ",", "."); ?></td>



                         </tr>



                       <?php

                          $aldiat = $aldiat + $salecopanias->fields["num"];

                          $debet = $debet + $deben->fields["num"];

                          $pagadot = $pagadot + $platapago->fields["num"];

                          $pagadodebet = $pagadodebet + $platadeben->fields["num"];

                          $salecopanias->MoveNext();
                        }

                        $salecopanias->Move(0); ?>

                       <tr>



                         <td><strong>Totales</strong></td>

                         <td><?php echo $aldiat; ?></td>

                         <td><?php echo $debet; ?></td>

                         <td><?php echo $aldiat + $debet; ?></td>

                         <td></td>

                         <td><?php echo number_format($pagadot, 0, ",", ".") ?></td>

                         <td><?php echo number_format($pagadodebet, 0, ",", ".") ?></td>

                         <td><strong><?php echo number_format($pagadot + $pagadodebet, 0, ",", ".") ?></strong></td>

                       </tr>



                     </tbody>

                   </table>

                 </div>

                 <!-- /.box-body -->

               </div>

             </div>

             <div class="col-md-6">

               <div class="box box-default">

                 <div class="box-header with-border">

                   <h3 class="box-title">Pagos Por Compañia</h3>



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

                         <?php while (!$salecopanias->EOF) { ?>

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



           <!-- /.box-body -->

         </div>

         <!-- /.box -->

         <div class="box">

           <div class="box-body">

             <form action="<?php echo PATO; ?>clientes/excel" method="post" target="_blank" id="FormularioExportacion">

               <p><input type="button" onclick="exportaraexcel()" value="exportar"></p>

               <input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />

             </form>

             <table id="example2" class="table table-bordered table-hover">

               <thead>

                 <tr>



                   <th>Cliente</th>

                   <th>Documento</th>

                   <th>compania</th>

                   <th>cupo</th>

                   <th>Fecha de Pago</th>

                   <th>Metodo</th>

                   <th>Pago</th>









                 </tr>

               </thead>

               <tbody>

                 <?php

                  $j = 1;
                  $i = 0;

                  while (!$salepagos->EOF) {





                  ?>

                   <tr>

                     <td><?php echo $salepagos->fields["nombre"]; ?></td>

                     <td><?php echo $salepagos->fields["documento"]; ?></td>

                     <td><?php echo $salepagos->fields["compania_nombre"]; ?></td>

                     <td><?php echo $salepagos->fields["cupo_nombre"]; ?>

                     </td>

                     <td><?php echo $salepagos->fields["fechapago"]; ?></td>

                     <td>

                       <?php



                        if ($salepagos->fields["metodo"] == 1) { ?>Efectivo<?php }

                                                                          if ($salepagos->fields["metodo"] == 2) { ?>Banco<?php } ?>





                     </td>

                     <td><?php echo number_format($salepagos->fields["pago"], 0, ',', '.');  ?>

                     </td>











                   </tr>

                 <?php if ($j == 1) {
                      $j = 2;
                    } else {
                      $j = 1;
                    }
                    $salepagos->MoveNext();
                    $i++;
                  }
                  $salepagos->Move(0); ?>



               </tbody>

               <tfoot>

                 <tr>



                   <th>Cliente</th>

                   <th>Documento</th>

                   <th>compania</th>

                   <th>cupo</th>

                   <th>Fecha de Pago</th>

                   <th>Metodo</th>

                   <th>Pago</th>

                 </tr>

               </tfoot>

             </table>

           </div>





         </div>

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
           function ver(id, tipo) {

             $("#carga").show();

             $('.modal-body').load('<?php echo PATO; ?>productocupos/detalle/' + id + '/' + tipo, function() {

               $('#modal-default').modal({
                 show: true
               });

               $("#carga").hide();

             });

           }



           function exportaraexcel() {



             $("#datos_a_enviar").val($("<div>").append($("#example2").eq(0).clone()).html());

             $("#FormularioExportacion").submit();



           }

           $(function() {







             $('.select2').select2();

             $('#example1').DataTable()

             $('#example2').DataTable({

               'paging': true,

               'lengthChange': true,

               "lengthMenu": [50, 100, 200, 500, 1000, 2000],

               'searching': true,

               'ordering': true,

               'info': true,

               'autoWidth': false,

               'pageLength': 100,

             })

           })





           $('#daterange-btn').daterangepicker(

             {

               ranges: {

                 'Hoy': [moment(), moment()],

                 'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],

                 'Ultimos 7 dias': [moment().subtract(6, 'days'), moment()],

                 'Ultimos 30 dias': [moment().subtract(29, 'days'), moment()],

                 'Este mes': [moment().startOf('month'), moment().endOf('month')],

                 'Mes pasado': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]

               },



               <?php if (isset($_POST["fecha1"]) and $_POST["fecha1"] != "") {



                  $newDate = date("m/d/Y", strtotime($_POST["fecha1"]));

                  $newDate2 = date("m/d/Y", strtotime($_POST["fecha2"]));

                ?>

                 startDate: "<?php echo  $newDate; ?>",

                 endDate: "<?php echo  $newDate2; ?>"



               <?php } else {

                  echo " startDate: moment().subtract(29, 'days'),  endDate  : moment()";
                } ?>





             },

             function(start, end) {



               $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))



               $("#fecha1").val(start.format('YYYY-MM-DD'));

               $("#fecha2").val(end.format('YYYY-MM-DD'));

             }

           );



           var pieChartCanvas = $('#pieChart').get(0).getContext('2d');

           var pieChart = new Chart(pieChartCanvas);

           var PieData = [



             <?php while (!$salecopanias->EOF) { ?>

               {

                 value: <?php echo $salecopanias->fields["num"]; ?>,

                 color: '<?php echo $salecopanias->fields["color"]; ?>',

                 highlight: '<?php echo $salecopanias->fields["color"]; ?>',

                 label: '<?php echo $salecopanias->fields["nombre"]; ?>'

               },
             <?php

                $salecopanias->MoveNext();
              }

              $salecopanias->Move(0);

              ?>

           ];

           var pieOptions = {

             // Boolean - Whether we should show a stroke on each segment

             segmentShowStroke: true,

             // String - The colour of each segment stroke

             segmentStrokeColor: '#fff',

             // Number - The width of each segment stroke

             segmentStrokeWidth: 1,

             // Number - The percentage of the chart that we cut out of the middle

             percentageInnerCutout: 50, // This is 0 for Pie charts

             // Number - Amount of animation steps

             animationSteps: 100,

             // String - Animation easing effect

             animationEasing: 'easeOutBounce',

             // Boolean - Whether we animate the rotation of the Doughnut

             animateRotate: true,

             // Boolean - Whether we animate scaling the Doughnut from the centre

             animateScale: false,

             // Boolean - whether to make the chart responsive to window resizing

             responsive: true,

             // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container

             maintainAspectRatio: false,

             // String - A legend template

             legendTemplate: '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<segments.length; i++){%><li><span style=\'background-color:<%=segments[i].fillColor%>\'></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>',

             // String - A tooltip template

             tooltipTemplate: '<%=value %> <%=label%>'

           };

           // Create pie or douhnut chart

           // You can switch between pie and douhnut using the method below.

           pieChart.Doughnut(PieData, pieOptions);
         </script>