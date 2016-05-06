<?php
/**
*
* Verifica se o usuario está logado
*
*/
if(!isset($_SESSION['Auth']['Digest']) || ($_SESSION['Auth']['Digest'] != md5($_SERVER['REMOTE_ADDR'])))
{
	Go('./login.php');	
}