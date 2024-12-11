 <!-- Content Wrapper. Contains page content -->

 <div class="content-wrapper">

   <!-- Content Header (Page header) -->

   <section class="content-header">

     <h1>

       Perfiles

       <small>Versión 1.0</small>

     </h1>

     <ol class="breadcrumb">

       <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

       <li class="active">Perfiles</li>

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

               El perfil se agrego con exito

             </div>



           <?php



            } ?>

           <div class="box box-default collapsed-box">

             <div class="box-header with-border">

               <h3 class="box-title">Agregar Perfil</h3>



               <div class="box-tools pull-right">

                 <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>

                 </button>

               </div>

               <!-- /.box-tools -->

             </div>

             <!-- /.box-header -->

             <div class="box-body">

               <form id="cupos-agregando" name="cupos-agregando" class="form-horizontal" method="post" action="<?php echo PATO; ?>admins/agregandoperfil/" enctype="multipart/form-data">

                 <div class="box-body">

                   <div class="form-group">

                     <label for="exampleInputEmail1">Nombre</label>

                     <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">

                   </div>


                   <div class="form-group">

                     <label for="exampleInputPassword1">Privilegios</label>
                     <select name="privilegios[]" style="width: 100px;" id="privilegios" multiple class="form-control select2">
                       <option value="dashboard">dashboard </option>
                       <option value="noticias">Noticias </option>
                       <option value="prendas">Prendas </option>
                       <option value="cupos">Cupos</option>
                       <option value="bases">Bases Generales</option>
                       <option value="editarorden">Editar Orden</option>
                       <option value="clientes">Clientes </option>
                       <option value="ordenes">Ordenes </option>
                       <option value="reportes">Reportes </option>
                       <option value="entradaespecial">E especiales</option>
                       <option value="entradacupo">Entrada Cupo </option>
                       <option value="entradaextra">Entrada Extra</option>
                       <option value="salidas"> Salidas </option>
                       <option value="caja"> Caja </option>
                       <option value="egresos"> Egresos </option>

                     </select>
                   </div>







                   <div class="box-footer">

                     <button type="submit" class="btn btn-primary">Agregar</button>

                   </div>

               </form>

             </div>

             <!-- /.box-body -->

           </div>

           <!-- /.box-header -->


         </div>


         <!-- /.box-body -->

       </div>

       <!-- /.box -->
       <!-- /.box-header -->
       <div class="row">

         <div class="col-xs-12">

           <div class="box">

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

                         <button type="button" onclick="editar(<?php echo $sale->fields["id"]; ?>)" class="btn btn-block btn-primary btn-flat">Editar</button>
                       </td>
                       <td>
                         <button type="button" onclick="eliminar(<?php echo $sale->fields["id"]; ?>)" class="btn btn-block btn-danger btn-flat">Eliminar</button>

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
           </div>
         </div>
       </div>

       <script>
         function editar(id) {

           window.location.href = "<?php echo PATO; ?>admins/editarperfil/" + id;



         }

         function eliminar(id) {

           window.location.href = "<?php echo PATO; ?>admins/eliminarperfil/" + id;



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