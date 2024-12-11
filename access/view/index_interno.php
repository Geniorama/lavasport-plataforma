 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
       Dashboard
       <small>Version 2.0</small>
     </h1>
     <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
       <li class="active">Dashboard</li>
     </ol>
   </section>
   <section class="col-lg-12 connectedSortable ui-sortable">
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
         <form action="<?php echo PATO; ?>index/" method="post" name="ciudades-filtrar" id="ciudades-filtrar" class="form-inline navbar-text">

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
   </section>
   <section class="content" style="height: auto !important; min-height: 0px !important;">
     <div class="row">
       <div class="col-lg-3 col-xs-6">
         <!-- small box -->
         <div class="small-box bg-green">
           <div class="inner">
             <h3>$<?php echo number_format($pagos->fields["total"], 0, ",", ".");
                  ?></h3>

             <p>Pagos</p>
           </div>
           <div class="icon">
             <i class="fa fa-money"></i>
           </div>
           <a href="<?php echo PATO; ?>pagos/" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
         </div>
       </div>
       <!-- ./col -->
       <div class="col-lg-3 col-xs-6">
         <!-- small box -->
         <div class="small-box bg-aqua">
           <div class="inner">
             <h3><?php echo number_format($facturas->fields["total"], 0, ",", ".");
                  ?></h3>

             <p>Recibos Generados</p>
           </div>
           <div class="icon">
             <i class="fa fa-money"></i>
           </div>
           <a href="<?php echo PATO; ?>facturasgeneradas/" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
         </div>
       </div>


       <!-- <div class="col-lg-3 col-xs-6">
        
         <div class="small-box bg-yellow">
           <div class="inner">
             <h3>3,5<?php
                    ?></h3>

             <p>Calificación Promedio</p>
           </div>
           <div class="icon">
             <i class="fa fa-star"></i>
           </div>
           <a href="<?php echo PATO; ?>productocupos/ordenes/" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
         </div>
       </div> -->

     </div>




 </div>
 </div>
 <!-- /.row -->
 </div>
 <!-- /.box-footer -->
 </div>
 <!-- /.box -->
 </div>
 <!-- /.col -->
 </div>
 <!-- /.row -->

 <!-- Main row -->
 <div class="row">
   <!-- Left col -->
   <div class="col-md-8">
     <!-- MAP & BOX PANE -->

     <!-- /.box -->
     <div class="row">
       <div class="col-md-6">

       </div>
       <!-- /.col -->


       <!-- /.col -->
     </div>
     <!-- /.row -->

     <!-- TABLE: LATEST ORDERS -->

   </div>
   <!-- /.col -->


   <!-- /.box -->
 </div>
 <!-- /.col -->
 </div>
 <!-- /.row -->
 </section>
 <script>
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
 </script>