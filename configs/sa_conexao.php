<?php

error_reporting(0);
error_reporting(E_ALL);


if($_SERVER['HTTP_HOST'] == 'cservices.com.br') {

	// BASE DE PRODUCAO

	@$_link = mysql_connect("HOST","USER","PASSWORD");
	$db = mysql_select_db("SCHEMA",$_link);
	
} else if($_SERVER['HTTP_HOST'] == 'localhost:8080' || $_SERVER['HTTP_HOST'] == 'localhost'){

	// BASE LOCAL


	
	@$_link = mysql_connect("192.168.50.5","root","MD#mysqlserver");
	$db = mysql_select_db("cservices_dev",$_link);
	

	/*
	@$_link = mysql_connect("179.188.16.47","cosinconsulting5","Ivan123");
	$db = mysql_select_db("cosinconsulting5",$_link);
	*/

} else if($_SERVER['HTTP_HOST'] == 'website.cservices.midiadesigners.local') {

	// BASE DE DESENVOLVIMENTO

	@$_link = mysql_connect("192.168.50.5","root","MD#mysqlserver");
	$db = mysql_select_db("cservices_dev",$_link);

} else if($_SERVER['HTTP_HOST'] == 'website.cservices.mediainteractive.com.br') {

	// BASE DE HOMOLOGACAO

	@$_link = mysql_connect("192.168.50.5","root","MD#mysqlserver");
	$db = mysql_select_db("cservices_hml",$_link);

} else {

	// BASE DEFAULT

	@$_link = mysql_connect("192.168.50.5","root","MD#mysqlserver");
	$db = mysql_select_db("cservices_dev",$_link);
}


@mysql_query("SET NAMES utf8");
@mysql_query("SET CHARACTER_SET utf8");