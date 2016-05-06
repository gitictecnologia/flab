<?php

require_once 'sa_conexao.php';
require_once 'sa_jsmin.php';

header('Content-type: text/javascript; charset=utf-8');

if(!file_exists('js/all_min.js')){
	
	$jsFiles = $_SESSION[HOST]['jsFiles']; 
	
	$buffer = '';
	foreach ($jsFiles as $jsFile) {
		if(file_exists($jsFile)){
			$buffer .= JSMin::minify(file_get_contents($jsFile));
		}
	}
	
	echo $buffer;
	
	$file = fopen('js/all_min.js','w');
	fwrite($file, $buffer);
	fclose($file);
}