<?php
class Logger
{
	/**
	*
	* Handler de Log do Sistema
	*
	*/
	
	private function __construct() {}
	private function __clone() {}
	private function __wakeup() {}
	
	public static function Erro($message) {
		$erro = new Log();
		$erro->buildLog(0, $message);
	}

	public static function Info($message) {
		$info = new Log();			
		$info->buildLog(1, $message);
	}	
}