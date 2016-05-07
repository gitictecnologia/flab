<?php

require('../util/util.php');
//require('../util/auth.php');
require('../model/autoload.php');


switch ($_REQUEST['do'])
{
    case 'add':

        /**
        * Extrai variaveis do post
        */
        extract($_POST);


        $response = array('status' => true, 'message' => '');


        /**
        * Reposta JSON
        */
        header('Content-Type: application/json');        


        /**
        *
        * Validação das informações
        */

        if(empty($newslettersNome))
        {
            $response['status'] = false;
            $response['message'] = "<br>Campo Nome é inválido";
        }

        if(empty($newslettersNomeEmpresa))
        {
            $response['status'] = false;            
            $response['message'] = "<br>Campo Nome da Empresa é inválido";
        }

        if(empty($newslettersEmail) || !validaEmail($newslettersEmail))
        {
            $response['status'] = false;            
            $response['message'] = "<br>Campo Email é inválido";      
        }

        
        if($response['status'] == false)
        {            
            echo json_encode($response);
            return;
            break;
        }
            
        

        /**
        *
        * Persistencia
        */
        $newsletter = new Newsletter();
        $newsletter->set('NomeUsuario', $newslettersNome);
        $newsletter->set('NomeEmpresa', $newslettersNomeEmpresa);
        $newsletter->set('Email', $newslettersEmail);
        $newsletter->set('St', 1);

        if($newsletter->insert())
        {            
            $response['message'] = "<br>Cadastro efetuado com sucesso";

            echo json_encode($response);
            return;
        }
        else
        {            
            $response['message'] = "<br>Não foi possível realizar o cadastro, tente mais tarde.";

            echo json_encode($response);
            return;
        }

        break;

    case 'edit':        
        break;
	
    case 'enable':

        $temaId = $_GET['temaId'];
        $tema = Tema::getById($temaId);
        if($tema != NULL) {            
            $tema->setSt(1);
            if(Contexto::update($tema)) {
                
                echo 'Tema desativado com sucesso';
            } else {

                echo 'Houve um problema sistemico ao tentar afetuar a ação desejada';            
            }
        } else {

            echo 'Tema não encontrado em nosso banco de dados';
        }

        break;

    case 'disable':

        $temaId = $_GET['temaId'];
        $tema = Tema::getById($temaId);
        if($tema != NULL) {            
            $tema->setSt(0);
            if(Contexto::update($tema)) {
                
                echo 'Tema desativado com sucesso';
            } else {

                echo 'Houve um problema sistemico ao tentar afetuar a ação desejada';            
            }
        } else {

            echo 'Tema não encontrado em nosso banco de dados';
        }

        break;

    default:

        echo 'Ação não encontrada';
        break;	
}
	