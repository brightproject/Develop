<?php
  // Если реферер не пуст - помещаем его в базу данных
  if(!empty($_SERVER['HTTP_REFERER']) &&
     strpos($_SERVER['HTTP_REFERER'], $_SERVER['SERVER_NAME']))
  {
    // Устанавливаем соединение с базой данных
    require_once("config.php");
    if (!get_magic_quotes_gpc())
    {
      $_SERVER['HTTP_REFERER'] =
                           mysql_escape_string($_SERVER['HTTP_REFERER']);  
    }
    // Добавляем новую запись
    $query = "INSERT INTO referer VALUE (NULL,
                                         '$_SERVER[HTTP_REFERER]')";
    if(!mysql_query($query)) exit(mysql_error());
  }
?>
