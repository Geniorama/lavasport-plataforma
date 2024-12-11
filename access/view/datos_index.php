 <!-- Content Wrapper. Contains page content -->

 <div class="content-wrapper">

   <!-- Content Header (Page header) -->

   <section class="content-header">

     <h1>

       Datos Actualizados

       <small>versión 1.0</small>

     </h1>

     <ol class="breadcrumb">

       <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

       <li class="active">Datos</li>

     </ol>

   </section>



   <!-- Main content -->

   <!-- Info boxes -->


   <div class="row">

     <div class="col-xs-12">

       <div class="box">

         <div class="box-body">
         <form action="<?php echo PATO; ?>datos/excel/" method="post" target="_blank" id="FormularioExportacion">
           <p><input type="button" onclick="exportaraexcel()" value="exportar a excel"></p>
           <input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
         </form>
           <table id="example2" class="table table-bordered table-hover">

             <thead>

               <tr>

                 <th>id</th>
                 <th>tipodoc</th>
                 <th>documento</th>
                 <th>nacimiento</th>
                 <th>primer apellido</th>
                 <th>segundo apellido</th>
                 <th>nombres</th>
                 <th>correo</th>
                 <th>telefono</th>
                 <th>Documento Acudiente</th>
                 <th>Apellido Acudiente</th>
                 <th>Segundo Apellido Acudiente</th>
                 <th>Nombre Acudiente</th>
                 <th>Correo Acudiente</th>
                 <th>Telefono Acudiente</th>
                 <th>Fecha</th>






               </tr>

             </thead>

             <tbody>

               <?php

                $j = 1;
                $i = 0;

                while (!$sale->EOF) { ?>

                 <tr>


                   <td><?php echo $sale->fields["id"]; ?></td>
                   <td><?php if ($sale->fields["tipodoc"] == 1) {
                          echo "CC";
                        }
                        if ($sale->fields["tipodoc"] == 2) {
                          echo "TI";
                        } ?></td>
                   <td><?php echo $sale->fields["documento"]; ?></td>
                   <td><?php echo $sale->fields["nacimiento"]; ?></td>
                   <td><?php echo $sale->fields["apellido1"]; ?></td>
                   <td><?php echo $sale->fields["apellido2"]; ?></td>
                   <td><?php echo $sale->fields["nombres"]; ?></td>
                   <td><?php echo $sale->fields["correo"]; ?></td>
                   <td><?php echo $sale->fields["telefono"]; ?></td>
                   <td><?php echo $sale->fields["docacudiente"]; ?></td>
                   <td><?php echo $sale->fields["apellidoacudiente"]; ?></td>
                   <td><?php echo $sale->fields["apellido2acudiente"]; ?></td>
                   <td><?php echo $sale->fields["nombresacudiente"]; ?></td>
                   <td><?php echo $sale->fields["correoacudiente"]; ?></td>
                   <td><?php echo $sale->fields["numeroacudiente"]; ?></td>
                   <td><?php echo $sale->fields["fecha"]; ?></td>

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
                 <th>tipodoc</th>
                 <th>documento</th>
                 <th>nacimiento</th>
                 <th>primer apellido</th>
                 <th>segundo apellido</th>
                 <th>nombres</th>
                 <th>correo</th>
                 <th>telefono</th>
                 <th>Documento Acudiente</th>
                 <th>Apellido Acudiente</th>
                 <th>Segundo Apellido Acudiente</th>
                 <th>Nombre Acudiente</th>
                 <th>Correo Acudiente</th>
                 <th>Telefono Acudiente</th>
                 <th>Fecha</th>







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



         function exportaraexcel() {

           $("#datos_a_enviar").val($("<div>").append($("#example2").eq(0).clone()).html());
           $("#FormularioExportacion").submit();

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

             'lengthChange': true,

             'searching': true,

             'ordering': true,

             'info': true,

             'autoWidth': false,
             'pageLength': 5000,
             'lengthMenu': [500,1000,2000,5000,10000],

           })

         })

         function ponercategoriaimp() {

           $("#categoria_impresion").val($("#categoria").val());

         }
       </script>