<?php

$paginas = ceil($total/$numreg);
if($paginas > 1)
{

	if($paginas > 0 && $total > 1){
		
		$htmlp = '<ul class="pagination">';

		if ($pg > 1) 
		{ 
			$htmlp .= '<li class="control"><a href="'.PATH.$endereco.'1'.'" aria-label="Firt">&lt;&lt;</a></li>';
			$htmlp .= '<li class="control"><a href="'.PATH.$endereco.($pg - 1).'" aria-label="Previous"><span aria-hidden="true">&lt;</span></a></li>';

		} else 
		{ 
			$htmlp .= '<li class="control"><a href="javascript:void(0)">&lt;&lt;</a></li>';
			$htmlp .= '<li class="control"><a href="javascript:void(0)" aria-label="Previous"><span aria-hidden="true">&lt;</span></a></li>';
		}

			 
		#paginas	
		for($i = 1; $i <= $paginas; $i++) 
		{
	
			if($pg == 1){
				$max = $pg + 4;
			} else if($pg == 2){
				$max = $pg + 3;
			} else {
				$max = $pg + 2;
			}
			
			if($pg == $paginas){
				$min = $pg - 4;	
			} else if($pg == ($paginas-1)){
				$min = $pg - 3;	
			} else {
				$min = $pg - 2;
			}

			if ($pg == $i) {
				$htmlp .= '<li class="active"><a href="javascript:void(0)">'.str_pad($i,2,0,STR_PAD_LEFT).'</a></li>';
			}
			else {
				if($i >= $min && $i <= $max){
					$htmlp .= '<li><a href="'.PATH.$endereco.$i.'">'.str_pad($i,2,0,STR_PAD_LEFT).'</a></li>';
				}
			}
		}
		
		if($pg == $paginas)
		{
			$htmlp .= '<li class="control"><a href="javascript:void(0)" aria-label="Next"><span aria-hidden="true">&gt;</span></a></li>';	
			$htmlp .= '<li class="control"><a href="javascript:void(0)" aria-label="Last">&gt;&gt;</a></li>';
		} 
		else 
		{
			$htmlp .= '<li class="control"><a href="'.PATH.$endereco.($pg + 1).'" aria-label="Next"><span aria-hidden="true">&gt;</span></a></li>';	
			$htmlp .= '<li class="control"><a href="'.PATH.$endereco.$paginas.'" aria-label="Last">&gt;&gt;</a></li>';		
		}
		$htmlp .= '</ul>';
		
		echo $htmlp;
	}
}
	?>