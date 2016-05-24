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
	),
	/**
	*
	* Documentos dos 
	*
	*/
	'docs' => array(
		'curriculo' => array(
			'rel' => PATH . 'uploads/docs/curriculo/',
			'abs' => $PATH_ROOT . 'uploads/docs/curriculo/'
		),
		'autorizacao' => array(
			'rel' => PATH . 'uploads/docs/autorizacao/',
			'abs' => $PATH_ROOT . 'uploads/docs/autorizacao/'
		),
		'apresentacao' => array(
			'rel' => PATH . 'uploads/docs/apresentacao/',
			'abs' => $PATH_ROOT . 'uploads/docs/apresentacao/'
		)
	)
);