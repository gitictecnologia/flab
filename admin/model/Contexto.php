<?php
class Contexto
{
    /**
    *
    * Contém as principais funções para manipular os dados de forma segura
    *
    */    

    private function _construct() {}


    public static function query($sql)
    {
        /**
        *
        * Encapsulamento da consulta ao Banco de Dados
        *
        */
        try
        {
            return Connection::getInstance()->query($sql);
        }
        catch(Exception $e)
        {
            /**
            * TODO: Logar erro
            */
            return NULL;
        }        
    }

    public static function getLastId()
    {
        /**
        *
        * Obtem o ultimo ID inserido no Banco de Dados
        *
        */
        return Connection::getInstance()->lastInsertId();
    }

    public static function transformToSql($str = '')
    {
        /**
        *
        * Limpa a variavel e transforma para valor SQL válido.
        *
        */

        $str = addcslashes($str, '\'');
         
        if(is_numeric($str))
        {
            return "'" . $str . "'";
        }
        else if(!empty($str))
        {
            $str = trim($str, " ");

            if(is_numeric($str))
            {
                return "'" . $str . "'";
            }
            else if(is_string($str) && !empty($str))
            {
                return "'" . $str . "'";
            }
        }
        return "NULL";
    }

    public static function noSqlInjection($source)
    {
        /**
        *
        * Evita usuários mau intencionados fazerem gracinhas
        *
        */
        $sanitizeRules = array(' OR ', ' FROM ', 'SELECT ', 'INSERT ', 'DELETE ', 'WHERE ', 'DROP TABLE', 'SHOW TABLES','=');
        $_source = str_ireplace($sanitizeRules, "", $source);

        return $_source;
    }

    public static function now()
    {
        return "NOW()";
    }
}

