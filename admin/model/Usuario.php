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
                    (GrupoId, Nome, Sobrenome, Email, Login, Senha, DtCriacao, St)
                VALUES (
                    " . parent::transformToSql($this->get('GrupoId')) . ",
                    " . parent::transformToSql($this->get('Nome')) . ",
                    " . parent::transformToSql($this->get('Sobrenome')) . ",
                    " . parent::transformToSql($this->get('Email')) . ",
                    " . parent::transformToSql($this->get('Login')) . ",
                    " . parent::transformToSql($this->get('Senha')) . ",
                    " . parent::now() . ",                    
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
                    GrupoId = " . parent::transformToSql($this->get('GrupoId')) . ",
                    Nome = " . parent::transformToSql($this->get('Nome')) . ",
                    Sobrenome = " . parent::transformToSql($this->get('Sobrenome')) . ",
                    Email = " . parent::transformToSql($this->get('Email')) . ",
                    Login = " . parent::transformToSql($this->get('Login')) . ",
                    Senha = " . parent::transformToSql($this->get('Senha')) . ",
                    DtCriacao = " . parent::transformToSql($this->get('DtCriacao')) . ",
                    DtAlteracao = " . parent::now() . ",
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

