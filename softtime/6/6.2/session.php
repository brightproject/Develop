<?php
  // Открываем сессию 
  function open($save_path, $session_name) 
  {

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
      exit ("К сожалению, недоступен сервер MySQL : ".mysql_error());
    // Выбираем базу данных
    if (!@mysql_select_db($dbname,$dbcnx))
      exit("К сожалению, недоступна база данных : ".mysql_error());
    
    // Устанавливаем кодировку соединения
    @mysql_query("SET NAMES cp1251");

    return true;
  }

  function close() 
  {
    // Закрываем соединение с базой данных
    mysql_close();

    return true;
  }

  function read($id) 
  {
    // Читаем данные сессии
    $query = "SELECT value FROM session WHERE session = '$id'";
    $ses = mysql_query($query);
    if(!$ses) exit(mysql_error());
    $session = mysql_fetch_array($ses);

    // Возвращаем данные, помещенные в сессию
    return $session['value'];
  }

  function write($id, $sess_data) 
  {
    // Проверяем, не зарегистрирована ли сессия
    // с таким именем
    $query = "SELECT COUNT(*) FROM session WHERE session = '$id'";
    $ses = mysql_query($query);
    if(!$ses) exit(mysql_error());
    if(mysql_result($ses,0) > 0)
    {
      // Такая сессия уже существует, необходимо
      // обновить время обращения к сессии
      $query = "UPDATE session SET putdate = NOW(),
                                   value = '$sess_data' 
                WHERE session = '$id'";
      if(!mysql_query($query)) exit(mysql_error());
      return false;
    }
    else
    {
      // Это первое обращение к сессии, необходимо
      // ее зарегистрировать в базе данных
      $query = "INSERT INTO session 
                VALUES (NULL,'$id', NOW(), '$sess_data')"; 
      $ses = mysql_query($query);
      if(!$ses) exit(mysql_error());
      return true;
    } 
  }

  function destroy($id) 
  {
    // Удаляем сессию с идентификатором $id
    $query = "DELETE FROM session WHERE session = '$id'"; 
    if(!mysql_query($query)) exit(mysql_error());
    return true;
  }

  function gc($maxlifetime) 
  {
    // Выполняем "сборку мусора" - удаляем
    // старые записи
    $query = "DELETE FROM session 
              WHERE putdate < NOW() - INTERVAL 20 MINUTE";
    if(!mysql_query($query)) exit(mysql_error());
    return true;
  }

  session_set_save_handler("open", 
                           "close",
                           "read", 
                           "write", 
                           "destroy", 
                           "gc");

  session_start();
?>
