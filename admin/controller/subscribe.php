<?php

require('../util/util.php');
require('../util/pathImages.php');
//require('../util/auth.php');
require('../model/autoload.php');

switch ($_REQUEST['do']) {

	case 'add':

		extract($_POST);


		header('Content-Type: appliction/json');
		

		$response = array(
			'st' => false,
			'message' => 'Operação não pode ser realizada',
		);


		/**
		*
		* Server side validation
		*/
		//*************


		try {
			
		
			/**
			*
			* Empresa
			*/
			$empresa = new Empresa();
			$empresa->CNPJ = $cnpj;
			$empresa->Nome = $nomeEmpresa;
			$empresa->Site = $website;
			$empresa->Descricao = $descricaoProjetoEmpresa;
			$empresa->Telefone = $telefone;
			$empresa->DtFundacao = date('Y-m-d', strtotime(str_replace('/', '-', $dtFundacao)));
			$empresa->Faturamento = $faturamento;
			$empresa->St = 1;
			/**
			* Arquivo de apresentação
			*/
			if(isset($_FILES['pptApresentacao']) && !empty($_FILES['pptApresentacao']['name'])) {
				$newNameApresentacao = time() . '.' . array_pop(explode('.', $_FILES['pptApresentacao']['name']));
				if(!copy($_FILES['pptApresentacao']['tmp_name'], $pathImage['docs']['apresentacao']['abs'] . $newNameApresentacao)) {
					throw new Exception("Falha ao copiar arquivo " . $_FILES['pptApresentacao']['name']);
				}
				$empresa->Apresentacao = $newNameApresentacao;
			} else {
				throw new Exception("Necessário enviar um arquivo contendo a apresentação da empresa");
			}
			

			if(!$empresa->insert()) {
				throw new Exception("Falha ao inserir empresa");
			}


			/**
			*
			* Endereço
			*/
			$endereco = new Endereco();
			$endereco->EmpresaId = $empresa->Id;
			$endereco->EstadoId = $estado;			
			$endereco->Logradouro = $logradouro; 
			$endereco->Cidade = $cidade; 
			$endereco->Numero = 0;

			if(!$endereco->insert()) {
				throw new Exception("Falha ao inserir endereço");		
			}


			/**
			*
			* Sócios
			*/
			$socio = new Socio();
			$socio->EmpresaId = $empresa->Id;
			$socio->Nome = $nomeSocioResponsavel;		
			$socio->Celular = $celular;
			$socio->Email = $email;
			$socio->Cargo = $cargo;		
			$socio->Tipo = 0;
			$socio->St = 1;
			/**
			* Aquivo de autorizacao dos socios
			*/			
			if(isset($_FILES['autorizacaoSocio']) && !empty($_FILES['autorizacaoSocio']['name'])) {
				$newNameAutorizacao = time() . '.' . array_pop(explode('.', $_FILES['autorizacaoSocio']['name']));
				if(!copy($_FILES['autorizacaoSocio']['tmp_name'], $pathImage['docs']['autorizacao']['abs'] . $newNameAutorizacao)) {
					throw new Exception("Falha ao copiar arquivo " . $_FILES['autorizacaoSocio']['name']);					
				}
				$socio->Autorizacao = $newNameAutorizacao;
			} else {
				//throw new Exception("Necessário enviar um arquivo .ZIP contento a(s) autorização(oes)) do(s) socio(s)");
			}

			/**
			* Arquivo curriculo / Linkedin
			*/
			if(isset($_FILES['curriculoSocio']) && !empty($_FILES['curriculoSocio']['name']))
			{
				$newNameCurriculo = time() . '.' . array_pop(explode('.', $_FILES['curriculoSocio']['name']));
				if(!copy($_FILES['curriculoSocio']['tmp_name'], $pathImage['docs']['curriculo']['abs'] . $newNameCurriculo))
				{
					throw new Exception("Falha ao copiar arquivo " . $_FILES['curriculoSocio']['name']);
				}
				$socio->Curriculo = $newNameCurriculo;
			}
			else if(isset($linkedinSocio) && !empty($linkedinSocio))
			{
				$socio->CurriculoLink = $linkedinSocio;
			}
			else
			{
				throw new Exception("Necessário enviar um arquivo .ZIP contento o(s) curriculo(s) do(s) socio(s) ou o link do LINKEDIN separado por virgúla");
			}

			if(!$socio->insert()) {
				throw new Exception("Falha ao inserir sócio");
			}



			/**
			*		
			* Pergunta/Resposta 
			*/
			$resposta = new Resposta();
			$resposta->EmpresaId = $empresa->Id;
			$resposta->PerguntaId = 1;
			$resposta->Resposta = $descricaoProjetoEmpresa;

			if(!$resposta->insert()) {
				throw new Exception("Falha ao inserir resposta");			
			}			


			/**
			*		
			* Projeto
			*/
			$projeto = new Projeto();
			$projeto->EmpresaId = $empresa->Id;
			$projeto->Nome = 'N/D';
			$projeto->Descricao = $descricaoProjetoEmpresa;

			if(!$projeto->insert()) {
				throw new Exception("Falha ao inserir projeto");				
			}

		} catch (Exception $e) {
			/**
			* ROLLBACK
			*/
			if(isset($endereco)) {
				$endereco->delete();
			}
			if(isset($socio)) {
				$socio->delete();
			}
			if(isset($resposta)) {
				$resposta->delete();
			}
			if(isset($projeto)) {
				$projeto->delete();
			}
			if(isset($empresa)) {
				$empresa->delete();
			}
			
			$response['message'] = $e->getMessage();
			echo json_encode($response);
			break;
		}


		/**
		* All right here
		*/


		$response['st'] = true;
		$response['message'] = "Cadastro realizado com sucesso";
		
		echo json_encode($response);
		break;

}