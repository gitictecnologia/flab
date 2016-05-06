<?php
	
	
function retornaCssJs($val, $p)
{
	$ext = array('.js', 'css');
	
	$s = '?';
	if(!in_array(substr($val, -3, 3), $ext))
	{
		//$s = '&';
		$s = '&amp;';
	} 
	$f = NULL;
	if(substr($val, 0, 4) != 'http')
	{
		$f = $p;	
	}
	$f .= $val;//.$s.'dsa='.time();
	return $f;
}

$js  = $css = $jsA  = $cssA = NULL;

/**
*
* Se for localhost ou estiver em produção inclui os arquivos JS no head, caso contrário minifica e coloca no footer de forma assicrona.
* Os arquivos CSS sempre estarão no head, minificado ou não.
*
*/
if($_SERVER['HTTP_HOST'] == 'localhost' || DESENVOLVIMENTO){

	foreach($_SESSION[PATH]['cssFiles'] as $val)
	{
		$f = retornaCssJs($val, PATH);
		$css .= '<link rel="stylesheet" type="text/css" href="'.$f.'" media="screen" />'."\n";
	}
	
	$js = "\n";
	foreach($_SESSION[PATH]['jsFiles'] as $val)
	{
		$f = retornaCssJs($val, PATH);
		$js .= '<script type="text/javascript" src="'.$f.'"></script>'."\n";
	}		
	
	foreach($_SESSION[PATH]['admin']['cssFiles'] as $val)
	{
		$f = retornaCssJs($val, PATHA);
		$cssA .= '<link rel="stylesheet" type="text/css" href="'.$f.'" media="screen" />'."\n";
	}
	
	$jsA = "\n";
	foreach($_SESSION[PATH]['admin']['jsFiles'] as $val)
	{
		$f = retornaCssJs($val, PATHA);
		$jsA .= '<script type="text/javascript" src="'.$f.'"></script>'."\n";
	}		
	
}
else
{
	$css = '<link rel="stylesheet" type="text/css" href="'.PATH.'css/all_min.css" media="screen" />'."\n";
}
	
