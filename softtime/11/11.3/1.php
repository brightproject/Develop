<?php
  // Тема письма
  $theme = "Тема письма";
  // Содержимое письма
  $body = "Тело письма";
  // Имя файла с e-mail адресами
  $filename = "mail.txt";
  // Читаем содержимое файла в массив $listemail
  // при помощи функции file()
  $listemail = file($filename);
  // В цикле осуществляем отправку писем
  foreach($listemail as $email)
  {
    mail(trim($email), $theme, $body);
  }
?>
