 <!-- Content Wrapper. Contains page content -->

 <div class="content-wrapper" id="contenido1">

     <!-- Content Header (Page header) -->

     <section class="content-header">

         <h1>

             Reporte de Pagos

             <small>Versión 1.0</small>

         </h1>

         <ol class="breadcrumb">

             <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

             <li class="active"></li>

         </ol>

     </section>



     <!-- Main content -->

     <!-- Info boxes -->

     <section class="content">

         <div class="row">

             <div class="col-xs-12">

                 <div class="box">

                     <div class="box-header">

                         <h3 class="box-title">Reporte de Pagos</h3>

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

                             <form action="<?php echo PATO; ?>pagos/filtrar/" method="post" name="ciudades-filtrar" id="ciudades-filtrar" class="form-inline navbar-text">



                                 <div class="row">

                                     <div class="col">




                                         <div class="form-group">



                                             <button type="button" class="btn btn-default pull-right" id="daterange-btn">

                                                 <span>

                                                     <i class="fa fa-calendar"></i> Rango de fechas

                                                 </span>

                                                 <i class="fa fa-caret-down"></i>

                                             </button> </div>








                                         <!-- /.form-group -->



                                         <div class="form-group">
                                             <input type="hidden" name="fecha1" <?php if (isset($_POST["fecha1"]) and $_POST["fecha1"] != "") { ?> value="<?php echo $_POST["fecha1"]; ?>" <?php } ?> id="fecha1">

                                             <input type="hidden" name="fecha2" id="fecha2" <?php if (isset($_POST["fecha2"]) and $_POST["fecha2"] != "") { ?> value="<?php echo $_POST["fecha2"]; ?>" <?php } ?>>

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

                             <div class="box-body" id="cargamasiva">
                                 <form id="carga-agregando" name="carga-agregando" class="form-horizontal" method="post" action="<?php echo PATO; ?>pagos/cargarmasivo/" enctype="multipart/form-data">

                                     <div class="form-group">

                                         <label for="exampleInputPassword1">Carga masiva (.csv)</label>

                                         <input type="file" id="archivo" placeholder="archivo" name="archivo" class="form-control">
                                         <input type="hidden" id="submit" name="submit" value="1">

                                     </div>

                                     <!-- /.form-group -->



                                     <div class="form-group">

                                         <button type="submit" class="btn btn-primary">Cargar archivo CSV</button>

                                     </div>

                                 </form>
                             </div>
                         </div>
                     </div>

                     <a href="javascript:return false;" onclick="descargarpdf()" class="btn btn-success">DESCARGAR REPORTE</a>
                     <?php if (isset($_POST["fecha2"])) { ?>


                         <div class="row">

                             <div class="col-md-6">

                                 <div class="box">

                                     <div class="box-header with-border">

                                         <h3 class="box-title">Numero de Pagos por Escuela</h3>



                                         <div class="box-tools pull-right">

                                             <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>

                                             </button>

                                             <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>

                                         </div>

                                     </div>

                                     <!-- /.box-header -->

                                     <div class="box-body no-padding">

                                         <table id="tablen1" class="table table-striped">

                                             <thead>

                                                 <tr>



                                                     <th>
                                                         Escuela
                                                     </th>

                                                     <th>Al dia</th>

                                                     <th>Deben</th>

                                                     <th>Total</th>

                                                     <th style="width: 40px">Porcentaje</th>

                                                     <th>% x

                                                     </th>


                                                 </tr>

                                             </thead>

                                             <tbody>



                                                 <?php

                                                    $aldiat = 0;

                                                    $debet = 0;

                                                    $pagadot = 0;

                                                    $pagadodebet = 0;

                                                    while (!$saleescuela->EOF) {
                                                        $facturadata = $this->obj->datosfacturaescuela($saleescuela->fields["id"], $_POST["fecha1"], $_POST["fecha2"]);
                                                        $estudiantesdata = $this->obj->traernumestudiantes($saleescuela->fields["id"]);
                                                        $pagaron = $this->obj->pagaronxescuela($saleescuela->fields["id"], $facturadata->fields["valor1"], $_POST["fecha1"], $_POST["fecha2"]);

                                                        //$deben = $this->obj->debenxescuela($saleescuela->fields["id"]);

                                                        // $platadeben = $this->obj->platadebenxescuela($saleescuela->fields["id"]);

                                                        //$platapago = $this->obj->plataxescuela($saleescuela->fields["id"]);
                                                        $pagoescuela = 0;
                                                        if ($pagaron->fields["total"] > 0) {

                                                            $pagoescuela = $pagaron->fields["total"];
                                                        }
                                                        $arrvalorescuela["" . $saleescuela->fields["codigo"]] = $pagoescuela;
                                                        $aldiat = $aldiat + $pagaron->fields["total"];
                                                        $debet = $debet + $estudiantesdata->fields["total"] - $pagaron->fields["total"];

                                                    ?>



                                                     <tr>

                                                         <td style="color:<?php echo $sale->fields["color"]; ?>"><?php echo $saleescuela->fields["codigo"];
                                                                                                                    ?></td>

                                                         <td><?php echo $pagaron->fields["total"];
                                                                ?></td>

                                                         <td><?php echo $estudiantesdata->fields["total"] - $pagaron->fields["total"];
                                                                ?></td>
                                                         <td><?php echo $estudiantesdata->fields["total"];
                                                                ?></td>

                                                         <td> <span class="progress-number"><b><?php echo round(($pagaron->fields["total"] * 100) / ($estudiantesdata->fields["total"]));
                                                                                                ?>%</span>

                                                         </td>
                                                         <td>

                                                             <div class="progress sm">

                                                                 <div class="progress-bar progress-bar-blue" style="width: <?php echo round(($pagaron->fields["total"] * 100) / ($estudiantesdata->fields["total"]));
                                                                                                                            ?>%"></div>

                                                             </div>
                                                         </td>





                                                     </tr>



                                                 <?php

                                                        // $aldiat = $aldiat + $saleescuela->fields["num"];

                                                        // $debet = $debet + $deben->fields["num"];

                                                        // $pagadot = $pagadot + $platapago->fields["num"];

                                                        // $pagadodebet = $pagadodebet + $platadeben->fields["num"];

                                                        $saleescuela->MoveNext();
                                                    }

                                                    $saleescuela->Move(0); ?>

                                                 <tr>



                                                     <td><strong>Totales</strong></td>

                                                     <td><?php echo $aldiat;
                                                            ?></td>

                                                     <td><?php echo $debet;
                                                            ?></td>

                                                     <td><?php echo $aldiat + $debet;
                                                            ?></td>

                                                     <td></td>

                                                     <td><?php // echo number_format($pagadot, 0, ",", ".") 
                                                            ?></td>



                                                 </tr>



                                             </tbody>

                                         </table>

                                     </div>

                                     <!-- /.box-body -->

                                 </div>

                             </div>

                             <div class="col-md-6">

                                 <div class="box box-default">

                                     <div class="box-header with-border">

                                         <h3 class="box-title">Numero de Pagos Por Escuela</h3>



                                         <div class="box-tools pull-right">

                                             <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>

                                             </button>

                                             <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>

                                         </div>

                                     </div>

                                     <!-- /.box-header -->

                                     <div class="box-body">

                                         <div class="row">

                                             <div class="col-md-8">

                                                 <div class="chart-responsive">

                                                     <canvas id="pieChart" height="150"></canvas>

                                                 </div>

                                                 <!-- ./chart-responsive -->

                                             </div>

                                             <!-- /.col -->

                                             <div class="col-md-4">

                                                 <ul class="chart-legend clearfix">

                                                     <?php while (!$saleescuela->EOF) { ?>

                                                         <li><i class="fa fa-circle-o " style="color:<?php echo $saleescuela->fields["color"];  ?>"></i> <?php echo $saleescuela->fields["codigo"];  ?></li>

                                                     <?php

                                                            $saleescuela->MoveNext();
                                                        }

                                                        $saleescuela->Move(0);

                                                        ?>

                                                 </ul>

                                             </div>

                                             <!-- /.col -->

                                         </div>

                                         <!-- /.row -->

                                     </div>

                                     <!-- /.box-body -->



                                 </div>

                             </div>

                         </div>

                         <!-- /.box registros ppor fuente -->
                         <div class="row">

                             <div class="col-md-6">

                                 <div class="box">
                                     <div class="box-header with-border">

                                         <h3 class="box-title">Numero de Pagos por Canales de Pago</h3>



                                         <div class="box-tools pull-right">

                                             <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>

                                             </button>

                                             <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>

                                         </div>

                                     </div>

                                     <!-- /.box-header -->

                                     <div class="box-body no-padding">

                                         <table id="tablen2" class="table table-striped">

                                             <thead>

                                                 <tr>



                                                     <th>
                                                         Escuela
                                                     </th>

                                                     <?php while (!$salebancos->EOF) { ?>
                                                         <th>
                                                             <?php echo $salebancos->fields["nombre"];  ?>
                                                         </th>
                                                     <?php
                                                            $salebancos->MoveNext();
                                                        }
                                                        $salebancos->Move(0); ?>
                                                 </tr>

                                             </thead>

                                             <tbody>



                                                 <?php



                                                    while (!$saleescuela->EOF) {


                                                    ?>



                                                     <tr>

                                                         <td><?php echo $saleescuela->fields["codigo"];
                                                                ?></td>
                                                         <?php while (!$salebancos->EOF) {
                                                                $cantidadbanco = $this->obj->datosbancoescuela($saleescuela->fields["id"], $salebancos->fields["id"], $_POST["fecha1"], $_POST["fecha2"]);
                                                                $arrbancos[$salebancos->fields["id"]] += $cantidadbanco->fields["total"];
                                                            ?>
                                                             <td>
                                                                 <?php echo $cantidadbanco->fields["total"];  ?>
                                                             </td>
                                                         <?php
                                                                $salebancos->MoveNext();
                                                            }
                                                            $salebancos->Move(0); ?>


                                                     </tr>



                                                 <?php

                                                        // $aldiat = $aldiat + $saleescuela->fields["num"];

                                                        // $debet = $debet + $deben->fields["num"];

                                                        // $pagadot = $pagadot + $platapago->fields["num"];

                                                        // $pagadodebet = $pagadodebet + $platadeben->fields["num"];

                                                        $saleescuela->MoveNext();
                                                    }

                                                    $saleescuela->Move(0); ?>

                                                 <tr>



                                                     <td><strong>Totales</strong></td>

                                                     <?php while (!$salebancos->EOF) {
                                                        ?>
                                                         <td>
                                                             <?php echo $arrbancos[$salebancos->fields["id"]];  ?>
                                                         </td>
                                                     <?php
                                                            $salebancos->MoveNext();
                                                        }
                                                        $salebancos->Move(0); ?>





                                                 </tr>



                                             </tbody>

                                         </table>

                                     </div>

                                     <!-- /.box-body -->

                                 </div>

                             </div>

                             <div class="col-md-6">

                                 <div class="box box-default">

                                     <div class="box-header with-border">

                                         <h3 class="box-title">Canales de Pago</h3>



                                         <div class="box-tools pull-right">

                                             <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>

                                             </button>

                                             <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>

                                         </div>

                                     </div>

                                     <!-- /.box-header -->

                                     <div class="box-body">

                                         <div class="row">

                                             <div class="col-md-8">

                                                 <div class="chart-responsive">

                                                     <canvas id="pieChart2" height="150"></canvas>

                                                 </div>

                                                 <!-- ./chart-responsive -->

                                             </div>

                                             <!-- /.col -->

                                             <div class="col-md-4">

                                                 <ul class="chart-legend clearfix">

                                                     <?php while (!$salebancos->EOF) { ?>

                                                         <li><i class="fa fa-circle-o " style="color:<?php echo $salebancos->fields["color"];  ?>"></i> <?php echo $salebancos->fields["nombre"];  ?></li>

                                                     <?php

                                                            $salebancos->MoveNext();
                                                        }

                                                        $salebancos->Move(0);

                                                        ?>

                                                 </ul>

                                             </div>

                                             <!-- /.col -->

                                         </div>

                                         <!-- /.row -->

                                     </div>

                                     <!-- /.box-body -->



                                 </div>

                             </div>

                         </div>

                         <!-- /.box registros ppor pagos dinero -->
                         <div class="row">

                             <div class="col-md-6">

                                 <div class="box">
                                     <div class="box-header with-border">

                                         <h3 class="box-title">Pagos por Escuela ($)</h3>



                                         <div class="box-tools pull-right">

                                             <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>

                                             </button>

                                             <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>

                                         </div>

                                     </div>

                                     <!-- /.box-header -->

                                     <div class="box-body no-padding">

                                         <table id="tablen3" class="table table-striped">

                                             <thead>

                                                 <tr>



                                                     <th>
                                                         Escuela
                                                     </th>

                                                     <th>
                                                         Pagos ($)
                                                     </th>
                                                 </tr>

                                             </thead>

                                             <tbody>



                                                 <?php



                                                    while (!$saleescuela->EOF) {
                                                        $pagoscompelto = $this->obj->pagaronxescuelaprecios($saleescuela->fields["id"], $_POST["fecha1"], $_POST["fecha2"]);
                                                        $pago = 0;
                                                        if (isset($pagoscompelto->fields["total"]) && $pagoscompelto->fields["total"] > 0) {
                                                            $pago = $pagoscompelto->fields["total"];
                                                        }
                                                        $arrvalorcompletoesc[$saleescuela->fields["codigo"]] = $pago;
                                                    ?>



                                                     <tr>

                                                         <td><?php echo $saleescuela->fields["codigo"];
                                                                ?></td>

                                                         <td><?php echo number_format($pagoscompelto->fields["total"], 0, ',', '.');
                                                                ?></td>



                                                     </tr>



                                                 <?php

                                                        // $aldiat = $aldiat + $saleescuela->fields["num"];

                                                        // $debet = $debet + $deben->fields["num"];

                                                        // $pagadot = $pagadot + $platapago->fields["num"];

                                                        // $pagadodebet = $pagadodebet + $platadeben->fields["num"];

                                                        $saleescuela->MoveNext();
                                                    }

                                                    $saleescuela->Move(0); ?>

                                                 <tr>



                                                     <td><strong>Total</strong></td>

                                                     <td><?php echo  number_format(array_sum($arrvalorcompletoesc), 0, ',', '.'); ?></td>



                                                 </tr>



                                             </tbody>

                                         </table>

                                     </div>

                                     <!-- /.box-body -->

                                 </div>

                             </div>

                             <div class="col-md-6">

                                 <div class="box box-default">

                                     <div class="box-header with-border">

                                         <h3 class="box-title">Pagos por Escuela ($)</h3>



                                         <div class="box-tools pull-right">

                                             <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>

                                             </button>

                                             <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>

                                         </div>

                                     </div>

                                     <!-- /.box-header -->

                                     <div class="box-body">

                                         <div class="row">

                                             <div class="col-md-8">

                                                 <div class="chart-responsive">

                                                     <canvas id="pieChart3" height="150"></canvas>

                                                 </div>

                                                 <!-- ./chart-responsive -->

                                             </div>

                                             <!-- /.col -->

                                             <div class="col-md-4">

                                                 <ul class="chart-legend clearfix">

                                                     <?php while (!$saleescuela->EOF) { ?>

                                                         <li><i class="fa fa-circle-o " style="color:<?php echo $saleescuela->fields["color"];  ?>"></i> <?php echo $saleescuela->fields["codigo"];  ?></li>

                                                     <?php

                                                            $saleescuela->MoveNext();
                                                        }

                                                        $saleescuela->Move(0);

                                                        ?>

                                                 </ul>

                                             </div>

                                             <!-- /.col -->

                                         </div>

                                         <!-- /.row -->

                                     </div>

                                     <!-- /.box-body -->



                                 </div>

                             </div>

                         </div>
                         <!--pagos --->
                         <div class="row">

                             <div class="col-md-12">

                                 <div class="box">

                                     <div class="box-header with-border">

                                         <h3 class="box-title">Numero de pagos por Cifras</h3>



                                         <div class="box-tools pull-right">

                                             <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>

                                             </button>

                                             <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>

                                         </div>

                                     </div>

                                     <!-- /.box-header -->

                                     <div class="box-body no-padding">

                                         <table id="tablen4" class="table table-striped">

                                             <thead>

                                                 <tr>



                                                     <th>
                                                         Escuela
                                                     </th>
                                                     <?php while (!$salecifras->EOF) { ?>
                                                         <th><?php echo number_format($salecifras->fields["valor"], 0, ',', '.');  ?></th>
                                                     <?php $salecifras->MoveNext();
                                                        }
                                                        $salecifras->Move(0); ?>



                                                 </tr>

                                             </thead>

                                             <tbody>



                                                 <?php



                                                    while (!$saleescuela->EOF) {

                                                        //$deben = $this->obj->debenxescuela($saleescuela->fields["id"]);

                                                        // $platadeben = $this->obj->platadebenxescuela($saleescuela->fields["id"]);

                                                        //$platapago = $this->obj->plataxescuela($saleescuela->fields["id"]);

                                                    ?>



                                                     <tr>
                                                         <td><?php echo $saleescuela->fields["codigo"];  ?></td>
                                                         <?php while (!$salecifras->EOF) {
                                                                $pagaron = $this->obj->cifraxescuela($saleescuela->fields["id"], $salecifras->fields["valor"], $_POST["fecha1"], $_POST["fecha2"]);
                                                                $arrconteo[$salecifras->fields["valor"]] += $pagaron->fields["total"];
                                                            ?>
                                                             <td><?php echo $pagaron->fields["total"];  ?></td>
                                                         <?php $salecifras->MoveNext();
                                                            }
                                                            $salecifras->Move(0); ?>





                                                     </tr>



                                                 <?php

                                                        // $aldiat = $aldiat + $saleescuela->fields["num"];

                                                        // $debet = $debet + $deben->fields["num"];

                                                        // $pagadot = $pagadot + $platapago->fields["num"];

                                                        // $pagadodebet = $pagadodebet + $platadeben->fields["num"];

                                                        $saleescuela->MoveNext();
                                                    }

                                                    $saleescuela->Move(0); ?>

                                                 <tr>



                                                     <td><strong>Totales</strong></td>
                                                     <?php while (!$salecifras->EOF) {

                                                        ?>
                                                         <td><?php echo $arrconteo[$salecifras->fields["valor"]];  ?></td>
                                                     <?php $salecifras->MoveNext();
                                                        }
                                                        $salecifras->Move(0); ?>



                                                 </tr>



                                             </tbody>

                                         </table>

                                     </div>

                                     <!-- /.box-body -->

                                 </div>

                             </div>



                         </div>


                         <div class="row">


                             <div class="col-md-12">

                                 <div class="box box-default">

                                     <div class="box-header with-border">

                                         <h3 class="box-title">Pagos por Escuela ($)</h3>



                                         <div class="box-tools pull-right">

                                             <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>

                                             </button>

                                             <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>

                                         </div>

                                     </div>

                                     <!-- /.box-header -->

                                     <div class="box-body">

                                         <div class="row">

                                             <div class="col-md-12">

                                                 <div class="chart-responsive">
                                                     <canvas id="barChart"></canvas>
                                                 </div>

                                                 <!-- ./chart-responsive -->

                                             </div>

                                             <!-- /.col -->


                                             <!-- /.col -->

                                         </div>

                                         <!-- /.row -->

                                     </div>

                                     <!-- /.box-body -->



                                 </div>

                             </div>

                         </div>


                         <div class="row">

                             <div class="col-md-12">

                                 <div class="box">

                                     <div class="box-header with-border">

                                         <h3 class="box-title">Pagos Totales por Estudiantes</h3>



                                         <div class="box-tools pull-right">

                                             <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>

                                             </button>

                                             <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>

                                         </div>

                                     </div>

                                     <!-- /.box-header -->

                                     <div class="box-body no-padding">

                                         <table id="example21" class="table table-bordered table-hover">

                                             <thead>

                                                 <tr>
                                                     <th>Escuela</th>
                                                     <th>Documento</th>
                                                     <th>Estudiante</th>



                                                     <th>Pagado</th>
                                                     <th>falta por pagar</th>

                                                     <th>Total</th>

                                                     <th>Fecha</th>



                                                 </tr>

                                             </thead>

                                             <tbody>

                                                 <?php



                                                    while (!$saleagrupado->EOF) {
                                                        $pagovalor = $this->obj->vervalorpago($saleagrupado->fields["id_escuela"], $saleagrupado->fields["fecha"]);

                                                        $fecha = new DateTime($saleagrupado->fields["fecha"]);
                                                        $fecha1   = new DateTime($pagovalor->fields["fecha1"]);
                                                        $fecha2  = new DateTime($pagovalor->fields["fecha2"]);
                                                        $fecha3   = new DateTime($pagovalor->fields["fecha3"]);
                                                        $fecha4   = new DateTime($pagovalor->fields["fecha4"]);
                                                        if ($fecha <= $fecha1) {
                                                            $apagar = $pagovalor->fields["valor1"];
                                                        }
                                                        if ($fecha <= $fecha2 && $fecha > $fecha1) {
                                                            $apagar = $pagovalor->fields["valor2"];
                                                        }
                                                        if ($fecha <= $fecha3 && $fecha > $fecha2) {
                                                            $apagar = $pagovalor->fields["valor3"];
                                                        }
                                                        if ($fecha <= $fecha4 && $fecha > $fecha3) {
                                                            $apagar = $pagovalor->fields["valor4"];
                                                        }
                                                    ?>

                                                     <tr>
                                                         <td style="color:<?php echo $saleagrupado->fields["color"]; ?>"><?php echo $saleagrupado->fields["nombre_escuela"]; ?></td>
                                                         <td><?php echo $saleagrupado->fields["documento"]; ?></td>
                                                         <td><?php echo $saleagrupado->fields["estudiantes_nombre"]; ?></td>


                                                         <td><?php echo number_format($saleagrupado->fields["valor"], 0, ',', '.'); ?></td>
                                                         <td><?php echo number_format($apagar - $saleagrupado->fields["valor"], 0, ',', '.'); // echo number_format($sale->fields["valor"], 0, ',', '.'); 
                                                                ?></td>
                                                         <td><?php echo number_format(($apagar - $saleagrupado->fields["valor"]) + $saleagrupado->fields["valor"], 0, ',', '.');
                                                                ?></td>
                                                         <td><?php echo $saleagrupado->fields["fecha"]; ?></td>




                                                     </tr>

                                                 <?php
                                                        $saleagrupado->MoveNext();
                                                    }
                                                    $saleagrupado->Move(0); ?>

                                             </tbody>

                                             <tfoot>

                                                 <tr>

                                                 <tr>
                                                     <th>Escuela</th>
                                                     <th>Estudiante</th>



                                                     <th>Pagado</th>
                                                     <th>falta por pagar</th>

                                                     <th>Total</th>

                                                     <th>Fecha</th>



                                                 </tr>












                                                 </tr>

                                             </tfoot>

                                         </table>

                                     </div>

                                     <!-- /.box-body -->

                                 </div>

                             </div>



                         </div>








                         <div class="box-body">

                             <table id="example2" class="table table-bordered table-hover">

                                 <thead>

                                     <tr>
                                         <th>Escuela</th>
                                         <th>Documento</th>

                                         <th>Estudiante</th>

                                         <th>Canal de Pago</th>

                                         <th>Valor</th>

                                         <th>Fecha</th>



                                     </tr>

                                 </thead>

                                 <tbody>

                                     <?php



                                        while (!$sale->EOF) { ?>

                                         <tr>
                                             <td style="color:<?php echo $sale->fields["color"]; ?>"><?php echo $sale->fields["nombre_escuela"]; ?></td>
                                             <td><?php echo $sale->fields["documento"]; ?></td>
                                             <td><?php echo $sale->fields["estudiantes_nombre"]; ?></td>
                                             <td><?php echo $sale->fields["nombre_banco"]; ?></td>
                                             <td><?php echo number_format($sale->fields["valor"], 0, ',', '.'); ?></td>
                                             <td><?php echo $sale->fields["fecha"]; ?></td>




                                         </tr>

                                     <?php
                                            $sale->MoveNext();
                                        }
                                        $sale->Move(0); ?>

                                 </tbody>

                                 <tfoot>

                                     <tr>


                                     <tr>
                                         <th>Escuela</th>
                                         <th>Estudiante</th>

                                         <th>Canal de Pago</th>

                                         <th>Valor</th>

                                         <th>Fecha</th>



                                     </tr>












                                     </tr>

                                 </tfoot>

                             </table>

                         </div>


                     <?php } ?>
                     <!-- /.box-body -->

                 </div>

                 <!-- /.box -->

                 <!-- /.modal -->

                 <script>
                     $("#tablen1").tableExport({
                         formats: ["xlsx", "txt", "csv"], //Tipo de archivos a exportar ("xlsx","txt", "csv", "xls")
                         position: 'button', // Posicion que se muestran los botones puedes ser: (top, bottom)
                         bootstrap: false, //Usar lo estilos de css de bootstrap para los botones (true, false)
                         fileName: "pagosporescuela", //Nombre del archivo 
                     });
                     $("#tablen2").tableExport({
                         formats: ["xlsx", "txt", "csv"], //Tipo de archivos a exportar ("xlsx","txt", "csv", "xls")
                         position: 'button', // Posicion que se muestran los botones puedes ser: (top, bottom)
                         bootstrap: false, //Usar lo estilos de css de bootstrap para los botones (true, false)
                         fileName: "canalesdepago", //Nombre del archivo 
                     });
                     $("#tablen3").tableExport({
                         formats: ["xlsx", "txt", "csv"], //Tipo de archivos a exportar ("xlsx","txt", "csv", "xls")
                         position: 'button', // Posicion que se muestran los botones puedes ser: (top, bottom)
                         bootstrap: false, //Usar lo estilos de css de bootstrap para los botones (true, false)
                         fileName: "dineroporescuela", //Nombre del archivo 
                     });
                     $("#tablen4").tableExport({
                         formats: ["xlsx", "txt", "csv"], //Tipo de archivos a exportar ("xlsx","txt", "csv", "xls")
                         position: 'button', // Posicion que se muestran los botones puedes ser: (top, bottom)
                         bootstrap: false, //Usar lo estilos de css de bootstrap para los botones (true, false)
                         fileName: "numeropagosporcifra", //Nombre del archivo 
                     });
                     $("#example21").tableExport({
                         formats: ["xlsx", "txt", "csv"], //Tipo de archivos a exportar ("xlsx","txt", "csv", "xls")
                         position: 'button', // Posicion que se muestran los botones puedes ser: (top, bottom)
                         bootstrap: false, //Usar lo estilos de css de bootstrap para los botones (true, false)
                         fileName: "pagospendientes", //Nombre del archivo 
                     });
                     $('[data-toggle="push-menu"]').pushMenu('toggle');

                     $('#example2').DataTable({

                         'paging': true,

                         'lengthChange': false,

                         'searching': true,

                         'ordering': true,

                         'info': true,

                         'autoWidth': false,
                         'pageLength': 10,

                     })

                     $('#example21').DataTable({

                         'paging': true,

                         'lengthChange': false,

                         'searching': true,

                         'ordering': true,

                         'info': true,

                         'autoWidth': false,
                         'pageLength': 10,

                     })





                     $('#daterange-btn').daterangepicker(

                         {

                             ranges: {

                                 'Hoy': [moment(), moment()],

                                 'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],

                                 'Ultimos 7 dias': [moment().subtract(6, 'days'), moment()],

                                 'Ultimos 30 dias': [moment().subtract(29, 'days'), moment()],

                                 'Este mes': [moment().startOf('month'), moment().endOf('month')],

                                 'Mes pasado': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]

                             },



                             <?php if (isset($_POST["fecha1"]) and $_POST["fecha1"] != "") {



                                    $newDate = date("m/d/Y", strtotime($_POST["fecha1"]));

                                    $newDate2 = date("m/d/Y", strtotime($_POST["fecha2"]));

                                ?>

                                 startDate: "<?php echo  $newDate; ?>",

                                 endDate: "<?php echo  $newDate2; ?>"



                             <?php } else {

                                    echo " startDate: moment().subtract(29, 'days'),  endDate  : moment()";
                                } ?>





                         },

                         function(start, end) {



                             $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))



                             $("#fecha1").val(start.format('YYYY-MM-DD'));

                             $("#fecha2").val(end.format('YYYY-MM-DD'));

                         }

                     );

                     <?php if (isset($_POST["fecha1"]) and $_POST["fecha1"] != "") { ?>

                         $('#daterange-btn span').html('<?php echo date('d-M-Y', strtotime($_POST["fecha1"])); ?> - <?php echo date('d-M-Y', strtotime($_POST["fecha2"])); ?>');

                     <?php } else { ?>

                         $('#daterange-btn span').html('<span><i class="fa fa-calendar"></i> Rango de fechas</span>');

                     <?php } ?>



                     <?php if (isset($_POST["fecha1"])) { ?>

                         var pieChartCanvas = $('#pieChart').get(0).getContext('2d');

                         var pieChart = new Chart(pieChartCanvas);

                         var PieData = [



                             <?php while (!$saleescuela->EOF) { ?>

                                 {

                                     value: <?php echo  $arrvalorescuela["" . $saleescuela->fields["codigo"]]; ?>,

                                     color: '<?php echo $saleescuela->fields["color"]; ?>',

                                     highlight: '<?php echo $saleescuela->fields["color"]; ?>',

                                     label: '<?php echo $saleescuela->fields["codigo"]; ?>'

                                 },
                             <?php

                                    $saleescuela->MoveNext();
                                }

                                $saleescuela->Move(0);

                                ?>

                         ];

                         var pieOptions = {

                             // Boolean - Whether we should show a stroke on each segment

                             segmentShowStroke: true,

                             // String - The colour of each segment stroke

                             segmentStrokeColor: '#fff',

                             // Number - The width of each segment stroke

                             segmentStrokeWidth: 1,

                             // Number - The percentage of the chart that we cut out of the middle

                             percentageInnerCutout: 50, // This is 0 for Pie charts

                             // Number - Amount of animation steps

                             animationSteps: 100,

                             // String - Animation easing effect

                             animationEasing: 'easeOutBounce',

                             // Boolean - Whether we animate the rotation of the Doughnut

                             animateRotate: true,

                             // Boolean - Whether we animate scaling the Doughnut from the centre

                             animateScale: false,

                             // Boolean - whether to make the chart responsive to window resizing

                             responsive: true,

                             // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container

                             maintainAspectRatio: false,

                             // String - A legend template

                             legendTemplate: '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<segments.length; i++){%><li><span style=\'background-color:<%=segments[i].fillColor%>\'></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>',

                             // String - A tooltip template

                             tooltipTemplate: '<%=value %> <%=label%>'

                         };

                         // Create pie or douhnut chart

                         // You can switch between pie and douhnut using the method below.

                         pieChart.Doughnut(PieData, pieOptions);








                         //pie chart2

                         var pieChartCanvas2 = $('#pieChart2').get(0).getContext('2d');

                         var pieChart2 = new Chart(pieChartCanvas2);

                         var PieData2 = [



                             <?php while (!$salebancos->EOF) { ?>

                                 {

                                     value: <?php echo  $arrbancos["" . $salebancos->fields["id"]]; ?>,

                                     color: '<?php echo $salebancos->fields["color"]; ?>',

                                     highlight: '<?php echo $salebancos->fields["color"]; ?>',

                                     label: '<?php echo $salebancos->fields["nombre"]; ?>'

                                 },
                             <?php

                                    $salebancos->MoveNext();
                                }

                                $salebancos->Move(0);

                                ?>

                         ];

                         var pieOptions = {

                             // Boolean - Whether we should show a stroke on each segment

                             segmentShowStroke: true,

                             // String - The colour of each segment stroke

                             segmentStrokeColor: '#fff',

                             // Number - The width of each segment stroke

                             segmentStrokeWidth: 1,

                             // Number - The percentage of the chart that we cut out of the middle

                             percentageInnerCutout: 50, // This is 0 for Pie charts

                             // Number - Amount of animation steps

                             animationSteps: 100,

                             // String - Animation easing effect

                             animationEasing: 'easeOutBounce',

                             // Boolean - Whether we animate the rotation of the Doughnut

                             animateRotate: true,

                             // Boolean - Whether we animate scaling the Doughnut from the centre

                             animateScale: false,

                             // Boolean - whether to make the chart responsive to window resizing

                             responsive: true,

                             // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container

                             maintainAspectRatio: false,

                             // String - A legend template

                             legendTemplate: '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<segments.length; i++){%><li><span style=\'background-color:<%=segments[i].fillColor%>\'></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>',

                             // String - A tooltip template

                             tooltipTemplate: '<%=value %> <%=label%>'

                         };

                         // Create pie or douhnut chart

                         // You can switch between pie and douhnut using the method below.

                         pieChart2.Doughnut(PieData2, pieOptions);


                         //pie chart 3

                         var pieChartCanvas3 = $('#pieChart3').get(0).getContext('2d');

                         var pieChart3 = new Chart(pieChartCanvas3);

                         var PieData3 = [



                             <?php while (!$saleescuela->EOF) { ?>

                                 {

                                     value: <?php echo $arrvalorcompletoesc[$saleescuela->fields["codigo"]]; ?>,

                                     color: '<?php echo $saleescuela->fields["color"]; ?>',

                                     highlight: '<?php echo $saleescuela->fields["color"]; ?>',

                                     label: '<?php echo $saleescuela->fields["codigo"]; ?>'

                                 },
                             <?php

                                    $saleescuela->MoveNext();
                                }

                                $saleescuela->Move(0);

                                ?>

                         ];

                         var pieOptions = {

                             // Boolean - Whether we should show a stroke on each segment

                             segmentShowStroke: true,

                             // String - The colour of each segment stroke

                             segmentStrokeColor: '#fff',

                             // Number - The width of each segment stroke

                             segmentStrokeWidth: 1,

                             // Number - The percentage of the chart that we cut out of the middle

                             percentageInnerCutout: 50, // This is 0 for Pie charts

                             // Number - Amount of animation steps

                             animationSteps: 100,

                             // String - Animation easing effect

                             animationEasing: 'easeOutBounce',

                             // Boolean - Whether we animate the rotation of the Doughnut

                             animateRotate: true,

                             // Boolean - Whether we animate scaling the Doughnut from the centre

                             animateScale: false,

                             // Boolean - whether to make the chart responsive to window resizing

                             responsive: true,

                             // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container

                             maintainAspectRatio: false,

                             // String - A legend template

                             legendTemplate: '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<segments.length; i++){%><li><span style=\'background-color:<%=segments[i].fillColor%>\'></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>',

                             // String - A tooltip template

                             tooltipTemplate: '<%=value %> <%=label%>'

                         };

                         // Create pie or douhnut chart

                         // You can switch between pie and douhnut using the method below.

                         pieChart3.Doughnut(PieData3, pieOptions);




                         //barras
                         //-------------
                         //- BAR CHART -
                         //-------------

                         var areaChartData = {
                             labels: [<?php

                                        setlocale(LC_TIME, 'es_ES');
                                        foreach ($listaMeses as $numero) {

                                            $fecha = $numero;
                                            $fechaEntera = strtotime($fecha);
                                            $numero = date("m", $fechaEntera);

                                            $fecha = DateTime::createFromFormat('!m', $numero);
                                            $mes = strftime("%B", $fecha->getTimestamp()); // marzo
                                        ?> '<?php echo $mes; ?>',
                                 <?php

                                        }


                                    ?>
                             ],
                             datasets: [
                                 <?php while (!$saleescuela->EOF) { ?>



                                     {
                                         label: '<?php echo $saleescuela->fields["codigo"]; ?>',
                                         fillColor: '<?php echo $saleescuela->fields["color"]; ?>',
                                         strokeColor: '<?php echo $saleescuela->fields["color"]; ?>',
                                         pointColor: '<?php echo $saleescuela->fields["color"]; ?>',
                                         pointStrokeColor: '<?php echo $saleescuela->fields["color"]; ?>',
                                         pointHighlightFill: '#fff',
                                         pointHighlightStroke: '<?php echo $saleescuela->fields["color"]; ?>',
                                         data: [
                                             <?php foreach ($listaMeses as $numero) {
                                                    $fecha = $numero;
                                                    $fechaEntera = strtotime($fecha);
                                                    $numero = date("m", $fechaEntera);

                                                    $valormes =   $this->obj->pagaronxescuelapreciosmes($saleescuela->fields["id"], $numero, $_POST["fecha1"], $_POST["fecha2"]);
                                                    $numeroponer = 0;
                                                    if (isset($valormes->fields["total"]) && $valormes->fields["total"] > 0) {

                                                        $numeroponer = $valormes->fields["total"];
                                                    }
                                                ?> <?php echo $numeroponer; ?>,
                                             <?php

                                                }
                                                ?>
                                         ]
                                     },

                                 <?php

                                        $saleescuela->MoveNext();
                                    }

                                    $saleescuela->Move(0);

                                    ?>

                             ]
                         }

                         var barChartCanvas = $('#barChart').get(0).getContext('2d')
                         var barChart = new Chart(barChartCanvas)
                         var barChartData = areaChartData
                         //  barChartData.datasets[1].fillColor = '#00a65a'
                         //  barChartData.datasets[1].strokeColor = '#00a65a'
                         //  barChartData.datasets[1].pointColor = '#00a65a'
                         var barChartOptions = {
                             //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
                             scaleBeginAtZero: true,
                             //Boolean - Whether grid lines are shown across the chart
                             scaleShowGridLines: true,
                             //String - Colour of the grid lines
                             scaleGridLineColor: 'rgba(0,0,0,.05)',
                             //Number - Width of the grid lines
                             scaleGridLineWidth: 1,
                             //Boolean - Whether to show horizontal lines (except X axis)
                             scaleShowHorizontalLines: true,
                             //Boolean - Whether to show vertical lines (except Y axis)
                             scaleShowVerticalLines: true,
                             //Boolean - If there is a stroke on each bar
                             barShowStroke: true,
                             //Number - Pixel width of the bar stroke
                             barStrokeWidth: 2,
                             //Number - Spacing between each of the X value sets
                             barValueSpacing: 5,
                             //Number - Spacing between data sets within X values
                             barDatasetSpacing: 1,
                             //String - A legend template
                             legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
                             //Boolean - whether to make the chart responsive
                             responsive: true,
                             maintainAspectRatio: true
                         }

                         barChartOptions.datasetFill = false
                         barChart.Bar(barChartData, barChartOptions)



                     <?php } ?>

                     function descargarpdf() {


                         $(".main-sidebar").hide();
                         $(".main-header").hide();
                         $(".content-header").hide();
                         $("#cargamasiva").hide();

                         setTimeout(function() {
                             html2canvas(document.body).then(canvas => {
                                 //$("#previewBeforeDownload").html(canvas);
                                 var imgData = canvas.toDataURL("image/jpeg", 1);
                                 var pdf = new jsPDF("p", "mm", "a4");
                                 var pageWidth = pdf.internal.pageSize.getWidth();
                                 var pageHeight = pdf.internal.pageSize.getHeight();
                                 var imageWidth = canvas.width;
                                 var imageHeight = canvas.height;
                                 //    alert("imagen " + imageWidth + "   " + imageHeight);
                                 //  alert("pagina " + pageWidth + "   " + pageHeight);
                                 var ratio = imageWidth / imageHeight >= pageWidth / pageHeight ? pageWidth / imageWidth : pageHeight / imageHeight;

                                 //pdf = new jsPDF(this.state.orientation, undefined, format);
                                 pdf.addImage(imgData, 'JPEG', 0, 0, (imageWidth * ratio) + 55, (imageHeight * ratio) + 40);
                                 pdf.save("Reporte_pagos_generado_el<?php echo date("Y-m-d"); ?>.pdf");
                                 //$("#previewBeforeDownload").hide();
                                 $(".main-sidebar").show();
                                 $(".main-header").show();
                                 $(".content-header").show();
                                 $(".carga-agregando").show();
                                 $("#cargamasiva").show();

                             });
                         }, 500);

                     }
                 </script>