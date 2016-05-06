<?php

	# Função para erros de banco de dados
	function offline($erro){
		ob_start();
		
		require_once "configs/sa_error.php";
		$html = ob_get_clean();

		
		return $html;
	}
	function config($mysql_con){
		$query 	= "SELECT * FROM sa_configs";	
		$result = mysql_query($query, $mysql_con['read']);
		$CONFIG = array();
		while($dados = mysql_fetch_assoc($result)){
			$CONFIG[$dados['key']] = unescape($dados['val']);
		}
		return $CONFIG;
	}
					
	function mes($mes){
		switch ($mes){
			case 1: $mes = "Janeiro"; break;
			case 2: $mes = "Fevereiro"; break;
			case 3: $mes = "Mar&ccedil;o"; break;
			case 4: $mes = "Abril"; break;
			case 5: $mes = "Maio"; break;
			case 6: $mes = "Junho"; break;
			case 7: $mes = "Julho"; break;
			case 8: $mes = "Agosto"; break;
			case 9: $mes = "Setembro"; break;
			case 10: $mes = "Outubro"; break;
			case 11: $mes = "Novembro"; break;
			case 12: $mes = "Dezembro"; break;
		}
		return $mes;
	}
	function diaDaSemana($semana){
		switch ($semana) {
			case 1: $semana = "Segunda"; 		break;
			case 2: $semana = "Ter&ccedil;a"; 	break;
			case 3: $semana = "Quarta"; 		break;
			case 4: $semana = "Quinta";			break;
			case 5: $semana = "Sexta"; 			break;
			case 6: $semana = "S&aacute;bado"; 	break;
			case 0: $semana = "Domingo"; 		break;
		}
		return $semana;
	}
	
	function escape($string){
		
		//$string = preg_replace(sql_regcase("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/"), "" ,$string);
		//$string = trim($string);
		//$string = strip_tags($string);
			//$string = (get_magic_quotes_gpc()) ? $string : addslashes($string);
		
		$string = mysql_real_escape_string($string);
		return utf8_decode($string);
	}
	function unescape($string){
		return stripslashes(utf8_encode($string));
	}

	function arrayToStr($array){
		$html = "<pre>";
		foreach($array as $key=>$val){
			$html .= "[".$key."] => ".$val."<br />";
		}
		$html .= "</pre>";
		
		return $html;
	}

    function removeAccents($string) {
		if ( !preg_match('/[\x80-\xff]/', $string) )
			return $string;
     
		if (seemsUTF8($string)) {
			$chars = array(
				// Decompositions for Latin-1 Supplement
				chr(195).chr(128) => 'A', chr(195).chr(129) => 'A',
				chr(195).chr(130) => 'A', chr(195).chr(131) => 'A',
				chr(195).chr(132) => 'A', chr(195).chr(133) => 'A',
				chr(195).chr(135) => 'C', chr(195).chr(136) => 'E',
				chr(195).chr(137) => 'E', chr(195).chr(138) => 'E',
				chr(195).chr(139) => 'E', chr(195).chr(140) => 'I',
				chr(195).chr(141) => 'I', chr(195).chr(142) => 'I',
				chr(195).chr(143) => 'I', chr(195).chr(145) => 'N',
				chr(195).chr(146) => 'O', chr(195).chr(147) => 'O',
				chr(195).chr(148) => 'O', chr(195).chr(149) => 'O',
				chr(195).chr(150) => 'O', chr(195).chr(153) => 'U',
				chr(195).chr(154) => 'U', chr(195).chr(155) => 'U',
				chr(195).chr(156) => 'U', chr(195).chr(157) => 'Y',
				chr(195).chr(159) => 's', chr(195).chr(160) => 'a',
				chr(195).chr(161) => 'a', chr(195).chr(162) => 'a',
				chr(195).chr(163) => 'a', chr(195).chr(164) => 'a',
				chr(195).chr(165) => 'a', chr(195).chr(167) => 'c',
				chr(195).chr(168) => 'e', chr(195).chr(169) => 'e',
				chr(195).chr(170) => 'e', chr(195).chr(171) => 'e',
				chr(195).chr(172) => 'i', chr(195).chr(173) => 'i',
				chr(195).chr(174) => 'i', chr(195).chr(175) => 'i',
				chr(195).chr(177) => 'n', chr(195).chr(178) => 'o',
				chr(195).chr(179) => 'o', chr(195).chr(180) => 'o',
				chr(195).chr(181) => 'o', chr(195).chr(182) => 'o',
				chr(195).chr(182) => 'o', chr(195).chr(185) => 'u',
				chr(195).chr(186) => 'u', chr(195).chr(187) => 'u',
				chr(195).chr(188) => 'u', chr(195).chr(189) => 'y',
				chr(195).chr(191) => 'y',
				// Decompositions for Latin Extended-A
				chr(196).chr(128) => 'A', chr(196).chr(129) => 'a',
				chr(196).chr(130) => 'A', chr(196).chr(131) => 'a',
				chr(196).chr(132) => 'A', chr(196).chr(133) => 'a',
				chr(196).chr(134) => 'C', chr(196).chr(135) => 'c',
				chr(196).chr(136) => 'C', chr(196).chr(137) => 'c',
				chr(196).chr(138) => 'C', chr(196).chr(139) => 'c',
				chr(196).chr(140) => 'C', chr(196).chr(141) => 'c',
				chr(196).chr(142) => 'D', chr(196).chr(143) => 'd',
				chr(196).chr(144) => 'D', chr(196).chr(145) => 'd',
				chr(196).chr(146) => 'E', chr(196).chr(147) => 'e',
				chr(196).chr(148) => 'E', chr(196).chr(149) => 'e',
				chr(196).chr(150) => 'E', chr(196).chr(151) => 'e',
				chr(196).chr(152) => 'E', chr(196).chr(153) => 'e',
				chr(196).chr(154) => 'E', chr(196).chr(155) => 'e',
				chr(196).chr(156) => 'G', chr(196).chr(157) => 'g',
				chr(196).chr(158) => 'G', chr(196).chr(159) => 'g',
				chr(196).chr(160) => 'G', chr(196).chr(161) => 'g',
				chr(196).chr(162) => 'G', chr(196).chr(163) => 'g',
				chr(196).chr(164) => 'H', chr(196).chr(165) => 'h',
				chr(196).chr(166) => 'H', chr(196).chr(167) => 'h',
				chr(196).chr(168) => 'I', chr(196).chr(169) => 'i',
				chr(196).chr(170) => 'I', chr(196).chr(171) => 'i',
				chr(196).chr(172) => 'I', chr(196).chr(173) => 'i',
				chr(196).chr(174) => 'I', chr(196).chr(175) => 'i',
				chr(196).chr(176) => 'I', chr(196).chr(177) => 'i',
				chr(196).chr(178) => 'IJ',chr(196).chr(179) => 'ij',
				chr(196).chr(180) => 'J', chr(196).chr(181) => 'j',
				chr(196).chr(182) => 'K', chr(196).chr(183) => 'k',
				chr(196).chr(184) => 'k', chr(196).chr(185) => 'L',
				chr(196).chr(186) => 'l', chr(196).chr(187) => 'L',
				chr(196).chr(188) => 'l', chr(196).chr(189) => 'L',
				chr(196).chr(190) => 'l', chr(196).chr(191) => 'L',
				chr(197).chr(128) => 'l', chr(197).chr(129) => 'L',
				chr(197).chr(130) => 'l', chr(197).chr(131) => 'N',
				chr(197).chr(132) => 'n', chr(197).chr(133) => 'N',
				chr(197).chr(134) => 'n', chr(197).chr(135) => 'N',
				chr(197).chr(136) => 'n', chr(197).chr(137) => 'N',
				chr(197).chr(138) => 'n', chr(197).chr(139) => 'N',
				chr(197).chr(140) => 'O', chr(197).chr(141) => 'o',
				chr(197).chr(142) => 'O', chr(197).chr(143) => 'o',
				chr(197).chr(144) => 'O', chr(197).chr(145) => 'o',
				chr(197).chr(146) => 'OE',chr(197).chr(147) => 'oe',
				chr(197).chr(148) => 'R',chr(197).chr(149) => 'r',
				chr(197).chr(150) => 'R',chr(197).chr(151) => 'r',
				chr(197).chr(152) => 'R',chr(197).chr(153) => 'r',
				chr(197).chr(154) => 'S',chr(197).chr(155) => 's',
				chr(197).chr(156) => 'S',chr(197).chr(157) => 's',
				chr(197).chr(158) => 'S',chr(197).chr(159) => 's',
				chr(197).chr(160) => 'S', chr(197).chr(161) => 's',
				chr(197).chr(162) => 'T', chr(197).chr(163) => 't',
				chr(197).chr(164) => 'T', chr(197).chr(165) => 't',
				chr(197).chr(166) => 'T', chr(197).chr(167) => 't',
				chr(197).chr(168) => 'U', chr(197).chr(169) => 'u',
				chr(197).chr(170) => 'U', chr(197).chr(171) => 'u',
				chr(197).chr(172) => 'U', chr(197).chr(173) => 'u',
				chr(197).chr(174) => 'U', chr(197).chr(175) => 'u',
				chr(197).chr(176) => 'U', chr(197).chr(177) => 'u',
				chr(197).chr(178) => 'U', chr(197).chr(179) => 'u',
				chr(197).chr(180) => 'W', chr(197).chr(181) => 'w',
				chr(197).chr(182) => 'Y', chr(197).chr(183) => 'y',
				chr(197).chr(184) => 'Y', chr(197).chr(185) => 'Z',
				chr(197).chr(186) => 'z', chr(197).chr(187) => 'Z',
				chr(197).chr(188) => 'z', chr(197).chr(189) => 'Z',
				chr(197).chr(190) => 'z', chr(197).chr(191) => 's',
				// Euro Sign
				chr(226).chr(130).chr(172) => 'E',
				// GBP (Pound) Sign
				chr(194).chr(163) => '');

			$string = strtr($string, $chars);
		} else {
			// Assume ISO-8859-1 if not UTF-8
			$chars['in'] = 	chr(128).chr(131).chr(138).chr(142).chr(154).chr(158)
							.chr(159).chr(162).chr(165).chr(181).chr(192).chr(193).chr(194)
							.chr(195).chr(196).chr(197).chr(199).chr(200).chr(201).chr(202)
							.chr(203).chr(204).chr(205).chr(206).chr(207).chr(209).chr(210)
							.chr(211).chr(212).chr(213).chr(214).chr(216).chr(217).chr(218)
							.chr(219).chr(220).chr(221).chr(224).chr(225).chr(226).chr(227)
							.chr(228).chr(229).chr(231).chr(232).chr(233).chr(234).chr(235)
							.chr(236).chr(237).chr(238).chr(239).chr(241).chr(242).chr(243)
							.chr(244).chr(245).chr(246).chr(248).chr(249).chr(250).chr(251)
							.chr(252).chr(253).chr(255);

			$chars['out'] = "EfSZszYcYuAAAAAACEEEEIIIINOOOOOOUUUUYaaaaaaceeeeiiiinoooooouuuuyy";

			$string = strtr($string, $chars['in'], $chars['out']);
			$double_chars['in'] = array(chr(140), chr(156), chr(198), chr(208), chr(222), chr(223), chr(230), chr(240), chr(254));
			$double_chars['out'] = array('OE', 'oe', 'AE', 'DH', 'TH', 'ss', 'ae', 'dh', 'th');
			$string = str_replace($double_chars['in'], $double_chars['out'], $string);
		}

		return $string;
    }
    function seemsUTF8($str) {
		$length = strlen($str);
		for ($i=0; $i < $length; $i++) {
			$c = ord($str[$i]);
			if ($c < 0x80) $n = 0; # 0bbbbbbb
			elseif (($c & 0xE0) == 0xC0) $n=1; # 110bbbbb
			elseif (($c & 0xF0) == 0xE0) $n=2; # 1110bbbb
			elseif (($c & 0xF8) == 0xF0) $n=3; # 11110bbb
			elseif (($c & 0xFC) == 0xF8) $n=4; # 111110bb
			elseif (($c & 0xFE) == 0xFC) $n=5; # 1111110b
			else return false; # Does not match any model
			for ($j=0; $j<$n; $j++) { # n bytes matching 10bbbbbb follow ?
				if ((++$i == $length) || ((ord($str[$i]) & 0xC0) != 0x80))
					return false;
			}
		}
		return true;
    }
    function utf8UriEncode( $utf8_string, $length = 0 ) {
		$unicode = '';
		$values = array();
		$num_octets = 1;
		$unicode_length = 0;
 
		$string_length = strlen( $utf8_string );
		for ($i = 0; $i < $string_length; $i++ ) {
 
			$value = ord( $utf8_string[ $i ] );

			if ( $value < 128 ) {
				if ( $length && ( $unicode_length >= $length ) )
					break;
				$unicode .= chr($value);
				$unicode_length++;
			} else {
				if ( count( $values ) == 0 ) $num_octets = ( $value < 224 ) ? 2 : 3;

				$values[] = $value;

				if ( $length && ( $unicode_length + ($num_octets * 3) ) > $length )
					break;
				if ( count( $values ) == $num_octets ) {
					if ($num_octets == 3) {
						$unicode .= '%' . dechex($values[0]) . '%' . dechex($values[1]) . '%' . dechex($values[2]);
						$unicode_length += 9;
					} else {
						$unicode .= '%' . dechex($values[0]) . '%' . dechex($values[1]);
						$unicode_length += 6;
					}

					$values = array();
					$num_octets = 1;
				}
			}
		}
 
		return $unicode;
    }
    function slug($title){
		$title = strip_tags($title);
		$title = preg_replace('|%([a-fA-F0-9][a-fA-F0-9])|', '---$1---', $title);
		$title = str_replace('%', '', $title);
		$title = preg_replace('|---([a-fA-F0-9][a-fA-F0-9])---|', '%$1', $title);
 
		$title = removeAccents($title);
		if (seemsUTF8($title)) {
			if (function_exists('mb_strtolower')) {
				$title = mb_strtolower($title, 'UTF-8');
			}
			$title = utf8UriEncode($title, 200);
		}
 
		$title = strtolower($title);
		$title = preg_replace('/&.+?;/', '', $title); // kill entities
		$title = str_replace('.', '-', $title);
		//$title = preg_replace('/[^%a-z0-9 _-]/', '', $title);
		$title = preg_replace('/[^%a-z0-9 _-]/', '-', $title);
		$title = preg_replace('/\s+/', '-', $title);
		$title = preg_replace('|-+|', '-', $title);
		$title = trim($title, '-');
 
		return $title;
    }
	
	function checaAjax(){
		if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
			return true;
		}
		return false;
	}
	function retornoJSON($array){
		if(function_exists('json_encode')){
			$str = json_encode($array);
		} else {
			$arr = array();
			foreach($array as $k => $v){
				if(in_array($v, array('true', 'false'))){
					$arr[] = '"'.$k.'" : '.( ($v) ? 'true' : 'false');
					continue;
				}
				if(is_array($v)){
					$arr[] = '"'.$k.'" : ["'.implode('","', $v).'"]';
					//$arr[] = '["'.implode('","', $v).'"]';
					continue;
				}
				if(is_numeric($v)){
					$arr[] = '"'.$k.'" : '.$v;
				} else {
					$arr[] = '"'.$k.'" : "'.$v.'"';	
				}
			}
			$str = '{'.implode(", ", $arr).'}';
		}
		
		return $str;	
	}

	function validaEmail($email){
		if(preg_match("/^([[:alnum:]_.-]){3,}@([[:lower:][:digit:]_.-]{3,})(\.[[:lower:]]{2,3})(\.[[:lower:]]{2})?$/", $email)) {
			return true;
		}else{
			return false;
		}
	}

	
	function geraSenha($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false){
		$lmin = 'abcdefghijklmnopqrstuvwxyz';
		$lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$num = '1234567890';
		$simb = '!@#$%*-';
		$retorno = '';
		$caracteres = '';
		
		$caracteres .= $lmin;
		if ($maiusculas) $caracteres .= $lmai;
		if ($numeros) $caracteres .= $num;
		if ($simbolos) $caracteres .= $simb;
		
		$len = strlen($caracteres);
		for ($n = 1; $n <= $tamanho; $n++) {
			$rand = mt_rand(1, $len);
			$retorno .= $caracteres[$rand-1];
		}
		return $retorno;
	}
	
	function dropdown($id, $label, $options, $destino, $align){
		
		if(isset($align)){
			$align = 'align:'.$align;	
		} else {
			$align = '';
		}
			
		$li = array();
		foreach($options as $k => $v){
			$d = 'javascript:void(0)';
			if(!is_null($destino)){
				$d = $destino.$k;	
			}
			$li[] = '<li><a href="'.$d.'" data-linha="'.$k.'-'.slug($v).'">'.$k.' - '.$v.'</a></li>'."\n";
		}	
		//data-options="'.$align.'"
		$html = '<a href="javascript:void(0)" data-dropdown="'.$id.'" class="small secondary radius button dropdown tiny">'.$label.'</a><br />
		<ul id="'.$id.'" data-dropdown-content class="f-dropdown">'.implode('', $li).'</ul>';
		
		return $html;	
	}
	
	function objectToArray($d) {
		if (is_object($d)) {
			$d = get_object_vars($d);
		}
 
		if (is_array($d)) {
			return array_map(__FUNCTION__, $d);
		}else {
			return $d;
		}
	}
	
	function get_youtube_domains() {
		return array(
			'youtube.com',
			'youtube.co.uk',
			'youtube.br',
			'youtube.fr',
			'youtube.it',
			'youtube.jp',
			'youtube.nl',
			'youtube.pl',
			'youtube.es',
			'youtube.ie',
			'youtu.be'
		);
	}
	function is_valid_youtube_url($url) {
		return get_youtube_video_id($url) === false ? false : true;
	} 
	function get_youtube_video_id($url) {
		$parsed = parse_url($url);

		$basedomain = strtolower(trim($parsed['host']));
		if (!$basedomain) {
			return false;
		} // if
		
		// extract basedomain
		$basedomain_parts = explode('.', $basedomain);
		$basedomain_parts_num = count($basedomain_parts);
		if ($basedomain_parts_num < 2) {
			return false;
		} // if
		
		// hack for co.uk domain
		if ($basedomain_parts[$basedomain_parts_num - 2] == 'co' && $basedomain_parts[$basedomain_parts_num - 1] == 'uk') {
			if ($basedomain_parts_num < 3) {
				return false;
			} // if
			$basedomain = $basedomain_parts[$basedomain_parts_num - 3] . '.' . $basedomain_parts[$basedomain_parts_num - 2] . '.' . $basedomain_parts[$basedomain_parts_num - 1];			
		} else {
			$basedomain = $basedomain_parts[$basedomain_parts_num - 2] . '.' . $basedomain_parts[$basedomain_parts_num - 1];
		} // if
		
		// domain is not in list of supported domains
		if (!in_array($basedomain, get_youtube_domains())) {
			return false;
		} // if
		
		// shortened url
		if ($basedomain == 'youtu.be') {
			$path = trim(array_var($parsed, 'path'));
			
			if (!$path || strlen($path) < 2) {
				return false;
			} // if
			
			$video_id = trim(substr($path, 1));
			if (!$video_id) {
				return  false;
			} // if
			
			return $video_id;
		} else {
			$query = trim($parsed['query']);
			parse_str($query, $parsed_query);
			$video_id = array_var($parsed_query, 'v', null);
			if (!$video_id) {
				return false;
			} // if
			return $video_id;
		} // if
	}
	
	function array_var(&$from, $name, $default = null, $and_unset = false) {
		if(is_array($from) || (is_object($from) && instance_of($from, 'ArrayAccess'))) {
			if($and_unset) {
				if(array_key_exists($name, $from)) {
					$result = $from[$name];
					unset($from[$name]);
					return $result;
				} // if
			} else {
				return array_key_exists($name, $from) ? $from[$name] : $default;
			} // if
		} // if
		return $default;
	}
	/*
	if(!function_exists('json_decode')){
		function json_decode($json){
			$comment = false;
			$out = '$x=';
			for ($i=0; $i<strlen($json); $i++){
				if (!$comment){
					if (($json[$i] == '{') || ($json[$i] == '['))
						$out .= ' array(';
					else if (($json[$i] == '}') || ($json[$i] == ']'))
						$out .= ')';
					else if ($json[$i] == ':')
						$out .= '=>';
					else
						$out .= $json[$i];
				}else
					$out .= $json[$i];
				
				if ($json[$i] == '"' && $json[($i-1)]!="\\")
					$comment = !$comment;
			}
			eval($out . ';');
			return $x;
		}
	}
	*/
	
	function rgb($cor_hexa){
		$match = preg_match('/^#([A-F\d]{2})([A-F\d]{2})([A-F\d]{2})$/i', $cor_hexa, $matches);

		$cor = array(
			'r' => hexdec($matches[1]),
			'g' => hexdec($matches[2]),
			'b' => hexdec($matches[3])
		);
		
		return $cor;
	}
	
	function write_multiline_text($image, $font_size, $color, $font, $text, $start_x, $start_yy, $max_width) { 

		$words = explode(" ", $text); 
		$string = ""; 
		$tmp_string = ""; 
	
		for($i = 0; $i < count($words); $i++) { 
			$tmp_string .= $words[$i]." "; 
	
			$dim = imagettfbbox($font_size, 0, $font, $tmp_string); 
	
			if($dim[4] < ($max_width - $start_x)) { 
				$string = $tmp_string; 
				$curr_width = $dim[4];
			} else { 
				$i--; 
				$tmp_string = ""; 
				$start_xx = $start_x + round(($max_width - $curr_width - $start_x) );  
				imagettftext($image, $font_size, 0, $start_xx, $start_yy, $color, $font, $string); 
	
				$string = ""; 
				//$start_yy += abs($dim[5]); 
				$start_yy += 20;
				$curr_width = 0;
			} 
		} 
		
		$start_xx = $start_x + round(($max_width - $dim[4] - $start_x) );        
		imagettftext($image, $font_size, 0, $start_xx, $start_yy  , $color, $font, $string);
	}
	
	function categoryChild($id, $mysql_con) {
		$query = 'SELECT id FROM sa_produtos_categorias WHERE pai = "'.$id.'"';
		$result = mysql_query($query, $mysql_con['read']);
		
		$children = array();
		
		if(mysql_num_rows($result) > 0) {
			while($dados = mysql_fetch_array($result)) {
				$children[$dados['id']] = categoryChild($dados['id'], $mysql_con);
			}
		}
		
		return $children;
	}
	function categoryParent($id, $mysql_con) {
		
		$query = 'SELECT pai FROM sa_produtos_categorias WHERE id = "'.$id.'"';
		$result = mysql_query($query, $mysql_con['read']);
		
		$children = array();
		
		if(mysql_num_rows($result) > 0) {
			while($dados = mysql_fetch_array($result)) {
				if(!empty($dados['pai'])){
					$children[$dados['pai']] = categoryParent($dados['pai'], $mysql_con);
				}
			}
		}
		if(count($children) > 0){
			return $children;
		} else{
			return false;	
		}
	}		
	function lastCat($array){
		$l = NULL;
		
		if(is_array($array)){
			foreach($array as $k => $v){
				$l = $k;	
				if(is_array($v)){
					$l = lastCat($v);
				}
			}
		}

		return $l;
	}

	
