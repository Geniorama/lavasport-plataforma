<?php
if(preg_match("/multilaundry.com/i",$_SERVER["HTTP_HOST"])){
	define('DB_SERVER', 'localhost');
	define('DB_TIPO','mysqli');
	define('DB_DEBUG',false);
	define('DB_USER', 'multilau_viviana');
	define('DB_CLAVE', 'pr04s3c4l.');
	define('DB_DB', 'multilau_lavanderia');
}else{
	define('DB_SERVER', 'localhost');
	define('DB_TIPO','mysqli');
	define('DB_DEBUG',false);
	define('DB_USER', 'root');
	define('DB_CLAVE', '');
	define('DB_DB', 'lavanderia');
}
define('DB_SCHEMAS', 'schemas');

