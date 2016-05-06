<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title></title>
<link rel="stylesheet" href="<?php echo PATH?>css/foundation.css" />
<script src="<?php echo PATH?>js/vendor/modernizr.js"></script>
</head>
<body>
<div class="row">
	<div class="large-12 columns">
		<div data-alert class="alert-box alert radius">
		  	Estamos enfrentando problemas t&eacute;cnicos. Voltaremos em instantes.
		  	<a href="#" class="close">&times;</a>
		</div>
	</div>
</div>
<!--
<?php 
	/*
	function arrayStr($array){
		$str = array();
		
		foreach($array as $k => $v){
			if(is_array($v)){
				$str[] = arrayStr($v);
			} else {
   				$str[] = $k.' => '.$v."\n";
			}
		}	
		return implode("\r\n", $str);
	}

	$data = date("d-m-Y");
	$hora = date("H:i:s T"); 
	
	$h = '['.$hora.'] - '.$erro.	"\r\n".
			'SESSION =================='."\r\n".
			arrayStr($_SESSION).	"\r\n\n".
			
			'GET ======================'."\r\n".
			arrayStr($_GET).		"\r\n\n".
			
			'POST ====================='."\r\n".
			arrayStr($_POST).		"\r\n";

	$handler = fopen('logs/mysql_'.$data.'.log', 'ab');
	fwrite($handler, $h);
	fclose($handler);
	*/
	
	echo $erro .' l';
?> -->
<script src="<?php echo PATH?>js/vendor/jquery.js"></script>
<script src="<?php echo PATH?>js/foundation.min.js"></script>
<script>$(document).foundation();</script>
</body>
</html>
