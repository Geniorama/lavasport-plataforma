<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>multilaundry platform</title>
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
    background: radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0, .8));

  background: -webkit-radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0,.8));
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
  -webkit-box-shadow: rgba(255,255,255, 0.75) 1.5em 0 0 0, rgba(255,255,255, 0.75) 1.1em 1.1em 0 0, rgba(255,255,255, 0.75) 0 1.5em 0 0, rgba(255,255,255, 0.75) -1.1em 1.1em 0 0, rgba(255,255,255, 0.75) -1.5em 0 0 0, rgba(255,255,255, 0.75) -1.1em -1.1em 0 0, rgba(255,255,255, 0.75) 0 -1.5em 0 0, rgba(255,255,255, 0.75) 1.1em -1.1em 0 0;
box-shadow: rgba(255,255,255, 0.75) 1.5em 0 0 0, rgba(255,255,255, 0.75) 1.1em 1.1em 0 0, rgba(255,255,255, 0.75) 0 1.5em 0 0, rgba(255,255,255, 0.75) -1.1em 1.1em 0 0, rgba(255,255,255, 0.75) -1.5em 0 0 0, rgba(255,255,255, 0.75) -1.1em -1.1em 0 0, rgba(255,255,255, 0.75) 0 -1.5em 0 0, rgba(255,255,255, 0.75) 1.1em -1.1em 0 0;
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
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
<script src="<?php echo PATU; ?>dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo PATU; ?>dist/js/demo.js"></script>
<script src="<?php echo PATU; ?>js/bootstrap-toggle.min.js"></script>
<script src="<?php echo PATU; ?>js/starrr.js"></script>
<script src="<?php echo PATU; ?>bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo PATU; ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script>
$(window).on('beforeunload ',function() {
    $("#carga").show();
});
  </script>
      </head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>C</b>L</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Control</b> Lavanderia</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
       
            
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
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo PATO; ?>entrada/salir/" class="btn btn-default btn-flat">Sign out</a>
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
 
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
       
     <?php if($_SESSION['perfil']==1 OR $_SESSION['perfil']==2){ ?>
        <li>
          <a href="<?php echo PATO; ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo PATO; ?>admins/">
            <i class="fa fa-user"></i> <span>Usuarios</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        <?php if($_SESSION['perfil']==1){ ?>
        <li>
          <a href="<?php echo PATO; ?>organizaciones/">
            <i class="fa fa-address-card"></i> <span>organizaciones</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        <?php } ?>
        <li>
          <a href="<?php echo PATO; ?>clientes/">
            <i class="fa fa-address-card"></i> <span>Clientes</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
       
        <li>
          <a href="<?php echo PATO; ?>productos/">
            <i class="fa fa-tag"></i> <span>Prendas</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo PATO; ?>cupos/">
          
            <i class="fa fa-balance-scale"></i> <span>Cupos</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo PATO; ?>ordenes/">
          
            <i class="fa fa-pencil-square-o"></i> <span>Ordenes</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-archive"></i>
            <span>Bases Generales</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo PATO; ?>companias/"><i class="fa fa-circle-o"></i> Companias</a></li>
            <li><a href="<?php echo PATO; ?>grados/"><i class="fa fa-circle-o"></i> Grados</a></li>
            <li><a href="<?php echo PATO; ?>observaciones/"><i class="fa fa-circle-o"></i> Observaciones</a></li>
          

          </ul>
        </li>
     <?php } ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Reportes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo PATO; ?>lavados/"><i class="fa fa-circle-o"></i>  Reporte 1</a></li>
            <li><a href="<?php echo PATO; ?>lavados/"><i class="fa fa-circle-o"></i>  Reporte 2</a></li>
          
            <li><a href="<?php echo PATO; ?>lavados/"><i class="fa fa-circle-o"></i>  Reporte 3</a></li>
          
          </ul>
        </li>
        
        <li>
          <a href="<?php echo PATO; ?>extrasentradas/">
          
          <i class="fa fa-arrow-right"></i> <i class="fa fa fa-dropbox"></i> <span>Entrada Extras</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo PATO; ?>productocupos/">
          
          <i class="fa fa-arrow-right"></i> <i class="fa fa-balance-scale"></i> <span>Entrada Cupos</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
           
        <li>
          <a href="<?php echo PATO; ?>productocupos/salidas/">
          
          <i class="fa fa-arrow-right"></i> <i class="fa fa fa-sign-out"></i> <span>Salidas</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

 
   
