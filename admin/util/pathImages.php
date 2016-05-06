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
	* Lojas
	*
	*/
	'loja' => array(
		'rel' => array(
			'desktop' => PATH . 'uploads/imagens/loja/desktop/',
			'mobile' => PATH . 'uploads/imagens/loja/mobile/'
		),
		'abs' => array(
			'desktop' => $PATH_ROOT . 'uploads/imagens/loja/desktop/',
			'mobile' => $PATH_ROOT . 'uploads/imagens/loja/mobile/'
		),
	),
	/**
	*
	* Banners
	*
	*/
	'banner' => array(
		'rel' => array(
			'desktop' => PATH . 'uploads/imagens/banner/desktop/',
			'mobile' => PATH . 'uploads/imagens/banner/mobile/'
		),
		'abs' => array(
			'desktop' => $PATH_ROOT . 'uploads/imagens/banner/desktop/',
			'mobile' => $PATH_ROOT . 'uploads/imagens/banner/mobile/'
		),
	),
	/**
	*
	* Eventos
	*
	*/
	'evento' => array(
		'rel' => array(
			'desktop' => PATH . 'uploads/imagens/evento/desktop/',
			'mobile' => PATH . 'uploads/imagens/evento/mobile/'
		),
		'abs' => array(
			'desktop' => $PATH_ROOT . 'uploads/imagens/evento/desktop/',
			'mobile' => $PATH_ROOT . 'uploads/imagens/evento/mobile/'
		),
	),
	/**
	*
	* Galerias
	*
	*/
	'galeria' => array(
		'rel' => array(
			'desktop' => PATH . 'uploads/imagens/galeria/desktop/',
			'mobile' => PATH . 'uploads/imagens/galeria/mobile/'
		),
		'abs' => array(
			'desktop' => $PATH_ROOT . 'uploads/imagens/galeria/desktop/',
			'mobile' => $PATH_ROOT . 'uploads/imagens/galeria/mobile/'
		),
	),
);