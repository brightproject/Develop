<?php
  // Устанавливаем соединение с базой данных
  require_once("config.php"); 
  // Запрашиваем список всех пользователей
  $query = "SELECT * FROM userslist WHERE id_user = $_GET[id_user]";
  $usr = mysql_query($query);
  if(!$usr) exit("Ошибка - ".mysql_error());
  $user = mysql_fetch_array($usr);
  echo "Имя пользователя - $user[name]<br>";
  if(!empty($user['email'])) echo "e-mail - $user[email]<br>";
  if(!empty($user['url'])) echo "URL - $user[url]<br>";
?>
