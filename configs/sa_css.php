<?php

require_once 'sa_conexao.php';

header('Content-type: text/css');

if(!file_exists('css/all_min.css')){

	$cssFiles = $_SESSION[HOST]['cssFiles'];
	
	$buffer = '';
	foreach ($cssFiles as $cssFile) {
		$buffer .= file_get_contents($cssFile);
	}
	
	$buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
	$buffer = str_replace(': ', ':', $buffer);
	$buffer = str_replace(array("\r\n", "\r", "\n"), '', $buffer);
	
	echo $buffer;
	
	$file = fopen('css/all_min.css','w');
			fwrite($file, $buffer);
			fclose($file);
}
