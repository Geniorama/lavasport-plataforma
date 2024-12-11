 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
       Configuraciones
       <small>Versión 1.0</small>
     </h1>
     <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
       <li class="active">Configuraciones</li>
     </ol>
   </section>

   <!-- Main content -->
   <!-- Info boxes -->
   <section class="content">
     <div class="row">
       <div class="col-xs-12">
         <div class="box">




           <!-- /.box-header -->

           <div class="box-body">
             <table id="example2" class="table table-bordered table-hover">
               <thead>
                 <tr>
                   <th>código de barras part.1</th>
                   <th>código de barras part.2</th>
                   <th>código de barras part.3</th>
                   <th>color Tema</th>
                   <th>Acciones</th>




                 </tr>
               </thead>
               <tbody>
                 <?php
                  $j = 1;
                  $i = 0;
                  while (!$sale->EOF) { ?>
                   <tr>
                     <td><?php echo $sale->fields["codigobarras1"]; ?></td>
                     <td><?php echo $sale->fields["codigobarras2"]; ?></td>
                     <td><?php echo $sale->fields["codigobarras3"]; ?></td>
                     <td><?php echo $sale->fields["color_tema"]; ?></td>
                     <td> <button type="button" onclick="modificar(<?php echo $sale->fields["id"]; ?>)" class="btn btn-success btn-flat"><i class="fa fa-edit"></i> </button>

                     </td>


                   </tr>
                 <?php if ($j == 1) {
                      $j = 2;
                    } else {
                      $j = 1;
                    }
                    $sale->MoveNext();
                    $i++;
                  }
                  $sale->Move(0); ?>
               </tbody>
               <tfoot>
                 <tr>
                   <th>código de barras part.1</th>
                   <th>código de barras part.2</th>
                   <th>código de barras part.3</th>
                   <th>color Tema</th>
                   <th>Acciones</th>

                 </tr>
               </tfoot>
             </table>
           </div>
           <!-- /.box-body -->
         </div>
         <!-- /.box -->
         <script>
           function modificar(id) {
             window.location.href = "<?php echo PATO; ?>configuraciones/editar/" + id;

           }


           $(function() {
             $('.select2').select2();
             $('#example1').DataTable()
             $('#example2').DataTable({
               'paging': false,
               'lengthChange': false,
               'searching': false,
               'ordering': false,
               'info': false,
               'autoWidth': false
             })
           })
         </script>