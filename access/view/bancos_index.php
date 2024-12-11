 <!-- Content Wrapper. Contains page content -->

 <div class="content-wrapper">

   <!-- Content Header (Page header) -->

   <section class="content-header">

     <h1>

       Bancos

       <small>versión 1.0</small>

     </h1>

     <ol class="breadcrumb">

       <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

       <li class="active">Bancos</li>

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

               El Banco se agrego con exito

             </div>



           <?php



            } ?>

           <div class="box box-default collapsed-box">

             <div class="box-header with-border">

               <h3 class="box-title">Agregar Banco</h3>



               <div class="box-tools pull-right">

                 <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>

                 </button>

               </div>



             </div>



             <div class="box-body">

               <form id="cupos-agregando" name="cupos-agregando" class="form-horizontal" method="post" action="<?php echo PATO; ?>bancos/agregando/" enctype="multipart/form-data">

                 <div class="box-body">



                   <div class="form-group">

                     <label for="exampleInputEmail1">Nombre</label>

                     <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" require>

                   </div>
                   <div class="form-group">

                     <label for="exampleInputEmail1">Numero</label>

                     <input type="text" class="form-control" name="numero" id="numero" placeholder="Numero" require>

                   </div>
                   <div class="form-group">

                     <label for="exampleInputEmail1">Tipo De Cuenta</label>

                     <select name="cuenta" id="cuenta" class="form-control">
                       <option value="ahorros">ahorros</option>
                       <option value="corriente">corriente</option>
                     </select>

                   </div>
                   <div class="form-group">

                     <label for="exampleInputEmail1">Imagen</label>

                     <input type="file" class="form-control" name="foto" id="foto" placeholder="Imagen">

                   </div>








                 </div>





                 <div class="box-footer">

                   <button type="submit" class="btn btn-primary">Agregar</button>

                 </div>

               </form>

             </div>



           </div>



           <!-- /.box-header -->

           <div class="box-body">

             <table id="example2" class="table table-bordered table-hover">

               <thead>

                 <tr>

                   <th>id</th>

                   <th>Nombre</th>

                   <th>Numero</th>
                   <th>Tipo</th>
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
                     <td><?php echo $sale->fields["nombre"]; ?></td>
                     <td><?php echo $sale->fields["numero"]; ?></td>
                     <td><?php echo $sale->fields["cuenta"]; ?></td>




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

                   <th>Numero</th>

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

             window.location.href = "<?php echo PATO; ?>bancos/editar/" + id;



           }




           function borrarregistro(id) {

             if (confirm("Realmente Desea eliminar el banco?")) {

               $("#carga").show();

               $.ajax({
                 type: "POST",
                 url: "<?php echo PATO; ?>bancos/eliminar/" + id + "",
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