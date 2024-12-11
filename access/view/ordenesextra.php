 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
       Arqueo De Caja
       <small>Versión 1.0</small>
     </h1>
     <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
       <li class="active">Arqueo</li>
     </ol>
   </section>

   <!-- Main content -->
   <!-- Info boxes -->
   <section class="content">
     <div class="row">
       <div class="col-xs-12">
         <div class="box">
           <div class="box-header">
             <h3 class="box-title">Ventas totales por vendedor</h3>
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
               <form action="<?php echo PATO; ?>productocupos/ordenesextrafiltro/" method="post" name="ciudades-filtrar" id="ciudades-filtrar" class="form-inline navbar-text">

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
           <div align="center" id="totalrecibido"></div>
           <br>
           <div class="col-md-12">
             <div class="box box-warning box-solid">
               <div class="box-header with-border">
                 <h3 class="box-title">PAGOS EXTRAS</h3>

                 <div class="box-tools pull-right">
                   <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                   </button>
                 </div>
                 <!-- /.box-tools -->
               </div>
               <!-- /.box-header -->
               <div class="box-body" style="">
                 <table id="example2" class="table table-bordered table-hover">
                   <thead>
                     <tr>
                       <th>Usuario</th>
                       <th>Valor Total</th>
                       <th>Abonado</th>
                       <th>valores actuales en inventario</th>

                     </tr>
                   </thead>
                   <tbody>
                     <?php

                      while (!$sale->EOF) {

                        $sale2 = $this->obj->ordenesabonos($sale->fields["admin_id"], $_POST);
                      ?>
                       <tr>
                         <td><?php echo $sale->fields["nombre"]; ?></td>
                         <td class="text-right">$<?php echo number_format($sale->fields["valor"], 0, ",", "."); ?></td>
                         <td class="text-right"><a href="#" onclick="verordenesvalores(<?php echo $sale->fields["admin_id"]; ?>);return false;">$<?php echo number_format($sale2->fields["abono"], 0, ",", "."); ?></a></td>

                         <td class="text-right">$<?php echo number_format($sale->fields["valor"] - $sale2->fields["abono"], 0, ",", "."); ?></td>




                       </tr>
                     <?php

                        $arrcliente[$sale->fields["admin_id"]] += $sale2->fields["abono"];
                        if ($j == 1) {
                          $j = 2;
                        } else {
                          $j = 1;
                        }
                        $totalvalor = $totalvalor + $sale->fields["valor"];
                        $totalabono = $totalabono + $sale2->fields["abono"];
                        $totalabono2 = $totalabono2 + $sale3->fields["abono"];
                        $sale->MoveNext();
                        $i++;
                      }
                      $sale->Move(0); ?>


                   </tbody>
                   <tr>
                     <td><strong>TOTALES</strong></td>
                     <td class="text-right"><strong>$<?php echo number_format($totalvalor, 0, ",", "."); ?></strong></td>
                     <td class="text-right"><strong>$<?php echo number_format($totalabono, 0, ",", "."); ?></strong></td>
                     <td class="text-right"><strong>$<?php echo number_format($totalvalor - $totalabono, 0, ",", "."); ?></strong></td>




                   </tr>
                   <tfoot>
                     <tr>
                       <th>Usuario</th>
                       <th>Valor Total</th>
                       <th>Total Abonado</th>
                       <th>valores actuales en inventario</th>


                     </tr>
                   </tfoot>
                 </table>
               </div>
               <!-- /.box-body -->
             </div>
             <!-- /.box -->
           </div>


           <div class="col-md-12">
             <div class="box box-warning box-solid">
               <div class="box-header with-border">
                 <h3 class="box-title">PAGO EXTRAS VALORES ACTUALES EN INVENTARIO:</h3>

                 <div class="box-tools pull-right">
                   <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                   </button>
                 </div>
                 <!-- /.box-tools -->
               </div>
               <!-- /.box-header -->
               <div class="box-body" style="">
                 <table id="example2" class="table table-bordered table-hover">
                   <thead>
                     <tr>
                       <th>Usuario</th>
                       <th>Abonado</th>
                     </tr>
                   </thead>
                   <tbody>
                     <?php

                      while (!$sale3->EOF) {


                      ?>
                       <tr>
                         <td><?php echo $sale3->fields["nombre"]; ?></td>
                         <td class="text-right"> <a href="#" onclick="verabonospendiente(<?php echo $sale3->fields["admin_id"]; ?>);return false;">$<?php echo number_format($sale3->fields["valor"], 0, ",", "."); ?></a></td>



                       </tr>
                     <?php


                        $arrcliente[$sale3->fields["admin_id"]] += $sale3->fields["valor"];
                        if ($j == 1) {
                          $j = 2;
                        } else {
                          $j = 1;
                        }
                        $totalvalor4 = $totalvalor4 + $sale3->fields["valor"];
                        $sale3->MoveNext();
                        $i++;
                      }
                      $sale3->Move(0); ?>


                   </tbody>
                   <tr>
                     <td><strong>TOTALES</strong></td>
                     <td class="text-right"><strong>$<?php echo number_format($totalvalor4, 0, ",", "."); ?></strong></td>




                   </tr>
                   <tfoot>
                     <tr>
                       <th>Usuario</th>
                       <th>Abonado</th>


                     </tr>
                   </tfoot>
                 </table>
               </div>
               <!-- /.box-body -->
             </div>
             <!-- /.box -->
           </div>


           <div class="col-md-12">
             <div class="box box-warning box-solid">
               <div class="box-header with-border">
                 <h3 class="box-title">PAGO CUPOS:</h3>

                 <div class="box-tools pull-right">
                   <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                   </button>
                 </div>
                 <!-- /.box-tools -->
               </div>
               <!-- /.box-header -->
               <div class="box-body" style="">
                 <table id="example2" class="table table-bordered table-hover">
                   <thead>

                     <tr>
                       <th>Usurio</th>
                       <th>Valor Total</th>
                     </tr>
                   </thead>
                   <tbody>
                     <?php

                      while (!$salep->EOF) {


                      ?>
                       <tr>

                         <td><?php echo $salep->fields["nombre"]; ?></td>

                         <td class="text-right"><a href="#" onclick="vervalorescupos(<?php echo $salep->fields["admin_id"]; ?>);return false;">$<?php echo number_format($salep->fields["valor"], 0, ",", "."); ?></a></td>



                       </tr>
                     <?php
                        $arrcliente[$salep->fields["admin_id"]] += $salep->fields["valor"];
                        if ($j == 1) {
                          $j = 2;
                        } else {
                          $j = 1;
                        }
                        $totalvalor3 = $totalvalor3 + $salep->fields["valor"];
                        $salep->MoveNext();
                        $i++;
                      }
                      $salep->Move(0); ?>


                   </tbody>
                   <tr>
                     <td><strong>TOTALES</strong></td>

                     <td class="text-right"><strong>$<?php echo number_format($totalvalor3, 0, ",", "."); ?></strong></td>


                   </tr>
                   <tfoot>
                     <tr>

                       <th>Usuario</th>

                       <th>Valor</th>







                     </tr>
                   </tfoot>
                 </table>
               </div>
               <!-- /.box-body -->
             </div>
             <!-- /.box -->
           </div>




           <div class="col-md-12">
             <div class="box box-warning box-solid">
               <div class="box-header with-border">
                 <h3 class="box-title">MARQUILLAS:</h3>

                 <div class="box-tools pull-right">
                   <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                   </button>
                 </div>
                 <!-- /.box-tools -->
               </div>
               <!-- /.box-header -->
               <div class="box-body" style="">
                 <table id="example4" class="table table-bordered table-hover">
                   <thead>

                     <tr>
                       <th>Usuario</th>
                       <th>cantidad</th>
                       <th>Valor</th>








                     </tr>
                   </thead>
                   <tbody>
                     <?php

                      while (!$salem->EOF) {


                      ?>
                       <tr>
                         <td><?php echo $salem->fields["usuario"]; ?></td>
                         <td><?php echo $salem->fields["cantidad"]; ?></td>
                         <td class="text-right"><a href="#" onclick="vermarquillasvalores(<?php echo $salem->fields["admin_id"]; ?>);return false;">$<?php echo number_format($salem->fields["precio"], 0, ",", "."); ?></a></td>


                       </tr>
                     <?php

                        $arrcliente[$salem->fields["admin_id"]] += $salem->fields["precio"];
                        if ($j == 1) {
                          $j = 2;
                        } else {
                          $j = 1;
                        }
                        $cantidad1 = $cantidad1 + $salem->fields["cantidad"];
                        $totalvalor2 = $totalvalor2 + $salem->fields["precio"];
                        $salem->MoveNext();
                        $i++;
                      }
                      $salem->Move(0); ?>


                   </tbody>
                   <tr>
                     <td><strong>TOTALES</strong></td>
                     <td><?php echo  $cantidad1; ?></td>
                     <td class="text-right"><strong>$<?php echo number_format($totalvalor2, 0, ",", "."); ?></strong></td>


                   </tr>
                   <tfoot>
                     <tr>
                       <th>Usuario</th>
                       <th>cantidad</th>
                       <th>Valor</th>


                     </tr>
                   </tfoot>
                 </table>
               </div>
               <!-- /.box-body -->
             </div>
             <!-- /.box -->
           </div>


           <div class="col-md-12">
             <div class="box box-warning box-solid">
               <div class="box-header with-border">
                 <h3 class="box-title">TULAS Y MALLAS:</h3>

                 <div class="box-tools pull-right">
                   <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                   </button>
                 </div>
                 <!-- /.box-tools -->
               </div>
               <!-- /.box-header -->
               <div class="box-body" style="">
                 <table id="example7" class="table table-bordered table-hover">
                   <thead>

                     <tr>
                       <th>Usuario</th>
                       <th>Cantidad</th>
                       <th>Valor</th>
                     </tr>
                   </thead>
                   <tbody>
                     <?php

                      while (!$sales->EOF) {


                      ?>
                       <tr>
                         <td><?php echo $sales->fields["usuario"]; ?></td>
                         <td><?php echo $sales->fields["cantidad"]; ?></td>
                         <td class="text-right"><a href="#" onclick="vermarquillasvalores2(<?php echo $sales->fields["admin_id"]; ?>);return false;">$<?php echo number_format($sales->fields["precio"], 0, ",", "."); ?></a></td>
                       </tr>
                     <?php
                        $arrcliente[$sales->fields["admin_id"]] += $sales->fields["precio"];
                        $totalvalor5 = $totalvalor5 + $sales->fields["precio"];
                        $totalcantidad = $totalcantidad + $sales->fields["cantidad"];
                        $sales->MoveNext();
                        $i++;
                      }
                      $sales->Move(0); ?>


                   </tbody>
                   <tr>
                     <td><strong>TOTALES</strong></td>
                     <td><?php echo $totalcantidad; ?></td>
                     <td class="text-right"><strong>$<?php echo number_format($totalvalor5, 0, ",", "."); ?></strong></td>


                   </tr>
                   <tfoot>
                     <tr>
                       <th>Usuario</th>
                       <th>Cantidad</th>
                       <th>Valor</th>
                     </tr>
                   </tfoot>
                 </table>
               </div>
               <!-- /.box-body -->
             </div>
             <!-- /.box -->
           </div>


           <div class="col-md-12">
             <div class="box box-success box-solid">
               <div class="box-header with-border">
                 <h3 class="box-title">TOTAL GENERAL:</h3>

                 <div class="box-tools pull-right">
                   <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                   </button>
                 </div>
                 <!-- /.box-tools -->
               </div>
               <!-- /.box-header -->
               <div class="box-body" style="">
                 <table id="example7" class="table table-bordered table-hover">
                   <thead>

                     <tr>
                       <th>Usuario</th>
                       <th>Valor</th>
                     </tr>
                   </thead>
                   <tbody>
                     <?php



                      foreach ($arrcliente as  $clave => $valor) {
                        $usuarionombre = $this->obj->verusuario($clave);
                      ?>
                       <tr>
                         <td><?php echo  $usuarionombre->fields["nombre"]; ?></td>
                         <td class="text-right"><?php echo number_format($valor, 0, ",", "."); ?></td>
                       </tr>
                     <?php
                        $totalvalor8 = $totalvalor8 + $valor;
                      } ?>


                   </tbody>
                   <tr>
                     <td><strong>TOTALES</strong></td>

                     <td class="text-right"><strong>$<?php echo number_format($totalvalor8, 0, ",", "."); ?></strong></td>


                   </tr>
                   <tfoot>
                     <tr>
                       <th>Usuario</th>
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


         <!-- /.box -->
         <div class="modal fade" id="modal-default">
           <div class="modal-dialog">
             <div class="modal-content">
               <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title">Detalle</h4>
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
           $(function() {



             $('.select2').select2();
             $('#example1').DataTable()
             $('#example2').DataTable({
               'paging': true,
               'lengthChange': false,
               'searching': false,
               'ordering': true,
               'info': true,
               'autoWidth': false
             })
           })


           $('#daterange-btn').daterangepicker({
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
           $("#totalrecibido").html("<strong>TOTAL RECIBIDO: $<?php echo number_format($totalabono + $totalvalor2 + $totalvalor3 + $totalvalor4 + $totalvalor5, 0, ",", "."); ?></strong>");

           function verordenesvalores(user) {
             $("#carga").show();



             $.ajax({
               type: "POST",
               url: "<?php echo PATO; ?>productocupos/ordenesvalores/",
               data: "admin_id=" + user + "&fecha1=<?php echo $_POST["fecha1"]; ?>&fecha2=<?php echo $_POST["fecha2"];  ?>",


               success: function(datos) {

                 $('#modal-default').modal({
                   show: true
                 });
                 $("#carga").hide();

                 $('.modal-body').html(datos);
               }


             });








           }

           function vermarquillasvalores(user) {

             $("#carga").show();



             $.ajax({
               type: "POST",
               url: "<?php echo PATO; ?>productocupos/marquillasvalores/",
               data: "admin_id=" + user + "&fecha1=<?php echo $_POST["fecha1"]; ?>&fecha2=<?php echo $_POST["fecha2"];  ?>",


               success: function(datos) {

                 $('#modal-default').modal({
                   show: true
                 });
                 $("#carga").hide();

                 $('.modal-body').html(datos);
               }


             });


           }

           function vermarquillasvalores2(user) {

             $("#carga").show();



             $.ajax({
               type: "POST",
               url: "<?php echo PATO; ?>productocupos/marquillasvalores2/",
               data: "admin_id=" + user + "&fecha1=<?php echo $_POST["fecha1"]; ?>&fecha2=<?php echo $_POST["fecha2"];  ?>",


               success: function(datos) {

                 $('#modal-default').modal({
                   show: true
                 });
                 $("#carga").hide();

                 $('.modal-body').html(datos);
               }


             });


           }



           function vervalorescupos(user) {
             $("#carga").show();



             $.ajax({
               type: "POST",
               url: "<?php echo PATO; ?>productocupos/cuposvalores/",
               data: "admin_id=" + user + "&fecha1=<?php echo $_POST["fecha1"]; ?>&fecha2=<?php echo $_POST["fecha2"];  ?>",


               success: function(datos) {

                 $('#modal-default').modal({
                   show: true
                 });
                 $("#carga").hide();

                 $('.modal-body').html(datos);
               }


             });








           }

           function verabonospendiente(user) {

             $("#carga").show();



             $.ajax({
               type: "POST",
               url: "<?php echo PATO; ?>productocupos/abonosvalores/",
               data: "admin_id=" + user + "&fecha1=<?php echo $_POST["fecha1"]; ?>&fecha2=<?php echo $_POST["fecha2"];  ?>",


               success: function(datos) {

                 $('#modal-default').modal({
                   show: true
                 });
                 $("#carga").hide();

                 $('.modal-body').html(datos);
               }


             });


           }


           function exportaraexcel() {

             $("#datos_a_enviar").val($("<div>").append($("#example4").eq(0).clone()).html());
             $("#FormularioExportacion").submit();

           }

           function exportaraexcel2() {

             $("#datos_a_enviar2").val($("<div>").append($("#example7").eq(0).clone()).html());
             $("#FormularioExportacion2").submit();

           }
         </script>