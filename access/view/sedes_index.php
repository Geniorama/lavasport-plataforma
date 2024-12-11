 <!-- Content Wrapper. Contains page content -->

 <div class="content-wrapper">

   <!-- Content Header (Page header) -->

   <section class="content-header">

     <h1>

       Sedes

       <small>versión 1.0</small>

     </h1>

     <ol class="breadcrumb">

       <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

       <li class="active">Sedes</li>

     </ol>

   </section>



   <!-- Main content -->

   <!-- Info boxes -->

   <section class="content">

     <div class="row">

       <div class="col-xs-12">

         <div class="box">

           <?php if (isset($this->valor[0]) && $this->valor[0] > 0) {

            ?>

             <div class="alert alert-info alert-dismissible">

               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

               <h4><i class="icon fa fa-info"></i> Alerta!</h4>

              La Sede se agrego con exito

             </div>



           <?php



            } ?>

           <div class="box box-default collapsed-box">

             <div class="box-header with-border">

               <h3 class="box-title">Agregar Sede</h3>



               <div class="box-tools pull-right">

                 <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>

                 </button>

               </div>

               <!-- /.box-tools -->

             </div>

             <!-- /.box-header -->

             <div class="box-body">

               <form id="cupos-agregando" name="cupos-agregando" class="form-horizontal" method="post" action="<?php echo PATO; ?>sedes/agregando/" enctype="multipart/form-data">

                 <div class="box-body">



                 

                   <div class="form-group">

                     <label for="exampleInputEmail1">Nombre</label>

                     <input type="text" class="form-control"  name="nombre" id="nombre" placeholder="Nombre" require>

                   </div>

                   
               
                 </div>












                 <!-- /.box-body -->



                 <div class="box-footer">

                   <button type="submit" class="btn btn-primary">Agregar</button>

                 </div>

               </form>


             </div>
           </div>
           <!-- /.box-body -->





           <!-- /.box-header -->

           <div class="box-body">

             <table id="example2" class="table table-bordered table-hover">

               <thead>

                 <tr>


                   
                   <th>Nombre</th>
                  
                   <th>Editar</th>
                   <th>Eliminar</th>







                 </tr>

               </thead>

               <tbody>

                 <?php

                  $j = 1;
                  $i = 0;

                  while (!$sale->EOF) { ?>

                   <tr>


                   
                     <td><?php echo $sale->fields["nombre"]; ?></td>
                     




                     <td>

                       <button type="button" onclick="editar(<?php echo $sale->fields["id"]; ?>)" class="btn btn-success btn-flat"><i class="fa fa-edit"></i> </button>

                     </td>
                     <td>
                       <button type="button" onclick="borrarregistro(<?php echo $sale->fields["id"]; ?>)" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i> </button>



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



                   
                   <th>Nombre</th>
                   
                   <th>Editar</th>
                   <th>Eliminar</th>







                 </tr>


               </tfoot>

             </table>

           </div>

           <!-- /.box-body -->

         </div>

         <!-- /.box -->

         <script>
           function editar(id) {

             window.location.href = "<?php echo PATO; ?>sedes/editar/" + id;



           }




           function borrarregistro(id) {

             if (confirm("Realmente Desea eliminar La Sede?")) {

               $("#carga").show();

               $.ajax({
                 type: "POST",
                 url: "<?php echo PATO; ?>sedes/eliminar/" + id + "",
                 data: "ok=1",





                 success: function(datos) {

                   $("#carga").hide();


                   //alert("eliminado con exito");

                   window.location.reload();


                   //$("#carga").hide();

                   //$("#ubicacion1").html(datos);



                 }





               });

             }



           }

           $(function() {

             $('.select2').select2();

             $('#example1').DataTable()

             $('#example2').DataTable({

               'paging': true,

               'lengthChange': false,

               'searching': true,

               'ordering': true,

               'info': true,

               'autoWidth': false,
               'pageLength': 100,

             })

           })
         </script>