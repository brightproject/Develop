<?php
  // Обработчик формы
  if(!empty($_POST))
  {
    // Устанавливаем соединение с базой данных
    require_once("config.php"); 
    // Защищаясь от SQL-инъекции, пропускаем
    // полученные пароль и логин через функцию
    // mysql_escape_string
    if (!get_magic_quotes_gpc())
    {
      $_POST['name'] = mysql_escape_string($_POST['name']);
      $_POST['password'] = mysql_escape_string($_POST['password']);
    }
    // Осуществляем запрос, который возвращает
    // количество записей, удовлетворяющих паролю
    // и логину
    $query = "SELECT COUNT(*) FROM userslist
              WHERE name = '$_POST[name]' AND pass = '$_POST[password]'";
    $usr = mysql_query($query);
    if(!$usr) exit("Ошибка в блоке авторизации");
    // Получаем количество записей
    $total = mysql_result($usr,0);
    if($total > 0)
    {
      // Авторизация прошла успешно
      // устанавливаем cookie на сутки (3600*24)
      setcookie("user", urlencode($_POST['name']), time() + 3600*24);
      setcookie("pass", urlencode($_POST['password']), time() + 3600*24);
      // Осуществляем перезагрузку, чтобы 
      // сбросить POST-данные
      echo "<HTML><HEAD>
         <META HTTP-EQUIV='Refresh' CONTENT='0; URL=$_SERVER[PHP_SELF]'>
            </HEAD></HTML>";
    }
  }
?>
<form method=post> 
Имя : <input type=text name=name 
                        value='<?= $_COOKIE['user']; ?>'><br> 
Пароль : <input type=password name=password 
                value=><br> 
<input type=submit value=Отправить> 
</form> 
<?php 
  // Если посетитель "вошел" - приветствуем его 
  if(isset($_COOKIE['user']))
  {
    // Устанавливаем соединение с базой данных
    require_once("config.php"); 
    // Защищаясь от SQL-инъекции, пропускаем
    // полученные пароль и логин через функцию
    // mysql_escape_string
    if (!get_magic_quotes_gpc())
    {
      $_COOKIE['user'] = mysql_escape_string($_COOKIE['user']);
      $_COOKIE['pass'] = mysql_escape_string($_COOKIE['pass']);
    }
    // Осуществляем запрос, который возвращает
    // количество записей, удовлетворяющих паролю
    // и логину
    $query = "SELECT COUNT(*) FROM userslist
              WHERE name = '$_COOKIE[user]' AND pass = '$_COOKIE[pass]'";
    $usr = mysql_query($query);
    if(!$usr) exit("Ошибка в блоке авторизации");
    // Получаем количество записей
    $total = mysql_result($usr,0);
    if($total > 0)
    {
      // Выводим приветствие
      echo "Здравствуйте, ".$_COOKIE['user']."!<br>";
      echo "Доступ к вашим секретным данным<br>";
      // Выводим данные пользователя
      $query = "SELECT * FROM userslist WHERE name = '$_COOKIE[user]'";
      $usr = mysql_query($query);
      if(!$usr) exit(mysql_error());
      $user = mysql_fetch_array($usr);
      echo "Ваш e-mail: ".$user['email']."<br>";
      echo "Ваш URL: ".$user['url']."<br>";
   }
  }
?>
