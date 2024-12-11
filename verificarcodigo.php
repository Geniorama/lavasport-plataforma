<?php
require_once('access/inc/adodb5/adodb.inc.php');
require_once('access/inc/config.php');
require_once('access/inc/db.php');
session_start();
date_default_timezone_set('America/Bogota');
//include_once('ean128/EAN128-4php.php');
if ($_POST["codigo"] == $_SESSION["codigo"]) {

    echo "1";
} else {
    echo "0";
}
