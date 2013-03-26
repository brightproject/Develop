<table>
<form method=post>
<tr>
  <td>Имя:</td>
  <td><input type=text name=name value="<?= $_POST['name'] ?>"></td>
</tr>
<tr>
  <td>Пароль:</td>
  <td><input type=password name=pass value="<?= $_POST['pass'] ?>"></td>
</tr>
<tr><td>&nbsp;</td><td><input type=submit value='Удалить'></td></tr>
</form>
</table>
<?php
  // Устанавливаем соединение с базой данных
  require_once("config.php"); 

  if(!empty($_POST))
  {
    // Удаляем имя пользователя, если пароль и
    // имя совпадают
    $query = "DELETE FROM userslist 
              WHERE pass = '$_POST[pass]' AND
                    name = '$_POST[name]'";
    if(mysql_query($query))
    {
      echo "Пользователь $_POST[name] успешно удален<br>";
    }
  }

  echo "Список пользователей:<br>";
  $query = "SELECT * FROM userslist
            ORDER BY name";
  $usr = mysql_query($query);
  if(!$usr) exit("Ошибка - ".mysql_error());
  while($user = mysql_fetch_array($usr))
  {
    echo $user['name']."<br>";
  }
?>
