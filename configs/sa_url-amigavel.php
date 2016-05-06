<?php
	
	$inputs = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',
					'ab','ac','ad','ae','af','ag','ah','ai','aj','ak','al','am','an','ao','ap','aq','ar','as','at','au','av','aw','ax','ay','az',
	);
	
	# Tratamento do GET passado pelo .htaccess
	if(isset($_GET['a'])){

		# Converte todos os GETs
		$GET = explode('/', $_GET['a']);
		foreach($GET as $key => $val){
			if(!empty($val)){
				$_GET[$inputs[$key]] = trim($val);
			}
		}
		
	} else {
		$_GET['a'] = NULL;
	}

	
	# Ignora tudo se for o Admin
	if(in_array('admin', $_GET)){
		die;
	}
	

	# Tratamento do GET passado pelo .htaccess
	# Transformando $_GET "?foo=bar" em "$GET['foo']" | "GET genérico"
	//$GETS = preg_match_all("/(?<=[.*\?]).*/", $_SERVER["REQUEST_URI"], $matches);
	
	$_QUERYSTRING = array();
	if(isset($_SERVER["QUERY_STRING"])){
		$GETS = explode("&", $_SERVER["QUERY_STRING"]);
		foreach($GETS as $v ) {
			if(!empty($v)){
				$e = explode("=", $v);
			
				$k = $e[0];
				$v = $e[1];
			
				$_QUERYSTRING[$k] = $v;
			}
		}
	}
	
	if(!empty($_GET['a'])){
		
		# Verifica se é um arquivo protegido, de consulta, ou post
		$_CREATE = false;
		$require = false;
		
		# Incluir os arquivos de Ajax/JSON
		if(file_exists('views/site_a_'.$_GET['a'].'.php')){
			if(checaAjax()){
				header('Content-type: text/json');
				header('Content-type: application/json');			
			}
			
			$require = 'a_'.$_GET['a'].'.php';
		# Inclui os arquivos da Hash
		} else if(file_exists('views/site_h_'.$_GET['a'].'.php')){
			$_CREATE = true;
			$require = 'h_'.$_GET['a'].'.php';
		
		# Checa se o usuario está logado para exibir a página protegida
		} else if(file_exists('views/site_p_'.$_GET['a'].'.php')){
			//$require = 'p_'.$val.'.php';
			
			if(!isset($_SESSION[HOST]['u']['uid'])){	
				header("location: ".PATH);
				die;
			}
		}
		

		# Faz o cache dos arquivos de Hash
		if($require){
			
			//require_once 'includes/sa_conexao.php';
			require_once 'views/site_'.$require;

			$_HTML = ob_get_contents();
					 ob_end_clean(); 
	
			if($_CREATE){
				require_once 'configs/sa_cache.php';
				require_once 'configs/sa_cache-create.php';	
			} else {
				echo $_HTML;
			}

			die;	
		}
		
		# Verifica se o arquivo é o CSS ou JS minificado
		if(isset($_GET['b']) && in_array($_GET['b'], array('all_min.js', 'all_min.css'))){
			$require = 'sa_css.php';
			if($_GET['b'] == "all_min.js"){
				$require = 'sa_js.php';
			}
			require_once 'configs/'.$require;
			die;
		}	
	}
	
	# Caso a página não exista, retorna um header 404
	$uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $_SERVER['PATH_TRANSLATED']  ;
	$uri = explode('/', $uri);
	$uri = end($uri);
	$uri = substr($uri, 0, 9);
	
	$_CREATE = true;
	if(!empty($_GET['a']) || $uri == 'index.php'){
		if(    !file_exists("views/site_".$_GET['a'].".php") 
			&& !file_exists("views/site_h_".$_GET['a'].".php")
			&& !file_exists("views/site_p_".$_GET['a'].".php") 
			&& !file_exists("views/site_a_".$_GET['a'].".php") ){
			$erro = true;
			
			if($erro){
				//header("HTTP/1.0 404 Not Found");
				$_CREATE = false;	
			}
			
		}
	}