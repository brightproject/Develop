<?php

ini_set('display_errors', 1);
// error_reporting(E_ALL | E_STRICT);
error_reporting(E_ALL);  
header('Content-Type: text/html; charset=utf-8');

echo '<h1>go\DB 2</h1>';
$params = array(
    'host'     => 'localhost',
    'username' => 'root',
    'password' => '',
    'dbname'   => 'test',
    'charset'  => 'utf8',
    '_debug'   => true,
    '_prefix'  => '',
);

$db = go\DB\DB::create($params, 'mysql');
require(__DIR__.'/goDB/autoload.php');
\go\DB\autoloadRegister();