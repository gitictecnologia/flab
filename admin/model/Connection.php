<?php
/**
*
* Instancia de conexão com o Banco de Dados (Singleton)
*
*/
class Connection
{   
    private static $instance;

    private function __construct() {}

    private function __clone() {}

    private function __wakeup() {}

    public static function getInstance()
    {
        try
        {
            if(self::$instance == NULL) 
            {
                $environments = array(
                    'localhost'                 => array('string' => 'mysql:host=127.0.0.1; dbname=flab_hml', 'user' => 'root', 'pwd' => ''),
                    'localhost:8080'            => array('string' => 'mysql:host=127.0.0.1; dbname=flab_hml', 'user' => 'root', 'pwd' => ''),
                    '192.168.0.29:8080'         => array('string' => 'mysql:host=127.0.0.1; dbname=flab_hml', 'user' => 'root', 'pwd' => ''),                    
                    /**
                    *
                    *
                    * Ambiente de HML Media Interacive
                    */
                    'website.flabsolutions.mediainteractive.com.br' => array('string' => 'mysql:host=192.168.50.5; dbname=flab_solutions_hml', 'user' => 'root', 'pwd' => 'MD#mysqlserver'),
                    /**
                    *
                    *
                    * Producao
                    */
                    'www.flab.solutions'        => array('string' => 'mysql:host=flab_solutions.mysql.dbaas.com.br; dbname=flab_solutions', 'user' => 'flab_solutions', 'pwd' => 'fischer@321F'),
                    'flab.solutions'            => array('string' => 'mysql:host=flab_solutions.mysql.dbaas.com.br; dbname=flab_solutions', 'user' => 'flab_solutions', 'pwd' => 'fischer@321F')
                );
               
                if(array_key_exists($_SERVER['HTTP_HOST'], $environments)) 
                {
                    self::$instance = new PDO($environments[$_SERVER['HTTP_HOST']]['string'], $environments[$_SERVER['HTTP_HOST']]['user'], $environments[$_SERVER['HTTP_HOST']]['pwd']);
                    if(self::$instance == NULL)
                    {
                        throw new Exception("Banco de Dados não encontrado", 1);
                    }
                    /**
                    * Econding to UTF-8
                    */
                    self::$instance->exec('set names utf8');
                } 
                else 
                {
                    throw new Exception("Host não tem permissão para acessar o Banco de Dados", 1);
                }                            
            }
            return self::$instance;
        }
        catch (Exception $e)
        {
            echo $e;
            return NULL;         
        }       
    }
}

