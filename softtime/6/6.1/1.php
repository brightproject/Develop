<?php 
  // Ќачинаем сессию 
  session_start(); 
  // ѕолучаем уникальный id сессии 
  $id_session = session_id(); 
  // ”станавливаем соединение с базой данных
  include "config.php";
  // ѕровер€ем, присутствует ли такой id в базе данных 
  $query = "SELECT * FROM session 
            WHERE id_session = '$id_session'"; 
  $ses = mysql_query($query); 
  if(!$ses) exit("<p>ќшибка в запросе к таблице сессий</p>"); 
  // ≈сли сесси€ с таким номером уже существует, 
  // значит, пользователь online - обновл€ем врем€ его 
  // последнего посещени€ 
  if(mysql_num_rows($ses)>0) 
  { 
    $query = "UPDATE session SET putdate = NOW(),
                                 user = '$_SESSION[user]' 
              WHERE id_session = '$id_session'"; 
    mysql_query($query); 
  } 
  // »наче, если такого номера нет - посетитель только что 
  // вошел - помещаем в таблицу нового посетител€ 
  else 
  { 
    $query = "INSERT INTO session 
              VALUES('$id_session', NOW(), '$_SESSION[user]')"; 
    if(!mysql_query($query)) 
    { 
      echo $query."<br>"; 
      echo "<p>ќшибка при добавлении пользовател€</p>"; 
      exit(); 
    } 
  } 
  // Ѕудем считать, что пользователи, которые отсутствовали 
  // в течение 20 минут, покинули ресурс - удал€ем их 
  // id_session из базы данных 
  $query = "DELETE FROM session 
            WHERE putdate < NOW() -  INTERVAL '20' MINUTE"; 
  mysql_query($query); 
?>
