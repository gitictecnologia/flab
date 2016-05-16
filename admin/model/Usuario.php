<?php

class Usuario implements IContexto
{	
    public static $table = __CLASS__;
    private $params;

    public function Usuario()
    {
        $this->params = array(
            'Id' => 0,
            'GrupoId' => 0,
            'Nome' => NULL,
            'Sobrenome' => NULL,
            'Email' => NULL,
            'Login' => NULL,
            'Senha' => NULL,
            'DtCriacao' => NULL,
            'DtAlteracao' => NULL,
            'St' => 0,
        );
    }	

    
    public function __set($key, $value)
    {
        if(array_key_exists($key, $this->params))
        {
            $this->params[$key] = $value;
        }
        else
        {
            throw new Exception("Parameter '" . $key . "' not found", 1);
        }
    }
    
    public function __get($key)
    {
        if(array_key_exists($key, $this->params))
        {
            return $this->params[$key];
        }
        else
        {
            throw new Exception("Parameter '" . $key . "' not found", 1);
        }
    }


    private function buildInfo($params)
    {
        foreach($params as $key => $value)
        {
            $this->{$key} = $value;
        }
    }  


    public function insert()
    {
        try
        {
            $sql = "
                INSERT INTO " . self::$table . "
                    (GrupoId, Nome, Sobrenome, Email, Login, Senha, DtCriacao, St)
                VALUES (
                    " . parent::transformToSql($this->GrupoId) . ",
                    " . parent::transformToSql($this->Nome) . ",
                    " . parent::transformToSql($this->Sobrenome) . ",
                    " . parent::transformToSql($this->Email) . ",
                    " . parent::transformToSql($this->Login) . ",
                    " . parent::transformToSql($this->Senha) . ",
                    " . parent::now() . ",                    
                    " . parent::transformToSql($this->St) . ")";                    

            $result = parent::query($sql);
            if($result)
            {
                /**
                *
                * Set Id
                *
                */
                $this->Id = parent::getLastId();

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

    public function update()
    {        
        try
        {
            $sql = "
                UPDATE
                    " . self::$table . "
                SET 
                    GrupoId = " . parent::transformToSql($this->GrupoId) . ",
                    Nome = " . parent::transformToSql($this->Nome) . ",
                    Sobrenome = " . parent::transformToSql($this->Sobrenome) . ",
                    Email = " . parent::transformToSql($this->Email) . ",
                    Login = " . parent::transformToSql($this->Login) . ",
                    Senha = " . parent::transformToSql($this->Senha) . ",
                    DtCriacao = " . parent::transformToSql($this->DtCriacao) . ",
                    DtAlteracao = " . parent::now() . ",
                    St = " . parent::transformToSql($this->St) . "
                WHERE
                    Id = " . parent::transformToSql($this->Id);

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
                DELETE FROM " . self::$table . " WHERE Id = " . $this->Id;

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

                    $objeto = new Usuario();
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

                    $objeto = new Usuario();
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

