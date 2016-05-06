<?php
class Login
{
	private $user;
	private $password;

	public function getUser()
	{
		return $this->user;
	}
	public function setUser($user)
	{
		$this->user = $user;
	}

	public function getPassword()
	{
		return md5($this->password . 'keyword');
	}
	public function setPassword($password)
	{
		return $this->password = $password;
	}

	public function executeLogin()
	{
		try
		{
			/**
			* Verifica se usuario e senha existem no Banco de Dados
			*/
			$sql = "
				SELECT
					*
				FROM
					Usuario
				WHERE
					Login = " . Contexto::transformToSql($this->getUser()) . " AND Senha = "  . Contexto::transformToSql($this->getPassword()) . " AND St = 1";
			
			$result = Contexto::query($sql);
			if(count($result) > 0)
			{
				$row = $result->fetch(PDO::FETCH_ASSOC);

				if(isset($row['Id']))
				{
					$_SESSION['Auth']['Id'] = $row['Id'];
					$_SESSION['Auth']['Nome'] = $row['Nome'];
					$_SESSION['Auth']['Sobrenome'] = $row['Sobrenome'];
					$_SESSION['Auth']['Email'] = $row['Email'];
					$_SESSION['Auth']['Login'] = $row['Login'];
					$_SESSION['Auth']['Digest'] = md5($_SERVER['REMOTE_ADDR']);

					return true;
				}
			}
			return false;
		}
		catch(Exception $e)
		{
			return false;
		}
	}

	public function executeLogout()
	{
		unset($_SESSION['Auth']);
	}
}