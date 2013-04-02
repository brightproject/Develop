<?php

ini_set('display_errors', 1);
// error_reporting(E_ALL | E_STRICT);
error_reporting(E_ALL);  
header('Content-Type: text/html; charset=utf-8');

require(__DIR__.'/goDB/autoload.php');
\go\DB\autoloadRegister();

echo '<h1>go\DB 2</h1>';

$params = array(
    'host'     => 'localhost',
    'username' => 'root',
    'password' => '',
    'dbname'   => 'test',
    'charset'  => 'utf8',
    '_debug'   => true,
    '_prefix'  => '',
    // '_adapter'  => 'mysql',
);
$db = go\DB\DB::create($params, 'mysql');
$login    = 'vasa';
$password = 'qwerty';
//вариант выбора из таблицы
$email = $db->query('SELECT `email` FROM `users` WHERE `login`=? AND `password`=?', array($login, $password), 'el');
echo $email;
//вариант выбора из таблицы
$pattern = 'SELECT `email` FROM `users` WHERE `login`=? AND `password`=md5(?)';
$data    = array($_POST['login'], $_POST['password']);
$userId  = $db->query($pattern, $data, 'el');
if (!$userId) {
    echo 'User not found';
}

?>