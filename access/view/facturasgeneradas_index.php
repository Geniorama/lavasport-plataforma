 <!-- Content Wrapper. Contains page content -->

 <div class="content-wrapper">

     <!-- Content Header (Page header) -->

     <section class="content-header">

         <h1>

             Reporte de Recibos

             <small>Versión 1.0</small>

         </h1>

         <ol class="breadcrumb">

             <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

             <li class="active"></li>

         </ol>

     </section>



     <!-- Main content -->

     <!-- Info boxes -->

     <section class="content">

         <div class="row">

             <div class="col-xs-12">

                 <div class="box">

                     <div class="box-header">

                         <h3 class="box-title">Reporte de Recibos Generados</h3>

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

                             <form action="<?php echo PATO; ?>facturasgeneradas/filtrar/" method="post" name="ciudades-filtrar" id="ciudades-filtrar" class="form-inline navbar-text">



                                 <div class="row">

                                     <div class="col">




                                         <div class="form-group">



                                             <button type="button" class="btn btn-default pull-right" id="daterange-btn">

                                                 <span>

                                                     <i class="fa fa-calendar"></i> Rango de fechas

                                                 </span>

                                                 <i class="fa fa-caret-down"></i>

                                             </button> </div>








                                         <!-- /.form-group -->



                                         <div class="form-group">
                                             <input type="hidden" name="fecha1" <?php if (isset($_POST["fecha1"]) and $_POST["fecha1"] != "") { ?> value="<?php echo $_POST["fecha1"]; ?>" <?php } ?> id="fecha1">

                                             <input type="hidden" name="fecha2" id="fecha2" <?php if (isset($_POST["fecha2"]) and $_POST["fecha2"] != "") { ?> value="<?php echo $_POST["fecha2"]; ?>" <?php } ?>>

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

                     <?php if (isset($_POST["fecha2"])) { ?>

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



                                                 <td>Numero de Recibos Generados</td>

                                                 <td>

                                                     <?php echo $sale->_numOfRows;  ?>

                                                 </td>



                                             </tr>

                                             <tr>



                                                 <td>Numero de Recibos Impresos</td>

                                                 <td>

                                                     <?php echo $saletotales->fields["imprimio"]; ?>

                                                 </td>



                                             </tr>

                                             <tr>



                                                 <td>Numero de Recibos Descargados</td>

                                                 <td>

                                                     <?php echo $saletotales->fields["pdf"]; ?>

                                                 </td>


                                             </tr>
                                             <tr>



                                                 <td>Numero de Ingresos a PSE</td>

                                                 <td>

                                                     <?php echo $saletotales->fields["pse"]; ?>

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

                                         <h3 class="box-title">Ordenes Por Escuela</h3>



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

                                                     <?php while (!$saleescuela->EOF) { ?>

                                                         <li><i class="fa fa-circle-o " style="color:<?php echo $saleescuela->fields["color"];  ?>"></i> <?php echo $saleescuela->fields["codigo"];  ?></li>

                                                     <?php

                                                            $saleescuela->MoveNext();
                                                        }

                                                        $saleescuela->Move(0);

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

                                         <th>Estudiante</th>

                                         <th>Documento</th>

                                         <th>Concepto</th>

                                         <th>Imprimio?</th>

                                         <th>Genero Pdf?</th>

                                         <th>Accedio a PSE?</th>

                                         <th>Fecha</th>

                                         <th>Ip</th>


                                     </tr>

                                 </thead>

                                 <tbody>

                                     <?php



                                        while (!$sale->EOF) { ?>

                                         <tr>

                                             <td><?php echo $sale->fields["estudiantes_nombre"]; ?></td>
                                             <td><?php echo $sale->fields["documento"]; ?></td>
                                             <td><?php echo $sale->fields["concepto"]; ?></td>

                                             <td><?php if ($sale->fields["imprimio"] == 1) {
                                                        echo "Si";
                                                    } else {
                                                        echo "No";
                                                    } ?></td>
                                             <td><?php if ($sale->fields["pdf"] == 1) {
                                                        echo "Si";
                                                    } else {
                                                        echo "No";
                                                    } ?></td>
                                             <td><?php if ($sale->fields["pse"] == 1) {
                                                        echo "Si";
                                                    } else {
                                                        echo "No";
                                                    } ?></td>
                                             <td><?php echo $sale->fields["fecha"]; ?></td>
                                             <td><?php echo $sale->fields["ip"]; ?></td>


                                         </tr>

                                     <?php
                                            $sale->MoveNext();
                                        }
                                        $sale->Move(0); ?>

                                 </tbody>

                                 <tfoot>

                                     <tr>


                                     <tr>

                                         <th>Estudiante</th>

                                         <th>Documento</th>

                                         <th>Concepto</th>

                                         <th>Imprimio?</th>

                                         <th>Genero Pdf?</th>

                                         <th>Accedio a PSE?</th>

                                         <th>Fecha</th>

                                         <th>Ip</th>


                                     </tr>












                                     </tr>

                                 </tfoot>

                             </table>

                         </div>


                     <?php } ?>
                     <!-- /.box-body -->

                 </div>

                 <!-- /.box -->

                 <!-- /.modal -->

                 <script>
                     $('[data-toggle="push-menu"]').pushMenu('toggle');

                     $('#example2').DataTable({

                         'paging': true,

                         'lengthChange': false,

                         'searching': true,

                         'ordering': true,

                         'info': true,

                         'autoWidth': false,
                         'pageLength': 10,

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

                     <?php if (isset($_POST["fecha1"]) and $_POST["fecha1"] != "") { ?>

                         $('#daterange-btn span').html('<?php echo date('d-M-Y', strtotime($_POST["fecha1"])); ?> - <?php echo date('d-M-Y', strtotime($_POST["fecha2"])); ?>');

                     <?php } else { ?>

                         $('#daterange-btn span').html('<span><i class="fa fa-calendar"></i> Rango de fechas</span>');

                     <?php } ?>



                     <?php if (isset($_POST["fecha1"])) { ?>

                         var pieChartCanvas = $('#pieChart').get(0).getContext('2d');

                         var pieChart = new Chart(pieChartCanvas);

                         var PieData = [



                             <?php while (!$saleescuela->EOF) { ?>

                                 {

                                     value: <?php echo $saleescuela->fields["numero"]; ?>,

                                     color: '<?php echo $saleescuela->fields["color"]; ?>',

                                     highlight: '<?php echo $saleescuela->fields["color"]; ?>',

                                     label: '<?php echo $saleescuela->fields["codigo"]; ?>'

                                 },
                             <?php

                                    $saleescuela->MoveNext();
                                }

                                $saleescuela->Move(0);

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

                     <?php } ?>
                 </script>