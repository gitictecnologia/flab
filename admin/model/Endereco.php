<?php

class Endereco implements IContexto
{
    public static $table = __CLASS__;    
    private $params;

    public function Empresa()
    {
        $this->params = array(
            'Id' => 0,            
            'EmpresaId' => 0,
            'EstadoId' => 0,
            'CEP' => NULL,
            'Logradouro' => NULL,
            'Numero' => 0,
            'Complemento' => NULL,
            'Bairro' => NULL,
            'Cidade' => NULL,            
            'DtCriacao' => NULL,
            'DtAlteracao' => NULL                
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
                    (EmpresaId, EstadoId, CEP, Logradouro, Numero, Complemento, Cidade, DtCriacao)
                VALUES (
                    " . parent::transformToSql($this->get('EmpresaId')) . ",
                    " . parent::transformToSql($this->get('EstadoId')) . ",
                    " . parent::transformToSql($this->get('CEP')) . ",
                    " . parent::transformToSql($this->get('Logradouro')) . ",
                    " . parent::transformToSql($this->get('Numero')) . ",
                    " . parent::transformToSql($this->get('Complemento')) . ",
                    " . parent::transformToSql($this->get('Cidade')) . ",
                    " . parent::now() . ")";

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
                    EstadoId = " . parent::transformToSql($this->get('EstadoId')) . ",
                    CEP = " . parent::transformToSql($this->get('CEP')) . ",
                    Logradouro = " . parent::transformToSql($this->get('Logradouro')) . ",
                    Numero = " . parent::transformToSql($this->get('Numero')) . ",
                    Complemento = " . parent::transformToSql($this->get('Complemento')) . ",
                    Cidade = " . parent::transformToSql($this->get('Cidade')) . ",                    
                    DtCriacao = " . parent::transformToSql($this->get('DtCriacao')) . ",
                    DtAlteracao =  " . parent::now() . "
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
}

