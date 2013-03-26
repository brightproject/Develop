<?php
  // Инициируем сессию
  session_start();
?>
<form method=post> 
Имя : <input type=text name=name 
                       value='<?= $_SESSION['name']; ?>'><br> 
Пароль : <input type=password name=password 
                value='<?= $_SESSION['password']; ?>'><br> 
<input type=submit value=Отправить> 
</form> 
<?
  // Обработчик формы
  if(!empty($_POST['name']) && !empty($_POST['password']))
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
    // Если количество записей больше 0,
    // заносим данные о пользователе в сессию
    if(mysql_result($usr,0))
    {
      $_SESSION['name'] = $_POST['name'];
      $_SESSION['password'] = $_POST['password'];
    }
  }
  // Если посетитель "вошел" - приветствуем его 
  if(isset($_SESSION['name']))
  {
    // Устанавливаем соединение с базой данных
    require_once("config.php"); 
    // Выводим приветствие
    echo "Здравствуйте, ".$_SESSION['name']."!<br>";
    echo "Доступ к вашим секретным данным<br>";
    // Выводим данные пользователя
    $query = "SELECT * FROM userslist WHERE name = '$_SESSION[name]'";
    $usr = mysql_query($query);
    if(!$usr) exit(mysql_error());
    $user = mysql_fetch_array($usr);
    echo "Ваш e-mail: ".$user['email']."<br>";
    echo "Ваш URL: ".$user['url']."<br>";
  }
?> 
