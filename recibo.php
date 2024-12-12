<?php
require_once('access/inc/adodb5/adodb.inc.php');
require_once('access/inc/class.phpmailer.php');
require_once('access/inc/config.php');
require_once('access/inc/db.php');
session_start();
date_default_timezone_set('America/Bogota');
//include_once('ean128/EAN128-4php.php');
class recibo
{

    public $db;

    function __construct()
    {
        $this->db = ADONewConnection(DB_TIPO);
        $this->db->debug = DB_DEBUG;
        $this->db->Connect(DB_SERVER, DB_USER, DB_CLAVE, DB_DB);
        $this->db->SetFetchMode(ADODB_FETCH_ASSOC);
        $this->db->setCharset('utf8');
    }

    function __destruct()
    {
        $this->db->close();
    }

    public function mostrarrecibo($docummento)
    {


        $sql1 = "SELECT * FROM configuraciones";
        $config =  $this->db->Execute($sql1);
        $sql0 = "SELECT * FROM facturasestudiantes WHERE estudiante_id IN (SELECT id FROM estudiantes WHERE documento='" . $docummento . "') AND factura_id IN (SELECT id FROM facturas)";
        $verificares = $this->db->Execute($sql0);
        $sql = "SELECT facturas.*,escuelas.escuela,escuelas.nombre AS nombre_escuela,estudiantes.documento,estudiantes.id AS id_estudiante,estudiantes.nombre,estudiantes.apellido1,estudiantes.apellido2,estudiantes.curso,b1.cuenta as cuenta_b1,b2.cuenta as cuenta_b2,b3.cuenta as cuenta_b3,b4.cuenta as cuenta_b4,b1.nombre AS nombre_banco1,b1.numero  AS numero_banco1,b2.nombre AS nombre_banco2,b2.numero  AS numero_banco2,b3.nombre AS nombre_banco3,b3.numero  AS numero_banco3,b4.nombre AS nombre_banco4,b4.numero AS numero_banco4 FROM facturas LEFT JOIN escuelas ON escuelas.id=facturas.escuela_id LEFT JOIN estudiantes ON estudiantes.escuela_id=escuelas.codigo LEFT JOIN bancos AS b1 ON b1.id=facturas.banco1 LEFT JOIN bancos AS b2 ON b2.id=facturas.banco2 LEFT JOIN bancos AS b3 ON b3.id=facturas.banco3 LEFT JOIN bancos AS b4 ON b4.id=facturas.banco4 WHERE facturas.id NOT IN (SELECT factura_id FROM facturasestudiantes) AND estudiantes.documento ='" . $docummento . "' AND NOW() BETWEEN facturas.inicio AND facturas.fin";
        //  echo $sql;
        if ($verificares->_numOfRows > 0) {
            $sql = "SELECT facturas.*,escuelas.escuela,escuelas.nombre AS nombre_escuela,estudiantes.documento,estudiantes.id AS id_estudiante,estudiantes.nombre,estudiantes.apellido1,estudiantes.apellido2,estudiantes.curso,b1.cuenta as cuenta_b1,b2.cuenta as cuenta_b2,b3.cuenta as cuenta_b3,b4.cuenta as cuenta_b4,b1.nombre AS nombre_banco1,b1.numero  AS numero_banco1,b2.nombre AS nombre_banco2,b2.numero  AS numero_banco2,b3.nombre AS nombre_banco3,b3.numero  AS numero_banco3,b4.nombre AS nombre_banco4,b4.numero AS numero_banco4 FROM facturas LEFT JOIN escuelas ON escuelas.id=facturas.escuela_id LEFT JOIN estudiantes ON estudiantes.escuela_id=escuelas.codigo LEFT JOIN bancos AS b1 ON b1.id=facturas.banco1 LEFT JOIN bancos AS b2 ON b2.id=facturas.banco2 LEFT JOIN bancos AS b3 ON b3.id=facturas.banco3 LEFT JOIN bancos AS b4 ON b4.id=facturas.banco4 WHERE estudiantes.id=" . $verificares->fields["estudiante_id"] . " AND facturas.id =" . $verificares->fields["factura_id"] . " AND NOW() BETWEEN facturas.inicio AND facturas.fin";
        }
        // echo $sql;
        $data =  $this->db->Execute($sql);

        if ($data->_numOfRows > 0) {

            $hoy = date("Y-m-d");
            //$sqlpagos = "SELECT SUM(valor) as valor FROM pagos WHERE '" . $hoy . "' BETWEEN '" . $data->fields["inicio"] . "' AND '" . $data->fields["fin"] . "' AND estudiante='" . $docummento . "'";
            $sqlpagos = "SELECT SUM(valor) as valor FROM pagos WHERE fecha BETWEEN '" . $data->fields["inicio"] . "' AND '" . $data->fields["fin"] . "' AND estudiante='" . $docummento . "'";
            $datapago =  $this->db->Execute($sqlpagos);
            if (round($datapago->fields["valor"]) >= round($data->fields["valor1"])) {

                header("location: index.php?error=4");
            } else {


                    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {

                        $ip = $_SERVER['HTTP_CLIENT_IP'];
                    } else {

                        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {

                            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                        } else {

                            $ip = $_SERVER['REMOTE_ADDR'];
                        }
                    }
                    //insertar datos 
                    $entra["factura_id"] = $data->fields["id"];
                    $entra["estudiante_id"] = $data->fields["id_estudiante"];
                    $entra["imprimio"] = 0;
                    $entra["pdf"] = 0;
                    $entra["fecha"] = date("Y-m-d H:i:s");
                    $entra["ip"] =  $ip;
                    if (isset($_SESSION["id_sessionf"]) && $_SESSION["id_sessionf"] > 0) {
                    } else {
                        if ($this->db->AutoExecute("facturasgeneradas", $entra, "INSERT") == false) {
                            //  return 0;
                        } else {
                            $_SESSION["id_sessionf"] = $this->db->INSERT_ID();
                            // return $this->db->INSERT_ID();
                        }
                    }
          
            }
        } else {
            header("location: index.php?error=3");
        }
        $f1 = str_replace("-", "", $data->fields["fecha1"]);
        $f2 = str_replace("-", "", $data->fields["fecha2"]);
        $fp1 = str_replace("-", "", $data->fields["cuotafecha1"]);
        $fp2 = str_replace("-", "", $data->fields["cuotafecha2"]);
        $fp3 = str_replace("-", "", $data->fields["cuotafecha3"]);
        // $barcode1 =  "\xCF" . $config->fields["codigobarras1"] . $data->fields["documento"] . "\xCF" . $config->fields["codigobarras2"] . round($data->fields["valor1"]) . "\xCF" . $config->fields["codigobarras3"] . $f1;
        // $barcode2 =  "\xCF" . $config->fields["codigobarras1"] . $data->fields["documento"] . "\xCF" . $config->fields["codigobarras2"] . round($data->fields["valor2"]) . "\xCF" . $config->fields["codigobarras3"] . $f2;
        // $barcodep1 =  "\xCF" . $config->fields["codigobarras1"] . $data->fields["documento"] . "\xCF" . $config->fields["codigobarras2"] . round($data->fields["cuotavalor1"]) . "\xCF" . $config->fields["codigobarras3"] . $fp1;
        // $barcodep2 =  "\xCF" . $config->fields["codigobarras1"] . $data->fields["documento"] . "\xCF" . $config->fields["codigobarras2"] . round($data->fields["cuotavalor2"]) . "\xCF" . $config->fields["codigobarras3"] . $fp2;
        // $barcodep3 =  "\xCF" . $config->fields["codigobarras1"] . $data->fields["documento"] . "\xCF" . $config->fields["codigobarras2"] . round($data->fields["cuotavalor3"]) . "\xCF" . $config->fields["codigobarras3"] . $fp3;

?>


        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link href="assets/css/main2.css" rel="stylesheet">

        <title>LavaSport</title>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

        <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
        <script src='jsPDF-master/dist/jspdf.debug.js'></script>
        <!-- <script src="JsBarcode-master/dist/JsBarcode.all.js"></script> -->
        <script type="text/javascript" src="bwips/dist/bwip-js-min.js"></script>
        <script type="text/javascript" src="bwips/lib/symdesc.js"></script>
        <script type="text/javascript" src="bwips/lib/inconsolata.js"></script>
        <style>
            body {
                line-height: 1.0 !important;

            }

            /* input[type=checkbox] {
                transform: scale(2.5);
            } */

            #invoice {
                padding: 1px;
            }

            .invoice {
                position: relative;
                background-color: #FFF;
                min-height: 680px;
                padding: 7px
            }

            .invoice header {
                padding: 1px 0;
                margin-bottom: 10px;
                border-bottom: 1px solid <?php echo $config->fields["color_tema"]; ?>
            }

            .invoice .company-details {
                text-align: center
            }

            .invoice .company-details .name {
                margin-top: 0;
                margin-bottom: 0
            }

            .invoice .contacts {
                margin-bottom: 1px
            }

            .invoice .invoice-to {
                text-align: left
            }

            .invoice .invoice-to .to {
                margin-top: 0;
                margin-bottom: 0
            }

            .invoice .invoice-details {
                text-align: right
            }

            .invoice .invoice-details .invoice-id {
                margin-top: 0;
                color: <?php echo $config->fields["color_tema"]; ?>
            }

            .invoice main {
                padding-bottom: 25px
            }

            .invoice main .thanks {
                margin-top: -100px;
                font-size: 1em;
                margin-bottom: 50px
            }

            .invoice main .notices {
                padding-left: 6px;
                border-left: 6px solid <?php echo $config->fields["color_tema"]; ?>
            }

            .invoice main .notices .notice {
                font-size: 1.0em
            }

            .invoice table {
                width: 100%;
                border-collapse: collapse;
                border-spacing: 0;
                margin-bottom: 10px
            }

            .invoice table td,
            .invoice table th {
                padding: 5px;
                background: #eee;
                border-bottom: 1px solid #fff
            }

            .invoice table th {
                white-space: nowrap;
                font-weight: 400;
                font-size: 16px
            }

            .invoice table td h3 {
                margin: 0;
                font-weight: 400;
                color: <?php echo $config->fields["color_tema"]; ?>;
                font-size: 1.0em
            }

            .invoice table .qty,
            .invoice table .total,
            .invoice table .unit {
                text-align: right;
                font-size: 1.0em
            }

            .invoice table .no {
                color: <?php echo $config->fields["texto_titulo"]; ?>;
                font-size: 1em;
                background: <?php echo $config->fields["color_tema"]; ?>
            }

            .invoice table .unit {
                background: #ddd
            }

            .invoice table .total {
                background: <?php echo $config->fields["color_tema"]; ?>;
                color: #fff
            }

            .invoice table tbody tr:last-child td {
                border: none
            }

            .invoice table tfoot td {
                background: 0 0;
                border-bottom: none;
                white-space: nowrap;
                text-align: right;
                padding: 10px 20px;
                font-size: 1.0em;
                border-top: 1px solid #aaa
            }

            .invoice table tfoot tr:first-child td {
                border-top: none
            }

            .invoice table tfoot tr:last-child td {
                color: <?php echo $config->fields["color_tema"]; ?>;
                font-size: 1.0em;
                border-top: 1px solid <?php echo $config->fields["color_tema"]; ?>
            }

            .invoice table tfoot tr td:first-child {
                border: none
            }

            /* .invoice footer {
                width: 100%;
                text-align: center;
                color: #777;
                border-top: 1px dotted black;
                padding: 4px 0
            } */

            @media print {


                .invoice {
                    -webkit-print-color-adjust: exact !important;
                    printer-colors: exact !important;
                    color-adjust: exact !important;
                    /* font-size: 11px !important; */
                    overflow: hidden !important
                }

                .invoice footer {
                    position: absolute;
                    bottom: 10px;
                    page-break-after: always
                }

                .invoice>div:last-child {
                    page-break-before: always
                }
            }

            .subtitulocliente {
                /* text-overflow: ellipsis;
                    white-space: nowrap; */
                /* overflow: hidden; */
            }

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


            }
			
.custom-btn {
  border-radius: 50%;
  width: 100px;
  height: 100px;
  display: flex;
  justify-content: center;
  align-items: center;
  color: #00bd24;
  background-color: white;
  border: 2px solid #00bd24;
  transition: background-color 0.3s, color 0.3s, border-color 0.3s;
  margin: 0;
  font-size: 13px;
  line-height: 1.2em;
}

.custom-btn:hover {
  background-color: #00bd24;
  color: white;
  border-color: #00bd24;
}     </style>
        </head>

        <body>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Lavasport tiene un Mensaje para ti</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php echo $config->fields["mensaje"]; ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar Mensaje</button>

                        </div>
                    </div>
                </div>
            </div>
            <div id="menuprint">
                <div class="box2">
                    <img src="assets/img/logo2.png" class="img-fluid logo" alt="Responsive image">
                </div>

<div class="container mt-3">
  <div class="row">
    <div class="col-6 d-flex justify-content-end">
      <a href="javascript:return false;" onclick="pasarela()" class="btn btn-success btn-circle custom-btn">PAGUE AQUÍ</a>
    </div>
    <div class="col-6 d-flex justify-content-start">
      <a href="javascript:return false;" onclick="imprimir()" class="btn btn-success btn-circle custom-btn">PAGUE EN PUNTO FÍSICO</a>
    </div>
  </div>
</div>

            </div>

            <!------ Include the above in your HEAD tag ---------->

            <!--Author      : @arboshiki-->
            <div id="invoice">


                <div class="invoice overflow-auto">
                    <div style="min-width: 600px">
                        <header>
                            <div class="row align-items-center">
                                <div class="col">

                                    <img src="assets/img/logo.png" style="width: 185px" data-holder-rendered="true" />

                                </div>

                                <?php if ($data->fields["banco1"] > 0) { ?>
                                    <div class="col">

                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img class="img-fluid" style="max-width: 150px;" src="access/img/bancos/<?php echo $data->fields["banco1"] ?>foto.jpg" data-holder-rendered="true" />

                                    </div>
                                <?php } ?>
                                <?php if ($data->fields["banco2"] > 0) { ?>
                                    <div class="col">

                                        <img src="access/img/bancos/<?php echo $data->fields["banco2"] ?>foto.jpg" class="img-fluid" style="max-width: 150px;" data-holder-rendered="true" />

                                    </div>
                                <?php } ?>
                                <?php if ($data->fields["banco3"] > 0) { ?>
                                    <div class="col">

                                        <img src="access/img/bancos/<?php echo $data->fields["banco3"] ?>foto.jpg" class="img-fluid" style="max-width: 150px;" data-holder-rendered="true" />

                                    </div>
                                <?php } ?>

                                <?php if ($data->fields["banco4"] > 0) { ?>
                                    <div class="col">

                                        <img src="access/img/bancos/<?php echo $data->fields["banco4"] ?>foto.jpg" class="img-fluid" style="max-width: 150px;" data-holder-rendered="true" />

                                    </div>
                                <?php } ?>

                                <div class="col">

                                    <img src="access/img/bancos/logo-sistecredito.jpg" class="img-fluid" style="max-width: 150px;" data-holder-rendered="true" />

                                </div>

                                <div class="col">

                                    <img src="access/img/bancos/logo-openpay.jpg" class="img-fluid" style="max-width: 150px;" data-holder-rendered="true" />

                                </div>


                                <div class="col company-details">
                                    <h6 class="name">

                                        <?php echo $data->fields["escuela"]; ?>

                                    </h6>
                                    <div class="subtitulocliente">"<?php echo $data->fields["nombre_escuela"]; ?>"</div>

                                </div>
                                <div class="col">

                                    <img src="access/img/escuelas/<?php echo $data->fields["escuela_id"]; ?>foto.jpg" data-holder-rendered="true" />

                                </div>
                            </div>
                        </header>
                        <main>
                            <div class="row contacts">
                                <div class="col invoice-to">
                                    <!--<div class="text-gray-light">Nombre Alumno </div>-->
                                    <h5 class="to"><?php echo $data->fields["apellido1"];   ?> <?php echo $data->fields["apellido2"];   ?> <?php echo $data->fields["nombre"];   ?></h5>
                                    <div class="address">curso: <?php echo $data->fields["curso"];   ?></div>
                                    <div class="address">documento: <?php echo $data->fields["documento"];   ?></div>
                                </div>
                                <div class="col invoice-details">
                                    <!-- <h1 class="invoice-id">INVOICE 3-2-1</h1>-->
                                    <div class="date">Fecha Elaboración: <?php echo $data->fields["creado"];   ?>&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                    <div class="date">Periodo: <?php echo $data->fields["periodo"];   ?>&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                </div>
                            </div>

                            <table border="0" cellspacing="0" cellpadding="0">

                                <tr>

                                    <td class="no">Concepto</td>
                                    <td class="no">Valor</td>
                                    <td style="background: white !important;"></td>
                                    <td class="no"><?php if ($data->fields["cuotas"] == 0) {
                                                        echo "Fecha De Pago Ordinario Semestral";
                                                    } else {
                                                        echo "Fecha Pago Total";
                                                    } ?></td>
                                    <td><?php echo $data->fields["fecha1"];   ?> </td>
                                    <td class="no"><?php if ($data->fields["cuotas"] == 0) {
                                                        echo "Valor";
                                                    } else {
                                                        echo "Total";
                                                    } ?> a Pagar</td>
                                    <td class="unit"> $<?php echo number_format($data->fields["valor1"], 0, ",", ".");   ?>&nbsp;&nbsp;&nbsp; </td>
                                </tr>
                                <tr>

                                    <td> <?php echo $data->fields["concepto"];   ?></td>
                                    <td class="unit"> $<?php echo number_format($data->fields["valor1"], 0, ",", ".");   ?>&nbsp;&nbsp;&nbsp;</td>
                                    <td style="background: white !important;"></td>
                                    <?php if ($data->fields["cuotas"] == 0) { ?>
                                        <td class="no">Fecha Pago <?php if ($data->fields["tipov2"] == 0) {
                                                                        echo "Extraordinario";
                                                                    }
                                                                    if ($data->fields["tipov2"] == 1) {
                                                                        echo "Anual con Descuento año 2022";
                                                                    } ?></td>
                                        <td> <?php echo $data->fields["fecha2"];   ?></td>
                                        <td class="no">Valor a Pagar</td>
                                        <td class="unit"> $<?php echo number_format($data->fields["valor2"], 0, ",", ".");   ?>&nbsp;&nbsp;&nbsp; </td>

                                    <?php } else {
                                    ?>
                                        <td class="no">Fecha Cuota Pago 1</td>
                                        <td> <?php echo $data->fields["cuotafecha1"];   ?></td>
                                        <td class="no">Cuota Pago 1</td>
                                        <td class="unit"> $<?php echo number_format($data->fields["cuotavalor1"], 0, ",", ".");   ?>&nbsp;&nbsp;&nbsp;</td>

                                    <?php
                                    } ?>
                                </tr>

                                <?php if ($data->fields["cuotas"] > 0) { ?>
                                    <tr>

                                        <td style="background: white !important;"> </td>
                                        <td style="background: white !important;"> </td>
                                        <td style="background: white !important;"></td>
                                        <td class="no">Fecha Cuota Pago 2</td>
                                        <td> <?php echo $data->fields["cuotafecha2"];   ?></td>
                                        <td class="no">Cuota Pago 2</td>
                                        <td class="unit"> $<?php echo number_format($data->fields["cuotavalor2"], 0, ",", ".");   ?>&nbsp;&nbsp;&nbsp; </td>
                                    </tr>
                                <?php } ?>
                                <?php if ($data->fields["cuotavalor3"] > 0) { ?>
                                    <tr>

                                        <td style="background: white !important;"> </td>
                                        <td style="background: white !important;"> </td>
                                        <td style="background: white !important;"></td>
                                        <td class="no">Fecha Cuota Pago 3</td>
                                        <td> <?php echo $data->fields["cuotafecha3"];   ?></td>
                                        <td class="no">Cuota Pago 3</td>
                                        <td class="unit"> $<?php echo number_format($data->fields["cuotavalor3"], 0, ",", ".");   ?>&nbsp;&nbsp;&nbsp; </td>
                                    </tr>
                                <?php } ?>
                            </table>
                            <!-- <p class="text-center"><strong><?php echo $data->fields["nombre_banco1"];   ?> <?php echo $data->fields["cuenta_b1"];   ?> No. <?php echo $data->fields["numero_banco1"];   ?> <br>
                                    <?php echo $data->fields["nombre_banco2"];   ?> <?php echo $data->fields["cuenta_b2"];   ?> No. <?php echo $data->fields["numero_banco2"];   ?> <br>
                                    <?php echo $data->fields["nombre_banco3"];   ?> <?php echo $data->fields["cuenta_b3"];   ?> No. <?php echo $data->fields["numero_banco3"];   ?> <br>
                                    <?php if ($data->fields["banco4"] > 0) { ?> <?php echo $data->fields["nombre_banco4"];   ?> <?php echo $data->fields["cuenta_b4"];   ?> No. <?php echo $data->fields["numero_banco4"];   ?><br><?php } ?> LAVASPORT S.A.S. Nit 830085642-4</strong>

                            </p> -->

                            <div class="notices">

                                <div class="notice">Alumno <font style="font-size: 10px"><?php echo  $data->fields["comentario"]; ?></font>
                                </div>
                            </div>
                        </main>

                        <!-- <footer>
                        ----------------------------------------------------------------------------------
                    </footer> -->


                    </div>
                    <div class="col invoice-details">
                        <!-- <h1 class="invoice-id">INVOICE 3-2-1</h1>-->

                    </div>
                    <header>
                        <div class="row align-items-center">
                            <div class="col">

                                <img src="assets/img/logo.png" style="width: 185px" data-holder-rendered="true" />

                            </div>
                            <?php if ($data->fields["banco1"] > 0) { ?>
                                <div class="col">

                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img src="access/img/bancos/<?php echo $data->fields["banco1"] ?>foto.jpg" class="img-fluid" style="max-width: 150px;" data-holder-rendered="true" />

                                </div>
                            <?php } ?>
                            <?php if ($data->fields["banco2"] > 0) { ?>
                                <div class="col">

                                    <img src="access/img/bancos/<?php echo $data->fields["banco2"] ?>foto.jpg" class="img-fluid" style="max-width: 150px;" data-holder-rendered="true" />

                                </div>
                            <?php } ?>
                            <?php if ($data->fields["banco3"] > 0) { ?>
                                <div class="col">

                                    <img src="access/img/bancos/<?php echo $data->fields["banco3"] ?>foto.jpg" class="img-fluid" style="max-width: 150px;" data-holder-rendered="true" />

                                </div>
                            <?php } ?>

                            <?php if ($data->fields["banco4"] > 0) { ?>
                                <div class="col">

                                    <img src="access/img/bancos/<?php echo $data->fields["banco4"] ?>foto.jpg" class="img-fluid" style="max-width: 150px;" data-holder-rendered="true" />

                                </div>
                            <?php } ?>

                            <div class="col">

                                <img src="access/img/bancos/logo-sistecredito.jpg" class="img-fluid" style="max-width: 150px;" data-holder-rendered="true" />

                            </div>

                            <div class="col">

                                <img src="access/img/bancos/logo-openpay.jpg" class="img-fluid" style="max-width: 150px;" data-holder-rendered="true" />

                            </div>


                            <div class="col company-details">
                                <h6 class="name">

                                    <?php echo $data->fields["escuela"]; ?>

                                </h6>
                                <div class="subtitulocliente">"<?php echo $data->fields["nombre_escuela"]; ?>"</div>

                            </div>
                            <div class="col">

                                <img src="access/img/escuelas/<?php echo $data->fields["escuela_id"]; ?>foto.jpg" data-holder-rendered="true" />

                            </div>
                        </div>
                    </header>
                    <main>
                        <div class="row contacts">
                            <div class="col invoice-to">
                                <!--<div class="text-gray-light">Nombre Alumno </div>-->
                                <h5 class="to"><?php echo $data->fields["apellido1"];   ?> <?php echo $data->fields["apellido2"];   ?> <?php echo $data->fields["nombre"];   ?></h5>
                                <div class="address">curso: <?php echo $data->fields["curso"];   ?></div>
                                <div class="address">documento: <?php echo $data->fields["documento"];   ?></div>
                            </div>
                            <div class="col invoice-details">
                                <!-- <h1 class="invoice-id">INVOICE 3-2-1</h1>-->
                                <div class="date">Fecha Elaboración: <?php echo $data->fields["creado"];   ?>&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                <div class="date">Periodo: <?php echo $data->fields["periodo"];   ?>&nbsp;&nbsp;&nbsp;&nbsp;</div>
                            </div>
                        </div>

                        <table border="0" cellspacing="0" cellpadding="0">

                            <tr>

                                <td class="no">Efectivo</td>
                                <td class="no">Cheque</td>
                                <td style="background: white !important;"></td>
                                <td class="no"> <?php if ($data->fields["cuotas"] == 0) {
                                                    echo "Fecha De Pago Ordinario Semestral";
                                                } else {
                                                    echo "Fecha Pago Total";
                                                } ?></td>
                                <td><?php echo $data->fields["fecha1"];   ?></td>
                                <td class="no"><?php if ($data->fields["cuotas"] == 0) {
                                                    echo "Valor";
                                                } else {
                                                    echo "Total";
                                                } ?> a Pagar</td>
                                <td class="unit">$<?php echo number_format($data->fields["valor1"], 0, ",", ".");   ?>&nbsp;&nbsp;&nbsp;</td>
                            </tr>
                            <tr>

                                <td><input type="checkbox"></td>
                                <td><input type="checkbox"></td>
                                <td style="background: white !important;"></td>
                                <?php if ($data->fields["cuotas"] == 0) { ?>
                                    <td class="no">Fecha Pago <?php if ($data->fields["tipov2"] == 0) {
                                                                    echo "Extraordinario";
                                                                }
                                                                if ($data->fields["tipov2"] == 1) {
                                                                    echo "Anual con Descuento año 2022";
                                                                } ?></td>
                                    <td> <?php echo $data->fields["fecha2"];   ?></td>
                                    <td class="no">Valor a Pagar</td>
                                    <td class="unit"> $<?php echo number_format($data->fields["valor2"], 0, ",", ".");   ?>&nbsp;&nbsp;&nbsp; </td>

                                <?php } else {
                                ?>
                                    <td class="no">Fecha Cuota Pago 1</td>
                                    <td> <?php echo $data->fields["cuotafecha1"];   ?></td>
                                    <td class="no">Cuota Pago 1</td>
                                    <td class="unit"> $<?php echo number_format($data->fields["cuotavalor1"], 0, ",", ".");   ?>&nbsp;&nbsp;&nbsp;</td>

                                <?php
                                } ?>
                            </tr>
                            <?php if ($data->fields["cuotas"] > 0) { ?>
                                <tr>

                                    <td style="background: white !important;"> </td>
                                    <td style="background: white !important;"> </td>
                                    <td style="background: white !important;"></td>
                                    <td class="no">Fecha Cuota Pago 2</td>
                                    <td> <?php echo $data->fields["cuotafecha2"];   ?></td>
                                    <td class="no">Cuota Pago 2</td>
                                    <td class="unit"> $<?php echo number_format($data->fields["cuotavalor2"], 0, ",", ".");   ?>&nbsp;&nbsp;&nbsp;</td>
                                </tr>
                            <?php } ?>
                            <?php if ($data->fields["cuotavalor3"] > 0) { ?>
                                <tr>

                                    <td style="background: white !important;"> </td>
                                    <td style="background: white !important;"> </td>
                                    <td style="background: white !important;"></td>
                                    <td class="no">Fecha Cuota Pago 3</td>
                                    <td> <?php echo $data->fields["cuotafecha3"];   ?></td>
                                    <td class="no">Cuota Pago 3</td>
                                    <td class="unit"> $<?php echo number_format($data->fields["cuotavalor3"], 0, ",", ".");   ?>&nbsp;&nbsp;&nbsp;</td>
                                </tr>
                            <?php } ?>
                        </table>
                        <table border="0" cellspacing="0" cellpadding="0">

                            <tr>

                                <td class="no">Banco</td>
                                <td class="no">Numero de Cuenta</td>
                                <td class="no">Valor</td>
                                <td style="background: white !important;"></td>

                                <td class="no">Espacio reservado para el sello del banco</td>

                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td class="unit">&nbsp;</td>

                                <td style="background: white !important;"></td>

                                <td style="padding: 10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                            </tr>

                        </table>
                        <div class="notices">

                            <div class="notice">Escuela <font style="font-size: 10px"><?php echo  $data->fields["comentario"]; ?></font>
                            </div>
                        </div>
                    </main>
                    <!-- 
                <footer>
                    -----------------------------------------
                </footer> -->


                    <header>
                        <div class="row align-items-center">
                            <div class="col">

                                <img src="assets/img/logo.png" class="img-fluid" style="max-width: 150px;" data-holder-rendered="true" />

                            </div>
                            <?php if ($data->fields["banco1"] > 0) { ?>
                                <div class="col">

                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img src="access/img/bancos/<?php echo $data->fields["banco1"] ?>foto.jpg" class="img-fluid" style="max-width: 150px;" data-holder-rendered="true" />

                                </div>
                            <?php } ?>
                            <?php if ($data->fields["banco2"] > 0) { ?>
                                <div class="col">

                                    <img src="access/img/bancos/<?php echo $data->fields["banco2"] ?>foto.jpg" class="img-fluid" style="max-width: 150px;" data-holder-rendered="true" />

                                </div>
                            <?php } ?>
                            <?php if ($data->fields["banco3"] > 0) { ?>
                                <div class="col">

                                    <img src="access/img/bancos/<?php echo $data->fields["banco3"] ?>foto.jpg" class="img-fluid" style="max-width: 150px;" data-holder-rendered="true" />

                                </div>
                            <?php } ?>

                            <?php if ($data->fields["banco4"] > 0) { ?>
                                <div class="col">

                                    <img src="access/img/bancos/<?php echo $data->fields["banco4"] ?>foto.jpg" class="img-fluid" style="max-width: 150px;" data-holder-rendered="true" />

                                </div>
                            <?php } ?>

                            <div class="col">

                                <img src="access/img/bancos/logo-sistecredito.jpg" class="img-fluid" style="max-width: 150px;" data-holder-rendered="true" />

                            </div>

                            <div class="col">

                                <img src="access/img/bancos/logo-openpay.jpg" class="img-fluid" style="max-width: 150px;" data-holder-rendered="true" />

                            </div>


                            <div class="col company-details">
                                <h6 class="name">

                                    <?php echo $data->fields["escuela"]; ?>

                                </h6>
                                <div class="subtitulocliente">"<?php echo $data->fields["nombre_escuela"]; ?>"</div>

                            </div>
                            <div class="col">

                                <img src="access/img/escuelas/<?php echo $data->fields["escuela_id"]; ?>foto.jpg" data-holder-rendered="true" />

                            </div>
                        </div>
                    </header>
                    <main>
                        <div class="row contacts">
                            <div class="col invoice-to">
                                <!--<div class="text-gray-light">Nombre Alumno </div>-->
                                <h5 class="to"><?php echo $data->fields["apellido1"];   ?> <?php echo $data->fields["apellido2"];   ?> <?php echo $data->fields["nombre"];   ?></h5>
                                <div class="address">curso: <?php echo $data->fields["curso"];   ?></div>
                                <div class="address">documento: <?php echo $data->fields["documento"];   ?></div>
                            </div>
                            <div class="col invoice-details">
                                <!-- <h1 class="invoice-id">INVOICE 3-2-1</h1>-->
                                <div class="date">Fecha Elaboración: <?php echo $data->fields["creado"];  ?>&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                <div class="date">Periodo: <?php echo $data->fields["periodo"];   ?>&nbsp;&nbsp;&nbsp;&nbsp;</div>
                            </div>
                        </div>

                        <table border="0" cellspacing="0" cellpadding="0">

                            <tr>

                                <td class="no">Banco</td>
                                <td class="no">Numero de Cuenta</td>
                                <td class="no">Valor</td>
                                <td style="background: white !important;"></td>
                                <td class="no"><?php if ($data->fields["cuotas"] == 0) {
                                                    echo "Fecha De Pago Ordinario Semestral";
                                                } else {
                                                    echo "Fecha Pago Total";
                                                } ?></td>
                                <td><?php echo $data->fields["fecha1"];   ?> </td>
                                <td class="no"><?php if ($data->fields["cuotas"] == 0) {
                                                    echo "Valor";
                                                } else {
                                                    echo "Total";
                                                } ?> a Pagar</td>
                                <td class="unit">$<?php echo number_format($data->fields["valor1"], 0, ",", ".");   ?> </td>
                                <td style="background: white !important;">
                                    <canvas id="barcode1" width=1 height=1 style="border:1px solid #fff"></canvas>
                                    <!-- <div id="outputb1" style="white-space:pre"></div> -->

                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="unit"> </td>
                                <td> </td>
                                <td style="background: white !important;"><input type="checkbox"></td>
                                <?php if ($data->fields["cuotas"] == 0) { ?>
                                    <td class="no">Fecha Pago <?php if ($data->fields["tipov2"] == 0) {
                                                                    echo "Extraordinario";
                                                                }
                                                                if ($data->fields["tipov2"] == 1) {
                                                                    echo "Anual con Descuento año 2022";
                                                                } ?></td>
                                    <td> <?php echo $data->fields["fecha2"];   ?> </td>
                                    <td class="no">Valor a Pagar</td>
                                    <td class="unit"> $<?php echo number_format($data->fields["valor2"], 0, ",", ".");   ?> </td>
                                    <td style="background: white !important;">
                                        <canvas id="barcode2" width=1 height=1 style="border:1px solid #fff"></canvas>
                                        <!-- <div id="outputb2" style="white-space:pre"></div> -->
                                    </td>
                                <?php } else {
                                ?>
                                    <td class="no">Fecha Cuota Pago 1</td>
                                    <td> <?php echo $data->fields["cuotafecha1"];   ?> </td>
                                    <td class="no">Cuota Pago 1</td>
                                    <td class="unit"> $<?php echo number_format($data->fields["cuotavalor1"], 0, ",", ".");   ?> </td>
                                    <td style="background: white !important;">
                                        <canvas id="barcodep1" width=1 height=1 style="border:1px solid #fff"></canvas>
                                        <!-- <div id="outputpb1" style="white-space:pre"></div> -->
                                    </td>


                                <?php
                                } ?>
                            </tr>
                            <?php if ($data->fields["cuotas"] > 0) { ?>
                                <tr>
                                    <td style="background: white !important;"></td>
                                    <td style="background: white !important;"></td>
                                    <td style="background: white !important;"></td>
                                    <td style="background: white !important;"><input type="checkbox"></td>
                                    <td class="no">Fecha Cuota Pago 2</td>
                                    <td> <?php echo $data->fields["cuotafecha2"];   ?> </td>
                                    <td class="no">Cuota Pago 2</td>
                                    <td class="unit"> $<?php echo number_format($data->fields["cuotavalor2"], 0, ",", ".");   ?> </td>
                                    <td style="background: white !important;">
                                        <canvas id="barcodep2" width=1 height=1 style="border:1px solid #fff"></canvas>
                                        <!-- <div id="outputpb2" style="white-space:pre"> -->
                                    </td>
                                </tr>

                            <?php } ?>
                            <?php if ($data->fields["cuotavalor3"] > 0) { ?>
                                <tr>
                                    <td style="background: white !important;"></td>
                                    <td style="background: white !important;"></td>
                                    <td style="background: white !important;"></td>
                                    <td style="background: white !important;"><input type="checkbox"></td>
                                    <td class="no">Fecha Cuota Pago 3</td>
                                    <td> <?php echo $data->fields["cuotafecha3"];   ?> </td>
                                    <td class="no">Cuota Pago 3</td>
                                    <td class="unit"> $<?php echo number_format($data->fields["cuotavalor3"], 0, ",", ".");   ?> </td>
                                    <td style="background: white !important;">
                                        <canvas id="barcodep3" width=1 height=1 style="border:1px solid #fff"></canvas>
                                        <!-- <div id="outputpb3" style="white-space:pre"> -->
                                    </td>
                                </tr>

                            <?php } ?>

                        </table>
                        <!--   <p class="text-center"><strong><?php echo $data->fields["nombre_banco1"];   ?> <?php echo $data->fields["cuenta_b1"];   ?> No. <?php echo $data->fields["numero_banco1"];   ?> <br>
                                <?php echo $data->fields["nombre_banco2"];   ?> <?php echo $data->fields["cuenta_b2"];   ?> No. <?php echo $data->fields["numero_banco2"];   ?> <br>
                                <?php echo $data->fields["nombre_banco3"];   ?> <?php echo $data->fields["cuenta_b3"];   ?> No. <?php echo $data->fields["numero_banco3"];   ?> <br>
                                <?php if ($data->fields["banco4"] > 0) { ?> <?php echo $data->fields["nombre_banco4"];   ?> <?php echo $data->fields["cuenta_b4"];   ?> No. <?php echo $data->fields["numero_banco4"];   ?><br><?php } ?> LAVASPORT S.A.S. Nit 830085642-4</strong>

                        </p> -->
                        <div class="notices">

                            <div class="notice">Banco <font style="font-size: 10px"><?php echo  $data->fields["comentario"]; ?></font>
                            </div>
                        </div>
                    </main>
                </div>




            </div>
            <div class="btn-whatsapp" id="wpbtn">
                <a href="https://api.whatsapp.com/send?phone=+573208356823" target="_blank">
                    <img src="http://s2.accesoperu.com/logos/btn_whatsapp.png" alt="">
                </a>
            </div>
            <div id="pagarbtn" class="btn-informacion"><a data-target="#modalIMG" style="text-decoration:none;color: white;" data-toggle="modal" href="#">Como Pagar?</a></div>
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
            <script>
                <?php if ($config->fields["mensaje"] != "") { ?>
                    $("#myModal").modal('show');
                <?php } ?>
                window.onafterprint = function() {
                    $("#menuprint").show();
                    $("#wpbtn").hide();
                    $("#pagarbtn").hide();

                };

                function descargarpdf() {
                    $.ajax({
                        type: "POST",
                        url: "datosreporte.php",
                        data: "dato=2",
                        success: function(datos) {



                        }

                    });
                    $("#menuprint").hide();
                    $("#wpbtn").hide();
                    $("#pagarbtn").hide();
                    setTimeout(function() {
                        html2canvas(document.getElementById("invoice")).then(canvas => {
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
                            pdf.addImage(imgData, 'JPEG', 2, 2, (imageWidth * ratio) - 5, (imageHeight * ratio) - 5);
                            pdf.save("Recibo-lavasport<?php echo date("Y-m-d"); ?>.pdf");
                            //$("#previewBeforeDownload").hide();
                            $("#menuprint").show();
                            $("#wpbtn").show();
                            $("#pagarbtn").show();

                        });
                    }, 500);

                }

                function pse() {

                    $.ajax({
                        type: "POST",
                        url: "datosreporte.php",
                        data: "dato=3",
                        success: function(datos) {
                            window.location.href = 'https://www.psepagos.co/PSEHostingUI/ShowTicketOffice.aspx?ID=8956';

                        }

                    });
                }
				
				          function pasarela() {

                    $.ajax({
                        type: "POST",
                        url: "datosreporte.php",
                        data: "dato=3",
                        success: function(datos) {
                            window.location.href = 'pasarela.php?valor=<?php echo round($data->fields["valor1"]); ?>&doc=<?php echo $_POST["documento"]; ?>';

                        }

                    });
                }

                function imprimir() {


                    $.ajax({
                        type: "POST",
                        url: "datosreporte.php",
                        data: "dato=1",
                        success: function(datos) {



                        }

                    });



                    $("#menuprint").hide();
                    $("#wpbtn").hide();
                    $("#pagarbtn").hide();
                    setTimeout(function() {
                        window.print();
                    }, 500);

                }



                bwipjs.loadFont("Inconsolata", 95, 105, Inconsolata);

                function render() {


                    // Clear the page




                    options = 'includetext';
                    let opts = {};
                    let aopts = options.split(' ');
                    for (let i = 0; i < aopts.length; i++) {
                        if (!aopts[i]) {
                            continue;
                        }
                        var eq = aopts[i].indexOf('=');
                        if (eq == -1) {
                            opts[aopts[i]] = true;
                        } else {
                            opts[aopts[i].substr(0, eq)] = aopts[i].substr(eq + 1);
                        }
                    }
                    // Finish up the options
                    opts.text = '(415)7709998014350(8020)<?php echo str_pad($data->fields["documento"], 16, "0", STR_PAD_LEFT); ?>(390)<?php echo str_pad(round($data->fields["valor1"]), 9, "0", STR_PAD_LEFT); ?>(96)<?php echo $f1; ?>';
                    opts.bcid = symdesc['gs1-128'].sym;
                    opts.scaleX = 1;
                    opts.scaleY = 1;
                    opts.rotate = 'N';

                    var canvas = document.getElementById('barcode1');
                    // Draw the bar code to the canvas
                    try {
                        let ts0 = new Date;
                        bwipjs.toCanvas(canvas, opts);
                    } catch (e) {
                        // Watch for BWIPP generated raiseerror's.
                        var msg = ('' + e).trim();
                        if (msg.indexOf("bwipp.") >= 0) {
                            document.getElementById('outputb1').textContent = msg;
                        } else if (e.stack) {
                            // GC includes the message in the stack.  FF does not.
                            document.getElementById('outputb1').textContent =
                                (e.stack.indexOf(msg) == -1 ? msg + '\n' : '') + e.stack;
                        } else {
                            document.getElementById('outputb1').textContent = msg;
                        }
                        return;
                    }
                    <?php if ($data->fields["cuotas"] == 0) { ?>
                        var canvas2 = document.getElementById('barcode2');
                        opts.text = '(415)7709998014350(8020)<?php echo str_pad($data->fields["documento"], 16, "0", STR_PAD_LEFT); ?>(390)<?php echo str_pad(round($data->fields["valor2"]), 9, "0", STR_PAD_LEFT); ?>(96)<?php echo $f2; ?>';

                        try {
                            let ts0 = new Date;
                            bwipjs.toCanvas(canvas2, opts);
                        } catch (e) {
                            // Watch for BWIPP generated raiseerror's.
                            var msg = ('' + e).trim();
                            if (msg.indexOf("bwipp.") >= 0) {
                                document.getElementById('outputb2').textContent = msg;
                            } else if (e.stack) {
                                // GC includes the message in the stack.  FF does not.
                                document.getElementById('outputb2').textContent =
                                    (e.stack.indexOf(msg) == -1 ? msg + '\n' : '') + e.stack;
                            } else {
                                document.getElementById('outputb2').textContent = msg;
                            }
                            return;
                        }
                    <?php } ?>
                    <?php if ($data->fields["cuotas"] > 0) { ?>

                        var canvas3 = document.getElementById('barcodep1');
                        opts.text = '(415)7709998014350(8020)<?php echo str_pad($data->fields["documento"], 16, "0", STR_PAD_LEFT); ?>(390)<?php echo str_pad(round($data->fields["cuotavalor1"]), 9, "0", STR_PAD_LEFT); ?>(96)<?php echo $fp1; ?>';
                        try {
                            let ts0 = new Date;
                            bwipjs.toCanvas(canvas3, opts);
                        } catch (e) {
                            // Watch for BWIPP generated raiseerror's.
                            var msg = ('' + e).trim();
                            if (msg.indexOf("bwipp.") >= 0) {
                                document.getElementById('outputpb1').textContent = msg;
                            } else if (e.stack) {
                                // GC includes the message in the stack.  FF does not.
                                document.getElementById('outputpb1').textContent =
                                    (e.stack.indexOf(msg) == -1 ? msg + '\n' : '') + e.stack;
                            } else {
                                document.getElementById('outputpb1').textContent = msg;
                            }
                            return;
                        }

                        var canvas4 = document.getElementById('barcodep2');

                        opts.text = '(415)7709998014350(8020)<?php echo str_pad($data->fields["documento"], 16, "0", STR_PAD_LEFT); ?>(390)<?php echo str_pad(round($data->fields["cuotavalor2"]), 9, "0", STR_PAD_LEFT); ?>(96)<?php echo $fp2; ?>';
                        try {
                            let ts0 = new Date;
                            bwipjs.toCanvas(canvas4, opts);
                        } catch (e) {
                            // Watch for BWIPP generated raiseerror's.
                            var msg = ('' + e).trim();
                            if (msg.indexOf("bwipp.") >= 0) {
                                document.getElementById('outputpb2').textContent = msg;
                            } else if (e.stack) {
                                // GC includes the message in the stack.  FF does not.
                                document.getElementById('outputpb2').textContent =
                                    (e.stack.indexOf(msg) == -1 ? msg + '\n' : '') + e.stack;
                            } else {
                                document.getElementById('outputpb2').textContent = msg;
                            }
                            return;
                        }
                        <?php if ($data->fields["cuotavalor3"] > 0) { ?>

                            var canvas5 = document.getElementById('barcodep3');

                            opts.text = '(415)7709998014350(8020)<?php echo str_pad($data->fields["documento"], 16, "0", STR_PAD_LEFT); ?>(390)<?php echo str_pad(round($data->fields["cuotavalor3"]), 9, "0", STR_PAD_LEFT); ?>(96)<?php echo $fp3; ?>';
                            try {
                                let ts0 = new Date;
                                bwipjs.toCanvas(canvas5, opts);
                            } catch (e) {
                                // Watch for BWIPP generated raiseerror's.
                                var msg = ('' + e).trim();
                                if (msg.indexOf("bwipp.") >= 0) {
                                    document.getElementById('outputpb3').textContent = msg;
                                } else if (e.stack) {
                                    // GC includes the message in the stack.  FF does not.
                                    document.getElementById('outputpb3').textContent =
                                        (e.stack.indexOf(msg) == -1 ? msg + '\n' : '') + e.stack;
                                } else {
                                    document.getElementById('outputpb3').textContent = msg;
                                }
                                return;
                            }

                    <?php  }
                    } ?>
                }

                render();
            </script>
    <?php
    }
    public function guardardata($datos)
    {
        $datos["bandera"] = 1;
        $datos["fecha"] = date("Y-m-d H:i:s");
        if ($this->db->AutoExecute("datos", $datos, "INSERT") == false) {
            //  return 0;
        } else {

            // echo '<p>Se ha enviado correctamente el email a ' . $_POST['email'] . '!</p>';


            // return $this->db->INSERT_ID();
        }
    }
	    public function updatedata($datos)
    {
        $datos["bandera"] = 1;
        $datos["fecha"] = date("Y-m-d H:i:s");
        if ($this->db->AutoExecute("datos", $datos, "UPDATE","documento=".$datos["documento"]) == false) {
            //  return 0;
        } else {

            // echo '<p>Se ha enviado correctamente el email a ' . $_POST['email'] . '!</p>';


            // return $this->db->INSERT_ID();
        }
    }
}

$objrecibo = new recibo();
if (isset($_POST["dataval"])) {

if($_POST["dataval"]>0){
	    $objrecibo->updatedata($_POST);
	
}else{
    $objrecibo->guardardata($_POST);	
	
}

}
$objrecibo->mostrarrecibo($_POST["documento"] * 1);
