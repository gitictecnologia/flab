<?php
class Log extends Contexto implements iContexto
{
	private $id;
	private $userId;	
	private $type;	
	private $message;
	private $create;

	/**
	* @var Itens por pagina
	*/
	private $_mostrar = 25;


    public function setId($id)
    { 
    	$this->id = $id; 
    }
    public function getId()
    {
    	return $this->id; 
    }

    public function setUserId($userId)
    {
    	$this->userId = $userId; 
    }
    public function getUserId()
    {
    	return $this->userId; 
    }

	public function setType($type)
	{
		$this->type = $type; 
	}
	public function getType($str = false)
	{
		if($str)
		{
			return $this->type == 0 ? 'ERRO':'INFO';
		}
		else
		{
			return $this->type;
		}		
	}
	
	public function setMessage($message)
	{
		$this->message = $message; 
	}
	public function getMessage()
	{
		return $this->message; 
	}

	public function setCreate($create)
	{
		$this->create = $create; 
	}
	public function getCreate()
	{
		return $this->create; 
	}

	public function buildInfo($obj)
	{
		$this->setId($obj->Id);				
		$this->setUserId($obj->UserId);		
		$this->setType($obj->Type);
		$this->setMessage($obj->Message);
		$this->setCreate($obj->Create);		
	}
    
    public function update()
    {
        return false;        
    }
    
    public function delete()
    {
        return false;        
    }
	
	public function insert()
	{
		try
		{
            $sql = "
            	INSERT INTO Log
            		(UserId, Type, Message)
    			VALUES (
            		".parent::transformToSql($this->getUserId()).",            		
            		".parent::transformToSql($this->getType()).",
            		".parent::transformToSql(addslashes($this->getMessage())).")";			

            
            $result = parent::query($sql);
            if($result)            
            {            	
                return true;
            }
            else
            {
            	return false;
            }
        }
        catch (Exception $e)
        {        
            return false;
		}		
	}
	
	public static function getById($id = 0)
	{
		try
		{
            $sql = "
            	SELECT * FROM Log WHERE Id = ".Contexto::clearField($id);

            $result = parent::query($sql);
            if($result)
            {
            	$row = $result->fetch(PDO::FETCH_OBJ);

            	if(!isset($row->Id))
            	{
            		return NULL;
            	}

            	$log = new Log();
            	$log->buildInfo($row);	        	
				
				return $log;
            }
            return NULL;
        }
        catch (Exception $e)
        {
			return NULL;
		}		
	}
	
	public static function getAll($st = -1)
	{		
		try
		{
			$sql = "SELECT * FROM Log"; 

			$result = parent::query($sql);
			if(count($result) > 0)
			{
				$logs = array();
				while($row = $result->fetchObject())
				{
					if(!isset($row->Id))
					{
						return NULL;
					}
					
					$log = new Log();
		        	$log->buildInfo($row);

					$logs[] = $log;
				}
				return $logs;
			}	
			return NULL;
		}
		catch (Exception $e)
		{
			return NULL;
		}
	}

	/**
	* @return int Retorna a quantidade de logs existentes na Base
	*/
	public function getCount() 
	{
		try 
		{
			$count = 0;
			$sql = "SELECT COUNT(Id) AS Count FROM Log";

			$r = parent::query($sql);
			if($r) 
			{				
				$row = $r->fetchObject();
				if(isset($row->Count))
				{
					$count = $row->Count;
				}
			}			
			return $count;
		}
		catch (Exception $e)
		{
			return 0;
		}
	}

	public function getPageDefault() 
	{
		/**
		* Pagina padrão sempre será a ultima
		*/
		return $this->getPages();
	}

	/**
	* @return int Retorna a quantidade de paginas existen
	*/
	public function getPages() 
	{
		$count = $this->getCount();
		if($count > 0)
		{
			$paginas = ceil($count/$this->_mostrar);
		}
		else
		{
			$paginas = 1;
		}
		return $paginas;
	}

	public function pagination($pagina = 0)
	{
		try 
		{
			if(!($pagina > 0))
			{			
				$pagina = $this->getPageDefault();			
			}
			$_pagina = $pagina;

			
			$sql = "
                SELECT 
                    *
                FROM
                    Log
                ORDER BY 
                    Id DESC
                LIMIT 
                    " . (($_pagina - 1) * $this->_mostrar) . ", " . $this->_mostrar;

			$r = parent::query($sql);
			if($r) 
			{
				$logs = array();
				while($row = $r->fetchObject())
				{
					if(!isset($row->Id)) 
					{
            			break;
            		}

            		$log = new Log();
            		$log->buildInfo($row);

            		$logs[] = $log;
        		}
				return $logs;
            }
            return array();			
		}
		catch (Exception $e)
		{
			return array();
		}
	}

	public function buildLog($type = 0, $message = '') 
	{
		try 
		{
			$baseInfo = '[ ';
			$baseInfo .= '[ DATE:' . date("Y-m-d H:i:s") . ' ]';
			$baseInfo .= '[ IP: ' . (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR']:'N/D')  . ' ]';
			$baseInfo .= '[ REFERENCE: ' . (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER']:'N/D') . ' ]';
			$baseInfo .= '[ URI: ' . (isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI']:'N/D') . ' ]';
			$baseInfo .= '[ USER_AGENT: ' . (isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT']:'N/D') . ' ]';
			$baseInfo .= '[ MESSAGE: ' . $message . ' ]';
			$baseInfo .= ' ]';

			$this->setUserId($this->getActiveUser());
			$this->setType($type);
			$this->setMessage($baseInfo);

			if(!$this->insert())
			{
				// TODO: Talvez logar em um arquivo txt
			}
		}
		catch (Exception $e)
		{
			// TODO: Talvez logar em um arquivo txt
		}
	}

	private function getActiveUser()
	{
		return (isset($_SESSION['Auth']['ID']) ? $_SESSION['Auth']['ID']:0);
	}
}