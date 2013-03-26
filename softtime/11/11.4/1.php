<?php
  // Устанавливаем соединение с базой данных
  include "config.php";
  // Удаляем все старые записи
  $query = "DELETE FROM mailerlist 
            WHERE putdate > NOW() - INTERVAL 5 MINUTE";
  if(!mysql_query($query)) exit(mysql_error());
  // Проверяем, не отправлял ли пользователь письма
  // за последние 5 минут
  $query = "SELECT COUNT(*) FROM mailerlist
            WHERE ip = INET_ATON($_SERVER[REMOTE_ADDR])";
  $cnt = mysql_query($query);
  if(!$cnt) exit(mysql_error());
  $total = mysql_result($cnt,0);
  if($total > 0) exit("Допускается отправка лишь одного
                       письма раз в 5 минут. Попробуйте
                       воспользоваться сервисом позже");
  // Отправляем письмо, если оно успешно отправлено,
  // помещаем в базу данных IP-адрес посетителя и время
  // его обращения к почтовому сервису.
  if(mail($mail, $theme, $body))
  {
    $query = "INSERT INTO mailerlist 
              VALUES(INET_ATON($_SERVER[REMOTE_ADDR]), NOW())";
    if(!mysql_query($query)) exit(mysql_error());
  }
  else
  {
    exit("К сожалению, письмо не было отправлено");
  }
?>
