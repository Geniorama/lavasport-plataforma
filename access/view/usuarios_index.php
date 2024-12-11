 <!-- Content Wrapper. Contains page content -->

 <div class="content-wrapper">

   <!-- Content Header (Page header) -->

   <section class="content-header">

     <h1>

       Usuarios

       <small>versión 1.0</small>

     </h1>

     <ol class="breadcrumb">

       <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

       <li class="active">Usuarios</li>

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

               EL usuario se agrego con exito

             </div>



           <?php



            } ?>

           <div class="box box-default collapsed-box">

             <div class="box-header with-border">

               <h3 class="box-title">Agregar Usuario</h3>



               <div class="box-tools pull-right">

                 <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>

                 </button>

               </div>

               <!-- /.box-tools -->

             </div>

             <!-- /.box-header -->

             <div class="box-body">

               <form id="cupos-agregando" name="cupos-agregando" class="form-horizontal" method="post" action="<?php echo PATO; ?>usuarios/agregando/" enctype="multipart/form-data">

                 <div class="box-body">



                   <div class="form-group">

                     <label for="exampleInputEmail1">Documento</label>

                     <input type="text" class="form-control" name="documento" id="documento" placeholder="Documento" require>

                   </div>

                   <div class="form-group">

                     <label for="exampleInputEmail1">Nombre</label>

                     <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" require>

                   </div>

                   <div class="form-group">

                     <label for="exampleInputEmail1">Email</label>

                     <input type="text" class="form-control" name="email" id="email" placeholder="Email" require>

                   </div>
                   <div class="form-group">

                     <label for="exampleInputEmail1">Sexo</label>

                     <select name="sexo" id="sexo" class="form-control">
                       <option value="m">Masculino</option>
                       <option value="f">Femenino</option>
                     </select>
                   </div>
                   <div class="form-group">

                     <label for="exampleInputEmail1">Fecha de Nacimiento</label>

                     <input type="date" class="form-control" name="nacimiento" id="nacimiento" placeholder="Fecha de Nacimiento">

                   </div>
                   <div class="form-group">

                     <label for="exampleInputEmail1">Celular</label>

                     <input type="text" value="<?php echo $sale->fields["celular"]; ?>" class="form-control" name="celular" id="celular" placeholder="Telefono" require>

                   </div>
                   <div class="form-group">
                     <label for="exampleInputEmail1">Sede</label><br>
                     <select name="sede_id" disabled id="sede_id" class="form-control select2" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor seleccione la Sede"); ?>">
                       <option value="0" selected="selected"><?php echo __("Seleccione Sede"); ?></option><?php
                                                                                                          if (!$sedes->EOF) {
                                                                                                            while (!$sedes->EOF) { ?>
                           <option value="<?php echo $sedes->fields["id"]; ?>" <?php if ($sedes->fields["id"] == $_SESSION['sede']) {
                                                                                                                echo "selected";
                                                                                                              } ?>><?php echo $sedes->fields["nombre"]; ?></option><?php
                                                                                                                                                                    $sedes->MoveNext();
                                                                                                                                                                  }
                                                                                                                                                                  $sedes->Move(0);
                                                                                                                                                                } ?>
                     </select>
                   </div>
                   <div class="form-group">

                     <label for="exampleInputEmail1">Dirección</label>

                     <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Dirección">

                   </div>

                   <div class="form-group">
                     <label for="exampleInputEmail1">Comentario</label>
                     <input type="text" class="form-control" name="comentario" id="comentario" placeholder="Comentario">


                   </div>
                   <div class="form-group">

                     <label for="exampleInputEmail1">Estado</label>

                     <select name="estado" id="estado" class="form-control">
                       <option value="1">Activo</option>
                       <option value="0">Inactivo</option>
                     </select>
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


                   <th>Documento</th>
                   <th>Nombre</th>
                   <th>Email</th>
                   <th>Celular</th>
                   <th>Sede</th>
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


                     <td><?php echo $sale->fields["documento"]; ?></td>
                     <td><?php echo $sale->fields["nombre"]; ?></td>
                     <td><?php echo $sale->fields["email"]; ?></td>
                     <td><?php echo $sale->fields["celular"]; ?></td>
                     <td><?php echo $sale->fields["sedes_nombre"]; ?></td>




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



                   <th>Documento</th>
                   <th>Nombre</th>
                   <th>Email</th>
                   <th>Celular</th>
                   <th>Sede</th>
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

             window.location.href = "<?php echo PATO; ?>usuarios/editar/" + id;



           }




           function borrarregistro(id) {

             if (confirm("Realmente Desea eliminar el Usuario?")) {

               $("#carga").show();

               $.ajax({
                 type: "POST",
                 url: "<?php echo PATO; ?>usuarios/eliminar/" + id + "",
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