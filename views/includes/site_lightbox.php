<style>
	.modal-body, .modal-body .lightbox-img .row .col-sm-12 {
		padding: 0px;
	}
	.modal-body .lightbox-img {
    	margin-top: -10px;    	
	}
	.modal-body .lightbox-img .row{
    	margin-left: 0px;
    	margin-right: 0px;
	}


	.lightbox-texto {
		padding-top: 20px;
		padding-left: 20px;
		padding-right: 20px;
		color: #539672;
	}
	.lightbox-texto strong {
		font-weight: 900;
	}

	@media (max-width: 767px) {
		.close, .close:hover {
			color: #000;			
		}
	}

	@media (min-width: 992px) {
		.close, .close:hover {
			color: #fff;			
		}			
	}

	.close, .close:hover {	
		font-size: 1em;
		font-weight: 100;
		margin-top: 20px;
		text-shadow: none;
		opacity: 1;
	}
	.close .glyphicon {
		font-weight: 100;
	}
	
</style>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">			
			<div class="modal-body">
				<div class="lightbox-img">
					<div class="row">
						<div class="col-sm-12">
							<img class="img-responsive" src="assets/images/lightbox_jairo.jpg">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<p class="lightbox-texto">
							Com 22 anos de experiência em mídia e negócios em comunicação com passagens nas principais agências do país e experiência em agência no Vale do Silício, um dos pioneiros no Brasil em mídia digital e atualmente está a frente da Operação da Agência de publicidade <strong>Fischer</strong>, uma das maiores do mercado, atuando também como líder do departamento de mídia e responsável pela restruturação do <strong>Grupo Fischer</strong> na área Digital e de Inovação. Desde 2014 atua como conselheiro e investidor anjo em statups do Brasil e Estados Unidos.
						</p>
					</div>
				</div>				
			</div>
			<div class="row">
				<div class="col-sm-12">
					<button type="button" class="close" data-dismiss="modal" aria-label=""><span aria-hidden="true">Fechar <span class="glyphicon glyphicon-remove-circle"></span></span></button>
				</div>
			</div>
		</div>
	</div>
</div>