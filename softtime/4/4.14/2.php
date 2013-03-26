<?php
  // Устанавливаем соединение с базой данных
  require_once("config.php");

  // Извлекаем список пользователей
  $query = "SELECT user, 
                   AES_DECRYPT(email, 'секретный ключ') AS email 
            FROM user_email
            ORDER BY user";
  $usr = mysql_query($query);
  if(!$usr) exit("Ошибка обращения к списку пользователей");
  if(mysql_num_rows($usr))
  {
    echo "<table border=1>";
    echo "<tr>
            <td>Пользователь</td>
            <td>E-mail</td>
          </tr>";
    while($user = mysql_fetch_array($usr))
    {
      echo "<tr>
              <td>".htmlspecialchars($user['user'])."</td>
              <td>".htmlspecialchars($user['email'])."</td>
            </tr>";
    }
    echo "</table>";
  }
?>
