<?php

class Socio extends Contexto implements IContexto
{
    public static $table = __CLASS__;    
    private $params;

    public function __construct()
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
            'CurriculoLink' => NULL,
            'Autorizacao' => NULL,
            'Tipo' => 0,
            'St' => 0
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
                    (EmpresaId, Nome, Sobrenome, Telefone, Celular, Email, Cargo, Curriculo, CurriculoLink, Autorizacao, Tipo, St)
                VALUES (
                    " . parent::transformToSql($this->EmpresaId) . ",
                    " . parent::transformToSql($this->Nome) . ",
                    " . parent::transformToSql($this->Sobrenome) . ",                    
                    " . parent::transformToSql($this->Telefone) . ",
                    " . parent::transformToSql($this->Celular) . ",
                    " . parent::transformToSql($this->Email) . ",
                    " . parent::transformToSql($this->Cargo) . ",
                    " . parent::transformToSql($this->Curriculo) . ",
                    " . parent::transformToSql($this->CurriculoLink) . ",
                    " . parent::transformToSql($this->Autorizacao) . ",
                    " . parent::transformToSql($this->Tipo) . ",                 
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
                    EmpresaId = " . parent::transformToSql($this->EmpresaId) . ",
                    Nome = " . parent::transformToSql($this->Nome) . ",
                    Sobrenome = " . parent::transformToSql($this->Sobrenome) . ",
                    Descricao = " . parent::transformToSql($this->Descricao) . ",
                    Telefone = " . parent::transformToSql($this->Telefone) . ",
                    Celular = " . parent::transformToSql($this->Celular) . ",
                    Email = " . parent::transformToSql($this->Email) . ",                    
                    Cargo = " . parent::transformToSql($this->Cargo) . ",
                    Curriculo = " . parent::transformToSql($this->Curriculo) . ",
                    CurriculoLink = " . parent::transformToSql($this->CurriculoLink) . ",
                    Autorizacao = " . parent::transformToSql($this->Autorizacao) . ",
                    Tipo = " . parent::transformToSql($this->Tipo) . ",
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

    public static function getByEmpresaId($id)
    {        
        try
        {            
            $objetos = array();

            $q = "
                SELECT * FROM " . self::$table . " WHERE EmpresaId = " . $id;                   
            
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

