<?php
interface IContexto
{
	/**
	*
	* Interface de contexto com Banco de Dados
	*
	*/

    public function insert();
    public function update();
    public function delete();
    public static function getAll($st = -1);
    public static function getById($id = 0);
}

