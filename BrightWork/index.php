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
	require_once DIR_ENGINE.'/bootstrap.php';
	// echo DIR_WEB.'</br>';
	// echo DIR_ENGINE.'</br>';
	// echo DIR_CORE.'</br>';
	// echo DIR_CONTR.'</br>';
	// echo DIR_MODEL.'</br>';
	// echo DIR_VIEW.'</br>';