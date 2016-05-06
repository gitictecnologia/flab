<?php

	# Retira barras indesejadas
	function limpaGet($var){
		$var = str_replace("//","/", implode('/', $var));
		return $var;
	}
	
	# Checa se a sessao de debug foi chamada
	if(isset($_SESSION[HOST]['debug'])){	
		
		$redir = false;
		# Checa se deve limpar o cache
		if(in_array('cleanCache', $_GET)){
			unset($_SESSION[HOST]['cleanCache']);
			
			$dir = 'cached';
			if($handle = opendir($dir)) {
				while(false !== ($file = readdir($handle))) {
					if(in_array($file, array('.', '..', 'index.html', '.htaccess'))) {
						continue;
					}
					unlink($dir.'/'.$file);
				}
			} 		
			closedir($handle);
			$redir = true;
		}
		
		# Checa se deve limpar a sessão
		if(in_array('cleanSession', $_GET)){
			unset($_SESSION);
			session_destroy();		
			$redir = true;
		}
		
		# Redireciona
		if($redir){
			array_unshift($_GET, 'debug');
			echo '<script>document.location.href = "'.PATH.limpaGet($_GET).'";</script>';	
			exit;
		}
		
		# Links dos botões
		$s = PATH.limpaGet($_GET);
		
		array_unshift($_GET, 'debug','cleanSession');
		$l = PATH.limpaGet($_GET);
		
		array_shift($_GET);
		array_shift($_GET);
		array_unshift($_GET, 'debug', 'cleanCache');
		$c = PATH.limpaGet($_GET);
				
		echo '
			<style type="text/css">				
				.debug_tabs{padding:10px}
				
				.debug_window{position: fixed; width: 100%; height:100%; overflow-y: auto; background: #fff; color:#000; left:0; top: 0; z-index:999; font-family: verdana; font-size:12px}
				
				.botoes{background: #fff; color: #ff6600; margin:10px; position:absolute; top:6px; z-index:10; font-weight: bold; display: block; width: 120px; line-height: 25px; border:1px solid #ccc; text-align:center}
				
				.debug_cache{right:270px; }
				.debug_logout{right:140px; }
				.debug_clean{ right:10px; }
				
			</style>
		
		<div class="debug_window">
			<a href="'.$c.'" class="botoes debug_cache"> Limpar Cache</a>
			<a href="'.$l.'" class="botoes debug_logout"> Limpar sessão</a>
			<a href="'.$s.'" class="botoes debug_clean"> Sair</a>
		
			<div class="debug_tabs">
				<div id="get">
					<h3>GET</h3>
					'.printr($_GET).'
				</div>
				
				<div id="session">
					<h3>SESSION</h3>
					'.printr($_SESSION).'
				</div>
				
				<div id="cookie">
					<h3>COOKIE</h3>
					'.printr($_COOKIE).'
				</div>
				
				<div id="post">
					<h3>POST</h3>
					'.printr($_POST).'
				</div>
			
				<div id="server">
					<h3>SERVER</h3>
					'.printr($_SERVER).'
				</div>
				
				
			</div>
		</div>';

		unset($_SESSION[HOST]['debug']);
	}
?>