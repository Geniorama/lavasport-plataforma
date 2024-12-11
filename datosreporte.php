<?php
require_once('access/inc/adodb5/adodb.inc.php');
require_once('access/inc/class.phpmailer.php');
require_once('access/inc/config.php');
require_once('access/inc/db.php');
session_start();
//include_once('ean128/EAN128-4php.php');
class DataReporte
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

    public function guardardato($dato)
    {

        if ($dato == 1) {
            $entra["imprimio"] = 1;
        }
        if ($dato == 2) {
            $entra["pdf"] = 1;
        }
        if ($dato == 3) {
            $entra["pse"] = 1;
        }
        //insertar datos 

        if ($this->db->AutoExecute("facturasgeneradas", $entra, "UPDATE", "id=" .  $_SESSION["id_sessionf"]) == false) {
            //  return 0;
        } else {

            // return $this->db->INSERT_ID();
        }
    }
}


$objReporte = new DataReporte();
$objReporte->guardardato($_POST["dato"] * 1);
