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
        *
        * Verifica se o email já axiste no Banco de Dados
        *
        */
        if(Newsletter::getByEmail($newslettersEmail) == NULL)
        {
            /**
            *
            * Persistencia
            */        
            $newsletter = new Newsletter();
            $newsletter->NomeUsuario = $newslettersNome;
            $newsletter->NomeEmpresa = $newslettersNomeEmpresa;
            $newsletter->Email = $newslettersEmail;
            $newsletter->St = 1;

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
        }
        else
        {
            $response['status'] = false;            
            $response['message'] = "<br>Esse email já está cadastrado em nosso Banco de Dados";

            echo json_encode($response);
            return;
            break;
        }        

        break;       

    default:

        echo 'Ação não encontrada';
        break;	
}
	