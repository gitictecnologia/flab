<?php

require('../util/util.php');
require('../util/auth.php');
require('../model/autoload.php');


switch ($_REQUEST['do'])
{
    case 'add':

        extract($_POST);


        /**
        *
        * Validação das informações
        */






        
        if(!semErros())
        {
            break;
        }
            
        

        if()
        Info('Tema adicionado com sucesso')
        Go('../?s=temas');
            } else {

                Erro('Erro durante o cadastro');
            }            
        
        
        Go();
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
	