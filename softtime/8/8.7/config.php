<?php
  // Сетевой адрес MySQL-сервера 
  $dblocation = "localhost";
  // Имя базы данных
  $dbname = "puzzles";
  // Пользователь
  $dbuser = "root";
  // Его пароль
  $dbpasswd = "";
  // Устанавливаем соединение с базой данных
  $dbcnx = mysql_connect($dblocation,$dbuser,$dbpasswd);
  if (!$dbcnx)
  {
    exit ("К сожалению, недоступен сервер MySQL : ".mysql_error());
  }
  // Выбираем базу данных
  if (!@mysql_select_db($dbname,$dbcnx))
  {
    exit("К сожалению, недоступна база данных : ".mysql_error());
  }

  // Устанавливаем кодировку соединения
  @mysql_query("SET NAMES cp1251");
?>
