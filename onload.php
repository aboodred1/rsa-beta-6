<?php
	ob_start();
	session_start();
	//error_reporting(E_ALL);
	//ini_set('display_errors', '1');
	
	/*****************************************/
	$path_site = $_SERVER['DOCUMENT_ROOT']."/rsabeta6/";
	
	require_once($path_site."config.php");
	
	/*****************************************/
	
	require_once($rsa['config']['root_classes']."datalayer.class.php");
	require_once($rsa['config']['root_classes']."phpmailer.class.php");
	require_once($rsa['config']['root_classes']."rsa.contacts.class.php");
	require_once($rsa['config']['root_classes']."rsa.galleries.class.php");
	require_once($rsa['config']['root_classes']."rsa.menus.class.php");
	require_once($rsa['config']['root_classes']."rsa.pages.class.php");
	require_once($rsa['config']['root_classes']."rsa.points.class.php");
	require_once($rsa['config']['root_classes']."rsa.teams.class.php");
	require_once($rsa['config']['root_classes']."rsa.photos.class.php");
	
	/*****************************************/
	
	$conn = new DBConnection();
	
	$mysql_hostname = DBVariables::$mysql_hostname;
	$mysql_username = DBVariables::$mysql_username;
	$mysql_password = DBVariables::$mysql_password;
	$mysql_database = DBVariables::$mysql_database;

	$conn->connect($mysql_hostname,$mysql_username,$mysql_password,$mysql_database);
	$conn->debug = true;
	
	/*****************************************/
	
	require_once($rsa['config']['root_functions']."rsa.contacts.fun.php");
	require_once($rsa['config']['root_functions']."rsa.galleries.fun.php");
	require_once($rsa['config']['root_functions']."rsa.menus.fun.php");
	require_once($rsa['config']['root_functions']."rsa.pages.fun.php");
	require_once($rsa['config']['root_functions']."rsa.points.fun.php");
	require_once($rsa['config']['root_functions']."rsa.teams.fun.php");
	require_once($rsa['config']['root_functions']."rsa.photos.fun.php");
	
	/*****************************************/
	
	$rsa['metatags']['title'] = "RSA property investments";
?>