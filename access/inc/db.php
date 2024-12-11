<?php
if (preg_match("/lavasport.co/i", $_SERVER["HTTP_HOST"])) {
	define('DB_SERVER', 'localhost');
	define('DB_TIPO', 'mysqli');
	define('DB_DEBUG', false);
	define('DB_USER', 'plataforma');
	define('DB_CLAVE', 'pr04s3c4l');
	define('DB_DB', 'plataforma_recibos');
} else {
	define('DB_SERVER', 'localhost');
	define('DB_TIPO', 'mysqli');
	define('DB_DEBUG', false);
	define('DB_USER', 'root');
	define('DB_CLAVE', '');
	define('DB_DB', 'lavasport_platform');
}
define('DB_SCHEMAS', 'schemas');
