<?php

session_start();

# Alterar apenas as variaveis contidas neste IF/ELSE e abaixo
if($_SERVER['HTTP_HOST'] == 'localhost:8080' || $_SERVER['HTTP_HOST'] == 'localhost') {            
	
	if(gethostbyaddr($_SERVER['REMOTE_ADDR']) == 'FIRSTBYTE-PC-1') { 
		define('PATH', 	'/cservices/site/');
		define('PATHA', 'cservices/site/admin/');
	}
	else if(gethostbyaddr($_SERVER['REMOTE_ADDR']) == 'Ruy-PC') {
		define('PATH', 	'/cservices/site/');
		define('PATHA', '/cservices/site/admin/');
	}
} else if($_SERVER['HTTP_HOST'] == 'website.cservices.midiadesigners.local') {
	define('PATH', 	'/');
	define('PATHA', '/admin/');
} else if($_SERVER['HTTP_HOST'] == 'website.cservices.mediainteractive.com.br') {
	define('PATH', 	'/');
	define('PATHA', '/admin/');
}else if($_SERVER['HTTP_HOST'] == 'cservices.com.br') {
	$mysql_user_pass = array(
        'read' 		=> array('root', ''),
        'edit' 		=> array('root', ''),
        'delete'	=> array('root', '')
	);            
    define('PATH', '/site/');
	define('PATHA', '/site/admin/');
} else {
	$mysql_user_pass = array(
        'read' 		=> array('root', ''),
        'edit' 		=> array('root', ''),
        'delete'	=> array('root', '')
	);
    define('PATH', '/');
	define('PATHA', '/admin/');
}



# Define se o site esta em produção ou concluído
define('DESENVOLVIMENTO', true);

$_SESSION[PATH]['jsFiles'] 	= array(
	'assets/js/jquery-1.9.1.min.js',	
	'assets/js/jquery-ui.min.js',
	'assets/js/selectboxit.js',
	'assets/js/maskedinput.min.js',
	'assets/js/owl.min.js',
    'assets/js/waypoints.min.js',
	'assets/js/scripts.min.js',
    'assets/js/scripts.form.js'
);

$_SESSION[PATH]['cssFiles'] = array(
	'assets/css/owl.carousel.css',
	'assets/css/selectboxit.css',
    'assets/css/font-awesome.css',
	'assets/css/styles.css'
);

$_SESSION[PATH]['admin']['jsFiles']  = array();
$_SESSION[PATH]['admin']['cssFiles'] = array();

# Não modificar a partir deste trecho
# ===================================================================================================
define('HOST', 	PATH);
define('SITE', 	'http://'.$_SERVER['HTTP_HOST'].PATH); 	//$_SERVER['HTTP_HOST'].
define('SITEA', 'http://'.$_SERVER['HTTP_HOST'].PATHA); //$_SERVER['HTTP_HOST'].

define("STR_REDUCE_LEFT", 		1);
define("STR_REDUCE_RIGHT", 		2);
define("STR_REDUCE_CENTER",     4);

# Configurações de servidor e dominio, não alterar.
ini_set("zlib.output_compression", "On");
ini_set("ServerTokens", "Prod");
ini_set("expose_php", "Off");

//echo date_default_timezone_get();
date_default_timezone_set('America/Sao_Paulo');

header('Content-Type: text/html; charset=utf-8');
header('Content-language: pt-br');
header('Cache-Control: no-cache, no-store, max-age=0, must-revalidate');
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
header('Pragma: no-cache');
header('X-Powered-By: SAS');

ob_start();
