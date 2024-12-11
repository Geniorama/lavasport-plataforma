<?php
require_once('access/inc/adodb5/adodb.inc.php');
require_once('access/inc/class.phpmailer.php');
require_once('access/inc/config.php');
require_once('access/inc/db.php');
include_once('ean128/EAN128-4php.php');

class recibo
{

    public $db;

    function __construct()
    {
        $this->db = ADONewConnection(DB_TIPO);
        $this->db->debug = DB_DEBUG;
        $this->db->Connect(DB_SERVER, DB_USER, DB_CLAVE, DB_DB);
        $this->db->SetFetchMode(ADODB_FETCH_ASSOC);
    }

    function __destruct()
    {
        $this->db->close();
    }

    public function mostrarrecibo($docummento)
    {


        $sql1 = "SELECT * FROM configuraciones";
        $config =  $this->db->Execute($sql1);
        $sql = "SELECT facturas.*,escuelas.escuela,escuelas.nombre AS nombre_escuela,estudiantes.documento,estudiantes.nombre,estudiantes.apellido1,estudiantes.apellido2,estudiantes.curso,b1.cuenta as cuenta_b1,b2.cuenta as cuenta_b2,b3.cuenta as cuenta_b3,b4.cuenta as cuenta_b4,b1.nombre AS nombre_banco1,b1.numero  AS numero_banco1,b2.nombre AS nombre_banco2,b2.numero  AS numero_banco2,b3.nombre AS nombre_banco3,b3.numero  AS numero_banco3,b4.nombre AS nombre_banco4,b4.numero AS numero_banco4 FROM facturas LEFT JOIN escuelas ON escuelas.id=facturas.escuela_id LEFT JOIN estudiantes ON estudiantes.escuela_id=escuelas.id LEFT JOIN bancos AS b1 ON b1.id=facturas.banco1 LEFT JOIN bancos AS b2 ON b2.id=facturas.banco2 LEFT JOIN bancos AS b3 ON b3.id=facturas.banco3 LEFT JOIN bancos AS b4 ON b4.id=facturas.banco4 WHERE estudiantes.documento ='" . $docummento . "' ";
        $data =  $this->db->Execute($sql);

        if ($data->_numOfRows > 0) {
        } else {
            header("location: index.php?error=3");
        }
        $f1 = str_replace("-", "", $data->fields["fecha1"]);
        $f2 = str_replace("-", "", $data->fields["fecha2"]);
        $fp1 = str_replace("-", "", $data->fields["cuotafecha1"]);
        $fp2 = str_replace("-", "", $data->fields["cuotafecha2"]);
        $fp3 = str_replace("-", "", $data->fields["cuotafecha3"]);
        $barcode1 =  $config->fields["codigobarras1"] . $data->fields["documento"] . $config->fields["codigobarras2"] . round($data->fields["valor1"]) . $config->fields["codigobarras3"] . $f1;
        $barcode2 =  $config->fields["codigobarras1"] . $data->fields["documento"] . $config->fields["codigobarras2"] . round($data->fields["valor2"]) . $config->fields["codigobarras3"] . $f2;
        $barcodep1 =  $config->fields["codigobarras1"] . $data->fields["documento"] . $config->fields["codigobarras2"] . round($data->fields["cuotavalor1"]) . $config->fields["codigobarras3"] . $fp1;
        $barcodep2 =  $config->fields["codigobarras1"] . $data->fields["documento"] . $config->fields["codigobarras2"] . round($data->fields["cuotavalor2"]) . $config->fields["codigobarras3"] . $fp2;
        $barcodep3 =  $config->fields["codigobarras1"] . $data->fields["documento"] . $config->fields["codigobarras2"] . round($data->fields["cuotavalor3"]) . $config->fields["codigobarras3"] . $fp3;

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
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

            <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
            <script src='jsPDF-master/dist/jspdf.debug.js'></script>
            <style>
                body {
                    line-height: 1.0 !important;

                }

                input[type=checkbox] {
                    transform: scale(2.5);
                }

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
                    margin-bottom: 20px;
                    border-bottom: 1px solid <?php echo $config->fields["color_tema"]; ?>
                }

                .invoice .company-details {
                    text-align: right
                }

                .invoice .company-details .name {
                    margin-top: 0;
                    margin-bottom: 0
                }

                .invoice .contacts {
                    margin-bottom: 15px
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
                    padding-bottom: 50px
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
            </style>
        </head>

        <body>
            <div id="menuprint">
                <div class="box2">
                    <img src="assets/img/logo2.png" class="img-fluid logo" alt="Responsive image">
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-4" style="padding: 0; margin: 0;">
                            <a href="javascript:return false;" onclick="imprimir()" class="boton btn1">IMPRIMIR</a>
                        </div>
                        <div class="col-4" style="padding: 0; margin: 0;">
                            <a href="javascript:return false;" onclick="descargarpdf()" class="boton btn2">DESCARGAR</a>
                        </div>
                        <div class="col-4" style="padding: 0; margin: 0;">
                            <a href="#" class="boton btn3">PAGO PSE</a>
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
                            <div class="row">
                                <div class="col">

                                    <img src="img/logo.png" style="width: 150px" data-holder-rendered="true" />

                                </div>
                                <?php if ($data->fields["banco1"] > 0) { ?>
                                    <div class="col">

                                        <img src="access/img/bancos/<?php echo $data->fields["banco1"] ?>foto.jpg" width="120px" data-holder-rendered="true" />

                                    </div>
                                <?php } ?>
                                <?php if ($data->fields["banco2"] > 0) { ?>
                                    <div class="col">

                                        <img src="access/img/bancos/<?php echo $data->fields["banco2"] ?>foto.jpg" width="120px" data-holder-rendered="true" />

                                    </div>
                                <?php } ?>
                                <?php if ($data->fields["banco3"] > 0) { ?>
                                    <div class="col">

                                        <img src="access/img/bancos/<?php echo $data->fields["banco3"] ?>foto.jpg" width="120px" data-holder-rendered="true" />

                                    </div>
                                <?php } ?>

                                <?php if ($data->fields["banco4"] > 0) { ?>
                                    <div class="col">

                                        <img src="access/img/bancos/<?php echo $data->fields["banco4"] ?>foto.jpg" width="120px" data-holder-rendered="true" />

                                    </div>
                                <?php } ?>


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
                                                        echo "Fecha Pago Ordinario";
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
                                        <td class="no">Fecha Pago extraordinario</td>
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
                            <p class="text-center"><strong><?php echo $data->fields["nombre_banco1"];   ?> <?php echo $data->fields["cuenta_b1"];   ?> No. <?php echo $data->fields["numero_banco1"];   ?> <br>
                                    <?php echo $data->fields["nombre_banco2"];   ?> <?php echo $data->fields["cuenta_b2"];   ?> No. <?php echo $data->fields["numero_banco2"];   ?> <br>
                                    <?php echo $data->fields["nombre_banco3"];   ?> <?php echo $data->fields["cuenta_b3"];   ?> No. <?php echo $data->fields["numero_banco3"];   ?> <br>
                                    <?php if ($data->fields["banco4"] > 0) { ?> <?php echo $data->fields["nombre_banco4"];   ?> <?php echo $data->fields["cuenta_b4"];   ?> No. <?php echo $data->fields["numero_banco4"];   ?><br><?php } ?> LAVASPORT S.A.S. Nit 830085642-4</strong>

                            </p>

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
                        <div class="row">
                            <div class="col">

                                <img src="img/logo.png" style="width: 150px" data-holder-rendered="true" />

                            </div>
                            <?php if ($data->fields["banco1"] > 0) { ?>
                                <div class="col">

                                    <img src="access/img/bancos/<?php echo $data->fields["banco1"] ?>foto.jpg" width="120px" data-holder-rendered="true" />

                                </div>
                            <?php } ?>
                            <?php if ($data->fields["banco2"] > 0) { ?>
                                <div class="col">

                                    <img src="access/img/bancos/<?php echo $data->fields["banco2"] ?>foto.jpg" width="120px" data-holder-rendered="true" />

                                </div>
                            <?php } ?>
                            <?php if ($data->fields["banco3"] > 0) { ?>
                                <div class="col">

                                    <img src="access/img/bancos/<?php echo $data->fields["banco3"] ?>foto.jpg" width="120px" data-holder-rendered="true" />

                                </div>
                            <?php } ?>

                            <?php if ($data->fields["banco4"] > 0) { ?>
                                <div class="col">

                                    <img src="access/img/bancos/<?php echo $data->fields["banco4"] ?>foto.jpg" width="120px" data-holder-rendered="true" />

                                </div>
                            <?php } ?>


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
                                                    echo "Fecha Pago Ordinario";
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
                                    <td class="no">Fecha Pago extraordinario</td>
                                    <td> <?php echo $data->fields["fecha2"];   ?></td>
                                    <td class="no">Valor a Pagar</td>
                                    <td class="unit"> $<?php echo number_format($data->fields["valor2"], 0, ",", ".");   ?>&nbsp;&nbsp;&nbsp; </td>

                                <?php } else {
                                ?>
                                    <td class="no">Fecha Cuota Pago 1</td>
                                    <td> <?php echo $data->fields["cuotafecha1"];   ?></td>
                                    <td class="no">Cuota Pago 1</td>
                                    <td class="unit"> $<?php echo number_format($data->fields["cuotavalor1"], 0, ",", ".");   ?>&nbsp;&nbsp; &nbsp;</td>

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
                        <div class="row">
                            <div class="col">

                                <img src="img/logo.png" style="width: 150px" data-holder-rendered="true" />

                            </div>
                            <?php if ($data->fields["banco1"] > 0) { ?>
                                <div class="col">

                                    <img src="access/img/bancos/<?php echo $data->fields["banco1"] ?>foto.jpg" width="120px" data-holder-rendered="true" />

                                </div>
                            <?php } ?>
                            <?php if ($data->fields["banco2"] > 0) { ?>
                                <div class="col">

                                    <img src="access/img/bancos/<?php echo $data->fields["banco2"] ?>foto.jpg" width="120px" data-holder-rendered="true" />

                                </div>
                            <?php } ?>
                            <?php if ($data->fields["banco3"] > 0) { ?>
                                <div class="col">

                                    <img src="access/img/bancos/<?php echo $data->fields["banco3"] ?>foto.jpg" width="120px" data-holder-rendered="true" />

                                </div>
                            <?php } ?>

                            <?php if ($data->fields["banco4"] > 0) { ?>
                                <div class="col">

                                    <img src="access/img/bancos/<?php echo $data->fields["banco4"] ?>foto.jpg" width="120px" data-holder-rendered="true" />

                                </div>
                            <?php } ?>


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
                                                    echo "Fecha Pago Ordinario";
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
                                <td style="background: white !important;"> <img src="ean128/EAN128-4php.php?barcode=<?php echo $barcode1; ?>"> </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="unit"> </td>
                                <td> </td>
                                <td style="background: white !important;"></td>
                                <?php if ($data->fields["cuotas"] == 0) { ?>
                                    <td class="no">Fecha Pago extraordinario</td>
                                    <td> <?php echo $data->fields["fecha2"];   ?> </td>
                                    <td class="no">Valor a Pagar</td>
                                    <td class="unit"> $<?php echo number_format($data->fields["valor2"], 0, ",", ".");   ?> </td>
                                    <td style="background: white !important;"><img src="ean128/EAN128-4php.php?barcode=<?php echo $barcode2; ?>"> </td>
                                <?php } else {
                                ?>
                                    <td class="no">Fecha Cuota Pago 1</td>
                                    <td> <?php echo $data->fields["cuotafecha1"];   ?> </td>
                                    <td class="no">Cuota Pago 1</td>
                                    <td class="unit"> $<?php echo number_format($data->fields["cuotavalor1"], 0, ",", ".");   ?> </td>
                                    <td style="background: white !important;"><img src="ean128/EAN128-4php.php?barcode=<?php echo $barcodep1; ?>"> </td>


                                <?php
                                } ?>
                            </tr>
                            <?php if ($data->fields["cuotas"] > 0) { ?>
                                <tr>
                                    <td style="background: white !important;"></td>
                                    <td style="background: white !important;"></td>
                                    <td style="background: white !important;"></td>
                                    <td style="background: white !important;"></td>
                                    <td class="no">Fecha Cuota Pago 2</td>
                                    <td> <?php echo $data->fields["cuotafecha2"];   ?> </td>
                                    <td class="no">Cuota Pago 2</td>
                                    <td class="unit"> $<?php echo number_format($data->fields["cuotavalor2"], 0, ",", ".");   ?> </td>
                                    <td style="background: white !important;"><img src="ean128/EAN128-4php.php?barcode=<?php echo $barcodep2; ?>"> </td>
                                </tr>

                            <?php } ?>
                            <?php if ($data->fields["cuotavalor3"] > 0) { ?>
                                <tr>
                                    <td style="background: white !important;"></td>
                                    <td style="background: white !important;"></td>
                                    <td style="background: white !important;"></td>
                                    <td style="background: white !important;"></td>
                                    <td class="no">Fecha Cuota Pago 3</td>
                                    <td> <?php echo $data->fields["cuotafecha3"];   ?> </td>
                                    <td class="no">Cuota Pago 3</td>
                                    <td class="unit"> $<?php echo number_format($data->fields["cuotavalor3"], 0, ",", ".");   ?> </td>
                                    <td style="background: white !important;"><img src="ean128/EAN128-4php.php?barcode=<?php echo $barcodep3; ?>"> </td>
                                </tr>

                            <?php } ?>

                        </table>
                        <p class="text-center"><strong><?php echo $data->fields["nombre_banco1"];   ?> <?php echo $data->fields["cuenta_b1"];   ?> No. <?php echo $data->fields["numero_banco1"];   ?> <br>
                                <?php echo $data->fields["nombre_banco2"];   ?> <?php echo $data->fields["cuenta_b2"];   ?> No. <?php echo $data->fields["numero_banco2"];   ?> <br>
                                <?php echo $data->fields["nombre_banco3"];   ?> <?php echo $data->fields["cuenta_b3"];   ?> No. <?php echo $data->fields["numero_banco3"];   ?> <br>
                                <?php if ($data->fields["banco4"] > 0) { ?> <?php echo $data->fields["nombre_banco4"];   ?> <?php echo $data->fields["cuenta_b4"];   ?> No. <?php echo $data->fields["numero_banco4"];   ?><br><?php } ?> LAVASPORT S.A.S. Nit 830085642-4</strong>

                        </p>
                        <div class="notices">

                            <div class="notice">Banco <font style="font-size: 10px"><?php echo  $data->fields["comentario"]; ?></font>
                            </div>
                        </div>
                    </main>
                </div>




            </div>

        </html>
        <script>
            window.onafterprint = function() {
                $("#menuprint").show();

            };

            function descargarpdf() {
                $("#menuprint").hide();
                setTimeout(function() {
                    html2canvas(document.getElementById("invoice")).then(canvas => {
                        //$("#previewBeforeDownload").html(canvas);
                        var imgData = canvas.toDataURL("image/jpeg", 1);
                        var pdf = new jsPDF("p", "mm", "a4");
                        var pageWidth = pdf.internal.pageSize.getWidth();
                        var pageHeight = pdf.internal.pageSize.getHeight();
                        var imageWidth = canvas.width;
                        var imageHeight = canvas.height;

                        var ratio = imageWidth / imageHeight >= pageWidth / pageHeight ? pageWidth / imageWidth : pageHeight / imageHeight;
                        //pdf = new jsPDF(this.state.orientation, undefined, format);
                        pdf.addImage(imgData, 'JPEG', 0, 0, imageWidth * ratio, imageHeight * ratio);
                        pdf.save("Recibo-lavasport<?php echo date("Y-m-d"); ?>.pdf");
                        //$("#previewBeforeDownload").hide();
                        $("#menuprint").show();

                    });
                }, 500);

            }

            function imprimir() {
                $("#menuprint").hide();
                window.print();
            }
        </script>
<?php
    }
}

$objrecibo = new recibo();
$objrecibo->mostrarrecibo($_POST["documento"] * 1);
