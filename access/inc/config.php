<?php

if (preg_match("/lavasport.co/i", $_SERVER["HTTP_HOST"])) {

	define('MIURL', 'http://lavasport.co');

	define('MIURLS', 'https://lavasport.co');

	define('PATO', '/plataforma/access/');

	define('PATU', '/plataforma/');
} else {

	define('MIURL', 'http://localhost');

	define('MIURLS', 'https://localhost');

	define('PATO', '/lavasport/access/');

	define('PATU', '/lavasport/');
}



//   Varios

define("URLVIEW", "lavasport.com");

define("PERFIL", 'admin');

define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT']);

define('RPP', 10);

define('JQUERY', PATU . 'js/jquery-3.3.1.min.js');

define('LOGO', "../img/logohome.png");

define("LOGOP", PATO . "img/logop.png");

define("LOGALT", "lavasport");

define('PATA', ROOT_PATH . PATO);

define('TEMP', PATA . '../73mp0r4l/');

define('IDIOMA', 'esco'); // para ingles: enus

define('PPUBLICO', 'usuarios'); // Perfil Publico



//	============Google============

//	https://developers.google.com/recaptcha/

define('GOOGLE_CLAVE_SITIO', '6LeCxBkUAAAAAKWjglj_jfcl9jA7YPyr_u8NpiX7');

define('GOOGLE_CLAVE_SECRETA', '6LeCxBkUAAAAAHASAfko4kADQl15U3qjCn6GFFhx');



// Variables reutilizables

define('TITULO', 'lavasport');

define("SEOKEYWORDS", "programacion, php, javascript, sistemas de informacion, crestron, redes, wi-fi, domotica, electroica");

define("SSEOKEYWORD", "programacion, php, javascript, sistemas de informacion");

define("SEODESCRIPT", "ingenioSoft.com es una compañia internacional que esta a la banguardia de todas las tecnologias que estan cambiando el mundo.");

define("SSEODESCRIP", ", compañia internacional que esta a la banguardia de todas las tecnologias que estan cambiando el mundo.");

define('MONEDA', 'COP');

define('NOMMON', 'Pesos');

define('TRM', 3000);

define('ADDTHIS', 'ra-51d580223317c3a0');

define('FIRMA', 'asdf1234');

define('YALE', '4321fdsa');



// Datos de Servidor de correo para envio de correos en general

define('MAIL_SERVER', 'lavasport');

define('MAIL_PORT', '25');

define('MAIL_AUTH', true);

define('MAIL_USER', 'info@dominio.com');

define('MAIL_PASS', 'asdf1234');

define('MAIL_MAIL', 'info@dominio.com');

define('MAIL_NAME', 'dominio.com');

define('MAIL_LOGO', PATU . '/img/logo.jpg');

define('MAIL_LOGO_NAME', 'logo.jpg');
