<?php
	
	# Define as páginas que o cache não deve ser feito
	$cacheExclude = array(
		
	);
	
	# Define o cache inicial da index
	$cachePage = 'sa_index';
	if(isset($_GET["a"]) && !empty($_GET["a"])){
		$cachePage = 'sa_'.implode("__", $_GET);
	}

	# Define o cache da pagina atual
	$cacheFile = 'cached/'.$cachePage.'.html';
	
	# Checa se ja existe o cache e inclui se o site não estiver em produção
	if (file_exists($cacheFile) && !DESENVOLVIMENTO && !in_array($_GET['a'], $cacheExclude)){ 
	   require_once $cacheFile;	   
	   die;   
	}
