	<div class="row white-bg top-margin">
		<div class="large-12 columns">
			<h2 class="has-line">Comentários</h2>
			<div class="fb-comments" data-href="<?php 
			$url = SITE.implode('/', $_GET);
			if(substr($url, -1) != '/'){
				$url .= '/';	
			}
			echo $url;
			
			?>" data-numposts="5" data-width="100%" data-colorscheme="light"></div>
		</div>
	</div>