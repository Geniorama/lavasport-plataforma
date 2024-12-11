 <!-- Content Wrapper. Contains page content -->

 <div class="content-wrapper">

   <!-- Content Header (Page header) -->

   <section class="content-header">

     <h1>

       Escuelas

       <small>versión 1.0</small>

     </h1>

     <ol class="breadcrumb">

       <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

       <li class="active">Escuelas</li>

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

               La Escuela se agrego con exito

             </div>



           <?php



            } ?>

           <div class="box box-default collapsed-box">

             <div class="box-header with-border">

               <h3 class="box-title">Agregar Escuela</h3>



               <div class="box-tools pull-right">

                 <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>

                 </button>

               </div>

               <!-- /.box-tools -->

             </div>

             <!-- /.box-header -->

             <div class="box-body">

               <form id="cupos-agregando" name="cupos-agregando" class="form-horizontal" method="post" action="<?php echo PATO; ?>escuelas/agregando/" enctype="multipart/form-data">

                 <div class="box-body">

                   <div class="form-group">

                     <label for="exampleInputEmail1">Escuela</label>

                     <input type="text" class="form-control" name="escuela" id="escuela" placeholder="Escuela" require>

                   </div>
                   <div class="form-group">

                     <label for="exampleInputEmail1">Codigo</label>

                     <input type="text" class="form-control" name="codigo" id="codigo" placeholder="Codigo" require>

                   </div>

                   <div class="form-group">

                     <label for="exampleInputEmail1">Nombre</label>

                     <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" require>

                   </div>
                   <div class="form-group">

                     <label for="exampleInputEmail1">Dirección</label>

                     <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Dirección" require>

                   </div>
                   <div class="form-group">

                     <label for="exampleInputEmail1">Contacto</label>

                     <input type="text" class="form-control" name="contacto" id="contacto" placeholder="Contacto">

                   </div>

                   <div class="form-group">

                     <label for="exampleInputEmail1">Email</label>

                     <input type="email" class="form-control" name="email" id="email" placeholder="Email">

                   </div>
                   <div class="form-group">

                     <label for="exampleInputEmail1">Ciudad</label>

                     <input type="text" class="form-control" name="ciudad" id="ciudad" placeholder="Ciudad">

                   </div>

                   <div class="form-group">

                     <label for="exampleInputEmail1">Imagen</label>

                     <input type="file" class="form-control" name="foto" id="foto" placeholder="Imagen">

                   </div>
                   <div class="form-group">

                     <label for="exampleInputEmail1">Color</label>

                     <input type="color" class="form-control" name="color" id="color">

                   </div>








                 </div>

                 <!-- /.box-body -->



                 <div class="box-footer">

                   <button type="submit" class="btn btn-primary">Agregar</button>

                 </div>

               </form>
               <div class="box-body">
                 <form id="carga-agregando" name="carga-agregando" class="form-horizontal" method="post" action="<?php echo PATO; ?>escuelas/agregandomasivo/" enctype="multipart/form-data">

                   <div class="form-group">

                     <label for="exampleInputPassword1">Carga masiva (.csv)</label>

                     <input type="file" id="archivo" placeholder="archivo" name="archivo" class="form-control">

                   </div>

                   <!-- /.form-group -->



                   <div class="form-group">

                     <button type="submit" class="btn btn-primary">Cargar archivo CSV</button>

                   </div>

                 </form>
               </div>

             </div>

             <!-- /.box-body -->

           </div>



           <!-- /.box-header -->

           <div class="box-body">

             <table id="example2" class="table table-bordered table-hover">

               <thead>

                 <tr>

                   <th>Codigo</th>

                   <th>Nombre</th>

                   <th>Dirección</th>

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


                     <td><?php echo $sale->fields["codigo"]; ?></td>
                     <td><?php echo $sale->fields["nombre"]; ?></td>
                     <td><?php echo $sale->fields["direccion"]; ?></td>




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

                   <th>id</th>

                   <th>Nombre</th>

                   <th>Dirección</th>

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

             window.location.href = "<?php echo PATO; ?>escuelas/editar/" + id;



           }




           function borrarregistro(id) {

             if (confirm("Realmente Desea eliminar la Escuela?")) {

               $("#carga").show();

               $.ajax({
                 type: "POST",
                 url: "<?php echo PATO; ?>escuelas/eliminar/" + id + "",
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

           function ponercategoriaimp() {

             $("#categoria_impresion").val($("#categoria").val());

           }
         </script>