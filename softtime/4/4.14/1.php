<?php
  // Обработчик формы
  if(!empty($_POST['name']))
  {
    // Устанавливаем соединение с базой данных
    require_once("config.php");
    // Обрабатываем спецсимволы во введенных 
    // строках
    if (!get_magic_quotes_gpc())
    {
      $_POST['name'] = mysql_escape_string($_POST['name']);
      $_POST['email'] = mysql_escape_string($_POST['email']);
    }

    // Заполняем таблицу
    $query = "INSERT INTO user_email 
              VALUES (NULL, 
                     '$_POST[name]', 
                      AES_ENCRYPT('$_POST[email]','секретный ключ'))";
    if(!mysql_query($query))
    {
      exit("Ошибка добавления нового пользователя<br>
            <a href=$_SERVER[PHP_SELF]>назад</a>");
    }
    else
    {
      exit("Новый пользователь успешно добавлен<br>
            <a href=$_SERVER[PHP_SELF]>назад</a>");
    }
  }
?>
<form method=post>
<table>
  <tr>
    <td>Имя пользователя:</td>
    <td><input type="text" name="name"></td> 
  </tr>
  <tr>
    <td>E-mail пользователя:</td>
    <td><input type="text" name="email"></td> 
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input class=button type=submit value='Добавить'></td> 
  </tr>
</form>
