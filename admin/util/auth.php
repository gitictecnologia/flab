<?php
/**
*
* Verifica se o usuario está logado
*
*/
if(!isset($_SESSION['Auth']['Digest']) || ($_SESSION['Auth']['Digest'] != md5($_SERVER['REMOTE_ADDR'])))
{
	if(stripos($_SERVER['REQUEST_URI'], 'clipping.php?do=get') == false)
	{
		Go('./login.php');	
	}	
}