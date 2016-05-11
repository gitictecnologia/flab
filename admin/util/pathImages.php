<?php
/**
*
* Configuração de path das imagens
* 	- Necessário incluir o arquivo "util.php" antes desse arquivo.
*	- rel (Relativo)
*	- abs (Absoluto)
*
*/

$PATH_ROOT = $_SERVER['DOCUMENT_ROOT'] . PATH;

$pathImage = array(
	/**
	*
	* Clipping
	*
	*/
	'clipping' => array(
		'rel' => PATH . 'uploads/img/clipping/',		
		'abs' => $PATH_ROOT . 'uploads/img/clipping/'
	)	
);