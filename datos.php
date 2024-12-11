<?php
error_reporting(0);
session_destroy();
require_once('access/inc/adodb5/adodb.inc.php');
require_once('access/inc/class.phpmailer.php');
require_once('access/inc/config.php');
require_once('access/inc/db.php');
$db = ADONewConnection(DB_TIPO);
$db->debug = DB_DEBUG;
$db->Connect(DB_SERVER, DB_USER, DB_CLAVE, DB_DB);
$db->SetFetchMode(ADODB_FETCH_ASSOC);
 $sqldat = "SELECT * FROM datos WHERE documento='" . $_POST["documento"] . "' AND bandera=1";
 $verificardatos1 = $db->Execute($sqldat);
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
  </style>
</head>

<body>

  <div class="container">
    <form id="contact-form" method="post" action="recibo.php" role="form">
      <div class="messages"></div>
      <div class="controls">
        <div class="row">
          <img src="assets/img/logo.png" class="img-fluid logo" alt="Responsive image">
          <h2 class="tituLog">SERVICIO INSTITUCIONAL <br> ESMIC <span>/</span> ENAP <span>/</span> EMSUB</h2>

        </div>
        <div class="row">
          <h2 class="tituLog">ACTUALICE LOS SIGUIENTES DATOS</h2>
        </div>
        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
              <label for="form_email">Tipo de Documento *</label>
              <select id="tipodoc" name="tipodoc" class="form-control" onchange="mostraacud()">
                <option value="1" <?php if($verificardatos1->fields["tipodoc"]==1){ echo "selected";} ?>>CC</option>
                <option value="2" <?php if($verificardatos1->fields["tipodoc"]==2){ echo "selected";} ?>>TI</option>
				<option value="3"  <?php if($verificardatos1->fields["tipodoc"]==3){ echo "selected";} ?>>CE</option>
              </select>
              <div class="help-block with-errors"></div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label for="form_name">Documento *</label>
              <input id="documento" type="text" name="documento" min="0" max="9" onKeyPress="return validarNumero(event)" value="<?php echo $_POST["documento"]; ?>" class="form-control" placeholder="Ingrese el Documento*" required="required" data-error="Documento es Requerido">
              <div class="help-block with-errors"></div>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="form-group">
              <label for="form_phone">Fecha de Nacimiento *</label>
              <input id="nacimiento" type="date" name="nacimiento" value="<?php echo $verificardatos1->fields["nacimiento"]; ?>" required="required" class="form-control" placeholder="Fecha de Nacimiento">
              <div class="help-block with-errors"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>

      <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
            <label for="form_name">Primer Apellido *</label>
            <input id="apellido1" type="text" name="apellido1" value="<?php echo $verificardatos1->fields["apellido1"]; ?>" class="form-control" placeholder="Ingrese el Pimer Apellido *" required="required" data-error="Primer Apellido Rquerido.">
            <div class="help-block with-errors"></div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="form_email">Segundo Apellido *</label>
            <input id="apellido2" type="text" name="apellido2" value="<?php echo $verificardatos1->fields["apellido2"]; ?>" class="form-control" placeholder="Ingrese el Segundo Apellido *" required="required" data-error="Segundo Apellido Requerido.">
            <div class="help-block with-errors"></div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="form_phone">Nombres *</label>
            <input id="nombres" type="text" name="nombres" value="<?php echo $verificardatos1->fields["nombres"]; ?>" class="form-control" placeholder="Ingrese los Nombres *" required="required" data-error="Nombres Requeridos.">
            <div class="help-block with-errors"></div>
          </div>
        </div>
      </div>

      <div class="row">

        <div class="col-sm-6">
          <div class="form-group">
            <label for="form_email">Email *</label>
            <input id="correo" type="email" name="correo" class="form-control" value="<?php echo $verificardatos1->fields["correo"]; ?>" placeholder="Ingrese el Correo Electronico *" required="required" data-error="El Correo Electronico es requerido">
            <div class="help-block with-errors"></div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="form_phone">Telefono</label>
            <input id="telefono" type="tel" name="telefono" value="<?php echo $verificardatos1->fields["telefono"]; ?>" class="form-control" placeholder="Ingrese El Telefono *" required="required" data-error="El Telefono  es requerido">
            <div class="help-block with-errors"></div>
          </div>
        </div>
   <!--  <div class="col-sm-4">
          <div class="form-group">
            <label for="form_phone">Solicitar Código de verificación para Continuar (código al whatsapp y correo Electronico)</label>
            <input type="button" onclick="enviarCodigo()" class="btn btn-primary btn-send" value="Solicitar Código">
          </div>
        </div> -->

      </div>

      <div class="row" id="racud1">
        <div class="col-sm-4">
          <div class="form-group">
            <label for="form_email">Documento del Acudiente *</label>
            <input id="docacudiente" type="text" name="docacudiente" value="<?php echo $verificardatos1->fields["docacudiente"]; ?>" required="required" class="form-control" placeholder="Ingrese el Documento del Acudiente ">
            <div class="help-block with-errors"></div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="form_phone">Acudiente Primer Apellido</label>
            <input id="apellidoacudiente" type="text" name="apellidoacudiente" value="<?php echo $verificardatos1->fields["apellidoacudiente"]; ?>" required="required" class="form-control" placeholder="Ingrese El Apellido Del Acudiente *">
            <div class="help-block with-errors"></div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="form_phone">Acudiente Segundo Apellido</label>
            <input id="apellido2acudiente" type="text" name="apellido2acudiente" value="<?php echo $verificardatos1->fields["apellido2acudiente"]; ?>" required="required" class="form-control" placeholder="Ingrese El Apellido Del Acudiente *">
            <div class="help-block with-errors"></div>
          </div>
        </div>
      </div>
      <div class="row" id="racud2">

        <div class="col-sm-4">
          <div class="form-group">
            <label for="form_email">Nombres del Acudiente *</label>
            <input id="nombresacudiente" type="text" name="nombresacudiente" value="<?php echo $verificardatos1->fields["nombresacudiente"]; ?>" required="required" class="form-control" placeholder="Nombres del Acudiente">
            <div class="help-block with-errors"></div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="form_phone">Correo Electronico del Acudiente *</label>
            <input id="correoacudiente" type="email" name="correoacudiente" value="<?php echo $verificardatos1->fields["correoacudiente"]; ?>" required="required" class="form-control" placeholder="Ingrese El Correo Electronico *">
            <div class="help-block with-errors"></div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="form_phone">Celular del Acudiente</label>
            <input id="numeroacudiente" type="tel" name="numeroacudiente" value="<?php echo $verificardatos1->fields["numeroacudiente"]; ?>" required="required" class="form-control" placeholder="Ingrese El Numero Celular del Acudiente *">
            <div class="help-block with-errors"></div>
          </div>
        </div>
      </div>
  <!--  <div class="row" style="display:none" id="codigoe1">
        <div class="col-md-6">
          <input id="codigo" type="text" name="codigo" class="form-control" placeholder="Código de verificación">
        </div>
        <div class="col-md-6">

          <input type="button" onclick="verificarcodigo()" class="btn btn-primary btn-send" value="Verificar">
        </div>
      </div>  -->
	  
	      <div class="row" id="codigoe1">
        
        <div class="col-md-12">

          <input type="button" onclick="verificarcodigo()" class="btn btn-primary btn-send" value="Enviar">
        </div>
      </div> 
     
 
  </div>
<input type="hidden" name="dataval" id="dataval" value="<?php echo $verificardatos1->_numOfRows; ?>">
  </form>
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
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Alerta</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          se a enviado un codigo a su telefono Registrado via whatsapp y a su correo electronico, si no llega en los proximos 2 minutos vuelva a intentarlo.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

        </div>
      </div>
    </div>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

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

    function mostraacud() {
      if ($("#tipodoc").val() == 2) {
        $("#racud1").show();
        $("#racud2").show();
      } else {
        $("#racud1").hide();
        $("#racud2").hide();


      }
      id = "racud1"
      style = "display:none"

    }

    function verificarcheck() {

      if ($("#documento").val() != "") {
        if ($('#checkbox1').prop('checked') && $('#checkbox2').prop('checked')) {

          document.getElementById('formulario1').submit();
        } else {

          alert("Es necesario aceptar el Contrato De Servicio y las Politicas de tratamiento de datos para continuar.");
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

    function enviarCodigo() {

      $.ajax({
        type: "POST",
        url: "enviarcodigo.php",
        data: "numero=" + $("#telefono").val()+"&email="+$("#correo").val(),


        success: function(datos) {
          $('#myModal').modal('show');
          $("#codigoe1").show();
        }


      });


    }
/*
   function verificarcodigo() {
      $.ajax({
        type: "POST",
        url: "verificarcodigo.php",
        data: "codigo=" + $("#codigo").val(),


        success: function(datos) {
          if (datos == "1") {

            var form = $('#contact-form');

            // Trigger HTML5 validity.
            var reportValidity = form[0].reportValidity();

            // Then submit if form is OK.
            if (reportValidity) {
              form.submit();
            }


          } else {

            alert("codigo incorrecto");

          }




        }


      });


    }
    */
    
     function verificarcodigo() {
    var form = $('#contact-form');

            // Trigger HTML5 validity.
            var reportValidity = form[0].reportValidity();

            // Then submit if form is OK.
            if (reportValidity) {
              form.submit();
            }


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