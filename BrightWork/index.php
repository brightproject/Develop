<?php
	 //Вывод всех ошибок
	error_reporting(E_ALL); 
	// defining constants
	define('DIR_WEB', dirname(__FILE__));
	define('DIR_ENGINE', DIR_WEB.'/engine');
	define('DIR_CORE', DIR_ENGINE.'/core');
	define('DIR_CONTR', DIR_ENGINE.'/controller');
	define('DIR_MODEL', DIR_ENGINE.'/model');
	define('DIR_VIEW', DIR_ENGINE.'/view');
	require_once 'application/bootstrap.php';