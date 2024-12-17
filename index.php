<?php
session_destroy();
require_once('access/inc/adodb5/adodb.inc.php');
require_once('access/inc/class.phpmailer.php');
require_once('access/inc/config.php');
require_once('access/inc/db.php');
$db = ADONewConnection(DB_TIPO);
$db->debug = DB_DEBUG;
$db->Connect(DB_SERVER, DB_USER, DB_CLAVE, DB_DB);
$db->SetFetchMode(ADODB_FETCH_ASSOC);
$sql1 = "SELECT contrato FROM configuraciones";
$config =  $db->Execute($sql1);
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link href="assets/css/main.css" rel="stylesheet">

  <title>LavaSport</title>
  <style>
    .btn-whatsapp {
      display: block;
      width: 70px;
      height: 70px;
      color: #fff;
      position: fixed;
      right: 20px;
      bottom: 20px;
      border-radius: 50%;
      line-height: 80px;
      text-align: center;
      z-index: 999;
    }

    .btn-informacion {
      font-family: 'Montserrat', sans-serif;
      font-weight: 700;
      background: #000;
      color: #fff;
      padding: 8px 17px;
      /* display: inline-block; */
      border-radius: 10px;
      display: block;
      width: 150px;
      /* height: 70px; */
      position: fixed;
      right: 120px;
      bottom: 20px;
      /* line-height: 80px; */
      text-align: center;
      z-index: 999;
    }

    .modal,
    body.modal-open {
      padding-right: 0 !important
    }

    body.modal-open {
      overflow: auto
    }

    /* body.scrollable {
      overflow-y: auto
    } */

    .modal-footer {
      display: flex;
      justify-content: flex-start;

      .btn {
        position: absolute;
        right: 10px;
      }
    }

    .formLog .checkbox input[type="checkbox"]:checked+label a{
      color: white !important;
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
        <img src="assets/img/logo.png" class="img-fluid logo" alt="Responsive image">
        <h2 class="tituLog">SERVICIO INSTITUCIONAL <br> ESMIC <span>/</span> EMSUB</h2>
        <form class="formLog" id="formulario1" action="datos.php" method="POST">
          <p>Los campos con asterisco (<span style="color: red">*</span>) son obligatorios:</p>
          <div class="form-group">
            <input autofocus type="number" name="documento" id="documento" min="0" max="9" onKeyPress="return validarNumero(event)" maxlength="11" class="form-control inp1" placeholder="Documento de identidad*">
          </div>
          <!-- <div class="pLog" id="contrato"><?php // echo $config->fields["contrato"]; 
                                                ?>
          </div> -->
          <div class="checkbox">
            <input type="checkbox" name="checkbox" id="checkbox1">
            <label for="checkbox1">He leído y aceptado el <a target="_blank" href="contrato-prestacion-servicio_v03_12_2024.pdf">Contrato de Prestación de Servicio LavaSport con Usuario / Alumno</a> <span style="color: red">*</span></label>
          </div>
          <div class="checkbox">
            <input type="checkbox" name="checkbox2" id="checkbox2">
            <label for="checkbox2">He leído y aceptado la <a target="_blank" href="tratamiento-datos.pdf">Política de Tratamiento de Datos</a> <span style="color: red">*</span></label>
          </div>
          <div class="checkbox">
            <input type="checkbox" name="checkbox3" id="checkbox3">
            <label for="checkbox3">Acepto el <a target="_blank" href="terminos_y_garantias_sept_2024.pdf">Procedimiento Garantía de Servicio LavaSport S.A.S</a> <span style="color: red">*</span></label>
          </div>
          <div class="checkbox">
            <input type="checkbox" name="checkbox4" id="checkbox4">
            <label for="checkbox4">Acepto el <a target="_blank" href="contrato-prestacion-servicio_alianza_sistecredito_v03_12_2024.pdf">Contrato de Prestación de Servicios Alianza Sistecrédito</a></label>
          </div>
          <button type="button" onclick="verificarcheck()" id="botonfactura" class="btn btnlog">Continuar</button>
        </form>
      </div>
    </div>
  </div>

  <div class="box-log">
    <div class="container">
      <p class="tpasos">SIGUE ESTOS PASOS</p>
      <div class="esp"></div>
      <div class="row ancho">
        <div class="col-sm">
          <img src="assets/img/icon1.png" class="img-fluid imgblue">
          <p class="tblue">Ingresa tu número de identificación sin<br> puntos ni comas, lee el contrato de<br> prestación de servicios y da clic en<br> generar recibo.</p>
        </div>
        <div class="col-sm">
          <img src="assets/img/icon2.png" class="img-fluid imgblue">
          <p class="tblue">Aparecerá en pantalla el<br> recibo de pago, verifica que<br> tus datos personales estén <br> correctos.</p>
        </div>
        <div class="col-sm">
          <img src="assets/img/icon3.png" class="img-fluid imgblue">
          <p class="tblue">Allí puedes imprimir, <br>descargar el recibo o<br> pagar en línea.</p>
        </div>
      </div>
      <div class="esp"></div>
      <div class="esp"></div>
      <div class="row ancho">
        <div class="col-sm-4 offset-sm-2">
          <img src="assets/img/icon4.png" class="img-fluid imgblue">
          <p class="tblue">Al Imprimir el recibo, ten en<br> cuenta que la impresión<br> debe de ser en laser.</p>
        </div>
        <div class="col-sm-4">
          <img src="assets/img/icon5.png" class="img-fluid imgblue">
          <p class="tblue">El pago lo realizas en<br> el banco que indique<br> el recibo.</p>
        </div>
      </div>
      <div class="esp"></div>
      <div class="esp"></div>
      <div class="row ancho">
        <div class="col-sm-7">
          <div class="row">
            <div class="col-2 col-sm-3" style="text-align: right;">
              <img src="assets/img/icon6.png" class="img-fluid">
            </div>
            <div class="col-10 col-sm-9">
              <p class="corre">Si tienes alguna inquietud escríbenos al correo:<span><a href="mailto:contabilidad@lavasport.com.co">
                    contabilidad@lavasport.com.co</a></span></p>
            </div>
          </div>
        </div>
        <div class="col-sm-5">
          <div class="row">
            <div class="col-2 col-sm-3" style="text-align: right;">
              <img src="assets/img/icon7.png" class="img-fluid">
            </div>
            <div class="col-10 col-sm-9">
              <p class="corre">O comunícate al<span>
                  320 835 6823</span></p>
            </div>
          </div>
        </div>
      </div>
      <div class="esp"></div>
      <div class="row ancho">
        <div class="col-sm-8 offset-sm-2">
          <div class="row">
            <div class="col-2 col-sm-2 col-lg-3" style="text-align: right;">
              <img src="assets/img/icon8.png" class="img-fluid">
            </div>
            <div class="col-10 col-sm-10 col-lg-9 cont">
              <br>
              <p><a style="text-decoration:none;color:#fff" href="contrato-prestacion-servicio.pdf" target="_blank">Contrato de prestación de servicios</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <div class="btn-whatsapp">
    <a href="https://api.whatsapp.com/send?phone=+573208356823" target="_blank">
      <img src="http://s2.accesoperu.com/logos/btn_whatsapp.png" alt="">
    </a>
  </div>
  <div class="btn-informacion"><a data-target="#modalIMG" style="text-decoration:none;color: white;" data-toggle="modal" href="#">Como Pagar?</a></div>
  <div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="modalIMG" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-body mb-0 p-0">
          <img src="img/pasospago.jpeg" alt="" style="width:100%">
        </div>
        <div class="modal-footer">
          <button class="btn btn-outline-primary btn-rounded btn-md ml-4 text-center" data-dismiss="modal" type="button">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <script>
    $('#contrato').on('scroll', function() {
      if ($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
        $("#botonfactura").show();
      }
    });

    function mostrarbtn() {
      $("#botonfactura").show();

    }

    function verificarcheck() {

      if ($("#documento").val() != "") {
        if ($('#checkbox1').prop('checked') && $('#checkbox2').prop('checked') && $('#checkbox3').prop('checked')) {

          document.getElementById('formulario1').submit();
        } else {

          alert("Es necesario aceptar todos los campos marcados con (*) para continuar.");
        }

      } else {
        alert("es necesario digitar el documento");
        $("#documento").focus();

      }
    }

    function validarNumero(e) {
      tecla = (document.all) ? e.keyCode : e.which;
      if (tecla == 8) return true;
      patron = /[0-9]/;
      te = String.fromCharCode(tecla);
      return patron.test(te);
    }

    <?php
    if (isset($_GET["error"]) && $_GET["error"] == 3) {

      echo "alert('No Se Encuentra Recibos Relacionados - Por Favor Intentarlo Con El Numero De Cedula o Tarjeta De Identidad-Cualquier Duda o Inquietud Con Gusto Sera Atendida Cel.3208356823 Tel.2158573')";
    }
    if (isset($_GET["error"]) && $_GET["error"] == 4) {

      echo "alert('El pago del recibo ya esta generado en su totalidad -Cualquier Duda o Inquietud Con Gusto Sera Atendida Cel.3208356823 Tel.2158573')";
    }
    ?>
  </script>
</body>

</html>