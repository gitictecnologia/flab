<?php

class Socio implements IContexto
{
    public static $table = __CLASS__;    
    private $params;

    public function Socio()
    {
        $this->params = array(
            'Id' => 0,            
            'EmpresaId' => 0,
            'Nome' => NULL,
            'Sobrenome' => NULL,
            'Descricao' => NULL,
            'Telefone' => NULL,
            'Celular' => NULL,
            'Email' => NULL,
            'Cargo' => NULL,
            'Curriculo' => NULL,            
            'Autorizacao' => NULL,
            'Tipo' => 0,
            'St' => 0
        );
    }   

    

    public function set($param, $value)
    {
        $this->params[$param] = $value;
    }
    
    public function get($param)
    {
        return $this->params[$param];
    }


    private function buildInfo($params)
    {
        foreach($params as $key => $value)
        {
            $this->set($key, $value);
        }        
    }   


    public function insert()
    {
        try
        {
            $sql = "
                INSERT INTO " . self::$table . "
                    (EmpresaId, Nome, Sobrenome, Descricao, Telefone, Celular, Email, Cargo, Curriculo, Autorizacao, Tipo, St)
                VALUES (
                    " . parent::transformToSql($this->get('EmpresaId')) . ",
                    " . parent::transformToSql($this->get('Nome')) . ",
                    " . parent::transformToSql($this->get('Sobrenome')) . ",
                    " . parent::transformToSql($this->get('Descricao')) . ",
                    " . parent::transformToSql($this->get('Telefone')) . ",
                    " . parent::transformToSql($this->get('Celular')) . ",
                    " . parent::transformToSql($this->get('Email')) . ",
                    " . parent::transformToSql($this->get('Cargo')) . ",
                    " . parent::transformToSql($this->get('Curriculo')) . ",
                    " . parent::transformToSql($this->get('Autorizacao')) . ",
                    " . parent::transformToSql($this->get('Tipo')) . ",                 
                    " . parent::transformToSql($this->get('St')) . ")";

            $result = parent::query($sql);
            if($result)
            {
                /**
                *
                * Set Id
                *
                */
                $this->set('Id', parent::getLastId());

                Logger::Info(__METHOD__ . ' { ' . $sql . ' }');
                return true;
            }
            return false;
        }
        catch (Exception $e)
        {        
            //Logger::Erro(__METHOD__ . ' { ' . $e->getMessage() . ' }');
            return false;
        }
    }

    public function update()
    {        
        try
        {
            $sql = "
                UPDATE
                    " . self::$table . "
                SET 
                    EmpresaId = " . parent::transformToSql($this->get('EmpresaId')) . ",
                    Nome = " . parent::transformToSql($this->get('Nome')) . ",
                    Sobrenome = " . parent::transformToSql($this->get('Sobrenome')) . ",
                    Descricao = " . parent::transformToSql($this->get('Descricao')) . ",
                    Telefone = " . parent::transformToSql($this->get('Telefone')) . ",
                    Celular = " . parent::transformToSql($this->get('Celular')) . ",
                    Email = " . parent::transformToSql($this->get('Email')) . ",                    
                    Cargo = " . parent::transformToSql($this->get('Cargo')) . ",
                    Curriculo = " . parent::transformToSql($this->get('Curriculo')) . ",
                    Autorizacao = " . parent::transformToSql($this->get('Autorizacao')) . ",
                    Tipo = " . parent::transformToSql($this->get('Tipo')) . ",
                    St = " . parent::transformToSql($this->get('St')) . "                 
                WHERE
                    Id = " . parent::transformToSql($this->get('Id'));

            if(parent::query($sql))
            {
                //Logger::Info(__METHOD__ . ' { ' . $sql . ' }');
                return true;
            }            
            return false;
        } 
        catch (Exception $e)
        {        
            //Logger::Erro(__METHOD__ . ' { ' . $e->getMessage() . ' }');
            return false;
        }        
    }

    public function delete()
    {
        try
        {
            $sql = "
                DELETE FROM " . self::$table . " WHERE Id = " . $this->get('Id');

            $result = parent::query($sql);          
            if($result)
            {
                //Logger::Info(__METHOD__ . ' { ' . $sql . ' }');
                return true;
            }
            else
            {
                return false;
            }
        }
        catch (Exception $e)
        {        
            //Logger::Erro(__METHOD__ . ' { '.$e->getMessage() . ' }');
            return false;
        }
    }

    public static function getById($id = 0)
    {
        try
        {
            if($id > 0)
            {
                $sql = "
                    SELECT * FROM " . self::$table . " WHERE Id = " . parent::transformToSql($id);
                
                $result = parent::query($sql);
                if(count($result) > 0)
                {
                    /**
                    * Retorna um Array
                    */
                    $row = $result->fetch(PDO::FETCH_ASSOC);

                    if(!isset($row['Id']))
                    {
                        return NULL;
                    }

                    $objeto = new Socio();
                    $objeto->buildInfo($row);
                    
                    return $objeto;
                }
            }
            return NULL;
        }
        catch(Exception $e)
        {
            //Logger::Erro(__METHOD__ . ' { '.$e->getMessage() . ' }');            
            return NULL;
        }
    }    


    public static function getAll($st = -1)
    {        
        try
        {            
            $objetos = array();

            if($st == -1)
            {
                $q = "
                    SELECT * FROM " . self::$table;
            }
            else
            {
                $q = "
                    SELECT * FROM " . self::$table . " WHERE St = " . parent::transformToSql($st);                    
            }       
            
            $result = parent::query($q);
            if(count($result) > 0)
            {                
                while($row = $result->fetch(PDO::FETCH_ASSOC))
                {
                    if(!isset($row['Id']))
                    {
                        break;
                    }

                    $objeto = new Socio();
                    $objeto->buildInfo($row);

                    $objetos[] = $objeto;
                }
            }
            return $objetos;
        }
        catch(Exception $e)
        {
            //Logger::Erro(__METHOD__ . ' { '.$e->getMessage() . ' }');            
            return array();
        }    
    }
}

