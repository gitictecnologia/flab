<?php

require('../util/util.php');
require('../util/auth.php');
require('../model/autoload.php');




$do = $_REQUEST['do'];

switch ($do) {

	case 'add':
		
		ValidaVazio($nome,'Campo nome inválido');
		ValidaVazio($login,'Campo login inválido');
		ValidaSenha($senha,$conf);
		

		if (semErros()) {
			$senha = md5($senha.'System');
			if (mysql_query("INSERT INTO Usuarios (login, senha, nome) VALUES ('$login', '$senha', '$nome')")) {
				Info('Usuário cadastrado com sucesso');
				Go('../?s=usuarios');
			} else Erro("Erro durante cadastro do usuário");
		}
		Go();
	break;

	case 'edit':

		ValidaID($id,'Id','Usuarios');
		ValidaVazio($nome,'Campo nome inválido');

		if (!empty($senha)) {
			
			ValidaSenha($senha,$conf);

			if(semErros()) {

				$senha = md5($senha.'System');
								
				$user = Usuario::getById($id);
				$user->setNome($nome);
				$user->setSobrenome($sobrenome);
				$user->setEmail($email);
				$user->setLogin($login);
				$user->setSenha($senha);
				$user->setSt(1);

				if(Contexto::update($user)) {

					Info('Usuário alterado com sucesso');
					Go('../?s=usuarios');
				} else {

					Erro('Erro durante a consulta');
				}
			}

		} else {

			if(semErros()) {				

				$user = Usuario::getById($id);
				$user->setNome($nome);
				$user->setSobrenome($sobrenome);
				$user->setEmail($email);
				$user->setLogin($login);				
				$user->setSt(1);
				if(Contexto::update($user)) {

					Info('Usuário alterado com sucesso');
					Go('../?s=usuarios');
				} else {

					Erro('Erro durante a consulta');
				}
			}			
		}
		
		Go();
	break;

	case 'exclui':
		$id = (int)$_GET['id'];
		if (mysql_query("DELETE FROM usuarios WHERE id = '$id'")) {
			Info ("Usuário removido com sucesso");
		} else Erro("Erro durante a consulta");
		Go();
	break;
	
}
?>