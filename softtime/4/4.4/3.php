<table>
<form method=post>
<tr><td>Имя:</td><td><input type=text name=name
                           value="<?= $_POST['name'] ?>"></td></tr>
<tr><td>&nbsp;</td><td><input type=submit value='Искать'></td></tr>
</form>
</table>
<?php
  if(!empty($_POST))
  {
    // Устанавливаем соединение с базой данных
    require_once("config.php"); 

    // Если режим магических кавычек не включен,
    // обрабатываем поле $_POST['name'] функцией
    // mysql_escape_string()
    if(!get_magic_quotes_gpc())
    {
      $_POST['name']  = mysql_escape_string($_POST['name']);
    }

    // Производим поиск пользователя с именем $_POST['name']
    $query = "SELECT * FROM userslist 
              WHERE name 
              LIKE '$_POST[name]%'
              ORDER BY name";
    $usr = mysql_query($query);
    if(!$usr) exit("Ошибка - ".mysql_error());
    while($user = mysql_fetch_array($usr))
    {
      echo "Имя пользователя - $user[name]<br>";
    }
  }
?>
