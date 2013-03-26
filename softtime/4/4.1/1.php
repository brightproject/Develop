<table>
<form method=post>
<tr><td>Имя:</td><td><input type=text name=name></td></tr>
<tr><td>Пароль:</td><td><input type=password name=pass></td></tr>
<tr><td>Пароль:</td><td><input type=password name=pass_again></td></tr>
<tr><td>e-mail:</td><td><input type=text name=email></td></tr>
<tr><td>URL:</td><td><input type=text name=url></td></tr>
<tr><td></td><td><input type=submit value='Зарегистрировать'></td></tr>
</form>
</table>
<?php
  // Обработчик HTML-формы

  /////////////////////////////////////////////////
  // 1. Блок проверки правильности данных
  /////////////////////////////////////////////////
  // Удаляем лишние пробелы
  $_POST['name'] = trim($_POST['name']);
  $_POST['pass'] = trim($_POST['pass']);
  $_POST['pass_again'] = trim($_POST['pass_again']);
  // Проверяем, не пустой ли суперглобальный массив $_POST
  if(empty($_POST['name'])) exit();
  // Проверяем, правильно ли заполнены обязательные поля
  if(empty($_POST['name'])) exit('Поле "Имя" не заполнено');
  if(empty($_POST['pass'])) exit('Одно из полей "Пароль" не заполнено');
  if(empty($_POST['pass_again']))
                             exit('Одно из полей "Пароль" не заполнено');
  if($_POST['pass'] != $_POST['pass_again']) exit('Пароли не совпадают');
  // Если введен e-mail, проверяем его на корректность
  if(!empty($_POST['email']))
  {
    if(!preg_match("|^[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,6}$|i",
                   $_POST['email']))
    {
      exit('Поле "E-mail" должно соответствовать формату
           somebody@somewhere.ru');
    }
  }
  // Если на сервере не включены "магические кавычки",
  // обрабатываем введенные пользователями данные
  // функцией mysql_escape_string()
  if (!get_magic_quotes_gpc())
  {
    $_POST['name']  = mysql_escape_string($_POST['name']);
    $_POST['pass']  = mysql_escape_string($_POST['pass']);
    $_POST['email'] = mysql_escape_string($_POST['email']);
    $_POST['url']  = mysql_escape_string($_POST['url']);
  }

  /////////////////////////////////////////////////
  // 2. Блок проверки имени на уникальность
  /////////////////////////////////////////////////
  // Устанавливаем соединение с базой данных
  require_once("config.php"); 
  // Проверяем, не было ли переданное имя
  // зарегистрировано ранее
  $query = "SELECT COUNT(*) FROM userslist WHERE name = '$_POST[name]'";
  $usr = mysql_query($query);
  if(!$usr) exit("Ошибка - ".mysql_error());
  $total = mysql_result($usr, 0);
  if($total > 0)
  {
    exit("Данное имя уже зарегистрировано, пожалуйста, выберите другое");
  }

  /////////////////////////////////////////////////
  // 3. Блок регистрации пользователя
  /////////////////////////////////////////////////
  // Формируем и выполняем SQL-запрос на 
  // добавление нового пользователя
  $query = "INSERT INTO userslist
            VALUES(NULL,
                   '$_POST[name]',
                   '$_POST[pass]',
                   '$_POST[email]',
                   '$_POST[url]')";
  if(mysql_query($query))
  {
    // Осуществляем перезагрузку страницы,
    // чтобы сбросить POST-данные
    echo "<HTML><HEAD>
          <META HTTP-EQUIV='Refresh' CONTENT='0; URL=$_SERVER[PHP_SELF]'>
          </HEAD></HTML>";
  } else exit("Ошибка при добавлении данных - ".mysql_error());
?>
