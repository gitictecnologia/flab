<?php

session_start();


if($_SERVER['HTTP_HOST'] == 'localhost:8080' || $_SERVER['HTTP_HOST'] == 'localhost')
{	
	if(gethostbyaddr($_SERVER['REMOTE_ADDR']) == 'FIRSTBYTE-PC-1')
	{ 
		define('PATH', 	'/git/flab/flab/site/');
		define('PATHA', '/git/flab/flab/admin/');
	}
	else if(gethostbyaddr($_SERVER['REMOTE_ADDR']) == 'Ruy-PC')
	{
		define('PATH', 	'/flab/flab/');
		define('PATHA', '/flab/flab/admin/');
	}
	else if(gethostbyaddr($_SERVER['REMOTE_ADDR']) == 'ic1-PC')
	{
		define('PATH', 	'/git/flab/flab/site/');
		define('PATHA', '/git/flab/flab/admin/');
	}
}
else
{
    define('PATH', '/');
	define('PATHA', '/admin/');
}



# Define se o site esta em produção ou concluído
define('DESENVOLVIMENTO', true);

$_SESSION[PATH]['jsFiles'] 	= array(
	//'assets/js/jquery-1.9.1.min.js',	
);

$_SESSION[PATH]['cssFiles'] = array(	
	//'assets/css/styles.css'
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

date_default_timezone_set('America/Sao_Paulo');

header('Content-Type: text/html; charset=utf-8');
header('Content-language: pt-br');
header('Cache-Control: no-cache, no-store, max-age=0, must-revalidate');
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
header('Pragma: no-cache');
header('X-Powered-By: SAS');

ob_start();
