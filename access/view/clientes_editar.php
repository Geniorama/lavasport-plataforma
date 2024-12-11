<div class="content-wrapper">

  <!-- Content Header (Page header) -->

  <section class="content-header">

    <h1>

      Cliente

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

      <div class="col-md-6">



        <div class="box">



          <div class="box-header">

            <h3 class="box-title">Datos principales</h3>

            <div class="box-tools pull-right">

              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>

            </div>

          </div>

          <div class="box-body">

            <form id="clientes-editando" name="clientes-editando" method="post" action="<?php echo PATO; ?>clientes/editando/<?php echo $this->valor[0]; ?>/" enctype="multipart/form-data">



              <!-- Date dd/mm/yyyy -->

              <div class="form-group">

                <label>Fecha de creación:</label>



                <div class="input-group">

                  <div class="input-group-addon">

                    <i class="fa fa-calendar"></i>

                  </div>

                  <input type="text" readonly class="form-control" value="<?php echo $sale->fields["fecha"]; ?>" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>

                </div>

                <!-- /.input group -->

              </div>
              <div class="form-group">

                <label>Marquillas:</label>



                <div class="input-group">

                  <input type="text" readonly class="form-control" value="<?php echo $sale->fields["marquillas"]; ?>">

                </div>

                <!-- /.input group -->

              </div>

              <div class="form-group">

                <label for="exampleInputPassword1">Estado</label>

                <select name="estado" id="estado" class="form-control">

                  <option value="1" <?php if ($sale->fields["estado"]) { ?> selected="selected" <?php } ?>><?php echo __("Activo"); ?></option>

                  <option value="0" <?php if (!$sale->fields["estado"]) { ?> selected="selected" <?php } ?>><?php echo __("Inactivo"); ?></option>



                </select>

              </div>



              <div class="form-group">

                <label>Nombre:</label>



                <div class="input-group">

                  <div class="input-group-addon">

                    <i class="fa fa-laptop"></i>

                  </div>

                  <input id="nombre" name="nombre" type="text" value="<?php echo $sale->fields["nombre"]; ?>" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Nombre"); ?>" required />



                </div>

                <!-- /.input group -->

              </div>



              <div class="form-group">

                <label>Tipo de documento:</label>



                <div class="input-group">

                  <div class="input-group-addon">

                    <i class="fa fa-laptop"></i>

                  </div>

                  <select name="tipo_doc" id="tipo_doc" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor seleccione el Tipo  de documento"); ?>" required>

                    <option value="0" <?php if (!$sale->fields["tipo_doc"]) { ?> selected="selected" <?php } ?>><?php echo __("Seleccione Tipo  de documento"); ?></option>

                    <option value="1" <?php if ($sale->fields["tipo_doc"] == 1) { ?> selected="selected" <?php } ?>><?php echo __("CC"); ?></option>

                    <option value="2" <?php if ($sale->fields["tipo_doc"] == 2) { ?> selected="selected" <?php } ?>><?php echo __("TI"); ?></option>

                    <option value="3" <?php if ($sale->fields["tipo_doc"] == 3) { ?> selected="selected" <?php } ?>><?php echo __("NIT"); ?></option>

                    <option value="4" <?php if ($sale->fields["tipo_doc"] == 4) { ?> selected="selected" <?php } ?>><?php echo __("TP"); ?></option>

                    <option value="5" <?php if ($sale->fields["tipo_doc"] == 5) { ?> selected="selected" <?php } ?>><?php echo __("RC"); ?></option>

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

                  <input id="documento" name="documento" type="text" value="<?php echo $sale->fields["documento"]; ?>" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Documento"); ?>" required />
                </div>

                <!-- /.input group -->

              </div>

              <div class="form-group">

                <label>Fecha de nacimiento:</label>



                <div class="input-group">

                  <div class="input-group-addon">

                    <i class="fa fa-calendar"></i>

                  </div>

                  <input type="date" id="nacimiento" name="nacimiento" class="form-control" value="<?php echo $sale->fields["nacimiento"]; ?>" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>

                </div>

                <!-- /.input group -->

              </div>

              <div class="form-group">

                <label>Email:</label>



                <div class="input-group">

                  <div class="input-group-addon">

                    <i class="fa fa-laptop"></i>

                  </div>

                  <input id="email" name="email" type="text" value="<?php echo $sale->fields["email"]; ?>" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Email"); ?>" />
                </div>

                <!-- /.input group -->

              </div>

              <div class="form-group">

                <label>Telefono:</label>



                <div class="input-group">

                  <div class="input-group-addon">

                    <i class="fa fa-laptop"></i>

                  </div>

                  <input id="telefono" name="telefono" type="text" value="<?php echo $sale->fields["telefono"]; ?>" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Teléfono"); ?>" /> <!-- /.input group -->

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

                        <option value="<?php echo $grados->fields["id"]; ?>" <?php if ($grados->fields["id"] == $sale->fields["grado_id"]) { ?> selected="selected" <?php } ?>><?php echo $grados->fields["nombre"]; ?></option><?php

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

                  <input id="ciudad" name="ciudad" type="text" value="<?php echo $sale->fields["ciudad"]; ?>" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba la Ciudad"); ?>" />
                </div>

                <!-- /.input group -->

              </div>

              <div class="form-group">

                <label>Dirección:</label>



                <div class="input-group">

                  <div class="input-group-addon">

                    <i class="fa fa-laptop"></i>

                  </div>

                  <input id="direccion" name="direccion" type="text" value="<?php echo $sale->fields["direccion"]; ?>" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Dirección"); ?>" />
                </div>

                <!-- /.input group -->

              </div>

              <div class="form-group">

                <label>Compañia:</label>



                <div class="input-group">

                  <div class="input-group-addon">

                    <i class="fa fa-laptop"></i>

                  </div>

                  <select name="compania_id" id="compania_id" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor seleccione la Compania"); ?>" required>

                    <option value="0" <?php if (!$sale->fields["compania_id"]) { ?> selected="selected" <?php } ?>><?php echo __("Seleccione Compania"); ?></option><?php

                                                                                                                                                                    if (!$companias->EOF) {

                                                                                                                                                                      while (!$companias->EOF) { ?>

                        <option value="<?php echo $companias->fields["id"]; ?>" <?php if ($companias->fields["id"] == $sale->fields["compania_id"]) { ?> selected="selected" <?php } ?>><?php echo $companias->fields["nombre"]; ?></option><?php

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

                  <input id="acudiente" name="acudiente" type="text" value="<?php echo $sale->fields["acudiente"]; ?>" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Acudiente"); ?>" />
                </div>

                <!-- /.input group -->

              </div>

              <div class="form-group">

                <label>Teléfono del acudiente:</label>



                <div class="input-group">

                  <div class="input-group-addon">

                    <i class="fa fa-laptop"></i>

                  </div>

                  <input id="telefono_acudiente" name="telefono_acudiente" type="text" value="<?php echo $sale->fields["telefono_acudiente"]; ?>" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Teléfono acudiente"); ?>" />
                </div>

                <!-- /.input group -->

              </div>

              <div class="form-group">

                <label>Documento del acudiente:</label>



                <div class="input-group">

                  <div class="input-group-addon">

                    <i class="fa fa-laptop"></i>

                  </div>

                  <input id="documento_acudiente" name="documento_acudiente" type="text" value="<?php echo $sale->fields["documento_acudiente"]; ?>" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Documento acudiente"); ?>" /> <!-- /.input group -->

                </div>







                <!-- /.form group -->





                <!-- /.form group -->



              </div>

              <div class="form-group">

                <label>% Descuento Extra:</label>



                <div class="input-group">

                  <div class="input-group-addon">

                    <i class="fa -percent"></i>

                  </div>

                  <input id="descuento" max="100" name="descuento" type="number" value="<?php echo $sale->fields["descuento"]; ?>" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el descuento"); ?>" />
                </div>

                <!-- /.input group -->

              </div>

              <div class="form-group">

                <label>% Descuento Cupo:</label>



                <div class="input-group">

                  <div class="input-group-addon">

                    <i class="fa -percent"></i>

                  </div>

                  <input id="descuento_cupo" max="100" name="descuento_cupo" type="number" value="<?php echo $sale->fields["descuento_cupo"]; ?>" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el descuento"); ?>" />
                </div>

                <!-- /.input group -->

              </div>

              <div class="form-group">

                <label for="exampleInputPassword1">Cliente Especial</label>

                <select name="especial" id="especial" class="form-control">

                  <option value="1" <?php if ($sale->fields["especial"]) { ?> selected="selected" <?php } ?>><?php echo __("Si"); ?></option>

                  <option value="0" <?php if (!$sale->fields["especial"]) { ?> selected="selected" <?php } ?>><?php echo __("No"); ?></option>



                </select>

              </div>

              <div class="form-group">

                <label>Comentario Cliente especial:</label>



                <div class="input-group">

                  <div class="input-group-addon">

                    <i class="fa fa-laptop"></i>

                  </div>

                  <input id="comentario_especial" name="comentario_especial" type="text" value="<?php echo $sale->fields["comentario_especial"]; ?>" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Acudiente"); ?>" />
                </div>

                <!-- /.input group -->

              </div>

              <div class="form-group">

                <label>Aplicar Interés:</label>



                <div class="input-group">

                  <div class="input-group-addon">

                    <i class="fa fa-laptop"></i>

                  </div>

                  <select name="interes" id="interes" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>">

                    <option value="1" <?php if ($sale->fields["interes"] == 1) { ?> selected="selected" <?php } ?>>Aplicar Interés</option> <!-- /.input group -->

                    <option value="0" <?php if ($sale->fields["interes"] == 0) { ?> selected="selected" <?php } ?>>No Aplicar Interés</option>
                  </select> <!-- /.input group -->



                </div>

              </div>

              <div class="form-group">

                <button type="button" class="btn btn-secondary" onClick="window.history.back();">&nbsp;&nbsp;<?php echo __("Volver"); ?></button>

                <?php if ($_SESSION["perfil"] == 1) { ?> <button type="submit" class="btn btn-primary" data-loading-text="Verificando...">&nbsp;&nbsp;<?php echo __("Guardar"); ?></button> <?php } ?>







                <!-- /.form group -->





                <!-- /.form group -->



              </div>



              <!-- /.box-body -->

          </div>

          <!-- /.box -->







        </div>

        </form>

      </div>



      <!-- /.col (left) -->

      <div class="col-md-6">





        <!-- iCheck -->

        <div class="box">

          <div class="box-header">

            <h3 class="box-title">Cupos Asignados</h3>

            <div class="box-tools pull-right">

              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>

            </div>

          </div>

          <div class="box-body">

            <table class="table table-bordered">

              <tr>

                <th>Pago</th>

                <th>Cupo</th>

                <th>Inicio</th>

                <th>Fin</th>

                <th>uso del cupo</th>

                <th style="width: 40px">%</th>



                <th>Eliminar</th>

              </tr>





              <?php while (!$cupocliente->EOF) {



                $prodcupobj = new productocuposModel();

                $gramos = $prodcupobj->sumagramos($this->valor[0], $cupocliente->fields["inicio"], $cupocliente->fields["fin"], $cupocliente->fields["cupo_id"]);



              ?>

                <tr>

                  <td> <?php if ($cupocliente->fields["pago"] == 0) { ?> <p style="color:red">Pendiente</p><?php } ?>

                    <?php if ($cupocliente->fields["pago"] == 1) { ?> <p class="text-yellow">Pendiente Con Abono</p><?php } ?>

                    <?php if ($cupocliente->fields["pago"] == 2) { ?> <p style="color:green">Pagado</p><?php } ?>



                  </td>

                  <td><?php echo $cupocliente->fields["cupo_nombre"]; ?></td>

                  <td><?php echo $cupocliente->fields["inicio"]; ?></td>

                  <td><?php echo $cupocliente->fields["fin"]; ?></td>

                  <td>

                    <div class="progress progress-xs">

                      <div class="progress-bar progress-bar-sucess" style="width: <?php echo round(($gramos->fields["total"] * 100) / $cupocliente->fields["grm_asignados"]); ?>%"></div>

                    </div>

                  </td>

                  <td><span class="badge bg-green"><?php echo round(($gramos->fields["total"] * 100) / $cupocliente->fields["grm_asignados"]); ?>%</span></td>



                  <td>


                    <?php if ($_SESSION["perfil"] == 1) { ?>
                      <button type="button" onclick="borrarregistro(<?php echo $cupocliente->fields["id"]; ?>)" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i> </button>


                    <?php } ?>
                  </td>

                </tr>



              <?php $cupocliente->MoveNext();
              }
              $cupocliente->Move(0); ?>



            </table>

          </div>

          <div class="box">

            <div class="box-body">



              <form action="<?php echo PATO; ?>clientecupo/agregando/" method="post" name="ciudades-filtrar" id="ciudades-filtrar" class="form-inline navbar-text">



                <div class="form-group">

                  <label>Cupo:</label>



                  <div class="input-group">

                    <select class="form-control" name="cupo_id" id="cupo_id" data-placeholder="Cupo" style="width: 100%;">

                      <option value="0">Seleccione el cupo</option>



                      <?php while (!$cupos1->EOF) {   ?>

                        <option value="<?php echo $cupos1->fields["id"]; ?>"><?php echo $cupos1->fields["nombre"]; ?></option>

                      <?php $cupos1->MoveNext();
                      }  ?>

                    </select> </div>

                  <!-- /.input group -->

                </div>







                <!-- /.form-group -->



                <div class="form-group">

                  <input type="hidden" id="cliente_id" name="cliente_id" value="<?php echo $this->valor[0]; ?>">

                  <?php if ($_SESSION["perfil"] == 2) { ?>
                    <button type="submit" class="btn btn-primary">Asignar Cupo</button>
                  <?php } ?>
                </div>

                <!-- /.form-group -->

















              </form>

            </div>

          </div>

        </div>







        <div class="box">

          <div class="box-header">

            <h3 class="box-title">Pagos</h3>

            <div class="box-tools pull-right">

              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>

            </div>

          </div>

          <div class="box-body">

            <table class="table table-bordered">

              <tr>

                <th>Fecha</th>

                <th>Pago</th>

                <th>Metodo</th>

                <th>Cupo</th>

                <th>Imprimir</th>

                <th>Eliminar</th>



              </tr>





              <?php while (!$cupopago->EOF) {



              ?>

                <tr>



                  <td><?php echo $cupopago->fields["fechapago"]; ?></td>

                  <td><?php echo number_format($cupopago->fields["pago"], 0, ",", "."); ?></td>

                  <td><?php if ($cupopago->fields["metodo"] == 1) {
                        echo "Efectivo";
                      }
                      if ($cupopago->fields["metodo"] == 2) {
                        echo "Banco";
                      }  ?></td>



                  <td><?php echo $cupopago->fields["cupo"]; ?></td>

                  <td>



                    <button type="button" onclick="imprimir(<?php echo $cupopago->fields["id"]; ?>)" class="btn btn-primary btn-flat"><i class="fa fa-print"></i> </button>



                  </td>

                  <td>


                    <?php if ($_SESSION["perfil"] == 1) { ?>
                      <button type="button" onclick="borrarregistropago(<?php echo $cupopago->fields["id"]; ?>)" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i> </button>
                    <?php } ?>


                  </td>

                </tr>



              <?php $cupopago->MoveNext();
              } ?>



            </table>

          </div>

          <div class="box">

            <div class="box-body">



              <form action="<?php echo PATO; ?>clientecupo/agregandopago/" method="post" name="ciudades-filtrar" id="ciudades-filtrar" class="form-inline navbar-text">













                <div class="form-group">

                  <label>Pago:</label>

                  <div id="qpago"></div>

                  <div class="input-group">

                    <div class="input-group-addon">

                      <i>$</i>

                    </div>

                    <select name="cupo_id2" id="cupo_id2" class="form-control" onchange="mirarcuantopago()">

                      <?php while (!$cupocliente->EOF) {

                      ?>

                        <option value="<?php echo $cupocliente->fields["cupo_id"]; ?>"><?php echo $cupocliente->fields["cupo_nombre"];  ?></option>

                      <?php $cupocliente->MoveNext();
                      } ?>

                    </select>

                    <input type="number" id="pago" name="pago" require class="form-control" placeholder="Valor">



                    <select name="metodo" id="metodo" class="form-control">

                      <option value="1">Efectivo</option>

                      <option value="2">Banco</option>

                    </select>



                    <input type="datetime-local" id="fechapago" name="fechapago" value="<?php echo date("Y-m-d\TH:i:s"); ?>" class="form-control">





                  </div>

                  <!-- /.input group -->

                </div>



















                <!-- /.form-group -->

                <br>

                <br>

                <div class="form-group">

                  <input type="hidden" name="descuentov" id="descuentov" value="<?php echo $sale->fields["descuento_cupo"]; ?>">
                  <input type="hidden" id="cliente_id" name="cliente_id" value="<?php echo $this->valor[0]; ?>">

                  <button type="submit" class="btn btn-primary">Agregar Pago</button>

                </div>







                <!-- /.form-group -->

















              </form>

            </div>

          </div>

        </div>





      </div>

      <!-- /.col (right) -->

    </div>













    <!-- /.row -->

    <script>
      mirarcuantopago();

      function borrarregistro(id) {

        if (confirm("Realmente Desea eliminar el cupo?")) {

          $("#carga").show();

          $.ajax({
            type: "POST",
            url: "<?php echo PATO; ?>clientecupo/eliminar/" + id + "",
            data: "ok=1",





            success: function(datos) {

              //  $("#carga").hide();

              if (datos == 'ok') {

                //alert("eliminado con exito");

                window.location.reload();

              }

              //$("#carga").hide();

              //$("#ubicacion1").html(datos);



            }





          });

        }



      }



      function imprimir(pago) {

        if (confirm("Desea imprimir el recibo de pago? ")) {

          window.open("<?php echo PATO; ?>clientes/imprimirrecibocupo/" + pago, "Impresion", "width=10, height=10");



        }

      }



      function borrarregistropago(id) {

        if (confirm("Realmente Desea eliminar el Pago?")) {

          $("#carga").show();

          $.ajax({
            type: "POST",
            url: "<?php echo PATO; ?>clientecupo/eliminarpago/" + id + "",
            data: "ok=1",





            success: function(datos) {

              //  $("#carga").hide();

              if (datos == 'ok') {









                $.ajax({
                  type: "POST",
                  url: "<?php echo PATO; ?>clientecupo/actualizareliminada/" + $("#cupo_id2").val() + "/<?php echo $this->valor[0]; ?>",
                  data: "ok=1",





                  success: function(datos) {



                    window.location.reload();



                  }





                });



















                //alert("eliminado con exito");



              }

              //$("#carga").hide();

              //$("#ubicacion1").html(datos);



            }





          });

        }



      }



      function mirarcuantopago() {

        //   alert($("#cupo_id").val());

        $.ajax({
          type: "POST",
          url: "<?php echo PATO; ?>clientecupo/vercuantopago/" + $("#cupo_id2").val() + "/<?php echo $this->valor[0]; ?>",
          data: "descuento=<?php echo $sale->fields["descuento_cupo"]; ?>",





          success: function(datos) {



            $("#qpago").html(datos);



          }





        });





      }
    </script>