<?php

class Estado extends Contexto implements IContexto
{   
    public static $table = __CLASS__;
    private $params;

    public function Estado()
    {
        $this->params = array(
            'Id' => 0,            
            'Nome' => NULL,
            'UF' => NULL,            
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
                    (Nome, UF, St)
                VALUES (                    
                    " . parent::transformToSql($this->Nome) . ",
                    " . parent::transformToSql($this->UF) . ",                    
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
                    Nome = " . parent::transformToSql($this->Nome) . ",
                    UF = " . parent::transformToSql($this->UF) . ",                    
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

                    $objeto = new Estado();
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
                        return NULL;
                    }

                    $objeto = new Estado();
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

