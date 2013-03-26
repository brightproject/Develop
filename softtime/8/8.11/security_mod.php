<?php 
  // Устанавливаем соединение с базой данных
  require_once("config.php");
  // Если пользователь не авторизовался - авторизуемся
  if(!isset($_SERVER['PHP_AUTH_USER'])) 
  { 
    Header("WWW-Authenticate: Basic realm=\"Admin Page\""); 
    Header("HTTP/1.0 401 Unauthorized"); 
    exit(); 
  } 
  else 
  { 
    // Проверяем переменные $_SERVER['PHP_AUTH_USER'] и
    // $_SERVER['PHP_AUTH_PW'], чтобы предотвратить 
    // SQL-инъекцию
    if (!get_magic_quotes_gpc())
    {
      $_SERVER['PHP_AUTH_USER'] = 
                          mysql_escape_string($_SERVER['PHP_AUTH_USER']);
      $_SERVER['PHP_AUTH_PW'] = 
                          mysql_escape_string($_SERVER['PHP_AUTH_PW']);
    }
    
    $query = "SELECT pass FROM userlist 
              WHERE name='".$_SERVER['PHP_AUTH_USER']."'";
    $lst = @mysql_query($query); 
    // Если ошибка в SQL-запросе - выдаем диалоговое окно ввода пароля
    if(!$lst)
    {
      Header("WWW-Authenticate: Basic realm=\"Admin Page\""); 
      Header("HTTP/1.0 401 Unauthorized"); 
      exit(); 
    }
    // Если такого пользователя нет - выдаем диалоговое окно ввода пароля
    if(mysql_num_rows($lst) == 0)
    {
      Header("WWW-Authenticate: Basic realm=\"Admin Page\""); 
      Header("HTTP/1.0 401 Unauthorized"); 
      exit(); 
    }
    // Если все проверки пройдены, сравниваем хеши паролей
    $pass = @mysql_fetch_array($lst);
    if(md5($_SERVER['PHP_AUTH_PW']) != $pass['pass'])
    {
      Header("WWW-Authenticate: Basic realm=\"Admin Page\""); 
      Header("HTTP/1.0 401 Unauthorized"); 
      exit(); 
    }
  }
?>
