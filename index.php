<?php
require_once 'configs/sa_configs.php';
require_once 'configs/sa_funcoeslib.php';
require_once 'configs/sa_conexao.php';
require_once 'configs/sa_url-amigavel.php';
require_once 'configs/sa_cache.php';
require_once 'configs/sa_css-js.php';
require_once 'configs/sa_meta.php';
require_once 'admin/obj/obj.include.php';


echo '<!DOCTYPE html>'."\n";
echo '<html>'."\n";

echo '<head>'."\n";

echo "<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
 
  ga('create', 'UA-71778466-1', 'auto');
  ga('send', 'pageview');
 
</script>";
 
// Define o titulo da pagina
$titles = array( 
	'' => 'Home', 
	'folha' => 'Folha de Pagamento', 
	'gestaorh' => 'Gestão de Recursos Humanos', 
	'servicos' => 'Serviços Financeiros',
	'sobre' => 'Sobre a CServices', 
	'clientes' =>  'Clientes',
	'blog' => 'Blog',
	'post' => 'Post',
	'contato' => 'Contato'
);


echo "<title>".(array_key_exists($_GET['a'], $titles) ? $titles[$_GET['a']] : 'Home')." - CServices</title>\n";



// METAS
echo '<meta charset="utf-8">'."\n";
echo '<meta name="viewport" content="width=device-width, initial-scale=1" />'."\n";
echo '<meta name="HandheldFriendly" content="true">'."\n";
echo '<link rel="icon" type="image/png" href="'.PATH.'assets/img/favicon.png">'."\n";

// CSS
echo $css;
echo '<link rel="stylesheet" type="text/css" href="'.PATH.'assets/css/enhanced.css" media="screen  and (min-width: 40.5em)" />'."\n";
echo '<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel="stylesheet" type="text/css">'."\n";
echo '<!--[if (lt IE 9)&(!IEMobile)]>'."\n";
echo '<link rel="stylesheet" type="text/css" href="'.PATH.'assets/css/enhanced.css"  media="screen, handheld" />'."\n";
echo '<![endif] -->'."\n";
echo '<script type="text/javascript" src="'.PATH.'assets/js/modernizr.js"></script>'."\n";
echo '<script type="text/javascript" src="'.PATH.'assets/js/init.js"></script>'."\n";


// TAG GA (inclusa somente em producao)
/*
if(!($_SERVER['HTTP_HOST'] == 'localhost:8080' || $_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == 'website.cservices.midiadesigners.local' || $_SERVER['HTTP_HOST'] == 'website.cservices.mediainteractive.com.br')) {

	// Tag GA
	echo "<script>\n";
	echo "(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){\n";
	echo "(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),\n";
	echo "m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)\n";
	echo "})(window,document,'script','//www.google-analytics.com/analytics.js','ga');\n";
	echo "ga('create', 'UA-46634823-1', 'cosinconsulting.com.br');\n";
	echo "ga('send', 'pageview');\n";
	echo "</script>\n";

}
*/
echo '</head>'."\n";
echo '<body>'."\n";

flush();

$require = 'index.php';

if(!$_CREATE){
	$require = 'error_404.php';
} else {
	if(isset($_GET["a"]) && !empty($_GET["a"])){
		$require = $_GET["a"].'.php';

		# If en 
		if(!file_exists('views/site_'.$require) && !file_exists('views/site_p_'.$require)){
			$require = 'error_404.php';
		} else if(file_exists('views/site_p_'.$require)){
			$require = 'p_'.$require;
		}
	}
}


require_once 'includes/site_header.php';
require_once 'views/site_'.$require;
require_once 'includes/site_footer.php';


echo $js;

echo '</body>';
echo '</html>';

$_HTML = ob_get_contents();
ob_end_clean();

require_once 'configs/sa_cache-create.php';