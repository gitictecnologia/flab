<?php

class Empresa extends Contexto implements IContexto
{
    public static $table = __CLASS__;    
    private $params;    

    public function __construct() {
        $this->params = array(
            'Id' => 0,            
            'Nome' => NULL,
            'Descricao' => NULL,
            'CNPJ' => NULL,
            'Email' => NULL,
            'Telefone' => NULL,
            'Site' => NULL,
            'Faturamento' => NULL,
            'Apresentacao' => NULL,
            'DtFundacao' => NULL,
            'DtCriacao' => NULL,
            'DtAlteracao' => NULL,
            'St' => 0,
            /**
            * Relationships
            */
            'Endereco' => NULL,
            'Socios' => NULL,
            'Projetos' => NULL,
            'Respostas' => NULL, 
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
            if($key == 'Endereco') {
                if($this->params['Endereco'] == NULL) {
                    $this->params['Endereco'] = Endereco::getByEmpresaId($this->Id);
                }
            } else if($key == 'Socios') {
                if($this->params['Socios'] == NULL) {
                    $this->params['Socios'] = Socio::getByEmpresaId($this->Id);
                }                
            } else if($key == 'Projetos') {
                if($this->params['Projetos'] == NULL) {
                    $this->params['Projetos'] = Projeto::getByEmpresaId($this->Id);
                }
            } else if($key == 'Respostas') {                
                if($this->params['Respostas'] == NULL) {
                    $this->params['Respostas'] = Resposta::getByEmpresaId($this->Id);
                }
            }            
            return $this->params[$key];
        } else {
            throw new Exception("Parameter '" . $key . "' not found");
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
                    (Nome, Descricao, CNPJ, Email, Telefone, Site, Faturamento, Apresentacao, DtFundacao, DtCriacao, St)
                VALUES (
                    " . parent::transformToSql($this->Nome) . ",
                    " . parent::transformToSql($this->Descricao) . ",
                    " . parent::transformToSql($this->CNPJ) . ",
                    " . parent::transformToSql($this->Email) . ",
                    " . parent::transformToSql($this->Telefone) . ",
                    " . parent::transformToSql($this->Site) . ",
                    " . parent::transformToSql($this->Faturamento) . ",
                    " . parent::transformToSql($this->Apresentacao) . ",
                    " . parent::transformToSql($this->DtFundacao) . ",
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
                    Nome = " . parent::transformToSql($this->Nome) . ",
                    Descricao = " . parent::transformToSql($this->Descricao) . ",
                    CNPJ = " . parent::transformToSql($this->CNPJ) . ",
                    Email = " . parent::transformToSql($this->Email) . ",
                    Telefone = " . parent::transformToSql($this->Telefone) . ",
                    Site = " . parent::transformToSql($this->Site) . ",
                    Faturamento = " . parent::transformToSql($this->Faturamento) . ",
                    Apresentacao= " . parent::transformToSql($this->Apresentacao) . ",
                    DtFundacao = " . parent::transformToSql($this->DtFundacao) . ",
                    DtCriacao = " . parent::transformToSql($this->DtCriacao) . ",
                    DtAlteracao =  " . parent::now() . ",
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

                    $objeto = new Empresa();
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

                    $objeto = new Empresa();
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

