<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Editar Recibo
      <small>Versión 1.0</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Editar Recibo</li>
    </ol>
  </section>

  <!-- Main content -->
  <!-- Info boxes -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">

          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Editar Recibo</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form id="admins-editando" name="admins-editando" class="form-horizontal" method="post" action="<?php echo PATO; ?>facturas/editando/<?php echo $this->valor[0]; ?>/" enctype="multipart/form-data">
                <div class="box-body">
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <label for="exampleInputEmail1">Nombre</label>
                      <input type="text" class="form-control" name="nombre" value="<?php echo  $sale->fields["nombre"]; ?>" id="nombre" placeholder="Nombre">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <label for="exampleInputEmail1">Escuela</label>
                      <select onchange="verestudiante()" name="escuela_id" id="escuela_id" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor seleccione la Escuela"); ?>">
                        <option value="0" selected="selected"><?php echo __("Seleccione Escuela"); ?></option><?php
                                                                                                              if (!$escuelas->EOF) {
                                                                                                                while (!$escuelas->EOF) { ?>
                            <option value="<?php echo $escuelas->fields["id"]; ?>" <?php if ($escuelas->fields["id"] == $sale->fields["escuela_id"]) { ?> selected <?php } ?>><?php echo $escuelas->fields["nombre"]; ?></option><?php
                                                                                                                                                                                                                                  $escuelas->MoveNext();
                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                $escuelas->Move(0);
                                                                                                                                                                                                                              } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-12" id="estudiantes1">
                      <label for="exampleInputEmail1">Estudiante</label>
                      <select name="estudiante_id" id="estudiante_id" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor seleccione el Estudiante"); ?>">
                        <option value="0" selected="selected"><?php echo __("Todos"); ?></option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6">
                      <label for="exampleInputEmail1">Inicio del periodo</label>
                      <input type="date" value="<?php echo $sale->fields["inicio"]; ?>" class="form-control" name="inicio" id="inicio" placeholder="Inicio">
                    </div>
                    <div class="col-sm-6">
                      <label for="exampleInputEmail1">Fin del periodo</label>
                      <input type="date" value="<?php echo $sale->fields["fin"]; ?>" class="form-control" name="fin" id="fin" placeholder="Fin">

                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6">
                      <label for="exampleInputEmail1">Nombre del Periodo</label>
                      <input type="text" class="form-control" value="<?php echo $sale->fields["periodo"]; ?>" name="periodo" id="periodo" placeholder="Periodo">
                    </div>
                    <div class="col-sm-6">
                      <label for="exampleInputEmail1">Concepto</label>
                      <input type="text" class="form-control" value="<?php echo $sale->fields["concepto"]; ?>" name="concepto" id="concepto" placeholder="Concepto">

                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-12">
                      <legend>Cuotas</legend>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <label for="exampleInputEmail1">Permitir Cuotas?</label>
                      <select name="cuotas" class="form-control" onchange="cuotas1()" id="cuotas">
                        <option value="0" <?php if ($sale->fields["cuotas"] == 0) { ?> selected <?php } ?>>No</option>
                        <option value="1" <?php if ($sale->fields["cuotas"] == 1) { ?> selected <?php } ?>>Si</option>

                      </select>
                    </div>
                  </div>


                  <!-- <div class="form-group">
 										<label for="exampleInputEmail1">Numero de la factura</label>
 										<input type="text" class="form-control" name="numerof" id="numerof" placeholder="Numero">
									 </div> -->
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <legend>Pago Ordinario</legend>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6">
                      <label for="exampleInputEmail1">Pago Ordinario</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                        <input type="number" value="<?php echo $sale->fields["valor1"]; ?>" class="form-control" name="valor1" id="valor1" placeholder="Valor">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <label for="exampleInputEmail1">fecha Limite</label>
                      <input type="date" class="form-control" value="<?php echo $sale->fields["fecha1"]; ?>" name="fecha1" id="fecha1" placeholder="Fecha Limite">

                    </div>
                  </div>
                  <div class="col-sm-12">
                    <legend>Pago Extraordinario/Anual</legend>
                  </div>
                  <div class="form-group row" id="tituloextraordinario">
                    <div class="col-sm-12">
                      <select name="tipov2" id="tipov2" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor seleccione El Tipo de Pago"); ?>">
                        <option value="0" <?php if ($sale->fields["tipov2"] == 0) {
                                            echo "selected";
                                          } ?>><?php echo __("Pago Extraordinario"); ?></option>
                        <option value="1" <?php if ($sale->fields["tipov2"] == 1) {
                                            echo "selected";
                                          } ?>><?php echo __("Pago Anual"); ?></option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row" id="pagoextraordinario">
                    <div class="col-sm-6">
                      <label for="exampleInputEmail1">Pago Extraordinario/Anual</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                        <input type="number" value="<?php echo $sale->fields["valor2"]; ?>" class="form-control" name="valor2" id="valor2" placeholder="Valor">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <label for="exampleInputEmail1">fecha Limite</label>
                      <input type="date" value="<?php echo $sale->fields["fecha2"]; ?>" class="form-control" name="fecha2" id="fecha2" placeholder="Fecha Limite">

                    </div>
                  </div>
                  <div class="form-group row" id="tpcuotas">
                    <div class="col-sm-12">
                      <legend>Pago Cuotas</legend>
                    </div>
                  </div>
                  <div class="form-group row" id="cuo1">
                    <div class="col-sm-6">
                      <label for="exampleInputEmail1">Pago Cuota 1</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                        <input type="number" value="<?php echo $sale->fields["cuotavalor1"]; ?>" class="form-control" name="cuotavalor1" id="cuotavalor1" placeholder="Valor Cuota 1">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <label for="exampleInputEmail1">fecha Cuota 1</label>
                      <input type="date" value="<?php echo $sale->fields["cuotafecha1"]; ?>" class="form-control" name="cuotafecha1" id="cuotafecha1" placeholder="Fecha Limite Cuota 1">

                    </div>
                  </div>
                  <div class="form-group row" id="cuo2">
                    <div class="col-sm-6">
                      <label for="exampleInputEmail1">Pago Cuota 2</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                        <input type="number" value="<?php echo $sale->fields["cuotavalor2"]; ?>" class="form-control" name="cuotavalor2" id="cuotavalor2" placeholder="Valor Cuota 2">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <label for="exampleInputEmail1">fecha Cuota 2</label>
                      <input type="date" value="<?php echo $sale->fields["cuotafecha2"]; ?>" class="form-control" name="cuotafecha2" id="cuotafecha2" placeholder="Fecha Limite Cuota 2">

                    </div>
                  </div>
                  <div class="form-group row" id="cuo3">
                    <div class="col-sm-6">
                      <label for="exampleInputEmail1">Pago Cuota 3</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                        <input type="number" value="<?php echo $sale->fields["cuotavalor3"]; ?>" class="form-control" name="cuotavalor3" id="cuotavalor3" placeholder="Valor Cuota 3">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <label for="exampleInputEmail1">fecha Cuota 3</label>
                      <input type="date" value="<?php echo $sale->fields["cuotafecha3"]; ?>" class="form-control" name="cuotafecha3" id="cuotafecha3" placeholder="Fecha Limite Cuota 3">

                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <legend>Bancos</legend>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6">
                      <label for="exampleInputEmail1">Banco 1</label>
                      <select name="banco1" id="banco1" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor seleccione El Banco"); ?>">
                        <option value="0" selected="selected"><?php echo __("Seleccione Banco"); ?></option><?php
                                                                                                            if (!$bancos->EOF) {
                                                                                                              while (!$bancos->EOF) { ?>
                            <option value="<?php echo $bancos->fields["id"]; ?>" <?php if ($sale->fields["banco1"] == $bancos->fields["id"]) {
                                                                                                                  echo "selected";
                                                                                                                } ?>><?php echo $bancos->fields["nombre"]; ?></option><?php
                                                                                                                                                                      $bancos->MoveNext();
                                                                                                                                                                    }
                                                                                                                                                                    $bancos->Move(0);
                                                                                                                                                                  } ?>
                      </select>
                    </div>
                    <div class="col-sm-6">
                      <label for="exampleInputEmail1">Banco 2</label>
                      <select name="banco2" id="banco2" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor seleccione El Banco"); ?>">
                        <option value="0" selected="selected"><?php echo __("Seleccione Banco"); ?></option><?php
                                                                                                            if (!$bancos->EOF) {
                                                                                                              while (!$bancos->EOF) { ?>
                            <option value="<?php echo $bancos->fields["id"]; ?>" <?php if ($sale->fields["banco2"] == $bancos->fields["id"]) {
                                                                                                                  echo "selected";
                                                                                                                } ?>><?php echo $bancos->fields["nombre"]; ?></option><?php
                                                                                                                                                                      $bancos->MoveNext();
                                                                                                                                                                    }
                                                                                                                                                                    $bancos->Move(0);
                                                                                                                                                                  } ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-6">
                      <label for="exampleInputEmail1">Banco 3</label>
                      <select name="banco3" id="banco3" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor seleccione El Banco"); ?>">
                        <option value="0" selected="selected"><?php echo __("Seleccione Banco"); ?></option><?php
                                                                                                            if (!$bancos->EOF) {
                                                                                                              while (!$bancos->EOF) { ?>
                            <option value="<?php echo $bancos->fields["id"]; ?>" <?php if ($sale->fields["banco3"] == $bancos->fields["id"]) {
                                                                                                                  echo "selected";
                                                                                                                } ?>><?php echo $bancos->fields["nombre"]; ?></option><?php
                                                                                                                                                                      $bancos->MoveNext();
                                                                                                                                                                    }
                                                                                                                                                                    $bancos->Move(0);
                                                                                                                                                                  } ?>
                      </select>
                    </div>
                    <div class="col-sm-6">
                      <label for="exampleInputEmail1">Banco 4</label>
                      <select name="banco4" id="banco4" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor seleccione El Banco"); ?>">
                        <option value="0" selected="selected"><?php echo __("Seleccione Banco"); ?></option><?php
                                                                                                            if (!$bancos->EOF) {
                                                                                                              while (!$bancos->EOF) { ?>
                            <option value="<?php echo $bancos->fields["id"]; ?>" <?php if ($sale->fields["banco4"] == $bancos->fields["id"]) {
                                                                                                                  echo "selected";
                                                                                                                } ?>><?php echo $bancos->fields["nombre"]; ?></option><?php
                                                                                                                                                                      $bancos->MoveNext();
                                                                                                                                                                    }
                                                                                                                                                                    $bancos->Move(0);
                                                                                                                                                                  } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <label for="exampleInputEmail1">Comentario</label>
                      <input type="text" class="form-control" value="<?php echo $sale->fields["comentario"]; ?>" name="comentario" id="comentario" placeholder="Comentario">

                    </div>
                  </div>



                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                  <button type="button" class="btn btn-secondary" onClick="window.history.back();">&nbsp;&nbsp;<?php echo __("Volver"); ?></button>

                </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <script>
            cuotas1();
            verestudiante();

            function verestudiante() {

              $.ajax({
                type: "POST",
                url: "<?php echo PATO; ?>facturas/verestudiantesedit/" + $("#escuela_id").val(),
                data: "factura=<?php echo $this->valor[0]; ?>",


                success: function(datos) {
                  $("#carga").hide();
                  $("#estudiantes1").html(datos);
                  $('.select2').select2();
                  //$("#carga").hide();
                  //$("#ubicacion1").html(datos);

                }


              });

            }

            function cuotas1() {
              if ($("#cuotas").val() > 0) {
                $("#tpcuotas").show();
                $("#cuo1").show();
                $("#cuo2").show();
                $("#cuo3").show();
                $("#tituloextraordinario").hide();
                $("#pagoextraordinario").hide();

              } else {
                $("#tpcuotas").hide();
                $("#cuo1").hide();
                $("#cuo2").hide();
                $("#cuo3").hide();
                $("#tituloextraordinario").show();
                $("#pagoextraordinario").show();
              }

            }
          </script>