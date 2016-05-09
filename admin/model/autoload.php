<?php

function __autoload($classname)
{
	$_BASEPATH = $_SERVER['DOCUMENT_ROOT'];
	$_PATH = $_BASEPATH . PATHA . 'model/';

    include_once($_PATH . $classname . '.php');
}