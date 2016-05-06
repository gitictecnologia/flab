<?php

function __autoload($classname)
{
	$_BASEPATH = $_SERVER['DOCUMENT_ROOT'];
	$_PATH = $_BASEPATH . PATHA . 'model/';

    include_once($_PATH . $classname . '.php');
}


/*
$_objects = glob($_PATH . '*.php');
foreach($_objects as $_obj)
{
	require_once $_obj;
}
*/