 <!-- Content Wrapper. Contains page content -->

 <div class="content-wrapper">

   <!-- Content Header (Page header) -->

   <section class="content-header">

     <h1>

       Pedidos

       <small>versión 1.0</small>

     </h1>

     <ol class="breadcrumb">

       <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

       <li class="active">Pedidos</li>

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

               <h4><i class="icon fa fa-info"></i> Notificación!</h4>

               El Pedido se genero con exito

             </div>



           <?php



            } ?>


           <!-- /.box-body -->



           <div class="box">
             <div class="box-header">
               <h3 class="box-title">Acciones</h3>
             </div>
             <div class="box-body">

               <a class="btn btn-app btn-success" data-toggle="modal" data-target="#modal-agregar">
                 <i class=" fa fa-plus"></i> Nuevo Pedido
               </a>


               <a class="btn btn-app" data-toggle="modal" data-target="#modal-agregar2">
                 <i class=" fa fa-user"></i> Nuevo Usuario
               </a>
       <a class="btn btn-app"  data-toggle="modal" data-target="#modalvideo">
               <i class="fa fa-file-video-o"></i> Tutorial
             </a>

               <div class="row">
                 <form action="<?php echo PATO; ?>pedidos/filtrar/" method="post" name="ciudades-filtrar" id="ciudades-filtrar" class="form">

                   <div class="col-sm-3">

                     <div class="form-group">



                       <input type="text" id="palabra" placeholder="Busqueda por palabras" name="palabra" value="<?php echo $_POST["palabra"]; ?>" class="form-control">

                     </div>
                   </div>


                   <!-- /.form-group -->



                   <div class="col-sm-3">

                     <div class="form-group">



                       <select class="form-control" name="estado" id="estado" data-placeholder="Estado" style="width: 100%;">
                         <option value="5" <?php if ($_POST["estado"] == "5") { ?> selected="" <?php } ?>>Todos los estados</option>
                         <option value="0" <?php if ($_POST["estado"] == "0") { ?> selected="" <?php } ?>>Recibido</option>
                         <option value="1" <?php if ($_POST["estado"] == "1") { ?> selected="" <?php } ?>>Lavando</option>
                         <option value="2" <?php if ($_POST["estado"] == "2") { ?> selected="" <?php } ?>>Finalizado</option>
                         <option value="3" <?php if ($_POST["estado"] == "3") { ?> selected="" <?php } ?>>Anulado</option>
                       </select>

                     </div>
                   </div>



                   <div class="col-sm-3">

                     <div class="form-group">

                       <button type="button" class="btn btn-default" id="daterange-btn">
                         <span>
                           <i class="fa fa-calendar"></i> Rango de fechas
                         </span>
                         <i class="fa fa-caret-down"></i>
                       </button>
                     </div>
                   </div>
                   <!-- /.form-group -->


                   <div class="col-sm-3">
                     <div class="form-group">
                       <input type="hidden" name="fecha1" <?php if (isset($_POST["fecha1"]) and $_POST["fecha1"] != "") { ?> value="<?php echo $_POST["fecha1"]; ?>" <?php } ?> id="fecha1">
                       <input type="hidden" name="fecha2" id="fecha2" <?php if (isset($_POST["fecha2"]) and $_POST["fecha2"] != "") { ?> value="<?php echo $_POST["fecha2"]; ?>" <?php } ?>>
                       <button type="submit" class="btn btn-primary">Generar Filtros</button>

                     </div>
                   </div>
                   <!-- /.form-group -->



                   <!-- /.col -->
                 </form>
               </div>

               <div class="row">
                 <div class="col-lg-3 col-xs-6">
                   <!-- small box -->
                   <div class="small-box bg-red">
                     <div class="inner">
                       <h3 id="tre">0</h3>

                       <p>Recibido</p>
                     </div>
                     <div class="icon">
                       <i class="fa fa-sign-in"></i>
                     </div>

                   </div>
                 </div>
                 <!-- ./col -->
                 <div class="col-lg-3 col-xs-6">
                   <!-- small box -->
                   <div class="small-box bg-yellow">
                     <div class="inner">
                       <h3 id="tla">0</h3>

                       <p>Lavando</p>
                     </div>
                     <div class="icon">
                       <i class="fa fa-spinner"></i>
                     </div>

                   </div>
                 </div>
                 <!-- ./col -->
                 <div class="col-lg-3 col-xs-6">
                   <!-- small box -->
                   <div class="small-box bg-green">
                     <div class="inner">
                       <h3 id="tfi">0</h3>

                       <p>Finalizado</p>
                     </div>
                     <div class="icon">
                       <i class="fa fa-sign-out"></i>
                     </div>

                   </div>
                 </div>
                 <!-- ./col -->
                 <div class="col-lg-3 col-xs-6">
                   <!-- small box -->
                   <div class="small-box bg-aqua">
                     <div class="inner">
                       <h3 id="tcum"></h3>

                       <p>Cumplimiento</p>
                     </div>
                     <div class="icon">
                       <i class="ion ion-stats-bars"></i>
                     </div>

                   </div>
                 </div>
                 <!-- ./col -->
               </div>
             </div>





             <!-- /.row -->

           </div>
           <!-- /.box-body -->

           <!-- /.box-header -->

           <div class="box-body">

             <?php
              $tre = 0;
              $tla = 0;
              $tfi = 0;

              while (!$sale->EOF) { ?>

               <div class="row">


                 <?php if (!$sale->EOF) { ?>
                   <div class="col-md-3 col-sm-6 col-xs-12">
                     <div id="estadobg<?php echo $sale->fields["id"]; ?>" class="info-box <?php if ($sale->fields["estado"] == 0) {
                                                                                            echo "bg-red";
                                                                                            $tre++;
                                                                                          }
                                                                                          if ($sale->fields["estado"] == 1) {
                                                                                            echo "bg-yellow";
                                                                                            $tla++;
                                                                                          }

                                                                                          if ($sale->fields["estado"] == 2) {
                                                                                            echo "bg-green";
                                                                                            $tfi++;
                                                                                          }
                                                                                          if ($sale->fields["estado"] == 3) {
                                                                                            echo "bg-gray";
                                                                                          }
                                                                                          ?>">
                       <span class="info-box-icon" style="height: 145px;" id="iconoestado<?php echo $sale->fields["id"]; ?>">
                         <h3 style="color:white"><?php echo $sale->fields["codigo"]; ?></h3><i class=" <?php if ($sale->fields["estado"] == 0) {
                                                                                                          echo "fa fa fa-sign-in";
                                                                                                        }
                                                                                                        if ($sale->fields["estado"] == 1) {
                                                                                                          echo "fa fa-spinner";
                                                                                                        }

                                                                                                        if ($sale->fields["estado"] == 2) {
                                                                                                          echo "fa fa-sign-out";
                                                                                                        }

                                                                                                        if ($sale->fields["estado"] == 3) {
                                                                                                          echo "fa fa-trash";
                                                                                                        }

                                                                                                        ?>"></i>
                       </span>

                       <div class="info-box-content">

                         <span class="info-box-text"><?php echo $sale->fields["nombre_usuario"]; ?></span>
                         <span class="info-box-number"><i class="fa fa-user"></i>&nbsp;<?php echo $sale->fields["documento"]; ?></span>
                         <span class="info-box-number"><a style="color: white !important;" target="_blank" href="https://api.whatsapp.com/send?phone=+57<?php echo $sale->fields["celular"];  ?>"><i class="fa fa-whatsapp">&nbsp;</i><?php echo $sale->fields["celular"]; ?></a></span>
                         <span class="info-box-number"> <select onchange="cambiarestado(<?php echo $sale->fields["id"]; ?>,'<?php echo $sale->fields["celular"];  ?>','<?php echo $sale->fields["nombre_usuario"]; ?>','<?php echo $sale->fields["codigo"]; ?>')" class="form-control" name="estadon<?php echo $sale->fields["id"];  ?>" id="estadon<?php echo $sale->fields["id"];  ?>" data-placeholder="Estado" style="width: 100%;">

                             <option value="0" <?php if ($sale->fields["estado"] == "0") { ?> selected="" <?php } ?>>Recibido</option>
                             <option value="1" <?php if ($sale->fields["estado"] == "1") { ?> selected="" <?php } ?>>Lavando</option>
                             <option value="2" <?php if ($sale->fields["estado"] == "2") { ?> selected="" <?php } ?>>Finalizado</option>
                             <option value="3" <?php if ($sale->fields["estado"] == "3") { ?> selected="" <?php } ?>>Anulado</option>
                           </select></span>
                         <div class="progress">
                           <div class="progress-bar" id="progressb<?php echo $sale->fields["id"];  ?>" style="width: <?php if ($sale->fields["estado"] == "0") {
                                                                                                                        echo "10%";
                                                                                                                      }
                                                                                                                      if ($sale->fields["estado"] == "1") {
                                                                                                                        echo "60%";
                                                                                                                      }
                                                                                                                      if ($sale->fields["estado"] == "2") {
                                                                                                                        echo "100%";
                                                                                                                      }


                                                                                                                      ?>"></div>
                         </div>

                         <span class="progress-description">
                           <?php echo $sale->fields["fecha"]; ?>
                         </span>
                       </div>
                       <!-- /.info-box-content -->
                     </div>
                     <!-- /.info-box -->
                   </div>

                 <?php $sale->MoveNext();
                  } ?>



                 <?php if (!$sale->EOF) { ?>
                   <div class="col-md-3 col-sm-6 col-xs-12">
                     <div id="estadobg<?php echo $sale->fields["id"]; ?>" class="info-box <?php if ($sale->fields["estado"] == 0) {
                                                                                            echo "bg-red";
                                                                                            $tre++;
                                                                                          }
                                                                                          if ($sale->fields["estado"] == 1) {
                                                                                            echo "bg-yellow";
                                                                                            $tla++;
                                                                                          }

                                                                                          if ($sale->fields["estado"] == 2) {
                                                                                            echo "bg-green";
                                                                                            $tfi++;
                                                                                          }
                                                                                          if ($sale->fields["estado"] == 3) {
                                                                                            echo "bg-gray";
                                                                                          }
                                                                                          ?>">
                       <span class="info-box-icon" style="height: 145px;" id="iconoestado<?php echo $sale->fields["id"]; ?>">
                         <h3 style="color:white"><?php echo $sale->fields["codigo"]; ?></h3><i class=" <?php if ($sale->fields["estado"] == 0) {
                                                                                                          echo "fa fa fa-sign-in";
                                                                                                        }
                                                                                                        if ($sale->fields["estado"] == 1) {
                                                                                                          echo "fa fa-spinner";
                                                                                                        }

                                                                                                        if ($sale->fields["estado"] == 2) {
                                                                                                          echo "fa fa-sign-out";
                                                                                                        }

                                                                                                        if ($sale->fields["estado"] == 3) {
                                                                                                          echo "fa fa-trash";
                                                                                                        }

                                                                                                        ?>"></i>
                       </span>

                       <div class="info-box-content">

                         <span class="info-box-text"><?php echo $sale->fields["nombre_usuario"]; ?></span>
                         <span class="info-box-number"><i class="fa fa-user"></i>&nbsp;<?php echo $sale->fields["documento"]; ?></span>
                         <span class="info-box-number"><a style="color: white !important;" target="_blank" href="https://api.whatsapp.com/send?phone=+57<?php echo $sale->fields["celular"];  ?>"><i class="fa fa-whatsapp">&nbsp;</i><?php echo $sale->fields["celular"]; ?></a></span>
                         <span class="info-box-number"> <select onchange="cambiarestado(<?php echo $sale->fields["id"]; ?>,'<?php echo $sale->fields["celular"];  ?>','<?php echo $sale->fields["nombre_usuario"]; ?>','<?php echo $sale->fields["codigo"]; ?>')" class="form-control" name="estadon<?php echo $sale->fields["id"];  ?>" id="estadon<?php echo $sale->fields["id"];  ?>" data-placeholder="Estado" style="width: 100%;">

                             <option value="0" <?php if ($sale->fields["estado"] == "0") { ?> selected="" <?php } ?>>Recibido</option>
                             <option value="1" <?php if ($sale->fields["estado"] == "1") { ?> selected="" <?php } ?>>Lavando</option>
                             <option value="2" <?php if ($sale->fields["estado"] == "2") { ?> selected="" <?php } ?>>Finalizado</option>
                             <option value="3" <?php if ($sale->fields["estado"] == "3") { ?> selected="" <?php } ?>>Anulado</option>
                           </select></span>
                         <div class="progress">
                           <div class="progress-bar" id="progressb<?php echo $sale->fields["id"];  ?>" style="width: <?php if ($sale->fields["estado"] == "0") {
                                                                                                                        echo "10%";
                                                                                                                      }
                                                                                                                      if ($sale->fields["estado"] == "1") {
                                                                                                                        echo "60%";
                                                                                                                      }
                                                                                                                      if ($sale->fields["estado"] == "2") {
                                                                                                                        echo "100%";
                                                                                                                      }


                                                                                                                      ?>"></div>
                         </div>

                         <span class="progress-description">
                           <?php echo $sale->fields["fecha"]; ?>
                         </span>
                       </div>
                       <!-- /.info-box-content -->
                     </div>
                     <!-- /.info-box -->
                   </div>

                 <?php $sale->MoveNext();
                  } ?>


                 <?php if (!$sale->EOF) { ?>
                   <div class="col-md-3 col-sm-6 col-xs-12">
                     <div id="estadobg<?php echo $sale->fields["id"]; ?>" class="info-box <?php if ($sale->fields["estado"] == 0) {
                                                                                            echo "bg-red";
                                                                                            $tre++;
                                                                                          }
                                                                                          if ($sale->fields["estado"] == 1) {
                                                                                            echo "bg-yellow";
                                                                                            $tla++;
                                                                                          }

                                                                                          if ($sale->fields["estado"] == 2) {
                                                                                            echo "bg-green";
                                                                                            $tfi++;
                                                                                          }
                                                                                          if ($sale->fields["estado"] == 3) {
                                                                                            echo "bg-gray";
                                                                                          }
                                                                                          ?>">
                       <span class="info-box-icon" style="height: 145px;" id="iconoestado<?php echo $sale->fields["id"]; ?>">
                         <h3 style="color:white"><?php echo $sale->fields["codigo"]; ?></h3><i class=" <?php if ($sale->fields["estado"] == 0) {
                                                                                                          echo "fa fa fa-sign-in";
                                                                                                        }
                                                                                                        if ($sale->fields["estado"] == 1) {
                                                                                                          echo "fa fa-spinner";
                                                                                                        }

                                                                                                        if ($sale->fields["estado"] == 2) {
                                                                                                          echo "fa fa-sign-out";
                                                                                                        }

                                                                                                        if ($sale->fields["estado"] == 3) {
                                                                                                          echo "fa fa-trash";
                                                                                                        }

                                                                                                        ?>"></i>
                       </span>

                       <div class="info-box-content">

                         <span class="info-box-text"><?php echo $sale->fields["nombre_usuario"]; ?></span>
                         <span class="info-box-number"><i class="fa fa-user"></i>&nbsp;<?php echo $sale->fields["documento"]; ?></span>
                         <span class="info-box-number"><a style="color: white !important;" target="_blank" href="https://api.whatsapp.com/send?phone=+57<?php echo $sale->fields["celular"];  ?>"><i class="fa fa-whatsapp">&nbsp;</i><?php echo $sale->fields["celular"]; ?></a></span>
                         <span class="info-box-number"> <select onchange="cambiarestado(<?php echo $sale->fields["id"]; ?>,'<?php echo $sale->fields["celular"];  ?>','<?php echo $sale->fields["nombre_usuario"]; ?>','<?php echo $sale->fields["codigo"]; ?>')" class="form-control" name="estadon<?php echo $sale->fields["id"];  ?>" id="estadon<?php echo $sale->fields["id"];  ?>" data-placeholder="Estado" style="width: 100%;">

                             <option value="0" <?php if ($sale->fields["estado"] == "0") { ?> selected="" <?php } ?>>Recibido</option>
                             <option value="1" <?php if ($sale->fields["estado"] == "1") { ?> selected="" <?php } ?>>Lavando</option>
                             <option value="2" <?php if ($sale->fields["estado"] == "2") { ?> selected="" <?php } ?>>Finalizado</option>
                             <option value="3" <?php if ($sale->fields["estado"] == "3") { ?> selected="" <?php } ?>>Anulado</option>
                           </select></span>
                         <div class="progress">
                           <div class="progress-bar" id="progressb<?php echo $sale->fields["id"];  ?>" style="width: <?php if ($sale->fields["estado"] == "0") {
                                                                                                                        echo "10%";
                                                                                                                      }
                                                                                                                      if ($sale->fields["estado"] == "1") {
                                                                                                                        echo "60%";
                                                                                                                      }
                                                                                                                      if ($sale->fields["estado"] == "2") {
                                                                                                                        echo "100%";
                                                                                                                      }


                                                                                                                      ?>"></div>
                         </div>

                         <span class="progress-description">
                           <?php echo $sale->fields["fecha"]; ?>
                         </span>
                       </div>
                       <!-- /.info-box-content -->
                     </div>
                     <!-- /.info-box -->
                   </div>

                 <?php $sale->MoveNext();
                  } ?>

                 <?php if (!$sale->EOF) { ?>
                   <div class="col-md-3 col-sm-6 col-xs-12">
                     <div id="estadobg<?php echo $sale->fields["id"]; ?>" class="info-box <?php if ($sale->fields["estado"] == 0) {
                                                                                            echo "bg-red";
                                                                                            $tre++;
                                                                                          }
                                                                                          if ($sale->fields["estado"] == 1) {
                                                                                            echo "bg-yellow";
                                                                                            $tla++;
                                                                                          }

                                                                                          if ($sale->fields["estado"] == 2) {
                                                                                            echo "bg-green";
                                                                                            $tfi++;
                                                                                          }
                                                                                          if ($sale->fields["estado"] == 3) {
                                                                                            echo "bg-gray";
                                                                                          }
                                                                                          ?>">
                       <span class="info-box-icon" style="height: 145px;" id="iconoestado<?php echo $sale->fields["id"]; ?>">
                         <h3 style="color:white"><?php echo $sale->fields["codigo"]; ?></h3><i class=" <?php if ($sale->fields["estado"] == 0) {
                                                                                                          echo "fa fa fa-sign-in";
                                                                                                        }
                                                                                                        if ($sale->fields["estado"] == 1) {
                                                                                                          echo "fa fa-spinner";
                                                                                                        }

                                                                                                        if ($sale->fields["estado"] == 2) {
                                                                                                          echo "fa fa-sign-out";
                                                                                                        }

                                                                                                        if ($sale->fields["estado"] == 3) {
                                                                                                          echo "fa fa-trash";
                                                                                                        }

                                                                                                        ?>"></i>
                       </span>

                       <div class="info-box-content">

                         <span class="info-box-text"><?php echo $sale->fields["nombre_usuario"]; ?></span>
                         <span class="info-box-number"><i class="fa fa-user"></i>&nbsp;<?php echo $sale->fields["documento"]; ?></span>
                         <span class="info-box-number"><a style="color: white !important;" target="_blank" href="https://api.whatsapp.com/send?phone=+57<?php echo $sale->fields["celular"];  ?>"><i class="fa fa-whatsapp">&nbsp;</i><?php echo $sale->fields["celular"]; ?></a></span>
                         <span class="info-box-number"> <select onchange="cambiarestado(<?php echo $sale->fields["id"]; ?>,'<?php echo $sale->fields["celular"];  ?>','<?php echo $sale->fields["nombre_usuario"]; ?>','<?php echo $sale->fields["codigo"]; ?>')" class="form-control" name="estadon<?php echo $sale->fields["id"];  ?>" id="estadon<?php echo $sale->fields["id"];  ?>" data-placeholder="Estado" style="width: 100%;">

                             <option value="0" <?php if ($sale->fields["estado"] == "0") { ?> selected="" <?php } ?>>Recibido</option>
                             <option value="1" <?php if ($sale->fields["estado"] == "1") { ?> selected="" <?php } ?>>Lavando</option>
                             <option value="2" <?php if ($sale->fields["estado"] == "2") { ?> selected="" <?php } ?>>Finalizado</option>
                             <option value="3" <?php if ($sale->fields["estado"] == "3") { ?> selected="" <?php } ?>>Anulado</option>
                           </select></span>
                         <div class="progress">
                           <div class="progress-bar" id="progressb<?php echo $sale->fields["id"];  ?>" style="width: <?php if ($sale->fields["estado"] == "0") {
                                                                                                                        echo "10%";
                                                                                                                      }
                                                                                                                      if ($sale->fields["estado"] == "1") {
                                                                                                                        echo "60%";
                                                                                                                      }
                                                                                                                      if ($sale->fields["estado"] == "2") {
                                                                                                                        echo "100%";
                                                                                                                      }


                                                                                                                      ?>"></div>
                         </div>

                         <span class="progress-description">
                           <?php echo $sale->fields["fecha"]; ?>
                         </span>
                       </div>
                       <!-- /.info-box-content -->
                     </div>
                     <!-- /.info-box -->
                   </div>

                 <?php $sale->MoveNext();
                  } ?>
                 <!-- /.col -->

                 <!-- /.col -->

                 <!-- /.col -->

                 <!-- /.col -->
               </div>

             <?php
              } ?>

           </div>

           <!-- /.box-body -->

         </div>

         <!-- /.box -->
         <div class="modal modal-info fade" id="modal-agregar" style="display: none;">

           <div class="modal-dialog">

             <div class="modal-content">

               <div class="modal-header">

                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                   <span aria-hidden="true">×</span></button>

                 <h4 class="modal-title">Nuevo Pedido</h4>

               </div>

               <div class="modal-body">
                 <form id="dispositivos-agregando" name="dispositivos-agregando" class="form-horizontal" method="post" action="<?php echo PATO; ?>pedidos/agregando/" enctype="multipart/form-data">

                   <div class="box-body">
                     <div class="form-group">
                       <label>Cliente</label><br>
                       <select class="form-control select2" name="usuario_id" onchange="verificartelefono()" id="usuario_id" data-placeholder="Usuario" style="width: 100%;">

                         <option value="0">Seleccione Usuario </option>

                         <?php while (!$usuario->EOF) {   ?>

                           <option value="<?php echo $usuario->fields["id"]; ?>"><?php echo $usuario->fields["nombre"] . " " . $usuario->fields["documento"]; ?></option>

                         <?php $usuario->MoveNext();
                          }
                          $usuario->Move(0);  ?>

                       </select>
                     </div>

                     <div class="form-group">

                       <label for="exampleInputEmail1">Codigo</label>

                       <input type="text" class="form-control" name="codigo" id="codigo" placeholder="Codigo">

                     </div>

                     <div class="form-group">

                       <label for="exampleInputPassword1">Comentario</label>

                       <input type="text" class="form-control" id="comentario" name="comentario" placeholder="Comentario">

                     </div>






                   </div>





                   <div id="botonpedido">

                     <button type="submit" class="btn btn-primary">Agregar</button>

                   </div>

                 </form>


               </div>

               <div class="modal-footer">

                 <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>



               </div>

             </div>

             <!-- /.modal-content -->

           </div>

           <!-- /.modal-dialog -->

         </div>



         <div class="modal modal-info fade" id="modal-agregar2" style="display: none;">

           <div class="modal-dialog">

             <div class="modal-content">

               <div class="modal-header">

                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                   <span aria-hidden="true">×</span></button>

                 <h4 class="modal-title">Nuevo Usuario</h4>

               </div>

               <div class="modal-body">
                 <form id="dispositivos-agregando" name="dispositivos-agregando" class="form-horizontal" method="post" action="<?php echo PATO; ?>usuarios/agregando/1" enctype="multipart/form-data">

                   <div class="box-body">
                     <div class="form-group">

                       <label for="exampleInputEmail1">Documento</label>

                       <input type="text" class="form-control" name="documento" id="documento" placeholder="Documento" require>

                     </div>

                     <div class="form-group">

                       <label for="exampleInputEmail1">Nombre</label>

                       <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" require>

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

                       <input type="date" class="form-control" name="nacimiento" id="nacimiento" placeholder="Fecha de Nacimiento">

                     </div>
                     <div class="form-group">

                       <label for="exampleInputEmail1">Celular</label>

                       <input type="text" value="<?php echo $sale->fields["celular"]; ?>" class="form-control" name="celular" id="celular" placeholder="Telefono" require>

                     </div>
                     <div class="form-group">
                       <label for="exampleInputEmail1">Sede</label><br>
                       <select disabled name="sede_id" id="sede_id" class="form-control select2" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor seleccione la Sede"); ?>">
                         <option value="0" selected="selected"><?php echo __("Seleccione Sede"); ?></option><?php
                                                                                                            if (!$sedes->EOF) {
                                                                                                              while (!$sedes->EOF) { ?>
                             <option value="<?php echo $sedes->fields["id"]; ?>" <?php if ($sedes->fields["id"] == $_SESSION['sede']) {
                                                                                                                  echo "selected";
                                                                                                                } ?>><?php echo $sedes->fields["nombre"]; ?></option><?php
                                                                                                                                                                      $sedes->MoveNext();
                                                                                                                                                                    }
                                                                                                                                                                    $sedes->Move(0);
                                                                                                                                                                  } ?>
                       </select>
                     </div>
                     <div class="form-group">

                       <label for="exampleInputEmail1">Dirección</label>

                       <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Dirección">

                     </div>

                     <div class="form-group">
                       <label for="exampleInputEmail1">Comentario</label>
                       <input type="text" class="form-control" name="comentario" id="comentario" placeholder="Comentario">


                     </div>
                     <div class="form-group">

                       <label for="exampleInputEmail1">Estado</label>

                       <select name="estado" id="estado" class="form-control">
                         <option value="1">Activo</option>
                         <option value="0">Inactivo</option>
                       </select>
                     </div>






                   </div>





                   <div>

                     <button type="submit" class="btn btn-primary">Agregar</button>

                   </div>

                 </form>


               </div>

               <div class="modal-footer">

                 <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>



               </div>

             </div>

             <!-- /.modal-content -->

           </div>

           <!-- /.modal-dialog -->

         </div>
		 
		 
		     <div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="modalvideo" role="dialog" tabindex="-1">
      <div class="modal-dialog modal-lg" role="document">

        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Tutorial</h4>
          </div>
          <div class="modal-body mb-0 p-0">
            <div aling="center"> <video width="800" height="400" controls>
                <source src="<?php echo PATU; ?>img/videotutoriales/tutorial_merged.mp4" type="video/mp4">
                Tu navegador no implementa el elemento <code>video</code>.
              </video>
            </div>
          </div>
          <!-- <div class="modal-footer">
            <button class="btn btn-outline-primary btn-rounded btn-md ml-4 text-center" data-dismiss="modal" type="button">Cerrar</button>
          </div> -->
        </div>
      </div>
    </div>
         <script>
           $("#tre").html("<?php echo $tre; ?>");
           $("#tla").html("<?php echo $tla; ?>");
           $("#tfi").html("<?php echo $tfi; ?>");
           <?php
            $porcentaje = round($tfi * 100 / $sale->_numOfRows);
            ?>
           $("#tcum").html("<?php echo round($porcentaje); ?>%");

           function editar(id) {

             window.location.href = "<?php echo PATO; ?>sedes/editar/" + id;



           }




           function borrarregistro(id) {

             if (confirm("Realmente Desea eliminar La Sede?")) {

               $("#carga").show();

               $.ajax({
                 type: "POST",
                 url: "<?php echo PATO; ?>sedes/eliminar/" + id + "",
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

           function accionfiltros() {

             if ($('#filtros').css('display') == 'none') {
               $("#filtros").show();
               // Acción si el elemento no es visible
             } else {
               $("#filtros").hide();
               // Acción si el elemento es visible
             }



           }
         </script>

         <script>
           function verificartelefono() {



             $.ajax({
               type: "POST",
               url: "<?php echo PATO; ?>usuarios/vertelefono/",
               data: "usuario_id=" + $("#usuario_id").val(),





               success: function(datos) {

                 if (datos == "no") {
                   alert("El Usuario no tiene un  número de teléfono registrado,  Actualice los datos.");
                   $("#botonpedido").hide();

                 } else {

                   $("#botonpedido").show();

                 }



               }





             });
           }

           function cambiarestado(id, celular, nombre, codigo) {
             $("#carga").show();

             $.ajax({
               type: "POST",
               url: "<?php echo PATO; ?>pedidos/ajaxcambiarestado/" + id,
               data: "estado=" + $("#estadon" + id).val() + "&celular=" + celular + "&nombre=" + nombre,
               success: function(response) {
                 if ($("#estadon" + id).val() == "0") {
                   $("#iconoestado" + id).html("<h3 style='color:white'>" + codigo + "</h3><i class='fa fa fa-sign-in'></i>");
                   $("#estadobg" + id).removeClass("bg-yellow");
                   $("#estadobg" + id).removeClass("bg-red");
                   $("#estadobg" + id).removeClass("bg-green");
                   $("#estadobg" + id).removeClass("bg-gray");
                   $("#estadobg" + id).addClass("bg-red");




                 }

                 if ($("#estadon" + id).val() == "1") {
                   $("#iconoestado" + id).html("<h3 style='color:white'>" + codigo + "</h3><i class='fa fa-spinner'></i>");
                   $("#estadobg" + id).removeClass("bg-yellow");
                   $("#estadobg" + id).removeClass("bg-red");
                   $("#estadobg" + id).removeClass("bg-green");
                   $("#estadobg" + id).removeClass("bg-gray");
                   $("#estadobg" + id).addClass("bg-yellow");
                 }

                 if ($("#estadon" + id).val() == "2") {
                   $("#iconoestado" + id).html("<h3 style='color:white'>" + codigo + "</h3><i class='fa fa-sign-out'></i>");
                   $("#estadobg" + id).removeClass("bg-yellow");
                   $("#estadobg" + id).removeClass("bg-red");
                   $("#estadobg" + id).removeClass("bg-green");
                   $("#estadobg" + id).removeClass("bg-gray");
                   $("#estadobg" + id).addClass("bg-green");
                 }
                 if ($("#estadon" + id).val() == "3") {
                   $("#iconoestado" + id).html("<h3 style='color:white'>" + codigo + "</h3><i class ='fa fa-trash'></i>");
                   $("#estadobg" + id).removeClass("bg-yellow");
                   $("#estadobg" + id).removeClass("bg-red");
                   $("#estadobg" + id).removeClass("bg-green");

                   $("#estadobg" + id).addClass("bg-gray");
                 }


                 $("#carga").hide();
               }
             });

           }

           $('#daterange-btn').daterangepicker({
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
         </script>