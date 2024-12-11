 <!-- Content Wrapper. Contains page content -->

 <div class="content-wrapper">

   <!-- Content Header (Page header) -->

   <section class="content-header">

     <h1>

       Estudiantes

       <small>versión 1.0</small>

     </h1>

     <ol class="breadcrumb">

       <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

       <li class="active">Estudiantes</li>

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

               EL Estudiante se agrego con exito

             </div>



           <?php



            } ?>

           <div class="box box-default collapsed-box">

             <div class="box-header with-border">

               <h3 class="box-title">Agregar Estudiante</h3>



               <div class="box-tools pull-right">

                 <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>

                 </button>

               </div>

               <!-- /.box-tools -->

             </div>

             <!-- /.box-header -->

             <div class="box-body">

               <form id="cupos-agregando" name="cupos-agregando" class="form-horizontal" method="post" action="<?php echo PATO; ?>estudiantes/agregando/" enctype="multipart/form-data">

                 <div class="box-body">


                   <div class="form-group">

                     <label for="exampleInputEmail1">Tipo de Documento</label>

                     <select id="tipo_doc" name="tipo_doc">
                       <option value="CC">CC</option>
                       <option value="TI">TI</option>
                       <option value="CE">CE</option>

                     </select>
                   </div>
                   <div class="form-group">

                     <label for="exampleInputEmail1">Documento</label>

                     <input type="text" class="form-control" name="documento" id="documento" placeholder="Documento" require>

                   </div>
                   <div class="form-group">

                     <label for="exampleInputEmail1">Codigo Ropero</label>

                     <input type="text" class="form-control" name="codigo_ropero" id="codigo_ropero" placeholder="Codigo Ropero" require>

                   </div>
                   <div class="form-group">

                     <label for="exampleInputEmail1">Nombre</label>

                     <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" require>

                   </div>
                   <div class="form-group">

                     <label for="exampleInputEmail1">Primer Apellido</label>

                     <input type="text" class="form-control" name="apellido1" id="apellido1" placeholder="Primer Apellido" require>

                   </div>
                   <div class="form-group">

                     <label for="exampleInputEmail1">Segundo Apellido</label>

                     <input type="text" class="form-control" name="apellido2" id="apellido2" placeholder="Segundo Apellido" require>

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

                     <input type="date" class="form-control" name="nacimiento" id="nacimiento" placeholder="Fecha de Nacimiento" require>

                   </div>
                   <div class="
                   <div class=" form-group">

                     <label for="exampleInputEmail1">Telefono</label>

                     <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Telefono" require>

                   </div>
                   <div class="form-group">
                     <label for="exampleInputEmail1">Escuela</label>
                     <select name="escuela_id" id="escuela_id" class="form-control select2" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor seleccione la Escuela"); ?>">
                       <option value="0" selected="selected"><?php echo __("Seleccione Escuela"); ?></option><?php
                                                                                                              if (!$escuelas->EOF) {
                                                                                                                while (!$escuelas->EOF) { ?>
                           <option value="<?php echo $escuelas->fields["codigo"]; ?>"><?php echo $escuelas->fields["nombre"]; ?></option><?php
                                                                                                                                          $escuelas->MoveNext();
                                                                                                                                        }
                                                                                                                                        $escuelas->Move(0);
                                                                                                                                      } ?>
                     </select>
                   </div>
                   <div class="form-group">

                     <label for="exampleInputEmail1">Curso</label>

                     <input type="text" class="form-control" name="curso" id="curso" placeholder="Curso" require>

                   </div>

                   <div class="form-group">
                     <label for="exampleInputEmail1">Compañia</label>
                     <input type="text" class="form-control" name="compania_id" id="compania_id" placeholder="Compañia" require>

                   </div>

                   <div class="form-group">
                     <label for="exampleInputEmail1">Grado</label>
                     <input type="text" class="form-control" name="grado_id" id="grado_id" placeholder="Grado" require>

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
               <div class="box-body">
                 <form target="_blank" id="carga-agregando" name="carga-agregando" class="form-horizontal" method="post" action="<?php echo PATO; ?>estudiantes/cargarmasivo/" enctype="multipart/form-data">

                   <div class="form-group">

                     <label for="exampleInputPassword1">Carga masiva (.csv) <a href="<?php echo PATO; ?>img/estudiantes.csv" target="_blank">descargar ejemplo del formato</a></label>

                     <input type="file" id="archivo" placeholder="archivo" name="archivo" class="form-control">

                   </div>

                   <!-- /.form-group -->



                   <div class="form-group">

                     <button type="submit" class="btn btn-primary">Cargar archivo CSV</button>
                     <input type="hidden" name="submit" id="submit" value="1">
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

                   <th>id</th>

                   <th>Documento</th>
                   <th>Nombre</th>
                   <th>Apellido</th>
                   <th>Grado</th>

                   <th>Escuela</th>

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


                     <td><?php echo $sale->fields["id"]; ?></td>
                     <td><?php echo $sale->fields["documento"]; ?></td>
                     <td><?php echo $sale->fields["nombre"]; ?></td>

                     <td><?php echo $sale->fields["apellido1"]; ?></td>
                     <td><?php echo $sale->fields["grado_id"]; ?></td>
                     <td><?php echo $sale->fields["escuelas_nombre"]; ?></td>



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

                   <th>Documento</th>
                   <th>Nombre</th>
                   <th>Apellido</th>
                   <th>Grado</th>

                   <th>Escuela</th>

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

             window.location.href = "<?php echo PATO; ?>estudiantes/editar/" + id;



           }




           function borrarregistro(id) {

             if (confirm("Realmente Desea eliminar la prenda?")) {

               $("#carga").show();

               $.ajax({
                 type: "POST",
                 url: "<?php echo PATO; ?>estudiantes/eliminar/" + id + "",
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