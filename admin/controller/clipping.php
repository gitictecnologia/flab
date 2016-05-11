<?php

require('../util/util.php');
require('../util/auth.php');
require('../util/pathImages.php');
require('../model/autoload.php');


switch ($_REQUEST['do'])
{
    case 'add':

        /**
        * Extrai variaveis do post
        */
        extract($_POST);
        $_SESSION['clipping'] = $_POST;


        /**
        *
        * Validação das informações
        */

        if(empty($titulo))
        {
            Erro('Campo "Titulo" inválido');
        }        

        if(empty($subtitulo))
        {
            Erro('Campo "Subtitulo" inválido');            
        }
        
        if(empty($texto))
        {
            Erro('Campo "Texto" inválido');
        }

        if(empty($dtNoticia))
        {
            Erro('Campo "Data da Notícia" inválido');
        }
        else
        {
            $dtNoticia = implode('-', array_reverse(explode('/', $dtNoticia)));
        }


        /**
        * Imagem
        */
        $_imagem = NULL;
        if(isset($_FILES['thumb']) && !empty($_FILES['thumb']['name']))
        {
            /**
            *
            * Renomeia a imagem
            */
            $_imagem = time() . '.' . array_pop(explode('.', $_FILES['thumb']['name']));            

            if(!copy($_FILES['thumb']['tmp_name'], $pathImage['clipping']['abs'] . $_imagem))
            {
                Erro('Campo "Imagem" falha ao copiar o arquivo');
            }
        }


        /**
        * Tem erros ?
        */
        if(!semErros())
        {
            Go();
            break;
        }
        
        
        /**
        *
        * Persistencia
        */

        $clipping = new Clipping();
        $clipping->Titulo = $titulo;
        $clipping->Subtitulo = $subtitulo;
        $clipping->Texto = $texto;
        $clipping->Fonte = $fonte;        
        $clipping->Url = $friendlyUrl;
        $clipping->Thumb = $_imagem;
        $clipping->Destaque = $destaque;
        $clipping->DtNoticia = $dtNoticia;
        $clipping->St = $status;

        if($clipping->insert())
        {
            unset($_SESSION['clipping']);

            /**
            *
            * Atualiza as posições dos registros, já que foi inserido com sucesso
            * 
            */
            $clippings = Clipping::getAll(1);
            foreach($clippings as $c)
            {
                $c->Posicao++;
                $c->update(); 
            }


            $clipping->Posicao = 1;
            $clipping->update();


            Info('Operação realizado com sucesso');
            Go('../?s=clipping');
            break;
        }        

        Erro('Operação não pode ser concluída');
        Go();
        break;

    case 'edit':

        /**
        * Extrai variaveis do post
        */
        extract($_POST);


        $clipping = Clipping::getById($id);
        if(is_null($clipping))
        {
            Erro('Operação não pode ser concluída');
            Go();
            break;
        }


        /**
        *
        * Validação das informações
        */

        if(empty($titulo))
        {
            Erro('Campo "Titulo" inválido');
        }        

        if(empty($subtitulo))
        {
            Erro('Campo "Subtitulo" inválido');            
        }
        
        if(empty($texto))
        {
            Erro('Campo "Texto" inválido');
        }

        if(empty($dtNoticia))
        {
            Erro('Campo "Data da Notícia" inválido');
        }
        else
        {
            $dtNoticia = implode('-', array_reverse(explode('/', $dtNoticia)));
        }


        /**
        * Imagem
        */
        $_imagem = NULL;
        if(isset($_FILES['thumb']) && !empty($_FILES['thumb']['name']))
        {
            /**
            *
            * Renomeia a imagem
            */
            $_imagem = time() . '.' . array_pop(explode('.', $_FILES['thumb']['name']));            

            if(!copy($_FILES['thumb']['tmp_name'], $pathImage['clipping']['abs'] . $_imagem))
            {
                Erro('Campo "Imagem" falha ao copiar o arquivo');
            }            
        }
        else
        {
            $_imagem = $clipping->Thumb;
        }


        /**
        * Tem erros ?
        */
        if(!semErros())
        {
            Go();
            break;
        }
        
        
        /**
        *
        * Update
        */
        
        $clipping->Titulo = $titulo;
        $clipping->Subtitulo = $subtitulo;
        $clipping->Texto = $texto;
        $clipping->Fonte = $fonte;        
        $clipping->Url = $friendlyUrl;
        $clipping->Thumb = $_imagem;
        $clipping->Destaque = $destaque;
        $clipping->DtNoticia = $dtNoticia;
        $clipping->St = $status;

        if($clipping->update())
        {
            Info('Operação realizado com sucesso');
            Go('../?s=clipping-edit&id=' . $id);
            break;
        }        

        Erro('Operação não pode ser concluída');
        Go();
        break;

    case 'get':

        /**
        * ID do Clipping
        */
        $id = isset($_GET['id']) ? $_GET['id'] : 0;

        $response = array(
            'status' => true,
            'message' => '',
            'clipping' => NULL
        );

        if($id > 0)
        {
            $clipping = Clipping::getById($id);

            if(!is_null($clipping))
            {
                $_clipping = array(
                    'img' => $clipping->Thumb,
                    'titulo' => $clipping->Titulo,
                    'subtitulo' => $clipping->Subtitulo,
                    'texto' => $clipping->Texto,
                    'dtNoticia' => date('d/m/Y', strtotime($clipping->DtNoticia)),
                    'fonte' => (is_null($clipping->Fonte) ? 'N/D' : $clipping->Fonte),
                );
                $response['clipping'] = $_clipping;
            }
            else
            {
                $response['status'] = false;
                $response['message'] = 'Falha na operação';
            }            
        }
        else
        {
            $response['status'] = false;
            $response['message'] = 'Falha na operação';
        }



        header('Content-Type: application/json');        
        echo json_encode($response);
        break;

    default:

        echo 'Ação não encontrada';
        break;	
}
	