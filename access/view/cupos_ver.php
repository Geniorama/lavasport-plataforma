<div class="content-wrapper">

  <!-- Content Header (Page header) -->

  <section class="content-header">

    <h1>

      Cupos

      <small>Versión 1.0</small>

    </h1>

    <ol class="breadcrumb">

      <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>

      <li class="active">Cupos</li>

    </ol>

  </section>



  <!-- Main content -->

  <!-- Info boxes -->

  <section class="content">



    <div class="row">

      <div class="col-xs-12">

        <div class="box">

          <?php if (isset($this->valor[1]) && $this->valor[1] > 0) {

          ?>

            <div class="alert alert-info alert-dismissible">

              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

              <h4><i class="icon fa fa-info"></i> Alerta!</h4>

              El cupo se modifico con exito

            </div>



          <?php



          } ?>

          <div class="box-header">

            <h2 class="box-title"><?php echo $sale->fields["nombre"]; ?></h2>

          </div>

          <div class="box box-default collapsed-box">

            <div class="box-header with-border">

              <h3 class="box-title">Detalle del Cupo</h3>



              <div class="box-tools pull-right">

                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>

                </button>

              </div>

              <!-- /.box-tools -->

            </div>

            <!-- /.box-header -->

            <div class="box-body">

              <form id="cupos-editando" name="cupos-editando" class="form-horizontal" method="post" action="<?php echo PATO; ?>cupos/editando/<?php echo $this->valor[0]; ?>/" enctype="multipart/form-data">

                <div class="box-body">

                  <div class="form-group">

                    <label for="exampleInputEmail1">Nombre</label>

                    <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $sale->fields["nombre"]; ?>">

                  </div>

                  <div class="form-group">

                    <label for="exampleInputEmail1">Inicio</label>

                    <input type="date" class="form-control" name="inicio" id="inicio" value="<?php echo $sale->fields["inicio"]; ?>" placeholder="Inicio">

                  </div>

                  <div class="form-group">

                    <label for="exampleInputEmail1">Fin</label>

                    <input type="date" class="form-control" name="fin" id="fin" value="<?php echo $sale->fields["fin"]; ?>" placeholder="Fin">

                  </div>

                  <div class="form-group">

                    <label>Límite de pago:</label>



                    <div class="input-group">

                      <div class="input-group-addon">

                        <i class="fa fa-calendar"></i>

                      </div>

                      <input type="date" value="<?php echo $sale->fields["fecha_limite"]; ?>" id="fecha_limite" name="fecha_limite" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>

                    </div>

                    <!-- /.input group -->

                  </div>

                  <div class="form-group">

                    <label>Interes mensual por mora:</label>



                    <div class="input-group">

                      <div class="input-group-addon">

                        <i class="fa fa-percent"></i>

                      </div>

                      <input type="number" value="<?php echo $sale->fields["interes"]; ?>" id="interes" name="interes" class="form-control" data-placeholder="Interes mensual">

                    </div>

                    <!-- /.input group -->

                  </div>



                  <div class="form-group">

                    <label for="exampleInputEmail1">Gramos ilimitados</label>

                    <br>

                    <label class="radio-inline"><input type="radio" value="1" onclick="escondergramos()" name="grm_ilimitados" <?php if ($sale->fields["grm_ilimitados"] == 1) { ?> checked<?php } ?>>Si</label>

                    <label class="radio-inline"><input type="radio" value="0" onclick="mostrargramos()" name="grm_ilimitados" <?php if ($sale->fields["grm_ilimitados"] == 0) { ?> checked<?php } ?>>No</label>

                  </div>

                  <div class="form-group" id="gramosm" <?php if ($sale->fields["grm_ilimitados"] == 1) { ?> style="display:none" <?php } ?>>

                    <label for="exampleInputPassword1">Cupo (gramos)</label>

                    <input type="number" class="form-control" id="grm_asignados" name="grm_asignados" value="<?php echo $sale->fields["grm_asignados"]; ?>">

                  </div>

                  <div class="form-group">

                    <label for="exampleInputPassword1">% Descuento para extra </label>

                    <input type="number" class="form-control" id="descuento_extra" name="descuento_extra" value="<?php echo $sale->fields["descuento_extra"]; ?>">

                  </div>

                  <div class="form-group">

                    <label for="exampleInputPassword1">Entregas Mensuales</label>

                    <input type="number" class="form-control" id="num_recibidos" name="num_recibidos" value="<?php echo $sale->fields["num_recibidos"]; ?>" placeholder="Entregas Mensuales">

                  </div>

                  <div class="form-group">

                    <label for="exampleInputPassword1">Días Promesa de Entrega</label>

                    <input type="number" class="form-control" id="dias" name="dias" value="<?php echo $sale->fields["dias"]; ?>" placeholder="dias entrega">

                  </div>

                  <div class="form-group">

                    <label for="exampleInputPassword1">Valor</label>

                    <input type="number" class="form-control" id="valor" name="valor" value="<?php echo round($sale->fields["valor"]); ?>" placeholder="Valor">

                  </div>

                  <div class="form-group">

                    <label for="exampleInputPassword1">Iva</label>

                    <input type="number" class="form-control" id="iva" name="iva" value="<?php echo $sale->fields["iva"]; ?>" placeholder="Iva">

                  </div>

                  <div class="form-group">

                    <label>Contrato del Cupo:</label>



                    <div class="input-group">



                      <textarea id="texto_contrato" name="texto_contrato" rows="10" cols="120"><?php echo $sale->fields["texto_contrato"];  ?></textarea> </div>

                    <!-- /.input group -->

                  </div>



                </div>

                <!-- /.box-body -->



                <div class="box-footer">

                  <button type="submit" class="btn btn-primary">Guardar</button>

                </div>

              </form>

            </div>

            <!-- /.box-body -->

          </div>

          <!-- /.box-header -->

          <div class="box-body">



            <div>

              <form id="productocupos-agregando" name="productocupos-agregando" class="form-horizontal" method="post" action="<?php echo PATO; ?>productocupos/agregando/<?php echo $this->valor[0];  ?>" enctype="multipart/form-data">





                <select name="producto_id[]" data-width="100%" id="producto_id[]" multiple class="form-control select2" placeholder="Cod.Prod">



                  <option value="c1">CATEGORIA GRAMOS</option>

                  <option value="c2">CATEGORIA GANCHO</option>

                  <option value="c3">CATEGORIA COLCHA</option>

                  <option value="c4">CATEGORIA UNIFORME</option>

                  <?php while (!$prenda->EOF) { ?>

                    <option value="<?php echo $prenda->fields["codigo"]; ?>"><?php echo "cod: " . $prenda->fields["codigo"] . " - " . $prenda->fields["nombre"] . " - " . $prenda->fields["peso"] . " gramos"; ?></option>

                  <?php $prenda->MoveNext();
                  }
                  $prenda->Move(0); ?>

                </select>

                <select name="tipo" id="tipo" onchange="verCantidad1()" class="form-control">

                  <option value="1">Por Gramos</option>

                  <option value="2">Por Cantidad</option>
                  <option value="3">Por Valor</option>

                </select>

                <input type="number" style="display:none" name="cantidad" id="cantidad" class="form-control" placeholder="Cantidad">

                <input type="hidden" id="cupo_id" name="cupo_id" value="<?php echo $this->valor[0]; ?>">



                <!--  <button type="button" class="btn btn-secondary" onclick="volver()" ><i class="fa fa-arrow-left"></i> Volver</button> -->



                <button type="submit" class="btn btn-success">AGREGAR PRENDA</button>

              </form>



            </div>

            <table id="example2" class="table table-bordered table-hover">

              <thead>

                <tr>

                  <th>Prenda</th>



                  <th>Descuento en cupo</th>

                  <th>Cantidad</th>

                  <th>Acciones</th>





                </tr>

              </thead>

              <tbody>

                <?php

                $j = 1;
                $i = 0;

                while (!$sale2->EOF) {

                  $producto1 = $sale2->fields["producto_id"];

                  if ($sale2->fields["categoria"] == 1) {



                    $producto1 = "c" . $sale2->fields["producto_id"];
                  }

                ?>

                  <tr>

                    <td>

                      <select name="prenda<?php echo $sale2->fields["id"];  ?>" data-width="100%" id="prenda<?php echo $sale2->fields["id"];  ?>" class="form-control select2">

                        <option value="0">Seleccione Prenda o categoria</option>

                        <option value="c1" <?php if ($producto1 == "c1") { ?> selected <?php } ?>>CATEGORIA GRAMOS</option>

                        <option value="c2" <?php if ($producto1 == "c2") { ?> selected <?php } ?>>CATEGORIA GANCHO</option>

                        <option value="c3" <?php if ($producto1 == "c3") { ?> selected <?php } ?>>CATEGORIA COLCHA</option>

                        <option value="c4" <?php if ($producto1 == "c4") { ?> selected <?php } ?>>CATEGORIA UNIFORME</option>

                        <?php while (!$prenda->EOF) { ?>

                          <option value="<?php echo $prenda->fields["codigo"]; ?>" <?php if ($prenda->fields["codigo"] == $producto1) { ?> selected <?php } ?>><?php echo "cod: " . $prenda->fields["codigo"] . " - " . $prenda->fields["nombre"] . " - " . $prenda->fields["peso"] . " gramos"; ?></option>

                        <?php $prenda->MoveNext();
                        }
                        $prenda->Move(0); ?>

                      </select>

                    </td>



                    </td>



                    <td>

                      <select name="tipo<?php echo $sale2->fields["id"];  ?>" id="tipo<?php echo $sale2->fields["id"];  ?>" onchange="verCantidad(<?php echo $sale2->fields["id"];  ?>)" class="form-control">

                        <option value="1" <?php if ($sale2->fields["tipo"] == 1) { ?> selected <?php } ?>>Por Gramos</option>

                        <option value="2" <?php if ($sale2->fields["tipo"] == 2) { ?> selected <?php } ?>>Por Cantidad</option>
                        <option value="3" <?php if ($sale2->fields["tipo"] == 3) { ?> selected <?php } ?>>Por Valor</option>



                      </select>



                    </td>

                    <td><input type="text" <?php if ($sale2->fields["tipo"] == 1 or $sale2->fields["tipo"] == 3) {  ?> style="display:none" <?php } ?> name="cantidad<?php echo $sale2->fields["id"];  ?>" id="cantidad<?php echo $sale2->fields["id"];  ?>" value="<?php echo $sale2->fields["cantidad"]; ?>"></td>



                    <td>

                      <button type="button" onclick="modificar(<?php echo $sale2->fields["id"]; ?>)" class="btn btn-success btn-flat"><i class="fa fa-save"></i> </button>



                      <button type="button" onclick="borrarregistro(<?php echo $sale2->fields["id"]; ?>)" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i> </button>



                    </td>









                  </tr>

                <?php if ($j == 1) {
                    $j = 2;
                  } else {
                    $j = 1;
                  }
                  $sale2->MoveNext();
                  $i++;
                }
                $sale2->Move(0); ?>

              </tbody>

              <tfoot>

                <tr>

                  <th>Prenda</th>



                  <th>Descuento en cupo</th>

                  <th>Cantidad</th>

                  <th>Acciones</th>





                </tr>

              </tfoot>

            </table>

          </div>

          <!-- /.box-body -->

        </div>

        <!-- /.box -->

        <script>
          $(function() {

            CKEDITOR.replace("texto_contrato")
            $('.select2').select2();

            $('#example1').DataTable()

            $('#example2').DataTable({

              'paging': true,

              'lengthChange': false,

              'searching': false,

              'ordering': true,

              'info': true,

              'autoWidth': false,
              'pageLength': 100

            })

          })



          function escondergramos() {



            $("#gramosm").hide();

          }

          function mostrargramos() {



            $("#gramosm").show();

          }



          function volver() {

            window.history.back();





          }



          function borrarregistro(id) {

            if (confirm("Realmente Desea eliminar el producto ")) {

              $("#carga").show();

              $.ajax({
                type: "POST",
                url: "<?php echo PATO; ?>productocupos/eliminar/" + id + "",
                data: "ok=1",





                success: function(datos) {

                  $("#carga").hide();

                  if (datos == 'ok') {

                    alert("eliminado con exito");

                    window.location.reload();

                  }

                  //$("#carga").hide();

                  //$("#ubicacion1").html(datos);



                }





              });

            }



          }







          function modificar(id) {





            $("#carga").show();

            $.ajax({
              type: "POST",
              url: "<?php echo PATO; ?>productocupos/editando/" + id,
              data: "producto_id=" + $("#prenda" + id).val() + "&cantidad=" + $("#cantidad" + id).val() + "&tipo=" + $("#tipo" + id).val(),





              success: function(datos) {

                alert("Guardado exito");

                //window.location.reload();



                $("#carga").hide();

                //$("#ubicacion1").html(datos);



              }





            });









          }



          function verPeso(id) {

            // $("#carga").show();

            $.ajax({
              type: "POST",
              url: "<?php echo PATO; ?>productos/verpeso/" + $("#prenda" + id).val(),
              data: "ok=1",





              success: function(datos) {



                $("#peso" + id).html(datos);



                //$("#carga").hide();

              }





            });





          }



          function verCantidad(id) {



            if ($("#tipo" + id).val() == 1) {

              $("#cantidad" + id).hide();



            }
            if ($("#tipo" + id).val() == 3) {

              $("#cantidad" + id).hide();



            }

            if ($("#tipo" + id).val() == 2) {

              $("#cantidad" + id).show();

            }



          }

          function verCantidad1() {



            if ($("#tipo").val() == 1) {

              $("#cantidad").hide();



            }
            if ($("#tipo").val() == 3) {

              $("#cantidad").hide();



            }

            if ($("#tipo").val() == 2) {

              $("#cantidad").show();

            }



          }
        </script>