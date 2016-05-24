<?php

class Endereco extends Contexto implements IContexto
{
    public static $table = __CLASS__;    
    private $params;

    public function __construct()
    {
        $this->params = array(
            'Id' => 0,            
            'EmpresaId' => 0,
            'EstadoId' => 0,
            'CEP' => NULL,
            'Logradouro' => NULL,
            'Numero' => NULL,
            'Complemento' => NULL,
            'Bairro' => NULL,
            'Cidade' => NULL,            
            'DtCriacao' => NULL,
            'DtAlteracao' => NULL,
            'St' => 0,
            /**
            * Relationship
            */
            'Estado' => NULL
        );
    }

    public function __set($key, $value) {
        if(array_key_exists($key, $this->params)) {                
            $this->params[$key] = $value;
        } else {
            throw new Exception("Parameter '" . $key . "' not found", 1);
        }
    }
    
    public function __get($key) {
        if(array_key_exists($key, $this->params)) {
            if($key == 'Estado') {
                $this->Estado = Estado::getById($this->EstadoId);
            }
            return $this->params[$key];
        } else {
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
                    (EmpresaId, EstadoId, CEP, Logradouro, Numero, Cidade, DtCriacao)
                VALUES (
                    " . parent::transformToSql($this->EmpresaId) . ",
                    " . parent::transformToSql($this->EstadoId) . ",
                    " . parent::transformToSql($this->CEP) . ",
                    " . parent::transformToSql($this->Logradouro) . ",
                    " . parent::transformToSql($this->Numero) . ",                    
                    " . parent::transformToSql($this->Cidade) . ",
                    " . parent::now() . ")";

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
                    EstadoId = " . parent::transformToSql($this->EstadoId) . ",
                    CEP = " . parent::transformToSql($this->CEP) . ",
                    Logradouro = " . parent::transformToSql($this->Logradouro) . ",
                    Numero = " . parent::transformToSql($this->Numero) . ",
                    Complemento = " . parent::transformToSql($this->Complemento) . ",
                    Cidade = " . parent::transformToSql($this->Cidade) . ",                    
                    DtCriacao = " . parent::transformToSql($this->DtCriacao) . ",
                    DtAlteracao =  " . parent::now() . "
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

                    $objeto = new Endereco();
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

                    $objeto = new Endereco();
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

                    $objeto = new Endereco();
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

