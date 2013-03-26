<?php 
  // Устанавливаем соединение с базой данных
  include "config.php";
  // Выводим имена всех посетителей, записи о которых имеются 
  // в таблице session 
  $query = "SELECT * FROM session"; 
  $ath = mysql_query($query); 
  if(!$ath) exit("<p>Ошибка в запросе к таблице сессий</p>"); 
  // Если хоть кто-то есть - выводим таблицу 
  if(mysql_num_rows($ath)>0) 
  { 
    echo "<table>"; 
    while($author = mysql_fetch_array($ath))
    {
      // Если посетитель не зарегистрирован,
      // выводим вместо его имени "аноним"
      if(empty($author['user'])) echo "<tr><td>аноним</td></tr>"; 
      else echo "<tr><td>".$author['user']."</td></tr>"; 
    }
    echo "</table>"; 
  } 
?>
