<?php

# Cria o cache se não estiver em localhost e se o arquivo não existir
if($_CREATE && $_SERVER['HTTP_HOST'] != 'localhost' && !DESENVOLVIMENTO){
		
	$fileOpen = fopen($cacheFile, 'w');
				fwrite($fileOpen, ob_get_contents());
				fwrite($fileOpen, $_HTML);
				fclose($fileOpen);

	ob_end_flush();
}
echo $_HTML;
