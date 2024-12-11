<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>lavasport.co</title>

  <!-- Tell the browser to be responsive to screen width -->

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Bootstrap 3.3.7 -->

  <link rel="stylesheet" href="<?php echo PATU; ?>bower_components/bootstrap/dist/css/bootstrap.min.css">

  <!-- Font Awesome -->

  <link rel="stylesheet" href="<?php echo PATU; ?>bower_components/font-awesome/css/font-awesome.min.css">

  <!-- Ionicons -->

  <link rel="stylesheet" href="<?php echo PATU; ?>bower_components/Ionicons/css/ionicons.min.css">

  <!-- jvectormap -->

  <link rel="stylesheet" href="<?php echo PATU; ?>bower_components/jvectormap/jquery-jvectormap.css">

  <link rel="stylesheet" href="<?php echo PATU; ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <link rel="stylesheet" href="<?php echo PATU; ?>bower_components/bootstrap-daterangepicker/daterangepicker.css">

  <link rel="stylesheet" href="<?php echo PATU; ?>bower_components/select2/dist/css/select2.min.css">

  <link rel="stylesheet" href="<?php echo PATU; ?>dist/css/skins/_all-skins.min.css">

  <!-- Theme style -->

  <link rel="stylesheet" href="<?php echo PATU; ?>dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="<?php echo PATU; ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins

       folder instead of downloading all of them to reduce the load. -->

  <link rel="stylesheet" href="<?php echo PATU; ?>dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet" href="<?php echo PATU; ?>plugins/iCheck/all.css">

  <link href="<?php echo PATU; ?>css/bootstrap-toggle.min.css" rel="stylesheet">

  <link href="<?php echo PATU; ?>css/starrr.css" rel="stylesheet">





  <style>
    /* Absolute Center Spinner */

    .loading {

      position: fixed;

      z-index: 999;

      height: 2em;

      width: 2em;

      overflow: show;

      margin: auto;

      top: 0;

      left: 0;

      bottom: 0;

      right: 0;

    }



    /* Transparent Overlay */

    .loading:before {

      content: '';

      display: block;

      position: fixed;

      top: 0;

      left: 0;

      width: 100%;

      height: 100%;

      background: radial-gradient(rgba(20, 20, 20, .8), rgba(0, 0, 0, .8));



      background: -webkit-radial-gradient(rgba(20, 20, 20, .8), rgba(0, 0, 0, .8));

    }



    /* :not(:required) hides these rules from IE9 and below */

    .loading:not(:required) {

      /* hide "loading..." text */

      font: 0/0 a;

      color: transparent;

      text-shadow: none;

      background-color: transparent;

      border: 0;

    }



    .loading:not(:required):after {

      content: '';

      display: block;

      font-size: 10px;

      width: 1em;

      height: 1em;

      margin-top: -0.5em;

      -webkit-animation: spinner 1500ms infinite linear;

      -moz-animation: spinner 1500ms infinite linear;

      -ms-animation: spinner 1500ms infinite linear;

      -o-animation: spinner 1500ms infinite linear;

      animation: spinner 1500ms infinite linear;

      border-radius: 0.5em;

      -webkit-box-shadow: rgba(255, 255, 255, 0.75) 1.5em 0 0 0, rgba(255, 255, 255, 0.75) 1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) 0 1.5em 0 0, rgba(255, 255, 255, 0.75) -1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) -1.5em 0 0 0, rgba(255, 255, 255, 0.75) -1.1em -1.1em 0 0, rgba(255, 255, 255, 0.75) 0 -1.5em 0 0, rgba(255, 255, 255, 0.75) 1.1em -1.1em 0 0;

      box-shadow: rgba(255, 255, 255, 0.75) 1.5em 0 0 0, rgba(255, 255, 255, 0.75) 1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) 0 1.5em 0 0, rgba(255, 255, 255, 0.75) -1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) -1.5em 0 0 0, rgba(255, 255, 255, 0.75) -1.1em -1.1em 0 0, rgba(255, 255, 255, 0.75) 0 -1.5em 0 0, rgba(255, 255, 255, 0.75) 1.1em -1.1em 0 0;

    }



    /* Animation */



    @-webkit-keyframes spinner {

      0% {

        -webkit-transform: rotate(0deg);

        -moz-transform: rotate(0deg);

        -ms-transform: rotate(0deg);

        -o-transform: rotate(0deg);

        transform: rotate(0deg);

      }

      100% {

        -webkit-transform: rotate(360deg);

        -moz-transform: rotate(360deg);

        -ms-transform: rotate(360deg);

        -o-transform: rotate(360deg);

        transform: rotate(360deg);

      }

    }

    @-moz-keyframes spinner {

      0% {

        -webkit-transform: rotate(0deg);

        -moz-transform: rotate(0deg);

        -ms-transform: rotate(0deg);

        -o-transform: rotate(0deg);

        transform: rotate(0deg);

      }

      100% {

        -webkit-transform: rotate(360deg);

        -moz-transform: rotate(360deg);

        -ms-transform: rotate(360deg);

        -o-transform: rotate(360deg);

        transform: rotate(360deg);

      }

    }

    @-o-keyframes spinner {

      0% {

        -webkit-transform: rotate(0deg);

        -moz-transform: rotate(0deg);

        -ms-transform: rotate(0deg);

        -o-transform: rotate(0deg);

        transform: rotate(0deg);

      }

      100% {

        -webkit-transform: rotate(360deg);

        -moz-transform: rotate(360deg);

        -ms-transform: rotate(360deg);

        -o-transform: rotate(360deg);

        transform: rotate(360deg);

      }

    }

    @keyframes spinner {

      0% {

        -webkit-transform: rotate(0deg);

        -moz-transform: rotate(0deg);

        -ms-transform: rotate(0deg);

        -o-transform: rotate(0deg);

        transform: rotate(0deg);

      }

      100% {

        -webkit-transform: rotate(360deg);

        -moz-transform: rotate(360deg);

        -ms-transform: rotate(360deg);

        -o-transform: rotate(360deg);

        transform: rotate(360deg);

      }

    }

    .form-control:focus {

      border-color: #6265e4 !important;

      box-shadow: 0 0 5px rgba(98, 101, 228, 1) !important;

    }

    .btn:focus {

      border-color: #6265e4 !important;

      box-shadow: 0 0 5px rgba(98, 101, 228, 1) !important;

    }
  </style>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

  <!--[if lt IE 9]>

  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

  <![endif]-->



  <!-- Google Font -->

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <script src="<?php echo PATU; ?>bower_components/jquery/dist/jquery.min.js"></script>

  <!-- Bootstrap 3.3.7 -->

  <script src="<?php echo PATU; ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

  <script src="<?php echo PATU; ?>bower_components/select2/dist/js/select2.full.min.js"></script>

  <script src="<?php echo PATU; ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>

  <script src="<?php echo PATU; ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

  <!-- FastClick -->

  <script src="<?php echo PATU; ?>bower_components/fastclick/lib/fastclick.js"></script>

  <!-- AdminLTE App -->

  <script src="<?php echo PATU; ?>dist/js/adminlte.min.js"></script>

  <!-- Sparkline -->

  <script src="<?php echo PATU; ?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>

  <!-- jvectormap  -->

  <script src="<?php echo PATU; ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>

  <script src="<?php echo PATU; ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

  <!-- SlimScroll -->

  <script src="<?php echo PATU; ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

  <!-- ChartJS -->

  <script src="<?php echo PATU; ?>bower_components/chart.js/Chart.js"></script>

  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->

  <!--<script src="<?php echo PATU; ?>dist/js/pages/dashboard2.js"></script> -->

  <!-- AdminLTE for demo purposes -->

  <script src="<?php echo PATU; ?>dist/js/demo.js"></script>

  <script src="<?php echo PATU; ?>js/bootstrap-toggle.min.js"></script>

  <script src="<?php echo PATU; ?>js/starrr.js"></script>

  <script src="<?php echo PATU; ?>bower_components/moment/min/moment.min.js"></script>

  <script src="<?php echo PATU; ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="<?php echo PATU; ?>bower_components/ckeditor/ckeditor.js"></script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>

  <script src="<?php echo PATU; ?>js/FileSaver.min.js"></script>
  <script src="<?php echo PATU; ?>js/Blob.min.js"></script>
  <script src="<?php echo PATU; ?>js/xls.core.min.js"></script>
  <script src="<?php echo PATU; ?>js/dist/js/tableexport.js"></script>
  <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
  <script src='<?php echo PATU; ?>jsPDF-master/dist/jspdf.debug.js'></script>
  <script>
    $(window).on('beforeunload ', function() {

      $("#carga").show();

    });
  </script>

</head>

<body class="hold-transition skin-blue sidebar-mini">

  <div class="wrapper">



    <header class="main-header">



      <!-- Logo -->

      <a href="#" class="logo">

        <!-- mini logo for sidebar mini 50x50 pixels -->

        <span class="logo-mini"><b>L</b>S</span>

        <!-- logo for regular state and mobile devices -->

        <span class="logo-lg"><b>Lava</b>Sport</span>

      </a>



      <!-- Header Navbar: style can be found in header.less -->

      <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">

          <span class="sr-only">Toggle navigation</span>

        </a>

        <!-- Sidebar toggle button-->



        <!-- Navbar Right Menu -->

        <div class="navbar-custom-menu">

          <ul class="nav navbar-nav">

            <!-- Messages: style can be found in dropdown.less-->

            <li>
              <?php if (is_null($_SESSION['sede'])) { ?>
            <li class="tasks-menu">
              <a href="#" data-toggle="modal" data-target="#modalIMG">
                <i title="video de ayuda" class="fa fa-file-video-o"></i>
                Video Tutorial

              </a>

            </li>
          <?php } ?>


          <!-- User Account: style can be found in dropdown.less -->

          <li class="dropdown user user-menu">

            <a href="#" class="dropdown-toggle" data-toggle="dropdown">



              <span class="hidden-xs"><?php echo $_SESSION['JC_Nombre']; ?></span>

            </a>

            <ul class="dropdown-menu">

              <!-- User image -->

              <li class="user-header">





                <p>

                  <?php echo $_SESSION['JC_Nombre']; ?>



                </p>

              </li>

              <!-- Menu Body -->



              <!-- Menu Footer-->

              <li class="user-footer">



                <div class="pull-right">

                  <a href="<?php echo PATO; ?>entrada/salir/" class="btn btn-default btn-flat">Salir</a>

                </div>

              </li>

            </ul>

          </li>

          <!-- Control Sidebar Toggle Button -->

          <li>

            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>

          </li>

          </ul>

        </div>



      </nav>

    </header>

    <!-- Left side column. contains the logo and sidebar -->

    <aside class="main-sidebar">

      <!-- sidebar: style can be found in sidebar.less -->

      <section class="sidebar">

        <!-- Sidebar user panel -->

        <div class="user-panel">




          <!-- /.search form -->

          <!-- sidebar menu: : style can be found in sidebar.less -->

          <ul class="sidebar-menu" data-widget="tree">

            <li class="header">MENU</li>







            <?php if ($_SESSION['sede'] == 99 or is_null($_SESSION['sede'])) { ?>
              <li>

                <a href="<?php echo PATO; ?>admins/">

                  <i class="fa fa-user" title="Usuarios"></i> <span>Administradores</span>

                  <span class="pull-right-container">



                  </span>

                </a>

              </li>
            <?php } ?>
            <?php if ($_SESSION['sede'] > 0) { ?>
              <?php if ($_SESSION['sede'] == 99) { ?>
                <li>

                  <a href="<?php echo PATO; ?>sedes/">

                    <i class="fa fa-building-o" title="Sedes"></i> <span>Sedes</span>

                    <span class="pull-right-container">



                    </span>

                  </a>

                </li>
              <?php } else { ?>
                <li>

                  <a href="<?php echo PATO; ?>usuarios/">

                    <i class="fa fa-user" title="Usuarios"></i> <span>Usuarios</span>

                    <span class="pull-right-container">



                    </span>

                  </a>

                </li>

                <li>

                  <a href="<?php echo PATO; ?>pedidos/">

                    <i class="fa fa-pencil-square-o" title="Sedes"></i> <span>Pedidos</span>

                    <span class="pull-right-container">



                    </span>

                  </a>

                </li>

              <?php   }
            } else { ?>
              <li>

                <a href="<?php echo PATO; ?>">

                  <i class="fa fa-dashboard" title="Dashboard"></i> <span>Dashboard</span>

                  <span class="pull-right-container">



                  </span>

                </a>

              </li>
              <li>

                <a href="<?php echo PATO; ?>configuraciones/">

                  <i class="fa fa-gear" title="Configuraciones"></i> <span>Configuraciones</span>

                  <span class="pull-right-container">



                  </span>

                </a>

              </li>
              <li>

                <a href="<?php echo PATO; ?>facturas/">

                  <i class="fa fa-money" title="Facturas"></i> <span>Recibos</span>

                  <span class="pull-right-container">



                  </span>

                </a>

              </li>


              <li class="treeview">

                <a href="#">

                  <i class="fa fa-archive" title="Bases Generales"></i>

                  <span>Bases Generales</span>

                  <span class="pull-right-container">

                    <i class="fa fa-angle-left pull-right"></i>

                  </span>

                </a>

                <ul class="treeview-menu">



                  <li><a href="<?php echo PATO; ?>escuelas/"><i class="fa fa-circle-o"></i> Escuelas</a></li>



                  <li><a href="<?php echo PATO; ?>datos/"><i class="fa fa-circle-o"></i> Datos</a></li>
                  <li><a href="<?php echo PATO; ?>estudiantes/"><i class="fa fa-circle-o"></i> Estudianes</a></li>

                  <!-- <li><a href="<?php echo PATO; ?>grados/"><i class="fa fa-circle-o"></i> Grados</a></li>

                <li><a href="<?php echo PATO; ?>companias/"><i class="fa fa-circle-o"></i> Compañias</a></li> -->

                  <li><a href="<?php echo PATO; ?>bancos/"><i class="fa fa-circle-o"></i> Bancos</a></li>




                </ul>

              </li>

              <li class="treeview">

                <a href="#">

                  <i class="fa fa-pie-chart" title="Reportes"></i>

                  <span>Reportes</span>

                  <span class="pull-right-container">

                    <i class="fa fa-angle-left pull-right"></i>

                  </span>

                </a>

                <ul class="treeview-menu">

                  <li><a href="<?php echo PATO; ?>pagos/"><i class="fa fa-circle-o"></i> Pagos</a></li>

                  <li><a href="<?php echo PATO; ?>facturasgeneradas/"><i class="fa fa-circle-o"></i> Recibos Generados</a></li>







                </ul>

              </li>
            <?php    } ?>

          </ul>

      </section>

      <!-- /.sidebar -->

    </aside>
    <div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="modalIMG" role="dialog" tabindex="-1">
      <div class="modal-dialog modal-lg" role="document">

        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span></button>
            <h4 class="modal-title"><?php echo MODULO; ?></h4>
          </div>
          <div class="modal-body mb-0 p-0">
            <div aling="center"> <video width="800" height="400" controls>
                <source src="<?php echo PATU; ?>img/videotutoriales/<?php echo MODULO; ?>.mp4" type="video/mp4">
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