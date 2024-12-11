 <?php
  //print_r($_POST);
  ?>
 <!-- Content Wrapper. Contains page content -->

 <div class="content-wrapper">

   <!-- Content Header (Page header) -->

   <section class="content-header">

     <h1>

       Clientes

       <small>Versión 1.0</small>

     </h1>

     <ol class="breadcrumb">

       <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>

       <li class="active">Clientes</li>

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

               El cliente se agrego con exito

             </div>



           <?php



            } ?>

           <div class="box box-default collapsed-box">

             <div class="box-header with-border">

               <h3 class="box-title">Agregar Cliente</h3>



               <div class="box-tools pull-right">

                 <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>

                 </button>

               </div>

               <!-- /.box-tools -->

             </div>

             <!-- /.box-header -->

             <div class="box-body">

               <form id="cupos-agregando" name="cupos-agregando" class="form-horizontal" method="post" action="<?php echo PATO; ?>clientes/agregando/" enctype="multipart/form-data">

                 <div class="box-body">

                   <div class="form-group">

                     <label for="exampleInputPassword1">Estado</label>

                     <select name="estado" id="estado" class="form-control">

                       <option value="1"><?php echo __("Activo"); ?></option>

                       <option value="0"><?php echo __("Inactivo"); ?></option>



                     </select>

                   </div>

                   <!--div class="form-group">

                <label>Código:</label>



                <div class="input-group">

                  <div class="input-group-addon">

                    <i class="fa fa-address-card"></i>

                  </div>

				  <input id="codigo" name="codigo" type="text" value="" class="form-control"   data-mask>

                </div>

                             </div>-->

                   <div class="form-group">

                     <label>Nombre:</label>



                     <div class="input-group">

                       <div class="input-group-addon">

                         <i class="fa fa-laptop"></i>

                       </div>

                       <input id="nombre" name="nombre" type="text" value="" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Nombre"); ?>" />



                     </div>

                     <!-- /.input group -->

                   </div>



                   <div class="form-group">

                     <label>Tipo Documento:</label>



                     <div class="input-group">

                       <div class="input-group-addon">

                         <i class="fa fa-laptop"></i>

                       </div>

                       <select name="tipo_doc" id="tipo_doc" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor seleccione el Tipo  de documento"); ?>">

                         <option value="0"><?php echo __("Seleccione Tipo  de documento"); ?></option>

                         <option value="1"><?php echo __("CC"); ?></option>

                         <option value="2"><?php echo __("TI"); ?></option>

                         <option value="3"><?php echo __("NIT"); ?></option>

                         <option value="4"><?php echo __("TP"); ?></option>

                         <option value="5"><?php echo __("RC"); ?></option>

                       </select>
                     </div>

                     <!-- /.input group -->

                   </div>

                   <div class="form-group">

                     <label>Documento:</label>



                     <div class="input-group">

                       <div class="input-group-addon">

                         <i class="fa fa-laptop"></i>

                       </div>

                       <input id="documento" name="documento" type="text" value="" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Documento"); ?>" />
                     </div>

                     <!-- /.input group -->

                   </div>

                   <div class="form-group">

                     <label>fecha De nacimiento:</label>



                     <div class="input-group">

                       <div class="input-group-addon">

                         <i class="fa fa-calendar"></i>

                       </div>

                       <input type="date" id="nacimiento" name="nacimiento" class="form-control" value="" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>

                     </div>

                     <!-- /.input group -->

                   </div>

                   <div class="form-group">

                     <label>email:</label>



                     <div class="input-group">

                       <div class="input-group-addon">

                         <i class="fa fa-laptop"></i>

                       </div>

                       <input id="email" name="email" type="text" value="" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Email"); ?>" />
                     </div>

                     <!-- /.input group -->

                   </div>

                   <div class="form-group">

                     <label>telefono:</label>



                     <div class="input-group">

                       <div class="input-group-addon">

                         <i class="fa fa-laptop"></i>

                       </div>

                       <input id="telefono" name="telefono" type="text" value="" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Teléfono"); ?>" /> <!-- /.input group -->

                     </div>



                   </div>

                   <div class="form-group">

                     <label>Grado:</label>



                     <div class="input-group">

                       <div class="input-group-addon">

                         <i class="fa fa-laptop"></i>

                       </div>

                       <select name="grado_id" id="grado_id" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor seleccione el Grado"); ?>">

                         <option value="0" <?php if (!$sale->fields["grado_id"]) { ?> selected="selected" <?php } ?>><?php echo __("Seleccione Grado"); ?></option><?php

                                                                                                                                                                    if (!$grados->EOF) {

                                                                                                                                                                      while (!$grados->EOF) { ?>

                             <option value="<?php echo $grados->fields["id"]; ?>"><?php echo $grados->fields["nombre"]; ?></option><?php

                                                                                                                                                                        $grados->MoveNext();
                                                                                                                                                                      }

                                                                                                                                                                      $grados->Move(0);
                                                                                                                                                                    } ?>
                       </select>

                     </div>

                     <!-- /.input group -->

                   </div>

                   <div class="form-group">

                     <label>Ciudad:</label>



                     <div class="input-group">

                       <div class="input-group-addon">

                         <i class="fa fa-laptop"></i>

                       </div>

                       <input id="ciudad" name="ciudad" type="text" value="" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba la Ciudad"); ?>" />
                     </div>

                     <!-- /.input group -->

                   </div>

                   <div class="form-group">

                     <label>Dirección:</label>



                     <div class="input-group">

                       <div class="input-group-addon">

                         <i class="fa fa-laptop"></i>

                       </div>

                       <input id="direccion" name="direccion" type="text" value="" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Dirección"); ?>" />
                     </div>

                     <!-- /.input group -->

                   </div>

                   <div class="form-group">

                     <label>Compañía:</label>



                     <div class="input-group">

                       <div class="input-group-addon">

                         <i class="fa fa-laptop"></i>

                       </div>

                       <select name="compania_id" id="compania_id" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor seleccione la Compania"); ?>">

                         <option value="0"><?php echo __("Seleccione Compania"); ?></option><?php

                                                                                            if (!$companias->EOF) {

                                                                                              while (!$companias->EOF) { ?>

                             <option value="<?php echo $companias->fields["id"]; ?>"><?php echo $companias->fields["nombre"]; ?></option><?php

                                                                                                                                          $companias->MoveNext();
                                                                                                                                        }

                                                                                                                                        $companias->Move(0);
                                                                                                                                      } ?>
                       </select>
                     </div>

                     <!-- /.input group -->

                   </div>

                   <div class="form-group">

                     <label>Acudiente:</label>



                     <div class="input-group">

                       <div class="input-group-addon">

                         <i class="fa fa-laptop"></i>

                       </div>

                       <input id="acudiente" name="acudiente" type="text" value="" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Acudiente"); ?>" />
                     </div>

                     <!-- /.input group -->

                   </div>

                   <div class="form-group">

                     <label>Telefono del acudiente:</label>



                     <div class="input-group">

                       <div class="input-group-addon">

                         <i class="fa fa-laptop"></i>

                       </div>

                       <input id="telefono_acudiente" name="telefono_acudiente" type="text" value="" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Teléfono acudiente"); ?>" />
                     </div>

                     <!-- /.input group -->

                   </div>

                   <div class="form-group">

                     <label>Documento del acudiente:</label>



                     <div class="input-group">

                       <div class="input-group-addon">

                         <i class="fa fa-laptop"></i>

                       </div>

                       <input id="documento_acudiente" name="documento_acudiente" type="text" value="" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Documento acudiente"); ?>" /> <!-- /.input group -->

                     </div>







                     <!-- /.form group -->





                     <!-- /.form group -->



                   </div>





                 </div>

                 <!-- /.box-body -->



                 <div class="box-footer">

                   <button type="submit" class="btn btn-primary">Agregar</button>

                 </div>

               </form>
               <div class="box-body">
                 <form id="carga-agregando" name="carga-agregando" class="form-horizontal" method="post" action="<?php echo PATO; ?>productos/agregandomasivo/" enctype="multipart/form-data">

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

               <form action="<?php echo PATO; ?>clientes/filtrar/" method="post" name="ciudades-filtrar" id="ciudades-filtrar" class="form-inline navbar-text">



                 <div class="row">

                   <div class="col">

                     <div class="form-group">



                       <input type="text" id="nombre" placeholder="Nombre" name="nombre" value="<?php echo $_POST["nombre"]; ?>" class="form-control">

                     </div>



                     <div class="form-group">



                       <input type="text" id="codigo" placeholder="Código" name="codigo" value="<?php echo $_POST["codigo"]; ?>" class="form-control">

                     </div>

                     <!-- /.form-group -->

                     <div class="form-group">



                       <input type="text" placeholder="Documento" id="documento" name="documento" value="<?php echo $_POST["documento"]; ?>" class="form-control">

                     </div>

                     <!-- /.form-group -->





                     <div class="form-group">



                       <select class="form-control select2" name="compania_id[]" id="compania_id" multiple="multiple" data-placeholder="Compañía" style="width: 100%;">

                         <?php while (!$companias->EOF) {   ?>

                           <option value="<?php echo $companias->fields["id"]; ?>" <?php if (in_array($companias->fields["id"], $_POST["compania_id"])) { ?> selected="" <?php } ?>><?php echo $companias->fields["nombre"]; ?></option>

                         <?php $companias->MoveNext();
                          }  ?>

                       </select>

                     </div>

                     <div class="form-group">



                       <select name="estado" id="estado" class="form-control">



                         <option value="0" <?php if ($_POST["estado"] == 0) { ?> selected <?php } ?>><?php echo __("Inactivos"); ?></option>



                         <option value="1" <?php if ($_POST["estado"] == 1) { ?> selected <?php } ?>><?php echo __("Activos"); ?></option>



                       </select>

                     </div>

                     <div class="form-group">



                       <select name="especial" id="especial" class="form-control">



                         <option value="0" <?php if ($_POST["especial"] == 0) { ?> selected <?php } ?>><?php echo __("Normal"); ?></option>



                         <option value="1" <?php if ($_POST["especial"] == 1) { ?> selected <?php } ?>><?php echo __("Especial"); ?></option>



                       </select>

                     </div>
                     <div class="form-group">



                       <select name="concontrato" id="concontrato" class="form-control">
                         <option value="2" <?php if (isset($_POST["concontrato"]) and $_POST["concontrato"] == 2) { ?> selected <?php } ?>>Estado del Contrato</option>


                         <option value="1" <?php if (isset($_POST["concontrato"]) and $_POST["concontrato"] == 1) { ?> selected <?php } ?>><?php echo __("Con Contrato"); ?></option>



                         <option value="0" <?php if (isset($_POST["concontrato"]) and $_POST["concontrato"] == 0) { ?> selected <?php } ?>><?php echo __("Sin Contrato"); ?></option>



                       </select>

                     </div>
                     <div class="form-group">



                       <select name="pago" id="pago" class="form-control">
                         <option value="3" <?php if (isset($_POST["pago"]) and $_POST["pago"] == 3) { ?> selected <?php } ?>>Estado del Pago</option>

                         <option value="2" <?php if (isset($_POST["pago"]) and $_POST["pago"] == 2) { ?> selected <?php } ?>><?php echo __("Pagado"); ?></option>

                         <option value="1" <?php if (isset($_POST["pago"]) and $_POST["pago"] == 1) { ?> selected <?php } ?>><?php echo __("Pendiente Con Abono"); ?></option>



                         <option value="0" <?php if (isset($_POST["pago"]) and $_POST["pago"] == 0) { ?> selected <?php } ?>><?php echo __("Sin Pagar"); ?></option>




                       </select>

                     </div>


                     <!-- /.form-group -->



                     <div class="form-group">

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

           <!-- /.box-header -->



           <div class="box-body">

             <form action="<?php echo PATO; ?>clientes/excel" method="post" target="_blank" id="FormularioExportacion">

               <p><input type="button" onclick="exportaraexcel()" value="Exportar a excel"></p>

               <input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />

             </form>

             <table id="example2" class="table table-bordered table-hover">

               <thead>

                 <tr>

                   <th></th>

                   <th>Doc.</th>

                   <th>Nombre</th>



                   <th>Compañia</th>

                   <th>Cupo activo</th>

                   <th>Interés</th>

                   <th>Pagos Hechos</th>

                   <th>Pendiente X Pagar</th>

                   <th>Estado del cupo</th>
                   <th>Contrato</th>

                   <th>Uso de cupo</th>



                   <th>Inicio</th>

                   <th>Fin</th>

                   <!--   <th>Estado</th>-->

                   <th>accesos</th>



                   <th>Acciones</th>







                 </tr>

               </thead>

               <tbody>

                 <?php

                  $j = 1;
                  $i = 0;

                  while (!$sale->EOF) {



                    $descuento = 0;
                    $cupos = $this->obj->vercupos($sale->fields["id"]);

                    if ($sale->fields["descuento_cupo"] > 0) {
                      $descuentoval = $sale->fields["descuento_cupo"] / 100;
                      $descuento = $cupos->fields["valor"] * $descuentoval;
                    }

                    $uso = $this->obj->sumagramosclienteuso($sale->fields["id"], $cupos->fields["inicio"], $cupos->fields["fin"]);

                    $pagos = $this->obj->verpagoshechos($sale->fields["id"], $cupos->fields["id_cupo"]);

                    if ($cupos->fields["pago"] == 2) {

                      $ultimopago = $this->obj->verultimopago($sale->fields["id"], $cupos->fields["id_cupo"]);

                      $date1 = new DateTime($ultimopago->fields["fecha"]);
                    } else {

                      //$date1 = new DateTime("now");
                      $ultimopago = $this->obj->verultimopago($sale->fields["id"], $cupos->fields["id_cupo"]);
                      if (isset($ultimopago->fields["fecha"]) && $pagos->fields["pagos"] >= ($cupos->fields["valor"] - $descuento)) {
                        $date1 = new DateTime($ultimopago->fields["fecha"]);
                      } else {
                        $date1 = new DateTime("now");
                      }
                    }



                    $date2 = new DateTime($cupos->fields["fecha_limite"]);

                    $diff = $date1->diff($date2);

                    $diferencia = $diff->format('%m/%d');

                    $arr = explode("/", $diferencia);

                    $valor = 0;

                    $meses = 0;

                    $totalinteres = 0;

                    if ($date1 > $date2) {



                      //  if($cupos->fields["pago"]!=2){

                      //asigno los meses que pasaron para multiplicarlo con los intereses

                      $meses = $arr[0];



                      //si paso un dia de mas en la diferencia le sumo un mes mas

                      if ($arr[1] > 0) {

                        $meses++;
                      }

                      // will output 2 days



                      $interes = $cupos->fields["interes"] / 100;

                      $valor = ($cupos->fields["valor"] - $descuento) * $interes;

                      $totalinteres = $valor * $meses;

                      //}

                    }









                    if ($sale->fields["interes"] == 0) {

                      $totalinteres = 0;
                    }



                    if ($pagos->fields["pagos"] >= ($cupos->fields["valor"] - $descuento) && $date1 <= $date2 && $cupos->fields["pago"] != 2) {
                      $entra["pago"] = 2;
                      $this->obj->editandocupopoe($cupos->fields["id"], $entra);
                    }
                    if (((($cupos->fields["valor"] - $descuento) + $totalinteres) - $pagos->fields["pagos"]) <= 0) {

                      $entra["pago"] = 2;
                      $this->obj->editandocupopoe($cupos->fields["id"], $entra);
                    } else {
                      if ($pagos->fields["pagos"] > 0) {
                        $entra["pago"] = 1;
                        $this->obj->editandocupopoe($cupos->fields["id"], $entra);
                      }
                    }


                  ?>

                   <tr>

                     <td><?php echo $sale->fields["id"]; ?></td>
                     <td <?php if ($sale->fields["especial"] == 1) {
                            echo 'bgcolor="red"';
                          } ?>><?php echo $sale->fields["documento"]; ?></td>

                     <td><?php echo $sale->fields["nombre"]; ?></td>



                     <td><?php echo $sale->fields["companias_nombre"]; ?></td>

                     <td><?php echo $cupos->fields["cupo_nombre"];  ?>



                     </td>

                     <td> <?php echo number_format($totalinteres, 0, ',', '.'); ?> </td>

                     <td> <?php echo number_format($pagos->fields["pagos"], 0, ',', '.'); ?> </td>

                     <td> <?php echo number_format((($cupos->fields["valor"] - $descuento) + $totalinteres) - $pagos->fields["pagos"], 0, ',', '.'); ?> </td>

                     <td> <?php

                          if ($cupos->fields["cupo_nombre"] != "") {

                            if ($cupos->fields["pago"] == 0) { ?> <p style="color:red">Pendiente de pago</p><?php } ?>

                         <?php if ($cupos->fields["pago"] == 1) { ?> <p class="text-yellow">Pendiente Con Abono</p><?php } ?>

                         <?php if ($cupos->fields["pago"] == 2) { ?> <p style="color:green">Pagado</p><?php } ?>



                       <?php } ?> </td>
                     <td><?php if ($cupos->fields["concontrato"] > 0) {
                            echo "<font style='color:green'>Si</font>";
                          } else {
                            echo "<font style='color:red'>No</font>";
                          } ?></td>

                     <td><?php if ($uso->fields["total"] > 0) {
                            echo round($uso->fields["total"]);
                            echo " gr.";
                          } else {
                            echo "No";
                          }  ?>

                     </td>



                     <td><?php echo $cupos->fields["inicio"];  ?>

                     </td>

                     <td><?php echo $cupos->fields["fin"];  ?>

                     </td>



                     <!--  <td><?php if ($sale->fields["estado"] == 1) {

                                  echo "Activo";
                                }
                                if ($sale->fields["estado"] == 0) {

                                  echo "Inactivo";
                                }



                                ?>

        </td>-->

                     <td><?php echo $sale->fields["ultimo_acceso"]; ?> (<?php echo $sale->fields["num_accesos"]; ?>)</td>



                     <td>

                       <button type="button" onclick="editar(<?php echo $sale->fields["id"]; ?>)" class="btn btn-block btn-primary btn-flat">Ver</button>

                     </td>



                   </tr>

                 <?php





                    if ($j == 1) {
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

                 <th></th>
                 <th>Doc.</th>

                 <th>Nombre</th>



                 <th>Compañia</th>

                 <th>Cupo activo</th>

                 <th>Interés</th>

                 <th>Pagos Hechos</th>

                 <th>Pendiente X Pagar</th>

                 <th>Estado del cupo</th>
                 <th>Contrato</th>

                 <th>Uso de cupo</th>



                 <th>Inicio</th>

                 <th>Fin</th>

                 <!--<th>Estado</th>-->

                 <th>accesos</th>



                 <th>Acciones</th>










                 </tr>

               </tfoot>

             </table>

             <div class="box-body">



               <div class="row">

                 <div class="col">







                   <!-- /.form-group -->



                   <div class="form-group">



                     <select class="form-control" name="cupo_id" id="cupo_id" data-placeholder="Cupo" style="width: 100%;">

                       <option value="0">Seleccione el cupo</option>



                       <?php while (!$cupos1->EOF) {   ?>

                         <option value="<?php echo $cupos1->fields["id"]; ?>"><?php echo $cupos1->fields["nombre"]; ?></option>

                       <?php $cupos1->MoveNext();
                        }  ?>

                     </select>

                   </div>



                   <!-- /.form-group -->



                   <div class="form-group">

                     <button type="button" onclick="agregarmultiplecupo()" class="btn btn-primary">Agregar Cupo a los filtros seleccionados</button>

                     <button type="button" onclick="reemplazarmultiplecupo()" class="btn btn-warning">Reemplazar Cupo a los filtros seleccionados</button>

                   </div>

                   <!-- /.form-group -->

                 </div>

                 <!-- /.col -->

               </div>

               <!-- /.row -->

             </div>



             <!-- /.box-body -->

           </div>

           <!-- /.box -->

           <script>
             $('[data-toggle="push-menu"]').pushMenu('toggle');

             function editar(id) {

               window.location.href = "<?php echo PATO; ?>clientes/editar/" + id;



             }

             $(function() {

               $('.select2').select2();

               $('#example1').DataTable()

               $('#example2').DataTable({

                 'paging': true,

                 'lengthChange': true,

                 "lengthMenu": [50, 100, 200, 500, 1000, 2000],

                 'searching': false,

                 'ordering': true,

                 'info': true,

                 'autoWidth': false,

                 'pageLength': 100,



               })

             })



             function exportaraexcel() {
               window.location.href = " <?php echo PATO; ?>clientes/exportartodocliente/";
               $("#carga").hide();
               //$("#datos_a_enviar").val($("<div>").append($("#example2").eq(0).clone()).html());

               //$("#FormularioExportacion").submit();



             }

             function agregarmultiplecupo() {



               $("#carga").show();

               $.ajax({
                 type: "POST",
                 url: "<?php echo PATO; ?>clientecupo/agregandomultiple/",
                 data: $("#ciudades-filtrar").serialize() + "&cupo_id=" + $("#cupo_id").val(),





                 success: function(datos) {

                   if (datos == "ok") {



                     alert("Cupos asignados con exito");

                     $("#carga").hide();

                   }



                 }





               });



             }


             function reemplazarmultiplecupo() {



               $("#carga").show();

               $.ajax({
                 type: "POST",
                 url: "<?php echo PATO; ?>clientecupo/reemplazandomultiple/",
                 data: $("#ciudades-filtrar").serialize() + "&cupo_id=" + $("#cupo_id").val(),





                 success: function(datos) {

                   if (datos == "ok") {



                     alert("Cupos reemplazados con exito");

                     $("#carga").hide();

                   }



                 }





               });



             }
           </script>