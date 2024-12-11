 <!-- Content Wrapper. Contains page content -->

 <div class="content-wrapper">

   <!-- Content Header (Page header) -->

   <section class="content-header">

     <h1>

       Administradores

       <small>Versión 1.0</small>

     </h1>

     <ol class="breadcrumb">

       <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

       <li class="active">Administradores</li>

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

               El Administrador se agrego con exito

             </div>



           <?php



            } ?>

           <div class="box box-default collapsed-box">

             <div class="box-header with-border">

               <h3 class="box-title">Agregar Administrador</h3>



               <div class="box-tools pull-right">

                 <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>

                 </button>

               </div>

               <!-- /.box-tools -->

             </div>

             <!-- /.box-header -->

             <div class="box-body">

               <form id="cupos-agregando" name="cupos-agregando" class="form-horizontal" method="post" action="<?php echo PATO; ?>admins/agregando/" enctype="multipart/form-data">

                 <div class="box-body">

                   <?php if ($_SESSION['sede'] == 99) { ?>
                     <div class="form-group">
                       <label for="exampleInputEmail1">Sede</label><br>
                       <select name="sede_id" id="sede_id" class="form-control select2" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor seleccione la Sede"); ?>">
                         <option value="0" selected="selected"><?php echo __("Seleccione Sede"); ?></option><?php
                                                                                                            if (!$sedes->EOF) {
                                                                                                              while (!$sedes->EOF) { ?>
                             <option value="<?php echo $sedes->fields["id"]; ?>"><?php echo $sedes->fields["nombre"]; ?></option><?php
                                                                                                                                  $sedes->MoveNext();
                                                                                                                                }
                                                                                                                                $sedes->Move(0);
                                                                                                                              } ?>
                       </select>
                     </div>



                   <?php } ?>
                   <div class="form-group">

                     <label for="exampleInputEmail1">Nombre</label>

                     <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">

                   </div>

                   <div class="form-group">

                     <label for="exampleInputPassword1">Email</label>

                     <input type="text" class="form-control" id="email" name="email" placeholder="Email">

                   </div>

                   <div class="form-group">

                     <label for="exampleInputPassword1">Usuario</label>

                     <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario">

                   </div>

                   <div class="form-group">

                     <label for="exampleInputPassword1">Clave</label>

                     <input type="text" class="form-control" id="clave" name="clave" placeholder="Clave">

                   </div>

                   <div class="form-group">

                     <label for="exampleInputPassword1">Estado</label>

                     <select name="estado" id="estado" class="form-control">

                       <option value="1">Activo</option>

                       <option value="0">Inactivo</option>

                     </select>

                   </div>











                   <div class="box-footer">

                     <button type="submit" class="btn btn-primary">Agregar</button>

                   </div>

               </form>

               <div class="box-body">
                 <form id="carga-agregando" name="carga-agregando" class="form-horizontal" method="post" action="<?php echo PATO; ?>admins/agregandomasivo/" enctype="multipart/form-data">

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



           <!-- /.box-body -->

         </div>

         <!-- /.box -->
         <!-- /.box-header -->

         <div class="box-body">

           <table id="example2" class="table table-bordered table-hover">

             <thead>

               <tr>
                 <?php if ($_SESSION['sede'] == 99) { ?>
                   <th>Sede</th>
                 <?php } ?>
                 <th>Nombre</th>

                 <th>Email</th>

                 <th>Usuario</th>





                 <th>Estado</th>
                 <th>Acciones</th>










               </tr>

             </thead>

             <tbody>

               <?php

                $j = 1;
                $i = 0;

                while (!$sale->EOF) { ?>

                 <tr>
                   <?php if ($_SESSION['sede'] == 99) { ?>
                     <td><?php if ($sale->fields["sede_id"] == 99) {
                            echo "Todas (Administrador)";
                          } else {
                            echo $sale->fields["sede_nombre"];
                          } ?></td>
                   <?php } ?>
                   <td><?php echo $sale->fields["nombre"]; ?></td>

                   <td><?php echo $sale->fields["email"]; ?></td>

                   <td><?php echo $sale->fields["usuario"]; ?>

                   </td>





                   <td><?php if ($sale->fields["estado"] == 1) {

                          echo "Activo";
                        }
                        if ($sale->fields["estado"] == 0) {

                          echo "Inactivo";
                        }



                        ?>

                   </td>


                   <td>

                     <button type="button" onclick="editar(<?php echo $sale->fields["id"]; ?>)" class="btn btn-block btn-primary btn-flat">Editar</button>

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
                 <?php if ($_SESSION['sede'] == 99) { ?>
                   <th>Sede</th>
                 <?php } ?>
                 <th>Nombre</th>

                 <th>Email</th>

                 <th>Usuario</th>





                 <th>Estado</th>

                 <th>Acciones</th>

               </tr>

             </tfoot>

           </table>

         </div>


         <script>
           function editar(id) {

             window.location.href = "<?php echo PATO; ?>admins/editar/" + id;



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
         </script>